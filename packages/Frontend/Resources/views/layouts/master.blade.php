<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="TuoiTreSoft.com" />
	<!--[if IE]><link rel="shortcut icon" href="{{ asset(web_config("fav")) }}"><![endif]-->
	<link rel="icon" href="{{ asset(web_config("fav")) }}">
	<!-- Stylesheets -->
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=vietnamese" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/swiper.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/dark.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/font-icons.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css')}}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('frontend/css/responsive.css')}}" type="text/css" />
	<!-- Range slider -->
	<link rel="stylesheet" href="{{ asset('frontend/css/ion.rangeslider.css')}}" type="text/css" />
	<!-- css custom -->
	<link rel="stylesheet" href="{{ asset('frontend/css/custom.css')}}" type="text/css" />
	<!-- eCommerce Demo Specific Stylesheet -->
	<link rel="stylesheet" href="{{ asset('frontend/css/ecommerce.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/components/radio-checkbox.css') }}" type="text/css" />


	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title -->

	@stack('css')

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-83199523-24"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-83199523-24');
	</script>


</head>

<body class="stretched" >

	<!-- Document Wrapper -->
	<div id="wrapper" class="clearfix">
		<!-- Header -->
		@include('frontend::layouts.header')

		@yield('content')

		<!-- Footer -->
		@include('frontend::layouts.footer')
		{{-- popup modal --}}
		<div class="modal fade addtocart" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-body">
					<div class="modal-content render-html">
						@include('frontend::san_pham.addtocart')
					</div>
				</div>
			</div>
		</div>

	</div><!-- #wrapper end -->

	<!-- Go To Top -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts -->
	<script src="{{ asset('frontend/js/jquery.js')}}"></script>
	<script src="{{ asset('frontend/js/plugins.js')}}"></script>

	<!-- Footer Scripts -->
	<script src="{{ asset('frontend/js/functions.js')}}"></script>
	<script src="{{ asset('frontend/js/components/rangeslider.min.js') }}"></script>
	<script src="{{ asset('frontend/js/components/moment.js') }}"></script>
	@stack('js')

</body>
</html>