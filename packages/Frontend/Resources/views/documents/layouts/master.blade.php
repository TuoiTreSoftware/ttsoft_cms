<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,600,700|Roboto:300,400,500,700" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
	<link rel="stylesheet" href="/document/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="/document/style.css" type="text/css" />

	<!-- One Page Module Specific Stylesheet -->
	<link rel="stylesheet" href="/document/onepage.css" type="text/css" />
	<!-- / -->

	<!-- Documentation Module Specific Stylesheet -->
	<link rel="stylesheet" href="/document/docs.css" type="text/css" />
	<link rel="stylesheet" href="/document/spacing.css" type="text/css" />
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
	<link rel="stylesheet" href="/document/custom.css" type="text/css" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- External JavaScripts
	============================================= -->
	
	<script type="text/javascript" src="/document/js/jquery.js"></script>
	<script type="text/javascript" src="/document/js/plugins.js"></script>

	<!-- Document Title
	============================================= -->
	<title>Documentation | TTS CMS</title>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-83199523-30"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-83199523-30');
	</script>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="static-sticky">

			<div id="header-wrap">

				<div class="container-fullwidth d-flex justify-content-center clearfix">

					<div id="logo">
						<a href="/" data-dark-logo="{{ asset(web_config('logo')) }}"><img src="{{ asset(web_config('logo')) }}" alt="Canvas Logo"></a>
					</div><!-- #logo end -->

				</div>

			</div>

		</header><!-- #header end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap nopadding">

				@yield('content')
					
			</div>

		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="/document/js/functions.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$(".btn-menu").click(function(){
				$(".sidebar-menu").show();
			});
			$(".close-menu").click(function(){
				$(".sidebar-menu").hide();
			});
		});
	</script>

</body>
</html>