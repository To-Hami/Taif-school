<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <title>مدرستي</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="{{asset('frontend/img/favicon.ico')}}" rel="icon" />
    <script src="{{ asset('assets/frontend/css/magnific-popup.css') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific--popup.css') }}">
    <script src="{{ asset('assets/frontend/js/jquery-ui.js') }}"></script>


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
{{--    <link--}}
{{--        href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap"--}}
{{--        rel="stylesheet"--}}
{{--    />--}}

    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        rel="stylesheet"
    />
{{-- ar   css  file --}}

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome-rtl.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap-rtl.min.css') }}">
    <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: 'Cairo', sans-serif !important ;
        }
        .side_links{
            font-size: 19px;
        }.side_links .icon{
             margin: 0px 3px 0px 15px;
         }
    </style>

{{--    ar end css --}}


    <!-- Flaticon Font -->
    <link href="{{asset('assets/frontend/lib/flaticon/font/flaticon.css')}}" rel="stylesheet" />
    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/plugins/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/frontend/css/font-awesome-rtl.min.css')}}" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet" />
</head>
<body>
@yield('content')



<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/frontend/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}"></script>
<script src="{{asset('assets/frontend/lib/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/frontend/')}}"></script>

<script src="{{asset('assets/frontend/lib/lightbox/js/lightbox.min.js')}}"></script>

<!-- Contact Javascript File -->
<script src="{{asset('assets/frontend/mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{asset('assets/frontend/mail/contact.js')}}"></script>
<script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('assets/frontend/js/main.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.magnific-popup.min.js')}}"></script>
@stack('scripts');
</body>
</html>
