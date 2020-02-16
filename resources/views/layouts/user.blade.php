<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>{{ config('app.name', 'Pettyperry') }}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <meta name="keywords" content="blog, business, entertainment, news, sport, wedding">
        <meta name="author" content="PettyPerry | Okandeji">
        <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('user/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('user/css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{asset('user/css/custom_bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('user/css/fontawesome.css')}}">
        <link rel="stylesheet" href="{{asset('user/css/elegant.css')}}">
        <link rel="stylesheet" href="{{asset('user/css/plyr.css')}}">
        <link rel="stylesheet" href="{{asset('user/css/aos.css')}}">
        <link rel="stylesheet" href="{{asset('user/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('user/css/themify-icons.css')}}">
        <link rel="shortcut icon" href="{{asset('user/images/logo.ico')}}">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    </head>
    <body>
      <div id="main">
        @include('partials.navbar')
        {{--  <div class="container">  --}}
                @include('partials.messages')
           @yield('content')
        {{--  </div>  --}}
        @include('partials.footer')
        <script src="{{asset('user/js/jquery-3.4.0.min.js')}}"></script>
        <script src="{{asset('user/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('user/js/slick.min.js')}}"></script>
        <script src="{{asset('user/js/plyr.min.js')}}"></script>
        <script src="{{asset('user/js/aos.js')}}"></script>
        <script src="{{asset('user/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('user/js/masonry.pkgd.min.js')}}"></script>
        <script src="{{asset('user/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('user/js/numscroller-1.0.js')}}"></script>
        <script src="{{asset('user/js/jquery.countdown.min.js')}}"></script>
        <script src="{{asset('user/js/main.js')}}"></script>
      </div>
</body>
</html>
