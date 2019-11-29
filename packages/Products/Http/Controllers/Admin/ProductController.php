<?php

namespace TTSoft\Products\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Products\Repositories\ProductRepositoryInterface;
use TTSoft\Products\Entities\Product;
use TTSoft\Products\Http\Requests\ValidationProductRequest;
use TTSoft\Products\Entities\ProductImage;
use TTSoft\Products\Entities\ProductTag;
use TTSoft\Products\Entities\ProductAttribute;
use TTSoft\Products\Entities\Attribute;
use Illuminate\Support\Facades\DB;
use Excel;
use TTSoft\File\Http\Controllers\Export;


class ProductController extends Controller 
{
	/**
	 *
	 * @return attribute for user
	 *
	 */
	protected $productRepository;

	public function __construct(ProductRepositoryInterface $repository)
	{
		$this->productRepository = $repository;
	}

	public function getList(Request $request)
	{
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        session()->put('request',$request->all());
		$numberPager = env('PAGINATE_PAGER');
		session()->put('language',$ref_lang);
        $products = Product::getContentAll($ref_lang)->get();
        // $view = 'file::ExportExcel.ExportProduct';
        // Excel::download(new Export($products,$view), 'invoices.xlsx');
   		return view("product::product.list",compact('products','ref_lang'));
	}


    public function getCreate()
    {
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $product = Product::getContentAll($ref_lang)->get();
        return view("product::product.create",compact('ref_lang'));
   	}
    
    public function postCreate(ValidationProductRequest $request)
    {
    	DB::beginTransaction();
    	$data = $request->all();
        $attributes = $request->variants;
    	unset($data['multipleImage']);
        $data['status'] = !empty($data['status']) ? $data['status'] : 0;
        if (isset($data['language'])) {
            unset($data['language']);
        }
        if (isset($data['ref_lang'])) {
            unset($data['ref_lang']);
        }
        if (isset($data['variants'])) {
            unset($data['variants']);
        }
        if (isset($data['attributes'])) {
            unset($data['attributes']);
        }

    	$product = new Product($data);
        //luu content
    	$product->save();
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $product->createContent($ref_lang);

    	if (!empty($data['product_tag'])) {
        	$arrayTag = explode(',', $data['product_tag']);
	        foreach ($arrayTag as $key => $value) {
	        	$tagRecord = ProductTag::firstOrCreate([
				    'title' => trim($value),
				], [
				    'title' => trim($value),
				    'slug' => str_slug($value),
				    'status' => 1,
				]);

				$tagRecord->products()->attach($product->getId());
	        }
        }
        if(!empty($request->multipleImage)){
            $image = $request->multipleImage;
            foreach ($image as $key => $value) {
                if (!empty($value)) {
                    ProductImage::create(['image' => $value , 'product_id' => $product->getId()]);
                }
            }
        }
        if (count($attributes) > 0) {
            foreach ($attributes as $key => $attr) {
                $attribute_id = [];
                $product_attribute = new ProductAttribute;
                $product_attribute->product_id = $product->getId();
                $product_attribute->product_attribute_id = 1; //can is null
                $product_attribute->attribute_price = $attr['price'];
                $product_attribute->attribute_sku = $attr['sku'];
                $product_attribute->product_attribute_json = null;

                $product_attribute->color_id = isset($attr['attrs'][0]) ? $attr['attrs'][0] : null;
                $product_attribute->size_id = isset($attr['attrs'][1]) ? $attr['attrs'][1] : null;
                $product_attribute->attribute_price_sale = $attr['price_sale'];

                $product_attribute->save();
            }
        }
    	DB::commit();
    	flash_success(trans('Thêm vật tư thành công'));
        return redirect()->route('products.get.list');
   	}

	public function getEdit($id, Request $request)
	{
		$product = Product::findById($id);
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $content = $product->getFirstLangCurrent($ref_lang);
        $attrs = $product->attributes()->get();
		return view("product::product.edit",compact('product','content','ref_lang','attrs'));
	}

	public function postEdit($id, ValidationProductRequest $request)
	{
		$data = $request->all();
		DB::beginTransaction();
    	unset($data['multipleImage']);
        $attributes = $request->variants;
    	$product = Product::findByid($id);
    	$data['status'] = !empty($data['status']) ? $data['status'] : 0;
        if (isset($data['language'])) {
            unset($data['language']);
        }
        if (isset($data['ref_lang'])) {
            unset($data['ref_lang']);
        }
        if (isset($data['variants'])) {
            unset($data['variants']);
        }
        if (isset($data['attributes'])) {
            unset($data['attributes']);
        }
    	$product->update($data);
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        //luu content
        $product->createContent($ref_lang);
    	if (!empty($data['product_tag'])) {
    		$product->productTags()->detach();
        	$arrayTag = explode(',', $data['product_tag']);
	        foreach ($arrayTag as $key => $value) {
	        	$tagRecord = ProductTag::firstOrCreate([
				    'title' => trim($value),
				], [
				    'title' => trim($value),
				    'slug' => str_slug($value),
				    'status' => 1,
				]);

				$tagRecord->products()->attach($product->getId());
	        }
        }
        if(!empty($request->multipleImage)){
            $image = $request->multipleImage;
            foreach ($image as $key => $value) {
                if (!empty($value)) {
                    ProductImage::create(['image' => $value , 'product_id' => $product->getId()]);
                }
            }
        }
        if (count($attributes) > 0) {
             ProductAttribute::where('product_id',$product->id)->delete();
            foreach ($attributes as $key => $attr) {
                $attribute_id = [];
                $product_attribute = new ProductAttribute;
                $product_attribute->product_id = $product->getId();
                $product_attribute->product_attribute_id = 1; //can is null
                $product_attribute->attribute_price = $attr['price'];
                $product_attribute->attribute_sku = $attr['sku'];
                $product_attribute->product_attribute_json = null;

                $product_attribute->color_id = isset($attr['attrs'][0]) ? $attr['attrs'][0] : null;
                $product_attribute->size_id = isset($attr['attrs'][1]) ? $attr['attrs'][1] : null;
                $product_attribute->attribute_price_sale = $attr['price_sale'];

                $product_attribute->save();
            }
        }
    	DB::commit();
        flash_success(trans('Cập nhật vật tư thành công'));
        return redirect()->route('products.get.edit',$id.'?ref_lang='.$ref_lang);
	}

	public function getDelete($id){
        $product = $this->productRepository->delete($id);
        return redirect()->route('products.get.list');
    }


    public function getDetail($id)
    {
    	$product = $this->productRepository->find($id);
		return view("product::product.detail",compact('product'));
    }

	public function destroy(Request $request)
    {
    	$request = $request->check;
    	dd($request);
    }

    public function getDelImg(Request $request){
        $idHinh = $request->idHinh;
        $imageDetail = ProductImage::find($idHinh);
        if(!empty($imageDetail)){
            $imageDetail->delete();
        }
        return response()->json(['status' => true , 'msg' => 'Delete image successfully']);
    }

    public function getAllAttrs(){
        $attributes = Attribute::where(['parent_id' => 0,'status' => 1])->get();
        $data = attrs($attributes);
        return response()->json($data);
    }
    public function getExport(Request $request){
        $ref_lang = session()->has('language') ? session()->get('language') : config('app.locale');
        $products = Product::getContentAll($ref_lang)->get();
        $view = 'file::ExportExcel.ExportProduct';
        return Excel::download(new Export($products,$view), 'viken'.'SP'.rand(10,100).'.xlsx');
    }

   
}
