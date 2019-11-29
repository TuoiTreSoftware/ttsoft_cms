@if(get_slider())
<section id="slider" class="slider-element slider-parallax swiper_wrapper clearfix" data-loop="true">
	<div class="slider-parallax-inner">
		<div class="swiper-container swiper-parent">
			<div class="swiper-wrapper">
				@foreach(get_slider(\TTSoft\Slider\Entities\Slider::CATEGORY_ABOUT) as $sliderData)
				<div class="swiper-slide dark" style="background-image: url('{{ $sliderData->getImage() }}'); background-size: cover">
					<a href="{{ $sliderData->getUrl() }}">
						<!-- <div class="container clearfix">
							<div class="slider-caption">
								<h3 class="font-primary nott h2-slider">{{ $sliderData->getTitle() }}</h3>
								<p class="d-none d-sm-block p-slider">{!! $sliderData->getContent() !!}</p>
							</div>
						</div> -->
						<div class="container clearfix">
							<div class="slider-caption" >
								<h1 data-caption-animate="fadeInUp">{{ $sliderData->getTitle() }}</h1>
								<p class="d-none d-sm-block" data-caption-animate="fadeInUp" data-caption-delay="200">{{ $sliderData->getContent() }}</p>
								<a href="{{ $sliderData->getUrl() }}" data-caption-animate="fadeInUp" class="button btn-more"><span>Xem thêm</span><i class="icon-angle-right"></i></a>
							</div>
						</div>
					</a>
				</div>
				@endforeach
			</div>
			<!-- Slider Arrows -->
			<div class="slider-arrow-left" class="nobg"><i class="icon-line-arrow-left"></i></div>
			<div class="slider-arrow-right" class="nobg"><i class="icon-line-arrow-right"></i></div>
		</div>

		<!-- Slider Mouse Icon -->
		<a href="#" data-scrollto="#content" data-offset="0" class="dark one-page-arrow"><img class="infinite animated fadeInDown" src="frontend/business/images/mouse.svg" alt="" ></a>
	</div>

</section>
@endif