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
                                        Just fill the form and create your courses.
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
                <div class="container">
                    <div id="courseForm" class="bs-stepper">
                        <div class="row">
                            <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                                <!-- Stepper Button -->
                                <div style="direction: rtl" class="bs-stepper-header shadow-sm" role="tablist">
                                    <div class="step" data-target="#test-l-1">
                                        <div  class="step-trigger" role="tab" id="courseFormtrigger1" aria-controls="test-l-1" disabled>
                                            <span class="bs-stepper-circle">1</span>
                                            <span style="font-size: 20px;"  class="bs-stepper-label arab">معلومات اساسية</span>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-l-2">
                                        <div  class="step-trigger" role="tab" id="courseFormtrigger2" aria-controls="test-l-2" disabled>
                                            <span class="bs-stepper-circle">2</span>
                                            <span style="font-size: 20px;" class="bs-stepper-label arab">وسائط الدورة</span>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-l-3">
                                        <div type="button" class="step-trigger" role="tab" id="courseFormtrigger3" aria-controls="test-l-3" disabled>
                                            <span class="bs-stepper-circle">3</span>
                                            <span style="font-size: 20px;" class="bs-stepper-label arab">مواد الدورة</span>
                                        </div >
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-l-4">
                                        <div type="button" class="step-trigger" role="tab" id="courseFormtrigger4" aria-controls="test-l-4" disabled>
                                            <span class="bs-stepper-circle">4</span>
                                            <span style="font-size: 20px;" class="bs-stepper-label arab">حفظ الدرس</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Stepper content -->
                                <div class="bs-stepper-content mt-5">
                                    <form  id="wizzard" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Content one -->
                                        <div id="test-l-1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger1">
                                            <!-- Card -->
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
                                            <!-- Button -->
                                            <button id="first_next_btn" class="btn btn-primary"  onclick="return goNext()" disabled>
                                                التالي
                                            </button>
                                        </div>
                                        <!-- Content two -->
                                        <div id="test-l-2" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger2">
                                            <!-- Card -->
                                            <div class="card mb-3  border-0">
                                                <div class="card-header border-bottom px-4 py-3" disabled>
                                                    <h4 style="text-align: end;" class="arab mb-0">وسائط الدورة</h4>
                                                </div>
                                                <!-- Card body -->
                                                <div class="card-body">
                                                    <div class="custom-file-container fallback" data-upload-id="courseCoverImg" id="courseCoverImg">
                                                        <label style="width: 100%;text-align: end" class="arab form-label">صورة غلاف الدورة
                                                            <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                                               title="Clear Image"></a></label>
                                                        <label  class="custom-file-container__custom-file">
                                                            <input  type="file" name="course_image" class="custom-file-container__custom-file__custom-file-input courseThums"
                                                                    accept="image/jpeg,image/jpg,image/png" required />
                                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" required />
                                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                        </label>
                                                        <small style="direction: rtl;" class="arab mt-3 d-block">قم بتحميل صورة الدورة التدريبية الخاصة بك هنا. يجب أن تفي بمعايير جودة صورة الدورة التدريبية لدينا حتى يتم قبولها. إرشادات مهمة: 750 × 440 بكسل ؛ .jpg ، .jpeg  أو png. لا يوجد نص على الصورة.</small>
                                                        <div  class="custom-file-container__image-preview"></div>
                                                    </div>


                                                </div>
                                            </div>
                                            <!-- Button -->
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-secondary" onclick="return goBack()">
                                                    السابق
                                                </button>
                                                <button class="btn btn-primary" id="second_next_btn" onclick="return goNext()"  disabled>
                                                    التالي
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Content three -->
                                        <div id="test-l-3" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger3">
                                            <!-- Card -->
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
                                                        <div class="list-group list-group-flush border-top-0" id="courseList">
                                                            <div id="courseOne">
                                                                <div style="width: 100%;" class="list-group-item rounded px-3 mb-1" id="introduction">
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <h5 class="mb-0">
                                                                            <a href="#" class="text-inherit" aria-expanded="true" data-bs-toggle="collapse"
                                                                               data-bs-target="#collapselistOne" aria-controls="collapselistOne">
                                                                                <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span>
                                                                            </a>
                                                                        </h5>
                                                                    </div>
                                                                    <div id="collapselistOne" class="collapse show" aria-labelledby="introduction"
                                                                         data-bs-parent="#courseList">
                                                                        <div class="card-body">
                                                                            <div style="text-align: end;" class="mb-3">
                                                                                <input type="file"
                                                                                       class="filepondCourse"
                                                                                       name="filepondCourse"
                                                                                       data-max-file-size="500MB"
                                                                                       data-max-files="1">
                                                                            </div>
                                                                        </div>
                                                                        <div class="videoPreview" style="max-width: px">

                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <div class="input-group">

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>



                                            </div>

                                            <!-- Button -->
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-secondary" onclick="return goBack()">
                                                    السابق
                                                </button>
                                                <button class="btn btn-primary" id="third_btn"  onclick="return goNext()" disabled>
                                                    التالي
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Content four -->
                                        <div id="test-l-4" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger4">
                                            <!-- Card -->
                                            {{--                                            <div class="card mb-3  border-0">--}}
                                            {{--                                                <div class="card-header border-bottom px-4 py-3">--}}
                                            {{--                                                    <h4 class="mb-0">Requirements</h4>--}}
                                            {{--                                                </div>--}}
                                            {{--                                                <!-- Card body -->--}}
                                            {{--                                                <div class="card-body">--}}
                                            {{--                                                    <input name='tags' value='jquery, bootstrap' autofocus>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                            <div class="card mb-4 card-hover  ">
                                                <div class="row g-0">
                                                    <!-- Image -->
                                                    <a href="blog-single.html" class="col-lg-8 col-md-12 col-12 bg-cover img-left-rounded" style="background-image: url( {{ asset('assets/images/png/neonbrand-zFSo6bnZJTw-unsplash.jpg') }});">
                                                        <img src=" {{ asset('assets/images/png/neonbrand-zFSo6bnZJTw-unsplash.jpg') }} " class="img-fluid d-lg-none invisible" alt=""></a>
                                                    <div class="col-lg-4 col-md-12 col-12">
                                                        <!-- Card Body -->
                                                        <div class="card-body">
                                                            <a href="#" class="badge bg-warning mb-3">Courses</a>
                                                            <h1 class="mb-4"> <a href="blog-single.html" class="text-inherit">
                                                                    Amal Tadrib Course Creator
                                                                </a>
                                                            </h1>
                                                            <p>the course will persisted in our servers databases
                                                            </p>
                                                            <!-- Media Content -->
                                                            <div class="row align-items-center g-0 mt-7">
                                                                <div class="col-auto">
                                                                </div>
                                                                <div class="col-auto">
                                                                    <p class="fs-6 mb-0 courseDuration"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mb-22">
                                                <!-- Button -->
                                                <button class="btn btn-secondary mt-5" onclick="return goBack()">
                                                    السابق
                                                </button>
                                                <button   class="btn btn-danger mt-5" id="submition">
                                                    ارسال
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Sorry . the file type not supported
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal" id="sentCourseModal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"></h5>
                                                        <button type="button" class="btn-close closeDataModal" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="waitWrapper">
                                                        <h2> The Data is sent to the cloud right now </h2>
                                                        <div class="loadingVideos d-flex justify-content-center" >
                                                            <lottie-player src=" {{ asset('assets/lotties/890-loading-animation.json') }}" background="transparent"  speed="0.5"  style="width: 600px; height: 600px;" loop autoplay ></lottie-player>
                                                        </div>
                                                    </div>
                                                    <div class="successUploadCloud" hidden>
                                                        <h2> Course is persisted in Amal cloud server  </h2>
                                                        <div class="d-flex justify-content-center" >
                                                            <lottie-player src=" {{ asset('assets/lotties/69021-success-interaction.json') }}" background="transparent"  speed="0.5"  style="width: 300px; height: 300px;" loop autoplay ></lottie-player>
                                                        </div>
                                                    </div>

                                                    <div class="failedUploadCloud" hidden>
                                                        <h2> Ops Server Error  </h2>
                                                        <div class=" d-flex justify-content-center" >
                                                            <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_LlRvIg.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
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

    <script>
        let formData = new FormData();
        let nullArr = [null , undefined , '']
        function checkNext() {
            if ( !(nullArr.includes(formData.get('courseTitle'))) && !(nullArr.includes(formData.get('courseTeacher'))) && !(nullArr.includes(formData.get('course_descreption')))  ){
                console.log('next enabled')
                document.querySelector('#first_next_btn').removeAttribute('disabled')
            }else {
                document.querySelector('#first_next_btn').setAttribute('disabled' , 'true')
                console.log('next diaabled')
            }
        }
        //course title
        document.querySelector('#courseTitle').addEventListener('change' , function (e) {
            e.preventDefault()
            if (e.target.value === '' || formData.get('courseTitle') === undefined ){
                console.log('it will be deleted')
                formData.delete('courseTitle')
                for (variable of formData.keys()) {
                    console.log('check')
                    console.log(formData.get(variable))
                }
                checkNext()
            }else {
                console.log('coursetitle')
                formData.append('courseTitle' , e.target.value)
                console.log(formData.get('courseTitle'))
                checkNext()
            }

        })
        document.querySelector('#courseTitle').addEventListener('input' , function (e) {
            document.querySelector('#first_next_btn').setAttribute('disabled' , 'true')
            console.log('next diaabled')
        })
        document.querySelector('#courseTeacher').addEventListener('input' , function (e) {
            document.querySelector('#first_next_btn').setAttribute('disabled' , 'true')
            console.log('next diaabled')
        })
        document.querySelector('#course_descreption').addEventListener('input' , function (e) {
            document.querySelector('#first_next_btn').setAttribute('disabled' , 'true')
            console.log('next diaabled')
        })
        document.querySelector('#courseTeacher').addEventListener('change' , function (e) {
            e.preventDefault()
            console.log(e.target.value)
            if (e.target.value === 'def' || formData.get('courseTeacher') === undefined ){
                console.log('it will be deleted')
                formData.delete('courseTeacher')
                for (variable of formData.keys()) {
                    console.log('check')
                    console.log(formData.get(variable))
                }
                checkNext()
            }else {
                console.log('coursetitle')
                formData.append('courseTeacher' , e.target.value)
                console.log(formData.get('courseTeacher'))
                checkNext()
            }
        })
        //course_descreption
        document.querySelector('#course_descreption').addEventListener('change' , function (e) {
            e.preventDefault()
            if (e.target.value === '' || formData.get('course_descreption') === undefined ){
                console.log('it will be deleted')
                formData.delete('course_descreption')
                for (variable of formData.keys()) {
                    console.log('check')
                    console.log(formData.get(variable))
                }
                checkNext()
            }else {
                console.log('course_descreption')
                formData.append('course_descreption' , e.target.value)
                console.log(formData.get('course_descreption'))
                checkNext()
            }

        })
        //course thumbs
        document.querySelector('.courseThums').addEventListener('change' , function (e) {
            e.preventDefault()
           if (e.target.files[0].type === 'image/jpeg' || e.target.files[0].type === 'image/jpg' || e.target.files[0].type === 'image/png'){
               document.querySelector('#second_next_btn').removeAttribute('disabled')
               formData.append('courseThumbs' , e.target.files[0])
           }else {
               document.querySelector('.custom-file-container__image-preview').innerHTML = ''
               document.querySelector('#second_next_btn').setAttribute('disabled' , 'true')
               $('#exampleModal-2').modal('toggle')
           }
        })
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize,
            FilePondPluginFileValidateType,
        );
        const filepondElm = document.querySelector('.filepondCourse')
        console.log('this the url '+ filepondElm)
        const metaToken = $('meta[name="csrf-token"]').attr('content')
        FilePond.setOptions({
            server: {
                url: '{{ route('admin.course.index') }}',
                process: {
                    url: `/store/video`,
                    method: 'POST',
                    headers: {
                        'Access-Control-Allow-Origin':'{{ route('admin.video.store') }} | *',
                        'X-CSRF-TOKEN': metaToken ,
                        'Methods':'POST'
                    }
                },
                revert: {
                    url: '/delete/video',
                    method: 'POST',
                    headers: {
                        'Access-Control-Allow-Origin':'{{ route('admin.video.delete') }} | *',
                        'X-CSRF-TOKEN': metaToken,
                        '_method': 'DELETE'
                    }
                }
            } });

        let previewSrc = ''
        const filepond = FilePond.create(
            document.querySelector('.filepondCourse') ,
            {
                acceptedFileTypes: ['video/mp4'],
                fileValidateTypeDetectType: (source, type) =>
                    new Promise((resolve, reject) => {
                        // Do custom type detection here and return with promise
                        console.log(type)
                        console.log('type checking')
                        resolve(type);
                    }),
                onaddfile : (error , file)=>{
                    if (error){
                        console.error(error)
                    }else {
                        console.dir(file)
                        console.log(file.filename)
                        formData.append(file.filename , file)
                        formData.append('courseSize' , file.fileSize)
                        console.log(formData.get(file.filename))
                        console.log(formData.get('courseSize'))
                    }
                } ,
                onremovefile : (error , file)=> {
                    if (error){
                        console.error(error)
                    }else {
                        console.log('the file will be '+file.filename)
                        console.log(file.fileExtention)
                        formData.delete(file.filename)
                        formData.delete('courseSize')
                        console.log(formData.get(file.filename))
                        document.querySelector('#third_btn').setAttribute('disabled' , true)
                        document.querySelector('.cld-video-player').remove()
                    }
                } ,
                onprocessfile : (error , file) => {
                    if (error){
                        console.log(error)
                    }else {
                        console.log("after process")
                        console.dir(file)
                        console.log(file.serverId)
                        previewSrc = JSON.parse(file.serverId)['result']
                        const video = document.createElement('video')
                        video.setAttribute('id' , 'doc-player')
                        video.setAttribute('controls' , 'true')
                        video.setAttribute('controls' , 'true')
                        video.className = 'cld-video-player cld-fluid'
                        formData.append(file.filename , file)
                        formData.append('course' , previewSrc)
                        console.log(formData.get(file.filename))
                        console.log(formData.get('courseSize'))
                        document.querySelector('#third_btn').removeAttribute('disabled')
                        document.querySelector('.videoPreview').appendChild(video)
                        var cld = cloudinary.Cloudinary.new({ cloud_name: 'demo' });
                        var demoplayer = cld.videoPlayer('doc-player' , {
                            "fluid": true,
                            "controls": true,
                            "colors": {
                                "base": "#2e6c36"
                            },
                            "logoOnclickUrl": "https://www.amaltadrib.com",
                            "logoImageUrl": "https://res.cloudinary.com/daog54j96/image/upload/v1636460850/logo_yedftx.svg"
                        }).width(600);
                        demoplayer.source(previewSrc)
                        video.addEventListener('loadedmetadata', (event) => {
                            const hours = Math.floor(event.target.duration / 3600)
                            const minutes = Math.floor(event.target.duration / 60)
                            const seconds = Math.floor( event.target.duration - (hours * 3600) - (minutes * 60))
                            console.log(`${hours}h : ${minutes}m : ${seconds}:s`)
                            formData.append('videoDuration' , `${hours}h : ${minutes}m : ${seconds}s` )
                        });
                    }
                }
            }
        );

        document.querySelectorAll('.filepond--credits').forEach(e => e.innerText = 'Powred By AOBC')
         const elm = document.querySelector('.filepond--drop-label label').innerText ;
        console.log('the elm '+ elm)
        document.querySelector('.filepond--drop-label label').innerText = 'Drag and Drop the video here'
        function goBack() {
            courseForm.previous();
            return false;
        }
        function goNext() {
            courseForm.next();
            return false;
        }
       function formSubmit(formData) {
           $('#submition').click(function (e) {
               e.preventDefault()
               $('#sentCourseModal').modal('toggle')
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                       'X-Requested-With': 'XMLHttpRequest'
                   }
               });
               $.ajax({
                   type : 'POST' ,
                   url : "{{ route('admin.course.store') }}",
                   data : formData ,
                   processData: false ,
                   contentType: false ,
                   success: (response) => {
                       console.table(response)
                       setTimeout(function () {
                           successAnimation()
                       } , 5000)
                   },
                   error: function(response){
                       console.log(response)
                       setTimeout(function () {
                           failureAnimation()
                       } , 5000)
                   }
               })

           })
       }
       function successAnimation(){
           document.querySelector('.waitWrapper').remove()
           $('#sentCourseModal .modal-header').css("background-color", "#19cb98");
           $('#sentCourseModal .modal-footer').css("background-color", "#19cb98");
           document.querySelector('.successUploadCloud').removeAttribute('hidden')
       }
        function failureAnimation(){
            //waitWrapper
            document.querySelector('.waitWrapper').remove()
            $('#sentCourseModal .modal-header').css("background-color", "#e53f3c");
            $('#sentCourseModal .modal-footer').css("background-color", "#e53f3c");
           document.querySelector('.failedUploadCloud').removeAttribute('hidden')
        }
        formSubmit(formData)
        document.querySelector('.closeDataModal').addEventListener('click', function (e){
            e.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            $.ajax({
                type : 'GET' ,
                url : "{{ route('admin.course.index') }}",
                data : {} ,
                success: (response) => {
                    window.location.href =  window.location.protocol +'//'+window.location.host+'/course'
                },
                error: function(response){
                    console.log(response)
                }
            })
        })
    </script>

    <style>
        .step {
            pointer-events:none;
        }
        .modal-header , .modal-footer{
            background-color: #18113c;
        }
    </style>
@endsection
