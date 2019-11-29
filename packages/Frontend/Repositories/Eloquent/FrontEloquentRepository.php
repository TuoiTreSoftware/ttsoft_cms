<?php 

namespace TTSoft\Frontend\Repositories\Eloquent;

use TTSoft\Frontend\Repositories\FrontRepositoryInterface;

use TTSoft\Base\Repositories\Eloquent\EloquentRepository;
/**
* @return class name use repository
*/
class FrontEloquentRepository extends EloquentRepository implements FrontRepositoryInterface
{
	
	/**
     * get model
     * @return string
     */
    public function getModel()
    {
        return '';
    }
}