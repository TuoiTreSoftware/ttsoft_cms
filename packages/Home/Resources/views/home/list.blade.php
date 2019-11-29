@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">{{ trans('home::home.module_name') }}</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			@include('base::partials.flash-notifitions')
			
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">{{ trans('Home Section') }}</h5>
					<div class="table-responsive">
						<table class="table table-bordered table-hover product-overview">
							<thead>
								<tr>
									<th style="width : 3%">
										STT
									</th>
									<th style="width : 30%">{{ trans('Tiêu đề') }}</th>
									<th>{{ trans('KEY') }}</th>
									<th class="text-center">{{ trans('Hình ảnh') }}</th>
									<th>{{ trans('Ngày') }}</th>
									<th>{{ trans(' ') }}</th>
								</tr>
							</thead>
							<tbody>
								@if($homes)
									@foreach($homes as $key => $data)
									@if($data->getSlug() == \TTSoft\Home\Entities\Home::DRIVE_YOU_TO_SUCCESS)
										<tr>
											<td class="text-center">{{ ++$key }}</td>
											<td><a href="#">{{ $data->getTitle() }}</a></td>
											<td><a href="#">{{ $data->getURLKey() }}</a></td>
											<td class="text-center">
												<a href="#">
													<img src="{{ $data->getImage() }}" width="50">
												</a>
												</td>
											
											<td>{{ $data->getCreatedAt() }}</td>
											<td>
												<a href="{{ route('admin.home.get.edit',$data->getURLKey()) }}" class="text-dark p-r-10" data-toggle="tooltip" title="Edit">
													<i class="ti-marker-alt"></i>
												</a>
												<a href="{{ route('admin.home.get.view',$data->getId()) }}" class="text-dark p-r-10" data-toggle="tooltip" title="View">
													<i class="icon-eye"></i>
												</a>
										</tr>
									@endif
									@endforeach
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		</div>

	</div>
</div>
@endsection