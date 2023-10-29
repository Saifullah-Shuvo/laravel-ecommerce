<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('frontend')}}/assets/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v4.0.0-beta.2 css -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/bootstrap.min.css">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/owl.carousel.min.css">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/font-awesome.min.css">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/flaticon.css">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/jquery-ui.css">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/metisMenu.min.css">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/swiper.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/styles.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/responsive.css">

    @stack('style-lib')
    <!-- modernizr css -->
    <script src="{{asset('frontend')}}/assets/js/vendor/modernizr-2.8.3.min.js"></script>

    @stack('style')
</head>

<body>

    @yield('content')

    <!-- jquery latest version -->
    <script src="{{asset('frontend')}}/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{asset('frontend')}}/assets/js/bootstrap.min.js"></script>

    @stack('script-lib')

    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <script src="{{asset('frontend')}}/assets/js/owl.carousel.min.js"></script>
    <!-- scrollup.js -->
    <script src="{{asset('frontend')}}/assets/js/scrollup.js"></script>
    <!-- isotope.pkgd.min.js -->
    <script src="{{asset('frontend')}}/assets/js/isotope.pkgd.min.js"></script>
    <!-- imagesloaded.pkgd.min.js -->
    <script src="{{asset('frontend')}}/assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- jquery.zoom.min.js -->
    <script src="{{asset('frontend')}}/assets/js/jquery.zoom.min.js"></script>
    <!-- countdown.js -->
    <script src="{{asset('frontend')}}/assets/js/countdown.js"></script>
    <!-- swiper.min.js -->
    <script src="{{asset('frontend')}}/assets/js/swiper.min.js"></script>
    <!-- metisMenu.min.js -->
    <script src="{{asset('frontend')}}/assets/js/metisMenu.min.js"></script>
    <!-- mailchimp.js -->
    <script src="{{asset('frontend')}}/assets/js/mailchimp.js"></script>
    <!-- jquery-ui.min.js -->
    <script src="{{asset('frontend')}}/assets/js/jquery-ui.min.js"></script>
    <!-- main js -->
    <script src="{{asset('frontend')}}/assets/js/scripts.js"></script>

    @stack('script')

</body>


<!-- Mirrored from themepresss.com/tf/html/tohoney/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 03:33:34 GMT -->
</html>
