@extends('auth::layouts.master')
@section('content')
<div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
    <div class="login-box card">
        <div class="card-body">
            @include('base::partials.flash-notifitions')
            <form class="form-horizontal pro-add-form" id="validation" action="{{ route('auth.login.post.index') }}" method="POST">
                {{ csrf_field() }}
                <h3 class="box-title m-b-20">{{ trans('auth::auth.sign_in') }}</h3>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" name="email" required="" placeholder="Email" value="{{ old('email') }}"> </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" required="" placeholder="Password"> </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                            <label class="custom-control-label" for="customCheck1">{{ trans('auth::auth.remember') }}</label>
                            <a href="{{ route('showLinkRequestForm.get.index') }}" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> {{ __trans('auth::auth.forgot_password') }}</a> 
                        </div> 
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="col-xs-12 p-b-20">
                        <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">{{ trans('auth::auth.sign_in') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('jQuery')
{!! JsValidator::formRequest(TTSoft\Auth\Http\Requests\LoginRequest::class) !!}
@endpush