@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Tạo Mới Phiếu Trả Hàng</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href={{ route('sales.get.tra_hang_ban.list') }} class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Danh sách phiếu trả hàng</a>
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
									<label for="inputEmail3" class=" control-label col-form-label">Tình trạng hàng</label>
									<input type="email" class="form-control" id="inputEmail3" placeholder="Địa chỉ giao hàng">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="inputEmail3" class=" control-label col-form-label">Số điện thoại</label>
									<input type="email" class="form-control" id="inputEmail3" placeholder="0947000788">
								</div>
								<div class="form-group">
									<label for="inputEmail3" class=" control-label col-form-label">Ngày trả hàng</label>
									<input type="email" class="form-control" id="inputEmail3" placeholder="09/05/2018">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="inputEmail3" class="control-label col-form-label">Số phiếu trả hàng</label>
									<input type="email" class="form-control" id="inputEmail3" placeholder="RT201804001" readonly="">
								</div>
								<div class="form-group">
									<label for="inputEmail3" class=" control-label col-form-label">Phương án xử lý</label>
									<select class="form-control">
										<option>Chọn hình thức xử lý</option>
										<option>Đổi hàng mới</option>
										<option>Gửi bảo hành</option>
										<option>Hoàn tiền</option>
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
											@for($i = 1; $i <= 2; $i++)
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
												<td>10.000.000</td>
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
									<button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Lưu Đơn Hàng</button>
									<button type="submit" class="btn btn-primary waves-effect waves-light m-t-10">Lưu Nháp</button>
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

@endsection
