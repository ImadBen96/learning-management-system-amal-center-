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
                                <h1 class="mb-1 h2 fw-bold">All Videos</h1>
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="admin-dashboard.html">Dashboard</a>
                                        </li>

                                        <li class="breadcrumb-item active" aria-current="page">
                                            All Videos
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
                                        <h4 class="mb-3 mb-lg-0">Displaying Videos</h4>
                                    </div>

                                </div>
                            </div>
                            <!-- Button trigger modal -->


                            <!-- Modal -->
                            @if( \App\Models\Video::all()->count() > 0)
                                @foreach( \App\Models\Video::all() as $pod)
                                    <div class="modal fade" id="staticBackdrop{{$pod->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="width: 100%;text-align: end;" class="modal-title arab" id="staticBackdropLabel">{{$pod->videoCourseTitle}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <video  style="width: 100%;height: 500px" controls>

                                                        <source

                                                            src="{{url(str_replace('public','storage',$pod->videoCourceUrl))}}"
                                                        />
                                                    </video>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary arab" data-bs-dismiss="modal">أغلق</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="col-xl-12 col-lg-12 col-md-8 col-12">
                                <div class="tab-content">
                                    <!-- Button trigger modal -->

                                    <!-- Tab pane -->
                                    <div class="tab-pane fade pb-4 active show"  data-toggle="modal" data-target="#tabPaneGrid" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
                                        <div class="row">
                                            @if( \App\Models\Video::all()->count() > 0)
                                                @foreach( \App\Models\Video::all() as $pod)
                                                    <div class="col-lg-4 col-md-6 col-12">
                                                        <!-- Card -->
                                                        <div class="card  mb-4 card-hover ">
                                                            <a href="#" class="card-img-top video" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$pod->id}}" data-video="{{ url($pod->videoCourceUrl) }}" ><img src="{{ asset('assets/podcastThumbnail.png')}}" alt="" class="card-img-top rounded-top-md"></a>
                                                            <!-- Card body -->
                                                            <div class="card-body">
                                                                <h4 class="mb-2 text-truncate-line-2 "><a href="#" class="text-inherit podcastThumb" >{{ $pod->podcastName }}</a>
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
                                                                        <div  class="arab">{{$pod->videoCourseTitle}}</div>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <a href="#" class="text-muted delete" id="{{ $pod->id }}">

                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="d-flex justify-content-center">
                                                    <h2> No Videos for the moment</h2>
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
            </div>
        </div>
    </div>
    <!-- Modal -->




    <style>

        podcast-amal {
            position: fixed;
            top: calc(calc(100vh - 395px) / 2);
            left: calc(calc(100vw - 330px) / 2);
        }
    </style>
@endsection()

@section('script')
    <script>
        document.querySelectorAll('.video').forEach(e => {
            e.addEventListener('click' , function (evt) {
                var currentUrl = $(this).attr('data-video').replace("public", "storage");
                console.log( currentUrl );


                $(".myModal").modal('show');
                $(".myModal").attr('src',currentUrl);



            })
        })
    </script>

@endsection
