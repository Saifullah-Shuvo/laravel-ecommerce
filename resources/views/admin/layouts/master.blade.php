<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/material/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Aug 2023 15:53:02 GMT -->
<head>

    <meta charset="utf-8" />

    <title>{{ config('app.name') }} | @yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend') }}/assets/images/favicon.png">

    @stack('style-lib')

    <!-- jsvectormap css -->
    <link href="{{asset('admins')}}/assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{asset('admins')}}/assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{asset('admins')}}/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('admins')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('admins')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('admins')}}/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('admins')}}/assets/css/custom.min.css" rel="stylesheet" type="text/css" />

    @stack('style')
    {{-- Alert Css --}}
    <link href="{{asset('admins')}}/assets/css/sweetalert.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('admins')}}/assets/css/toastr.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">


</head>

<body>

    @yield('content')

    @stack('script-lib')

    <!-- JAVASCRIPT -->
    {{--JQuery/Ajax cdn--}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script src="{{asset('admins')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('admins')}}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('admins')}}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{asset('admins')}}/assets/libs/feather-icons/feather.min.js"></script>
    <script src="{{asset('admins')}}/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{asset('admins')}}/assets/js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="{{asset('admins')}}/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="{{asset('admins')}}/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="{{asset('admins')}}/assets/libs/jsvectormap/maps/world-merc.js"></script>

    <!--Swiper slider js-->
    <script src="{{asset('admins')}}/assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Dashboard init -->
    <script src="{{asset('admins')}}/assets/js/pages/dashboard-ecommerce.init.js"></script>

    <!-- App js -->
    <script src="{{asset('admins')}}/assets/js/app.js"></script>

    {{-- Alert js --}}
    <script src="{{asset('admins')}}/assets/js/toastr.min.js"></script>
    <script src="{{asset('admins')}}/assets/js/sweetalert.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>

    <script>
        $(document).on("click", "#delete", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
               swal({
                 title: "Do you Want to delete?",
                 text: "Once Delete, This will be Permanently Delete!",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
               })
               .then((willDelete) => {
                 if (willDelete) {
                      window.location.href = link;
                 } else {
                   swal("Safe Data!");
                 }
               });
           });
   </script>
  {{-- before  logout showing alert message --}}
    <script>
        $(document).on("click", "#userlogout", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
               swal({
                 title: "Do you Want to logout?",
                 text: "",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
               })
               .then((willDelete) => {
                 if (willDelete) {
                      window.location.href = link;
                 } else {
                   swal("Not Logout!");
                 }
               });
           });
   </script>


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
     </script>

    @stack('script')

</body>


<!-- Mirrored from themesbrand.com/velzon/html/material/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Aug 2023 15:53:08 GMT -->
</html>
