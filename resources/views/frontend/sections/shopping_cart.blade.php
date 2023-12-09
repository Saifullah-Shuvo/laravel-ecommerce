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
                                        <input type="number" value="{{ $data->quantity }}" />
                                    </td>

                                    <td class="total">${{ $data->product->selling_price * $data->quantity }}</td>

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
                                        @endif
                                        {{-- <li><span class="pull-left">Discount </span>-$0</li>
                                        <li><span class="pull-left"> Total </span> ${{ number_format($totalSum, 2) }}</li> --}}
                                    </ul>
                                    <a href="">Proceed to Checkout</a>
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
        $('.quantity input').on('input', function() {
            var productId = $(this).data('product-id');
            var newQuantity = $(this).val();

            // Make an AJAX request to update the quantity
            $.ajax({
                url: '/update-cart-quantity/' + productId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    quantity: newQuantity
                },
                success: function(response) {
                    // Handle success, e.g., update the UI to reflect the new quantity
                    console.log(response.message);
                },
                error: function(error) {
                    console.log('Error updating quantity: ' + error);
                }
            });
        });
    });
</script> --}}


@endpush
