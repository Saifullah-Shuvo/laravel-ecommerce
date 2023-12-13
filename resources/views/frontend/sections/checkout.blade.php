@extends('frontend.layouts.app')
@section('title')
    Checkout Page
@endsection

@section('panel')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Checkout</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><span>Checkout</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
        <form action="{{ route('order.place') }}" method="POST">
        @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-form form-style">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <p>First Name *</p>
                                <input type="text" name="first_name" value="{{ auth()->user()->name }}" required>
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Last Name *</p>
                                <input type="text" name="last_name" placeholder="Enter last name" required>
                            </div>

                            <div class="col-sm-6 col-12">
                                <p>Email Address *</p>
                                <input type="email" name="email" value="{{ auth()->user()->email}}" required>
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Phone No. *</p>
                                <input type="number" name="phone_number" placeholder="Enter phone number" required>
                            </div>
                            <div class="col-12">
                                <p>Country *</p>
                                <input type="text" name="country" placeholder="Enter country" required>
                            </div>
                            <div class="col-12">
                                <p>Your Address *</p>
                                <input type="text" name="address" placeholder="Enter Address" required>
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Postcode/ZIP</p>
                                <input type="text" name="zip_code" placeholder="Enter zip code" required>
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Town/City *</p>
                                <input type="text" name="city" placeholder="Enter town" required>
                            </div>

                            <div class="col-12">
                                <p>Order Notes </p>
                                <textarea name="order_notes" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="order-area">
                        <h3>Your Order</h3>

                        <ul class="total-cost">

                            @foreach($cartItems as $data)
                            <li>{{ $data->product->name}} (quantity : {{ $data->quantity }}) <span class="pull-right">${{ number_format($data->product->selling_price * $data->quantity,2) }}</span></li>
                            @endforeach

                            <li>Subtotal <span class="pull-right"><strong>{{ number_format($subtotal,2)  }}</strong></span></li>

                            @if(isset($appliedCoupon))
                            <li>Discount: Coupon({{ $appliedCoupon->code }}) <span class="pull-right">{{ number_format(-$discountAmount, 2) }}</span></li>
                            @endif

                            <li>Total<span class="pull-right">${{ number_format($totalPrice,2) }}</span></li>
                        </ul>
                        <ul class="payment-method">
                            <li>
                                <input name="payment_type" type="checkbox" value="bank_transfer" disabled>
                                <label for="bank">Direct Bank Transfer</label>
                            </li>
                            <li>
                                <input name="payment_type" type="checkbox" value="paypal" disabled>
                                <label for="paypal">Paypal</label>
                            </li>
                            <li>
                                <input name="payment_type" type="checkbox" value="credit_card" disabled>
                                <label for="card">Credit Card</label>
                            </li>
                            <li>
                                <input name="payment_type" type="checkbox" value="cash_on_delivery">
                                <label for="delivery">Cash on Delivery</label>
                            </li>
                        </ul>
                        <button type="submit">Place Order</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
    <!-- checkout-area end -->

@endsection
