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
                                    <img src="{{ asset('assets_rtl/images/svg/checked-mark.svg') }}" alt="" height="30" width="30" />
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


                <div class="col-md-12 col-12 mb-5">
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col">
                                <h2 class="mb-0" style="border-bottom: 2px solid #ecebf1!important;"><span>أمال فيديو</span></h2>
                            </div>
                        </div>
                        <div class="row">
                       @if( \App\Models\Video::all()->count() > 0)
                                @foreach( \App\Models\Video::all() as $video)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <!-- Card -->
                                        @if( $video  == \App\Models\Video::all()->firstOrFail())
                                            <div class="card  mb-4 card-hover">
                                                <a href="#" data-id="{{ $video->id }}" class="card-img-top courseThumb" data-video="{{ $video->videoCourceUrl }}"><img src="{{ $video->thumbs }}" alt="" class="card-img-top rounded-top-md"></a>
                                                <!-- Card body -->
                                                <div class="card-body">
                                                    <h4 class="mb-2 text-truncate-line-2 "><a href="#" data-id="{{ $video->id }}" class="text-inherit courseTitle" data-video="{{ $video->videoCourceUrl }}">{{ $video->videoCourseTitle }}</a>
                                                    </h4>
                                                    <!-- List inline -->
                                                    <ul class="mb-3 list-inline">
                                                        <li class="list-inline-item"><i class="far fa-clock me-1"></i>
                                                            {{ $video->duration }}
                                                        </li>
                                                    </ul>
                                                    <ul class="mb-3 list-inline">
                                                        <li class="list-inline-item">حالة :
                                                            @if(\App\Models\admin\Completed::all()->where('video_id' , $video->id)->count() > 0)
                                                                مكتمل
                                                            @else
                                                                غير مكتمل
                                                            @endif
                                                        </li>
                                                    </ul>
                                                    <ul class="mb-3 list-inline d-flex justify-content-center">
                                                        <li class="list-inline-item"><img src="{{ asset('assets/icons8-open-lock.svg') }}" height="32" width="32" class="locked" data-lock="false">
                                                        </li>
                                                    </ul>
                                                    <div class="lh-1">
                                                    </div>
                                                </div>
                                                <!-- Card footer -->
                                                <div class="card-footer">
                                                    <!-- Row -->
                                                    <div class="row align-items-center g-0">
                                                        <div class="col-auto">
                                                            <img src="{{ asset('assets/service.png') }}" class="rounded-circle avatar-xs" alt="">
                                                        </div>
                                                        <div class="col ms-2">
                                                            <span>{{ $video->instructor }}</span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <img src="{{ asset('assets/logo_dark.svg') }}" class=" rounded-circle Logo" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                        <div class="card  mb-4 card-hover">
                                            <a href="#" data-id="{{ $video->id }}" class="card-img-top courseThumb" data-video="{{ $video->videoCourceUrl }}"><img src="{{ $video->thumbs }}" alt="" class="card-img-top rounded-top-md"></a>
                                            <!-- Card body -->
                                            <div class="card-body">
                                                <h4 class="mb-2 text-truncate-line-2 "><a href="#" data-id="{{ $video->id }}" class="text-inherit courseTitle" data-video="{{ $video->videoCourceUrl }}">{{ $video->videoCourseTitle }}</a>
                                                </h4>
                                                <!-- List inline -->
                                                <ul class="mb-3 list-inline">
                                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>
                                                        {{ $video->duration }}
                                                    </li>
                                                </ul>
                                                <ul class="mb-3 list-inline">
                                                    <li class="list-inline-item">حالة :
                                                        @if(\App\Models\admin\Completed::all()->where('video_id' , $video->id)->count() > 0)
                                                            مكتمل
                                                        @else
                                                            غير مكتمل
                                                        @endif
                                                    </li>
                                                </ul>
                                                <ul class="mb-3 list-inline d-flex justify-content-center">
                                                    <li class="list-inline-item">
                                                        @if(\App\Models\admin\EnrolledCourses::all()->where('video_id' , $video->id)->count() > 0)
                                                            <img src="{{ asset('assets/icons8-open-lock.svg') }}" height="32" width="32" class="locked" data-lock="true">
                                                        @else
                                                            <img src="{{ asset('assets/icons8-lock.svg') }}" height="32" width="32" class="locked" data-lock="true">

                                                        @endif
                                                    </li>
                                                </ul>
                                                <div class="lh-1">
                                                </div>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer">
                                                <!-- Row -->
                                                <div class="row align-items-center g-0">
                                                    <div class="col-auto">
                                                        <img src="{{ asset('assets/service.png') }}" class="rounded-circle avatar-xs" alt="">
                                                    </div>
                                                    <div class="col ms-2">
                                                        <span>{{ $video->instructor }}</span>
                                                    </div>
                                                    <div class="col-auto">
                                                            <img src="{{ asset('assets/logo_dark.svg') }}" class=" rounded-circle Logo" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                @endforeach
                           @else
                                <div class="d-flex justify-content-center">
                                    <h2> no courses for the moment</h2>
                                </div>
                           @endif
                        </div>
                    </div>
            </div>
                <div class="col-md-12 col-12 mb-5">
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col">
                                <h2 class="mb-0" style="border-bottom: 2px solid #ecebf1!important;"><span>أمال بودكاست</span></h2>
                            </div>
                        </div>
                        <div class="row">
                              @if( \App\Models\admin\PodCast::all()->count() > 0)
                               @foreach(\App\Models\admin\PodCast::all() as $podcast)
                                    <div class="col-lg-4 col-md-6 col-12">
                                    <div class="card  mb-4 card-hover podcastCard" data-podcast="{{ $podcast->podcastUrl }}">
                                        <a href="#" class="card-img-top " data-podcast="{{ $podcast->podcastUrl }}"><img src="{{ asset('assets/podcastThumbnail.png')}}" alt="" class="card-img-top rounded-top-md"></a>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <h4 class="mb-2 text-truncate-line-2 "><a href="#" class="text-inherit " data-podcast="{{ $podcast->podcastUrl }}">{{ $podcast->podcastName }}</a>
                                            </h4>
                                            <!-- List inline -->
                                            <ul class="mb-3 list-inline">

                                            </ul>

                                            <div class="lh-1">
                                            </div>
                                        </div>
                                        <!-- Card footer -->
                                        <div class="card-footer">
                                            <!-- Row -->
                                            <div class="row align-items-center g-0">
                                                <div class="col-auto">
                                                    <img src="{{ asset('assets/service.png') }}" class="rounded-circle avatar-xs" alt="">
                                                </div>
                                                <div class="col ms-2">
                                                    <span> أمال تدريب </span>
                                                </div>
                                                <div class="col-auto">
                                                    <img src="{{ asset('assets/logo_dark.svg') }}" class=" rounded-circle Logo" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                @endforeach
                                    @else
                                        <div class="d-flex justify-content-center">
                                            <h2> لا يوجد بودكاست </h2>
                                        </div>
                                    @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal fade gd-example-modal-lg h-80 " id="viewCourse" tabindex="-1" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close closeDataModal" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <video data-action="" class="cld-video-player cld-fluid" id="doc-player" controls>

                        </video>
                    </div>
                    <div class="modal-footer bg-success">

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade gd-example-modal-lg h-80 " id="messageCourse" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close closeDataModal" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-message">
                        <h1> الفيديوا مغلق . مرجوا إكمال فيديوا سابق . شكرا </h1>
                    </div>
                    <div class="modal-footer bg-danger">

                    </div>
                </div>
            </div>
        </div>

