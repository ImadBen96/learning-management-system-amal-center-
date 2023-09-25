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
            <div class="container-fluid p-4">
                <div class="row">





                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-4 mb-4 d-md-flex justify-content-between align-items-center">
                            <div class="mb-3 mb-md-0">
                                <h1 class="mb-0 h2 fw-bold">Admin Dashboard</h1>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span style="font-size: 16px !important;" class="fs-6 text-uppercase fw-semi-bold">Students</span>
                                    </div>
                                    <div>

                                        <img height="40px" src="{{ asset('assets/images/student_list.svg') }}" />
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    {{ \App\Models\User::all()->count() }}
                                </h2>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span style="font-size: 16px !important;" class="fs-6 text-uppercase fw-semi-bold">Chefs</span>
                                    </div>
                                    <div>

                                        <img height="40px" src="{{ asset('assets/images/cooking.svg') }}" />
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    {{ \App\Models\admin\cheif::all()->count() }}
                                </h2>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span style="font-size: 16px !important;" class="fs-6 text-uppercase fw-semi-bold">Courses</span>
                                    </div>
                                    <div>
                                        <img height="40px" src="{{ asset('assets/images/course_dashboard.svg') }}" /> </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    {{ \App\Models\Video::all()->count() }}
                                </h2>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span style="font-size: 16px !important;" class="fs-6 text-uppercase fw-semi-bold">Jobs </span>
                                    </div>
                                    <div>
                                        <img height="40px" src="{{ asset('assets/images/online-voting.svg') }}" />
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">

                                    {{ \App\Models\admin\jobs::all()->count() }}

                                </h2>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span style="font-size: 16px !important;" class="fs-6 text-uppercase fw-semi-bold">Podcasts </span>
                                    </div>
                                    <div>
                                        <img height="40px" src="{{ asset('assets/images/icons8-podcast-64.png') }}" />
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">

