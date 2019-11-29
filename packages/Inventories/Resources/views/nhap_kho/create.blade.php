@extends('base::layouts.master')
@push('css')
@endpush
@section('content')

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Thêm Mới Phiếu Nhập Kho</h4>
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
					<form method="post" action="{{ route('inventories.nhap_kho.post.add') }}" id="my-form">
						{{ csrf_field() }}
						<div class="row">
							<div class="form-group col-md-8">
								<label for="inputCustomer">Nhà cung cấp</label>
								<select class="form-control" id="inputCustomer" name="customer_id">
									<option value="">Chọn nhà cung cấp</option>
									@foreach(get_customer_list() as $key => $val)
									<option value="{{ $val->getId() }}">{{ $val->getTitle() }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-2">
								<label for="inputDate_export">Ngày thực hiện</label>
								<div class="input-group">
									<input type="text" class="form-control" value="{{ today()->format('d-m-Y') }}" name="date_export">
									<div class="input-group-append">
										<span class="input-group-text"><i class="icon-calender"></i></span>
									</div>
								</div>
							</div>
							<div class="form-group col-md-2">
								<label for="inputDoc_code" >Số phiếu nhập kho</label>
								<input type="text" name="doc_code" class="form-control" id="inputDoc_code" placeholder="Số phiếu nhập kho" value="NK{{ Carbon\Carbon::now()->year }}{{ Carbon\Carbon::now()->month }}" readonly="">
							</div>
							<div class="col-md-8" style="margin-bottom: 15px;">
								<label for="search-ajax">Tìm sản phẩm</label>
								<input type="text" id="search-ajax" class="form-control" placeholder="Mã Sản Phẩm / Tên Sản Phẩm" autocomplete="off">
								<ul id="result-search" style="display: none;"></ul>
							</div>
							
							
							<div class="form-group col-md-2">
								<label for="inputKho_id" >Kho nhập</label>
								<select class="form-control" id="inputKho_id" name="kho_id">
									<option value="0">Chọn kho nhập</option>
									{{ get_category_by_prefix('WAREHOUSE','',0,'') }}
								</select>
							</div>
							<div class="form-group col-md-2">
								<label for="inputKho_id" >Tình trạng</label>
								<select class="form-control" id="inputKho_id" name="tinh_trang">
									<option value="0">Tình trạng</option>
									{{ get_category_by_prefix('DOC_STATUS','',0,'') }}
								</select>
							</div>
						</div>
						
						<div class="row">
							
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
				url:"{{ route('importinventory.get.autocomplete') }}",
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
				$("#gia-tri-vat-1"+$id).val(format_price(TOTAL)+'đ');
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
				quanlity = parseInt(price);
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


