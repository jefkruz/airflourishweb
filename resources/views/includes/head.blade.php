<!doctype html>
<html lang="en" dir="rtl">

<head>
    <title>{{$page_title}} :: {{env('APP_NAME')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i%7CMerriweather:300,300i,400,400i,700,700i,900,900i"
        rel="stylesheet">

    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl-4.4.1.min.css')}}">


    <!-- Sidebar Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">

    <!-- Font Awesome Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- Custom Stylesheets -->
    <link rel="stylesheet" href="{{asset('css/style-rtl.css')}}">
    <link rel="stylesheet" id="cpswitch" href="{{asset('css/orange.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive-rtl.css')}}">

    <!-- Owl Carousel Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">

    <!-- Flex Slider Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" />

    <!--Date-Picker Stylesheet-->
    <link rel="stylesheet" href="{{asset('css/datepicker.css')}}">

    <!-- Magnific Gallery -->
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    @yield('styles')
</head>
