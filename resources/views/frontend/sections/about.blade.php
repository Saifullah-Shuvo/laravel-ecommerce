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
                    @forelse ($details as $data)
                    <div class="about-wrap text-center">
                        <h3>Welcome Our Story! </h3>
                        <p class="mb-0">{{ $data->about_details }}</p>
                    </div>
                    @empty
                    <div class="container">
                        <div class="row justify-content-center">
                          <h5>No Data Found!</h5>
                        </div>
                    </div>
                    @endforelse
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

@endpush
