<!DOCTYPE html>
<html class="default-style layout-navbar-fixed layout-fixed-offcanvas" lang={{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content={{ csrf_token() }}">
	<meta name="user" content="Auth::user()">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

   <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">

  <!-- Icon fonts -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/ionicons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/linearicons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/open-iconic.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/pe-icon-7-stroke.css') }}">

  <!-- Core stylesheets -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/bootstrap.css') }}" class="theme-settings-bootstrap-css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/appwork.css') }}" class="theme-settings-appwork-css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-corporate.css') }}" class="theme-settings-theme-css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/colors.css') }}" class="theme-settings-colors-css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/uikit.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/spinkit/spinkit.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/authentication.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/ladda/ladda.css') }}">
 <script src="{{ asset('assets/vendor/js/material-ripple.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/layout-helpers.js') }}"></script>
   <!-- Theme settings -->
  <!-- This file MUST be included after core stylesheets and layout-helpers.js in the <head> section -->
  <!-- <script src="{{ asset('assets/vendor/js/theme-settings.js') }}"></script> -->
  <!-- <script>
    window.themeSettings = new ThemeSettings({
      cssPath: '/assets/vendor/css/rtl/',
      themesPath: '/assets/vendor/css/rtl/'
    });
  </script> -->
<!-- Splash screen -->
    <style>
      .app-splash-screen { background: #fff; position: fixed; display: block; z-index: 99999999; top: 0; right: 0; bottom: 0; left: 0; opacity: 1; transition: opacity .3s; }
      .app-splash-screen-content { position: absolute; top: 50%; left: 50%; -webkit-animation: appSplashScreenAnimation 1.2s ease-in-out 0s infinite; animation: appSplashScreenAnimation 1.2s ease-in-out 0s infinite; }
      @-webkit-keyframes appSplashScreenAnimation {
        0%, 20% { -webkit-transform: translate(-50%, -50%) rotateY(0); transform: translate(-50%, -50%) rotateY(0); }
        50% { -webkit-transform: translate(-50%, -50%) rotateY(180deg); transform: translate(-50%, -50%) rotateY(180deg); }
        80%, 100% { -webkit-transform: translate(-50%, -50%) rotateY(360deg); transform: translate(-50%, -50%) rotateY(360deg); }
      }
      @keyframes appSplashScreenAnimation {
        0%, 20% { -webkit-transform: translate(-50%, -50%) rotateY(0); transform: translate(-50%, -50%) rotateY(0); }
        50% { -webkit-transform: translate(-50%, -50%) rotateY(180deg); transform: translate(-50%, -50%) rotateY(180deg); }
        80%, 100% { -webkit-transform: translate(-50%, -50%) rotateY(360deg); transform: translate(-50%, -50%) rotateY(360deg); }
      }
    </style>
    <!-- / Splash screen -->
    <!-- Core scripts -->
  <script src="{{ asset('assets/vendor/js/pace.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  

</head>
<body >
	 <!-- Splash screen -->
    <div class="app-splash-screen">
      <div class="app-splash-screen-content">
        <div class="ui-w-60">
          <svg class="d-block" viewBox="0 0 148 80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient id="a" x1="46.49" x2="62.46" y1="53.39" y2="48.2" gradientUnits="userSpaceOnUse"><stop stop-opacity=".25" offset="0"></stop><stop stop-opacity=".1" offset=".3"></stop><stop stop-opacity="0" offset=".9"></stop></linearGradient><linearGradient id="e" x1="76.9" x2="92.64" y1="26.38" y2="31.49" xlink:href="#a"></linearGradient><linearGradient id="d" x1="107.12" x2="122.74" y1="53.41" y2="48.33" xlink:href="#a"></linearGradient></defs><path class="fill-primary" transform="translate(-.1)" d="M121.36,0,104.42,45.08,88.71,3.28A5.09,5.09,0,0,0,83.93,0H64.27A5.09,5.09,0,0,0,59.5,3.28L43.79,45.08,26.85,0H.1L29.43,76.74A5.09,5.09,0,0,0,34.19,80H53.39a5.09,5.09,0,0,0,4.77-3.26L74.1,35l16,41.74A5.09,5.09,0,0,0,94.82,80h18.95a5.09,5.09,0,0,0,4.76-3.24L148.1,0Z"></path><path transform="translate(-.1)" d="M52.19,22.73l-8.4,22.35L56.51,78.94a5,5,0,0,0,1.64-2.19l7.34-19.2Z" fill="url(#a)"></path><path transform="translate(-.1)" d="M95.73,22l-7-18.69a5,5,0,0,0-1.64-2.21L74.1,35l8.33,21.79Z" fill="url(#e)"></path><path transform="translate(-.1)" d="M112.73,23l-8.31,22.12,12.66,33.7a5,5,0,0,0,1.45-2l7.3-18.93Z" fill="url(#d)"></path></svg>
        </div>
      </div>
    </div>
    <!-- / Splash screen -->
    
    @yield('content')
    
  <!-- Core scripts -->
  <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
  
  <script src="{{ asset('assets/vendor/js/sidenav.js') }}"></script>
  <!-- Libs -->
  <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

  <!-- Demo -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(e){
      // $('.theme-settings-open-btn').css('visibility','hidden');  
    })
    
  </script>
  <script>
	 window.Laravel = {!! json_encode([
		'csrfToken' => csrf_token(),
		'user' => Auth::user()
	]) !!};
  </script>
</body>
</html>
