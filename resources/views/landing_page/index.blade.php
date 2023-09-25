
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}">


    <!-- Libs CSS -->

    <link href="{{asset('assets_landing/fonts/feather/feather.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets_landing/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_landing/libs/dragula/dist/dragula.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_landing/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_landing/libs/prismjs/themes/prism.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_landing/libs/dropzone/dist/dropzone.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_landing/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_landing/libs/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_landing/libs/@yaireo/tagify/dist/tagify.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_landing/libs/tippy.js/dist/tippy.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_landing/libs/owl.carousel/dist/assets_landing/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_landing/libs/owl.carousel/dist/assets_landing/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_landing/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">








    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets_landing/css/theme.min.css') }}">

    <title> منصة أمال تدريب </title>
    <style>
        @font-face {
            font-family: gotham-rounded;
            font-weight: 700;
            src: url("assets_landing/fonts/feather/fonts/ArbFONTS-Hacen-Casablanca-Hd.ttf") format('woff');
        }
        .arab{
            font-family: gotham-rounded;
        }
        .lien{
            font-size: 17px !important;
            font-weight: bold !important;;
        }
        .back{
            background-color: rgba(255, 255, 255, 0.8);
        }
        @media (min-width: 992px){
            .form_cc_four .item_upload {
                display: flex;
            }
        }
        /*.back a{*/
        /*  color: #FFF !important;*/
        /*}*/
        @media (max-width: 768px){
            .navbar-transparent {
                position: relative !important;
            }

        }
        @media (min-width: 768px){
            .upload__file{
                text-align: initial;
                width: 33%;
            }
        }
        body {
            background: #222;
        }

        .video-play-button {
            position: absolute;
            z-index: 10;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            box-sizing: content-box;
            display: block;
            width: 32px;
            height: 44px;
            /* background: #fa183d; */
            border-radius: 50%;
            padding: 18px 20px 18px 28px;
        }

        .video-play-button:before {
            content: "";
            position: absolute;
            z-index: 0;
            left: 50%;
            top: 50%;
            transform: translateX(-50%) translateY(-50%);
            display: block;
            width: 80px;
            height: 80px;
            background: #ffd767;
            border-radius: 50%;
            -webkit-animation: pulse-border 1500ms ease-out infinite;
            animation: pulse-border 1500ms ease-out infinite;
        }

        .video-play-button:after {
            content: "";
            position: absolute;
            z-index: 1;
            left: 50%;
            top: 50%;
            transform: translateX(-50%) translateY(-50%);
            display: block;
            width: 80px;
            height: 80px;
            background: #ffd767;
            border-radius: 50%;
            transition: all 200ms;
        }

        .video-play-button:hover:after {
            background-color: #222;
        }

        .video-play-button img {
            position: relative;
            z-index: 3;
            max-width: 100%;
            width: auto;
            height: auto;
        }

        .video-play-button span {
            display: block;
            position: relative;
            z-index: 3;
            width: 0;
            height: 0;
            border-left: 32px solid #fff;
            border-top: 22px solid transparent;
            border-bottom: 22px solid transparent;
        }

        @-webkit-keyframes pulse-border {
            0% {
                transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
                opacity: 1;
            }
            100% {
                transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);
                opacity: 0;
            }
        }

        @keyframes pulse-border {
            0% {
                transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
                opacity: 1;
            }
            100% {
                transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);
                opacity: 0;
            }
        }
        .video-overlay {
            position: fixed;
            z-index: -1;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.8);
            opacity: 0;
            transition: all ease 500ms;
        }

        .video-overlay.open {
            position: fixed;
            z-index: 1000;
            opacity: 1;
            display: flex;
            justify-content: center;
        }

        .video-overlay-close {
            position: absolute;
            z-index: 1000;
            top: 15px;
            right: 20px;
            font-size: 36px;
            line-height: 1;
            font-weight: 400;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            transition: all 200ms;
        }

        .video-overlay-close:hover {
            color: #fa183d;
        }

        .video-overlay video {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            /*width: 90%;*/
            /* height: auto; */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.75);
        }
        @media (max-width: 768px){
            .video-overlay video {

                width: 100%;

            }
        }


    </style>
</head>

<body class="bg-white">



