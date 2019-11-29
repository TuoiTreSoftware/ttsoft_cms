@extends('frontend::layouts.master')

@push('css')

<title>{{ web_config('site_name') }}</title>

@endpush

@section('content')

<!-- Slider -->

@include ('frontend::home.slider')

<!-- Content -->
<section id="content">

	<div class="content-wrap nopadding">
		<!-- Best Selling Products -->
		@php 
		$SECTION_1 = \TTSoft\Home\Entities\Home::getFirstKey(\TTSoft\Home\Entities\Home::SECTION_1);
		$data = $SECTION_1->content;
		$data = json_decode($data);
		@endphp
		@if($SECTION_1)
		<div class="section clearfix notopmargin">
			<div class="container clearfix">

				<div class="heading-block nobottomborder center">
					<h3 class="t400">{{ get_key_home_frontend('SECTION_1')->title }}</h3>

				</div>
				<div class="row clearfix">
					@foreach(getProductBestSelling($data->category,$data->limit) as $key => $value)
					<div class="col-lg-3 col-md-6">
						<div class="iportfolio clearfix">
							<div class="portfolio-image clearfix">
								<div class="fslider" data-pagi="false" data-animation="fade" data-slideshow="false">
									<div class="flexslider">
										<div class="slider-wrap">
											<div class="slide"><a href="{{ $value->getRoute() }}">
												<img src="{{ $value->image }}" alt="Grey Bag"></a>
											</div>
											@if(count($value->productImages) > 0)
											<div class="slide">
												<a href="{{ $value->getRoute() }}">
													<img src="{{ $value->productImages()->first()->image }}" alt="Grey Bag">
												</a>
											</div>
											@endif
										</div>
									</div>
								</div>
								{{-- <div class="product-cart"><a href="#"><i class="icon-shopping-cart"></i></a></div> --}}
								<div class="product-quickview"><a href="#" data-toggle="tooltip" data-placement="top" title="Sizes: @foreach($value->getSizeAttribute() as $key => $val) {{$val->title}} @endforeach"><i class="icon-info"></i></a>
								</div>
							</div>
							<div class="portfolio-desc nobottompadding">
								<h3><a href="{{ $value->getRoute() }}">{{ $value->title }}</a></h3>
								<span class="notopmargin"><a href="{{ $value->category->getRoute() }}">{{ getCategoryLang($value->product_category_id) }}</a></span>
								@if($value->getPrice() > $value->getPriceSale() && $value->getPriceSale() != null)
								<div class="item-price product-price">
									<span>
										<del class="">{{ format_price($value->getPrice()) }} đ</del> 
									</span>
								</div>
								<div class="item-price " style="float: right;">
									<span>
										<ins>{{ format_price($value->getPriceSale()) }} đ</ins>
									</span>
								</div>
								@else
								<div class="item-price " style="float: right;">
									<span>
										<ins>{{ format_price($value->getPrice()) }} đ</ins>
									</span>
								</div>
								@endif
									{{-- <div class="rating-stars">
										<i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i>
									</div> --}}
								</div>
							</div>
						</div>
						<div class="w-100 bottommargin d-block d-md-none"></div>
						@endforeach
					</div>

				</div>
			</div>
			@endif
			<div class="clear"></div>
			<!-- feature product -->
			@php 
			$SECTION_2 = \TTSoft\Home\Entities\Home::getFirstKey(\TTSoft\Home\Entities\Home::SECTION_2);
			$data = $SECTION_2->content;
			$data = json_decode($data);
			@endphp
			@if($SECTION_2)
			@foreach(getProductid($data->category) as $key => $val)
			<div class="section nobg">
				<div class="container clearfix">
					<div class="row clearfix">
						<div class="col-lg-5">
							<div id="oc-images" class="banner-carousel owl-carousel image-carousel carousel-widget custom-js">
								<div class="oc-item">
									<a href="{{ $val->getRoute() }}"><img src="{{ $val->image }}" alt="Image 1"></a>
								</div>
							</div>
						</div>
						<div class="col-lg-5 offset-lg-1">
							<div class="featured-item topmargin">
								<div class="item-title">
									<div class="before-heading t600 ls5"><a href="{{ route('web.product.get.getProductList') }}" style="color: #aab7bd !important;">{{ trans('frontend::frontend.vikenshoes') }}<i class="icon-angle-right"></i></a></div>
									<h3><a href="{{ $val->getRoute() }}">{{ $val->title }}.</a></h3>
								</div>
								<div class="item-meta font-secondary">
									SKU: {{ $val->sku }}.
									{{ trans('frontend::frontend.category') }}: <a href="{{ $val->category->getRoute() }}">{{ getCategoryLang($val->product_category_id) }}</a>
								</div>
								<div class="clear"></div>
								<div class="item-desc">
									<p>{!! $val->description !!}</p>
								</div>
							<!-- <div class="item-color bottommargin-sm">
								<span>Available Colors:</span>
								<div id="item-color-dots" class="owl-dots"></div>
							</div> -->
							<a class="button button-border button-circle nomargin font-secondary" href="{{ $val->getRoute() }}">{{ trans('frontend::frontend.viewdetails') }}</a>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		@endif
		<div class="clear"></div>
		@if(is_category_home())
		<!-- For men -->
		{{-- @foreach(is_category_home() as $key => $c)
			@if(count(get_lang_all_products($c->id)) > 0) --}}
			@php 
			$SECTION_3 = \TTSoft\Home\Entities\Home::getFirstKey(\TTSoft\Home\Entities\Home::SECTION_3);
			$data = $SECTION_3->content;
			$data = json_decode($data);
			@endphp
			@if($SECTION_3)
			<div class="section clearfix nomargin">
				<div class="container clearfix">
					<div class="heading-block nobottomborder center">
						<h3 class="t400">{{ get_key_home_frontend('SECTION_3')->title }}</h3>
					</div>
					<div class="row clearfix">
						@foreach(get_lang_all_products($data->category,$data->limit) as $k => $p)
						<div class="col-lg-3 col-md-6">
							<div class="iportfolio clearfix">
								<div class="portfolio-image clearfix">
									<div class="fslider" data-pagi="false" data-animation="fade" data-slideshow="false">
										<div class="flexslider">
											<div class="slider-wrap">
												<div class="slide">
													<a href="{{ $p->getRoute() }}">
														<img src="{{ $p->getImage(270,270) }}" alt="{{ $p->title }}"></a>
													</div>
													@if(count($p->productImages) > 0)
													<div class="slide">
														<a href="{{ $p->getRoute() }}">
															<img src="{{ $p->productImages()->first()->image }}" alt="Grey Bag">
														</a>
													</div>
													@endif
												</div>
											</div>
										</div>
										{{-- <div class="product-cart"><a href="#"><i class="icon-shopping-cart"></i></a></div> --}}
										<div class="product-quickview">
											<a href="#" data-toggle="tooltip" data-placement="top" title="Sizes: @foreach($p->getSizeAttribute() as $key => $val) {{$val->title}} @endforeach"><i class="icon-info"></i></a>
										</div>
									</div>
									<div class="portfolio-desc nobottompadding">
										<h3><a href="{{ $p->getRoute() }}">{{ $p->title }}</a></h3>
										<span class="notopmargin"><a href="{{ $p->category->getRoute() }}">{{ getCategoryLang($p->product_category_id) }}</a></span>
										
										@if($p->getPrice() > $p->getPriceSale() && $p->getPriceSale() != null)
										<div class="item-price product-price">
											<span>
												<del class="">{{ format_price($p->getPrice()) }} đ</del> 
											</span>
										</div>
										<div class="item-price " style="float: right;">
											<span>
												<ins>{{ format_price($p->getPriceSale()) }} đ</ins>
											</span>
										</div>
										@else
										<div class="item-price " style="float: right;">
											<span>
												<ins>{{ format_price($p->getPrice()) }} đ</ins>
											</span>
										</div>
										@endif

									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			@endif
			@php 
			$SECTION_4 = get_media_home(\TTSoft\Home\Entities\Home::SECTION_3);
			$data_SECTION_4= get_key_home_frontend('SECTION_4')->content;
			$data_SECTION_4 = json_decode($data_SECTION_4);
			@endphp
			@if($SECTION_4)
			<div class="section clearfix nomargin">
				<div class="container clearfix">
					<div class="heading-block nobottomborder center">
						<h3 class="t400">{{ get_key_home_frontend('SECTION_4')->title }}</h3>
					</div>
					<div class="row clearfix">
						@foreach(get_lang_all_products($data_SECTION_4->category,$data_SECTION_4->limit) as $k => $p)
						<div class="col-lg-3 col-md-6">
							<div class="iportfolio clearfix">
								<div class="portfolio-image clearfix">
									<div class="fslider" data-pagi="false" data-animation="fade" data-slideshow="false">
										<div class="flexslider">
											<div class="slider-wrap">
												<div class="slide">
													<a href="{{ $p->getRoute() }}">
														<img src="{{ $p->getImage(270,270) }}" alt="{{ $p->title }}"></a>
													</div>
													@if(count($p->productImages) > 0)
													<div class="slide">
														<a href="{{ $p->getRoute() }}">
															<img src="{{ $p->productImages()->first()->image }}" alt="Grey Bag">
														</a>
													</div>
													@endif
												</div>
											</div>
										</div>
										{{-- <div class="product-cart"><a href="#"><i class="icon-shopping-cart"></i></a></div> --}}
										<div class="product-quickview">
											<a href="#" data-toggle="tooltip" data-placement="top" title="Sizes: @foreach($value->getSizeAttribute() as $key => $val) {{$val->title}} @endforeach"><i class="icon-info"></i></a>
										</div>
									</div>
									<div class="portfolio-desc nobottompadding">
										<h3><a href="{{ $p->getRoute() }}">{{ $p->title }}</a></h3>
										<span class="notopmargin"><a href="{{ $p->category->getRoute() }}">{{ getCategoryLang($p->product_category_id) }}</a></span>
										
										@if($p->getPrice() > $p->getPriceSale() && $p->getPriceSale() != null)
										<div class="item-price product-price">
											<span>
												<del class="">{{ format_price($p->getPrice()) }} đ</del> 
											</span>
										</div>
										<div class="item-price " style="float: right;">
											<span>
												<ins>{{ format_price($p->getPriceSale()) }} đ</ins>
											</span>
										</div>
										@else
										<div class="item-price " style="float: right;">
											<span>
												<ins>{{ format_price($p->getPrice()) }} đ</ins>
											</span>
										</div>
										@endif
										
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			@endif
		{{-- @endif
			@endforeach --}}
			@endif

			<!-- For women -->

			<!-- Banner -->
			{{-- <div class="row common-height bottommargin clearfix">
				<div class="col-md-6" style="background: url('/demos/ecommerce/images/sections/1.jpg') center 45% no-repeat; background-size: cover; padding: 0 0 500px;">
					<div class="section-content topmargin-sm">
						<h3>Shoes for travel</h3>
						<span class="font-primary">Designed to help you never make your bed again. Superior materials for comfort and lasting quality in a complete bedding package.</span>
						<a class="more-link uppercase t500" style="font-family: 'Montserrat';">Go To Shop <i class="icon-line-arrow-right"></i></a>
					</div>
				</div>
				<div class="col-md-6" style="background: url('/demos/ecommerce/images/sections/3.jpg') center center no-repeat; background-size: cover; padding: 0 0 500px;">
					<div class="section-content topmargin-sm">
						<h3>Shoes for sports</h3>
						<span class="font-primary">Globally monetize unique metrics and enterprise markets. Efficiently implement cooperative e-services and integrated interfaces.</span>
						<a class="more-link uppercase t500" style="font-family: 'Montserrat';">Go To Shop <i class="icon-line-arrow-right"></i></a>
					</div>
				</div>
			</div> --}}

			<div class="clear"></div>
			<!-- Our Ecomerce Store -->
			@php 
			$SECTION_8 = get_media_home(\TTSoft\Media\Entities\Media::SECTION_8);
			@endphp
			@if($SECTION_8)
			<div class="container topmargin bottommargin clearfix">
				<div class="heading-block nobottomborder bottommargin center">
					<h3 class="" style="font-size: 20px;">{{ get_key_home_frontend('SECTION_8')->title }}</h3>
				</div>
				<div class="row clearfix clear-bottommargin">
					<div id="oc-images" class="owl-carousel image-carousel carousel-widget" data-margin="20" data-nav="true" data-pagi="true" data-items-xs="2" data-items-sm="3" data-items-lg="4" data-items-xl="5">
						@foreach($SECTION_8 as $key => $get)
						<div class="oc-item">
							<a href="{{ $get->getUrl() }}"><img src="{{ $get->getImage() }}" alt="Image 1"></a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			@endif

			<div class="clear"></div>
			<!-- Maps -->
			
			<div id="store" class="container topmargin clearfix">
				<div class="row clearfix clear-bottommargin">
					<div class="col-md-6">
						<div id="google-map4" style="height: 500px; margin-bottom: 20px;" class="gmap"></div>
					</div>
					<div class="col-md-6">
						<!-- Portfolio Filter -->
						<ul class="portfolio-filter clearfix" data-container="#portfolio">
							<li class="activeFilter"><a href="#" data-filter="*">{{ trans('frontend::frontend.showall') }}</a></li>
							@foreach($branchGroupByProvince as $key => $value)
							<li><a href="#" data-filter=".{{ $value->provinces_id }}">{{ get_province($value->provinces_id) }}</a></li>
							@endforeach
						</ul><!-- #portfolio-filter end -->
						<div class="clear"></div>
						<div style="overflow-y: scroll; height: 430px; padding-bottom: 52px; ">
							<!-- Portfolio Items -->
							<div id="portfolio" class="portfolio grid-container portfolio-1 clearfix" >
								@foreach($branches as $key => $value)
								<article class="portfolio-item {{ $value->provinces_id }} clearfix nobottommargin nobottompadding">
									<div class="portfolio-desc" style="width: 100%">
										<h3><a href="#">{{ $value->address }}</a></h3>
										<span><a href="#">{{ get_province($value->provinces_id) }}</a></span>
									</div>
								</article>
								@endforeach
							</div><!-- #portfolio end -->
						</div>
					</div>
				</div>
			</div>

			<div class="clear"></div>

			<div class="section dark nobottommargin">
				<div class="container clearfix">

					<div class="row payments-info">
						<div class="col-lg-6">
							<p class="lead nomargin">{{ trans('frontend::frontend.paymentcards') }}</p>
						</div>
						<div class="col-lg-6">
							<ul class="payment-cards clearfix" style="margin-top: 5px;">
								<li><img src="demos/xmas/images/cards/visa.svg" alt="Visa"></li>
								<li><img src="demos/xmas/images/cards/mc.svg" alt="Master Card"></li>
								<li><img src="{{ asset('frontend/home/jcb.png') }}" alt="jbc"></li>

							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>



	</section><!-- #content end -->
	<!-- #content end -->
	@endsection

	@push('js')
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCvovzfbXE14cjbXh_AnodV2h9WQiZoW78"></script>
	<script src="{{ asset('frontend/js/jquery.gmap.js')}}"></script>

	<script>

		$('#google-map4').gMap({
			address: 'HO CHI MINH, VIETNAM',
			maptype: 'ROADMAP',
			zoom: 12,
			markers: [
			@foreach($branches as $key => $value)
			{
				address : "{{ $value->address }}",
				html : "{{ $value->name }}"
			},
			@endforeach
			],
			doubleclickzoom: false,
			controls: {
				panControl: true,
				zoomControl: true,
				mapTypeControl: false,
				scaleControl: false,
				streetViewControl: false,
				overviewMapControl: false
			}
		});

	// Custom Carousel
	$('.banner-carousel').owlCarousel({
		items: 1,
		dotsContainer: '#item-color-dots',
		loop: true,
	});

</script>
@endpush
