<?php
namespace TTSoft\File\Http\Controllers;

use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Export implements FromView
{
	protected $_data;
	protected $_view;
	public function __construct($data,$view){
		$this->_data = $data;

		$this->_view = $view;
	}
    public function view(): View
    {
        return view($this->_view, [
            'invoices' => $this->_data,
        ]);
    }
}