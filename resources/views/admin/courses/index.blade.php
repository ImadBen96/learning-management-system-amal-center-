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
                        <!-- Page header -->
                        <div class="border-bottom pb-4 mb-4">
                            <div>
                                <h1 class="mb-1 h2 fw-bold">All Courses</h1>
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="admin-dashboard.html">Dashboard</a>
                                        </li>

                                        <li class="breadcrumb-item active" aria-current="page">
                                            All Courses
                                        </li>
                                    </ol>
                                </nav>
                            </div>

                        </div>
                    </div>

                </div>
                <div class=" py-6 ">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                                <div class="row d-lg-flex justify-content-between align-items-center">
                                    <div class="col-md-6 col-lg-8 col-xl-9 ">
                                        <h4 class="mb-3 mb-lg-0">Displaying Courses</h4>
                                    </div>
                                    <div class="d-inline-flex col-md-6 col-lg-4 col-xl-3 ">
                                        <div class="me-2">
                                            <!-- Nav -->
                                            <div class="nav btn-group flex-nowrap" role="tablist">
                                                <button class="btn btn-outline-white active" data-bs-toggle="tab" data-bs-target="#tabPaneGrid" role="tab" aria-controls="tabPaneGrid" aria-selected="true">
                                                    <span class="fe fe-grid"></span>
                                                </button>
                                                <button class="btn btn-outline-white" data-bs-toggle="tab" data-bs-target="#tabPaneList" role="tab" aria-controls="tabPaneList" aria-selected="false">
                                                    <span class="fe fe-list"></span>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- List  -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-8 col-12">
                                <div class="tab-content">
                                    <!-- Tab pane -->
                                    <div class="tab-pane fade pb-4 active show" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
                                        <div class="row">
                                            @if( \App\Models\admin\Cource::all()->count() > 0)
                                                @foreach( \App\Models\admin\Cource::all() as $cource)
                                                    <div class="col-lg-4 col-md-6 col-12">
                                                        <!-- Card -->
                                                        <div class="card  mb-4 card-hover">
                                                            <a href="#" class="card-img-top" >
                                                                <img src="{{ asset('storage/images/'.$cource->thumbline) }}" alt="" class="card-img-top rounded-top-md"></a>
                                                            <!-- Card body -->
                                                            <div class="card-body">
                                                                <h4 class="mb-2 text-truncate-line-2 ">
                                                                    <a href="#" class="text-inherit courseTitle arab"
                                                                                                          >
                                                                        {{ $cource->cource_title }}</a>
                                                                </h4>
                                                                <!-- List inline -->
                                                                <ul class="mb-3 list-inline">
                                                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>
                                                                        {{ $cource->created_at }}
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
                                                                        <span class="arab">{{ $cource->instructor }}</span>
                                                                    </div>
                                                                    <div class="col-auto">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="d-flex justify-content-center">
                                                    <h2> no courses for the moment</h2>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                    <!-- Tab pane -->
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-template">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade gd-example-modal-lg h-80 " id="viewCourse" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close closeDataModal" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                 <video class="cld-video-player cld-fluid" id="doc-player" controls>

                 </video>
                </div>
                <div class="modal-footer bg-success">

                </div>
            </div>
        </div>
    </div>
<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;

    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .invoice-box.rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box.rtl table {
        text-align: right;
    }

    .invoice-box.rtl table tr td:nth-child(2) {
        text-align: left;
    }
    .content-template{
        display: none;
    }
    .svg{
        height: 100pw;
        width: 100px;
    }

</style>
@endsection()

@section('script')
<script>
    function showCourse(src){
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
        $('#viewCourse').modal('toggle')
    }
    const courseTitles = document.querySelectorAll('.courseTitle')
    courseTitles.forEach(el => {
        el.addEventListener('click' , function (e) {
            e.preventDefault()
            const src = el.getAttribute('data-video')
            console.log(src)
            showCourse(src)
        })
    })
    const courseThumbs =  document.querySelectorAll('.courseThumb')
    courseThumbs.forEach(el => {
        el.addEventListener('click' , function (e) {
            e.preventDefault()
            const src = el.getAttribute('data-video')
            console.log(src)
            showCourse(src)
        })
    })
    let flag = false
    $("#viewCourse").on('hide.bs.modal', function(e){
        // do it here
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

    document.querySelector('.closeDataModal').addEventListener('click' , function (e) {
        e.preventDefault()
        flag = true
        console.dir(e.target)
        $('.modal-body').html('<video class="cld-video-player cld-fluid" id="doc-player" controls> </video>')
        $('#viewCourse').modal('hide')

    })
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
    document.querySelectorAll('.report').forEach(e => {
        e.addEventListener('click' , function (evt) {
            console.log('report will be generated')
            const formData = new FormData();
            const element = document.getElementById(e.getAttribute('data-id'));
            // Choose the element and save the PDF for our user.
            const id = e.getAttribute('data-id')
            element.removeAttribute('hidden')
            formData.append('html' , $('#'+(e.getAttribute('data-id'))).html())
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            $.ajax({
                type : 'GET' ,
                url :  window.location.protocol +'//'+window.location.host+"/admin/course/report/"+id,
                success: (response) => {
                    console.table(response)
                    const cla = 'btn'+response['id']
                    const a = document.querySelector('.'+cla)
                    a.removeAttribute('hidden')
                    a.setAttribute('href' , response['report'])
                    a.setAttribute('target' , '_blank')
                },
                error: function(response){
                    console.log(response)
                }
            })
        })
    })
</script>
@endsection
