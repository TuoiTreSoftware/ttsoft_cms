@component('mail::message')
Please click in link to reset password

@component('mail::button', ['url' => route('showFormReset.get.index',[$email , $token])])
Reset Password
@endcomponent

Thanks {{ config('tms.site') }}
@endcomponent
