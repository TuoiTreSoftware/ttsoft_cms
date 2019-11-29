<?php
namespace TTSoft\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use TTSoft\Products\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use TTSoft\Sales\Entities\BillingOrder;
use TTSoft\Sales\Entities\BillingOrderDetail;
use TTSoft\Customers\Entities\Customer;
use DB;
use TTSoft\Frontend\Mail\SendOrderMail;
use TTSoft\Frontend\Http\Requests\Web\OrderRequest;
use Mail;
use TTSoft\AlepayPayment\Services\Alepay;
use TTSoft\Frontend\Services\FrontService;
use TTSoft\Promotions\Entities\Discount;
use TTSoft\Products\Entities\ProductAttribute;
class CartController extends Controller
{
    /* @class Gloudemans\Shoppingcart\Facades\Cart */
    protected $_cart;

    /* @class TTSoft\Products\Entities\Product */
    protected $_product;

    /* @class TTSoft\Frontend\Services\FrontService */
    protected $_frontService;

    public function __construct(Product $product , Cart $cart , FrontService $frontService){
        $this->_cart            = $cart;
        $this->_product         = $product;
        $this->_frontService    = $frontService;
    }

    public function getAddToCart(Request $request){
        $id = $request->id;
        $product = $this->_product->select('id','title','price','price_sale','image','slug')->find($id);
        $data = ProductAttribute::where(['color_id' => $request->color , 'product_id' => $product->id , 'size_id' => $request->size])->first();
        if($product['price_sale'] > 0 && $product['price_sale'] < $product['price']){
            $price = $product['price_sale'];
        }else{
            $price = $product['price'];
        }
        $gia = $price;
        if ($data !== null) {
            if($data->attribute_price_sale > 0 && $data->attribute_price_sale < $data->attribute_price){
                $gia = $data->attribute_price_sale;
            }else{
                $gia = $data->attribute_price;
            }
        }
        Cart::add([
            'id' => $product['id'], 
            'name' => $product['title'], 
            'qty' => $request->quantity, 
            'price' => $gia, 
            'options' => [
                'image' => $product['image'],
                'slug' => $product['slug'],
                'url' => $product->getRoute(),
                'vat' => $product->getVat(),
                'color' => $request->color,
                'size' => $request->size,
            ]
        ]);
        $product['url'] = $product->getRoute();
        $product['sl'] = Cart::count();
        $product['total'] = Cart::total();
        $product['html'] = view('frontend::san_pham.addtocart')->render();
        return response()->json($product);
    }
    public function deleteCart(Request $request){
        Cart::remove($request->rowId);
        $total = 0;
        foreach (Cart::content() as $key => $item) {
            $total+= ($item->price) * $item->qty;
        }
        $json = [
            'sl' => Cart::count(),
            'total' => format_price($total),
        ];
        session()->forget('cart');
        session()->forget('discount');
        // $json['html'] = view('frontend::partials.contentCart')->render();
        return response()->json($json);
    }
    public function updateCart(Request $request){
        $qty = $request->qty;
        $key = $request->rowId;
        $content = Cart::get($key);
        Cart::update($key,$qty);
        $total = 0;
        foreach (Cart::content() as $key => $item) {
            $total+= ($item->price) * $item->qty;
        }
        $price_new = (($content->price) * $content->qty);
        $json = [
            'sl' => Cart::count(),
            'total' => format_price($total),
            'price_new' => format_price($price_new),
        ];
        
        // $json['html'] = view('frontend::partials.contentCart')->render();
        return response()->json($json);
    }
    public function deleteAllCart(){
        Cart::destroy();
        session()->forget('cart');
        session()->forget('discount');
        return redirect('/checkout/cart');
    }
    public function getCart(){
        $cart = Cart::content();
        return view('frontend::shoppingcart.cart',['items' => $cart]);
    }


    public function getCheckout(Request $request){
        $items = Cart::content();
        return view('frontend::shoppingcart.checkout',compact('items'));
    }


