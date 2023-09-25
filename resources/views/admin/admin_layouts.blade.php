<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}">


    <!-- Libs CSS -->

    <link href="{{ asset('assets/fonts/feather/feather.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/dragula/dist/dragula.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/prismjs/themes/prism.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/dropzone/dist/dropzone.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/@yaireo/tagify/dist/tagify.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/tiny-slider/dist/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/tippy.js/dist/tippy.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link
        href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet"
    />
    <link
        href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css"
        rel="stylesheet"
    />
    <link href="https://unpkg.com/cloudinary-video-player@1.5.9/dist/cld-video-player.min.css" rel="stylesheet">
    <script src="https://unpkg.com/cloudinary-core@latest/cloudinary-core-shrinkwrap.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/cloudinary-video-player@1.5.9/dist/cld-video-player.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('js/jsPDF-1.3.2/dist/jspdf.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}" ></script>


    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css')  }}">
    <!-- start with crop image -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>

    <title>@yield('title')</title>

    <style>
        @font-face {
            font-family: gotham-rounded;
            font-weight: 700;
            src: url("{{ asset('assets/Hacen-Casablanca.ttf') }}") format('woff');
        }
        .arab{
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
        .delete_item{
            position: relative;
            top: -99px;
            right: -41px;
            background: #18113c;
            border-radius: 4px;
            padding: 10px;
        }
        .Delete_Mat{
            position: relative;
            top: -317px;
            right: -6px;
            background: #18113c;
            border-radius: 4px;
            padding: 10px;
        }
        .delete_item_pod{
            position: relative;
            top: -99px;
            right: -41px;
            background: #18113c;
            border-radius: 4px;
            padding: 10px;
        }
        .icon_item{
            font-size: 21px;
            color: #FFF;
        }
        .icon_item_podcats{
            font-size: 21px;
            color: #FFF;
        }
        .add_videos{
            width: 105% !important;
        }
        .add_pod_cast{
          width: 105% !important;
        }
        body::-webkit-scrollbar {
            width: 9px;
        }

        body::-webkit-scrollbar-track {
            background-color: #e4e4e4;
            border-radius: 100px;
        }

        body::-webkit-scrollbar-thumb {
            border-radius: 100px;
            background-image: linear-gradient(90deg, rgba(24,20,60,1) 0%, rgba(65,65,207,1) 35%, rgba(255,170,70,1) 100%);
            box-shadow: inset 2px 2px 5px 0 rgba(17, 42, 76, 0.5);
        }


        @media screen and (max-width: 480px) {
            .add_videos {
                width: 105% !important;
            }
            .add_pod_cast{
                width: 105% !important;
            }
            .delete_item{
                position: relative;
                top: -99px;
                right: -14px;
                background: #18113c;
                border-radius: 4px;
                padding: 10px;
            }
            .Delete_Mat{
                position: relative;
                top: -99px;
                right: -14px;
                background: #18113c;
                border-radius: 4px;
                padding: 10px;
            }
            .delete_item_pod{
                position: relative;
                top: -99px;
                right: -14px;
                background: #18113c;
                border-radius: 4px;
                padding: 10px;
            }
        }
        .active .bs-stepper-circle{
            background-color: #ffd767 !important;
        }

        /* all about the upload files */
        .wrapper{
            position: relative;
            height: 300px;
            width: 100%;
            border-radius: 10px;
            background: #fff;
            border: 2px dashed #c2cdda;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .wrapper.active{
            border: none;
        }
        .wrapper .image{
            position: absolute;
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .wrapper img{
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
        .wrapper .icon{
            font-size: 100px;
            color: #9658fe;
        }
        .wrapper .text{
            font-size: 20px;
            font-weight: 500;
            color: #5B5B7B;
        }
        .wrapper #cancel-btn i{
            position: absolute;
            font-size: 20px;
            right: 15px;
            top: 15px;
            color: #9658fe;
            cursor: pointer;
            display: none;
        }
        .wrapper.active:hover #cancel-btn i{
            display: block;
        }
        .wrapper #cancel-btn i:hover{
            color: #e74c3c;
        }
        .wrapper .file-name{
            position: absolute;
            bottom: 0px;
            width: 100%;
            padding: 8px 0;
            font-size: 18px;
            color: #fff;
            display: none;
            background: linear-gradient(135deg,#3a8ffe 0%,#9658fe 100%);
        }
        .wrapper.active:hover .file-name{
            display: block;
        }
        #custom-btn{
            margin-top: 30px;

        }
        .custom-file-container__image-preview{
            background-image: url({{ asset('assests/images/image_cource.png') }});
        }
        /*card for statistcs*/
        .mycard.bg1 {
            background-image: -webkit-gradient(linear, left top, right top, from(#f85108), to(#f4ad3c));
            background-image: -webkit-linear-gradient(left, #f85108, #f4ad3c);
            background-image: -o-linear-gradient(left, #f85108, #f4ad3c);
            background-image: linear-gradient(to right, #f85108, #f4ad3c);
        }
        .mycard {
            border-radius: 3px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.30)!important;
            padding: 25px 40px 30px;
            margin-bottom: 30px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            -webkit-transition: all 0.3s ease-in;
            -o-transition: all 0.3s ease-in;
            transition: all 0.3s ease-in;
        }
        .mycard .left {
            position: inherit;
            z-index: 9;
        }
        .mycard .right .icon {
            font-size: 50px;
            color: #fff;
            position: inherit;
            z-index: 9;
        }
        [class*=" icofont-"], [class^=icofont-] {
            font-family: IcoFont!important;
            speak: none;
            font-style: normal;
            font-weight: 400;
            font-variant: normal;
            text-transform: none;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            line-height: 1;
            -webkit-font-feature-settings: "liga";
            -webkit-font-smoothing: antialiased;
        }
        .mycard.bg1::after {
            background: #f85108;
        }
        .mycard::after {
            position: absolute;
            content: " ";
            width: 268px;
            height: 500px;
            top: -100px;
            right: -50px;
            -webkit-transform: rotate(
                28deg
            );
            -ms-transform: rotate(28deg);
            transform: rotate(
                28deg
            );
        }
        .mycard .left .title {
            font-size: 22px;
            color: #fff;
            line-height: 32px;
            margin-bottom: 2px;
            font-family: "Open Sans", sans-serif;
        }
        .mycard .left .number {
            font-size: 42px;
            line-height: 52px;
            font-weight: 600;
            display: block;
            color: #fff;
            margin-bottom: 20px;
            font-family: "Open Sans", sans-serif;
        }
        .mycard .left .link {
            width: 80px;
            height: 30px;
            background: #fff;
            border-radius: 50px;
            line-height: 30px;
            font-size: 14px;
            display: block;
            text-align: center;
            -webkit-transition: all 0.3s ease-in;
            -o-transition: all 0.3s ease-in;
            transition: all 0.3s ease-in;
        }
        /*card two*/
        .mycard.bg2 {
            background-image: -webkit-gradient(linear, left top, right top, from(#047edf), to(#0bb9fa));
            background-image: -webkit-linear-gradient(left, #047edf, #0bb9fa);
            background-image: -o-linear-gradient(left, #047edf, #0bb9fa);
            background-image: linear-gradient(to right, #047edf, #0bb9fa);
        }
         .mycard.bg2::after {
            background: #047edf;
        }
        /*card for*/
         .mycard.bg3 {
            background-image: -webkit-gradient(linear, left top, right top, from(#0fa49b), to(#03dbce));
            background-image: -webkit-linear-gradient(left, #0fa49b, #03dbce);
            background-image: -o-linear-gradient(left, #0fa49b, #03dbce);
            background-image: linear-gradient(to right, #0fa49b, #03dbce);
        }
         .mycard.bg3::after {
            background: #0fa49b;
        }
         /*start with crop image*/
        img {
            display: block;
            max-width: 100%;
        }
        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }
        .modal-lg{
            max-width: 1000px !important;
        }
        h6.error_message{
            display: none;
        }
        .get_success_message{
            display: none;
        }
        .page-item {
            margin-right: 10px !important;
        }
    </style>
</head>

<body>
<!-- Wrapper -->
@yield('content')
<!-- Script -->
<!-- Libs JS -->
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/odometer/odometer.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/quill/dist/quill.min.js') }}"></script>
<script src="{{ asset('assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js') }}"></script>
<script src="{{ asset('assets/libs/dragula/dist/dragula.min.js') }}"></script>
<script src="{{ asset('assets/libs/bs-stepper/dist/js/bs-stepper.min.js') }}"></script>
<script src="{{ asset('assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/libs/jQuery.print/jQuery.print.js') }}"></script>
<script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('assets/libs/prismjs/components/prism-scss.min.js') }}"></script>
<script src="{{ asset('assets/libs/@yaireo/tagify/dist/tagify.min.js') }}"></script>
<script src="{{ asset('assets/libs/tiny-slider/dist/min/tiny-slider.js') }}"></script>
<script src="{{ asset('assets/libs/@popperjs/core/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets/libs/tippy.js/dist/tippy-bundle.umd.min.js') }}"></script>
<script src="{{ asset('assets/libs/typed.js/lib/typed.min.js') }}"></script>
<script src="{{ asset('assets/libs/jsvectormap/dist/js/jsvectormap.min.js') }}"></script>
<script src="{{ asset('assets/libs/jsvectormap/dist/maps/world.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=Promise"></script>

<!-- Latest version of Preview SDK for your locale -->
<script src="https://cdn01.boxcdn.net/platform/preview/2.80.0/en-US/preview.js"></script>
<link
    rel="stylesheet"
    href="https://cdn01.boxcdn.net/platform/preview/2.80.0/en-US/preview.css"
/>

<!-- clipboard -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


<!-- Theme JS -->
<script src="{{ asset('assets/js/theme.min.js') }}"></script>
<script src="{{ asset('js/podcast.js') }}" defer></script>
<script type="module" src="{{ asset('js/script.js') }}" defer></script>
<!-- start with crop image -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<link href="https://unpkg.com/cloudinary-video-player@1.5.9/dist/cld-video-player.min.css" rel="stylesheet">
<script src="https://unpkg.com/cloudinary-core@latest/cloudinary-core-shrinkwrap.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/cloudinary-video-player@1.5.9/dist/cld-video-player.min.js" type="text/javascript"></script>
@yield('script')
@yield('credits')

</body>

</html>
