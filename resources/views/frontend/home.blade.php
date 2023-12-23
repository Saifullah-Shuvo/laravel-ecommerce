@extends('frontend.layouts.app')

@section('title')
Home Page
@endsection

@push('style')
    <style>
        .countdown-item {
            display: inline-block;
            margin: 0 10px;
            font-size: 40px;
            font-weight: bold;
            color: #333;
        }
    </style>
@endpush

@section('panel')
    {{-- @dd($featuredProduct) --}}
    <!-- slider-area start -->
    <div class="slider-area">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                @foreach ($slider as $data)
                <div class="swiper-slide overlay">
                    <div class="single-slider slide-inner slide-inner1"
                    style="background-image: url('{{asset('admins')}}/sliderimage/{{ $data->image }}');">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-lg-9 col-12">
                                    <div class="slider-content">
                                        <div class="slider-shape">
                                            <h2 data-swiper-parallax="-500">{{ $data->title }}</h2>
                                            <p data-swiper-parallax="-400">{{ $data->description }}</p>
                                            <a class="btn-md rounded" href="{{ route('home.shop') }}" data-swiper-parallax="-300">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- slider-area end -->

    <!-- product-area start -->
    <div class="product-area product-area-2">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Popular Products</h2>
                        <img src="{{asset('frontend/')}}/assets/images/section-title.png" alt="">
                    </div>
                </div>
            </div>
            <ul class="row">

                @foreach ($popularProduct as $data)
                <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="product-wrap">
                        <div class="product-img">
                            <img src="{{asset('admins')}}/productimage/{{ $data->thambnail }}" alt="">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a class="edit" data-id = "{{ $data->id }}" data-toggle="modal" data-target="#popularproductdetails"
                                        href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="{{ route('wishlist.add',['id'=>$data->id]) }}"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="{{ route('cart.add',['id'=>$data->id]) }}"><i class="fa fa-shopping-bag"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('home.product.details',['id'=>$data->id]) }}">{{ $data->name }}</a></h3>
                            <p class="pull-left"><span style="color: red">#{{ $data->code }}</span> </p>
                            <p class="pull-right"> Price: <b>{{ $data->selling_price }}</b> </p>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
    <!-- product-area end -->

    <!-- featured-area start -->
    {{-- @dd($featuredProduct) --}}
    <div class="featured-area featured-area2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="featured-active2 owl-carousel next-prev-style">

                        @foreach ($featuredProduct as $data)
                        <div class="featured-wrap">
                            <div class="featured-img">
                                <img src="{{asset('admins')}}/productimage/{{ $data->thambnail }}" alt="">
                                <div class="featured-content">
                                    <a href="{{ route('home.product.details',['id'=>$data->id]) }}">{{ $data->name }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured-area end -->

    <!-- start count-down-section -->
    <div class="count-down-area count-down-area-sub">
        <section class="count-down-section section-padding parallax" data-speed="7">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Hot Deals</h5>
                                {{-- <p class="card-text">Check out our exclusive deal for today!</p> --}}

                                <div class="count-down-clock text-center">
                                    <div id="countdown-timer">
                                        <div class="countdown-item" id="days"></div>
                                        <div class="countdown-item" id="hours"></div>
                                        <div class="countdown-item" id="minutes"></div>
                                        <div class="countdown-item" id="seconds"></div>
                                    </div>
                                </div>

                                <a href="{{ route('hot.deals') }}" class="btn btn-primary">Grab the Deals</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->

        </section>
    </div>
    <!-- end count-down-section -->

    <!-- product-area start -->
    <div class="product-area">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Latest Products</h2>
                        <img src="{{asset('frontend/')}}/assets/images/section-title.png" alt="">
                    </div>
                </div>
            </div>
            <ul class="row">

                @foreach ($latestProduct as $data)
                <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="product-wrap">
                        <div class="product-img">
                            <span>Sale</span>
                            <img src="{{asset('admins')}}/productimage/{{ $data->thambnail }}" alt="">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a class="edit" data-id = "{{ $data->id }}" data-toggle="modal" data-target="#popularproductdetails" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="{{ route('wishlist.add',['id'=>$data->id]) }}"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="{{ route('cart.add',['id'=> $data->id]) }}"><i class="fa fa-shopping-bag"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('home.product.details',['id'=>$data->id]) }}">{{ $data->name }}</a></h3>
                            <p class="pull-left"><span style="color: red">#{{ $data->code }}</span> </p>
                            <p class="pull-right"> Price: <b>{{ $data->selling_price }}</b> </p>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
    <!-- product-area end -->

    <!-- testmonial-area start -->
    <div class="testmonial-area testmonial-area2 bg-img-2 black-opacity">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="test-title text-center">
                        <h2>What Our client Says</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 col-12">
                    <div class="testmonial-active owl-carousel">
                        @forelse($testimonials as $testimonial)
                        <div class="test-items test-items2">
                            <div class="test-content">
                                <p>{{ $testimonial->text }}</p>
                                <h2>{{ $testimonial->name }}</h2>
                                <p>{{ $testimonial->profession }} at {{ $testimonial->company }}</p>
                            </div>
                            <div class="test-img2">
                                <img src="{{asset('admins')}}/testimonialimage/{{ $testimonial->image }}" alt="">
                            </div>
                        </div>
                        @empty
                        <div class="container">
                            <div class="row justify-content-center">
                              <h5>No Testimonial Data Found!</h5>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testmonial-area end -->

    <!-- product details modal start  -->
    <div class="modal fade" id="popularproductdetails" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="container">
                    <div class="row justify-content-center">
                      <h5 class="text-danger">Product Details</h5 class="text-red">
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body d-flex">
                    <div class="product-single-img w-50">
                        <img id="preview" src="assets/images/product/product-details.jpg" alt="">
                    </div>
                    <div class="product-single-content w-50">
                        <h3 id="productName"></h3>
                        <div class="rating-wrap fix">
                            <h6>
                                <span class="pull-left">Price :   </span>
                                <span id="price" style="color: red" class="pull-left">  </span>
                            </h6>
                        </div>
                        <p id="description"></p>

                        <ul class="cetagory">
                            <li>Category:</li>
                            <li><b><a id="categoryName" href="#"></a></b></li>

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
        </div>
    </div>
    <!-- product details modal end  -->

