<?php 

namespace TTSoft\Contact\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use TTSoft\Contact\Repositories\Eloquent\EloquentContactRepository;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class ContactExports implements FromView
{
	protected $repository;

	public function __construct(EloquentContactRepository $repository){
		$this->repository = $repository;
	}


    public function view(): View
    {
        return view('contact::contact.export', [
            'contacts' => $this->repository->findAll()
        ]);
    }
}