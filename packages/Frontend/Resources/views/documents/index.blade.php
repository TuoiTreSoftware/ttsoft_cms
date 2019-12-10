<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/document/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="/document/style.css" type="text/css" />
	<link rel="stylesheet" href="/document/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="/document/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="/document/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="/document/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="/document/css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- Document Title
	============================================= -->
	<title>Home CMS Document</title>
	<style type="text/css">
		body{
			overflow: hidden;
		}
		.btn-version{
			padding: 0px 50px;
		}

		@media screen and (max-width:600px){
			#slider{
				background: url('http://public.hp/uploads/images/hinhanh.png') center center no-repeat!important;
				background-size: cover !important;
				height: 900px !important;
			}
		}
	</style>
</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="transparent-header page-section dark">

			<div id="header-wrap">
				<div class="d-flex justify-content-center clearfix">
					<div id="logo">
						<a href="/" data-dark-logo="{{ asset(web_config('logo')) }}"><img src="{{ asset(web_config('logo')) }}" alt="TTS"></a>
					</div><!-- #logo end -->
				</div>

			</div>

		</header><!-- #header end -->

		<section id="slider" class="slider-element slider-parallax full-screen dark" style="background: url('http://res.cgvdt.vn/ckfinder/images/Article/2015/loi%20chua%20va%20cuoc%20song/tu%20ngu%20kinh%20thanh/bong%20toi1.jpg') center center no-repeat; background-size: cover">

			<div class="slider-parallax-inner">

				<div class="container-fluid vertical-middle clearfix">

					<div class="heading-block title-center nobottomborder">
						<h1>Start Our CMS</h1>
						<span>Building a System was never so Easy &amp; Interactive</span>
					</div>

					<div class="center bottommargin">
						<a href="/documents/v1.5.0" class="button button-3d button-teal button-xlarge nobottommargin btn-version"><i class="icon-star3"></i>Version 1.5.0</a>
						<div class="full-width">
							- OR -
						</div>
						<a href="#" data-scrollto="#section-pricing" class="button button-3d button-red button-xlarge btn-version
						"><i class="icon-user2"></i>Version 2.6.0</a>
					</div>

				</div>

			</div>

		</section>

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="/document/js/jquery.js"></script>
	<script src="/document/js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="/document/js/functions.js"></script>
</body>
</html>