@endsection

@push('script')

    <script type="text/javascript">
        $(document).ready(function() {
            $('body').on('click', '.edit', function() {
                let cat_id = $(this).data('id');
                let url="{{route('home.product.details.modal',':id')}}"
                $.get(url.replace(':id',cat_id), function(productDetails) {
                    // console.log(productDetails.category);
                    $("#preview").attr('src',productDetails.thambnail)
                    $('#productName').text(productDetails.name);
                    $('#price').text(productDetails.selling_price);
                    $('#description').text(productDetails.description);
                    $('#categoryName').text(productDetails.category.category_name);
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX request failed: " + textStatus, errorThrown);
                    // Handle the error, e.g., display an error message.
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
    // Set the end date and time of the deal
    var dealEndDate = moment().add(1, 'days'); // Adjust the end date as needed

    // Update the countdown every second
    var countdownInterval = setInterval(updateCountdown, 1000);

    function updateCountdown() {
        var now = moment();
        var timeDifference = dealEndDate.diff(now, 'seconds');

        if (timeDifference <= 0) {
            // Deal has ended, update UI accordingly
            clearInterval(countdownInterval);
            $('#countdown-timer').html('<p>Deal has ended!</p>');
        } else {
            // Deal is still ongoing, update countdown
            var days = Math.floor(timeDifference / (24 * 60 * 60));
            var hours = Math.floor((timeDifference % (24 * 60 * 60)) / (60 * 60));
            var minutes = Math.floor((timeDifference % (60 * 60)) / 60);
            var seconds = timeDifference % 60;

            $('#days').text(days + 'd');
            $('#hours').text(hours + 'h');
            $('#minutes').text(minutes + 'm');
            $('#seconds').text(seconds + 's');
        }
    }
});
    </script>

@endpush
