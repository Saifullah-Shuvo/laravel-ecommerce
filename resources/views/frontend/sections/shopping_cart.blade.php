@extends('frontend.layouts.app')
@section('title')
    Shopping Cart
@endsection

@section('panel')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shopping Cart</h2>
                        <ul>
                            <li><a href="url('/')">Home</a></li>
                            <li><span>Shopping Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    {{-- @dd($cartItems->count()); --}}
    <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{-- <form action="" method="POST"> --}}
                        {{-- @csrf --}}
                        <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Total</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalSum = 0;
                                @endphp

                                @forelse($cartItems as $data)
                                <tr>
                                    <td class="images"><img height="100" width="100" src="{{asset('admins')}}/productimage/{{ $data->product->thambnail }}" alt=""></td>

                                    <td class="product"><a href="{{ route('home.product.details',['id'=> $data->product->id]) }}" target="_blank">{{ $data->product->name }}</a></td>

                                    <td class="ptice">${{ $data->product->selling_price }}</td>

                                    <td class="quantity cart-plus-minus">
                                        <input type="number" class="quantity-input" min="1" value="{{ $data->quantity }}" />
                                    </td>

                                    <td class="total total-price">${{ $data->product->selling_price * $data->quantity }}</td>

                                    <td class="remove">
                                        {{-- <i class="fa fa-times remove-icon" data-product-id="{{ $data->product->id }}"></i> --}}
                                        <a href="{{ route('cart.remove',['id'=>$data->product->id]) }}"><i class="fa fa-times"></i></a>
                                    </td>
                                    @php
                                        $totalSum += $data->product->selling_price * $data->quantity;
                                    @endphp
                                </tr>
                                @empty
                                <div class="container">
                                    <div class="row justify-content-center">
                                      <h5>No Cart Products Found!</h5>
                                    </div>
                                </div>
                                @endforelse

                            </tbody>
                        </table>
                        <div class="row mt-60">
                            <div class="col-xl-4 col-lg-5 col-md-6 ">
                                <div class="cartcupon-wrap">
                                    <ul class="d-flex">
                                        <li><a href="{{ route('home.shop') }}">Back To Shopping Page</a></li>
                                    </ul>
                                    <h3>Cupon</h3>
                                    <p>Enter Your Cupon Code if You Have One</p>
                                    <div class="cupon-wrap">
                                        <form action="{{ route('apply.coupon') }}" method="POST">
                                        @csrf
                                            <input type="text" name="coupon_code" id="coupon_code" required>
                                            <input type="hidden" name="totalSum" value="{{ $totalSum }}">
                                            <button type="submit">Apply Coupon</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">
                                    <h3>Cart Totals</h3>
                                    <ul>
                                        <li><span class="pull-left">Subtotal </span>${{ number_format($totalSum, 2) }}</li>
                                        @if(session()->has('applied_coupon') && session()->has('discount_amount'))
                                        <?php
                                            $appliedCoupon = session('applied_coupon');
                                            $discountAmount = session('discount_amount');
                                            $discountedSubtotal = $totalSum - $discountAmount;
                                        ?>
                                        <li><span class="pull-left">Discount </span>-${{ number_format($discountAmount, 2) }}</li>
                                        <li><span class="pull-left"> Total </span> ${{ number_format($discountedSubtotal, 2) }}</li>
                                        @else
                                        <li><span class="pull-left">Discount </span>-$0</li>
                                        <li><span class="pull-left"> Total </span> ${{ number_format($totalSum, 2) }}</li>
                                        @endif
                                    </ul>
                                    <a href="{{ route('show.checkout') }}">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->

@endsection

@push('script')

{{-- <script>
    $(document).ready(function() {
        // Listen for changes in quantity input fields
        $('.quantity-input').on('input', function() {
            updateTotalPrice($(this));
        });

        // Function to update total price based on quantity
        function updateTotalPrice(input) {
            var quantity = input.val();
            var price = parseFloat(input.closest('.cart-item').find('.product-price').text().replace('$', ''));
            var totalPrice = quantity * price;
            input.closest('.cart-item').find('.total-price').text('Total: $' + totalPrice.toFixed(2));

            // You may want to update the total price in the database using AJAX
            // Example: sendAjaxRequestToUpdateQuantity(productId, quantity);
        }

        // Example AJAX function
        function sendAjaxRequestToUpdateQuantity(productId, quantity) {
            $.ajax({
                url: '/update-quantity',
                method: 'POST',
                data: { productId: productId, quantity: quantity },
                success: function(response) {
                    console.log('Quantity updated successfully');
                },
                error: function(error) {
                    console.error('Error updating quantity:', error);
                }
            });
        }
    });
</script> --}}


@endpush
