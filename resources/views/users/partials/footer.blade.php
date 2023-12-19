<footer class="content-footer footer bg-footer-theme">
    <div
        class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
            , made with ❤️ by
            <a href="{{ route('home') }}" target="_self"
                class="footer-link fw-bolder">{{ config('app.name') }}</a>
        </div>
        <div>

            <a href="{{ route('home.about') }}" class="footer-link me-4"
                target="_blank">About</a>
            <a href="{{ route('home.shop') }}" class="footer-link me-4"
                target="_blank">Shop Page</a>
            <a href="{{ route('home.contact') }}" class="footer-link me-4"
                target="_blank">Contact Us</a>

        </div>
    </div>
</footer>
