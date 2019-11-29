@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Thêm Mới Phiếu Nhập Kho</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('inventories.dieu_chuyen.get.list') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Danh sách phiếu nhập kho</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<form method="post" action="{{ route('inventories.dieu_chuyen.post.add') }}" id="my-form">
						{{ csrf_field() }}
						 {{-- @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>
                                                {!! $error !!}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}
						<div class="row">
							<div class="form-group col-md-4">
								<label for="inputCustomer" class="control-label col-form-label">Nhà cung cấp</label>
								<select class="form-control" id="inputCustomer" name="customer_id">
									<option value="">Chọn nhà cung cấp</option>
									@foreach($parent as $key => $val)
									<option value="{{ $val->getId() }}">{{ $val->first_name }} {{ $val->last_name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="inputOperation_date" class=" control-label col-form-label">Ngày thuc hien</label>
								<input type="date" name="operation_date" class="form-control" id="inputOperation_date" placeholder="09/05/2018">
							</div>
							<div class="form-group col-md-4">
								<label for="inputDoc_code" class="control-label col-form-label">Số phiếu nhập kho</label>
								<input type="text" name="doc_code" class="form-control" id="inputDoc_code" placeholder="Số phiếu nhập kho" value="NK{{ Carbon\Carbon::now()->year }}{{ Carbon\Carbon::now()->month }}" readonly="">
							</div>
							<div class="form-group col-md-6">
								<label for="inputDescription" class=" control-label col-form-label">Ghi chú</label>
								<input type="text" class="form-control" name="description" id="inputDescription" placeholder="Ghi chú">
							</div>
							
							<div class="form-group col-md-2">
								<label for="inputKho_id" class=" control-label col-form-label">Kho nhập</label>
								<select class="form-control" id="inputKho_id" name="kho_nhap">
									<option value="">Chọn kho nhập hàng</option>
									{{ get_category_by_prefix('WAREHOUSE','',0,'') }}
								</select>
							</div>
							<div class="form-group col-md-2">
								<label for="inputKho_id" class=" control-label col-form-label">Kho xuất</label>
								<select class="form-control" id="inputKho_id" name="kho_xuat">
									<option value="">Chọn kho xuất hàng</option>
									{{ get_category_by_prefix('WAREHOUSE','',0,'') }}
								</select>
							</div>
							<div class="form-group col-md-2">
								<label for="inputKho_id" class=" control-label col-form-label">Tình trạng</label>
								<select class="form-control" id="inputKho_id" name="tinh_trang">
									<option value="">Chọn tình trạng</option>
									{{ get_category_by_prefix('DOC_STATUS','',0,'') }}
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table">
										<thead style="background-color: #03a9f3; color: #fff;">
											<tr>
												<th>Mã VT</th>
												<th>Tên vật tư</th>
												<th>Số lượng</th>
												<th>Đơn giá</th>
												<th>VAT</th>
												<th>Thành tiền</th>
												<th style="width: 30px;"></th>
											</tr>
										</thead>
										<tbody>
											<tr id="add_html">
												<td><input class="form-control" type="" name="doc_details[0][product_id]" id="product_id"></td>
												<td><input class="form-control" type="" name="doc_details[0][name_product]" id="name_product"></td>
												<td><input class="form-control" type="number" name="doc_details[0][so_luong]" id="so_luong0" value=""></td>
												<td><input class="form-control" type="number" name="doc_details[0][don_gia]" id="don_gia0"></td>
												<td><input class="form-control" type="number" name="doc_details[0][vat]" id="vat0"></td>
												<td><input class="form-control thanhtien" type="number" name="doc_details[0][thanh_tien]" id="thanh_tien0"></td>
												<td><button type="button" href="javascript:void(0)" id="btn_add_row" class="btn btn-success">Thêm</button></td>
											</tr>
											<tr>
												<td></td>
												<td>Tổng giá trị</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												
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
@push('jQuery')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
	{!! JsValidator::formRequest('TTSoft\Inventories\Http\Requests\Admin\DocHeaderRequest', '#my-form'); !!}
<script  type="text/javascript" >
    
	$(document).ready(function() {
		//Tính thành tiền khi nhập giá trị nhập liệu đầu tiên
		function thanh_tien (){
			var don_gia = $("#don_gia0").val();
			var so_luong = $("#so_luong0").val();
			var vat = $("#vat0").val();
			var thanh_tien = don_gia*so_luong*(1+vat/100);
			$("#thanh_tien0").val(thanh_tien);
		};
		$("body").on('change', '#don_gia0', function() {
			thanh_tien();
		});

		$("body").on('change', '#vat0', function() {
			thanh_tien();
		});

		$("body").on('change', '#so_luong0', function() {
			thanh_tien();
		});
		//Thêm dòng giá trị
		var tong = $("#tong");
		var x = 0;
		$("#btn_add_row").click(function() {
			x++;
			var name_product = $("#name_product").val();
			var so_luong = $("#so_luong0").val();
			var don_gia = $("#don_gia0").val();
			var vat = $("#vat0").val();
			var thanh_tien = $("#thanh_tien0").val();
			var kho_id = $("#inputKho_id").val();
			var product_id = $("#product_id").val();
			var html = '';
			html += '<tr>';
			html += '<td><input class="form-control" type="" name="doc_details['+x+'][product_id]" id="product_id['+x+']" value="'+product_id+'"></td>';
			html += '<td><input class="form-control" type="" name="doc_details['+x+'][name_product]" id="name_product['+x+']" value="'+name_product+'"></td>';
			html += '<td><input class="form-control" type="number" name="doc_details['+x+'][so_luong]" id="so_luong'+x+'" value="'+so_luong+'"></td>';
			html += '<td><input class="form-control" type="number" name="doc_details['+x+'][don_gia]" id="don_gia'+x+'" value="'+don_gia+'"></td>';
			html += '<td><input class="form-control" type="number" name="doc_details['+x+'][vat]" id="vat'+x+'" value="'+vat+'"></td>';
			html += '<td><input class="form-control" type="number" name="doc_details['+x+'][thanh_tien]" id="thanh_tien'+x+'" value="'+thanh_tien+'"></td>';
			html += '<td><button type="button" href="javascript:void(0)" id="" class="btn btn-danger btn_clear">Xóa</button></td>';
			html += '</tr>';
			$("#add_html").before(html);
			$("#product_id").val("");
			$("#name_product").val("");
			$("#so_luong0").val("");
			$("#don_gia0").val("");
			$("#vat0").val("");
			$("#thanh_tien0").val("");

			
			//Tính thành tiền khi nhập giá trị đã thêm
			function thanh_tien_x (){
				$don_gia = $('#don_gia'+x).val();
				$so_luong = $('#so_luong'+x).val();
				$vat = $('#vat'+x).val();
				$thanh_tien = $don_gia*$so_luong*(1+$vat/100);
				$('#thanh_tien'+x).val($thanh_tien);
				sumTong();
			};

			$("body").on('change', '#don_gia'+x, function() {
				thanh_tien_x();
			});

			$("body").on('change', '#vat'+x, function() {
				thanh_tien_x();
			});

			$("body").on('change', '#so_luong'+x, function() {
				thanh_tien_x();
			});

		});
		//Xóa dòng giá trị
		$("body").on('click', '.btn_clear', function() {
			$(this).parent().parent("tr").remove();
		});
	});
</script>
@endpush
@endsection


