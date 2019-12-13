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
	<link rel="stylesheet" href="/document/custom.css" type="text/css" />
	<link rel="stylesheet" href="/document/tagsinput/tagsinput.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="{{ asset(get_config('fav')) }}" type="image/x-icon"/>
	<!-- Document Title
	============================================= -->
	<title>Home CMS Document</title>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-83199523-30"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-83199523-30');
	</script>

	@stack('css')
	
	<style type="text/css">
		body{
			overflow: hidden;
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

		@yield('content')

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
	<script src="/document/tagsinput/tagsinput.min.js"></script>

	@stack('js')
</body>
</html>