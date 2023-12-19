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
            @forelse ($details as $data)
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
            @empty
            <div class="container">
                <div class="row justify-content-center">
                  <h5>No Address Data Found!</h5>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- contact-area end -->

<!-- map-area start -->
<div class="google-map">
    <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.4172711859983!2d90.38319271131536!3d23.874817883898302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0a52e81845b%3A0xa1c5a240675d1c27!2sTHESOFTKING%20Limited!5e0!3m2!1sen!2sbd!4v1701351549405!5m2!1sen!2sbd" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

@endsection
