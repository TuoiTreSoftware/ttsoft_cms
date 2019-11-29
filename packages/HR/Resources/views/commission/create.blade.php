@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Quản lý hoa hồng nhân viên</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('customer.get.list') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Quay lại danh sách</a>
			</div>
		</div>
	</div>
	<section id="customer" >
		<div class="row">
			<div class="col-sm-3">
				<div class="card">
					<div class="card-body">
						<form class="row card-title" >
							<div class="input-group form-group">
								<select class="form-control staff-select" name="staff-select">
									<option>Chọn Nhân Viên</option>
									{{ getStaffsInfo() }}
								</select>
							</div>

							<div class="">
								<button class="btn btn-info">Lọc theo nhân viên</button>
							</div>
						</form>

						<form class="row card-title">
							<label>Tiền tua:</label>
							<div class="input-group form-group">
								<input type="number" name="tien_tua" class="form-control tien_tua">
								<div class="input-group-append">
									<span class="input-group-text">đ</span>
								</div>
							</div>
							<div class="">
								<a href="javascript:void(0)" class="btn btn-info" id="add_tien_tua">Áp dụng tất cả Tua</a>
							</div>
						</form>
						<form class="row card-title">
							<label>Mức hoa hồng:</label>

							<div class="input-group form-group">
								<input type="number" name="hoahong_value" class="form-control hoahong_value">
								<div class="input-group-append">
									<span class="input-group-text">%</span>
								</div>
							</div>
							<div class="">
								<a href="javascript:void(0)" class="btn btn-info" id="add_commission">Áp dụng tất cả Hoa Hồng</a>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="card">
					<div class="card-body">
						<form class="row" method="POST" action="{{ route('commission.post.create') }}">
							{{ csrf_field() }}
							@if(isset($staff))
							<h4 class="card-title">Bảng Phân Bổ Hoa Hồng - Tua: Nhân Viên {{ $staff->getTitle() }}</h4>

							<table class="table table-reposive">
								<thead>
									<tr>
										<td>STT</td>
										<td>Danh mục sản phẩm</td>
										<td style="width: 200px;">Tỷ lệ hoa hồng %</td>
										<td>Tiền tua</td>
									</tr>
								</thead>
								<tbody>
									@if(!isset($staff))
									<tr>
										<td colspan="4" class="text-center">Vui lòng chọn nhân viên</td>
									</tr>
									@endif
									
									{{-- @php $x=0; @endphp --}}
									@foreach($cate as $key => $val)
									<tr>
										<td>{{ $key + 1 }}</td>
										<td>{{ $val->getTitle() }}</td>
										<td>
											<input hidden="" type="number" name="staffs_id" value="{{ $staff->getId() }}">
											<input hidden="" type="number" name="hoahong[{{$key}}][product_cate_id]" value="{{ $val->getId() }}">

											<!-- Thêm hoa hồng phân bổ cho Kinh doanh -->

											<div class="input-group">

												<input type="number" name="hoahong[{{$key}}][tyle_hoahong]" value="{{ getCommissionByStaff_ProductCategory($staff->getId(), $val->getId()) }}" class="form-control add_commission" required="">

												<div class="input-group-append">
													<span class="input-group-text">%</span>
												</div>
											</div>
										</td>
										<td>

											<!-- Thêm tiền tua phân bổ cho Kỹ thuật -->
											<div class="input-group">

												<input type="number" name="hoahong[{{$key}}][tien_tua]" value="{{ getTientuaByStaff_ProductCategory($staff->getId(), $val->getId()) }}" class="form-control add_tientua" required="">
												<div class="input-group-append">
													<span class="input-group-text">đ</span>
												</div>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>

							<button class="btn btn-info">Lưu Hoa Hồng</button>
							@else
							<h4>Vui lòng chọn nhân viên!</h4>
							@endif

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection
@push('jQuery')
<script type="text/javascript">
	$(document).ready(function() {
		$("body").on('click', '#add_commission', function() {
			var hoahong_value = $('.hoahong_value').val();
				$('.add_commission').val(hoahong_value);
			});

		$("body").on('click', '#add_tien_tua', function() {
			var tien_tua = $('.tien_tua').val();
				$('.add_tientua').val(tien_tua);
			});
	})
</script>
@endpush