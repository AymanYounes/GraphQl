<!-- JS includes -->

<script src="{{asset('js/vendor/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>

<script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('js/bootsnav.js')}}"></script>

<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@if (env('APP_ENV') == 'production')
    <script src="https://www.google.com/recaptcha/api.js?hl=en"
            type="text/javascript"></script>
    <script src="{{asset('js/recaptcha.js')}}"></script>
@endif
@yield('script')
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
