<!doctype html>
<html class="loading" data-textdirection="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/vertical-modern-menu-template/materialize.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/vertical-modern-menu-template/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom/custom.css')}}">
</head>

<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns" data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

<div id="main" style="padding-left: 0px !important;">
<div class="row">
    <div class="col s12">
        <div class="container">
            <div id="login-page" class="row">
                <div class="col s12 m6 l4"></div>
                <div style="margin-top: 20vh;" class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">

                    <form class="login-form" method="POST" action="{{ route('creditors.password.email') }}">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <h5 class="ml-4">{{ __('Forgot Password') }}</h5>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">person_outline</i>
                                <input id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email">
                                <label for="email" class="center-align">{{ __('E-Mail Address') }}</label>

                            </div>
                        </div>


                        <div class="row">
                            <div class="input-field col s12">

                                <button type="submit" style="margin-bottom: 3%;" class="btn waves-effect waves-light col s12">
                                {{ __('Send Password Reset Link') }}
                                </button>

                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="content-overlay"></div>
    </div>
</div>
</div>

<!-- Scripts -->
<script src="{{ asset('assets/js/vendors.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins.min.js')}}"></script>
<script src="{{ asset('assets/js/search.min.js')}}"></script>
<script src="{{ asset('assets/js/custom/custom-script.min.js')}}"></script>
<script src="{{ asset('assets/js/scripts/customizer.min.js')}}"></script>

<script>
@error('email')
    var toastHTML = "{{$message}}";
    M.toast({html: toastHTML});
@enderror

@if (session('status'))
    var toastHTML = "{{session('status')}}";
    M.toast({html: toastHTML});
@endif
</script>
</body>
</html>
