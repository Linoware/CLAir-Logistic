<!DOCTYPE html>
<html class="default-style layout-navbar-fixed layout-fixed-offcanvas" lang={{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content={{ csrf_token() }}">
	  <meta name="user" content="Auth::user()">

    <title>{{ 'CL AIR EXPRESS' }}</title>

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
          <img src="{{ asset('static/img/logo/CL-Air-Logo.png') }}"/>
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
