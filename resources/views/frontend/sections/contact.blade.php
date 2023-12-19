@extends('frontend.layouts.app')

@section('title')
Contact Page
@endsection

@section('panel')

<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Contact Us</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>Contact</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->

<!-- faq-area start -->
<div class="about-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="about-wrap text-center">
                    <h3>FAQ</h3>
                </div>
                <div class="accordion" id="accordionExample">

                    @forelse($faqs as $faq)
                    <div class="card border-0">
                        <div class="card-header border-0 p-0 my-3">
                            <button class="btn btn-link text-left py-3 w-100 text-white" type="button" data-toggle="collapse" data-target="#faq{{ $faq->id }}" aria-expanded="true">
                                {{ $faq->question }}
                            </button>
                        </div>
                        <div id="faq{{ $faq->id }}" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="container">
                        <div class="row justify-content-center">
                          <h5>No FAQ Data Found!</h5>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<!-- faq-area end -->
@forelse ($details as $data)
<div class="contact-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="contact-form form-style">
                    <div class="cf-msg"></div>
                    <form action="{{ route('home.contact.message') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <input type="text" placeholder="Name" name="name">
                            </div>
                            @error('name')
                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                            <div class="col-12 col-sm-6">
                                <input type="email" placeholder="Email" name="email">
                            </div>
                            @error('email')
                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                            <div class="col-12">
                                <input type="text" placeholder="Subject" name="subject">
                            </div>
                            @error('subject')
                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                            <div class="col-12">
                                <textarea class="contact-textarea" placeholder="Message" name="message"></textarea>
                            </div>
                            @error('message')
                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                            <div class="col-12">
                                <button id="submit" name="submit">SEND MESSAGE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="contact-wrap">
                    <ul>
                        <li>
                            <i class="fa fa-home"></i> Address:
                            <p>{{ $data->adderess }}</p>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i> Email address:
                            <p>
                                <span> {{ $data->main_email }} </span>
                                <span> {{ $data->alternative_email }} </span>
                            </p>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i> phone number:
                            <p>
                                <span>{{ $data->main_phone }}</span>
                                <span>{{ $data->alternative_phone }}</span>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- contact-area end -->

<!-- map-area start -->
<div class="google-map">
    <div class="contact-map">
        {!! $data->google_map !!}
    </div>
</div>
@empty
    <div class="container">
        <div class="row justify-content-center">
            <h5>No Address Data Found!</h5>
        </div>
    </div>
@endforelse

@endsection
