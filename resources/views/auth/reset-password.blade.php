@extends('frontend.layouts.app')

@section('title')
    Reset Password
@endsection


@section('panel')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Reset Password</h2>
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><span>Reset Password</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->

    <div class="account-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="account-form form-style">
                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf
                        
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        
                            <!-- Email Address -->
                            
                            <div>
                                <label for="email"><b>Email</b></label>
                                <input type="email" class="form-control" name="email" id="email" value="{{$request->email}}" required>
                                @error('email')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                        
                            <!-- Password -->
                        
                            <div>
                                <label for="password"><b>Password</b></label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="new password" required>
                                @error('password')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                        
                            <!-- Confirm Password -->
                        
                            <div>
                                <label for="password_confirmation"><b>Confirm Password</b></label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="confirm password" required>
                                @error('confirm_password')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                        
                            <div>
                                <button>
                                    Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection




















