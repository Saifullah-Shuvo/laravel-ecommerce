@php
// Get the authenticated user
if($user = auth()->user()){
// Get the cart items for the current user
$cartItems = App\Models\Frontend\Cart::where('user_id', $user->id)->get();
}else{
$cartItems = 0;
}
@endphp
@php
// Get the authenticated user
if($user = auth()->user()){
// Get the cart items for the current user
$wishlistItems = App\Models\Frontend\Wishlist::where('user_id', $user->id)->get();
}else{
$wishlistItems = 0;
}
@endphp

@push('style')
<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
        overflow: hidden;
        background-color: #e9e9e9;
    }

    .topnav a {
        float: left;
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    .topnav a.active {
        background-color: #2196F3;
        color: white;
    }

    .topnav .search-container {
        float: right;
    }

    .topnav input[type=text] {
        padding: 6px;
        margin-top: 8px;
        font-size: 17px;
        border: none;
    }

    .topnav .search-container button {
        float: right;
        padding: 6px 10px;
        margin-top: 8px;
        margin-right: 16px;
        background: #ddd;
        font-size: 17px;
        border: none;
        cursor: pointer;
    }

    .topnav .search-container button:hover {
        background: #ccc;
    }

    @media screen and (max-width: 600px) {
        .topnav .search-container {
            float: none;
        }

        .topnav a,
        .topnav input[type=text],
        .topnav .search-container button {
            float: none;
            display: block;
            text-align: left;
            width: 100%;
            margin: 0;
            padding: 14px;
        }

        .topnav input[type=text] {
            border: 1px solid #ccc;
        }
    }

    .search-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Additional styling for the form if needed */
    .search-container form {
        margin: 0;
        /* Remove default margin */
    }

</style>
@endpush

@php
// Get About Details
$details = App\Models\Frontend\Details::get();
@endphp

<header class="header-area">
    <div class="header-top bg-2">
        <div class="fluid-container">
            <div class="row">
                <div class="col-md-4 col-12">
                    <ul class="d-flex header-contact">
                        @forelse($details as $data)
                        <li><i class="fa fa-phone"></i> +88 {{ $data->main_phone }}</li>
                        <li><i class="fa fa-envelope"></i>{{ $data->main_email }}</li>
                        @empty
                        <div class="container">
                            <div class="row justify-content-center">
                                <h5>No Contact Data Found!</h5>
                            </div>
                        </div>
                        @endforelse
                    </ul>
                </div>

                <div class="col-md-4 col-12 search-container">
                    <form action="{{ route('search.global') }}" method="GET">
                        <input type="text" placeholder="Search.." name="query">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <div class="col-md-4 col-12">
                    <ul class="d-flex account_login-area">
                        @auth
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown_style">
                                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();">Logout</a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li><a href="{{url('/login')}}"> Login/Register </a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="fluid-container">
            <div class="row">
                {{-- logo div  --}}
                <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{asset('frontend')}}/assets/images/logo.png" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-7 d-none d-lg-block">
                    <nav class="mainmenu">
                        <ul class="d-flex">
                            <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                            <li class="{{ Route::is('home.about') ? 'active' : '' }}"><a href="{{ route('home.about') }}">About</a></li>
                            <li class="{{ Route::is('home.shop') ? 'active' : '' }}">
                                <a href="{{ route('home.shop') }}">Shop Page</a>
                            </li>

                            <li class="{{ Route::is('home.blog') ? 'active' : '' }}">
                                <a href="{{ route('home.blog')}}">Blogs</a>
                            </li>
                            <li class="{{ Route::is('home.contact') ? 'active' : '' }}"><a href="{{ route('home.contact')}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>


                <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                    <ul class="search-cart-wrapper d-flex">
                        <li class="{{--search-tigger--}}"><a href=""><i class="flaticon-search"></i></a></li>

                        @auth
                        <li>
                            <a href="{{ route('wishlist.index') }}"><i class="flaticon-like"></i> <span>{{ $wishlistItems->count() }}</span></a>
                        </li>
                        <li>
                            <a href="{{ route('cart.index') }}"><i class="flaticon-shop"></i> <span>{{ $cartItems->count() }}</span></a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('wishlist.index') }}"><i class="flaticon-like"></i> <span>0</span></a>
                        </li>
                        <li>
                            <a href="{{ route('cart.index') }}"><i class="flaticon-shop"></i> <span>0</span></a>
                        </li>
                        @endauth

                    </ul>
                </div>

                <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                    <div class="responsive-menu-tigger">
                        <a href="javascript:void(0);">
                            <span class="first"></span>
                            <span class="second"></span>
                            <span class="third"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- responsive-menu area start -->
        <div class="responsive-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-block d-lg-none">
                        <ul class="metismenu">
                            <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                            <li class="{{ Route::is('home.about') ? 'active' : '' }}"><a href="{{ route('home.about') }}">About</a></li>
                            <li class="{{ Route::is('home.shop') ? 'active' : '' }}">
                                <a href="{{ route('home.shop') }}">Shop Page</a>
                            </li>

                            <li class="{{ Route::is('home.blog') ? 'active' : '' }}">
                                <a href="{{ route('home.blog')}}">Blogs</a>
                            </li>
                            <li class="{{ Route::is('home.contact') ? 'active' : '' }}"><a href="{{ route('home.contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- responsive-menu area start -->
    </div>
</header>