    public function postCheckout(OrderRequest $request){        
        DB::beginTransaction();
        $carbon = new Carbon();
        $discount = session()->get('discount');
        $data = $this->_frontService->convertDataCustomer($request->all());
        $customer = Customer::firstOrCreate(['email' => $request->email],$data);
        $billing = new BillingOrder;
        $billing->customer_id = $customer->id;
        $billing->address = $request->address.", ".$request->province;
        $billing->note = $request->note;
        $billing->doc_code = BillingOrder::PREFIX.$carbon->year.$carbon->month;
        $billing->type_order = BillingOrder::ORDER_ONLINE;
        $billing->description = 'Đơn hàng : '.BillingOrder::PREFIX.$carbon->year.$carbon->month;
        $billing->payment_method = $request->payment_method;
        $billing->type_pay = 0;
        if (session()->has('discount')) {
            $billing->discount_price = $discount['price'];
            $billing->discount_code = $discount['code_sale'];
        }
        $billing->save();
        $billing->doc_code = $billing->doc_code.$billing->id;
        $billing->save();
        $sum = 0;
        $countItem = Cart::count();
        if (Cart::count() > 0) {
            foreach (Cart::content() as $key => $value) {
                $value_vat = ($value->price * $value->options->vat) / 100;
                $doc_details = new BillingOrderDetail;
                $doc_details->product_id = $value->id;
                $doc_details->quantity = $value->qty;
                /*ĐƠN GIÁ TRÊN 1 ĐƠN VỊ SẢN PHẨM*/
                $doc_details->price = $value->price;
                /*TỔNG GIÁ TRỊ CHƯA BAO GỒM VAT*/
                $doc_details->gia_tri = $value->price * $value->qty;
                /*TỔNG GIÁ TRỊ VAT*/
                $doc_details->gia_tri_vat = $value_vat * $value->qty;
                $doc_details->vat = $value->options->vat;
                $doc_details->kho_id = 1;
                $doc_details->doc_headers_id = $billing->getId();
                $doc_details->size = $value->options->size;
                $doc_details->color = $value->options->color;
                $doc_details->save();
                $sum+=(($value->price) * $value->qty);
            }
        }
        if ($billing->payment_method != 'credit_cart') {
            if (session()->has('discount')) {
                $sum = session()->get('discount')['price'];
            }
            $this->sendEmailESms($customer , $billing, $sum);
        }
        DB::commit();
        Cart::destroy();
        session()->flash('customer', $customer);
        session()->flash('data', $request->all());
        session()->flash('sum', $sum);
        session()->flash('billing', $billing);
        if($billing->discount_code === null) {
            $payPrice = $sum;
        } else {
            $payPrice = $billing->discount_price;
        }
        if ($billing->payment_method == 'credit_cart') {
            $params = array(
              'amount'          =>  $payPrice,
              'buyerAddress'    =>  $request->address,
              'buyerCity'       =>  $request->address,
              'buyerCountry'    =>  'Việt Nam',
              'buyerEmail'      =>  $customer->email,
              'buyerName'       =>  $customer->full_name,
              'buyerPhone'      =>  $customer->getPhoneNumber(),
              'cancelUrl'       =>  route('web.product.get.getProductList'),
              'currency'        =>  'VND',
              'orderCode'       =>  $billing->doc_code,
              'orderDescription'=>  'Thanh toán đơn hàng '.$billing->doc_code,
              'paymentHours'    =>  $countItem,
              'returnUrl'       =>   route('web.account.get.getSuccessful'),
              'totalItem'       =>  $countItem,
              'checkoutType'    =>  1,
          );
            if (session()->has('discount') && $discount['online'] === 1) {
                $params['promotionCode'] = $discount['code_sale'];
            }
            $alepay = new Alepay();
            $response = $alepay->sendOrderToAlepay($params);
            $response = json_decode($response);
            session()->put('alepayToken',$response->token);
            return redirect($response->checkoutUrl);
        }
        return redirect()->route('web.account.get.getSuccessful');
    }


