        @extends('admin.admin_layouts')
        @section('title', 'Admin Dashboard')
        @section('content')

            <div id="db-wrapper">
                <!-- navbar vertical -->
                <!-- Sidebar -->
                @include('admin.includes.sidebar')
                <!-- Page Content -->
                <div id="page-content">
                    @include('admin.includes.header')
                    <!-- Page Header -->
                    <!-- Container fluid -->

                    <div style="background: #18113c!important;" class="py-4 py-lg-6">
                        <div class="container">
                            <div class="row">
                                <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                                    <div class="d-lg-flex align-items-center justify-content-between">
                                        <!-- Content -->
                                        <div class="mb-4 mb-lg-0">
                                            <h1 class="text-white mb-1">Add New Course</h1>
                                            <p class="mb-0 text-white lead">
                                                Just fill the form and create your courses frfezfe.
                                            </p>
                                        </div>
                                        <div>
                                            <img height="120px" src="{{ asset('assets/images/logo_rtl.svg') }}" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="pb-12">
                        <div class="container-fluid p-4">

                            <div style="border-top: 2px solid #0f7a5b;" class="alert alert-success get_success_message" role="alert">
                                The Date Is Added With Success!
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <!-- Card -->
                                    <div class="card">

                                        <!-- Card header -->
                                        <div class="card-header">
                                            <h3 class="mb-0">Add New Course</h3>
                                            <p class="mb-0">
                                                You have full control to manage your own account setting.
                                            </p>
                                        </div>
                                        <!-- Card body -->
                                        <form action="{{route('admin.course.newstore')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">





                                                <hr style="margin-top: 0rem!important;" class="my-5">
                                                <div>

                                                    <!-- Form -->

                                                    <div class="row">
                                                        <!-- First name -->
                                                        <h1 class="arab" style="background: #18113c;color: #FFF;border-radius: 5px;padding: 10px;text-align: center;">معلومات اساسية</h1>
                                                        <div class="card mb-3 ">
                                                            <div class="card-header border-bottom px-4 py-3">
                                                                <h4 style="text-align: end;" class="arab mb-0">معلومات اساسية</h4>
                                                            </div>
                                                            <!-- Card body -->
                                                            <div class="card-body">
                                                                <div style="text-align: end;" class="mb-3">
                                                                    <label for="courseTitle" class="arab form-label">عنوان الدورة</label>
                                                                    <input style="direction: rtl;" id="courseTitle" name="course_name" class="form-control form-control-sm" type="text" required placeholder="عنوان الدورة"  />

                                                                </div>
                                                                <div style="text-align: end;" class="mb-3">
                                                                    <label for="courseTeacher" class="arab form-label"> الأستاذة  </label>
                                                                    <select id="courseTeacher" style="direction: rtl;" name="quizz_category"  class="form-control form-control-sm arab" data-width="100%" required>
                                                                        <option value="def"> إسم اﻷستادة</option>
                                                                        @foreach( \App\Models\admin\cheif::all() as $chef)
                                                                            <option value="{{ $chef->first_name }} {{  $chef->last_name }}">{{ $chef->first_name }} {{  $chef->last_name }} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div style="text-align: end;" class="mb-3">
                                                                    <label class="arab form-label">وصف الدورة</label>
                                                                    <textarea id="course_descreption" rows="10" style="direction: rtl;" name="description" class="form-control form-control-sm" placeholder="وصف الدورة" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h1 class="arab" style="background: #18113c;color: #FFF;border-radius: 5px;padding: 10px;text-align: center;">وسائط الدورة</h1>
                                                        <div class="card mb-3  border-0">
                                                            <div class="card-header border-bottom px-4 py-3" disabled>
                                                                <h4 style="text-align: end;" class="arab mb-0">وسائط الدورة</h4>
                                                            </div>
                                                            <!-- Card body -->
                                                            <div class="card-body">
                                                                <label style="width: 100%;text-align: end" class="arab form-label">صورة غلاف الدورة</label>

                                                                <input type="file" name="image" class="form-control" />


                                                            </div>
                                                        </div>
                                                        <h1 class="arab" style="background: #18113c;color: #FFF;border-radius: 5px;padding: 10px;text-align: center;">مواد الدورة</h1>
                                                        <div class="card mb-3  border-0">
                                                            <div class="card-header border-bottom px-4 py-3" disabled>
                                                                <h1 style="text-align: end" class="arab mb-0">مواد الدورة</h1>
                                                            </div>
                                                            <!-- videos -->
                                                            <div class="card-body ">

                                                                <div class="bg-light rounded p-2 mb-4">
                                                                    <div style="background: #ffd767;" class="card mb-4">
                                                                        <!-- Card body -->
                                                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                                                            <div class="nav btn-group flex-nowrap" role="tablist">

                                                                                <img width="40px" src="{{ asset('assets/images/video-marketing.svg') }}">
                                                                            </div>
                                                                            <div>
                                                                                <h2 class="arab mb-0">فيديوهات الدرس</h2>

                                                                            </div>
                                                                            <!-- Nav -->

                                                                        </div>
                                                                    </div>



                                                                    <!-- List group -->


                                                                </div>
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                                    <!-- Check box -->


                                                                    <!-- Check box -->
                                                                    @foreach($videos as $vide)
                                                                        <div style="display: flex;justify-content: end;" class="border p-4 rounded-3 mb-2">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="checkbox" id="customRadio{{$vide->id}}" name="videos[]" value="{{$vide->videoCourceUrl}}" class="form-check-input">
                                                                                <label class="form-check-label ps-1 h4 arab" for="customRadio{{$vide->id}}">
                                                                                    {{$vide->videoCourseTitle}}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach



                                                                </div>

                                                                <div class="bg-light rounded p-2 mb-4">
                                                                    <div style="background: #ffd767;" class="card mb-4">
                                                                        <!-- Card body -->
                                                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                                                            <div class="nav btn-group flex-nowrap" role="tablist">

                                                                                <img width="40px" src="{{ asset('assets/images/video-marketing.svg') }}">
                                                                            </div>
                                                                            <div>
                                                                                <h2 class="arab mb-0"> الصوتية الدرس</h2>

                                                                            </div>
                                                                            <!-- Nav -->

                                                                        </div>
                                                                    </div>



                                                                    <!-- List group -->


                                                                </div>
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                                    <!-- Check box -->


                                                                    <!-- Check box -->
                                                                    @foreach($podcasts as $podcast)
                                                                        <div style="display: flex;justify-content: end;" class="border p-4 rounded-3 mb-2">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="checkbox" id="customRadio{{$podcast->id}}" name="podcasts[]" value="{{$podcast->podcastUrl}}" class="form-check-input">
                                                                                <label class="form-check-label ps-1 h4 arab" for="customRadio{{$podcast->id}}">
                                                                                    {{$podcast->podcastName}}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach



                                                                </div>
                                                                <div class="bg-light rounded p-2 mb-4">
                                                                    <div style="background: #ffd767;" class="card mb-4">
                                                                        <!-- Card body -->
                                                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                                                            <div class="nav btn-group flex-nowrap" role="tablist">

                                                                                <img width="40px" src="{{ asset('assets/images/video-marketing.svg') }}">
                                                                            </div>
                                                                            <div>
                                                                                <h2 class="arab mb-0"> مواد الدرس</h2>

                                                                            </div>
                                                                            <!-- Nav -->

                                                                        </div>
                                                                    </div>



                                                                    <!-- List group -->


                                                                </div>
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                                    <!-- Check box -->


                                                                    <!-- Check box -->
                                                                    @foreach($materiels as $materiel)
                                                                        <div style="display: flex;justify-content: end;" class="border p-4 rounded-3 mb-2">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="checkbox" id="customRadio{{$materiel->id}}" name="materiels[]" value="{{$materiel->file_location}}" class="form-check-input">
                                                                                <label class="form-check-label ps-1 h4 arab" for="customRadio{{$materiel->id}}">
                                                                                    {{$materiel->mat_title}}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach



                                                                </div>

                                                            </div>



                                                        </div>


                                                        <div class="col-12">
                                                            <!-- Button -->
                                                            <button id="submit" class="btn btn-primary arab" type="submit">
                                                                إضافة
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->

                </div>
            </div>
            <!-- The modal  -->
        @endsection()

        @section('script')

            <style>
                .step {
                    pointer-events:none;
                }
                .modal-header , .modal-footer{
                    background-color: #18113c;
                }
            </style>
        @endsection

{{--        <div style="text-align: end;" class="mb-3">--}}
{{--            <input type="file"--}}
{{--                   class="filepondCourse"--}}
{{--                   name="filepondCourse"--}}
{{--                   data-max-file-size="500MB"--}}
{{--                   data-max-files="1">--}}
{{--        </div>--}}
