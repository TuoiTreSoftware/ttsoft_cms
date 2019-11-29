@extends('base::layouts.master')
@section('content')
	<div class="container-fluid">
	    <div class="row page-titles">
	    	<div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('Menu') }}</h4>
            </div>
	        <div class="col-md-7 align-self-center text-right">
	            <div class="d-flex justify-content-end align-items-center">
	                <a href="{{ route('admin.post.get.list') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-reply-all"></i> {{ trans('Menu Listting') }}</a>
	            </div>
	        </div>
	    </div>
	    <!-- content -->
	    <div class="row">
	        <div class="col-md-12">
	            <div class="card">
	                <div class="card-body">
	                    <form class="pro-add-form" method="POST" enctype="multipart/form-data" action="" id="validation">
                            {{ csrf_field() }}
	                    	<div class="row">
	                    		<div class="col-md-8">
	                    			<div class="form-group">
			                            <label for="pname">{{ trans('Title') }}</label>
			                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $menu->getTitle() }}"> 
			                        </div>
			                        <div class="form-group">
			                            <label for="pdesc">{{ trans('Url') }}</label>
			                            <input type="text" class="form-control" id="url" placeholder="url" name="url" value="{{ $menu->getUrl() }}"> 
			                        </div>
	                    		</div>
	                    	</div>
	                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">{{ trans('Edit') }}</button>
	                        <button type="reset" class="btn btn-dark waves-effect waves-light">{{ trans('Reset') }}</button>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
@push('jQuery')
{!! JsValidator::formRequest('TTSoft\Page\Http\Requests\Admin\CreatePageRequest') !!}
@endpush