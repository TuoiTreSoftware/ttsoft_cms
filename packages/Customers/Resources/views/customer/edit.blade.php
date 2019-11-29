@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Chỉnh sửa Khách hàng</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('customer.get.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Thêm mới khách hàng</a>
			</div>
		</div>
	</div>
	<section id="customer" >
		<div class="row">
			<div class="col-sm-12">
				<div class="card">

					<div class="card-body">
						<form class="" method="post" action="{{ route('customer.post.edit',$customer->id) }}" >
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-3 form-group">
									<label  for="example-text-lname">Họ</label>
									<input type="text" id="example-text-lname" name="last_name" class="form-control " value="{{ $customer->last_name }}">
								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-fname">Tên</label>
									<input type="text" id="example-text-fname" name="first_name" class="form-control " value="{{ $customer->first_name }}">
								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-sms">Giới tính</label>
									<select id="example-text-sms" name="sex" class="form-control ">
										@if($customer->sex == 0){
										<option value="0" selected="">Nam</option>
										<option value="1">Nữ</option>
										@else
										<option value="0">Nam</option>
										<option value="1" selected="selected">Nữ</option>
										@endif
									</select>
								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-bday">Ngày sinh</label>
									<input type="date" id="example-text-bday" name="birth_date" class="form-control datepicker" value="{{ $customer->birth_date }}">
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
									<label for="example-text-pword">Email</label>
									<input type="email" id="example-text-pword" name="email" class="form-control " value="{{ $customer->email }}">
								</div>
								<div class="col-md-9 form-group">
									<label  for="example-text-addr">Địa chỉ</label>
									<input type="text" id="example-text-addr" name="address" class="form-control " value="{{ $customer->address }}">
								</div>
								<div class="col-md-3 form-group">
									<label  for="example-text-provinces">Tỉnh/Thành Phố</label>
									<select type="text" id="example-text-provinces" name="provinces" class="form-control " >
										@foreach(get_provinces() as $key => $v)
										@if($v->id == $customer->provinces)
										<option value="{{ $v->id }}" selected="">{{ $v->name }}</option>
										@else
										<option value="{{ $v->id }}">{{ $v->name }}</option>
										@endif
										@endforeach
									</select>
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
