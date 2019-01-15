<head>
    <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Silica Admin</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/lightgallery.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/vertical-layout-light/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}"/>
    <script src="{{asset('assets/js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('assets/js/print.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}" defer></script>
    @yield('customcss')
</head>

