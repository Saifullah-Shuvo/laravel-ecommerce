@extends('frontend.layouts.app')

@section('title')
About
@endsection

@section('panel')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>About us</h2>
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><span>About</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->

    <!-- about-area start -->
    <div class="about-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-wrap text-center">
                        <h3>Welcome Our Story! </h3>
                        <p class="mb-0">In the heart of a bustling city, Nick's laptop, a faithful companion of many endeavors, was showing signs of wear. Seeking a technological upgrade, he discovered S-TECH, a gateway to innovation.

                            Navigating through the curated selection of laptops, Nick found himself immersed in a world where possibilities unfolded at every click. From ultrathin designs to powerhouse performance, each option teased the prospect of a seamless user experience and enhanced productivity.
                            
                            As he ventured into the realm of computer accessories, a symphony of efficiency echoed through mechanical keyboards, ergonomic mice beckoned precision, and futuristic chargers promised to match his dynamic lifestyle. Each accessory became a testament to S-TECH's commitment to elevating the overall user experience.
                            
                            The phone section revealed a convergence of sleek design and groundbreaking features. From cameras that captured breathtaking moments to multitasking juggernauts, the smartphones were not just devices but gateways to a connected world.
                            
                            With a swift and secure checkout, Nick sealed his tech odyssey. The confirmation email echoed the assurance that his chosen companions for the digital frontier were en route. Anticipation peaked as he unboxed his treasures, each device a catalyst for a new chapter.
                            
                            Empowered by S-TECH, Nick embraced a future where innovation met ambition. The journey had been more than a shopping spree; it was a narrative of empowerment, where technology seamlessly integrated into one's life elevated not just tasks but entire experiences.
                            
                            Armed with his new tech companions, Nick ventured forth into a digital realm, ready to script a story of innovation and success. Each click, keystroke, and interaction became a step toward a brighter, more connected tomorrow, all made possible by S-TECH.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-area end -->

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
                                <li><a class="edit" data-id = "{{ $data->id }}" data-toggle="modal" data-target="#popularproductdetails" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="{{ route('wishlist.add',['id'=>$data->id]) }}"><i class="fa fa-heart"></i></a></li>
                                <li><a href="{{ route('cart.add',['id'=> $data->id]) }}"><i class="fa fa-shopping-bag"></i></a></li>
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
            @endforeach

        </ul>
    </div>
</div>
    <!-- product-area end -->

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
                            <span class="pull-left">$</span>
                            <span id="price" class="pull-left">$</span>
                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>
                        <p id="description"></p>
                        <ul class="input-style">
                            <li class="quantity cart-plus-minus">
                                <input type="text" value="1" />
                            </li>
                            <li><a href="cart.html">Add to Cart</a></li>
                        </ul>
                        <ul class="cetagory">
                            <li>Categories:</li>
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

@endpush
