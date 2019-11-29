<?php 

namespace TTSoft\Products\Repositories\Eloquent;

use TTSoft\Products\Repositories\ProductRepositoryInterface;

use TTSoft\Base\Repositories\Eloquent\EloquentRepository;

use TTSoft\Products\Entities\ProductImage;

use TTSoft\Products\Entities\PrdocutTag;
/**
* @return class name use repository
*/
class ProductEloquentRepository extends EloquentRepository implements ProductRepositoryInterface
{
	
	/**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \TTSoft\Products\Entities\Product::class;
    }

    public function createProduct($data){
        $data = $this->_model->create($data);
        if ($data) {
            $this->createTag($data->getId());
            $this->createImage($data->getId());
            return $data;
        }
        return false;
    }

    protected function createTag($productId){

    }

    protected function createImage($productId){

    }
}