{{--                                    {{ \App\Models\admin\PodCast::all()->count() }}--}}

                                </h2>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span style="font-size: 16px !important;" class="fs-6 text-uppercase fw-semi-bold">Materials </span>
                                    </div>
                                    <div>
                                        <img height="40px" src="{{ asset('assets/images/icons8-book-48.png') }}" />
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">

                                    {{ \App\Models\Materiels::all()->count() }}

                                </h2>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span style="font-size: 16px !important;" class="fs-6 text-uppercase fw-semi-bold">Services </span>
                                    </div>
                                    <div>
                                        <img height="40px" src="{{ asset('assets/images/icons8-service-50.png') }}" />
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">

                                    {{ \App\Models\admin\Service::all()->count() }}

                                </h2>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span style="font-size: 16px !important;" class="fs-6 text-uppercase fw-semi-bold">Internships </span>
                                    </div>
                                    <div>
                                        <img height="40px" src="{{ asset('assets/images/icons8-internship-50.png') }}" />
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">

                                    {{ \App\Models\admin\Interships::all()->count() }}

                                </h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-12 mb-5">
                        <div class="card">
                            <!-- card header  -->
                            <div class="card-header">
                                <h4 class="mb-1">new added students</h4>
                            </div>
                            <!-- table  -->
                            <div class="table-responsive">
                                <table class="table table-hover text-nowrap mb-0">
                                    <thead>
                                    <tr>
                                        <th>STUDENT NAME</th>
                                        <th>JOINED AT</th>
                                        <th>ADDRESS</th>
                                        <th>STATUS</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @isset($all_pre_registrations)
                                        @foreach($all_pre_registrations as $all_pre_registration)

                                            <tr>
                                                <td class="align-middle"><div class="d-flex
                                          align-items-center">
                                                        <div>
                                                            <div class="">
                                                                <img style="width: 47px;border-radius: 50%;" src="{{ asset('assets/student/'. $all_pre_registration->avatar .'') }}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="ms-3 lh-1">
                                                            <h5 class="mb-1"> <a href="#" class="text-inherit">{{ $all_pre_registration->first_name }} {{ $all_pre_registration->last_name }}</a></h5>
                                                        </div>
                                                    </div></td>
                                                <td class="align-middle">{{ $all_pre_registration->created_at }}</td>
                                                <td class="align-middle">{{ $all_pre_registration->address }}</td>
                                                <td class="align-middle">
                                                    @if($all_pre_registration->status == 'is_pending')
                                                        <span class="badge-dot bg-warning me-1 d-inline-block align-middle"></span>
                                                        Pending
                                                    @elseif($all_pre_registration->status == 'is_inactive')
                                                        <span class="badge-dot bg-danger me-1 d-inline-block align-middle"></span>
                                                        Inactive
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
                    <div class="col-xl-12 col-12 mb-5">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Users</h3>
                                <span>preview the all platform users</span>
                            </div>
                            <!-- Card body -->

                            <!-- Table -->
                            <div class="table-responsive border-0 overflow-y-hidden">
                                <table class="table mb-0 text-nowrap">
                                    <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="border-0">User</th>
                                        <th scope="col" class="border-0">Enrolled Courses</th>
                                        <th scope="col" class="border-0">Completed Courses</th>
                                        <th scope="col" class="border-0">Status</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(\App\Models\User::orderByDesc('is_online')->get() as $user)
                                    <tr>
                                        <td class="border-top-0">
                                            <div class="d-lg-flex">
                                                <div>
                                                    <a href="#">
                                                        <img src="{{ asset('assets/student/'.$user->avatar) }}" style="width: 47px;border-radius: 50%;" alt="" class=""></a>
                                                </div>
                                                <div class="ms-lg-3 mt-2 mt-lg-0">
                                                    <h4 class="mb-1 h5">
                                                        <a href="#" class="text-inherit">
                                                           {{ $user->first_name }} {{ $user->last_name }}
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="border-top-0">{{ \App\Models\admin\EnrolledCourses::all()->where('user_id', $user->id)->count() }}</td>
                                        <td class="border-top-0">
{{--                                            <span class="text-warning">{{ \App\Models\admin\Completed::all()->where('user_id',$user->id)->count() }}</span>--}}
                                        </td>
                                        <td class="border-top-0">
                                            @if( $user->is_online)
                                            <span class="badge bg-success online" id="{{ $user->id }}">online</span>
                                            @else
                                                <span class="badge bg-dark offline" id="{{ $user->id }}">offline</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="notify-holder">

                    </div>
            </div>
        </div>
        <audio id="notification" controls hidden>
            <source src="{{ asset('/assets/notifications/iphone_notification.mp3') }}" type="audio/mp3">
        </audio>

    </div>

@endsection()

@section('script')
<script>

    // styling the notifications



        function deleteNotification(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            $.ajax({
                type : 'POST' ,
                url : "{{ route('admin.notification.delete') }}",
                data : {'id' : id} ,
                contentType: 'JSON' ,
                success: (response) => {
                    console.table(response)
                },
                error: function(response){
                    console.log(response)
                }
            })
        }
        let index = 0
    document.querySelectorAll('.btn-close').forEach(e => e.onclick = function (evt) {
        evt.preventDefault()
        console.log(e.id)
    })
    document.querySelectorAll('.btn-close').forEach(e => {
        console.dir(e.childNodes[1].textContent = `Student ${notifications[index]['data']['first_name']} ${notifications[index]['data']['last_name']} logged at  ${notifications[index]['created_at']}`)
        index++
    } )

