@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Tạo Mới Hóa Đơn</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a data-toggle="modal" data-target=".bs-example-modal-lg" href="#" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Lấy thông tin từ đơn hàng</a>
				<a href={{ route('sales.get.hoa_don.list') }} class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Danh sách hóa đơn</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<form>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputEmail3" class="control-label col-form-label">Khách hàng</label>
									<select class="form-control">
										<option>Chọn tên khách hàng</option>
										<option>Nguyễn Văn A</option>
									</select>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class=" control-label col-form-label">Đ/C giao hàng</label>
									<input type="email" class="form-control" id="inputEmail3" placeholder="Địa chỉ giao hàng">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="inputEmail3" class=" control-label col-form-label">Số điện thoại</label>
									<input type="email" class="form-control" id="inputEmail3" placeholder="0947000788">
								</div>
								<div class="form-group">
									<label for="inputEmail3" class=" control-label col-form-label">Ngày giao hàng</label>
									<input type="email" class="form-control" id="inputEmail3" placeholder="09/05/2018">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="inputEmail3" class="control-label col-form-label">Số hóa đơn</label>
									<input type="email" class="form-control" id="inputEmail3" placeholder="HD-201804001" readonly="">
								</div>
								<div class="form-group">
									<label for="inputEmail3" class=" control-label col-form-label">PT thanh toán</label>
									<select class="form-control">
										<option>Chọn phương thức thanh toán</option>
										<option>Ngay khi nhận hàng</option>
										<option>Sau 05 ngày</option>
										<option>Sau 15 ngày</option>
										<option>Sau 25 ngày</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table">
										<thead style="background-color: #03a9f3; color: #fff;">
											<tr>
												<th>#</th>
												<th>Tên vật tư</th>
												<th>Số lượng</th>
												<th>Đơn giá</th>
												<th>Thành tiền</th>
												<th style="width: 30px;"></th>
											</tr>
										</thead>
										<tbody>
											@for($i = 1; $i <= 5; $i++)
											<tr>
												<td>1</td>
												<td>Mắt kính Gucci #001</td>
												<td>10</td>
												<td>500.000</td>
												<td>5.000.000</td>
												<td><button class="btn btn-xs btn-danger">Hủy</button></td>
											</tr>
											@endfor
											<tr>
												<td></td>
												<td><input class="form-control" type="" name=""></td>
												<td><input class="form-control" type="" name="" value="1"></td>
												<td><input class="form-control" type="" name=""></td>
												<td><input class="form-control" type="" name=""></td>
												<td><button class="btn btn-success">Thêm</button></td>
											</tr>
											<tr>
												<td></td>
												<td>Tổng giá trị</td>
												<td></td>
												<td></td>
												<td>25.000.000</td>
												<td></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group m-b-0">
								<div class="col-sm-12">
									<button type="button" class="btn btn-info waves-effect waves-light m-t-10">Lưu Hóa Đơn</button>
									<button type="button" class="btn btn-primary waves-effect waves-light m-t-10">Lưu Nháp</button>
									<button onclick="javascript:window.print();" class="btn btn-default m-t-10" type="button"> <span><i class="fa fa-print"></i> Print</span></button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Model lấy thông tin từ đơn hàng bán -->
@include('sales::hoa_don.don_hang_model')
@endsection
