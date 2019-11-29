@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">{{ trans('Mã giảm giá') }}</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> {{ trans('post::category.create_cate_name') }}</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			@include('base::partials.flash-notifitions')
			@include('promotion::promotions.create')
		</div>
		<div class="col-md-8">
			@include('promotion::promotions.list')
		</div>
	</div>
</div>
@endsection