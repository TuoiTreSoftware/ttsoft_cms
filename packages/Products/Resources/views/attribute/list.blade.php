@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Danh mục</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('admin.attribute.get.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> {{ trans('Tạo mới') }}</a>

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
			<div class="card">
				<div class="card-header bg-info">
				    <h4 class="m-b-0 text-white">{{ trans('Danh sách danh mục') }}</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover product-overview" id="datatables">
							<thead>
								<tr>
									<th class="text-center" style="width: 8px;">
										<input type="checkbox" id="checkall">
									</th>
									<th class="text-left">Tiêu đề</th>
									<th class="text-left">Thuộc tính</th>
									<th class="text-left">Trạng thái</th>
									<th class="text-left">Ngày tạo</th>
									<th class="text-left" style="width: {{ count(config('base.language')) * 50 }}px">
										@foreach(config('base.language') as $lang => $name)
				                        	<img src="{{ asset('uploads/languages') }}/{{ $lang }}.png" title="English" alt="English">
										@endforeach
									</th>
									<th class="text-left" style="width: 120px">#</th>
								</tr>
							</thead>
							@push('jQuery')
								<script>
									$(function() {
									    $('#datatables').DataTable({
									        processing: true,
									        serverSide: true,
									        pageLength : 10,
									        lengthChange : false,
									        searching : false,
									        order: [],
									        columnDefs : [ {
									            targets: [0, 4, 5],
												orderable: false
									        }],
									        ajax: '{!! route('admin.attribute.datatables.get.list') !!}',
									        columns: [
									            { data: 'check', name: 'check'},
									            { data: 'title', name: 'title',searching : true},
									            { data: 'catogory_title', name: 'catogory_title' },
									            { data: 'status', name: 'status' },
									            { data: 'created_at', name: 'created_at' },
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
