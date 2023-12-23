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
                                            <li><a class="edit" data-id = "{{ $data->id }}" data-toggle="modal" data-target="#popularproductdetails"
                                                href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
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
                        @empty
                            <div class="container">
                                <div class="row justify-content-center">
                                <h5>No Products found in this Category!</h5>
                                </div>
                            </div>
                        @endforelse

                    </ul>
                </div>
            </div>
            {{-- paginate links here  --}}
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
