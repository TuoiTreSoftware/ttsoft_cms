@extends('base::layouts.master')
@section('content')
	<div class="container-fluid">
	    <div class="row page-titles">
	    	<div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('Slider') }}</h4>
            </div>
	        <div class="col-md-7 align-self-center text-right">
	            <div class="d-flex justify-content-end align-items-center">
	                <a href="{{ route('admin.post.get.list') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-reply-all"></i> {{ trans('Slider') }}</a>
	            </div>
	        </div>
	    </div>

	    <!-- content -->
	    <div class="row">
	        <div class="col-md-12">
                @include('base::partials.flash-notifitions')
	            <div class="card">
	                <div class="card-body">
	                    <form class="pro-add-form" method="POST" enctype="multipart/form-data" action="" id="validation">
                            {{ csrf_field() }}
	                    	<div class="row">
	                    		<div class="col-md-8">
	                    			<div class="form-group">
			                            <label for="pname">{{ trans('page::page.post_title') }}</label>
			                            <input type="text" class="form-control" id="pname" placeholder="Enter Name" name="title" value="{{ $slider->getTitle() }}"> 
			                        </div>
                                    <div class="form-group">
                                        <label for="pname">{{ trans('URL') }}</label>
                                        <input type="text" class="form-control" id="URL" placeholder="Enter Name" name="URL" value="{{ $slider->getUrl() }}"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="plocation">{{ trans('Danh Mục') }}</label>
                                        <select class="form-control" name="category">
                                            @foreach(\TTSoft\Slider\Entities\Slider::CATEGORY as $k => $c)
                                                <option @if($k = $slider->category) selected="" @endif value="{{ $k }}">{{ $c }}</option>
                                            @endforeach
                                        </select>
                                    </div>
			                        <div class="form-group">
			                            <label for="pdesc">{{ trans('page::page.post_content') }}</label>
			                            <textarea class="form-control" id="content" name="content" placeholder="Enter your content here">{{ $slider->getContent() }}</textarea>
			                        </div>
                                
                                    {!! fileUploadSingle($nameFile = 'image' , $folder = 'slider' , $old = $slider->getImage() ) !!}
                                    <p>Hình ảnh tối ưu tỷ lệ 16:9 kích thước 1920px x 768px</p>

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
@push('jQuery')
{!! JsValidator::formRequest('TTSoft\Page\Http\Requests\Admin\CreatePageRequest') !!}
<script>
    $("input[name='tch1']").TouchSpin();
    $("input[name='tch2']").TouchSpin();
    $("input[name='tch3']").TouchSpin();
    $("input[name='tch4']").TouchSpin();
    $("input[name='tch5']").TouchSpin();
    $('.dropify').dropify();
    </script>
    <script type="text/javascript">
    jQuery.browser = {};
    (function() {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();
    </script>
    <script>
    jQuery(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepo, // omitted for brevity, see the source of this page
            templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
     jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $('.summernote').summernote({
        height:250, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false // set focus to editable area after initializing summernote
    });
    </script>
@endpush