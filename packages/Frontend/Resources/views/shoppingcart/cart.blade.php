@extends('frontend::layouts.master')

@section('content')

<!-- Page Title -->
<section id="page-title">

	<div class="container clearfix">
		<h1>{{ trans('frontend::frontend.order') }}</h1>
		<span>{{ trans('frontend::frontend.finish') }}</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ trans('frontend::frontend.home') }}</a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="#">{{ trans('frontend::frontend.cart') }}</a></li>
		</ol>
	</div>

</section><!-- #page-title end -->

<!-- Content -->
<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">
			<div class="row checkout">
				
				<!-- Tóm Tắt Đơn Hàng -->
				<div class="col-md-12 topmargin-sm">
					<div class="table-responsive">
						<table class="table cart topmargin-sm table-bordered">
							<thead>
								<tr>
									<th class="cart-product-name">{{ trans('frontend::frontend.product/service') }}</th>
									<th class="cart-product-subtotal text-right" style="min-width: 120px">{{ trans('frontend::frontend.price') }} </th>
									<th class="cart-product-quantity" style="min-width: 120px">{{ trans('frontend::frontend.quantity') }}</th>
									<!-- <th class="cart-product-quantity" style="min-width: 120px">VAT</th> -->
									<th class="cart-product-subtotal text-right" style="min-width: 120px">{{ trans('frontend::frontend.intomoney') }}</th>
									<th style="width: 20px"></th>
								</tr>
							</thead>
							<tbody>
								@php $sum = 0; @endphp

								@foreach($items as $key => $item)
								<!-- Cart item -->
								<tr class="cart_item" id="product-{{ $item->rowId }}">
									<td class="cart-product-name">
										<a href="{{ $item->options->url }}">{{ $item->name }}</a>
										<p>
											{{ trans('frontend::frontend.size') }} : {{ \TTSoft\Products\Entities\Attribute::find($item->options->size) ? \TTSoft\Products\Entities\Attribute::find($item->options->size)->title : null }} - 
											{{ trans('frontend::frontend.color') }} : {{ \TTSoft\Products\Entities\Attribute::find($item->options->size) ? \TTSoft\Products\Entities\Attribute::find($item->options->color)->title : null }}
										</p>
									</td>

									<td class="cart-product-subtotal text-right">
										<span class="amount">{{ format_price($item->price) }}đ</span>
									</td>

									<td class="cart-product-quantity">
										<div class="quantity clearfix">
											<!-- <input type="button" value="-" class="minus" onclick="down_price()"> -->
											<input type="number" name="quantity" value="{{ $item->qty }}" class="qty number cart-update" data-rowId="{{ $item->rowId }}">
											<!-- <input type="button" value="+" class="plus" onclick="up_price()"> -->
										</div>
									</td>
									{{-- <td class="cart-product-quantity">
										<div class="quantity clearfix">
											<input type="number" name="vat" value="{{ $item->options->vat }}" class="qty vat" readonly="">
										</div>
									</td> --}}
									<td class="cart-product-subtotal text-right">
										<span class="amount" id="change-{{ $item->rowId }}">{{ format_price(($item->price) * $item->qty) }}đ</span>
									</td>
									<td><a href="javascript:void(0)" class="clear-item btn-remove" data-rowId="{{ $item->rowId }}"><i class="fa fa-times"></i></a></td>
								</tr>
								@php 
								$sum+= ($item->price) * $item->qty;
								@endphp
								@endforeach

								@push('js')
								<script type="text/javascript">

									$("body").on("change",".cart-update",function(event){
										var rowId = $(this).attr('data-rowId');
										var qty = $(this).val();
										$.ajax({
											url: '{{ route('web.account.post.updateCart') }}',
											type: 'POST',
											dataType: 'json',
											data: {rowId: rowId ,_token : '{{ csrf_token() }}',qty : qty },
										})
										.done(function(data) {
											$(".quantity-count").text(data.sl);
											$("#change-"+rowId).html(data.price_new  + 'đ');
											$(".sup-total-order , .total-order").html(data.total  + 'đ');
										})
										.fail(function(data) {
											console.log(data);
										});
									});


									$("body").on("click",".btn-remove",function(event){
										var confirmRemove = confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?');
										if (!confirmRemove) {
											return confirmRemove;
										}
										var rowId = $(this).attr('data-rowId');
										$.ajax({
											url: '{{ route('web.cart.post.removeItem') }}',
											type: 'POST',
											dataType: 'json',
											data: {rowId: rowId ,_token : '{{ csrf_token() }}' },
										})
										.done(function(data) {
											var htmlClear = '<div class="col-lg-12"><p>Chưa có sản phẩm trông giỏ hàng <a href="{{ url('san-pham-khuyen-mai.html') }}">Click</a> ở đây để mua hàng.</p></div>';
											if (data.sl == 0) {
												$(".cart-content").html(htmlClear);
											}
											$(".quantity-count").text(data.sl);
											$(".sup-total-order , .total-order").html(data.total + 'đ');
											$("#product-" + rowId).fadeOut(function(){
												$(this).remove();
											});
										})
										.fail(function(data) {
											console.log(data);
										});
									});
								</script>
								@endpush

								<!-- Cart total -->
								<tr>
									<td colspan="3">{{ trans('frontend::frontend.total') }}</td>
									<td class="text-right" colspan="2"><span style="font-weight: bold;" class="sup-total-order">{{ format_price($sum) }}đ</span></td>
								</tr>
								<!-- <tr>
									<td colspan="4">{{ trans('frontend::frontend.sale') }}</td>
									<td class="text-right" colspan="2"><span style="font-weight: bold;">0đ</span></td>
								</tr> -->
								{{-- <tr>
									<td colspan="4">{{ trans('frontend::frontend.intomoney') }}</td>
									<td class="text-right" colspan="2"><span style="font-weight: bold;" class="total-order">{{ format_price($sum) }}đ</span></td>
								</tr> --}}
							</tbody>

						</table>
					</div>
				</div>

			</div>


			<div class="row">
				<div class="col-sm-12 text-right">
					<a href="{{ url('san-pham.html') }}" class="btn btn-rounded btn-default">{{ trans('frontend::frontend.shopping') }} </a>
					<a href="{{ url('checkout') }}" class="btn btn-rounded btn-info">{{ trans('frontend::frontend.pay') }} </a>
				</div>
			</div>
		</div>

	</div>

</section><!-- #content end -->

@endsection

@push('js')
<script>
	$(function() {
		$( "#processTabs" ).tabs({ show: { effect: "fade", duration: 400 } });
		$( ".tab-linker" ).click(function() {
			$( "#processTabs" ).tabs("option", "active", $(this).attr('rel') - 1);
			return false;
		});
	});
	function up_price(){
		var qtypro = $(".qty").val();
		qtypro = parseInt(qtypro);
		if( !isNaN( qtypro )) {
			$(".qty").val(qtypro + 1);
		}
		return false;
	}

	function down_price(){
		var qtypro = $(".qty").val(); 
		qtypro = parseInt(qtypro);
		if( !isNaN( qtypro ) && qtypro > 1 ){
			$(".qty").val(qtypro - 1);
		}
		return false;
	}
</script>
@endpush