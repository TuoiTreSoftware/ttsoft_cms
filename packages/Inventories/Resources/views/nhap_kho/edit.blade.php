@extends('base::layouts.master')
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Cập nhật phiếu nhập kho</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('inventories.nhap_kho.get.list') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-arrow-left"></i> Danh sách phiếu nhập kho</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			@include('base::partials.flash-notifitions')
			<div class="card">
				<div class="card-body">
					<form method="post" action="" id="my-form">
						{{ csrf_field() }}
						<div class="row">
							<div class="form-group col-md-4">
								<label for="inputCustomer" class="control-label col-form-label">Nhà cung cấp</label>
								<select class="form-control" id="inputCustomer" name="customer_id">
									<option value="">Chọn nhà cung cấp</option>
									@foreach($parent as $key => $val)
									<option value="{{ $val->getId() }}" @if($val->getId() == $data->customer_id) selected="" @endif>{{ $val->full_name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="inputDate_export" class=" control-label col-form-label">Ngày thực hiện</label>
								<div class="input-group">
									<input type="text" class="form-control datepicker" id="datepicker" placeholder="mm-dd-yyyy" name="date_export" value="{{ \Carbon\Carbon::parse($data->operation_date)->format('d-m-Y') }}">
									<div class="input-group-append">
										<span class="input-group-text"><i class="icon-calender"></i></span>
									</div>
								</div>
							</div>
							<div class="form-group col-md-2">
								<label for="inputDoc_code" class="control-label col-form-label">Số phiếu nhập kho</label>
								<input type="text" name="doc_code" class="form-control" id="inputDoc_code" placeholder="Số phiếu nhập kho" value="{{ $data->doc_code }}" readonly="">
							</div>
							<div class="col-md-8" style="margin-bottom: 15px;">
								<label for="search-ajax">Tìm sản phẩm</label>
								<input type="text" id="search-ajax" class="form-control" placeholder="Mã Sản Phẩm / Tên Sản Phẩm" autocomplete="off">
								<ul id="result-search" style="display: none;"></ul>
							</div>
							
							<div class="form-group col-md-2">
								<label for="inputKho_id" class=" control-label col-form-label">Kho nhập</label>
								<select class="form-control" id="inputKho_id" name="kho_id">
									<option value="">Chọn kho nhập hàng</option>
									@if($data->doc_details()->count() > 0)
									@foreach($data->doc_details as $k => $value)
									{{ get_category_by_prefix('WAREHOUSE','',0,$value->kho_id) }}
									@endforeach
									@endif
								</select>
							</div>
							<div class="form-group col-md-2">
								<label for="inputKho_id" class=" control-label col-form-label">Tình trạng</label>
								<select class="form-control" id="inputKho_id" name="tinh_trang">
									<option value="0">Chọn tình trạng</option>
									{{ get_category_by_prefix('DOC_STATUS','',0,$data->status_id) }}
								</select>
							</div>
						</div>
						<div class="row docs_detail">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-hover table-bordered">
										<thead style="background-color: #03a9f3; color: #fff;">
											<tr>
												<th>Mã VT</th>
												<th>Tên vật tư</th>
												<th>Đơn giá</th>
												<th>Số lượng</th>
												<th>VAT</th>
												<th>Thành tiền</th>
												<th style="width: 30px;"></th>
											</tr>
										</thead>
										<tbody class="product-order">
											@if($data->doc_details()->count() > 0)
											@foreach($data->doc_details as $k => $value)
											<tr class="remove{{ $value->id }}" style="text-align: center;">
												<td>
													{{ get_product_sku($value->product_id) }}
													<input class="form-control d-none" type="text" name="doc_details[{{$k}}][product_id]" id="product_id{{$k}}" value="{{ $value->product_id }}" style="text-align: center;">
													
												</td>
												<td>
													{{ get_title($value->product_id) }}
												</td>
												<td>
													{{ format_price($value->price) }}đ
													<input class="form-control d-none price-product" name="doc_details[{{ $k }}][price]" id="price{{$value->product_id}}" value="{{ $value->price }}" style="text-align: center;" readonly="" data-price="{{ $value->price }}" data-id="{{ $value->product_id }}">
												</td>
												<td>
													<input class="form-control  quanlity " type="number" name="doc_details[{{$k}}][quantity]" id="quanlity{{ $value->product_id }}" value="{{ $value->quantity }}" style="text-align: center;" data-id="{{ $value->product_id }}">
												</td>
												
												<td>
													<input class="form-control change-vat vat" type="number" name="doc_details[{{$k}}][vat]" id="vat{{ $value->product_id }}" value="{{ $value->vat }}" style="text-align: center;" readonly="">
												</td>
												<td class="sumProduct{{ $value->product_id }} text-center">
													<input value="{{ format_price($value->gia_tri_vat) }}đ" name="gia_tri_vat_1" class="gia-tri-vat-1-{{ $value->product_id }}" id="gia-tri-vat-1-{{ $value->product_id }}" readonly="" style="text-align: center; border: none;">

													<input value="{{ $value->gia_tri_vat }}" name="doc_details[{{ $k }}][gia_tri_vat]" class="d-none gia-tri-vat{{ $value->product_id }}" id="gia-tri-vat{{ $value->product_id }}" readonly="" style="text-align: center; border: none;">

													<input type="" value="{{ $value->gia_tri  }}" name="doc_details[{{ $k }}][gia_tri]" class="d-none gia-tri{{ $value->product_id }}" id="gia-tri-vat{{ $value->product_id }}">
												</td>
												<td>
													<button type="button" href="javascript:void(0)" id="" class="btn btn-sm btn-danger btn_clear btn-delete" data-id="{{ $value->getId() }}">Xóa</button>
												</td>

											</tr>
											@endforeach
											@endif
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="row docs_detail justify-content-between">
							<!-- Order Summary -->
							
							<div class="col-md-4">
								<button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Lưu Đơn Hàng</button>
								<button type="submit" class="btn btn-primary waves-effect waves-light m-t-10">Lưu Nháp</button>
								<button onclick="javascript:window.print();" class="btn btn-default m-t-10" type="button"> <span><i class="fa fa-print"></i> Print</span></button>
							</div>

							<div class="col-md-5">
								<div class="form-group col-md-12">
									<textarea type="text" class="form-control" name="description" id="inputDescription" placeholder="Ghi chú chứng từ"></textarea>
								</div>
							</div>
							
							<div class="col-md-3 table-responsive ">
								<table class="table">
									<thead>
										<tr>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Tổng Giá Trị</td>
											<td class="total-value text-right">0 đ</td>
										</tr>
									</tbody>
								</table>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#search-ajax').keyup(function(){ 
			var query = $(this).val();
			if (query == '' || query.length < 1) {
				$("#result-search").fadeOut();
				return;
			}									        
			var _token = '{{ csrf_token() }}';
			$.ajax({
				url:"{{ route('product.get.autocomplete') }}",
				method: "POST" ,
				data:{
					array : product_id(),
					query : query,
					_token:_token,

				},
				success:function(data){
					// console.log(data);
					if (data.status == 'OK') {
						$("#result-search").fadeIn().html(data.html);
					}
					else{
						$("#result-search").fadeOut();
					}

				}
			});
		});

		$('body').on('click', '.append-record', function() {
			var $productId = $(this).attr('data-id');
			var _token = '{{ csrf_token() }}';
			$.ajax({
				url:"{{ route('importinventory.product.get.findProduct') }}",
				method: "POST" ,
				data:{
					productId : $productId,
					_token:_token,
				},
				success:function(data){
					$(".table tbody.product-order").append(data.html);
					$("#result-search").fadeOut();
					$("#search-ajax").val('');
					$(".total-value").html(total_price_all_product());
				}
			});

		});

		$('body').on('click', '.btn-delete', function() {
			var $id = $(this).attr('data-id');
			$(".remove"+$id).fadeOut(function(){
				$(this).remove();
			});
			$(".total-value").html(total_price_all_product());
		});

		function changeQuanlity(){
			$('body').on('change', '.quanlity', function() {
				var quanlity = $(this).val();
				if (quanlity < 1) {
					$(this).val(1);
					quanlity = 1;
				}
				quanlity = parseInt(quanlity);
				var $id = $(this).attr('data-id');
				var price = $("#price"+$id).attr("data-price");
				var vat = $("#vat"+$id).val();
				price = parseInt(price);
				var TOTAL = Math.round(quanlity * price * (vat/100 + 1));
				var gia_tri = Math.round(quanlity * price );
				$("#gia-tri-vat-1-"+$id).val(format_price(TOTAL)+'đ');
				$("#gia-tri-vat"+$id).val(TOTAL);
				$(".gia-tri"+$id).val(gia_tri);
				$(".total-value").html(total_price_all_product());
			});
		}
		changeQuanlity();


		function product_id(){
			var array = [];
			$(".product-fine-id").each(function(obj , data){
				array.push($(this).attr('data-id'));
			});
			return array;
		}

		function total_price_all_product(){
			var total_all = 0;
			$(".price-product").each(function(obj , data){
				var $id = $(this).attr('data-id');
				var price = parseInt($(this).attr('data-price'));
				price = parseInt(price);
				var quanlity = $("#quanlity"+$id).val();
				quanlity = parseInt(quanlity);
				var vat = $("#vat"+$id).val();
				var TOTAL = Math.round(quanlity * price * (vat/100 + 1));

				total_all += TOTAL;
			});
			return format_price(total_all)+'đ';
		}
	});
</script>
@endpush
@endsection