<style>
    .card-body {
        flex: 1 1 auto;
        padding: 0.8rem;
        padding-bottom: 0.2rem;
    }
    .Logo{
        height: 1.5rem;
    }
    podcast-amal {
        position: fixed;
         top: calc(calc(100vh - 395px) / 2);
         left: calc(calc(100vw - 330px) / 2);
    }
</style>
@endsection()

@section('script')
<script>
    $('.more_details').on('click',function (event){
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
            $('#details .contract_name').html('CDI');
            $('#details .duration').html(  '<strong class="arab">ابتداء من </strong>' + start_cdi );

        }else if(contrat_type == 2){
            console.log( 'cdd contract' );
            $('#details .contract_name').html('CDD');
            $('#details .duration').html(  '<strong class="arab"> من </strong>' + start_cdd + '<strong class="arab"> الى </strong>' + end_cdd);
        }else if(contrat_type == 3){
            console.log( 'anapic contract' );
            $('#details .contract_name').html('Anapic');
            $('#details .duration').html(  '<strong class="arab"> من </strong>' + start_anapec + '<strong class="arab"> الى </strong>' + end_anapec);
        }else if (contrat_type == 4){
            console.log( 'sans contract' );
            $('#details .contract_name').html('Sans Contract');
            $('#details .duration').html(  '<strong class="arab">ابتداء من </strong>' + job_contract_pas );
        }

        $('#details .title').html(title);
        $('#details .location').html(location);
        $('#details .job_position').html(job_position);
        $('#details .supervisor').html(supervisor);
        $('#details .supervisor_email').html(supervisor_email);
        $('#details .supervisor_phone').html(supervisor_phone);
        $('#details .salary').html(salery);
        $('#details .emploi_time').html('<strong class="arab">من الساعة </strong>' + from +  '<strong class="arab">الى الساعة </strong>' + to);
        $('#details .description').html(informmation);

        $('#details .accepter').attr('data-accepte-id',id);
        $('#details .refuser').attr('data-refuser-id',id);


    });
    $('.accepter').on('click',function (){
        let accepte_id = $(this).attr('data-accepte-id');
        console.log( accepte_id );
        let url = "{{ route('student.jobs.accepte', ':accepte_id') }}";
        url = url.replace(':accepte_id', accepte_id);
        window.location.href=url;
    });
    $('.refuser').on('click',function (){
        let refuser_id = $(this).attr('data-refuser-id');
        let url = "{{ route('student.jobs.refuse', ':refuser_id') }}";
        url = url.replace(':refuser_id', refuser_id);
        window.location.href=url;

    });
