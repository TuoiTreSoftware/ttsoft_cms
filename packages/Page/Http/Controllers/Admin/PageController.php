<?php

namespace TTSoft\Page\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Page\Repositories\Eloquent\EloquentPageRepository;
use Illuminate\Support\Facades\Auth;
use TTSoft\Page\Entities\Page;
use File;

class PageController extends Controller
{
    public function getList(Request $request){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        session()->put('language',$ref_lang);
        return view('page::page.list',compact('ref_lang'));
    }

    public function getCreate(){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        return view('page::page.create',compact('ref_lang'));
    }

    public function postCreate(Request $request){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
    	$data = $request->all();
        if (isset($data['language'])) {
            unset($data['language']);
        }
        if (isset($data['ref_lang'])) {
            unset($data['ref_lang']);
        }
    	$data['author_id'] = Auth::guard()->user()->id;
    	$data['slug'] = str_slug($data['name']);
        $data['status'] = !empty($data['status']) ? 1 : 0;
    	$page = Page::create($data);
        $page->createContent($ref_lang);
    	flash_info(trans('Add page successfully.'));
    	return redirect()->route('admin.page.get.list');
    }

    public function getEdit($id){
    	$page = Page::findById($id);
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $content = $page->getFirstLangCurrent($ref_lang);
        return view('page::page.edit',compact('page','ref_lang','content'));
    }

    public function postEdit($id,Request $request){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
    	$page = Page::findById($id);
    	$data = $request->all();
        if (isset($data['language'])) {
            unset($data['language']);
        }
        if (isset($data['ref_lang'])) {
            unset($data['ref_lang']);
        }
    	$data['author_id'] = Auth::guard()->user()->id;
    	$data['slug'] = str_slug($data['name']);
        $data['status'] = !empty($data['status']) ? 1 : 0;
    	$page->update($data);
        $page->createContent($ref_lang);
    	flash_info(trans('Update page successfully.' . $page->getTitle()));
    	return redirect()->route('admin.page.get.list');
    }

    public function getDelete($id){
        $page = Page::findById($id);
        $page->delete();
        flash_info(trans('Delete page successfully.' . $page->getTitle()));
        return redirect()->route('admin.page.get.list');
    }
}
