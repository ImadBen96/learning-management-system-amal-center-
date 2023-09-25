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
                        background: url({{ asset('assets/banner.png') }}) no-repeat;
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
                                    <img src="../assets_rtl/images/svg/checked-mark.svg" alt="" height="30" width="30" />
                                </a>
                            </div>
                            <div class="lh-1">
                                <h2 class="mb-0">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                                <p class="mb-0 d-block">{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Content -->

            <div class="row mt-0 mt-md-4">
                <div class="col-lg-3 col-md-4 col-12">
                    <!-- User profile -->
                    @include("student.includes.sidebar")
                </div>
                <div class="col-md-9 col-12 mb-5">
                    <div class="card">

                        <!-- card header  -->
                        <div class="card-header border-bottom-0">
                            <h3 class="mb-1 arab">التداريب المتاحة</h3>

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
                                    <div class="card mb-4">
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
                                            <div class="d-flex justify-content-between border-bottom py-2  fs-6">

                                                <span class="arab">من</span> : <strong>{{$inership->start}}</strong> <span class="arab">الى</span> : <strong>{{$inership->end}}</strong>
                                            </div>
                                            {{--                                        <div class="d-flex justify-content-between border-bottom py-2  pt-2 fs-6">--}}
                                            {{--                                            <span><strong>Supervisor Email</strong></span>--}}
                                            {{--                                            <span class="text-dark"> {{ $inership->supervisor_email }}</span>--}}
                                            {{--                                        </div>--}}
                                            <div class="d-flex justify-content-between border-bottom pt-2 py-2 fs-6">
                                                <span><strong>هاتف المشرف</strong></span>
                                                <span class="text-dark"> {{ $inership->supervisor_phone }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom pt-2 py-2 pt-2 fs-6">
                                                <span><strong>الحالة</strong></span>
                                                <span class="text-dark">
                                                @if($inership->status == 1)
                                                        <span class="badge rounded-pill bg-success">Accepted</span>
                                                    @elseif($inership->status == 2)
                                                        <span class="badge rounded-pill bg-danger">Refused</span>
                                                    @else
                                                        <span class="badge rounded-pill bg-warning">Not Yet</span>
                                                    @endif
                                            </span>
                                            </div>
                                            <div class="d-flex justify-content-between pt-2 fs-6">
                                                <span><strong> الوضعية</strong></span>
                                                <span class="ms-2 d-flex align-items-center">
                                                <span class="badge badge-dot bg-warning me-1"></span>
                                                <span class="text-warning arab">مازال متاح</span>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    @endisset()
                    <!-- Card -->
                    </div>

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
                                <h1 class="mb-1 display-4 fw-bold arab">تفاصيل التدريب</h1>

                            </div>
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
                            <h6 class="mb-1 display-4 fw-bold title">The world's top courses</h6>
                            <p class="lead"><i class="fe fe-map-pin me-1"></i><strong class="location">iki</strong> </p>
                            <strong style="color: #18113c;" class="arab">المدة الزمنية :</strong>
                            <p>
                                <span style="color: #18113c;">من</span> <strong class="start">2020-12-2</strong> <span style="color: #18113c;">الى</span> <strong class="end">2020-02-10</strong>
                            </p>
                            <div class="row">
                                <div class="col-md-4">
                                    <strong style="color: #18113c;" class="arab">المشرف :</strong>
                                    <p class="supervisor">

                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <strong style="color: #18113c;" class="arab">الايميل المشرف : </strong>
                                    <p class="email">
                                        imadben3@gmail.com
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <strong style="color: #18113c;" class="arab">هاتف المشرف : </strong>
                                    <p class="supervisor_phone">
                                        060000000
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <strong style="color: #18113c;" class="arab">الاهداف : </strong>
                                    <p class="arab objectifs">
                                        الأهداف في الحياة، هي الغايات التي يسعى الإنسان لتحقيقها؛ ممَّا يعود على نفسه بالسعادة، وينسجم بذلك مع النظرة الإيجابيَّة للحياة، فالإنسان في الحياة له أهداف منها ما تتوقف عليها حياته، وهذه تعدُّ من ضرورات الحياة، ولا يمكن الاستغناء عنها بحال، ومنها ما يندرج في مجال النظرة التحسينيَّة المستمرّة


                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <strong style="color: #18113c;" class="arab">الخط الإرشادي : </strong>
                                    <p class="arab guidline">
                                        تشير العلامة إلى الطريق المناسب للعربات في تقاطعات الطرق المعقدة. تُستعمل العلامة أيضاً في حالات أخرى التي تحتاج إلى إرشاد. العلامة لديها نسبة المسافة التالية 1:1 بين خط التفريق والفراغ.
                                    </p>
                                </div>
                            </div>



                        </div>





                    </div>
                    <!-- First name -->


                    <div style="display:flex;justify-content: end;" class="modal-footer">
                        <button style="width: 10%;" type="button" class="btn btn-outline-dark btn-sm arab" data-bs-dismiss="modal">اغلاق</button>


                        <a style="width: 10%;" href="#" class="btn btn-outline-success btn-sm accepter arab" data-accepte-id="" >قبول</a>
                        <a style="width: 10%;" href="#" class="btn btn-outline-danger btn-sm refuser arab" data-refuser-id="" >رفض</a>
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
