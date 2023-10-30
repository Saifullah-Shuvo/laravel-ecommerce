@extends('frontend.layouts.app')

@section('title')
    Register
@endsection

@section('panel')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Account</h2>
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><span>Register</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- checkout-area start -->
    <div class="account-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="account-form form-style">
                        <form action="{{route('register')}}" method="POST">
                            @csrf

                            @error('name')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                            <p>User Name*</p>
                            <input type="text" name="name" id="name">

                            @error('email')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                            <p>User Email Address *</p>
                            <input type="email" name="email" id="email">

                            @error('password')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                            <p>Password *</p>
                            <input type="password" name="password" id="password">

                            <p>Confirm Password *</p>
                            <input type="password" name="password_confirmation" id="password_confirmation">
                            
                            <button type="submit">Register</button>
                            <div class="text-center">
                                <a href="{{url('/login')}}">Or Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->

@endsection