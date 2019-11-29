@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Thêm mới nhân viên</h4>
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
						<h4 class="card-title">Thông tin nhân viên</h4>

						<form class="m-t-20" method="post" action="{{ route('staffs.post.create') }}" >
							{{ csrf_field() }}

							<div class="row">
								<div class="col-md-3 form-group">
									<label  for="example-text-fname">Họ</label>
									<input type="text" id="example-text-fname" name="first_name" class="form-control ">
								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-lname">Tên</label>
									<input type="text" id="example-text-lname" name="last_name" class="form-control ">
								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-sms">Giới tính</label>
									<select id="example-text-sms" name="sex" class="form-control "  value="">
										<option value="0">Nam</option>
										<option value="1">Nữ</option>
									</select>
								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-bday">Ngày sinh</label>
									<input type="date" id="example-text-bday" name="birth_date" class="form-control datepicker">

								</div>
								<div class="col-md-3 form-group">
									<label for="example-text-tel">Số điện thoại</label>
									<input type="tel" id="example-text-tel" name="phone_number" class="form-control ">

								</div>
								<div class="col-md-3 form-group">
									<label for="example-text-tel">CMND/MST</label>
									<input type="number" id="example-text-tel" name="tax_code" class="form-control ">

								</div>									
								<div class="col-md-3 form-group">
									<label for="example-text-pword">Email</label>
									<input type="email" id="example-text-pword" name="email" class="form-control " >
								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-sms">Chức vụ</label>
									<select id="example-text-sms" name="level" class="form-control "  value="">
										{{ get_category_by_prefix('POSITION', '', '', '') }}
									</select>
								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-sms">Học vấn</label>
									<select id="example-text-sms" name="education" class="form-control "  value="">
										{{ get_category_by_prefix('EDUCATION', '', '', '') }}
									</select>
								</div>
								<div class="col-md-9 form-group">
									<label  for="example-text-addr">Địa chỉ</label>
									<input type="text" id="example-text-addr" name="address" class="form-control " >
								</div>
								
							</div>
							<div class="row m-t-0">
								<div class="col-md-3 form-group">
									<h4>Avatar</h4>
									{!! fileUploadSingle($nameFile = 'avatar' , $folder = 'customers') !!}
								</div>
							</div>
							<button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Thêm</button>
							<button type="reset" class="btn btn-dark waves-effect waves-light">Cancel</button>
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

