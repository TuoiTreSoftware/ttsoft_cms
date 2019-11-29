@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Danh mục</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('product.categories.get.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Tạo danh mục mới</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<form action="" method="GET" class="m-b-20">
						<div class="row">
							<div class="col-md-2 m-b-20">
								<input type="text" name="title" class="form-control" placeholder="Từ khóa" autocomplete="off">
							</div>
							<div class="col-md-1 m-b-20">
								<select class="form-control" name="status">
									<option value="">Status</option>
									<option value="1">Enabled</option>
									<option value="0">Disabled</option>
								</select>
							</div>
							<div class="col-md-2">
								<button class="btn btn-info d-none d-lg-block" type="submit"><i class="ti-search"></i> Tìm kiếm</button>
							</div>
						</div>
					</form>
					<div class="table-responsive">
						<table class="table table-bordered table-hover product-overview">
							<thead>
								<tr>
									<th class="text-center" style="width: 8px;">
										<input type="checkbox" class="check" id="minimal-checkbox-1">
									</th>
									<th class="text-left">Tên danh mục</th>
									<th class="text-left">URL</th>
									<th class="text-left">Hình ảnh</th>
									<th class="text-left">Ngày tạo</th>
									<th class="text-left" style="width: 120px">Hành động</th>
								</tr>
							</thead>
							<tbody>
								@if($data)
									@foreach($data as $k => $v)
										<tr>
											<td class="text-center">
												<input type="checkbox" class="check" id="minimal-checkbox-1" value="{{ $v->getId() }}">
											</td>
											<td>{{ $v->getTitle() }}</th>
											<td>Hình ảnh</td>
											<td>{{ $v->slug }}</th>
											<td>{{ $v->getCreatedAt() }}</th>
											<td>
												<a href="#" class="text-dark p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a>
												<a href="#" class="text-dark" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
											</td>
										</tr>
									@endforeach
								@endif
							</tbody>
						</table>
					</div>
					<div class="row" style="margin-top: 15px;">
						<div class="col-md-4">
							<button class="btn btn-danger d-none d-lg-block" type="button"><i class="ti-trash"></i> Xóa mục đã chọn</button>
						</div>
						<div class="col-md-8">
							{!! $data->links('vendor.pagination.bootstrap-4') !!}
						</div>
					</div>
				</div>
			</div>
			
		</div>

	</div>
</div>

@endsection
