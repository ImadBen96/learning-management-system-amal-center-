@extends('student.student_layouts')
@section('title', 'Student Dashboard')
@section('content')

    <div class="pt-5 pb-5">
        <div class="container">
            <!-- User info -->
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <!-- Bg -->
                    <div class="pt-16 rounded-top-md" style="
                        background: url({{ asset('assets/images/banner_wruimu.jpg') }}) no-repeat;
                        background-size: cover;
                        "></div>
                    <div
                        class="d-flex align-items-end justify-content-between bg-white px-4 pt-2 pb-4 rounded-none rounded-bottom-md shadow-sm">
                        <div class="d-flex align-items-center">
                            <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                                <img src="{{ asset('assets/student/' .  Auth::user()->avatar  . '') }}" class="avatar-xl rounded-circle border border-4 border-white position-relative"
                                     alt="" />
                                <a href="#" class="position-absolute top-0 end-0" data-bs-toggle="tooltip" data-placement="top" title=""
                                   data-original-title="Verified">
                                    <img src="{{ asset('assets_rtl/images/svg/checked-mark.svg') }}" alt="" height="30" width="30" />
                                </a>
                            </div>
                            <div class="lh-1">
                                <h2 class="mb-0">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                                <p class="mb-0 d-block">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <div style="position: relative;top: 8px;">
                            <a href="https://api.whatsapp.com/send/?phone=212689980549&text&app_absent=0" class="btn btn-sm d-none d-md-block arab" style="background-color: #378d7f ; color: white ; border-radius: .5rem; box-shadow: 0 1px 3px rgba(3,0,71,.09)!important;"> <span > التواصل مع المركز</span> <img  src="{{ asset('assets/icons8-whatsapp-48.png') }}" height="32px" width="32px" style="margin-right: 7px"> </a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Content -->
            <nav style="padding: 0px;" class="navbar navbar-expand-lg navbar-default mt-3">
                <div class="container-fluid px-0">
                    <!-- Mobile view nav wrap -->

                    <!-- Button -->
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar top-bar mt-0"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                    <!-- Collapse -->
                    <div style="justify-content: center;" class="navbar-nav collapse navbar-collapse" id="navbar-default">
                        <ul class="navbar-nav">



                            <li  class="nav-item">
                                <a style="padding: 12px 26px;" class="nav-link menu_link arab" href="{{ route('student.monitorings') }}" id="navbarLanding" >
                                    <i class="fe fe-book nav-icon"></i>
                                    دوراتي
                                </a>
                            </li>
                            <li  class="nav-item ">
                                <a style="padding: 12px 26px;" class="nav-link menu_link arab" href="{{ route('student.all.jobs') }}" id="navbarLanding">
                                    <i class="fe fe-pie-chart nav-icon"></i>
                                    فرص العمل
                                </a>
                            </li>


                        </ul>


                    </div>
                </div>
            </nav>
            <div class="row mt-0 mt-md-4">
                <div class="col-lg-3 col-md-4 col-12">
                    <!-- User profile -->
                    {{--                    @include("student.includes.sidebar")--}}
                </div>
                <div class="col-md-12 col-12 mb-5">
                    <div class="card">

                        <!-- card header  -->
                        <div class="card-header border-bottom-0">
                            <h3 class="mb-1 arab">مراقبة</h3>

                        </div>


                        <!-- table  -->
                        <div class="card-body pt-2">
                            <div class="table-responsive">

                                <table id="dataTableBasic" class="table" style="width:100%">
                                    <thead class="table-light">
                                    <tr>


                                        <th style="letter-spacing: 0px;" class="arab">رقم الدورة</th>
                                        <th style="letter-spacing: 0px;" class="arab">اسم الدورة التدريبية</th>
                                        <th style="letter-spacing: 0px;" class="arab">الوصفات الاساسية</th>
                                        <th style="letter-spacing: 0px;" class="arab"> مدة الدورة</th>
                                        <th style="letter-spacing: 0px;" class="arab">نتيجة الدورة</th>



                                    </tr>
                                    </thead>
                                    <tbody>
                                    @isset($monitorings)
                                        @php($i=1)

                                        @foreach($monitorings as $monitoring)
                                            <tr>


                                                <td>{{  $i++  }}</td>
                                                <td>{{ $monitoring->services->service_name }}</td>
                                                <td>{{ $monitoring->supervisor }}</td>

                                                <td>
                                                    <strong class="arab">من </strong>{{ $monitoring->start }}
                                                    <strong class="arab">الى</strong>{{ $monitoring->end }}

                                                </td>
                                                <td>
                                                    @if($monitoring->note)
                                                        <span class="badge rounded-pill bg-success arab">{{ $monitoring->note }}</span>
                                                    @else
                                                        <span class="badge rounded-pill bg-warning arab">ليس بعد</span>
                                                    @endif

                                                </td>



                                            </tr>
                                        @endforeach
                                    @endisset



                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection()

@section('script')

@endsection
