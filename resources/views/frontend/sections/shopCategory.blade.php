@extends('frontend.layouts.app')

@section('title')
Shop Page
@endsection

@section('panel')
    {{-- @dd($categoryProduct->products) --}}
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shop Page</h2>
                        <ul>
                            <li><a href="{{ route('home')}} ">Home</a></li>
                            <li><span>Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->

    <!-- product-area start -->
    <div class="product-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="product-menu">
                        <ul class="nav justify-content-center">
                            <li>
                                <a class="{{ Route::is('home.shop') ? 'active' : '' }}" href="{{ route('home.shop')}}">All product</a>
                            </li>
                            <li>

                                @foreach ($category as $data)
                                <a class="{{$data->id == $categoryProduct->id ? 'active' : ''}}"
                                    href="{{ route('home.shop.category',['category_id' => $data->id]) }}">
                                    {{ $data->category_name }}</a>
                                @endforeach

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="all">
                    <ul class="row">

                        @forelse ($categoryProduct->products as $data)

                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                            <div class="product-wrap">
                                <div class="product-img">
                                    <span>Sale</span>
                                    <img src="{{asset('admins')}}/productimage/{{ $data->thambnail }}" alt="">
                                    <div class="product-icon flex-style">
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ route('home.product.details',['id'=>$data->id]) }}">{{ $data->name }}</a></h3>
                                    <p class="pull-left">${{ $data->selling_price }}
                                    </p>
                                    <ul class="pull-right d-flex">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        @empty
                            <div class="container">
                                <div class="row justify-content-center">
                                <h5>No Products found in this Category!</h5>
                                </div>
                            </div>
                        @endforelse

                        <li class="col-12 text-center">
                            <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- product-area end -->

@endsection
