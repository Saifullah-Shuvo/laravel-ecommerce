@extends('users.layouts.app')

@section('title')
    User Cartlists
@endsection

@section('panel')
    <div class="d-flex justify-content-end">
        <a href="{{ route('cart.index') }}" class="btn btn-primary mb-2">Go to Cart Page</a>
    </div>

    <div class="card">
        <h5 class="card-header text-center">My Cartlists</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>

                <tbody class="table-border-bottom-0">
                    @forelse($cartItems as $key => $data)
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td class="images"><img height="100" width="100" src="{{asset('admins')}}/productimage/{{ $data->product->thambnail }}" alt=""></td>
                        <td class="product"><a href="{{ route('home.product.details',['id'=> $data->product->id]) }}" target="_blank">{{ $data->product->name }}</a></td>
                        <td class="ptice">{{ $data->product->selling_price }}</td>
                        <td class="quantity">{{ $data->quantity }}</td>
                        <td class="total total-price">${{ $data->product->selling_price * $data->quantity }}</td>
                        <td class="remove">
                            <a href="{{ route('cart.remove',['id'=>$data->product->id]) }}">x</a>
                        </td>
                    </tr>
                    @empty 
                    <div class="container">
                        <div class="row justify-content-center">
                            <h5>No Orders Data Found!</h5>
                        </div>
                    </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