<!-- Navbar -->
<!-- navbar login -->
<nav id="myNavbar" class="navbar navbar-expand-lg navbar-transparent navbar-default shadow-none position-fixed">
    <div class="container px-0">
        <a class="navbar-brand" href="#"
        ><img width="183px" src="{{ asset('assets_landing/images/logo.svg') }}" alt=""
            /></a>

        <!-- Button -->
        <button
            class="navbar-toggler collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbar-default"
            aria-controls="navbar-default"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="icon-bar top-bar mt-0"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default">
            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <a
                        class="nav-link arab lien"
                        href="#principale"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        الرئيسية
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link arab lien"
                        href="#about"

                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        حول المنصة
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link arab lien"
                        href="#comment"

                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        كيفية استعمال المنصة
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link arab lien"
                        href="#features"

                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        الميزات
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link arab lien"
                        href="#faq"

                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        فريقنا
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link arab lien"
                        href="#contact"

                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        اتصل بنا
                    </a>

                </li>


            </ul>

            <div class="ms-auto mt-3 mt-lg-0">

                <a href="{{ route('student.login') }}" class="btn btn-outline-dark arab lien">تسجيل الدخول</a>
            </div>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div  class="py-lg-14 py-10 position-relative bg-cover" id="principale"
      style="background-image:
      url("{{ asset('assets_landing/images/background/gradient-bg.png') }}");">
    <!-- Image -->
    <div class="container">
        <div class="row align-items-center mb-6">
            <div class="col-12 col-lg-7 order-md-2">
                <div class="mb-2 mb-md-0">
                    <img src="{{ asset('assets/amal3.png') }}" alt=""
                         class="img-fluid mw-md-130">
                </div>
            </div>
            <div class="col-12 col-lg-5 order-md-1">
                <!-- Heading -->
                <h1 class="display-2 mb-5 fw-bold arab">
                    امال تدريب
                </h1>
                <!-- list -->
                <ul class="list-unstyled fs-3 text-dark
               mb-6 fw-medium">
                    <li class="mb-1 d-flex arab"><i class="mdi mdi-check-circle text-success
                  me-2"></i>جمعية غير ربحية مكرسة لتمكين النساء في وصعية خاصة</li>
                    <li class="mb-1 d-flex arab"><i class="mdi mdi-check-circle text-success
                  me-2"></i>نقوم بالعديد من الأنشطة لدعم برنامجنا التدريبي</li>
                    <li class="mb-1 d-flex arab"><i class="mdi mdi-check-circle text-success
                  me-2"></i>تمكين المرأة من خلال مهارات الطهي</li>
                </ul>
                <!-- Buttons -->


            </div>
        </div>
        <!-- Hero Section -->
        <!-- row -->

    </div>
</div>

<!-- image section -->
<div style="margin-top: 293px;" id="about" class="pb-lg-16 pb-8">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-12">
                <!-- image -->
                <div style="position: relative" class="mb-4 mb-lg-0">
                    <img src="{{ asset('assets/studentLayout.png') }}" alt="..."
                         class="img-fluid w-100">
                    <a id="play-video-first" class="video-play-button" href="#">
                        <span></span>
                    </a>


                    <div id="video-overlay-first" class="video-overlay">
                        <a class="video-overlay-close">&times;</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 mt-4 mt-lg-0">
                <!-- content -->
                <div class="ps-lg-7">
              <span class="text-primary ls-md text-uppercase
                fw-semi-bold arab">امال تدريب</span>
                    <h2 class="display-4 mt-4 mb-3 fw-bold arab">حول المنصة 👋</h2>
                    <p class="arab">مرحبًا بكم في مركز أمل ، وهو منظمة غير ربحية مكرسة لتمكين النساء في وضعية خاصة من خلال التدريب في المطاعم والتوظيف.

                        الهدف النهائي لـ Amal هو التحول الشخصي وتطوير المهارات المهنية والحياتية للمتدربين لدينا لتحقيق الاستقرار الاقتصادي والاجتماعي في نهاية المطاف.

                        يقدم برنامجنا للمتدربين منصة حيث يمكنهم تعزيز قدراتهم وتعلم مهارات جديدة. المتدربين لدينا لديهم خمس صفات:</p>
                    <div class="mt-5 row">
                        <!-- list -->
                        <div class="col">
                            <ul class="list-unstyled fs-4
                    fw-medium">
                                <li class="mb-2 d-flex arab"><i class="mdi mdi-check-circle
                        text-success me-2"></i>تتراوح أعمارهم بين 18 و 35 سنة </li>
                                <li class="mb-2 d-flex arab"><i class="mdi mdi-check-circle
                        text-success me-2"></i>ليس لديهم دخل أو دخل منخفض للغاية</li>
                                <li class="mb-2 d-flex arab"><i class="mdi mdi-check-circle
                        text-success me-2"></i>لديهم الدافع للتعلم والعمل</li>
                            </ul>
                        </div>
                        <div class="col">
                            <!-- list -->
                            <ul class="list-unstyled fs-4
                    fw-medium">
                                <li class="mb-2 d-flex arab"><i class="mdi mdi-check-circle
                        text-success me-2"></i>كنت في وضع اجتماعي صعب ، مثل المطلقة </li>
                                <li class="mb-2 d-flex arab"><i class="mdi mdi-check-circle
                        text-success me-2"></i>مستعدون للاستفادة من الأدوات المتاحة في أمل لتحسين مهاراتهم.</li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- divider -->
        <hr class="my-lg-12 my-8">

    </div>
</div>
<div class="pb-lg-16 pb-8" id="comment">
    <div class="container">
        <div class="row align-items-center">
            <!-- col -->
            <div class="col-lg-6 col-md-12 col-12">
                <!-- content -->
                <div class="pe-lg-6 ps-lg-6">
             <span class="text-primary ls-md text-uppercase
               fw-semi-bold">أمال تدريب
             </span>
                    <h2 class="display-4 mt-4 mb-3 fw-bold arab">كيفية استعمال المنصة 👋</h2>
                     <p class="arab">
                         تحتوي المنصة على بوابتين للدخول . اﻷولى خاصة بالفريق التعليمي لمؤسسة أمال تدريب و الثاني خاص بالمتدربات . الفيديوا جانبه هو فيديوا توضيحي عن المنصة .
                     </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <!-- image -->
                <div style="position:relative;" class="mt-4 mt-lg-0">
                    <img src="{{ asset('assets/adminLayout.png') }}" alt="..."
                         class="img-fluid w-100">
                    <a id="play-video" class="video-play-button" href="#">
                        <span></span>
                    </a>


                    <div id="video-overlay" class="video-overlay">
                        <a class="video-overlay-close">&times;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- app intigration -->
