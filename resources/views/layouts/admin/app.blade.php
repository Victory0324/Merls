<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700&display=swap" rel="stylesheet"> -->

    <link rel="stylesheet" href="{{asset('vendors/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}">

    <!-- Scripts -->
    @vite([
        'resources/css/app.css', 
        'resources/css/classes.css',
        'public/toastr/toastr.min.css',
        'resources/fancybox/jquery.fancybox-1.3.4.css',
        'resources/js/app.js'])
</head>
<body>
    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-4">
                        @guest
                            @if (Route::has('password.request'))
                                <div class="ForMobile">
                                    <a href="{{ route('password.request') }}" class="btn btn-gray fancybox-inline">Forgot Password</a>
                                </div>        
                            @endif
                        @elseif (!Str::contains(request()->url(), 'signup'))
                            <a href="#navigation" class="menu-main fancybox-inline"><img src="{{ asset('img/menu-icon.png')}}"></a>
                        @endguest                    
                </div>
                <div class="col-sm-4 text-center">
                    <a href="{{url('/')}}"><img src="{{ asset('img/merls-logo.png') }}"></a>
                </div>
                <div class="col-sm-4 text-right">
                    @guest
                        @if (!Str::contains(request()->url(), 'register'))
                            <div class="inner">
                                <a href="#forgot-pw-popup" class="btn btn-gray fancybox-inline ForDesktop">Forgot Password</a>
                                @if (Route::has('register'))
                                    <a href="{{ url('register') }}" class="btn btn-black">Sign Up</a>
                                @endif
                            </div>
                        @endif
                    @else
                        @if (Str::contains(request()->url(), 'properties'))
                            <a href="{{route('admin.author_users')}}" class="menu" style="margin-top: 2px;"><img src="{{asset('img/search-icon.png')}}">
                        @endif
                        @if (!Str::contains(request()->url(), 'signup'))
                            <a href="#profile" class="menu fancybox-inline ml40"><img src="{{asset('img/user-icon.png')}}"></a>
                        @endif
                    @endguest

                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
    @include('layouts/scripts')
    @include('layouts/admin/scripts')
</body>
</html>
