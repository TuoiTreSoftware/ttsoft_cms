@extends('auth::layouts.master')
@section('content')
<div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
    <div class="login-box card">
        <div class="card-body">
            @include('base::partials.flash-notifitions')
            <form class="form-horizontal" id="validation" action="{{ route('sendResetLinkEmail.post.index') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group ">
                    <div class="col-xs-12">
                        <h3>{{ trans('auth::auth.recover_password') }}</h3>
                        <p class="text-muted">{{ trans('auth::auth.title_recover_password') }}</p>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="Email" name="email"> </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{ trans('auth::auth.reset') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('jQuery')
{!! JsValidator::formRequest(TTSoft\Auth\Http\Requests\ForgotRequest::class) !!}
@endpush