<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maknoon Lifestyle</title>

    <!---===========favicon=====-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/logo/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/logo/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/logo/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('assets/img/logo/favicon/site.webmanifest')}}">
    

    <!--======== Bootstrap 4.6===-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <!--======== font awesome===-->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css')}}">
    <!---======= owl carousel======-->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css')}}">
    <!---======= Header css-->
    <link rel="stylesheet" href="{{ asset('assets/css/header-css/reset.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css')}}">


</head>

@include('user.userNavbar')


    @yield('userDashboard')
    @yield('userCategoryProduct')


@include('user.userFooter')

    <!---=====jquery====-->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <!--=====popper js=====-->
    <script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <!--=====bootstrap=====-->
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <!--=====Owl carousel=====-->
    <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
    <!--=====header script=====-->
    <script src="{{ asset('assets/js/script.js')}}"></script>

      <!--=====header script=====-->
    <!--===========zoom ============-->
    <script src="{{ asset('assets/js/swiper.min.js')}}"></script>
    <script src="{{ asset('assets/js/easyzoom.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>

</body>

</html>