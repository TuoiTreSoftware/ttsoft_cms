@extends('base::layouts.master')
@section('content')
<div class="container-fluid" id="orderDetail">
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
               <form class="m-t-20" method="post" action="" id="validation">
                  {{ csrf_field() }}
                  <div class="row">
                     <div class="col-md-12">
                        <div class="row">
                           <div class="form-group col-md-8">
                              <label for="customer_id" class="control-label col-form-label">Khách hàng</label>
                              <select class="form-control" name="customer_id">
                                 <option>Tên / Số Điện Thoại / Email</option>
                                 @foreach(get_all_customers() as $value)
                                 	<option value="{{ $value->getId() }}" @if($billing->customer_id == $value->getId()) selected="" @endif>{{ $value->phone_number }} - {{ $value->full_name }} - {{ $value->email }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputEmail3" class="control-label col-form-label">Số đơn hàng</label>
                              <input type="text" class="form-control" name="SDH" id="SDH" readonly="" value="{{ $billing->doc_code }}">
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputEmail3" class=" control-label col-form-label">Ngày mua</label>
                              <input type="text" class="form-control" name="created_at" id="created_at" readonly="" value="{{ \Carbon\Carbon::parse($billing->created_at)->format('d-m-Y') }}">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-4">
                              <label for="inputEmail3" class=" control-label col-form-label">Đ/C khách hàng</label>
                              <input type="text" class="form-control" name="address" autocomplete="off" id="address" placeholder="Địa chỉ giao hàng" value="{{ $billing->address }}">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="inputEmail3" class=" control-label col-form-label">Ghi chú</label>
                              <input type="text" class="form-control" name="note" autocomplete="off" id="note" placeholder="Ghi chú đơn hàng" value="{{ $billing->note }}">
                           </div>

                           <div class="form-group col-md-4">
                              <label for="inputEmail3" class=" control-label col-form-label">Ngày giao hàng</label>
                              <input type="text" class="form-control datepicker" name="date_delivery" id="date_delivery" value="{{ $billing->date_delivery }}">
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
                  {{-- <div class="row">
                     <div class="col-md-6" style="margin-bottom: 15px;">
                        <label for="search-ajax">Tìm sản phẩm</label>
                        <input type="text" id="search-ajax" class="form-control" placeholder="Mã Sản Phẩm / Tên Sản Phẩm" autocomplete="off">
                        <ul id="result-search" style="display: none;"></ul>
                     </div>
                  </div> --}}
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
                			$(".total-value").html(total_price_all_product());
                			$('.payvalue').html(total_price_all_product());

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
                                    <!-- <th style="width: 50px;">VAT</th> -->
                                    <th style="width: 100px;">Thành tiền</th>
                                    <th style="width: 30px"></th>
                                 </tr>
                              </thead>
                              <tbody class="product-order">
                              	@if(!empty($billing->doc_details))
                              		@foreach($billing->doc_details as $k => $v)
                              			@php
                              				$product = \TTSoft\Products\Entities\Product::find($v->product_id);
                              			@endphp
                              			@include("sales::don_hang_ban.edit_appends",compact('product','v'))
                              		@endforeach
                              	@endif
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="row docs_detail justify-content-between">
                     <!-- Thanh toán -->
                     <div class="col-md-6 table-responsive">
                        @if($payment)
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th colspan="7">THÔNG TIN THANH TOÁN QUA ALEPAY</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td colspan="6">Mã giao dịch</td>
                                 <td>{{ $payment->transactionCode }}</td>
                              </tr>
                              <tr>
                                 <td colspan="6">Số tiền giao dịch</td>
                                 <td>{{ format_price($payment->amount) }} đ</td>
                              </tr>
                              <tr>
                                 <td colspan="6">Phí giao dịch</td>
                                 <td>{{ format_price($payment->merchantFee) }} đ</td>
                              </tr>
                              <tr>
                                 <td colspan="6">Email giao dịch</td>
                                 <td>{{ $payment->buyerEmail }}</td>
                              </tr>
                              <tr>
                                 <td colspan="6">Phone giao dịch</td>
                                 <td>{{ $payment->buyerPhone }}</td>
                              </tr>
                              <tr>
                                 <td colspan="6">Tên giao dịch</td>
                                 <td>{{ $payment->buyerName }}</td>
                              </tr>
                              <tr>
                                 <td colspan="6">Số thẻ giao dịch</td>
                                 <td>{{ $payment->cardNumber }}</td>
                              </tr>
                              <tr>
                                 <td colspan="6">Thông tin giao dịch</td>
                                 <td>{{ $payment->message }}</td>
                              </tr>
                              <tr>
                                 <td colspan="6">Loại giao dịch</td>
                                 <td>{{ $payment->method }}</td>
                              </tr>
                              <tr>
                                 <td colspan="6">Mã ngân hàng giao dịch</td>
                                 <td>{{ $payment->bankCode }}</td>
                              </tr>
                              <tr>
                                 <td colspan="6">Ngân hàng giao dịch</td>
                                 <td>{{ $payment->bankName }}</td>
                              </tr>
                           </tbody>
                        </table>
                        @endif
                     </div>
                     <div class="col-md-6 table-responsive">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th colspan="7">THÔNG TIN THANH TOÁN</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td colspan="6"  >Tổng đơn hàng</td>
                                 <td class="text-right">{{ format_price($billing->sumOrder()) }}đ</td>
                              </tr>
                              @if($billing->discount_code !== null)
                              <tr>
                                 <td colspan="6">Mã Giảm Giá: <strong>{{ $billing->discount_code }}</strong></td>
                                 <td class="text-right">
                                    @if(discountValue($billing->discount_code)->type === 1)
                                      {{ format_price(discountValue($billing->discount_code)->value) }} đ
                                    @else
                                      {{ discountValue($billing->discount_code)->value }} %
                                    @endif
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="6">Thành tiền</td>
                                 <td class="text-right">{{ format_price($billing->discount_price) }}đ</td>
                              </tr>
                              @endif
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group m-b-0">
                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Lưu Đơn Hàng</button>
                           <button onclick="PrintElem('orderDetail')" class="btn btn-default m-t-10" type="button"> <span><i class="fa fa-print"></i> Print</span></button>
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

<script type="text/javascript">
  function PrintElem(orderDetail)
  {
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById(orderDetail).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
  }
</script>
@endpush