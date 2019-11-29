@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
 <div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">{{ trans('Nội dung') }}</h4>
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
                       <input type="text" class="form-control" id="pname" placeholder="Enter Name" name="title" value="{{ $media->getTitle() }}"> 
                   </div>
                   <div class="form-group">
                     <label for="url">{{ trans('Liên kết') }}</label>
                     <input type="text" id="url" class="form-control" name="url" value="{{ $media->getUrl() }}" />
                 </div>
                 <div class="form-group">
                    <label for="plocation">{{ trans('Mục') }}</label>

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
                    <input type="checkbox" class="check" name="status" id="minimal-checkbox-2" @if($media->getStatus()) checked @endif value="1">
                    <label for="minimal-checkbox-2">{{ trans('Tình trạng') }}</label>
                </div>
                <div class="form-group">
                   <label for="input-file-now">Up load hình (Tỷ lệ
                    @if($media->category == 'Welcome') 1:1 ngang tối thiểu 250px
                    @endif
                    @if($media->category == 'DIEU_KHAC_BIET') 1:1 ngang tối thiểu 145px
                    @endif
                    @if($media->category == 'KHONG_GIAN_HCT') 1:1 ngang tối thiểu 600px
                    @endif
                    @if($media->category == 'NOI_VE_HCT') 6:4 kích thước 600px x 400px)
                    @endif
                    @if($media->category == 'LOI_ICT_GIOI_THIEU') 6:4 kích thước 300px x 400px)
                    @endif
                    )
                </label>
                {!! fileUploadSingle($nameFile = 'image' , $folder = 'medias' , $old = $media->getImage()) !!}
            </div>
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
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        media: params.media
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.media = params.media || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.media * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepo, // omitted for brevity, see the source of this media
            templateSelection: formatRepoSelection // omitted for brevity, see the source of this media
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