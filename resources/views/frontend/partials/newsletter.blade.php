<section class="social-newsletter-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="newsletter text-center">
                    <h3>Subscribe  Newsletter</h3>
                    <div class="newsletter-form">
                        <form action="{{ route('home.newsletter') }}" method="POST">
                        @csrf
                            <input name="subscriber" type="email" class="form-control" placeholder="Enter Your Email Address...">
                            @error('subscriber')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                            <button type="submit"><i class="fa fa-send"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end container -->
</section>