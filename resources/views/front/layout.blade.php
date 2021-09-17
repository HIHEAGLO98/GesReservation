<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>

    <!--- basic page needs ================================================== -->
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS ================================================== -->
    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- script ================================================== -->
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script defer src="{{ asset('js/fontawesome/all.min.js') }}"></script>

    <!-- favicons ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

</head>

<body id="top">


    <!-- preloader  ================================================== -->
    <div id="preloader">
    	<div id="loader"></div>
    </div>


    <!-- header ================================================== -->
    @include('front.header')
    <!-- end s-header -->


    <!-- hero ================================================== -->
    @include('front.hero')
     <!-- end s-hero -->


    <!-- content ================================================== -->
    @include('front.article')
    <!-- end s-content -->


    <!-- footer ================================================== -->
    @include('front.footer') <!-- end s-footer -->


    <!-- JavaScript ================================================== -->
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
