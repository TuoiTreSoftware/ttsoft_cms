@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Thêm Mới Phiếu Thu</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('inventories.nhap_kho.get.list') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Danh sách phiếu thu</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<form method="post" action="" id="my-form">
						{{ csrf_field() }}
						<div class="row">
							<div class="form-group col-md-4">
								<label for="inputCustomer" class="control-label col-form-label">Đối tượng</label>
								<select class="form-control" id="inputCustomer" name="customer_id">
									<option value="">Đối tượng</option>
									@foreach($data as $key => $val)
									<option value="{{ $val->getId() }}">{{ $val->first_name }} {{ $val->last_name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="inputDate_export" class=" control-label col-form-label">Ngày thực hiện</label>
								<div class="input-group">
				                    <input type="text" class="form-control datepicker" id="datepicker" placeholder="mm-dd-yyyy" name="date_export">
				                    <div class="input-group-append">
				                        <span class="input-group-text"><i class="icon-calender"></i></span>
				                    </div>
				               	</div>
							</div>
							<div class="form-group col-md-4">
								<label for="inputDoc_code" class="control-label col-form-label">Loại Phiếu</label>
								<input type="text" name="doc_code" class="form-control" id="inputDoc_code" placeholder="Số phiếu nhập kho" value="PT{{ Carbon\Carbon::now()->year }}{{ Carbon\Carbon::now()->month }}" readonly="">
							</div>
							<div class="form-group col-md-8">
								<label for="inputDescription" class=" control-label col-form-label">Ghi chú</label>
								<input type="text" class="form-control" name="description" id="inputDescription" placeholder="Ghi chú">
							</div>
							<div class="form-group col-md-4">
								<label for="inputKho_id" class=" control-label col-form-label">Tình trạng</label>
								<select class="form-control" id="inputKho_id" name="tinh_trang">
									<option value="0">Chọn tình trạng</option>
									{{ get_category_by_prefix('DOC_STATUS','',0,'') }}
								</select>
							</div>
						</div>
						<div class="row docs_detail">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-hover table-bordered">
										<thead style="background-color: #03a9f3; color: #fff;">
											<tr>
												<th>STT</th>
												<th>Giá trị</th>
												<th>Giá trị VAT</th>
												<th>Đơn hàng</th>
												<th>Thành tiền</th>
												<th>Khoảng mục phí</th>
												<th style="width: 30px;"></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="count">1</td>
												<td><input class="form-control" type="" name="doc_details[0][gia_tri]" id="gia_tri0"></td>
												<td><input class="form-control" type="" name="doc_details[0][gia_tri_vat]" id="gia_tri_vat0"></td>
												<td><input class="form-control" type="" name="doc_details[0][product_billing_id]" id="product_billing_id0"></td>
												<td><input class="form-control thanhtien" type="number" name="doc_details[0][thanh_tien]" id="thanh_tien0" readonly=""></td>
												<td><input class="form-control" type="text" name="doc_details[0][khoang_muc_phi]" id="khoang_muc_phi0"></td>
												<td><button type="button" href="javascript:void(0)" id="" class="btn btn-sm btn-danger btn_clear">Xóa</button></td>
											</tr>
											<tr id="add_html">
												<td colspan="7">
													<button type="button" href="javascript:void(0)" id="btn_add_row" class="btn btn-success">Thêm</button>
												</td>
											</tr>
											<tr>
												<td colspan="5" class="text-right">Tổng giá trị</td>
												<td colspan="2"><input type="" name="total" class="total form-control" style="color: red;" readonly=""></td>
												
											</tr>
											<div id="hiengia"></div>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group m-b-0">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Lưu phiếu thu</button>
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
@push('jQuery')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('TTSoft\Inventories\Http\Requests\Admin\DocHeaderRequest', '#my-form'); !!}
<script  type="text/javascript" >


	$(document).ready(function() {
		//Tính thành tiền khi nhập giá trị nhập liệu đầu tiên
		function thanh_tien (){
			var gia_tri = $("#gia_tri0").val();
			var gia_tri_vat = $("#gia_tri_vat0").val();
			var thanh_tien = parseInt(gia_tri) + parseInt(gia_tri_vat);
			$("#thanh_tien0").val(thanh_tien);
			sum();
		};
		$("body").on('change', '#gia_tri0', function() {
			thanh_tien();
		});

		$("body").on('change', '#gia_tri_vat0', function() {
			thanh_tien();
		});

		//Thêm dòng giá trị
		var tong = $("#tong");
		var x = 1;
		$("body").on('click','#btn_add_row',function() {
			var count = $(".count").length + 1;
			x++;
			var gia_tri = $("#gia_tri0").val();
			var gia_tri_vat = $("#gia_tri_vat0").val();
			var product_billing_id = $("#product_billing_id0").val();
			var khoang_muc_phi = $("#khoang_muc_phi0").val();
			var thanh_tien = $("#thanh_tien0").val();
			var kho_id = $("#inputKho_id").val();
			var product_id = $("#product_id").val();
			var html = '';
			html += '<tr>';
			html += '<td>'+x+'</td>';
			html += '<td><input class="form-control change-value" type="number" name="doc_details['+x+'][gia_tri]" id="gia_tri'+x+'" data-value="'+x+'"></td>';
			html += '<td><input class="form-control change-value-vat" type="number" name="doc_details['+x+'][gia_tri_vat]" id="gia_tri_vat'+x+'" data-value="'+x+'"></td>';
			html += '<td><input class="form-control" type="number" name="doc_details['+x+'][product_billing_id]" id="product_billing_id'+x+'" value=""></td>';
			html += '<td><input class="form-control thanhtien" type="number" name="doc_details['+x+'][thanh_tien]" id="thanh_tien'+x+'" value="" readonly=""></td>';
			html += '<td><input class="form-control" type="number" name="doc_details['+x+'][khoang_muc_phi]" id="khoang_muc_phi'+x+'" value=""></td>';
			html += '<td><button type="button" href="javascript:void(0)" id="" class="btn btn-sm btn-danger btn_clear">Xóa</button></td>';
			html += '</tr>';
			$("#add_html").before(html);
		});
		function sum (){
			var sum = 0;
			$('.thanhtien').each(function() {
				var total = $(this).val();
				sum += parseInt(total);
			});
			$('.total').val(sum+' vnđ');

		}
		function thanh_tien_x1 (x){
			var gia_tri_x = $('#gia_tri'+x+'').val();
			var gia_tri_vat_x = $('#gia_tri_vat'+x+'').val();
			var thanh_tien_x = parseInt(gia_tri_x) + parseInt(gia_tri_vat_x);
			$('#thanh_tien'+x+'').val(thanh_tien_x);
			sum();

		};

		$("body").on('change', '.change-value', function() {
			var x = $(this).attr('data-value');
			// console.log(x);
			thanh_tien_x1(x);
		});

		$("body").on('change', '.change-value-vat', function() {
			var x = $(this).attr('data-value');
			thanh_tien_x1(x);
		});
		//Xóa dòng giá trị
		$("body").on('click', '.btn_clear', function() {
			$(this).parent().parent("tr").remove();
			sum();
		});
	});
</script>
@endpush

@endsection