</script>
<script>
    const host = window.location.host
    const audioNotification = 'http://'+host+'/assets/notifications/iphone_notification.mp3'
    function playSound() {
        const audio = new Audio(audioNotification);
        audio.play();
    }
    function getMessage(data , id){
        const src = 'http://'+host+'/assets//close/close.svg'
        return `<div class="alert alert-primary w-10" role="alert" >
                        <strong>Notification!</strong> <span class="holder">${data}</span> just logged
                        <button  type="button" class="btn-close noti-close" data-bs-dismiss="alert" aria-label="Close" data-id=${id}> <img src=${src} height="32" width="32"> </button>
                    </div>`
    }
   {{--function getNotification(){--}}
   {{--     console.log('getting notifications')--}}
   {{--    const notifications =  @json( $notifications );--}}
   {{--    for (const notification of notifications) {--}}
   {{--        console.log(notification['id'])--}}
   {{--        console.dir(notification['data'])--}}

   {{--        const holder = $('.notify-holder')--}}

   {{--        const oldHtml = holder.html()--}}
   {{--        const newHtml = getMessage(notification['data']['first_name'] + ' '+ notification['data']['last_name'] , notification['id'])--}}
   {{--        holder.html(newHtml + oldHtml)--}}
   {{--    }--}}
   {{--}--}}
   getNotification()
    console.log()
    const holder = $('.notify-holder')

    function checkDOMChange()
    {
        // check for any new element being inserted here,
        // or a particular node being modified
        if (document.querySelector('.alert') == undefined){
            console.log('nothing there')
            setTimeout( checkDOMChange, 3000 );
        }else {
            document.querySelectorAll('.btn-close').forEach(e => {
                e.addEventListener('click' , function () {
                    console.log('delete notification')
                    const data_id = e.getAttribute('data-id')
                    deleteNotification(data_id)
                })
            })
            console.log('connected')
            return
        }

        // call the function again after 100 milliseconds

    }
    function deleteNotification(id){
        console.log('delete notifications')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        $.ajax({
            type : 'GET' ,
            url : "{{ route('admin.notification.delete') }}",
            contentType: 'JSON' ,
            data : {id : id},
            success: (response) => {
                console.log('the response')
            },
            error: function(response){
                console.log(response)
            }
        })
    }
    checkDOMChange()

    const hiddenBtn = document.querySelector('.hiddenBtn')


</script>
    <script>
        function checkOffline(){
            console.log('check check')
            let OfflineUser = []
            let OnlineOnes = []
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            $.ajax({
                type : 'GET' ,
                url : "{{ route('admin.notification.online') }}",
                contentType: 'JSON' ,
                success: (response) => {
                    console.log('the response checkonline')
                    OnlineOnes = response['online']
                    OfflineUser = response['offline']
                    console.dir(OnlineOnes)
                    console.dir(OfflineUser)
                    const OfflineUserId = [];
                    const OnnlineId = []
                    for (const offlineUser of OfflineUser) {
                        OfflineUserId.push(offlineUser['id'])
                    }
                    for (const onlineUser of OnlineOnes) {
                        OnnlineId.push(onlineUser['id'])
                    }
                    console.log('offline ones')
                    console.dir(OfflineUser)
                    const offlines = document.querySelectorAll('.offline')
                    console.log('id offline')
                    offlines.forEach(off => {
                        console.log(off.getAttribute('id'))
                        if (OnnlineId.includes(parseInt(off.getAttribute('id')))){
                            console.log('inclide')
                            $("#"+off.getAttribute('id')).removeClass('bg-dark').addClass('bg-success')
                            off.innerText = 'online'
                        }
                    })
                    const onlines = document.querySelectorAll('.online')
                    console.log('id online')
                    onlines.forEach( on => {
                        console.log(on.getAttribute('id'))
                        if (OfflineUserId.includes(parseInt(on.getAttribute('id')))){
                            console.log('include online')
                            $("#"+on.getAttribute('id')).removeClass('bg-success').addClass('bg-dark')
                            on.innerText = 'offline'
                        }
                    })
                },
                error: function(response){
                    console.log(response)
                }
            })


        }
        setInterval(checkOffline , 3000)
    </script>
@endsection
<style>
    .notify-holder{
        position: absolute;
        top: 52px;
        right: 71px;
    }
    .alert{
        width: 20vw;
        opacity: .8;
    }
    .btn-close{
        position: absolute;
        top: -11px;
        right: 0;

    }

</style>
