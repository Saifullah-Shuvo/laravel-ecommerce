@extends('users.layouts.master')

@section('content')

    <!-- Menu -->
    @include('users.partials.sidebar')
    <!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">

        <!-- Navbar -->
        @include('users.partials.navbar')
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
            
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                @yield('panel')
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('users.partials.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->

@endsection