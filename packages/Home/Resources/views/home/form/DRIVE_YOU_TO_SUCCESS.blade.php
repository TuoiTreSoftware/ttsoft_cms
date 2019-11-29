@extends('base::layouts.master')
@section('content')
	<div class="container-fluid">
	    <div class="row page-titles">
	    	<div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('DRIVE YOU TO SUCCESS') }}</h4>
            </div>
	        <div class="col-md-7 align-self-center text-right">
	            <div class="d-flex justify-content-end align-items-center">
	                <a href="{{ route('admin.home.get.list') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-reply-all"></i> {{ trans('DRIVE YOU TO SUCCESS') }}</a>
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
			                            <label for="pname">{{ trans('Tiêu đề') }}</label>
			                            <input type="text" class="form-control" id="title" placeholder="Enter Name" name="title" value="{{ $data->getTitle() }}"> 
			                        </div>
			                        {!! fileUploadSingle($nameFile = 'image' , $folder = 'home' , $old = $data->getImage()) !!}
			                        <p>{{ trans('Hình ảnh (560px x 340px - PNG)') }}</p>
			                        <!-- <div class="form-group">
			                            <label for="input-file-now">{{ trans('Hình ảnh (560px x 340px - PNG)') }}</label>
			                            <input type="file" id="input-file-now" class="dropify" name="image" @if(!empty($data->getImage())) data-default-file="{{ asset($data->getImage()) }}" @endif/>
			                        </div> -->
			                        {!! ckeditorContent($nameFile = 'content',$old = $data->content, $folder = 'home', $idContent = 'content' ,$title = 'Nội dung') !!}
			                        <!-- <div class="form-group">
			                            <label for="pdesc">{{ trans('Nội dung') }}</label>
			                            <textarea class="form-control summernote" id="content" name="content" placeholder="Enter your content here">{{ $data->content }}</textarea>
			                        </div> -->
	                    		</div>
	                    	</div>
	                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">{{ trans('Cập nhật') }}</button>
	                        <button type="submit" class="btn btn-dark waves-effect waves-light">{{ trans('Hủy') }}</button>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
@push('jQuery')
<script type="text/javascript">
	$('.dropify').dropify();

	$('.summernote').summernote({
        height:345, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false // set focus to editable area after initializing summernote
    });
</script>
@endpush