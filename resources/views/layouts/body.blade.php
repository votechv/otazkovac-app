<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/brands.min.css" integrity="sha512-OivR4OdSsE1onDm/i3J3Hpsm5GmOVvr9r49K3jJ0dnsxVzZgaOJ5MfxEAxCyGrzWozL9uJGKz6un3A7L+redIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{ asset('cdn/favicon.png') }}">

    <title>Otázkovač – @yield('title')</title>


        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
<meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.css')}}">
<!-- ico-font-->
<link rel="stylesheet" type="text/css" href="{{asset('css/icofont.css')}}">
<!-- Themify icon-->
<link rel="stylesheet" type="text/css" href="{{asset('css/themify.css')}}">
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="{{asset('css/flag-icon.css')}}">
<!-- Feather icon-->
<link rel="stylesheet" type="text/css" href="{{asset('css/feather-icon.css')}}">
<!-- Plugins css start-->
@stack('css')
<!-- Plugins css Ends-->
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
<!-- App css-->
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<link id="color" rel="stylesheet" href="{{asset('css/color-1.css')}}" media="screen">
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="/path/to/flickity.pkgd.min.js"></script>


</head>
<body>


<div class="page-wrapper compact-wrapper" id="pageWrapper">

@include('navigation')

<div id="app"></div>

    <div class="content">

        @yield('content')


    </div>

</div>

@push('scripts')
<script src="{{asset('js/prism/prism.min.js')}}"></script>
<script src="{{asset('js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('js/custom-card/custom-card.js')}}"></script>
<script src="{{asset('js/tooltip-init.js')}}"></script>

<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('js/sidebar-menu.js')}}"></script>
<script src="{{asset('js/config.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('js/bootstrap/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
<!-- Plugins JS start-->
@stack('scripts')
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('js/script.js')}}"></script>
@endpush
</body>


</html>
