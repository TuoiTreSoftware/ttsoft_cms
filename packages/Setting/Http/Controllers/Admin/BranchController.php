<?php

namespace TTSoft\Setting\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Setting\Entities\Branch;
class BranchController extends Controller
{

    public function getList(Request $request){
    	$branch = Branch::orderBy('id','DESC')->paginate(env('PAGINATE_PAGER'));
        return view('setting::branch.index',compact('branch'));
    }

    public function postCreate(){
    	$branch = request()->all();
    	Branch::create($branch);
    	flash_success(trans('Add branch Successful'));
    	return redirect()->route('admin.branch.get.list');
    }


    public function getDelete($id){
        $branch = Branch::findById($id);
        $branch->delete();
        flash_success(trans('Delete branch Successful'));
        return redirect()->route('admin.branch.get.list');
    }

    public function getEdit($id){
        $cate = Branch::findById($id);
        $branch = Branch::orderBy('id','DESC')->paginate(env('PAGINATE_PAGER'));
        return view('setting::branch.index',compact('branch','cate'));
    }

    public function postEdit($id , Request $request){
        $branch = Branch::findById($id);
        $branch->update(request()->all());
        flash_success(trans('Update branch Successful'));
        return redirect()->route('admin.branch.get.list');
    }

    public function getAddress(){
        $address = Branch::findAll();
        if($address){
            foreach ($address as $key => $value) {
                return response()->json([
                    'address' => $value->address,
                    'html'    => $value->name
                ]);
            }
        }else
        return false;
    }
}