<div  class="py-lg-14 py-8 bg-dark" id="features">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 col-12">
                <!-- heading -->
                <div class="text-center mb-8">
              <span class="text-warning ls-md text-uppercase
                fw-semi-bold arab">امال تدريب
              </span>
                    <h2 class="display-3 mt-4 mb-3 text-white fw-bold arab">الميزات</h2>
                    <!--              <p class="lead text-white-50 px-8">Build on your workflow with-->
                    <!--                apps that-->
                    <!--                integrate with Geeks UI.</p>-->
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-2 col-md-4 col-6 mb-3 mb-xl-0">
                <!-- card card-borderd  -->
                <div class="card card-bordered border-gray-800 bg-transparent h-100">
                    <!-- card body  -->
                    <div class="card-body">
                        <img src="{{ asset('assets/icons8-monitor-64.png') }}" width="64px" alt=""
                             class="icon-lg mb-3">
                        <h3 class="text-white">سهلة الولوج </h3>
                        <p class="mb-0 text-white-50"> تعتبر منصة أمل تدريب منصة سهلة الولوج و إستعمال </p>
                    </div>

                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6 mb-3 mb-xl-0">
                <!-- card card-borderd  -->
                <div class="card card-bordered border-gray-800 bg-transparent
              h-100">
                    <!-- card body  -->
                    <div class="card-body">
                        <img src="{{ asset('assets/key.png') }}" alt=""
                             class="icon-lg mb-3">
                        <h3 class="text-white">مؤمنة</h3>
                        <p class="mb-0 text-white-50">تعتمد المنصة المعايير حديثة في مجال أمن مواقع  </p>
                    </div>

                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6 mb-3 mb-xl-0">
                <!-- card card-borderd  -->
                <div class="card card-bordered border-gray-800 bg-transparent
              h-100">
                    <!-- card body  -->
                    <div class="card-body">
                        <img src="{{ asset('assets/cloud-network.png') }}" alt=""
                             class="icon-lg mb-3">
                        <h3 class="text-white">تخزين سحابي</h3>
                        <p class="mb-0 text-white-50"> كل معلومات موجودة على خوادم سحابية ﻷمل تدريب</p>
                    </div>

                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6 mb-3 mb-xl-0">
                <!-- card card-borderd  -->
                <div class="card card-bordered border-gray-800 bg-transparent
              h-100">
                    <!-- card body  -->
                    <div class="card-body">
                        <img src="{{ asset('assets/service.png') }}" alt=""
                             class="icon-lg mb-3">
                        <h3 class="text-white">فريق تواصل </h3>
                        <p class="mb-0 text-white-50">تحتوي منصة على فريق تواصلي يجيب على جميع تساؤلات</p>
                    </div>

                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6 mb-3 mb-xl-0">
                <!-- card card-borderd  -->
                <div class="card card-bordered border-gray-800 bg-transparent
              h-100">
                    <!-- card body  -->
                    <div class="card-body">
                        <img src="{{ asset('assets/online-course.png') }}" alt=""
                             class="icon-lg mb-3">
                        <h3 class="text-white">محتوى</h3>
                        <p class="mb-0 text-white-50"> تحتوي منصة على جميع دروس نظرية و إختبارات التي تساعد المستفيدين اثناء تدريبهم</p>
                    </div>

                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6 mb-3 mb-xl-0">
                <!-- card card-borderd  -->
                <div class="card card-bordered border-gray-800 bg-transparent
              h-100">
                    <!-- card body  -->
                    <div class="card-body">
                        <img src="{{ asset('assets/web-analytics.png') }}" alt=""
                             class="icon-lg mb-3">
                        <h3 class="text-white">مراقبة</h3>
                        <p class="mb-0 text-white-50">تحتوي منصة على نظام لمراقبة تطور الطلبة و تعيين جميع تداريب و فرص عمل متاحة
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <!-- button  -->
            <!--          <div class="col-12 text-center mt-8">-->
            <!--            <a href="#" class="btn btn-primary">View All Apps</a>-->
            <!--          </div>-->
        </div>
    </div>
