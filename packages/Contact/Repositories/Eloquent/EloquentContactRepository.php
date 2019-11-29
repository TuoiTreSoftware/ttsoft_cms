<?php 

namespace TTSoft\Contact\Repositories\Eloquent;

use TTSoft\Contact\Repositories\ContactRepository;
/**
* @return class name use repository
*/
use TTSoft\Contact\Entities\Contact;
class EloquentContactRepository implements ContactRepository
{	
	protected $model;
	
	public function __construct(Contact $model){
		$this->model = $model;
	}

	public function findAll($sort = 'DESC' , $paginate = TRUE){
		$contact = $this->model->orderBy('id',$sort);
		if ($contact) {
			return $contact->paginate(env('PAGINATE_PAGER'));
		}
		return $contact->get();
	}
}