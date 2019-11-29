@extends('base::layouts.master')
@section('content')
	<div class="container-fluid">
	    <div class="row page-titles">
	    	<div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('Sliders') }}</h4>
            </div>
	        <div class="col-md-7 align-self-center text-right">
	            <div class="d-flex justify-content-end align-items-center">
	                <a href={{ route('admin.slider.get.add') }} class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> {{ trans('Add Sliders') }}</a>
	            </div>
	        </div>
	    </div>
	    <div class="row">
	        <div class="col-lg-12">
	        	@include('base::partials.flash-notifitions')
	            <div class="card">
	                <div class="card-body">
	                    <h5 class="card-title">{{ trans('Sliders') }}</h5>
	                    <div class="table-responsive">
	                        <table class="table table-bordered table-hover product-overview">
	                            <thead>
	                                <tr>
	                                	<th>
	                                		<input type="checkbox" class="check" id="minimal-checkbox-1">
                                        </th>
	                                    <th>{{ trans('Title') }}</th>
	                                    <th>{{ trans('Image') }}</th>
	                                    <th>{{ trans('Category') }}</th>
	                                    <th>{{ trans('page::page.post_date') }}</th>
	                                    <th>{{ trans('page::page.post_status') }}</th>
	                                    <th>{{ trans('page::page.post_action') }}</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            	@if($sliders)
	                            	@foreach($sliders as $key => $data)
		                                <tr>
		                                	<td><input type="checkbox" class="check" id="minimal-checkbox-1" value="{{ $data->getId() }}"></td>
		                                    <td><a href="#">{{ $data->getTitle() }}</a></td>
		                                    <td>{{ $data->getCategory() }}</td>
		                                    <td><img src="{{ $data->getImage() }}" width="50"></td>
		                                    <td>{{ $data->getCreatedAt() }}</td>
		                                    <td> <span class="label label-success font-weight-100">Paid</span> </td>
		                                    <td>
		                                    	<a href="{{ route('admin.slider.get.edit',$data->getId()) }}" class="text-dark p-r-10" data-toggle="tooltip" title="Edit">
		                                    		<i class="ti-marker-alt"></i>
		                                    	</a> 
		                                    	<a href="{{ route('admin.slider.get.delete',$data->getId()) }}" class="text-dark" title="Delete" data-toggle="tooltip">
		                                    		<i class="ti-trash"></i>
		                                    	</a>
		                                    </td>
		                                </tr>
	                                @endforeach
	                                @endif
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	            </div>
	            <div class="row  pull-right" style="margin-top: 15px;">
					<div class="col-md-12">
						{!! $sliders->links('vendor.pagination.bootstrap-4') !!}
					</div>
				</div>
	        </div>

	    </div>
	</div>
@endsection