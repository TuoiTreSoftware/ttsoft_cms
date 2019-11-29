@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Chỉnh sửa Khách hàng</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('customer.get.list') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Quay lại danh sách</a>
			</div>
		</div>
	</div>
	<section id="customer" >
		<div class="row">
			<div class="col-sm-12">
				<div class="card">

					<div class="card-body">
						<h4 class="card-title">Chỉnh sửa khách hàng</h4>
						<form class="floating-labels m-t-40">
							<div class="row m-t-0">
								<div class="col-md-9 form-group">
									<img style="height: 200px; margin-bottom: 10px; " src="{{ $customer->avatar }}">
								</div>
								<div class="col-md-3">
									<a href="{{ route('customer.get.edit',$customer->id) }}" style="width: 100%" class="btn btn-warning waves-effect waves-light">Chỉnh sửa</a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 form-group">
									<label  for="example-text-lname">Họ</label>
									<input type="text" id="example-text-lname" readonly name="last_name" class="form-control " value="{{ $customer->last_name }}">
									<span class="bar"></span>
								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-fname">Tên</label>
									<span class="bar"></span>
									<input type="text" id="example-text-fname" readonly name="first_name" class="form-control " value="{{ $customer->first_name }}">

								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-bday">Ngày sinh</label>
									<input type="date" id="example-text-bday" readonly name="birth_date" class="form-control" value="{{ $customer->birth_date }}">
									<span class="bar"></span>

								</div>
								<div class="col-md-3 form-group">
									<label for="example-text-tel">Số điện thoại</label>
									<input type="tel" id="example-text-tel" readonly name="phone_number" class="form-control " value="{{ $customer->phone_number }}">
									<span class="bar"></span>

								</div>
								<div class="col-md-3 form-group">
									<label for="example-text-tel">CMND/MST</label>
									<input type="tel" id="example-text-tel" readonly name="tax_code" class="form-control " value="{{ $customer->tax_code }}">
									<span class="bar"></span>

								</div>									
								<div class="col-md-3 form-group">
									<label  for="example-text-addr">Địa chỉ</label>
									<input type="text" id="example-text-addr" readonly name="address" class="form-control " value="{{ $customer->address }}">
									<span class="bar"></span>

								</div>
								
								<div class="col-md-3 form-group">
									<label for="example-text-pword">Email</label>
									<input type="email" id="example-text-pword" readonly name="email" class="form-control " value="{{ $customer->email }}">
									<span class="bar"></span>

								</div>
								<div class="col-md-3 form-group">
									<label for="example-text-pword">Mật khẩu</label>
									<input type="password" id="example-text-pword" readonly name="password" class="form-control " value="{{ $customer->password }}">
									<span class="bar"></span>

								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-sms">Giới tính</label>
									<select id="example-text-sms" readonly name="sex" class="form-control ">
										<?php
											if($customer->sex == 0){
												echo '
														<option value="0" selected="selected">Nam</option>
														<option value="1">Nữ</option>';
											}else{
												echo '
														<option value="0">Nam</option>
														<option value="1" selected="selected">Nữ</option>';
											}
										?>
									</select>
									<span class="bar"></span>
								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-sms">Loại đối tượng</label>
									<select id="example-text-sms" readonly name="type_customer" class="form-control ">
										<?php
											if($customer->type_customer == 0){
												echo '
														<option value="0" selected="selected">Khách hàng</option>
														<option value="1">Nhà Cung Cấp</option>';
											}else{
												echo '
														<option value="0">Khách hàng</option>
														<option value="1" selected="selected">Nhà Cung Cấp</option>';
											}
										?>
									</select>
									<span class="bar"></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 form-group">
									<input type="hidden" id="example-text" readonly name="first_login" class="form-control " value="{{ $customer->first_login }}" >
									<input type="hidden" id="example-text" readonly name="last_login" class="form-control " value="{{ $customer->last_login }}" >
									<span class="bar"></span>
								</div>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection