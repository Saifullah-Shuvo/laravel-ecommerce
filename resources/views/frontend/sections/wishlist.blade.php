@extends('frontend.layouts.app')

@section('title')
    Wishlist Products
@endsection

@section('panel')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Wishlist Products</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><span>Wishlist Products</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    
    <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="http://themepresss.com/tf/html/tohoney/cart">
                        <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="addcart">Add to Cart</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($wishlistItems as $data)
                                <tr>
                                    <td class="images"><img height="100" width="100" src="{{asset('admins')}}/productimage/{{ $data->product->thambnail }}" alt=""></td>
                                    <td class="product"><a href="{{ route('home.product.details',['id'=> $data->product->id]) }}" target="_blank">{{ $data->product->name }}</a></td>
                                    <td class="ptice">${{ $data->product->selling_price }}</td>
                                    <td class="addcart"><a href="{{ route('cart.add',['id'=> $data->product->id]) }}">Add to Cart</a></td>
                                    <td class="remove">
                                        {{-- <i class="fa fa-times remove-icon" data-product-id="{{ $data->product->id }}"></i> --}}
                                        <a href="{{ route('wishlist.remove',['id'=>$data->product->id]) }}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <div class="container">
                                    <div class="row justify-content-center">
                                      <h5>No Wishlist Products Found!</h5>
                                    </div>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->

@endsection
