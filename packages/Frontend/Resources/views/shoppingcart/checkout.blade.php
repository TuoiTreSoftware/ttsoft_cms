@extends('frontend::layouts.master')
@push('css')
<style type="text/css">
.payment-gateway {
	display: block;
	position: relative;
	line-height: 24px;
	margin: 0;
	font-size: 14px;
	font-weight: bold;
	color: #444;
	cursor: pointer;
	border-top: 1px dotted #DDD;
	padding: 10px 0 10px 20px;
}
.payment-content {
	padding: 0 0 15px 20px;
}
.payment-content ul li{
	list-style: none;
}
</style>
@endpush

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
		<form class="form-horizontal" action="" method="POST" id="order-form">
			{{ csrf_field() }}
			<div class="container clearfix">
				<div class="row checkout">

					<!-- Thông Tin Thanh Toán -->
					<div class="col-md-4 topmargin-sm">
						<h4>{{ trans('frontend::frontend.information') }} </h4>
						<div class="form-group">
							<label>{{ trans('frontend::frontend.name') }}</label>
							<input type="text" name="full_name" class="form-control">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label>{{ trans('frontend::frontend.phone') }}</label>
							<input type="text" name="phone_number" class="form-control">
						</div>
						<div class="form-group">
							<label>{{ trans('frontend::frontend.address') }}</label>
							<input type="text" name="address" class="form-control">
						</div>
						<div class="form-group">
							<label>{{ trans('frontend::frontend.city') }}</label>
							<select name="province" class="form-control">
								<option value="">{{ trans('frontend::frontend.city') }}</option>
								@foreach(get_provinces() as $item)
								<option value="{{ $item->name }}">{{ $item->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>{{ trans('frontend::frontend.note') }}</label>
							<textarea name="note" class="form-control" placeholder="{{ trans('frontend::frontend.note') }}"></textarea>
						</div>

					</div>
					<!-- Phương Thức Thanh Toán -->
					<div class="col-md-4 topmargin-sm">
						<h4>{{ trans('frontend::frontend.paymentmethod') }}</h4>
						<div class="accordion clearfix">

							<div class="payment-gateway">
								<input id='radio' type="radio" name="payment_method" value="chuyen_khoan_ngan_hang " class="change-payment-type check">
								<label for="radio">{{ trans('frontend::frontend.bank') }}</label>
							</div>
							<div class="payment-content clearfix chuyen_khoan_ngan_hang" style="display: none;">
								<div style="padding-left: 30px;">
									<ul style="margin-bottom: 0">
										<li><strong>1. </strong>{{ trans('frontend::frontend.vietcombank') }} <br> - 
											{{ trans('frontend::frontend.account') }} :CÔNG TY TNHH VIKEN SPORTS VIỆT NAM.<br> - 
											{{ trans('frontend::frontend.accountnumber') }} : 898704060003277<br> - 
											Bank :  Ngân hàng TMCP Quốc Tế Việt Nam (VIB) - CN Khách Hàng Doanh Nghiệp Nước Ngoài Phía Nam .<br>
										</li>
									</ul>
								</div>
							</div>

							<div class="payment-gateway">
								<input id="radio2" type="radio" name="payment_method" value="credit_cart" class="change-payment-type check" checked="checked">
								<label for="radio2">Visa / Master Card JCB</label>
							</div>
							<div class="payment-content clearfix credit_cart" style="display: none;">
								<div style="padding-left: 30px;">
									<ul style="margin-bottom: 0">
										<li>
											{{ trans('frontend::frontend.Alepay') }} <br />
											<img src="https://alepay.vn/images/alego-Logo.png" width="150">
										</li>
									</ul>
								</div>
							</div>

							@push('js')
							<script type="text/javascript">
								$('body').on("change",".change-payment-type",function(){
									var clazz = $(this).val();
									$("."+clazz).toggle(200);
									if (clazz == 'chuyen_khoan_ngan_hang') {
										$(".credit_cart").hide(100);
									}
									if (clazz == 'credit_cart') {
										$(".chuyen_khoan_ngan_hang").hide(100);
									}
								});
							</script>
							@endpush
						</div>
					</div>
					
					<!-- Mã giảm giá -->
					<div class="col-md-4 topmargin-sm">
						<h4>{{ trans('frontend::frontend.line') }}</h4>
						<table class="table" id="checkout-review-table">
							<thead>

								<tr>
									<th>{{ trans('frontend::frontend.product/service') }}</th>
									<th class="a-center">{{ trans('frontend::frontend.price') }}</th>
									<th class="a-center">{{ trans('frontend::frontend.quantity') }}</th>
									<!-- <th class="a-center">VAT</th> -->
									<th class="a-center">{{ trans('frontend::frontend.intomoney') }}</th>
								</tr>
							</thead>
							<tbody class="review-items">
								@php $sum = 0; @endphp
								@foreach(Cart::content() as $item)
								@php
								$value_vat = ($item->price) / 100;
								@endphp
								<tr>
									<td><a href="{{ $item->options->url }}"><img width="30" src="{{ $item->options->image }}"></a></td>
									<td class="a-right">{{ format_price($item->price) }}đ</td>
									<td class="a-center">{{ $item->qty }}</td>
									{{-- <td class="a-center">{{ $item->options->vat }}</td> --}}
									<td class="a-right text-right">{{ format_price(($item->price) * $item->qty) }}đ</td>
								</tr>
								@php 
								$sum+=(($item->price) * $item->qty);
								@endphp
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3"> {{ trans('frontend::frontend.total') }} : </td>
									<td class="text-right">{{ format_price($sum) }}đ</td>
								</tr>
								<tr>
									<td colspan="3"> {{ trans('frontend::frontend.sale') }} : </td>
									<td style="" class="a-right text-right"> 
										<span class="price-code">
											{{ (session()->has('discount')) ? format($sum-session()->get('discount')['price']).'đ' : '0đ'  }}
										</span>
									</td>
								</tr>
								<tr>
									<td colspan="3"> <strong>{{ trans('frontend::frontend.intomoney') }} : </strong></td>
									<td style="" class="a-right text-right"> 
										<strong><span class="price-total">
											{{ (session()->has('discount')) ? format(session()->get('discount')['price']).'đ' : format_price($sum)  }}đ</span>
										</strong>
									</td>
								</tr>
							</tfoot>
						</table>
						<h4>{{ trans('frontend::frontend.codesale') }} ?</h4>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="{{ trans('frontend::frontend.yourcodesale') }}" name="discount" autocomplete="off" value="{{ (session()->has('discount')) ? session()->get('discount')['code_sale'] : ''  }}">
							<div class="input-group-append">
								<button class="btn btn-outline-secondary btn-info btn-discount" type="button">{{ trans('frontend::frontend.apply') }}</button>
							</div>

						</div>
						<p class="discount" style="margin-bottom: 10px;"></p>

						<button type="submit" class="btn btn-rounded btn-lg btn-info"> {{ trans('frontend::frontend.ordernow') }}</button>
					</div>

				</div>
			</div>
		</form>
	</div>
</section><!-- #content end -->
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js') }}"></script>
<script type="text/javascript">
	function clearHtml(){
		$('p.discount').html('');
	}
	jQuery(document).ready(function($) {
		$("body").on('click', '.btn-discount', function() {
			clearHtml();
			$.ajax({
				url: "{{ route('frontend.insert.data.checkCodeDiscount') }}",
				type: 'POST',
				dataType: 'json',
				data: {
					code_sale : $('input[name=discount]').val(),
					paymentType : $('input[name=payment_method]:checked').val(),
					_token : '{{ csrf_token() }}'
				},
			})
			.done(function(data) {
			//console.log(data);
			if(data.status == 'discount'){
				$("span.price-code").html(data.total_sale);
				$("span.price-total").html(data.total_price);
				$("p.discount").css('color','blue').text(data.messages);
			}
			else{
				$('p.discount').css('color','red').text(data.messages);
			}
		})
			.fail(function(error) {
				console.log(error);
			});

		});
	});
</script>
{!! JsValidator::formRequest(\TTSoft\Frontend\Http\Requests\Web\OrderRequest::class,"#order-form") !!}
@endpush