@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-5 align-self-center">
         <h4 class="text-themecolor">Tạo  đơn hàng</h4>
      </div>
      <div class="col-md-7 align-self-center text-right">
         <div class="d-flex justify-content-end align-items-center">
            <a href={{ route('sales.don_hang_ban.get.list') }} class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Danh sách đơn hàng</a>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <form class="m-t-20" method="post" action="{{ route('sales.don_hang_ban.get.postCreateOrder') }}" id="validation">
                  {{ csrf_field() }}
                  <div class="row">
                     <div class="col-md-12">
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label for="customer_id" class="control-label col-form-label">Khách hàng</label>
                              <select class="form-control" name="customer_id">
                                 <option value="">Tên / Số Điện Thoại / Email</option>
                                 @foreach(get_all_customers() as $value)
                                 <option value="{{ $value->getId() }}">{{ $value->phone_number }} - {{ $value->full_name }} - {{ $value->email }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputEmail3" class="control-label col-form-label">Số đơn hàng</label>
                              <input type="text" class="form-control" name="SDH" id="SDH" placeholder="SO201804001" readonly="">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputEmail3" class=" control-label col-form-label">Ngày chứng từ</label>
                              <input type="text" class="form-control" name="date_delivery" id="date_delivery" readonly="" placeholder="09/05/2018">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="status" class=" control-label col-form-label">Trạng thái</label>
                              <select name="status" class="form-control select2">
                                <option value="0">đã thanh toán</option>
                                <option value="1">chưa thanh toán</option>
                              </select>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label for="inputEmail3" class=" control-label col-form-label">Đ/C khách hàng</label>
                              <input type="text" class="form-control" name="address" autocomplete="off" id="address" placeholder="Địa chỉ giao hàng">
                           </div>
                           <div class="form-group col-md-6">
                              <label for="inputEmail3" class=" control-label col-form-label">Ghi chú</label>
                              <input type="text" class="form-control" name="note" autocomplete="off" id="note" placeholder="Ghi chú đơn hàng">
                           </div>
                        </div>
                     </div>
                  </div>
                  <style type="text/css">
                     #result-search{
                        list-style: none;padding: 0;
                        border: solid 1px #ccc;
                        border-bottom: none;
                        position: absolute;
                        z-index: 9999;
                        background-color: #fff;
                        width: 532px;
                     }
                     #result-search li{
                        padding: 7px;
                        border-bottom: solid 1px #ccc;
                     }
                     #result-search li img{
                        width: 45px;
                        float: left;
                        margin-right: 10px;
                     }
                  </style>
                  <div class="row">
                     <div class="col-md-6" style="margin-bottom: 15px;">
                        <label for="search-ajax">Tìm sản phẩm</label>
                        <input type="text" id="search-ajax" class="form-control" placeholder="Mã Sản Phẩm / Tên Sản Phẩm" autocomplete="off">
                        <ul id="result-search" style="display: none;"></ul>
                     </div>
                  </div>
                  <div class="row docs_detail">
                     @push('jQuery')
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
                        			url:"{{ route('sales.don_hang_ban.get.autocomplete') }}",
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
	                			// $('#search-ajax').blur(function(){
	                			//  	$("#result-search").fadeOut();
	                			// });
	                
	                			// $('#search-ajax').focus(function(){
	                			//  	$("#result-search").fadeIn();
	                			// });
	                			$('body').on('click', '.append-record', function() {
	                				var $productId = $(this).attr('data-id');
	                				var _token = '{{ csrf_token() }}';
	                				$.ajax({
	                					url:"{{ route('sales.don_hang_ban.get.findProduct') }}",
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
                                    $('.payvalue').html(total_price_all_product());
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
	                					    price = parseInt(price);
                                 var vat = $("#vat"+$id).val();
                                     vat = parseInt(vat);
                                 var price_vat = (price * vat) / 100;
                                     price_vat = parseInt(price_vat);
	                					var TOTAL = quanlity * (price + price_vat);
	                					$(".sumProduct"+$id).html(format_price(TOTAL)+'đ');
	                					$(".total-value").html(total_price_all_product());
                                 $('.payvalue').html(total_price_all_product());
	                				});
	                			}
	                			changeQuanlity();

                           //thay doi VAT
                           function changeVAT(){
                              $('body').on('change', '.vat', function() {
                                 var vat = $(this).val();
                                 if (vat < 0) {
                                    $(this).val(0);
                                    vat = 0;
                                 }
                                 vat = parseInt(vat);
                                 var $id = $(this).attr('data-id');
                                 var price = $("#price"+$id).attr("data-price");
                                     price = parseInt(price);
                                 var quanlity = $("#quanlity"+$id).val();
                                     quanlity = parseInt(quanlity);
                                 var price_vat = (price * vat) / 100;
                                     price_vat = parseInt(price_vat);
                                 var TOTAL = quanlity * (price + price_vat);
                                 $(".sumProduct"+$id).html(format_price(TOTAL)+'đ');
                                 $(".total-value").html(total_price_all_product());
                                 $('.payvalue').html(total_price_all_product());
                              });
                           }
                           changeVAT();
	                
	                			
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
                                     vat = parseInt(vat);
                                 var price_vat = (price * vat) / 100;
                                     price_vat = parseInt(price_vat);
	                					var TOTAL = quanlity * (price + price_vat);
	                
	                					total_all += TOTAL;
	                				});
	                				return format_price(total_all)+'đ';
	                			}

                           function SUM(){
                              var total_all = 0;
                              $(".price-product").each(function(obj , data){
                                 var $id = $(this).attr('data-id');
                                 var price = parseInt($(this).attr('data-price'));
                                     price = parseInt(price);
                                 var quanlity = $("#quanlity"+$id).val();
                                     quanlity = parseInt(quanlity);
                                 var vat = $("#vat"+$id).val();
                                     vat = parseInt(vat);
                                 var price_vat = (price * vat) / 100;
                                     price_vat = parseInt(price_vat);
                                 var TOTAL = quanlity * (price + price_vat);
                   
                                 total_all += TOTAL;
                              });
                              return total_all;
                           }

                           function changeTienKhachDua(){
                              $('body').on('change', '.tien_khach_dua', function() {
                                 var money = $(this).val();
                                     money = parseInt(money);
                                 if (money < SUM()) {
                                    alert('Tiền đưa không được nhỏ hơn giá trị đơn hàng');
                                    return;
                                 }
                                 var tien_thoi_lai = money - SUM();
                                     tien_thoi_lai = parseInt(tien_thoi_lai);
                                 $(".tien_thoi_lai").html(format_price(tien_thoi_lai)+'đ');
                              });
                           }
                           changeTienKhachDua();
	                		});
                     </script>
                     @endpush
                     <div class="col-md-12">
                        <div class="table-responsive">
                           <table class="table table-bordered">
                              {{--  table-bordered --}}
                              <thead>
                                 <tr>
                                    <th style="width: 60px;">MSP</th>
                                    <th>Tên sản phẩm / Dịch vụ</th>
                                    <th style="width: 100px;">Đơn giá</th>
                                    <th style="width: 100px;">Số lượng</th>
                                    <th style="width: 50px;">VAT</th>
                                    <th style="width: 100px;">Thành tiền</th>
                                    <th style="width: 30px"></th>
                                 </tr>
                              </thead>
                              <tbody class="product-order"></tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="row docs_detail justify-content-between">
                     <!-- Order Summary -->
                     <div class="col-md-4 table-responsive">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th colspan="2">THÔNG TIN ĐƠN HÀNG</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Tổng Đơn Hàng</td>
                                 <td class="total-value text-right">0 đ</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     
                  </div>
                  <div class="row">
                     <div class="form-group m-b-0">
                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Lưu Đơn Hàng</button>
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
@push('jQuery')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
{!! JsValidator::formRequest('TTSoft\Sales\Http\Requests\ValidationSalesRequest', '#validation'); !!}
@endpush