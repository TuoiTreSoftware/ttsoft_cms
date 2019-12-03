@extends('base::layouts.master')
@section('content')
@include('base::partials.flash-notifitions')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Documents</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('get.create.document') }}" class="btn btn-info d-none d-lg-block m-l-15">
					<i class="fa fa-plus-circle"></i> Create New
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header bg-info">
				    <h4 class="m-b-0 text-white">Listing</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover product-overview" id="post-datatables">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th>Title</th>
									<th>Href ID</th>
									<th>Versions</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($documents as $key => $val)
								<tr>
									<th class="text-center">{{ $key+1 }} </th>
									<th>{{ $val->title }} </th>
									<th>{{ $val->data_href_menu }} </th>
									<th>{{ $val->version->getTitle() }} </th>
									<th class="text-center">
										<a href="{{ route('delete.document',$val->id) }}" class="mr-2"><i class="fa fa-trash"></i></a>
										<a href="{{ route('get.edit.document',$val->id) }}"><i class="fa fa-pencil"></i></a>
									</th>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

