@extends('base::layouts.master')
@section('content')
	<div class="container-fluid">
	    <div class="row page-titles">
	    	<div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('NÓI VỀ HTC') }}</h4>
            </div>
	        <div class="col-md-7 align-self-center text-right">
	            <div class="d-flex justify-content-end align-items-center">
	                <a href="{{ route('admin.home.get.list') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-reply-all"></i> {{ trans('NÓI VỀ HTC') }}</a>
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
			                            <label for="pname">{{ trans('page::page.post_title') }}</label>
			                            <input type="text" class="form-control title" id="pname" placeholder="Enter Name" name="name" value=""> 
			                        </div>
			                        <div class="form-group">
			                            <label for="pdesc">{{ trans('page::page.post_content') }}</label>
			                            <textarea class="form-control summernote" id="pdesc" name="content" placeholder="Enter your content here"></textarea>
			                        </div>
	                    		</div>
	                    	</div>
	                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">{{ trans('Update') }}</button>
	                        <button type="submit" class="btn btn-dark waves-effect waves-light">{{ trans('page::page.post_cancle') }}</button>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
