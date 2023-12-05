<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <!-- Alert css -->
    <link href="{{asset('admins')}}/assets/css/sweetalert.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('admins')}}/assets/css/toastr.min.css" rel="stylesheet" type="text/css" />

    @stack('style-lib')
    <!-- modernizr css -->
    <script src="{{asset('frontend')}}/assets/js/vendor/modernizr-2.8.3.min.js"></script>

    @stack('style')
</head>

<body>
    
    @yield('content')
    
    {{-- moment jquery for countdown  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <!-- jquery latest version -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
    <script src="{{asset('frontend')}}/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{asset('frontend')}}/assets/js/bootstrap.min.js"></script>

    {{-- Alert js --}}
    <script src="{{asset('admins')}}/assets/js/toastr.min.js"></script>
    <script src="{{asset('admins')}}/assets/js/sweetalert.min.js"></script>

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

    <script>
        @if(Session::has('message'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('message') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('message') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('message') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('message') }}");
                  break;
                }
        @endif
        // toastr.options = {
        //     "closeButton": true,
        //     "positionClass": "toast-top-right",
        //     "timeOut": "5000",
        // }
        @if ($errors->any())
        // Loop through each error and show it with Toastr
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}", "Error");
            @endforeach
        @endif
     </script>

    @stack('script')

</body>


<!-- Mirrored from themepresss.com/tf/html/tohoney/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 03:33:34 GMT -->
</html>
