<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('adminFrontend/images/favicon.png')}}">
    <!-- Page Title  -->
    <title>DashLite Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('adminFrontend/assets/css/dashlite.css?ver=3.1.1')}}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('adminFrontend/assets/css/theme.css?ver=3.1.1')}}">
</head>




@include('admin.adminNavbar')


@yield('adminDashboard')
@yield('adminLogo')
@yield('adminSlider')
@yield('adminNavbar')
@yield('adminSmedia')
@yield('adminProduct')
@yield('adminOrder')




@include('admin.adminFooter')


    <!-- JavaScript -->
    <script src="{{ asset('adminFrontend/assets/js/bundle.js?ver=3.1.1')}}"></script>
    <script src="{{ asset('adminFrontend/assets/js/scripts.js?ver=3.1.1')}}"></script>
    <!----Jquery----->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!--=====popper js=====-->
    <script src="assets/js/popper.min.js"></script>
    <!--=====bootstrap=====-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--=====Owl carousel=====-->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!--=====header script=====-->
    <script src="assets/js/script.js"></script>
    <!--=====header script=====-->
    <script src="assets/js/main.js"></script>


</html>