@extends('users.layouts.app')

@section('title')
    Order Details
@endsection

@section('panel')
    {{-- @dd($orderDetails); --}}
    <div class="d-flex justify-content-end">
        <a href="{{ route('order.all') }}" class="btn btn-primary mb-2">Back</a>
    </div>

    <div class="card">

        <h5 class="card-header text-center">Order Details</h5> 
        <div class="row">

            <div class="col-md-6">
                <div class="card mb-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Order No: <b>{{ $orderDetails->order_id }}</b></li>
                        <li class="list-group-item">Total Price: <b>{{ $orderDetails->total }}</b></li>
                        <li class="list-group-item">Payment Type: <b>{{ $orderDetails->payment_type }}</b></li>
                        <li class="list-group-item">Order Date: <b>{{ $orderDetails->created_at }}</b></li>
                        <li class="list-group-item">
                            Payment Status: 
                            @if($orderDetails->status == 0)
                                <span class="badge rounded-pill bg-primary">pending</span>
                            @elseif($orderDetails->status == 1)
                                <span class="badge rounded-pill bg-success">confirmed</span>
                            @elseif($orderDetails->status == 2)
                                <span class="badge rounded-pill bg-success">shipped</span>
                            @elseif($orderDetails->status == 3)
                                <span class="badge rounded-pill bg-success">delivered</span>
                            @elseif($orderDetails->status == 4)
                                <span class="badge rounded-pill bg-success">cancelled</span>
                            @endif
                        </li>
                        {{-- <li class="list-group-item">Order Status: <b>{{ $orderDetails->status == 0 ? <span class="badge rounded-pill bg-primary">pending</span> }}</b></li> --}}
                    
                    </ul>
                </div>
            </div>

            <!-- Product Card Column -->

            <div class="col-md-6">
                <div class="card mb-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Phone Number: <b>{{ $orderDetails->phone_number }}</b> </li>
                        <li class="list-group-item">Email: <b>{{ $orderDetails->email }}</b> </li>
                        <li class="list-group-item">Shipping Address: <b>{{ $orderDetails->address }}</b></li>
                        <li class="list-group-item">City & Zip: <b>{{ $orderDetails->city }} ,
                                {{ $orderDetails->zip_code }}</b></li>
                        <li class="list-group-item">
                            Payment Status: 
                            @if($orderDetails->payment_type == 'cash_on_delivery')
                                <span class="badge rounded-pill bg-primary">pending</span>
                            @else
                                <span class="badge rounded-pill bg-success">completed</span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse($productDetails as $key => $data)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            <strong>{{ $data->product_name }}</strong></td>
                                        <td>{{ $data->quantity }}</td>
                                        <td>{{ number_format($data->selling_price,2) }}</td>
                                        <td>{{ number_format($data->quantity * $data->selling_price, 2) }}</td>

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
            </div>

        </div>
        <div class="card text-end mb-3">
            <div class="card-body">
                <h6 class="card-title">Subtotal: {{ number_format($orderDetails->subtotal, 2) }}</h6>
                @if ($orderDetails->discount == '')
                @else
                    <p class="card-text">Discount({{ $orderDetails->coupon_code }}): {{ number_format($orderDetails->discount, 2) }}</p>
                @endif
                <h5 class="card-title">Total: {{ number_format($orderDetails->total, 2) }}</h5>
            </div>
        </div>
    </div>
@endsection
