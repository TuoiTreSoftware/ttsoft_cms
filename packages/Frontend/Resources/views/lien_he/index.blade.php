@extends('frontend::layouts.master')

@section('content')

<section id="page-title">
	<div class="container clearfix">
		<h1>{{ trans('frontend::frontend.contactus') }}</h1>
		<span>Get in Touch with Us</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ trans('frontend::frontend.home') }}</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ trans('frontend::frontend.contact') }}</li>
		</ol>
	</div>
</section><!-- #page-title end -->

<section id="content">
	<div class="content-wrap">
		<div class="container clearfix topmargin-sm">
			<div class="col_half">
				<div class="fancy-title title-dotted-border">
					<h3>{{ trans('frontend::frontend.emailus') }}</h3>
				</div>
				<div class="contact-widget">
					<div class="contact-form-result"></div>
					<form class="nobottommargin" id="template-contactform" name="contactform" method="post" action="{{ route('web.contact.post') }}" >
						{{ csrf_field() }}
						<div class="form-process"></div>
						<div class="col_half">
							<label for="template-contactform-name">{{ trans('frontend::frontend.name') }} <small>*</small></label>
							<input type="text" id="template-contactform-name" name="name" value="" class="sm-form-control required" autocomplete="off" />
						</div>
						<div class="col_half col_last">
							<label for="template-contactform-email">Email <small>*</small></label>
							<input type="email" id="template-contactform-email" name="email" value="" class="required email sm-form-control" autocomplete="off" />
						</div>
						<div class="clear"></div>
						<div class="col_half">
							<label for="template-contactform-phone">{{ trans('frontend::frontend.phone') }}</label>
							<input type="text" id="template-contactform-phone" name="phone_number" value="" class="sm-form-control" autocomplete="off" />
						</div>
						<div class="col_half col_last">
							<label for="template-contactform-subject">{{ trans('frontend::frontend.title') }} <small>*</small></label>
							<input type="text" id="template-contactform-subject" name="subject" value="" class="required sm-form-control" autocomplete="off" />
						</div>
						<div class="clear"></div>
						<div class="col_full">
							<label for="template-contactform-message">{{ trans('frontend::frontend.message') }} <small>*</small></label>
							<textarea class="required sm-form-control" id="template-contactform-message" name="content" rows="6" cols="30"></textarea>
						</div>
						<div class="col_full hidden">
							<input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
						</div>
						<div class="col_full">
							<button name="submit" type="submit" id="submit" tabindex="5" value="Submit" class="button button-3d nomargin">{{ trans('frontend::frontend.send') }}</button>
						</div>
					</form>
				</div>
				
			</div><!-- Contact Form End -->

			<div class="col_half col_last">

				<section id="google-map" class="gmap" style="height: 410px;"></section>

			</div><!-- Google Map End -->

			<div class="clear"></div>

			<div class="row clear-bottommargin">

				<div class="col-lg-3 col-md-6 bottommargin clearfix">
					<div class="feature-box fbox-center fbox-bg fbox-plain">
						<div class="fbox-icon">
							<a href="#"><i class="icon-map-marker2"></i></a>
						</div>
						<h3>{{ trans('frontend::frontend.office') }}<span class="subtitle">{{ web_config('address') }}</span></h3>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 bottommargin clearfix">
					<div class="feature-box fbox-center fbox-bg fbox-plain">
						<div class="fbox-icon">
							<a href="#"><i class="icon-phone3"></i></a>
						</div>
						<h3>{{ trans('frontend::frontend.advice') }}<span class="subtitle"><a href="tel:{{ web_config('phone') }}" target="_blank">{{ web_config('phone') }}</a></span></h3>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 bottommargin clearfix">
					<div class="feature-box fbox-center fbox-bg fbox-plain">
						<div class="fbox-icon">
							<a href="#"><i class="icon-facebook2"></i></a>
						</div>
						<h3>Facebook<span class="subtitle"><a href="{{ web_config('facebook') }}" target="_blank">Follow us!</a></span></h3>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 bottommargin clearfix">
					<div class="feature-box fbox-center fbox-bg fbox-plain">
						<div class="fbox-icon">
							<a href="#"><i class="icon-youtube2"></i></a>
						</div>
						<h3>Youtube<span class="subtitle"><a href="{{ web_config('youtube') }}" target="_blank">{{ trans('frontend::frontend.youtube') }}</a></span></h3>
					</div>
				</div>

			</div><!-- Contact Info End -->

		</div>

	</div>

</section><!-- #content end -->

@endsection

@push('js')

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
{!! JsValidator::formRequest('TTSoft\Frontend\Http\Requests\Web\ContactFormRequest', '#template-contactform'); !!}

<script src="https://maps.google.com/maps/api/js?key=AIzaSyCvovzfbXE14cjbXh_AnodV2h9WQiZoW78"></script>
<script src="{{ asset('frontend/js/jquery.gmap.js') }}"></script>

<script>

	$('#google-map').gMap({
		address: 'HO CHI MINH, VIETNAM',
		maptype: 'ROADMAP',
		zoom: 12,
		markers: [
		@foreach($branches as $key => $val)
		{
			address: "{{ $val->address }}",
			html: '{{ $val->name }}'
			
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

</script>
@endpush