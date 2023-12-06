<header class="header-area">
        <div class="header-top bg-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <ul class="d-flex header-contact">
                            <li><i class="fa fa-phone"></i> +01 123 456 789</li>
                            <li><i class="fa fa-envelope"></i> youremail@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
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
                                {{-- <li>
                                    <a href="javascript:void(0);">Pages <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="shop.html">Shop Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li> --}}
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
                                    <a href=""><i class="flaticon-like"></i> <span>1</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('cart.index') }}"><i class="flaticon-shop"></i> <span>1</span></a>
                                </li>
                            @else
                                <li>
                                    <a href=""><i class="flaticon-like"></i> <span>0</span></a>
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
                                {{-- <li>
                                    <a href="javascript:void(0);">Pages <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="shop.html">Shop Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li> --}}
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
