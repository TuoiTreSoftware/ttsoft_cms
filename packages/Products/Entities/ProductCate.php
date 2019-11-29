<?php

namespace TTSoft\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCate extends Model
{

	protected $table = 'product_categories';

	protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = true;

    /* get ID*/
    public function getId(){
    	return $this->id;
    }
    public function getTitle(){
        return $this->title;
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

    public static function getPaginate($page = 10){
    	$data = self::orderBy("id","DESC")->paginate($page);
    	return $data;
    }


    public function productTags(){
        return $this->belongsToMany(Product::class,'product_tag_mapping','product_id','product_tag_id')->withTimestamps('created_at', 'updated_at');
    }


    public function productImages(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public function Hoa_Hong_San_Pham(){
        return $this->hasMany(\TTSoft\HR\Entities\Hoa_Hong_San_Pham::class,'product_cate_id','id');
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
        return $this->product_detail;
    }


    public function getPrice(){
        return format_price($this->price);
    }

    public function getPriceSale(){
        return format_price($this->price_sale);
    }

    public function get_sale_off_lable(){
        $price = $this->price;
        $price_sale = $this->price_sale;
        $sale = round((($price-$price_sale)/$price)*100);
        if ($price > $price_sale) {
            echo '<div class="sale-flash">Giảm '.$sale.'% !</div>';
        }
    }
}
