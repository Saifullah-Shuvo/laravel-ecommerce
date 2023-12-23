<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">

        <!-- Light Logo-->
        <a href="{{ url('/') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('admins')}}/assets/images/logo-sm.png" alt="">
            </span>
            <span class="logo-lg">
                <img src="{{asset('admins')}}/assets/images/logo-light.png" alt="">
            </span>
        </a>

        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>

    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards"><b>Dashboard</b></span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('user/*') ? 'active' : '' }}" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Manage Customers</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('users.all') }}" class="nav-link" data-key="t-calendar"> All Customers </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('orders/*') ? 'active' : '' }}" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="mdi mdi-view-carousel-outline"></i> <span data-key="t-layouts">Manage Orders</span> <span class="badge badge-pill bg-danger" data-key="t-hot">New</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.order.all') }}" class="nav-link" target="_self" data-key="t-horizontal">All Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.order.pending') }}" class="nav-link" target="_self" data-key="t-detached">Pending Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.order.confirmed') }}" class="nav-link" target="_self" data-key="t-two-column">Confirmed Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.order.shipped') }}" class="nav-link" target="_self" data-key="t-hovered">Shipped Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.order.delivered') }}" class="nav-link" target="_self" data-key="t-hovered">Delivered Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.order.cancelled') }}" class="nav-link" target="_self" data-key="t-hovered">Cancelled Orders</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('category/*') ? 'active' : '' }} " href="{{route('category.all')}}">
                        <i class="mdi mdi-puzzle-outline"></i> <span data-key="t-widgets">Manage Categories</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('product/*') ? 'active' : '' }} " href="#sidebarLanding" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLanding">
                        <i class="ri-rocket-line"></i> <span data-key="t-landing">Manage Products</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLanding">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('product.all') }}" class="nav-link" data-key="t-one-page"> All products </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('product.hotdeal') }}" class="nav-link" data-key="t-nft-landing"> Hot deals </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('product.featured') }}" class="nav-link" data-key="t-job">Featured Products</a>
                            </li>
                            <li class="nav-item">
                                <a href=" {{route('product.popular')}} " class="nav-link" data-key="t-job">Popular Products</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('coupon/*') ? 'active' : '' }} " href="{{ route('coupon.all') }}" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="ri-anticlockwise-line"></i> <span data-key="t-pages">Coupons</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('slider/*') ? 'active' : '' }} " href="{{ route('slider.all') }}" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="ri-message-line"></i> <span data-key="t-authentication">Manage Sliders</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('blog/*') ? 'active' : '' }} " href="{{ route('blog.all') }}" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">Manage Blogs</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('subscriber/*') ? 'active' : '' }} " href="{{ route('subscriber.all') }}" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="mdi mdi-account-circle-outline"></i> <span data-key="t-pages">Subscribers</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('message/*') ? 'active' : '' }} " href="{{ route('message.all') }}" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="mdi mdi-chart-donut"></i> <span data-key="t-pages">Messages</span>
                    </a>
                </li>


                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Settings</span></li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUI" role="button" aria-expanded="false" aria-controls="sidebarUI">
                        <i class="mdi mdi-cube-outline"></i> <span data-key="t-base-ui">General Setting</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarForms" role="button" aria-expanded="false" aria-controls="sidebarForms">
                        <i class="mdi mdi-form-select"></i> <span data-key="t-forms">Logo & Favicon</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('system/*') ? 'active' : '' }}" href="#sidebarTables" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTables">
                        <i class="mdi mdi-grid-large"></i> <span data-key="t-tables">System</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarTables">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('faq.all') }}" class="nav-link" data-key="t-basic-tables">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('testimonial.all') }}" class="nav-link" data-key="t-grid-js">Testimonial</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('details.all') }}" class="nav-link" data-key="t-datatables">Details</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    {{-- <a class="dropdown-item" id="logout" href="{{route('admin.logout')}}" onclick="event.preventDefault(); --}}
                        {{-- this.closest('form').submit();"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Log Out</span></a> --}}
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                    <a class="nav-link menu-link" id="logout" href="{{route('admin.logout')}}" onclick="event.preventDefault();
                    this.closest('form').submit();" role="button" aria-expanded="false" aria-controls="sidebarIcons">
                        <i class="mdi mdi-logout"></i> <span data-key="t-icons">Logout</span>
                    </a>
                    </form>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
