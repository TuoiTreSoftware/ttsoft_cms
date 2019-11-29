<?php

namespace TTSoft\Contact\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Contact\Repositories\Eloquent\EloquentContactRepository;
use Maatwebsite\Excel\Facades\Excel;
use TTSoft\Contact\Exports\ContactExports;
class ContactController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */
	protected $repository;

    protected $export;

	public function __construct(EloquentContactRepository $repository , ContactExports $export){
		$this->repository = $repository;
        $this->export = $export;
	}


    public function index(Request $request){
        $contacts = $this->repository->findAll();
        return view('contact::contact.list',compact('contacts'));
    }

    public function export(){
        return Excel::download($this->export , 'contact.xlsx');
    }
}
