@extends('frontend.layouts.app')

@section('title')
    Login
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
                            <li><span>Login</span></li>
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
                        <form method="POST" action="{{route('login')}}">
                        @csrf
                            @error('email')
                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                            <p>Email Address *</p>
                            <input type="email" name="email" id="email" >
                            
                            @error('password')
                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                            <p>Password *</p>
                            <input type="password" name="password" id="password" >

                            <div class="row">
                                <div class="col-lg-6">
                                    <input id="remember_me" name="remember" type="checkbox">
                                    <label for="password">Save Password</label>
                                </div>
                                <div class="col-lg-6 text-right">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}"> <b>Forgot your password? </b> </a>
                                    @endif
                                </div>
                            </div>

                            <button type="submit">SIGN IN</button>
                            
                            <div class="text-center">
                                <a href="{{url('/register')}}">Or Creat an Account</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->
@endsection
