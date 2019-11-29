<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
    <title>{{ config('ttsoft.cms_title') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700&amp;subset=vietnamese" rel="stylesheet">
    <!-- This page CSS -->
    <!--Toaster Popup message CSS -->
    <link href="/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/node_modules/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="/assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/assets/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    
    <link href="/assets/v2tms/css/pages/tab-page.css" rel="stylesheet">

    <link href="/assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <link href="/assets/node_modules/icheck/skins/all.css" rel="stylesheet">
    <link href="/assets/v2tms/css/pages/form-icheck.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/assets/v2tms/css/style.css" rel="stylesheet">
    <link href="/assets/v2tms/css/custom.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="/assets/v2tms/css/pages/dashboard1.css" rel="stylesheet">
    <link href="/assets/v2tms/css/pages/floating-label.css" rel="stylesheet">

    <link href="/assets/node_modules/nestable/nestable.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/progress/progressjs.min.css" rel="stylesheet" />
    <link href="/assets/admin/style.css" rel="stylesheet" />
    <!-- Color picker plugins css -->
    <link href="{{ url('assets/node_modules/jquery-asColorPicker-master/css/asColorPicker.css') }}" rel="stylesheet">
    
    <script src="/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <script src="/assets/admin/progress/progress.min.js"></script>
    <script type="text/javascript">
        var BASE_URL = '{{ url('/') }}';
        var BASE_URL_ADMIN = '{{ route('admin.dashboard.get.index') }}';
    </script>
    <style type="text/css">
        #result-search{
            list-style: none;padding: 0;
            border: solid 1px #ccc;
            border-bottom: none;
            position: absolute;
            z-index: 9999;
            background-color: #fff;
            width: 532px;
        }
        #result-search li{

            padding: 7px;
            border-bottom: solid 1px #ccc;
        }

        #result-search li img{
            width: 45px;
            float: left;
            margin-right: 10px;
        }
    </style>
    @stack('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Color picker plugins css -->
    

</head>

<body class="skin-blue">

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">TuoiTre Software TMS</p>
        </div>
    </div>
    <div id="main-wrapper">
        <script type="text/javascript">progressJs("#main-wrapper").start();</script>
        <script type="text/javascript">
            $(document).ready(function(){
                progressJs("#main-wrapper").end();
            });
        </script>
        @include('base::partials.header')
        @include('base::partials.slidebar')
        <div class="page-wrapper">
            <div id="alert-notify" class='alert alert-success' style="position: fixed; bottom: 10px; right: 5px; z-index: 1000; display: none;">
                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span class="alert-mesage"></span>
            </div>
            @yield('content')
        </div>
        @include('base::partials.footer')
    </div>
    
    <!-- Bootstrap popper Core JavaScript -->
    <script src="/assets/node_modules/popper/popper.min.js"></script>
    <script src="/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/assets/v2tms/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="/assets/v2tms/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/assets/v2tms/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/assets/v2tms/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="/assets/node_modules/raphael/raphael-min.js"></script>
    <script src="/assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    {{-- <script src="/assets/node_modules/toast-master/js/jquery.toast.js"></script> --}}
    <!-- Chart JS -->
    <script src="/assets/node_modules/dropzone-master/dist/dropzone.js"></script>
    <!-- jQuery file upload -->
    <script src="/assets/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script src="/assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/node_modules/bootstrap-tagsinput/dist/bootstrap3-typeahead.min.js"></script>
    <script src="/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script type="text/javascript" src="/assets/node_modules/multiselect/js/jquery.multi-select.js"></script>

    <script src="/assets/node_modules/moment/moment.js"></script>
    <script src="/assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="{{ url('assets/node_modules/jquery-asColorPicker-master/libs/jquery-asColor.js') }}"></script>
    <script src="{{ url('assets/node_modules/jquery-asColorPicker-master/libs/jquery-asGradient.js') }}"></script>
    <script src="{{ url('assets/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js') }}"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="/assets/node_modules/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="/assets/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Create courses/class -->
    <!-- icheck -->
    <script src="/assets/node_modules/icheck/icheck.min.js"></script>
    <script src="/assets/node_modules/icheck/icheck.init.js"></script>

    <script src="/assets/node_modules/summernote/dist/summernote.min.js"></script>
    <script type="text/javascript" src="/vendor/jsvalidation/js/jsvalidation.js"></script>
    <script src="/assets/node_modules/nestable/jquery.nestable.js"></script>
    <script src="{{ url('frontend/js/plugins/jquery.owlcarousel.js') }}"></script>
    <script type='text/javascript' src='{{ asset('assets/admin/jquery.ajax.js') }}'></script>
    <script type="text/javascript" src="/assets/admin/jQuery.custom.js"></script>
    {{-- <script type="text/javascript">
        $("#alert-notify").infoCMS({
            status : true,
            message : 'Xin chào các bạn đến với công nghệ tuổi trẻ'
        });
    </script> --}}
    <script type="text/javascript">$('.select2').select2();</script>

    <script src="{{ asset('frontend/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/js/functions.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    <script>
        // Owl Carousel Scripts
        $('#oc-features').owlCarousel({
            items: 1,
            margin: 60,
            nav: true,
            navText: ['<i class="icon-line-arrow-left"></i>','<i class="icon-line-arrow-right"></i>'],
            dots: false,
            stagePadding: 30,
            responsive:{
                768: { items: 2 },
                1200: { stagePadding: 200 }
            },
        });
    </script>
    <script type="text/javascript">
        jQuery('.datepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            format : "dd-mm-yyyy"
        });
    </script>
    @stack('jQuery')
</body>

</html>