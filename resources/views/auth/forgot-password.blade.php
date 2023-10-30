@extends('frontend.layouts.app')

@section('title')
    Forgot Password
@endsection


@section('panel')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Forgot Password?</h2>
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><span>Forgot password</span></li>
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
                        <div class="mb-4 text-sm text-gray-600">
                            <p>Forgot your password? No problem. 
                                Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                            </p>
                        </div>
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Address -->
                            <div>
                                @error('email')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                                <label for="email"><b>Email</b></label>
                                <input type="email" name="email" id="email">
                            </div>    

                            <div>
                                <button>
                                    Email password Reset Link
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->

@endsection 