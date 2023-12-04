@extends('frontend.layouts.app')

@section('title')
Products Details
@endsection

@section('panel')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Product Details</h2>
                        <ul>
                            <li><a href="{{ route('home')}} ">Home</a></li>
                            <li><span>Product Details</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    {{-- @dd($productDetails->reviews) --}}
    <!-- single-product-area start-->
    <div class="single-product-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-single-img">
                        <div class="product-active owl-carousel">
                            <div class="item">
                                <img src="{{asset('admins')}}/productimage/{{ $productDetails->thambnail }}" alt="">
                            </div>
                            @forelse($productMultiImage->product_images as $image)
                            {{-- <img class="rounded shadow" alt="" width="200" src={{ asset('admins/productimage/multiImage/'.$image->image_path) }}> --}}
                            <img src="{{asset('admins')}}/productimage/multiImage/{{ $image->image_path }}" alt="">
                            @empty
                            @endforelse

                        </div>
                        <div class="product-thumbnil-active  owl-carousel">
                            <div class="item">
                                <img src="{{asset('admins')}}/productimage/{{ $productDetails->thambnail }}" alt="">
                            </div>
                            @forelse($productMultiImage->product_images as $image)
                            <img src="{{asset('admins')}}/productimage/multiImage/{{ $image->image_path }}" alt="">
                            @empty
                            @endforelse

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-single-content">
                        <h3>{{ $productDetails->name }}</h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">${{ $productDetails->selling_price }}</span>
                            <ul class="rating pull-right">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= round($averageRating))
                                    <li><i class="fa fa-star"></i></li>
                                    @else
                                    <li><i class="fa fa-star-o"></i></li>
                                    @endif
                                @endfor
                                <li>({{ count($productDetails->reviews) }} Customer Reviews)</li>
                            </ul>
                        </div>
                        <p>{{ $productDetails->description }}</p>

                        <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <ul class="input-style">
                            <li class="quantity cart-plus-minus">
                                <input type="text" name="quantity" value="1" />
                                <input type="hidden" name="product_id" value="{{$productDetails->id}}" />
                            </li>
                            {{-- <li><a type="submit" href="cart.html">Add to Cart</a></li> --}}
                            <li><button class="btn btn-danger" type="submit">Add to Cart</button></li>
                            @error('quantity')
                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </ul>
                        </form>

                        <ul class="cetagory">
                            <li>Category Name:</li>
                            <li><b>{{ $productCategory->category->category_name}}</b></li>
                        </ul>
                        <ul class="socil-icon">
                            <li>Share :</li>
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ urlencode(url()->current()) }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode(url()->current()) }}&amp;title=my share text&amp;summary=dit is de linkedin summary" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://plus.google.com/share?url={{ urlencode(url()->current()) }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="https://www.instagram.com/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://wa.me/?text={{ urlencode(url()->current()) }}" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-60">
                <div class="col-12">
                    <div class="single-product-menu">
                        <ul class="nav">
                            {{-- <li><a class="active" data-toggle="tab" href="#description">Description</a> </li> --}}
                            <li><a class="active" data-toggle="tab" href="#review">Review</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content">
                        {{-- <div class="tab-pane active" id="description">
                            <div class="description-wrap">
                                <p> {{ $productDetails->description }} </p>
                            </div>
                        </div> --}}
                        <div class="tab-pane active" id="review">
                            <div class="review-wrap">
                                <ul>
                                    <li class="review-items">
                                        <div class="review-img">
                                            <img src="{{asset('fronted')}}/assets/images/comment/1.png" alt="">
                                        </div>
                                        <div class="review-content mb-2">
                                            @forelse ($productDetails->reviews as $data)

                                            <div class="d-flex justify-content-end">
                                                <ul>
                                                    @for ($i = 1; $i <= 5; $i++)
                                                    <li style="display: inline-block;">
                                                        @if ($i <= $data->review)
                                                            <i class="fa fa-star" style="color: red;"></i>
                                                        @else
                                                            <i class="fa fa-star-o" style="color: red;"></i>
                                                        @endif
                                                    </li>
                                                    @endfor
                                                </ul>
                                            </div>

                                            <h3>{{ $data->name }}</h3>
                                            <span>
                                                <p>{{ \Carbon\Carbon::parse($data->created_at)->format('j M, Y \a\t g:ia') }}</p>
                                            </span>
                                            <p>{{ $data->review_text}}</p>

                                            <hr>
                                            @empty
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                  <h5>No Review Yet!</h5>
                                                </div>
                                            </div>
                                            @endforelse 
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @auth
                        <form action="{{ route('home.product.review') }}" method="POST">
                        @csrf
                            <div class="add-review">
                                <h4>Add A Review</h4>
                                <div class="ratting-wrap">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>task</th>
                                                <th>1 Star</th>
                                                <th>2 Star</th>
                                                <th>3 Star</th>
                                                <th>4 Star</th>
                                                <th>5 Star</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>How Many Stars?</td>
                                                <td>
                                                    <input value="1" type="radio" name="review"/>
                                                </td>
                                                <td>
                                                    <input value="2" type="radio" name="review"/>
                                                </td>
                                                <td>
                                                    <input value="3" type="radio" name="review"/>
                                                </td>
                                                <td>
                                                    <input value="4" type="radio" name="review"/>
                                                </td>
                                                <td>
                                                    <input value="5" type="radio" name="review"/>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @error('review')
                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <h4>Name:</h4>
                                        <input type="text" name="name" value="{{ Auth::user()->name }}" />
                                        <input type="hidden" name="product_id" value="{{ $productDetails->id }}" />
                                    </div>
                                    @error('name')
                                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                    @enderror
                                    <div class="col-md-6 col-12">
                                        <h4>Email:</h4>
                                        <input type="email" name="email" value="{{ Auth::user()->email }}" />
                                    </div>
                                    @error('email')
                                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                    @enderror
                                    <div class="col-12">
                                        <h4>Your Review:</h4>
                                        <textarea name="review_text" id="massage" cols="30" rows="10" placeholder="Your review here..."></textarea>
                                    </div>
                                    @error('review_text')
                                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                    @enderror
                                    <div class="col-12">
                                        <button class="btn-style">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @else
                        <br>
                        <h3 id="reply-title" class="blog-title text-danger">Need to login first to put a <span>review.</span></h3>
                        <h5> Click <a class="text-info" href="{{ url('/login') }}" target="_self">here</a> to login!</h5>
                        @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single-product-area end-->

    <!-- featured-product-area start -->
    <div class="featured-product-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-left">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @forelse($relatedProducts as $data)
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="featured-product-wrap">
                        <div class="featured-product-img">
                            <img src="{{asset('admins')}}/productimage/{{ $data->thambnail }}" alt="">
                        </div>
                        <div class="featured-product-content">
                            <div class="row">
                                <div class="col-7">
                                    <h3><a href="{{ route('home.product.details',['id'=>$data->id]) }}">{{ $data->name }}</a></h3>
                                    <p>${{ $data->selling_price }}</p>
                                </div>
                                <div class="col-5 text-right">
                                    <ul>
                                        <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                        <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="container">
                    <div class="row justify-content-center">
                        <h5>No Related Products found!</h5>
                    </div>
                </div>
                @endforelse

            </div>
        </div>
    </div>
    <!-- featured-product-area end -->

@endsection
