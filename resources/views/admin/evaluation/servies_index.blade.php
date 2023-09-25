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
                                <h1 class="mb-1 h2 fw-bold"><img style="height: 45px;margin-right: 6px;" src="http://localhost:8000/assets/images/package.svg">Services</h1>
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#">Dashboard</a>
                                        </li>

                                        <li class="breadcrumb-item active" aria-current="page">
                                            Services
                                        </li>
                                    </ol>
                                </nav>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="">
                    <div class="row">
{{--                        @if(Session::has('success'))--}}
{{--                            <div style="border-top: 4px solid;" class="alert alert-success">--}}
{{--                                {{ Session::get('success') }}--}}
{{--                                @php--}}
{{--                                    Session::forget('success');--}}
{{--                                @endphp--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        @if(Session::has('error'))--}}
{{--                            <div style="border-top: 4px solid;" class="alert alert-danger">--}}
{{--                                {{ Session::get('error') }}--}}
{{--                                @php--}}
{{--                                    Session::forget('error');--}}
{{--                                @endphp--}}
{{--                            </div>--}}
{{--                    @endif--}}
                    <!-- basic table -->
                        <div class="col-md-12 col-12 mb-5">
                            <div class="card">

                                <!-- card header  -->
                                <div style="display: flex;justify-content: space-between;" class="card-header border-bottom-0">
                                    <h3 class="mb-1">All  Services</h3>
                                    <a type="button" href="{{ route('admin.services.create') }}" class="btn btn-outline-dark">Add Service</a>
                                </div>


                                <!-- table  -->
                                <div class="card-body pt-2">
                                    <div class="table-responsive">

                                        <table id="dataTableBasic" class="table" style="width:100%">
                                            <thead class="table-light">
                                            <tr>

                                                <th>SL</th>
                                                <th>Service Name</th>

                                                <th>Action</th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($services)
                                                @php($i=1)

                                                @foreach($services as $service)
                                                    <tr>

                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $service->service_name }}</td>

                                                        <td>
                                                            <span class="dropdown dropstart">
                                                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown5" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                              <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                            <span class="dropdown-menu" aria-labelledby="courseDropdown5" style="">
                                                              <span class="dropdown-header">Action</span>
                                                                                      <a class="dropdown-item" href="{{ route('admin.service.edit',$service->id) }}"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
                                                                                      <a class="dropdown-item delete_element" href="#" data-href="{{ route('admin.service.delete',$service->id) }}" data-bs-toggle="modal" data-bs-target="#exampleModal-2"><i class="fe fe-trash dropdown-item-icon"></i>Remove</a>
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
    </div>
    <!-- Modal -->
    <div class="modal fade gd-example-modal-xl" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Confirmation of deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to delete this item?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">Close</button>
                    <a type="button" class="btn btn-outline-danger btn-sm btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <!--add note -->
    <div class="modal fade gd-example-modal-xl" id="addnote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div style="display: contents">
                        <img style="height: 45px;margin-right: 6px;" src="{{ asset('assets/images/package.svg') }}">
                        <h1 class="mb-1 h2 fw-bold">Monitorings</h1>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.monitoring.add_note_finale') }}" method="post" class="row">
                    @csrf

                    <div class="modal-body">

                        <input class="form-control last_note" name="id" value="" hidden />
                        <!-- First name -->
                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label" for="student">Note</label>
                            <input class="form-control form-control-sm" type="text" name="note" />


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">Close</button>

                        <input class="btn btn-outline-warning btn-sm" type="submit" value="Add Note"  />
                    </div>
                </form>
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

            //ADD NOTE
            $('.add_note').on('click',function (event){
                event.preventDefault();
                var id = $(this).attr("data-id");
                $('#addnote .last_note').val(id);

            });
        });
    </script>

@endsection