</div>
<!-- testimonials  -->
<div id="faq" class="pb-lg-14 pb-8">
    <div class="container">

        <!-- divider  -->
        <hr class="my-lg-12 my-8">
        <div class="row">
            <div class="offset-xl-2 col-xl-8 offset-lg-1 col-lg-10 col-md-12 col-12">
                <!-- pricing -->
                <h2 class="display-4 mb-3 fw-bold text-center arab">فريقنا</h2>
                <p class="arab text-center">
                    فريق <span style="color: #ffd767;font-weight: bold;font-size: 16px;">امال تدريب</span> والمساعدة في تشكيل مستقبل الطهي.
                </p>


            </div>
            <div class="bg-white">
                <div class="row">
                    <div class="col-md-3 col-3">
                        <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                            <!-- avatar -->
                            <img src="{{ asset('assets_landing/images/chefs/Fatiha_Goumih.jpg') }}" alt="" class="imgtooltip img-fluid rounded-circle" data-template="one">
                            <!-- text -->
                            <div id="one" class="d-none">
                                <h4 class="mb-0 font-weight-bold">
                                    <p class="arab">الاسم الكامل: GOUMIH Fatiha</p>
                                    <p class="arab">المهنة: Chef de cuisine internationale</p>
                                </h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-3">
                        <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                            <!-- avatar -->
                            <img src="{{ asset('assets_landing/images/chefs/Fatima.jpg') }}" alt="" class="imgtooltip img-fluid rounded-circle" data-template="two">
                            <!-- text -->
                            <div id="two" class="d-none">
                                <h4 class="mb-0 font-weight-bold">
                                    <p class="arab">الاسم الكامل: Fatima Afilal</p>
                                    <p class="arab">المهنة: Chef Boulangerie</p>
                                </h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-3">
                        <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                            <!-- avatar -->
                            <img src="{{ asset('assets_landing/images/chefs/Haddad.jpg') }}" alt="" class="imgtooltip img-fluid rounded-circle" data-template="three">
                            <!-- text -->
                            <div id="three" class="d-none">
                                <h4 class="mb-0 font-weight-bold">
                                    <p class="arab">الاسم الكامل: Fatiha Haddad</p>
                                    <p class="arab">المهنة: Chef Cuisine Marocaine</p>
                                </h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-3">
                        <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                            <!-- avatar -->
                            <img src="{{ asset('assets_landing/images/chefs/Hasna.jpg') }}" alt="" class="imgtooltip img-fluid rounded-circle" data-template="four">
                            <!-- text -->
                            <div id="four" class="d-none">
                                <h4 class="mb-0 font-weight-bold">
                                    <p class="arab">الاسم الكامل: ELHAJJAM Hasna</p>
                                    <p class="arab">المهنة: Chef de stock</p>
                                </h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-3">
                        <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                            <!-- avatar -->
                            <img src="{{ asset('assets_landing/images/chefs/Houda.jpg') }}" alt="" class="imgtooltip img-fluid rounded-circle" data-template="five">
                            <!-- text -->
                            <div id="five" class="d-none">
                                <h4 class="mb-0 font-weight-bold">
                                    <p class="arab">الاسم الكامل: ISMAILI Houda</p>
                                    <p class="arab">المهنة: Chef de service</p>
                                </h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-3">
                        <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                            <!-- avatar -->
                            <img src="{{ asset('assets_landing/images/chefs/Ibtissam.jpg') }}" alt="" class="imgtooltip img-fluid rounded-circle" data-template="six">
                            <!-- text -->
                            <div id="six" class="d-none">
                                <h4 class="mb-0 font-weight-bold">
                                    <p class="arab">الاسم الكامل: BOURGUIAA Ibtissam</p>
                                    <p class="arab">المهنة: Chef Garde Manger</p>
                                </h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-3">
                        <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                            <!-- avatar -->
                            <img src="{{ asset('assets_landing/images/chefs/Jamila.jpg') }}" alt="" class="imgtooltip img-fluid rounded-circle" data-template="seven">
                            <!-- text -->
                            <div id="seven" class="d-none">
                                <h4 class="mb-0 font-weight-bold">
                                    <p class="arab">الاسم الكامل: AAMER Jamila</p>
                                    <p class="arab">المهنة: Chef Cuisine Marocaine</p>
                                </h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-3">
                        <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                            <!-- avatar -->
                            <img src="{{  asset('assets_landing/images/chefs/Karima.jpg') }}" alt="" class="imgtooltip img-fluid rounded-circle" data-template="eight">
                            <!-- text -->
                            <div id="eight" class="d-none">
                                <h4 class="mb-0 font-weight-bold">
                                    <p class="arab">الاسم الكامل: Karima Sabila</p>
                                    <p class="arab">المهنة: Chef de Cuisine</p>

                                </h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-3">
                        <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                            <!-- avatar -->
                            <img src="{{ asset('assets_landing/images/chefs/Loubna.jpg') }}" alt="" class="imgtooltip img-fluid rounded-circle" data-template="eleven">
                            <!-- text -->
                            <div id="eleven" class="d-none">
                                <h4 class="mb-0 font-weight-bold">

                                    <p class="arab">الاسم الكامل: Loubna Aafir</p>
                                    <p class="arab">المهنة: Chef Pâtisserie Internationale</p>

                                </h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-3">
                        <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                            <!-- avatar -->
                            <img src="{{ asset('assets_landing/images/chefs/Meriem.jpg') }}" alt="" class="imgtooltip img-fluid rounded-circle" data-template="twelve">
                            <!-- text -->
                            <div id="twelve" class="d-none">
                                <h4 class="mb-0 font-weight-bold">

                                    <p class="arab">الاسم الكامل: SEDEKKI Meriem</p>
                                    <p class="arab">المهنة: Chef de cuisine</p>

                                </h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-3">
                        <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                            <!-- avatar -->
                            <img src="{{ asset('assets_landing/images/chefs/Naima.jpg') }}" alt="" class="imgtooltip img-fluid rounded-circle" data-template="thirteen">
                            <!-- text -->
                            <div id="thirteen" class="d-none">
                                <h4 class="mb-0 font-weight-bold">
                                    <p class="arab">الاسم الكامل: EZZARHOUNY Naima</p>
                                    <p class="arab">المهنة: Chef Pâtisserie Internationale</p>
                                </h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-3">
                        <div class="p-xl-5 p-lg-3 mb-3 mb-lg-0">
                            <!-- avatar -->
                            <img src="{{ asset('assets_landing/images/chefs/Zahra.jpg') }}" alt="" class="imgtooltip img-fluid rounded-circle" data-template="fourteen">
                            <!-- text -->
                            <div id="fourteen" class="d-none">
                                <h4 class="mb-0 font-weight-bold">
                                    <p class="arab">الاسم الكامل: Zahra Kachach</p>
                                    <p class="arab">المهنة: Chef Garde Manger</p>
                                </h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- small cta  -->

    </div>
