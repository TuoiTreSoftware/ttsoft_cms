@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row page-titles" style="margin-bottom: 0;">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">{{ trans('post::post.posts') }}</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.page.get.list') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-reply-all"></i> {{ trans('page::page.list_page') }}</a>
            </div>
        </div>
    </div>
    <section id="product" >
        <div class="row">
            <div class="col-sm-12">
                @include('base::partials.flash-notifitions')
                <form class="m-t-20" method="post" action="" id="validation">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-header bg-default">
                                    <h4 class="m-b-0 text-black">{{ trans('Thông tin trang') }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="pname">{{ trans('page::page.post_title') }}</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ $content->title or old('name') }}"> 
                                    </div>
                                    <div class="form-group">
                                        <label  for="example-text-slug">URL Key</label>
                                        <input type="text" id="example-text-slug" name="slug" class="form-control slug" placeholder="Liên kết..." value="{{ $page->slug or old('slug') }}">
                                    </div>
                                </div>
                            </div>
                            {{-- content --}}
                            <div class="card">
                                <div class="card-header bg-default">
                                    <h4 class="m-b-0 text-black">{{ trans('Quản lý nội dung') }}</h4>
                                </div>
                                <div class="card-body">
                                    {!! ckeditorContent($nameFile = 'content',$old = isset($content) ? $content->content : '', $folder = 'pages', $idContent = 'content' ,$title = 'Nội dung') !!}
                                </div>
                            </div>

                            {{-- Google Seo Engine --}}
                            <div class="card">
                                <div class="card-header bg-default">
                                    <h4 class="m-b-0 text-black" style="float: left;">{{ trans('Google Seo Engine') }}</h4>
                                    <a href="javascript:void(0)" style="float: right; margin-top: 2px;" class="show-meta-seo"><strong>Edit Seo Engine</strong></a>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="example-text">Meta Title</label>
                                        <input type="text" id="example-text" name="meta_title" class="form-control" autocomplete="off" {{ $page->meta_title or old('meta_title') }}>
                                    </div>
                                    <div class="meta-seo" style="display: none;">
                                        <div class="form-group">
                                            <label for="example-text">Keywords (ngăn cách bởi dấu ",")</label>
                                            <input class="form-control" name="meta_keyworks" autocomplete="off" {{ $page->meta_keyworks or old('meta_keyworks') }}>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text">Mô tả ngắn</label>
                                            <textarea class="form-control" name="meta_description" autocomplete="off" rows="5">{{ $page->meta_description or old('meta_description') }}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">{{ trans('Update') }}</button>
                                    <button type="reset" class="btn btn-dark waves-effect waves-light">{{ trans('Hủy bỏ') }}</button>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-sm-4">
                            {{-- Thuoc tinh --}}
                            
                            <div class="card">
                                <div class="card-header bg-default">
                                    <h4 class="m-b-0 text-black">{{ trans('Status') }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="example-text-stt">Trạng thái</label> &nbsp
                                        <select class="form-control select2" name="status">
                                            <option value="1" @if($page->status) selected="" @endif>Enabled</option>
                                            <option value="0" @if($page->status) selected="" @endif>Disabled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- media --}}
                            <div class="card">
                                <div class="card-header bg-default">
                                    <h4 class="m-b-0 text-black">{{ trans('Quản lý hình ảnh') }}</h4>
                                </div>
                                <div class="card-body">
                                    {{-- hinh anh --}}
                                    {!! fileUploadSingle($nameFile = 'image' , $folder = 'pages', $old = $page->image) !!}
                                    {{-- hinh anh chi tiet --}}
                                </div>
                            </div>
                            
                            {{-- gallery --}}
                            {{-- content --}}
                            <div class="card">
                                <div class="card-header bg-default">
                                    <h4 class="m-b-0 text-black">{{ trans('Ngôn ngữ') }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="example-text-stt">{{ trans('Languages') }}</label>
                                        <select class="form-control select2" name="language">
                                            @foreach(config('base.language') as $lang => $name)
                                                <option value="{{ $lang }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        <div style="margin-top: 5px;">
                                            <label for="example-text-stt">{{ trans('Translations') }}</label>
                                            <div id="list-others-language">
                                                @php 
                                                    $languages = config('base.language');
                                                    unset($languages[$ref_lang]);
                                                @endphp
                                                @foreach($languages as $key => $lang)
                                                    <p>
                                                        <img src="{{ asset('uploads/languages') }}/{{ $key }}.png" title="{{ $lang }}" alt="{{ $lang }}">
                                                        <a href="?ref_lang={{ $key }}"> {{ $lang }}
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
@push('jQuery')
{!! JsValidator::formRequest('TTSoft\Post\Http\Requests\Admin\Post\PostCreateRequest') !!}
<script type="text/javascript">
    $(".show-meta-seo").click(function(){
        $(".meta-seo").toggle(200);
    });
</script>
</script>
@endpush