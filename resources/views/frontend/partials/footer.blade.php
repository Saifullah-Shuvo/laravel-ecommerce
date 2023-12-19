@php
    // Get About Details
    $details = App\Models\Frontend\Details::get();
@endphp
<div class="footer-area">
    <div class="footer-top">
        <div class="container">
            <div class="footer-top-item">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="footer-top-text text-center">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('home.about') }}">Our Story</a></li>
                                <li><a href="{{ route('home.shop') }}">Shop Page</a></li>
                                <li><a href="{{ route('home.contact') }}">contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                @forelse ($details as $data)
                <div class="col-lg-2 col-md-3 col-sm-12">
                    <div class="footer-icon">
                        <ul class="d-flex">
                            <li><a href="{{$data->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{$data->tweeter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{$data->linkedIn}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{$data->google_plus}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-12">
                    <div class="footer-content">
                        <p>{{ $data->short_details }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8 col-sm-12">
                    <div class="footer-adress">
                        <ul>
                            <li><span>Email:</span> {{ $data->main_email }}</li>
                            <li><span>Tel:</span> {{ $data->main_phone }}</li>
                            <li><span>Adress:</span> {{ $data->adderess }}</li>
                        </ul>
                    </div>
                </div>
                @empty
                <div class="container">
                    <div class="row justify-content-center">
                      <h5>No Footer Data Found!</h5>
                    </div>
                </div>
                @endforelse
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="footer-reserved">
                        <ul>
                            <li>Copyright © <script>document.write(new Date().getFullYear())</script> <a href="{{ route('home') }}">{{ config('app.name') }}</a>
                                <br> All rights reserved.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
