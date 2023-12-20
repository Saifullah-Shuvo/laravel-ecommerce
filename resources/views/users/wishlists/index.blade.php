@extends('users.layouts.app')

@section('title')
    User Wishlists
@endsection

@section('panel')
    <div class="d-flex justify-content-end">
        <a href="{{ route('cart.index') }}" class="btn btn-primary mb-2">Go to Cart Page</a>
    </div>
    <div class="card">
        <h4 class="card-header text-center">Wishlists</h4>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Add To Cart</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($wishlistItems as $key => $data)
                    <tr>
                        <td> {{ $key+1 }}</td>
                        <td class="images"><img height="100" width="100" src="{{asset('admins')}}/productimage/{{ $data->product->thambnail }}" alt=""></td>
                        <td class="product"><a href="{{ route('home.product.details',['id'=> $data->product->id]) }}" target="_blank">{{ $data->product->name }}</a></td>
                        <td class="ptice">{{ $data->product->selling_price }}</td>
                        <td class="addcart"><a href="{{ route('cart.add',['id'=> $data->product->id]) }}">Add to Cart</a></td>
                        <td class="remove">
                            <a href="{{ route('wishlist.remove',['id'=>$data->product->id]) }}">x</a>
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
        </div>
    </div>
@endsection
