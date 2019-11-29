@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">{{ trans('post::tag.tag') }}</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href={{ route('admin.post.get.add') }} class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> {{ trans('post::post.creat_post_name') }}</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			@include('post::tags.create')
		</div>
		<div class="col-md-8">
			@include('post::tags.list')
		</div>
	</div>
</div>
@endsection