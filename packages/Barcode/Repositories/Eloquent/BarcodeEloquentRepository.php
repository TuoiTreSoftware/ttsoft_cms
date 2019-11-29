<?php 

namespace TTSoft\Barcode\Repositories\Eloquent;

use TTSoft\Barcode\Repositories\Barcode\RepositoryInterface;

use TTSoft\Base\Repositories\Eloquent\EloquentRepository;
/**
* @return class name use repository
*/
class BarcodeEloquentRepository extends EloquentRepository implements BarcodeRepositoryInterface
{
    
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \TTSoft\Barcode\Entities\Barcode::class;
    }

    
}