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
                                <a style="padding: 12px 26px;" class="nav-link menu_link arab" href="{{ route('student.dashboard') }}" id="navbarLanding" >
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
                <div class="col-md-12 col-12">
                    <div class="card">

                        <!-- card header  -->
                        <div class="card-header border-bottom-0">

                            <div class="row">
                                <div style="align-self: center;" class="col-lg-6">
                                    <h3 class="mb-1 arab">التداريب المتاحة</h3>
                                </div>

                                <div class="col-lg-6 text-end">
                                    <img style="width: 44px;" src="{{ asset('assets/images/handshake.svg') }}" />
                                </div>

                            </div>




                        </div>
                        @if(Session::has('success'))
                            <div style="border-top: 4px solid;" class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                    @endif


                    <!-- table  -->

                    </div>
                    <p></p>
                    <div class="row">
                        @isset($inerships)
                            @foreach($inerships as $inership )
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="card mb-3">
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <div class="text-center">
                                                <h4 class="mb-1">{{ $inership->title }}</h4>
                                                <p class="mb-0 fs-6">
                                                    <i class="fe fe-map-pin me-1"></i>{{ $inership->location }}
                                                </p>
                                                <a href="#" data-id="{{ $inership->id }}" data-title="{{ $inership->title }}" data-location="{{ $inership->location }}" data-start="{{ $inership->start }}" data-end="{{ $inership->end }}" data-supervisor="{{ $inership->supervisor }}" data-supervisor-phone="{{ $inership->supervisor_phone }}" data-objectifs="{{ $inership->objectifs }}" data-guidline="{{ $inership->guidline }}" data-email="{{ $inership->supervisor_email }}" data-bs-toggle="modal" data-bs-target="#details" class="btn btn-sm btn-outline-white mt-3 mb-4 more_details">More Details</a>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2 fs-6">
                                                <span><strong>المشرف</strong></span>
                                                <span class="text-dark"> {{ $inership->supervisor }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between  py-2  fs-6">

                                                <span class="arab">من</span> : <strong>{{$inership->start}}</strong> <span class="arab">الى</span> : <strong>{{$inership->end}}</strong>
                                            </div>




                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    @endisset()
                    <!-- Card -->
                    </div>

                </div>
                <div class="col-md-12 col-12 mb-3">
                    <div class="card">
                        <div class="card-header border-bottom-0">
                            <div class="row">

                                <div style="align-self: center;" class="col-lg-6">
                                    <h3 class="mb-1 arab">فرص العمل المتاحة</h3>
                                </div>

                                <div class="col-lg-6 text-end">
                                    <img style="width: 44px;" src="{{ asset('assets/images/suitcase.svg') }}" />
                                </div>


                            </div>

                        </div>

                    </div>

                </div>
                <div class="row">
                    @isset($jobs)
                        @foreach($jobs as $job)
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Card -->
                                <div class="card mb-4">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h4 class="mb-1">{{ $job->title }}</h4>
                                            <p class="mb-0 fs-6">
                                                <i class="fe fe-map-pin me-1"></i>{{ $job->location }}
                                            </p>
                                            <a href="#" data-id="{{$job->id}}" data-title="{{$job->title}}" data-location="{{$job->location}}" data-supervisor="{{$job->supervisor}}" data-contrat_type="{{$job->contrat_type}}" data-start_cdi="{{$job->start_cdi}}" data-start_cdd="{{$job->start_cdd}}" data-end_cdd="{{$job->end_cdd}}" data-start_anapec="{{$job->start_anapec}}" data-end_anapec="{{$job->end_anapec}}" data-informmation="{{$job->informmation}}" data-supervisor_email="{{$job->supervisor_email}}" data-supervisor_phone="{{$job->supervisor_phone}}" data-salery="{{$job->salery}}" data-job_position="{{$job->job_position}}" data-job_contract_pas="{{$job->job_contract_pas}}" data-from="{{$job->from}}" data-to="{{$job->to}}" data-bs-toggle="modal" data-bs-target="#details_jobs" class="btn btn-sm btn-outline-white mt-3 more_details_jobs">More Details</a>
                                        </div>
                                        <div class="d-flex justify-content-between border-bottom py-2 mt-4 fs-6">
                                            <span><strong class="arab">نموذج العقد</strong></span>
                                            <span class="text-dark">
                                                    @if($job->contrat_type == 1 )
                                                    CDI
                                                @elseif($job->contrat_type == 2)
                                                    CDD
                                                @elseif($job->contrat_type == 3)
                                                    Contrat Anapic
                                                @elseif($job->contrat_type == 4)
                                                    Sans Contrat
                                                @endif
                                                </span>
                                        </div>
                                        <div class="d-flex justify-content-between border-bottom py-2  fs-6">
                                            <span><strong></strong></span>
                                            <span class="text-dark">
                                                    @if($job->contrat_type == 1 )
                                                    <span class="arab">ابتداءا من : </span><strong>{{$job->start_cdi}}</strong>
                                                @elseif($job->contrat_type == 2)
                                                    <span class="arab">من</span> <strong>{{$job->start_cdd}}</strong>
                                                    <span class="arab">الى</span> <strong>{{$job->end_cdd}}</strong>

                                                @elseif($job->contrat_type == 3)
                                                    <span class="arab">من</span> <strong>{{$job->start_anapec}}</strong>
                                                    <span class="arab">الى</span> <strong>{{$job->end_anapec}}</strong>

                                                @elseif($job->contrat_type == 4)
                                                    <span class="arab">ابتداءا من : </span> <strong>{{$job->job_contract_pas}}</strong>
                                                @endif
                                                </span>
                                        </div>
                                        <div class="d-flex justify-content-between border-bottom pt-2 py-2 fs-6">
                                            <span><strong>المشرف</strong></span>
                                            <span class="text-dark">{{ $job->supervisor }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between border-bottom pt-2 py-2 fs-6">
                                            <span><strong>ايميل المشرف</strong></span>
                                            <span class="text-dark">{{ $job->supervisor_email }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between border-bottom pt-2 py-2 fs-6">
                                            <span><strong>هاتف المشرف</strong></span>
                                            <span class="text-dark">{{ $job->supervisor_phone }}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade gd-example-modal-xl" id="details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl " role="document">
            <div class="modal-content">
                <div style="padding: 0;" class="modal-header">


                    <div  style="background: #ffd767;width: 100%;border-radius: 0;" class="card">
                        <!-- Card body -->
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div>
                                <h1 class="mb-1 display-4 fw-bold arab">تفاصيل السطاج</h1>

                            </div>
                            <div class="nav btn-group flex-nowrap" role="tablist">

                                <img width="40px" src="{{ asset('assets/images/video-marketing.svg') }}">
                            </div>

                            <!-- Nav -->

                        </div>
                    </div>
                </div>

                <form action="#" method="post" class="row">
                    @csrf

                    <div class="modal-body">
                        <div class="row">

                        </div>
                        <div style="padding: 21px;" class="col-md-12">
                            <h6 class="mb-1 display-4 fw-bold title">The world's top courses</h6>
                            <p class="lead"><i class="fe fe-map-pin me-1"></i><strong class="location">iki</strong> </p>
                            <strong style="color: #18113c;" class="arab">المدة الزمنية :</strong>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>
                                        <span style="color: #18113c;">من</span> <strong class="start">2020-12-2</strong> <span style="color: #18113c;">الى</span> <strong class="end">2020-02-10</strong>
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <strong style="color: #18113c;" class="arab">المشرف :</strong>
                                    <p class="supervisor">

                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4">

                            </div>
                            <div class="row">

                                {{--                                <div class="col-md-4">--}}
                                {{--                                    <strong style="color: #18113c;" class="arab">الايميل المشرف : </strong>--}}
                                {{--                                    <p class="email">--}}
                                {{--                                        imadben3@gmail.com--}}
                                {{--                                    </p>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="col-md-4">--}}
                                {{--                                    <strong style="color: #18113c;" class="arab">هاتف المشرف : </strong>--}}
                                {{--                                    <p class="supervisor_phone">--}}
                                {{--                                        060000000--}}
                                {{--                                    </p>--}}
                                {{--                                </div>--}}
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <strong style="color: #18113c;" class="arab">معلومات اضافية : </strong>
                                    <p class="arab objectifs">
                                        الأهداف في الحياة، هي الغايات التي يسعى الإنسان لتحقيقها؛ ممَّا يعود على نفسه بالسعادة، وينسجم بذلك مع النظرة الإيجابيَّة للحياة، فالإنسان في الحياة له أهداف منها ما تتوقف عليها حياته، وهذه تعدُّ من ضرورات الحياة، ولا يمكن الاستغناء عنها بحال، ومنها ما يندرج في مجال النظرة التحسينيَّة المستمرّة


                                    </p>
                                </div>
                                {{--                                <div class="col-md-4">--}}
                                {{--                                    <strong style="color: #18113c;" class="arab">الخط الإرشادي : </strong>--}}
                                {{--                                    <p class="arab guidline">--}}
                                {{--                                        تشير العلامة إلى الطريق المناسب للعربات في تقاطعات الطرق المعقدة. تُستعمل العلامة أيضاً في حالات أخرى التي تحتاج إلى إرشاد. العلامة لديها نسبة المسافة التالية 1:1 بين خط التفريق والفراغ.--}}
                                {{--                                    </p>--}}
                                {{--                                </div>--}}
                            </div>



                        </div>





                    </div>
                    <!-- First name -->


                    <div style="display:flex;justify-content: end;" class="modal-footer">
                        <button style="width: 10%;" type="button" class="btn btn-outline-dark btn-sm arab" data-bs-dismiss="modal">اغلاق</button>


                        {{--                        <a style="width: 10%;" href="#" class="btn btn-outline-success btn-sm accepter arab" data-accepte-id="" >قبول</a>--}}
                        {{--                        <a style="width: 10%;" href="#" class="btn btn-outline-danger btn-sm refuser arab" data-refuser-id="" >رفض</a>--}}
                        {{--                    --}}
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade gd-example-modal-xl" id="details_jobs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl " role="document">
            <div class="modal-content">
                <div style="padding: 0;" class="modal-header">


                    <div  style="background: #ffd767;width: 100%;border-radius: 0;" class="card">
                        <!-- Card body -->
                        <div class="p-4 d-flex justify-content-between align-items-center">

                            <h1 class="mb-1 display-4 fw-bold arab">تفاصيل الوظيفة</h1>


                            <div class="nav btn-group flex-nowrap" role="tablist">

                                <img width="40px" src="http://localhost:8000/assets/images/video-marketing.svg">
                            </div>

                            <!-- Nav -->

                        </div>
                    </div>
                </div>

                <form action="#" method="post" class="row">
                    @csrf

                    <div class="modal-body">
                        <div class="row">

                        </div>
                        <div style="padding: 21px;" class="col-md-12">
                            <h6 class="mb-1 display-4 fw-bold title arab">The world's top courses</h6>
                            <p class="lead"><i class="fe fe-map-pin me-1"></i><strong class="location">iki</strong> </p>
                            <div class="row">

                                <div class="col-md-4">
                                    <strong style="color: #18113c;" class="arab">نوع العقد :</strong>
                                    <p class="contract_name">

                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <strong style="color: #18113c;" class="arab">مدة العقد :</strong>
                                    <p class="duration">

                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <strong style="color: #18113c;" class="arab">الوظيفة :</strong>
                                    <p class="job_position">

                                    </p>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <strong style="color: #18113c;" class="arab">المشرف :</strong>
                                    <p class="supervisor">

                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <strong style="color: #18113c;" class="arab">الراتب : </strong>
                                    <p style="direction: ltr;text-align: end;" class="arab salary">

                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <strong style="color: #18113c;" class="arab">التوقيت : </strong>
                                    <p class="emploi_time">
                                    </p>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <strong style="color: #18113c;" class="arab">وصف الوظيفة : </strong>
                                    <p class="arab description">
                                    </p>
                                </div>
                            </div>
                        </div>






                    </div>






                    <!-- First name -->


                    <div style="display:flex;justify-content: end;" class="modal-footer">
                        <button style="width: 10%;" type="button" class="btn btn-outline-dark btn-sm arab" data-bs-dismiss="modal">اغلاق</button>


                        {{--                        <a style="width: 10%;" href="#" class="btn btn-outline-success btn-sm accepter arab" data-accepte-id="" >قبول</a>--}}
                        {{--                        <a style="width: 10%;" href="#" class="btn btn-outline-danger btn-sm refuser arab" data-refuser-id="" >رفض</a>--}}
                        {{--                   --}}
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection()

@section('script')
    <script>
        $('.more_details').on('click',function (event){
            event.preventDefault();
            let id = $(this).attr('data-id');
            let title = $(this).attr('data-title');
            let location = $(this).attr('data-location');
            let start = $(this).attr('data-start');
            let end = $(this).attr('data-end');
            let supervisor = $(this).attr('data-supervisor');
            let supervisor_phone = $(this).attr('data-supervisor-phone');
            let objectifs = $(this).attr('data-objectifs');
            let guidline = $(this).attr('data-guidline');
            let email = $(this).attr('data-email');

            $('#details .title').html(title);
            $('#details .location').html(location);
            $('#details .start').html(start);
            $('#details .end').html(end);
            $('#details .supervisor').html(supervisor);
            $('#details .email').html(email)
            $('#details .supervisor_phone').html(supervisor_phone);
            $('#details .objectifs').html(objectifs);
            $('#details .guidline').html(guidline);
            $('#details .id').val(id);
            $('#details .accepter').attr('data-accepte-id',id);
            $('#details .refuser').attr('data-refuser-id',id);



        });
        $('.more_details_jobs').on('click',function (event){
            event.preventDefault();
            let id           = $(this).attr('data-id');
            let title        = $(this).attr('data-title');
            let location     = $(this).attr('data-location');
            let supervisor   = $(this).attr('data-supervisor');
            let contrat_type = $(this).attr('data-contrat_type');
            let start_cdi    = $(this).attr('data-start_cdi');
            let start_cdd    = $(this).attr('data-start_cdd');
            let end_cdd      = $(this).attr('data-end_cdd');
            let start_anapec = $(this).attr('data-start_anapec');
            let end_anapec   = $(this).attr('data-end_anapec');
            let informmation = $(this).attr('data-informmation');
            let supervisor_email = $(this).attr('data-supervisor_email');
            let supervisor_phone = $(this).attr('data-supervisor_phone');
            let salery           = $(this).attr('data-salery');
            let job_position     = $(this).attr('data-job_position');
            let job_contract_pas = $(this).attr('data-job_contract_pas');
            let from             = $(this).attr('data-from');
            let to             = $(this).attr('data-to');

            if (contrat_type == 1){
                console.log( 'cdi contract' );
                $('#details_jobs .contract_name').html('CDI');
                $('#details_jobs .duration').html(  '<strong class="arab">ابتداء من </strong>' + start_cdi );

            }else if(contrat_type == 2){
                console.log( 'cdd contract' );
                $('#details_jobs .contract_name').html('CDD');
                $('#details_jobs .duration').html(  '<strong class="arab"> من </strong>' + start_cdd + '<strong class="arab"> الى </strong>' + end_cdd);
            }else if(contrat_type == 3){
                console.log( 'anapic contract' );
                $('#details_jobs .contract_name').html('Anapic');
                $('#details_jobs .duration').html(  '<strong class="arab"> من </strong>' + start_anapec + '<strong class="arab"> الى </strong>' + end_anapec);
            }else if (contrat_type == 4){
                console.log( 'sans contract' );
                $('#details_jobs .contract_name').html('Sans Contract');
                $('#details_jobs .duration').html(  '<strong class="arab">ابتداء من </strong>' + job_contract_pas );
            }

            $('#details_jobs .title').html(title);
            $('#details_jobs .location').html(location);
            $('#details_jobs .job_position').html(job_position);
            $('#details_jobs .supervisor').html(supervisor);
            $('#details_jobs .supervisor_email').html(supervisor_email);
            $('#details_jobs .supervisor_phone').html(supervisor_phone);
            $('#details_jobs .salary').html(salery);
            $('#details_jobs .emploi_time').html('<strong class="arab">من الساعة </strong>' + from +  '<strong class="arab">الى الساعة </strong>' + to);
            $('#details_jobs .description').html(informmation);

            $('#details_jobs .accepter').attr('data-accepte-id',id);
            $('#details_jobs .refuser').attr('data-refuser-id',id);


        });
        $('.accepter').on('click',function (){
            let accepte_id = $(this).attr('data-accepte-id');
            let url = "{{ route('student.interships.accepte', ':accepte_id') }}";
            url = url.replace(':accepte_id', accepte_id);
            window.location.href=url;
        });
        $('.refuser').on('click',function (){
            let refuser_id = $(this).attr('data-refuser-id');
            let url = "{{ route('student.interships.refuser', ':refuser_id') }}";
            url = url.replace(':refuser_id', refuser_id);
            window.location.href=url;

        });
    </script>
    <script>

    </script>
@endsection

