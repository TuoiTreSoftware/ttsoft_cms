@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h4 class="text-themecolor">{{ trans('User') }}</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
      <div class="d-flex justify-content-end align-items-center">
        <a href="{{ route('users.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> {{ trans('Danh sách') }}</a>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="row card-body">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Name:</strong>
          {{ $user->full_name }}
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Email:</strong>
          {{ $user->email }}
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Roles:</strong>
          @if(!empty($user->roles))
          @foreach($user->roles as $v)
          <label class="label label-success">{{ $v->display_name }}</label>
          @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection