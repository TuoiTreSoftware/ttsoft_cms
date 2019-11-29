@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">{{ trans('post::post.posts') }}</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href={{ route('admin.post.get.add') }} class="btn btn-info d-none d-lg-block m-l-15">
					<i class="fa fa-plus-circle"></i> {{ trans('post::post.creat_post_name') }}
				</a>

				<a href="" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-file-excel-o"></i> {{ trans('product::product.btn_export_excel') }}</a>

				<div class="btn-group m-l-15">
                    <button type="button" class="btn btn-secondary">{{ trans('product::product.btn_language') }}</button>
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(69px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                    	@foreach(config('base.language') as $key => $lang)
                        	<a class="dropdown-item" href="?ref_lang={{ $key }}">
                        		<img src="{{ asset('uploads/languages') }}/{{ $key }}.png" title="{{ $lang }}" alt="{{ $lang }}"> {{ $lang }}
                        	</a>
                        @endforeach
                    </div>
                </div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			@include('base::partials.flash-notifitions')
			<div class="card">
				<div class="card-header bg-info">
				    <h4 class="m-b-0 text-white">{{ trans('Danh sách bài viết') }}</h4>
				</div>
				<div class="card-body">
					<form action="" method="GET" class="m-b-20">
						<div class="row">
							<div class="col-md-2">
								<input type="text" name="title" class="form-control" placeholder="Tên sản phẩm" autocomplete="off">
							</div>
							<div class="col-md-2">
								<select class="form-control" name="category_id">
									<option value="">Danh mục bài viết</option>
									<option>Vật tư 1</option>
								</select>
							</div>
							<div class="col-md-2">
								<input type="text" name="name" class="form-control" placeholder="Tên bài viết...">
							</div>
							<div class="col-md-2">
								<button class="btn btn-info d-none d-lg-block" type="submit"><i class="ti-search"></i> Lọc bài viết</button>
							</div>
						</div>
					</form>
					<div class="table-responsive">
						<table class="table table-bordered table-hover product-overview" id="post-datatables">
							<thead>
								<tr>
									<th><input type="checkbox" class="disable-checkbox" id="checkall"></th>
									<th style="width: 300px;">{{ trans('post::post.post_title') }}</th>
									<th>{{ trans('Image') }}</th>
									<th>{{ trans('post::post.categories') }}</th>
									<th>{{ trans('post::post.post_date') }}</th>
									<th>{{ trans('post::post.post_status') }}</th>
									<th class="text-left" style="width: {{ count(config('base.language')) * 50 }}px">
										@foreach(config('base.language') as $lang => $name)
	                                    	<img src="{{ asset('uploads/languages') }}/{{ $lang }}.png" title="English" alt="English">
										@endforeach
									</th>
									<th style="width: 50px;">{{ trans('#') }}</th>
								</tr>
							</thead>
							@push('jQuery')
								<script>
									$(function() {
									    $('#post-datatables').DataTable({
									        processing: true,
									        serverSide: true,
									        pageLength : 10,
									        lengthChange : false,
									        searching : false,
									        order: [],
									        columnDefs : [ {
									            targets: [0, 6, 7],
    											orderable: false
									        }],
									        ajax: '{!! route('admin.post.datatables.get.list') !!}',
									        columns: [
									            { data: 'check', name: 'check'},
									            { data: 'title', name: 'title',searching : true},
									            { data: 'image', name: 'image'},
									            { data: 'catogory_title', name: 'catogory_title' },
									            { data: 'created_at', name: 'created_at' },
									            { data: 'status', name: 'status' },
									            { data: 'languages', name: 'languages'},
									            { data: 'action', name: 'action'}
									        ]
									    });
									});
								</script>
							@endpush
							
						</table>
					</div>
				</div>
			</div>
			
		</div>

	</div>
</div>
@endsection