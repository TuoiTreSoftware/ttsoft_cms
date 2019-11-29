@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row page-titles" style="margin-bottom: 0;">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">{{ trans('Menu') }}</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.menu.get.list') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-reply-all"></i> {{ trans('Danh sách Menu') }}</a>
            </div>
        </div>
    </div>
    <section id="product" >
        <div class="row">
            <div class="col-sm-12">
                @include('base::partials.flash-notifitions')
                <form class="m-t-20" method="POST" action="" id="validation">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-header bg-default">
                                    <h4 class="m-b-0 text-black">{{ trans('Menu') }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="pname">{{ trans('Tiêu đề') }}</label>
                                        <input type="text" class="form-control title" id="title" placeholder="Enter Name" name="title"> 
                                    </div>
                                    <div class="form-group">
                                        <label  for="example-text-slug">Identify</label>
                                        <input type="text" id="example-text-slug" name="identify" class="form-control slug" value="{{ old('identify') }}" placeholder="Identify">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-stt">Trạng thái</label> &nbsp
                                        <select class="form-control select2" name="status">
                                            <option value="1">Enabled</option>
                                            <option value="0">Disabled</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-info waves-effect waves-light m-r-10" name="save" value="save">
                                      <i class="fa fa-save"></i> {{ trans('Save') }}
                                    </button>
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="save_edit" value="save_edit"> 
                                      <i class="fa fa-check-circle"></i> {{ trans('Save & Edit') }}
                                    </button>
                                    <button type="reset" class="btn btn-dark waves-effect waves-light">{{ trans('Cancel') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
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