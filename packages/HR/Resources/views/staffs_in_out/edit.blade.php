@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Chỉnh sửa</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('staffs.get.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Thêm mới nhân viên</a>
			</div>
		</div>
	</div>
	<section id="customer" >
		<div class="row">
			<div class="col-sm-12">
				<div class="card">

					<div class="card-body">
						<h4 class="card-title">Thông tin nhân viên</h4>
						<form class="m-t-40" method="post" action="{{ route('staffs.post.edit',$customer->id) }}" >
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-3 row m-r-10">
									<div class="col-md-12 form-group">
										{!! fileUploadSingle($nameFile = 'avatar' , $folder = 'customers', $old = $customer->avatar ) !!}
									</div>
								</div>
								<div class="col-md-9 row">
									<div class="col-md-3 form-group">
										<label  for="example-text-fname">Họ</label>
										<input type="text" id="example-text-fname" name="first_name" class="form-control " value="{{ $customer->first_name }}">
									</div>
									<div class="col-md-3 form-group">
										<label  for="example-text-lname">Tên</label>
										<input type="text" id="example-text-lname" name="last_name" class="form-control " value="{{ $customer->last_name }}">
									</div>
									
									<div class="col-md-3 form-group">
										<label  for="example-text-sms">Giới tính</label>
										<select id="example-text-sms" name="sex" class="form-control ">
											<?php
											if($customer->sex == 0){
												echo '<option value="0" selected="selected">Nam</option>
												<option value="1">Nữ</option>';
											}else{
												echo '<option value="0">Nam</option>
												<option value="1" selected="selected">Nữ</option>';
											}
											?>
										</select>
									</div>
									<div class="col-md-3 form-group">
										<label  for="example-text-bday">Ngày sinh</label>
										<input type="date" id="example-text-bday" name="birth_date" class="form-control" value="{{ $customer->birth_date }}">
									</div>
									<div class="col-md-3 form-group">
										<label for="example-text-tel">Số điện thoại</label>
										<input type="tel" id="example-text-tel" name="phone_number" class="form-control " value="{{ $customer->phone_number }}">
									</div>
									<div class="col-md-3 form-group">
										<label for="example-text-tel">CMND/MST</label>
										<input type="tel" id="example-text-tel" name="tax_code" class="form-control " value="{{ $customer->tax_code }}">
									</div>									
									<div class="col-md-3 form-group">
										<label  for="example-text-sms">Chức vụ</label>
										<select id="example-text-sms" name="level" class="form-control ">
											{{ get_category_by_prefix('POSITION', '', '', $customer->level) }}
										</select>
									</div>
									<div class="col-md-3 form-group">
										<label for="example-text-pword">Email</label>
										<input type="email" id="example-text-pword" name="email" class="form-control " value="{{ $customer->email }}">
									</div>
									<div class="col-md-3 form-group">
										<label  for="example-text-sms">Học vấn</label>
										<select id="example-text-sms" name="education" class="form-control "  value="">
											{{ get_category_by_prefix('EDUCATION', '', '', $customer->education) }}
										</select>
									</div>
									<div class="col-md-9 form-group">
										<label  for="example-text-addr">Địa chỉ</label>
										<input type="text" id="example-text-addr" name="address" class="form-control " value="{{ $customer->address }}">
									</div>
									
								</div>
							</div>
							<button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Sửa</button>
							<button type="reset" class="btn btn-dark waves-effect waves-light">Cancel</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection