<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixner.net/sbidu/main/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Nov 2022 16:32:58 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
      @yield('title')
    </title>

    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/all.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/animate.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/nice-select.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/owl.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/main.css">

    <link rel="shortcut icon" href="{{asset('frontend')}}/assets/images/favicon.png" type="image/x-icon">
</head>


<body>
    <!--============= ScrollToTop Section Starts Here =============-->
    <div class="overlayer" id="overlayer">
        <div class="loader">
            <div class="loader-inner"></div>
        </div>
    </div>
    <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
    <div class="overlay"></div>
    <!--============= ScrollToTop Section Ends Here =============-->


    @include('frontend.layouts.nav')
    

    @yield('content')

   
    @include('frontend.layouts.footer')




    <script src="{{asset('frontend')}}/assets/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/modernizr-3.6.0.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/plugins.js"></script>
    <script src="{{asset('frontend')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/isotope.pkgd.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/wow.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/waypoints.js"></script>
    <script src="{{asset('frontend')}}/assets/js/nice-select.js"></script>
    <script src="{{asset('frontend')}}/assets/js/counterup.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/owl.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/magnific-popup.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/yscountdown.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/jquery-ui.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/main.js"></script>
</body>


<!-- Mirrored from pixner.net/sbidu/main/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Nov 2022 16:33:09 GMT -->
</html>

   
