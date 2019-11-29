@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">{{ trans('post::post.posts') }}</h4>
		</div>
	</div>
	<div class="row">

		<div class="col-md-4">
			@if(Route::currentRouteName() == 'admin.branch.get.edit')
				@include('setting::branch.edit')
			@else
				@include('setting::branch.create')
			@endif
		</div>
		<div class="col-md-8">
			@include('base::partials.flash-notifitions')
			@include('setting::branch.list')
		</div>
	</div>
</div>
@endsection