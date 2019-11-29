@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Danh Sách Đơn Hàng Dự Toán</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="#" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Thêm đơn hàng mới</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			@include('base::partials.flash-notifitions')
			<div class="card">
				<div class="card-body">
					<form action="" method="GET" class="m-b-20">
						<div class="row">
							<div class="col-md-2 m-b-20">
								<input type="text" name="title" class="form-control" placeholder="Tên sản phẩm" autocomplete="off">
							</div>
							<div class="col-md-2 m-b-20">
								<select class="form-control" name="product_category_id">
									<option value="">Danh mục vật tư</option>
									<option>Vật tư 1</option>
								</select>
							</div>
							<div class="col-md-3 m-b-20">
								<div class="row">
									<div class="col-md-6"><input min="0" type="number" name="fprice" class="form-control" placeholder="Giá bắt đầu"></div>
									<div class="col-md-6"><input min="0" type="number" name="tprice" class="form-control" placeholder="Đến giá"></div>
								</div>
							</div>
							<div class="col-md-2 m-b-20">
								<select class="form-control" name="type">
									<option value="0">Loại sản phẩm</option>
									<option>Đơn hàng nhập</option>
									<option>Website online</option>
								</select>
							</div>
							<div class="col-md-1 m-b-20">
								<select class="form-control" name="status">
									<option value="">Status</option>
									<option value="1">Enabled</option>
									<option value="0">Disabled</option>
								</select>
							</div>
							<div class="col-md-2">
								<button class="btn btn-info d-none d-lg-block" type="submit"><i class="ti-search"></i> Lọc sản phẩm</button>
							</div>
						</div>
					</form>
					<div class="table-responsive">
						<table class="table table-bordered table-hover product-overview">
							<thead>
								<tr>
									<th style="width: 8px;"><input type="checkbox" class="check" id="minimal-checkbox-1" value=""></th>
									<th class="text-left">Ngày</th>
									<th class="text-left" style="width: 250px;">Tên</th>
									<th class="text-left">SKU</th>
									<th class="text-left">Hình</th>
									<th class="text-left">Giá</th>
									<th class="text-left">Số lượng</th>
									<th class="text-left">DMVT</th>
									<th class="text-left">HSX</th>
									<th class="text-left">Status</th>
									<th class="text-left">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="10">Chưa có đơn hàng dự toán nào!</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row" style="margin-top: 15px;">
						<div class="col-md-4">
							<button class="btn btn-danger d-none d-lg-block" type="button"><i class="ti-trash"></i> Xóa mục đã chọn</button>
						</div>
						<div class="col-md-8">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('jQuery')
<script type="text/javascript">$('select').select2();</script>
@endpush