</div>
<!-- cta with bg color  -->
<div id="contact" class="py-14 bg-dark">
    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8 col-md-12 col-12 text-center">
            <span class="fs-4 text-warning ls-md text-uppercase
              fw-semi-bold arab">امال تدريب

            </span>
                <!-- heading  -->
                <h2 class="display-3 mt-4 mb-3 text-white fw-bold arab">اتصل بنا</h2>
                <!-- para  -->

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div style="background-color: #ffffff;border-radius: 8px;padding: 2.5rem;box-shadow: 0px 50px 70px -10px rgb(11 34 56 / 5%) !important;" class="form_cc_four aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                            <form action="" class="row">
                                <div class="col-lg-6">
                                    <div style="text-align: start;" class="form-group">
                                        <label style="font-size: 14px;font-weight: 400;color: #0b2238;" class="arab">عنوان البريد الإلكتروني</label>
                                        <input type="email" class="form-control arab" placeholder="عنوان البريد الإلكتروني">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div style="text-align: start;" class="form-group">
                                        <label style="font-size: 14px;font-weight: 400;color: #0b2238;" class="arab">الاسم بالكامل</label>
                                        <input type="text" class="form-control arab" placeholder="الاسم بالكامل">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div style="text-align: start;" class="form-group">
                                        <label style="font-size: 14px;font-weight: 400;color: #0b2238;" class="arab">اختر المدينة  <span class="c-gray font-s-13">(اختياري)</span></label>
                                        <select class="form-control custom-select arab" name="country">
                                            <option>الرجاء التحديد</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The
                                            </option>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div style="text-align: start;" class="form-group">
                                        <label style="font-size: 14px;font-weight: 400;color: #0b2238;" class="arab">اختر موضوعا</label>
                                        <select class="form-control custom-select arab">
                                            <option>الرجاء التحديد</option>
                                            <option>Purchase</option>
                                            <option>Support</option>
                                            <option>Technique</option>
                                            <option>Service Request</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div style="text-align: start;" class="form-group">
                                        <label style="font-size: 14px;font-weight: 400;color: #0b2238;" class="arab">رسالة</label>
                                        <textarea class="form-control arab" rows="7" placeholder="اخبرنا المزيد عنك"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 d-md-flex justify-content-between mt-2">
                                    <div class="item_upload mb-3 mb-md-0">
                                        <div class="upload__file">
                                            <input style="opacity: 0" type="file">
                                            <button style="border-radius: 8px;border: 1px dashed #dce0e3;padding: 0.85rem 1.8rem;font-size: 15px;text-align: center;" type="button" class="btn btn_md_primary arab">
                                                <img width="16" src="assets_landing/images/attachment.svg" />
                                                أرفق ملف
                                            </button>
                                        </div>
                                        <span style="font-size: 13px;color: #6c7a87;margin-top: 10%;margin-right: 10px;" class="arab mr-2">الحد الأقصى لحجم الملف الإجمالي: 12 MB</span>
                                    </div>


                                </div>
                                <div>
                                    <a style="width: 50%;" href="#" class="btn btn-outline-dark arab mt-3">
                                        أرسل رسالة
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</body>
<!-- modal -->
<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center d-flex">
                <h4 class="modal-title" id="paymentModalLabel">
                    Add New Payment Method
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div>
                    <!-- Form -->
                    <form class="row mb-4">
                        <div class="mb-3 col-12 col-md-12 mb-4">
                            <h5 class="mb-3">Credit / Debit card</h5>
                            <!-- Radio button -->
                            <div class="d-inline-flex">
                                <div class="form-check me-2">
                                    <input type="radio" id="paymentRadioOne" name="paymentRadioOne" class="form-check-input" />
                                    <label class="form-check-label" for="paymentRadioOne"><img
                                            src="assets_landing/images/creditcard/americanexpress.svg" alt="" /></label>
                                </div>
                                <!-- Radio button -->
                                <div class="form-check me-2">
                                    <input type="radio" id="paymentRadioTwo" name="paymentRadioOne" class="form-check-input" />
                                    <label class="form-check-label" for="paymentRadioTwo"><img
                                            src="assets_landing/images/creditcard/mastercard.svg" alt="" /></label>
                                </div>

                                <!-- Radio button -->
                                <div class="form-check">
                                    <input type="radio" id="paymentRadioFour" name="paymentRadioOne" class="form-check-input" />
                                    <label class="form-check-label" for="paymentRadioFour"><img src="assets_landing/images/creditcard/visa.svg"
                                                                                                alt="" /></label>
                                </div>
                            </div>
                        </div>
                        <!-- Name on card -->
                        <div class="mb-3 col-12 col-md-4">
                            <label for="nameoncard" class="form-label">Name on card</label>
                            <input id="nameoncard" type="text" class="form-control" name="nameoncard" placeholder="Name" required />
                        </div>
                        <!-- Month -->
                        <div class="mb-3 col-12 col-md-4">
                            <label class="form-label">Month</label>
                            <select class="selectpicker" data-width="100%">
                                <option value="">Month</option>
                                <option value="Jan">Jan</option>
                                <option value="Feb">Feb</option>
                                <option value="Mar">Mar</option>
                                <option value="Apr">Apr</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="Aug">Aug</option>
                                <option value="Sep">Sep</option>
                                <option value="Oct">Oct</option>
                                <option value="Nov">Nov</option>
                                <option value="Dec">Dec</option>
                            </select>
                        </div>
                        <!-- Year -->
                        <div class="mb-3 col-12 col-md-4">
                            <label class="form-label">Year</label>
                            <select class="selectpicker" data-width="100%">
                                <option value="">Year</option>
                                <option value="June">2018</option>
                                <option value="July">2019</option>
                                <option value="August">2020</option>
                                <option value="Sep">2021</option>
                                <option value="Oct">2022</option>
                            </select>
                        </div>
                        <!-- Card number -->
                        <div class="mb-3 col-md-8 col-12">
                            <label for="cc-mask" class="form-label">Card Number</label>
                            <input type="text" class="form-control" id="cc-mask" data-inputmask="'mask': '9999 9999 9999 9999'" inputmode="numeric" placeholder="xxxx-xxxx-xxxx-xxxx" required />
                        </div>
                        <!-- CVV -->
                        <div class="mb-3 col-md-4 col-12">
                            <div class="mb-3">
                                <label for="cvv" class="form-label">CVV Code
                                    <i class="fas fa-question-circle ms-1" data-bs-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="A 3 - digit number, typically printed on the back of a card."></i></label>
                                <input type="password" class="form-control" name="cvv" id="cvv" placeholder="xxx" maxlength="3" inputmode="numeric" required />
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="col-md-6 col-12">
                            <button class="btn btn-primary" type="submit">
                                Add New Card
                            </button>
                            <button class="btn btn-outline-white" type="button" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </form>
                    <span><strong>Note:</strong> that you can later remove your card at
							the account setting page.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addSectionModal" tabindex="-1" role="dialog" aria-labelledby="addSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addSectionModalLabel">
                    Add New Section
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <input class="form-control mb-3" type="text" placeholder="Add new section" />
                <button class="btn btn-primary" type="Button">
                    Add New Section
                </button>
                <button class="btn btn-outline-white" data-bs-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addLectureModal" tabindex="-1" role="dialog" aria-labelledby="addLectureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addLectureModalLabel">
                    Add New Lecture
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <input class="form-control mb-3" type="text" placeholder="Add new lecture" />
                <button class="btn btn-primary" type="Button">
                    Add New Lecture
                </button>
                <button class="btn btn-outline-white" data-bs-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="newCatgory" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Create New Category
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3 mb-2">
                        <label class="form-label" for="title">Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Write a Category" id="title" required>
                        <small>Field must contain a unique value</small>
                    </div>
                    <div class="mb-3 mb-2">
                        <label class="form-label">Slug</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="slug">https://example.com</span>
                            </div>
                            <input type="text" class="form-control" id="basic-url" aria-describedby="slug" placeholder="designcourses" required>
                        </div>
                        <small>Field must contain a unique value</small>
                    </div>
                    <div class="mb-3 mb-2">
                        <label class="form-label">Parent</label>
                        <select class="selectpicker" data-width="100%">
                            <option value="">Select</option>
                            <option value="Course">Course</option>
                            <option value="Tutorial">Tutorial</option>
                            <option value="Workshop">Workshop</option>
                            <option value="Company">Company</option>
                        </select>
                    </div>
                    <div class="mb-3 mb-3">
                        <label class="form-label">Description</label>
                        <div id="editor">
                            <br>
                            <h4>One Ring to Rule Them All</h4>
                            <br>
                            <p>
                                Three Rings for the
                                <i> Elven-kingsunder</i> the sky,
                                <br> Seven for the
                                <u>Dwarf-lords</u> in halls of stone, Nine for Mortal Men,
                                <br> doomed to die, One for the Dark Lord on his dark throne.
                                <br> In the Land of Mordor where the Shadows lie.
                                <br>
                                <br>
                            </p>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Enabled</label>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="customSwitch1" checked>
                            <label class="form-check-label" for="customSwitch1"></label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Add New Category</button>
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->


