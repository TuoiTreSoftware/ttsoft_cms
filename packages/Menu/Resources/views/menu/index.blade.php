@extends('base::layouts.master')
@section('content')
	<div class="container-fluid">
	    <div class="row page-titles">
	    	<div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('Menu') }}</h4>
            </div>
	        <div class="col-md-7 align-self-center text-right">
	            <div class="d-flex justify-content-end align-items-center">
	                <a href={{ route('admin.menu.cate.get.getCreateMenu') }} class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> {{ trans('Tạo mới') }}</a>

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
                        <h4 class="m-b-0 text-white">{{ trans('Danh sách Menu') }}</h4>
                    </div>
	                <div class="card-body">
	                    <div class="table-responsive">
	                        <table class="table table-bordered table-hover product-overview" id="menu-datatables">
	                            <thead>
	                                <tr>
	                                	<th style="width: 25px;">
	                                		<input type="checkbox" class="disable-checkbox" id="checkall">
	                                	</th>
	                                    <th>{{ trans('Tiêu đề') }}</th>
	                                    <th>{{ trans('Identify') }}</th>
	                                    <th>{{ trans('page::page.post_status') }}</th>
	                                    <th>{{ trans('Ngày tạo') }}</th>
	                                    {{-- <th class="text-left" style="width: {{ count(config('base.language')) * 40 }}px">
											@foreach(config('base.language') as $lang => $name)
		                                    	<img src="{{ asset('uploads/languages') }}/{{ $lang }}.png" title="English" alt="English">
											@endforeach
										</th> --}}
	                                    <th width="140">{{ trans('page::page.post_action') }}</th>
	                                </tr>
	                            </thead>
	                            @push('jQuery')
									<script>
										$(function() {
										    $('#menu-datatables').DataTable({
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
										        ajax: '{!! route('admin.menu.datatables.get.list') !!}',
										        columns: [
										            { data: 'check', name: 'check'},
										            { data: 'title', name: 'title',searching : true},
										            { data: 'identify', name: 'identify' },
										            { data: 'status', name: 'status' },
										            { data: 'created_at', name: 'created_at' },
										            // { data: 'languages', name: 'languages'},
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