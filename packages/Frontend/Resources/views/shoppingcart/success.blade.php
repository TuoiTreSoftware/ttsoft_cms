@extends('frontend::layouts.master')

@section('content')

<!-- Page Title -->
<section id="page-title">

	<div class="container clearfix">
		<h1>{{ trans('frontend::frontend.ordersuccess') }}</h1>
		<span>{{ trans('frontend::frontend.notification') }} {{ web_config('site_name')}}!</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ trans('frontend::frontend.home') }}</a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="#">Success</a></li>
		</ol>
	</div>
</section><!-- #page-title end -->
<!-- Content -->
<section id="content">
	<div class="container topmargin bottommargin">
		<div class="row">
			<div class="col-md-6">
				<div class="promo promo-border promo-center">
					<h3>{{ trans('frontend::frontend.slogan') }}</h3>
					<span>{{ trans('frontend::frontend.refer') }}</span>
					<a href="{{ route('web.product.get.getProductList') }}" class="button button-xlarge button-rounded">{{ trans('frontend::frontend.getoutnow') }}</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="table-responsive">
					<table class="table cart">
						<tbody>
							<tr class="cart_item">
								<td class="notopborder cart-product-name">
									<strong>{{ trans('frontend::frontend.name') }}</strong>
								</td>

								<td class="notopborder cart-product-name">
									<span class="amount">{{ $customer->first_name }} {{ $customer->last_name }}</span>
								</td>
							</tr>
							<tr class="cart_item">
								<td class="cart-product-name">
									<strong>{{ trans('frontend::frontend.phone') }}:</strong>
								</td>

								<td class="cart-product-name">
									<span class="amount">{{ $customer->phone_number }}</span>
								</td>
							</tr>
							<tr class="cart_item">
								<td class="cart-product-name">
									<strong>Email:</strong>
								</td>

								<td class="cart-product-name">
									<span class="amount">{{ $customer->email }}</span>
								</td>
							</tr>
							<tr class="cart_item">
								<td class="cart-product-name">
									<strong>{{ trans('frontend::frontend.address') }}:</strong>
								</td>

								<td class="cart-product-name">
									<span class="amount">{{ $customer->address }}</span>
								</td>
							</tr>
							<tr class="cart_item">
								<td class="cart-product-name">
									<strong>{{ trans('frontend::frontend.total') }}:</strong>
								</td>

								<td class="cart-product-name">
									<span class="amount">{{ format_price($sum) }} đ</span>
								</td>
							</tr>
							<tr class="cart_item">
								<td class="cart-product-name">
									<strong>{{ trans('frontend::frontend.note') }}:</strong>
								</td>

								<td class="cart-product-name">
									<span class="amount">{!! $billing->note !!}</span>
								</td>
							</tr>
						</tbody>
					</table>
					@php
					session()->forget(['customer','sum','billing']);
					@endphp
				</div>
			</div>
		</div>
	</div>
</section><!-- #content end -->
@endsection