<!-- Course Modal -->
<div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header py-4 align-items-lg-center">
                <div class="d-lg-flex">
                    <div class="mb-3 mb-lg-0">
                        <img src="assets_landing/images/svg/feature-icon-1.svg" alt="" class=" bg-primary icon-shape icon-xxl rounded-circle">
                    </div>
                    <div class="ms-lg-4">
                        <h2 class="fw-bold mb-md-1 mb-3">Introduction to JavaScript <span class="badge bg-warning ms-2">Free</span></h2>
                        <p class="text-uppercase fs-6 fw-semi-bold mb-0"><span class="text-dark">Courses -
                  1</span> <span class="me-3">6 Lessons</span> <span class="me-3">1 Hour 12 Min</span></p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <h3>In this course you’ll learn:</h3>
                <p class="fs-4">Vanilla JS is a fast, lightweight, cross-platform framework for building incredible, powerful JavaScript applications.</p>
                <ul class="list-group list-group-flush">
                    <!-- List group item -->
                    <li class="list-group-item px-0">
                        <a href="#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                            <div class="text-truncate">
                                <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2"><i
                                        class="mdi mdi-play fs-4"></i></span>
                                <span>Introduction</span>
                            </div>
                            <div class="text-truncate">
                                <span>1m 7s</span>
                            </div>
                        </a>
                    </li>
                    <!-- List group item -->
                    <li class="list-group-item px-0">
                        <a href="#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                            <div class="text-truncate">
                                <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2"><i
                                        class="mdi mdi-play fs-4"></i></span>
                                <span>Installing Development Software</span>
                            </div>
                            <div class="text-truncate">
                                <span>3m 11s</span>
                            </div>
                        </a>
                    </li>
                    <!-- List group item -->
                    <li class="list-group-item px-0">
                        <a href="#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                            <div class="text-truncate">
                                <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2"><i
                                        class="mdi mdi-play fs-4"></i></span>
                                <span>Hello World Project from GitHub</span>
                            </div>
                            <div class="text-truncate">
                                <span>2m 33s</span>
                            </div>
                        </a>
                    </li>
                    <!-- List group item -->
                    <li class="list-group-item px-0">
                        <a href="#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                            <div class="text-truncate">
                                <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2"><i
                                        class="mdi mdi-play fs-4"></i></span>
                                <span>Our Sample Javascript Files</span>
                            </div>
                            <div class="text-truncate">
                                <span>22m 30s</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- new chat modal-->


