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
                                <h1 class="mb-1 h2 fw-bold"><img style="height: 45px;margin-right: 6px;" src="http://localhost:8000/assets/images/handshake.svg">Jobs  Portal</h1>
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#">Dashboard</a>
                                        </li>

                                        <li class="breadcrumb-item active" aria-current="page">
                                            Jobs
                                        </li>
                                    </ol>
                                </nav>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="">
                    <div class="row">
                        @if(Session::has('success'))
                            <div style="border-top: 4px solid;" class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                    @endif
                        <!-- basic table -->
                        <div class="col-md-12 col-12 mb-5">
                            <div class="card">
                                <!-- card header  -->
                                <div class="card-header border-bottom-0">
                                    <h3 class="mb-1">All  JObs</h4>
                                </div>

                                <!-- table  -->
                                <div class="card-body pt-2">
                                    <table id="dataTableBasic" class="table" style="width:100%">
                                        <thead class="table-light">
                                        <tr>

                                            <th>Student Name</th>
                                            <th>Title</th>
                                            <th>Location</th>
                                            <th>Contrat type</th>
                                            <th>Duration</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @isset($jobs)
                                            @php($i=1)

                                            @foreach($jobs as $job)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="position-relative">
                                                                <img src="{{ asset('assets/student/'. $job->users->avatar .'') }}" alt="" class="rounded-circle avatar-md me-2">
                                                                <a href="#" class="position-absolute mt-5 ms-n4">
                                                                    <span class="status bg-success"></span>
                                                                </a>
                                                            </div>
                                                            <h5 class="mb-0">{{ $job->users->first_name }} {{ $job->users->last_name }}</h5>
                                                        </div>
                                                    </td>
                                                    <td>{{ $job->title }}</td>
                                                    <td>{{ $job->location }}</td>
                                                    <td>
                                                        @if($job->contrat_type == 1)
                                                            <strong>Contrat CDI</strong>
                                                        @elseif($job->contrat_type == 2)
                                                            <strong>Contrat CDD</strong>
                                                        @elseif($job->contrat_type == 3)
                                                            <strong>Contrat ANAPEC</strong>
                                                        @elseif($job->contrat_type == 4)
                                                            <strong>Pas De Contract</strong>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($job->contrat_type == 1)
                                                            <strong>Start</strong> {{ $job->start_cdi }}
                                                        @elseif($job->contrat_type==2)
                                                            <strong>Start</strong> {{ $job->start_cdd }} <br/> <strong>To</strong><br/> {{ $job->end_cdd }}
                                                        @elseif($job->contrat_type == 3)
                                                            <strong>Start</strong> {{ $job->start_anapec }} <br/> <strong>To</strong><br/> {{ $job->end_anapec }}
                                                        @elseif($job->contrat_type == 4)
                                                            <strong>Start</strong> {{ $job->job_contract_pas }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span class="dropdown dropstart">
                                                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown5" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                              <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                            <span class="dropdown-menu" aria-labelledby="courseDropdown5" style="">
                                                              <span class="dropdown-header">Action</span>
                                                                                    <a class="dropdown-item" href="{{ route('admin.jobs_portal.edit',$job->id) }}"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
                                                                                    <a class="dropdown-item delete_element" href="#" data-href="{{ route('admin.jobs_portal.delete',$job->id) }}" data-bs-toggle="modal" data-bs-target="#exampleModal-2"><i class="fe fe-trash dropdown-item-icon"></i>Remove</a>
                                                                                    </span>
                                                        </span>
                                                    </td>
                                                </tr>

                                            @endforeach
                                        @endisset




                                        </tbody>

                                    </table>
                                </div>
                            </div>

                        </div>





                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade gd-example-modal-xl" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Confirmation of deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1>Are you sure you want to delete this item?</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">Close</button>
                    <a type="button" class="btn btn-outline-danger btn-sm btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection()

@section('script')
    <script>
        $(document).ready(function (){
            $('.delete_element').on('click',function (event){
                event.preventDefault();
                var href = $(this).attr('data-href');
                console.log( href )
                $('.modal-content').find('.btn-ok').attr('href', href);
            });
        });
    </script>
@endsection
