@extends('auth::layouts.master')
@section('content')
<div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
    <div class="login-box card">
        <div class="card-body">
            @include('base::partials.flash-notifitions')
            <form class="form-horizontal pro-add-form" id="validation" action="" method="POST">
                {{ csrf_field() }}
                <h3 class="box-title m-b-20">Reset Password</h3>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="hidden" name="email" required="" placeholder="Email" value="{{ $info['email'] or old('email')}}" disabled=""> </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" required="" placeholder="Password"> </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password_confirm" required="" placeholder="Password"> </div>
                </div>
                <div class="form-group text-center">
                    <div class="col-xs-12 p-b-20">
                        <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">{{ trans('Reset') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('jQuery')
{!! JsValidator::formRequest(TTSoft\Auth\Http\Requests\ResetRequest::class) !!}
@endpush