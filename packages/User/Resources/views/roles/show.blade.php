@extends('base::layouts.master')
@section('content')
  <div class="container-fluid">
      <div class="row page-titles">
        <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('User') }}</h4>
            </div>
          <div class="col-md-7 align-self-center text-right">
              <div class="d-flex justify-content-end align-items-center">
                  <a href="{{ route('roles.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> {{ trans('Danh sách phân quyền') }}</a>
              </div>
          </div>
      </div>
      <div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Name:</strong>
	                {{ $role->display_name }}
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Description:</strong>
	                {{ $role->description }}
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Permissions:</strong>
	                @if(!empty($rolePermissions))
						@foreach($rolePermissions as $v)
							<label class="label label-success">{{ $v->display_name }}</label>
						@endforeach
					@endif
	            </div>
	        </div>
		</div>
  </div>
@endsection