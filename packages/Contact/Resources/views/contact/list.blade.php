@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Contact</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('admin.contact.export.get.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Export Excel</a>

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
				    <h4 class="m-b-0 text-white">{{ trans('Danh sách liên hệ') }}</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover product-overview" id="contact-datatables">
							<thead>
								<tr>
									<th>
										<input type="checkbox" id="checkall">
									</th>
									<th>{{ trans('Name') }}</th>
									<th>{{ trans('Email') }}</th>
									<th>{{ trans('Content') }}</th>
									<th>{{ trans('Date') }}</th>
									<th>{{ trans('Action') }}</th>
								</tr>
							</thead>
							@push('jQuery')
								<script>
									$(function() {
									    $('#contact-datatables').DataTable({
									        processing: true,
									        serverSide: true,
									        pageLength : 10,
									        lengthChange : false,
									        searching : false,
									        order: [],
									        columnDefs : [ {
									            targets: [0, 5],
												orderable: false
									        }],
									        ajax: '{!! route('admin.contact.datatables.get.list') !!}',
									        columns: [
									            { data: 'check', name: 'check'},
									            { data: 'name', name: 'name',searching : true},
									            { data: 'email', name: 'email' },
									            { data: 'content', name: 'content' },
									            { data: 'created_at', name: 'created_at' },
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