</script>

<script>
    let flag = false
    const user_id = {{ \Illuminate\Support\Facades\Auth::user()->id }};
    console.log('user id '+ user_id)
    $("#viewCourse").on('hide.bs.modal', function(e){
        // do it here
        console.log(e.target.tagName)
        console.log('the flage is '+flag)
        if (flag){
           flag = false
        }else {
            e.preventDefault()
            console.log('prevent the on from')
            console.dir(e.target)
        }

    });
    function enroll(id , user_id) {
        let result = '';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        $.ajax({
            type : 'GET' ,
            url : "{{ route('student.course.enroll') }}",
            data : {id : id , user_id : user_id},
            contentType: 'JSON' ,
            success: (response) => {
                console.log('enroolll')
                console.table(response)
                result = response['result']
            },
            error: function(response){
                console.log(response)
            }
        })
        return result;
    }
    function showCourse(src , id ){
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
        demoplayer.source(src)
        document.querySelector('#viewCourse video').setAttribute('data-action' , id)
        $('#viewCourse').modal('toggle')

        demoplayer.on('ended' , (event)=> {
            console.log(event + ' this is ended')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            $.ajax({
                type : 'GET' ,
                url : "{{ route('student.course.complete') }}",
                data : {id : id , user_id : user_id},
                contentType: 'JSON',
                success: (response) => {
                    console.log('enroolll')
                    console.table(response['result'])

                },
                error: function(response){
                    console.log(response)
                }
            })
        })
    }
    const courseTitles = document.querySelectorAll('.courseTitle')
    courseTitles.forEach(el => {
        el.addEventListener('click' , function (e) {
            e.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            $.ajax({
                type : 'GET' ,
                url : "{{ route('student.course.enroll') }}",
                data : {id : el.getAttribute('data-id') , user_id : user_id},
                contentType: 'JSON' ,
                success: (response) => {
                    console.log('enroolll')
                    console.table(response['result'])
                    if(response['result']){
                        const src = el.getAttribute('data-video')
                        console.log(src)
                        showCourse(src , el.getAttribute('data-id') )
                        if(response['lock'] === 'change'){
                         el.parentElement.parentElement.children[2].children[0].children[0].src = 'http://'+window.location.host+'/assets/icons8-open-lock.svg'
                        }
                    }else {
                        console.log('locked')
                        $('#messageCourse').modal('toggle')
                    }
                },
                error: function(response){
                    console.log(response)
                }
            })

            // if(el.parentElement.parentElement.children[2].children[0].children[0].getAttribute('data-lock') === 'true'){
            //
            // }else {
            //
            // }
        })
    })
    const courseThumbs =  document.querySelectorAll('.courseThumb')
    courseThumbs.forEach(el => {
        el.addEventListener('click' , function (e) {
            e.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            $.ajax({
                type : 'GET' ,
                url : "{{ route('student.course.enroll') }}",
                data : {id : el.getAttribute('data-id') , user_id : user_id},
                contentType: 'JSON' ,
                success: (response) => {
                    console.log('enroolll')
                    console.table(response['result'])
                    if(response['result']){
                        const src = el.getAttribute('data-video')
                        console.log(src)
                        showCourse(src , el.getAttribute('data-id'))
                        if(response['lock'] === 'change'){
                         el.parentElement.children[1].children[2].children[0].children[0].src = 'http://'+window.location.host+'/assets/icons8-open-lock.svg'
                        }
                    }else {
                        console.log('locked')
                        $('#messageCourse').modal('toggle')
                    }
                },
                error: function(response){
                    console.log(response)
                }
            })

        })
    })
    document.querySelector('.closeDataModal').addEventListener('click' , function (e) {
        e.preventDefault()
        flag = true
        console.dir(e.target)
        $('.modal-body').html('<video class="cld-video-player cld-fluid" id="doc-player" controls> </video>')
        $('#viewCourse').modal('hide')
    })
</script>
    <script>
        function checkLock(el){
           isLocked = el.getAttribute('data-lock')
            if (Boolean(isLocked)){
                 el.parentElement.parentElement.parentElement.parentElement.children[0].style = 'cursor: pointer;'
            }
        }
    </script>
            <script>
                document.querySelectorAll('.podcastCard').forEach(e => {
                    e.addEventListener('click' , function (evt) {
                        console.log(e.getAttribute('data-podcast'))

                        $('body').append(`<podcast-amal logo=https://res.cloudinary.com/daog54j96/image/upload/v1636460850/logo_yedftx.svg podcastSrc=${e.getAttribute('data-podcast')} coverSrc=https://res.cloudinary.com/daog54j96/image/upload/v1636735438/podcastsvg_xevc1a.svg></podcast-amal>`)
                    })
                })
            </script>
@endsection