<!-- Modal -->
<div class="modal fade" id="newchatModal" tabindex="-1" role="dialog" aria-labelledby="newchatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
        <div class="modal-content ">
            <div class="modal-header align-items-center">
                <h4 class="mb-0" id="newchatModalLabel">Create New Chat</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body px-0">
                <!-- contact list -->
                <ul class="list-unstyled contacts-list mb-0">
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-away">
                                        <img src="assets_landing/images/avatar/avatar-5.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">Pete Martin</h5>
                                        <p class="mb-0 text-muted">On going description of group...
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">2/10/2021</small>
                            </div>
                        </div>


                    </li>
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-offline">
                                        <img src="assets_landing/images/avatar/avatar-9.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">Olivia Cooper</h5>
                                        <p class="mb-0 text-muted">On going description of group...
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">2/3/2021</small>
                            </div>
                        </div>


                    </li>
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-busy">
                                        <img src="assets_landing/images/avatar/avatar-19.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">Jamarcus Streich</h5>
                                        <p class="mb-0 text-muted">Start design system for UI.
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">1/24/2021</small>
                            </div>
                        </div>


                    </li>
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-busy">
                                        <img src="assets_landing/images/avatar/avatar-12.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">Lauren Wilson</h5>
                                        <p class="mb-0 text-muted">Start design system for UI...
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">3/3/2021</small>
                            </div>
                        </div>


                    </li>
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                        <img src="assets_landing/images/avatar/avatar-14.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">User Name</h5>
                                        <p class="mb-0 text-muted">On going description of group..
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">1/5/2021</small>
                            </div>
                        </div>


                    </li>
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                        <img src="assets_landing/images/avatar/avatar-15.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">Rosalee Roberts</h5>
                                        <p class="mb-0 text-muted">On going description of group..
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">1/14/2021</small>
                            </div>
                        </div>


                    </li>



                </ul>
            </div>

        </div>
    </div>
</div>

