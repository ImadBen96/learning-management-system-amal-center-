<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_rtl/images/favicon/favicon.ico') }}">


    <!-- Libs CSS -->

    <link href="{{ asset('assets_rtl/fonts/feather/feather.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_rtl/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_rtl/libs/dragula/dist/dragula.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_rtl/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_rtl/libs/prismjs/themes/prism.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_rtl/libs/dropzone/dist/dropzone.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_rtl/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_rtl/libs/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_rtl/libs/@yaireo/tagify/dist/tagify.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_rtl/libs/tippy.js/dist/tippy.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_rtl/libs/owl.carousel/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_rtl/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_rtl/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/scroll.css') }}" rel="stylesheet">
    <link href="https://vjs.zencdn.net/7.14.3/video-js.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://vjs.zencdn.net/7.14.3/video.min.js"></script>
    <link href="https://unpkg.com/cloudinary-video-player@1.5.9/dist/cld-video-player.min.css" rel="stylesheet">
    <script src="https://unpkg.com/cloudinary-core@latest/cloudinary-core-shrinkwrap.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/cloudinary-video-player@1.5.9/dist/cld-video-player.min.js" type="text/javascript"></script>
    <link href="{{ asset('js/bootstrap.js') }}" rel="stylesheet">
    <script src="{{ asset('js/podcast.js')  }}" rel="script"></script>
    <script type="module" src="{{ asset('js/script.js') }}" defer></script>









    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets_rtl/css/theme.min.css') }}">
    <title>@yield('title')</title>
    <style>
        @font-face {
            font-family: gotham-rounded;
            font-weight: 700;
            src: url("{{ asset('assets/Hacen-Casablanca.ttf') }}") format('woff');
        }
        .arab , span , a {
            font-family: gotham-rounded;
        }
        ::placeholder {
            font-family: gotham-rounded !important;
            opacity: 1 !important;
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
            font-family: gotham-rounded !important;
        }

        ::-ms-input-placeholder { /* Microsoft Edge */
            font-family: gotham-rounded !important;
        }
        .navbar-header{
            letter-spacing: 0 !important;
        }
        .nav-link {
            font-size: 17px !important;
        }
        .menu_link:hover{
            background-color: #e3dcff;
            color: #754ffe;
        }
        .menu_link{
            font-size: 22px !important;
        }
        .navbar .dropdown-menu{
            top: 49px !important;

        }
    </style>
</head>

<body>

<!-- Page Content -->
@include('student.includes.navbar')

@yield('content')

<!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="row align-items-center g-0 border-top py-2">
            <!-- Desc -->
            <div class="col-md-12 col-12 text-center">
                <span>© 2022 Amal Tadrib. All Rights Reserved</span>
            </div>
            <!-- Links -->

        </div>
    </div>
</div>
<!-- Scripts -->
<!-- Libs JS -->
<script src="{{ asset('assets_rtl/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/odometer/odometer.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/quill/dist/quill.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/dragula/dist/dragula.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/bs-stepper/dist/js/bs-stepper.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/jQuery.print/jQuery.print.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/prismjs/components/prism-scss.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/@yaireo/tagify/dist/tagify.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/@popperjs/core/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/tippy.js/dist/tippy-bundle.umd.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/typed.js/lib/typed.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/jsvectormap/dist/js/jsvectormap.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/jsvectormap/dist/maps/world.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets_rtl/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<!-- clipboard -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>
<!-- Theme JS -->

<script src="{{ asset('assets_rtl/js/theme.min.js') }}"></script>
@yield('script')

</body>

</html>
