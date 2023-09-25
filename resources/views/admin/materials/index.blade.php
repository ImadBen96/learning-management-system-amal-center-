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
                                <h1 class="mb-1 h2 fw-bold">All Materials</h1>
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="admin-dashboard.html">Dashboard</a>
                                        </li>

                                        <li class="breadcrumb-item active" aria-current="page">
                                            All Materials
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
                                        <h4 class="mb-3 mb-lg-0">Displaying Materials</h4>
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
                                            @if( \App\Models\Materiels::all()->count() > 0)
                                                @foreach( \App\Models\Materiels::all() as $mat)
                                                    <div class="col-lg-4 col-md-6 col-12">
                                                        <!-- Card -->
                                                        <div class="card  mb-4 card-hover ">
                                                            <a href="#" class="card-img-top mat" data-mat="{{ url(str_replace('public','storage',$mat->file_location)) }}" ><img src="{{ asset('assets/materialsThumbnail.png')}}" alt="" class="card-img-top rounded-top-md"></a>
                                                            <!-- Card body -->
                                                            <div class="card-body">
                                                                <h4 class="mb-2 text-truncate-line-2 arab"><a href="#" class="text-inherit courseTitle" >{{ $mat->mat_title }}</a>
                                                                </h4>
                                                                <!-- List inline -->

                                                            </div>
                                                            <!-- Card footer -->
                                                            <div class="card-footer">
                                                                <!-- Row -->
                                                                <div class="row align-items-center g-0">
                                                                    <div class="col-auto">
                                                                        <img src="{{ asset('assets/service.png') }}" class="rounded-circle avatar-xs" alt="">
                                                                    </div>
                                                                    <div class="col ms-2">
                                                                        <span>Amal Tadrib</span>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <a href="#" class="text-muted delete" id="{{ $mat->id }}">
                                                                           <img src="{{ asset('assets/icons8-delete-64.png') }}" height="32" width="32">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="d-flex justify-content-center">
                                                    <h2> no materials for the moment</h2>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                    <!-- Tab pane -->
                                    <div class="tab-pane fade pb-4" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
                                        <!-- Card -->
                                        @if( \App\Models\Materiels::all()->count() > 0)
                                            @foreach( \App\Models\Materiels::all() as $mat)
                                                <div class="card mb-4 card-hover ">
                                                    <div class="row g-0">
                                                        <a class="col-12 col-md-12 col-xl-3 col-lg-3 bg-cover img-left-rounded mat" data-video="{{ $mat->file_location }}"  style="background-image: url({{ asset('assets/materialsThumbnail.png') }});" href="#" >

                                                            <img src="{{ asset('assets/materialsThumbnail.png')  }}" alt="..." class="img-fluid d-lg-none invisible">
                                                        </a>
                                                        <div class="col-lg-9 col-md-12 col-12">
                                                            <!-- Card body -->
                                                            <div class="card-body">
                                                                <h3 class="mb-2 text-truncate-line-2 "><a href="#" class="text-inherit courseTitle" >{{ $mat->mat_title }}</a></h3>
                                                                <div class="row align-items-center g-0">
                                                                    <div class="col-auto">
                                                                        <img src="{{ asset('assets/service.png') }}" class="rounded-circle avatar-xs" alt="">
                                                                    </div>
                                                                    <div class="col ms-2">
                                                                        <span>Amal Tadrib </span>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <a href="#" class="text-muted delete" id="{{ $mat->id }}">
                                                                            <img src="{{ asset('assets/icons8-delete-64.png') }}" height="32" width="32">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="d-flex justify-content-center">
                                                <h2> no materials for the moment</h2>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

                </div>
                <div class="modal-footer bg-success">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade gd-example-modal-lg h-80 " id="deleteMat" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close closeDataModal" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <h1> Are you sure you want to delete it</h1>
                    <button class="btn btn-dark process"> yes</button>
                    <button class="btn btn-dark stop"> no</button>
                </div>
                <div class="modal-footer bg-danger">

                </div>
            </div>
        </div>
    </div>
<style>
    iframe{
        height: 70vh;
    }
</style>
@endsection()

@section('script')
 <script>
     function popup(url)  {
        console.log(url)
         window.open(url, 'new', 'width=800,height=600,scrollbars=no,menubar=no,status=no,toolbar=no');
     }



 document.querySelectorAll('.mat').forEach(el => {
         el.addEventListener('click' , function (e) {
             e.preventDefault()
             console.log(el.getAttribute('data-mat'))
             const src = el.getAttribute('data-mat')
             $('#viewCourse .modal-body').html(`<mat-amal src=${src}></mat-amal>`)
             $('#viewCourse').modal('toggle')
         })
     })
     document.querySelector('.btn-close').addEventListener('click' , function (e) {
         e.preventDefault()
         $('#viewCourse .modal-body').html('')
     })
     document.querySelectorAll('.delete').forEach(e => {
         e.addEventListener('click' , function (evt) {
             evt.preventDefault()
             console.log(e.id)
             document.querySelector('.process').setAttribute('data-mat' , e.id)
             $("#deleteMat").modal('toggle')
         })
     })
     document.querySelector('.stop').addEventListener('click' , function (e) {
         $("#deleteMat").modal('hide')
     })
     const process = document.querySelector('.process')
     function hideModal(){
         $("#deleteMat").modal('hide')
         window.location.href = 'http://'+ window.location.host+'/admin/material'
     }
     process.addEventListener('click' , function (e) {
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                 'X-Requested-With': 'XMLHttpRequest'
             }
         });
         $.ajax({
             type : 'GET' ,
             url : "{{ route('admin.mat.mat') }}",
             data : {id : process.getAttribute('data-mat') },
             contentType: 'JSON' ,
             success: (response) => {
                 console.table(response)
                 $('#deleteMat .modal-body').html('<h2> Successfully deleted </h2>')
                 setTimeout(hideModal , 5000)
             },
             error: function(response){
                 console.log(response)
                 $('#deleteMat .modal-body').html('<h2> Error while deleting </h2>')
             }
         })
     })
 </script>
@endsection