<!-- footer -->
<!-- footer -->
<div  class="pt-lg-10 pt-5 footer bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <!-- about company -->
                <div class="mb-4">
                    <img width="223px" src="{{ asset('assets_landing/images/logo.svg') }}" alt="">
                    <div class="mt-4">
                        <p class="arab">
                            تعتبر منصة التعلمية "أمال تدريب" التابعة لجمعية أمال كمنصة تعليمية رقمية تهتم بالتحول الرقمي للمنهج الدراسي في مراكز التدريب تاركة و جليز . تسمح للمتدربة بولوج للمواد دراسية و كذلك تتبع جميع تداريب مهنية و فرص العمل. تحت إشراف الفريق التعليمي لمنصة أمال تدريب.
                        </p>
                        <p style="color: #18113c;" class="arab">
                            Rue Allal Ben Ahmed et Rue Ibn Sina Gueliz, Marrakech, Morocco
                        </p>
                        <strong> Call us</strong>:<span style="color: #ffd767;font-weight: bold;"> +212(0) 5 24 44 68 96</span> <b>/</b> <span style="color: #ffd767;font-weight: bold;">+212(0) 6 04 23 88 60</span>
                        <!-- social media -->

                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="mb-4">
                    <!-- list -->
                    <h3 class="fw-bold mb-3 arab">اجتماعي</h3>
                    <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                        <li><a style="font-size: large;font-weight: bold;" href="#" class="mdi mdi-facebook text-muted me-2"></a><strong class="arab">فيسبوك</strong></li>
                        <li> <a style="font-size: large;font-weight: bold;" href="#" class="mdi mdi-twitter text-muted me-2"></a><strong class="arab">تويتر</strong></li>
                        <li><a style="font-size: large;font-weight: bold;" href="#" class="mdi mdi-instagram text-muted "></a><strong class="arab">استغرام</strong></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="mb-4">
                    <!-- list -->
                    <h3 class="fw-bold mb-3 arab">جمعية</h3>
                    <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                        <li><a href="#" class="nav-link arab">حول</a></li>
                        <li><a href="#" class="nav-link arab">الجمعيات التابعة</a></li>
                        <li><a href="#" class="nav-link arab">الوظائف</a></li>
                        <li><a href="#" class="nav-link arab">الشؤون القانونية والخصوصية للجمعية</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-12">
                <!-- contact info -->
                <div class="mb-4">
                    <h3 class="fw-bold mb-3 arab">الإشتراك</h3>
                    <p class="arab"> اشترك للحصول على آخر أخبار
                        منا</p>
                    <form class="form-row">
                        <div class="col-md-11 form-group subscribebtn">
                            <div style="position:relative;" class="item_input">
                                <input style="text-align: end;" type="email" class="form-control rounded-8 arab" id="exampleInputEmail1" placeholder="أدخل عنوان البريد الالكتروني" aria-describedby="emailHelp">
                                <button type="button" class="btn ripple_circle scale rounded-8 btn_subscribe">
                                    <img style="position: absolute;top: 7px;left: 11px;" width="30" src="assets_landing/images/send.svg" />
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="row align-items-center g-0 border-top py-2 mt-6">
            <!-- Desc -->
            <div class="col-lg-4 col-md-5 col-12">
                <span class="arab"> 2021 Amal Women's Center & Moroccan Restaurant (NGO) © All Right Reserved</span>
            </div>


        </div>
    </div>
</div>


<!-- Scripts -->
<!-- Libs JS -->
<script src="{{ asset('assets_landing/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/odometer/odometer.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/quill/dist/quill.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/dragula/dist/dragula.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/bs-stepper/dist/js/bs-stepper.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/jQuery.print/jQuery.print.js') }}"></script>
<script src="{{ asset('assets_landing/libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('assets_landing/libs/prismjs/components/prism-scss.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/@yaireo/tagify/dist/tagify.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/@popperjs/core/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/tippy.js/dist/tippy-bundle.umd.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/typed.js/lib/typed.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/jsvectormap/dist/js/jsvectormap.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/jsvectormap/dist/maps/world.js') }}"></script>
<script src="{{ asset('assets_landing/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets_landing/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>





<!-- clipboard -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


<!-- Theme JS -->
<script src="{{ asset('assets_landing/js/theme.min.js') }}"></script>
<script>

    $(document).ready(function (){
        $(document).scroll(function (evt) {
            evt.preventDefault()
            console.log(' ************************* ')
            const nav = $('#myNavbar')
            nav.toggleClass('back', $(this).scrollTop() > nav.height());

        })
        $("#navbar-default a").on('click', function (event) {
            console.log('***************')
            $([document.documentElement, document.body]).animate({
                scrollTop: $(this.hash).offset().top
            }, 500)
            console.log('***************')

        });

    });

</script>
<script>
    $('#play-video-first').on('click',function(e){
        e.preventDefault();
        $('#video-overlay-first').addClass('open');
        $("#video-overlay-first").append('<video controls autoplay src="https://res.cloudinary.com/daog54j96/video/upload/v1633375440/%D9%85%D9%86%D8%B5%D8%A9_%D8%AA%D8%B9%D9%84%D9%8A%D9%85%D9%8A%D8%A9_oi778s.mp4"  style="height: 500px ; width: 500px ; "></video>');
    });
    $('.video-overlay-first, .video-overlay-close').on('click', function(e){
        e.preventDefault();
        close_video();
    });


    $('#play-video').on('click', function(e){
        e.preventDefault();
        $('#video-overlay').addClass('open');
        $("#video-overlay").append('<video controls autoplay src="https://res.cloudinary.com/daog54j96/video/upload/v1633380465/AmalFolowUp_i06ww5.mp4"  style="height: 500px ; width: 500px ;"></video>');
    });

    $('.video-overlay, .video-overlay-close').on('click', function(e){
        e.preventDefault();
        close_video();
    });

    $(document).keyup(function(e){
        if(e.keyCode === 27) { close_video(); }
    });

    function close_video() {
        $('.video-overlay.open').removeClass('open').find('video').remove();
    };
</script>


</body>

</html>
