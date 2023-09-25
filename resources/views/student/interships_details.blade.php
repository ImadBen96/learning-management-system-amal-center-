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
                        background: url({{ asset('../assets_rtl/images/background/profile-bg.jpg') }}) no-repeat;
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
                        <div>
                            <a href="#" class="btn btn-primary btn-sm d-none d-md-block arab">التواصل مع المركز</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection()

@section('script')

@endsection
