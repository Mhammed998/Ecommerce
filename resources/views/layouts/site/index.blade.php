<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}"/>
    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/slick.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/slick-theme.css')}}"/>
    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/nouislider.min.css')}}"/>
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/style.css')}}"/>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


</head>
<body>


@include('layouts.site.includes.header')
@include('layouts.site.includes.navbar')


@yield('content')



@include('layouts.site.includes.footer')

<!-- jQuery Plugins -->
<script src="{{asset('frontend/js/jquery.min.js ')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/js/nouislider.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
@yield('site-scripts')
</body>
</html>
