<?php
namespace TTSoft\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use TTSoft\Products\Entities\Product;
use TTSoft\Products\Entities\Attribute;
use TTSoft\Products\Entities\ProductAttribute;
use Gloudemans\Shoppingcart\Facades\Cart;
use TTSoft\Categories\Entities\ProductCategory;
use SEOMeta;
use OpenGraph;
use Twitter;
## or
use SEO;
use TTSoft\Products\Entities\ProductTag;

class ProductController extends Controller
{

    protected $_product;

    public function __construct(Product $product){
        $this->_product = $product;
    }

    public function getProductDetail($slug , $id , Request $request){
        $lang = (session()->has('lang_locale_frontend')) ? session()->get('lang_locale_frontend') : config('app.locale');
        $product = Product::getContentAll($lang)->find($id);
        if (!$product) {
            abort(404);
        }
        SEOMeta::setTitle($product->title);
        SEOMeta::setDescription($product->meta_description);
        SEOMeta::addMeta('article:published_time', $product->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $product->category, 'property');
        SEOMeta::addKeyword($product->meta_keywords);
        OpenGraph::setDescription($product->resume);
        OpenGraph::setTitle($product->title);
        OpenGraph::setUrl($product->getRoute());
        OpenGraph::addProperty('type', 'article');

        OpenGraph::addImage($product->image);/*->list('slug')*/

        $productRelates = Product::whereNotIn('type_id',[15])
        ->orderBy('id','DESC')
        ->whereNotIn('id',[$id])
        ->where('product_category_id',$product->product_category_id)
        ->limit(10)
        ->get();
        $productNewLatest = Product::whereNotIn('type_id',[15])
        ->orderBy('id','DESC')->limit(10)
        ->get();
        $attributes = $product->attributes()->get();
        $color = [];
        $size = [];
        foreach ($attributes as $key => $value) {
            $color[] = $value->color_id;
            $size[] = $value->size_id;
        }
        $childAttributeColor = Attribute::where(['parent_id' => Attribute::COLOR_ID,'status' => 1])->whereIn('id',$color)->get();
        $childAttributeSize = Attribute::orderBy('title','ASC')->where(['parent_id' => Attribute::SIZE_ID,'status' => 1])->whereIn('id',$size)->get();
         $childAttributeMaterial = Attribute::where(['parent_id' => Attribute::SIZE_ID,'status' => 1])->whereIn('id',$size)->get();
        return view('frontend::san_pham.detail',compact('product','productRelates','productNewLatest','childAttributeColor','childAttributeSize','childAttributeMaterial'));
    }

    public function showPriceAttribute(Request $request){
        $attr = [
            'size' => $request->size,
            'color' => $request->color
        ];
        $price = ProductAttribute::selectRaw('id,attribute_price')->where('product_attribute_json',json_encode($attr))->first();
        return response()->json(['price' => $price->attribute_price]);
    }

    public function getCategory($alias){
        $lang = (session()->has('lang_locale_frontend')) ? session()->get('lang_locale_frontend') : config('app.locale');
        $category = ProductCategory::where('slug',$alias)->first();
        if (!$category) {
            return redirect('/');
        }
        $products = Product::getContentAll($lang)->where('product_category_id',$category->id)->paginate(18);
        $products_title = Product::where('product_category_id',$category->id)->first();
        return view('frontend::san_pham.list',compact('products','products_title'));
    }
    public function getProductList(){
        $products = Product::paginate(20);
        return view('frontend::san_pham.list_product',compact('products'));
    }
    

    public function getPriceAttr(Request $request){
        $size_id = $request->size_id;
        $product_id = $request->product_id;
        $color_id = $request->color_id;

        $data = ProductAttribute::where(['color_id' => $color_id , 'product_id' => $product_id , 'size_id' => $size_id])->first();
        return response()->json($data);
    }

    public function filter(Request $request){
        $priceFrom = $request->priceFrom;
        $priceTo = $request->priceTo;
        $array = $request->array;
        $products = Product::selectRaw('products.*,product_attribute_mapping.color_id,product_attribute_mapping.size_id')
            ->join('product_attribute_mapping',function($join) use ($array){
                $join->on('products.id','=','product_attribute_mapping.product_id');
                $join->where(function($q)  use ($array){
                    if (isset($array) && count($array) > 0) {
                        $q->whereIn('color_id',$array);
                        $q->orWhereIn('size_id',$array);
                    }
                });
                    
            })
            ->where(function($query) use ($priceFrom , $priceTo){
                $query->where('price','>=',$priceFrom);
                $query->where('price','<=',$priceTo);
            })
            ->groupBy('products.id')
            ->paginate(20);
        $childAttr = null;
        if (isset($array) && count($array) > 0) {
            $childAttr = Attribute::whereIn('id',$array)->latest('parent_id')->get();
        }
        // session()->put('products',$products);
        if ($products) {
            return response()->json([
                'status' => 'TRUE',
                'html' => view('frontend::san_pham.filter',['products' => $products])->render(),
                'filtercurrent' => view('frontend::san_pham.filtercurrent',['childAttr' => $childAttr])->render(),
            ]);
        }
        return response()->json([
            'status' => 'FALSE',
            'html' => '',
            'filtercurrent' => '',
        ]);
    }
}
