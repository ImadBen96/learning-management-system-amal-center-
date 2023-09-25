
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
                        <!-- Page Header -->
                        <div class="border-bottom pb-4 mb-4 d-flex justify-content-between align-items-center">
                            <div class="mb-2 mb-lg-0">
                                <h1 class="mb-1 h2 fw-bold">
                                    <img style="height: 45px;margin-right: 6px;" src="{{ asset('assets/images/package.svg') }}" />Services
                                    <span class="fs-5 text-muted">(3)</span>
                                </h1>
                                <!-- Breadcrumb  -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href=".#">Dashboard</a>
                                        </li>

                                        <li class="breadcrumb-item active" aria-current="page">
                                            Services
                                        </li>
                                    </ol>
                                </nav>
                            </div>

                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div  style="border-top: 4px solid #18113c;" class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Services Details</h3>
                                <p class="mb-0">
                                    You have full control to manage your own account setting.
                                </p>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">


                                <div>

                                    <!--    <h4 class="mb-0">Personal Details</h4>
                                    <p class="mb-4">
                                        Edit your personal information and address.
                                    </p> Form -->
                                    <form action="{{ route('admin.service.store') }}" method="post" class="row">
                                    @csrf
                                    <!-- First name -->

                                        <!-- Last name -->

                                        <!-- Phone -->


                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="fname">Service Name</label>
                                            <input type="text" id="fname" class="form-control form-control-sm" name="service_name" value="" placeholder="Service Name" required />
                                        </div>








                                        <!-- State -->



                                        <div class="col-12">
                                            <!-- Button -->
                                            <button class="btn btn-primary" type="submit">
                                                Add Service
                                            </button>
                                        </div>
                                    </form>
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

@endsection()

@section('script')
    <script src=" {{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

@endsection
