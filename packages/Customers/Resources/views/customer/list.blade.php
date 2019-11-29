@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Danh Sách Khách Hàng</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('customer.get.create') }}"" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Tạo Khách Hàng Mới</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<form class="row">
						<div class="form-group col-md-3">
							<input type="text" class="form-control" name="name" placeholder="Tên...">
						</div>
						<div class="form-group col-md-2">
							<input type="text" class="form-control" name="email" placeholder="Email...">
						</div>
						<div class="form-group col-md-2">
							<input type="number" class="form-control" name="phone" placeholder="Số điện thoại...">
						</div>
						<div class="form-group col-md-2">
							<input type="number" class="form-control" name="cccd" placeholder="CMND/CCCD...">
						</div>
						<div class="form-group col-md-2">
							<input type="text" class="form-control" name="address" placeholder="Địa chỉ...">
						</div>
						<div class="form-group col-md-1">
							<button class="btn btn-info">Tìm</button>
						</div>
					</form>
					<div class="table-responsive">
						<table class="table table-bordered table-hover product-overview">
							<thead>
								<tr>
									<th>
										<input type="checkbox" class="check" id="minimal-checkbox-1">
									</th>
									<th>Mã</th>
									<th>Họ tên</th>
									<th>Email</th>
									<th>Số điện thoại</th>
									<th>Sinh nhật</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($customer as $key => $val)
								<tr>
									<td><input type="checkbox" class="check" id="minimal-checkbox-1"></td>
									<td>{{ $val->id }}</td>
									<td><a href="{{ route('customer.get.detail',$val->id) }}">{{ $val->getFullNameAttribute() }}</a></td>
									<td class="text-right"><a href="#">{{ $val->email }}</a></td>
									<td>{{ $val->phone_number }}</td>
									<td>{{ $val->birth_date }}</td>
									<td><a href="{{ route('customer.get.edit',$val->id) }}" class="text-dark p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="{{ route('customer.get.delete',$val->id) }}" class="text-dark" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="row" style="margin-top: 15px;">
						<div class="col-md-4">
							<button class="btn btn-danger d-none d-lg-block" type="button"><i class="ti-trash"></i> Xóa mục đã chọn</button>
						</div>
						<div class="col-md-8">
							{!! $customer->links('vendor.pagination.bootstrap-4') !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
