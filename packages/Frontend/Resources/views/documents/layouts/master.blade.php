<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,600,700|Roboto:300,400,500,700" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="/document/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="/document/style.css" type="text/css" />

	<!-- One Page Module Specific Stylesheet -->
	<link rel="stylesheet" href="/document/onepage.css" type="text/css" />
	<!-- / -->

	<!-- Documentation Module Specific Stylesheet -->
	<link rel="stylesheet" href="/document/docs.css" type="text/css" />
	<!-- / -->

	<link rel="stylesheet" href="/document/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="/document/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="/document/css/font-icons/et/et-line.css" type="text/css" />
	<link rel="stylesheet" href="/document/css/font-icons/medical/medical-icons.css" type="text/css" />
	<link rel="stylesheet" href="/document/css/font-icons/real-estate/real-estate-icons.css" type="text/css" />
	<link rel="stylesheet" href="/document/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="/document/css/magnific-popup.css" type="text/css" />
	
	<link rel="stylesheet" href="/document/one-page/css/fonts.css" type="text/css" />

	<link rel="stylesheet" href="/document/css/responsive.css" type="text/css" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- External JavaScripts
	============================================= -->
	
	<script type="text/javascript" src="/document/js/jquery.js"></script>
	<script type="text/javascript" src="/document/js/plugins.js"></script>

	<!-- Document Title
	============================================= -->
	<title>Documentation | Canvas</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="static-sticky">

			<div id="header-wrap">

				<div class="container-fullwidth clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="https://tuoitresoft.com/" class="standard-logo" data-dark-logo="one-page/images/canvasone-dark.png"><img src="https://tuoitresoft.com/assets/images/logo.png" alt="Canvas Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">
						<ul></ul>
					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap nopadding">

				@yield('content')

				<script>
					jQuery(document).ready( function($){

						$( "#docs" ).tabs({
							show: { effect: "fade", duration: 400 },
							activate:function(event,ui){
								$('html,body').stop(true).animate({
									'scrollTop': $('.docs-content').offset().top - 40
								}, 1250, 'easeInOutExpo');
							}
						});

					});
				</script>

			</div>

		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="/document/js/functions.js"></script>

</body>
</html>