<?php

namespace TTSoft\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TTSoft\Base\Entities\LangContent;
use TTSoft\Products\Entities\Attribute;

use SEOMeta;
use OpenGraph;
use Twitter;
## or
use SEO;

class Product extends Model
{
	protected $table = 'products';

	protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = true;

    // get all record languages
    public static function getContentAll($ref_lang){
        $content = self::selectRaw("products.id,content_lang_fields.title AS title,content_lang_fields.content AS content,content_lang_fields.lang,products.image,products.price,
                products.price_sale,products.sku,products.guarantee,products.quantity,
                products.specifications,products.view,products.product_tag,products.type,products.status,products.meta_title,products.meta_keywords,products.meta_description,products.created_at,products.updated_at,products.product_category_id,products.slug")
            ->join('content_lang_fields',function($join) use ($ref_lang){
                $join->on("products.id","=","content_lang_fields.table_name")
                    ->where("content_lang_fields.content_type",LangContent::CONTENT_TYPE_PRODUCT)
                    ->where("content_lang_fields.lang",$ref_lang);
            })
            ->latest("products.created_at");
            return $content;
    }

    // get first record languages
    public function getFirstLangCurrent($lang){
        $content = LangContent::where('content_type',LangContent::CONTENT_TYPE_PRODUCT)
            ->where('table_name',$this->id)
            ->where('lang',$lang)
            ->latest("created_at")
            ->first();
        return $content;
    } 


    // create content 
    public function createContent($ref_lang){
        $content = $this->getFirstLangCurrent($ref_lang);
        if ($content !== null) {
            $content->title = request()->input('title');
            $content->content = request()->input('content');
            $content->save();
        }
        else
        {
            $content = new LangContent;
            $content->title = request()->input('title');
            $content->content = request()->input('content');
            $content->content_type = LangContent::CONTENT_TYPE_PRODUCT;
            $content->table_name = $this->id;
            $content->json_content = "-";
            $content->lang = $ref_lang;
            $content->save();
        }
        return $content;
    }
    
    /* get ID*/
    public function getId(){
    	return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getSku(){
        return $this->sku;
    }
    public function _getDescription(){
        return $this->meta_description;
    }
    public function getBarcode(){
        return $this->product_tax;
    }

    public function getVat(){
        return !empty($this->vat) ? $this->vat : 10;
    }

    /* format date */
    public function getCreatedAt(){
    	return $this->created_at->format("d/m/Y");
    }
    /* get all model */
    public static function findAll(){
    	$data = self::all();
    	return $data;
    }
    /* find by id model */
    public static function findById($id){
    	$data = self::find($id);
    	if (!$data) {
    		abort(404);
    	}
    	return $data;
    }

    public static function findByKeywords($key){
        $data = self::where(function($q) use ($key){
            $q->where('title','like','%'.$key.'%')
            ->orWhere('sku','like','%'.$key.'%')
            ->orWhere('product_barcode','like','%'.$key.'%');
        });
        return $data;
    }

    public static function getPaginate($page = 10){
    	$data = self::orderBy("id","DESC")->paginate($page);
    	return $data;
    }


    public function productTags(){
        return $this->belongsToMany(Product::class,'product_tag_mapping','product_id','product_tag_id');
    }

    // public function attributes(){
    //     return $this->belongsToMany(Attribute::class,'product_tag_mapping','product_id','product_tag_id')
    //         ->withTimestamps('created_at', 'updated_at');
    // }


    public function productImages(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public function getAllImageAttribute(){
        $array = [$this->image];
        $image = $this->productImages()->get()->pluck('image')->toArray();
        $result = array_merge($array , $image);
        return $result;
    }

    public function producer(){
        return $this->belongsTo(\TTSoft\Categories\Entities\Producer::class,'product_producer_id','id');
    }

    public function category(){
        return $this->belongsTo(\TTSoft\Categories\Entities\ProductCategory::class,'product_category_id','id');
    }

    public function getRoute(){
        return route('web.product.get.getProductDetail',['slug' => $this->slug,'id' => $this->id]);
    }

    public function getImage($w = 250,$h = 250){
        return $this->image;
        return url("plugins/timthumb.php?src=".$this->image."&w={$w}&h={$h}&zc=0&q=90");
    }


    public function getContent(){
        return $this->content;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getPriceSale(){
        return $this->price_sale;
    }

    public function get_sale_off_lable(){
        $price = $this->price;
        $price_sale = $this->price_sale;
        $sale = round((($price-$price_sale)/$price)*100);
        if ($price > $price_sale && $price_sale > 0) {
            echo '<div class="sale-flash">Giảm '.$sale.'% !</div>';
        }
    }

    public function getPriceCurrently(){
        $price = $this->price;
        if ($this->price_sale > 0 && $this->price > $this->price_sale) {
            $price = $this->price_sale;
        }
        return $price;
    }

    public function attributes(){
        return $this->hasMany(ProductAttribute::class,'product_id','id');
    }

    public function getPriceVAT(){
        $vat = $this->getVat();
        $price = $this->getPriceCurrently();

        $money = $this->getPriceCurrently() * 1 * ($this->getVat() / 100 + 1);
        return $money;
    }

    public function getSizeAttribute() {
        $attributes = $this->attributes()->get();
        $size = [];
        foreach ($attributes as $key => $value) {
            if ($value->size_id !== null) {
                $size[] = $value->size_id;
            }
        }
        $childAttributeSize = Attribute::where(['parent_id' => Attribute::SIZE_ID,'status' => 1])->whereIn('id',$size)->get();
        return $childAttributeSize;
    }
}



