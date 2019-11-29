@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{ trans('Thêm mới nội dung') }}</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
       <div class="d-flex justify-content-end align-items-center">
           <a href="{{ route('admin.home.get.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-reply-all"></i> {{ trans('Trở về') }}</a>
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
                     <input type="text" class="form-control title" id="name" placeholder="Enter Name" name="title" autocomplete="off"> 
                 </div>
                 <div class="form-group">
                     <label for="url">{{ trans('Liên kết') }}</label>
                     <input type="text" id="url" class="form-control" name="url" />
                 </div>
                 <div class="form-group">
                    <label for="plocation">{{ trans('Danh Mục') }}</label>
                    <select class="form-control" name="category">
                        <optgroup label="Trang chủ">
                            <option value="SECTION_8">{{ get_key_home('SECTION_8')->title }}</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <!-- left content -->
            <div class="col-md-4">
                <div class="form-group">
                    <input type="checkbox" class="check" name="status" id="minimal-checkbox-2" value="1" checked>
                    <label for="minimal-checkbox-2">{{ trans('Active') }}</label>
                </div>
                
                {!! fileUploadSingle($nameFile = 'image' , $folder = 'medias' , $old = '') !!}
            </div>
        </div>
        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">{{ trans('Tạo mới') }}</button>
        <button type="submit" class="btn btn-dark waves-effect waves-light">{{ trans('Hủy') }}</button>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection
@push('jQuery')
{!! JsValidator::formRequest('TTSoft\Media\Http\Requests\Admin\CreateMediaRequest') !!}
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
        // $(".select2").select2();
        // $('.selectpicker').selectpicker();
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
        
    });
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $('.summernote').summernote({
        height:345, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false // set focus to editable area after initializing summernote
    });
</script>
@endpush