    public function getSuccessful(Request $request){
        if (!session()->has(['customer'])) {
            return redirect()->route('web.account.get.getCart');
        }
        $data = session()->get('discount');
        $customer = session()->get('customer');
        $sum = session()->get('sum');
        $billing = session()->get('billing');
        
        if ($billing->payment_method == 'credit_cart') {
            if (session()->has('discount')) {
                $sum = session()->get('discount')['price'];
            }
            $data = $request->all();
            $alepay = new Alepay();
            $response = $alepay->getTransactionInfo(session()->get('alepayToken'));
            $response = json_decode($response);
            $bill = BillingOrder::find($billing->id);
            if (isset($response->status) && $response->status == 000) {
                $bill->type_pay = 2;
            }else{
                $bill->type_pay = 1;
            }
            $bill->save();
            session()->forget('alepayToken');
            $this->sendEmailESms($customer , $billing, $sum);
        }
        if (session()->has('discount')) {
            session()->forget('discount');
        }
        return view('frontend::shoppingcart.success',compact('customer','sum','billing'));
    }

    private function sendEmailESms($customer , $billing, $sum){
        if (config('frontend.sendEsms')) {
            $data = event(new \TTSoft\ESms\Events\ESmsEvent([
                'phone' => $customer->getPhoneNumber(),
                'content' => 'DON HANG #'.$billing->doc_code.' DA DUOC DAT THANH CONG VOI GIA : '.format_price($sum).' VND'
            ]));
        } 
        if (config('frontend.sendEmail')) {
            // dd($customer);
            $info = [
                'billing' => $billing,
                'sum' => $sum,
                'customer' => $customer
            ];
            if (env('QUEUE_DRIVER') == 'database') {
                Mail::to($customer->email)->queue(new SendOrderMail($info));
            }else{
                Mail::to($customer->email)->send(new SendOrderMail($info));
            }
        }
    }


    // check ma khuyen mai


    public function checkCodeDiscount(Request $request)
    {
        $data = $request->all();
        if (!empty($data['code_sale'])) {
            $discount = Discount::where(['code' => $data['code_sale']])->first();
            if (!$discount){
                return response()->json(['status' => 'notdiscount' , 'messages' => 'Mã giám giá không hợp lệ']);
            } else {
                if( $discount->online === 1 && $data['paymentType'] !== "credit_cart" ){
                    return response()->json(['status' => 'notdiscount' , 'messages' => 'Mã giám giá chỉ áp dụng thanh toán Online!']);
                } else {
                    if($discount->type == 1) {
                        if ($discount->value > $this->total()) {
                            return response()->json([
                                'status' => 'notdiscount', 
                                'messages' => 'Đơn hàng phải có giá trị lớn hơn mã khuyến mãi',
                            ]);
                        }
                        $price = $this->total() - $discount->value;
                        session()->put('discount',['title' => $discount->name, 'online' => $discount->online, 'price' => $price, 'code_sale' => $data['code_sale']]);
                        return response()->json([
                            'status' => 'discount' , 
                            'messages' => 'Chúc mừng! Mã giảm giá được áp dụng thành công! '.$discount->title,
                            'total_price' => format_price($price).'đ',
                            'total_sale' => format_price($this->total() - $price).'đ',
                        ]);
                    } else {
                        if ($discount->value > $this->total()) {
                            return response()->json([
                                'status' => 'notdiscount', 
                                'messages' => 'Đơn hàng phải có giá trị lớn hơn mã khuyến mãi',
                            ]);
                        }
                        $price = $this->total() - (($this->total() * $discount->value) / 100);
                        session()->put('discount',['title' => $discount->name ,'online' => $discount->online , 'price' => $price, 'code_sale' => $data['code_sale']]);
                        return response()->json([
                            'status' => 'discount' , 
                            'messages' => 'Chúc mừng! Mã giảm giá được áp dụng thành công! '.$discount->name,
                            'total_price' => format_price($price).'đ',
                            'total_sale' => format_price($this->total() - $price).'đ',
                        ]);
                    }
                }
            }
        } else {
            return response()->json([
                'status' => 'notdiscount', 
                'messages' => 'Vui lòng nhập mã giảm giá',
            ]);
        }
    }

    public function total(){
        $total = 0;
        foreach(Cart::content() as $k => $c){
            $value_vat = ($c->price) / 100;
            $total+= ($c->price) * $c->qty; 
        }
        return $total;
    }


}
