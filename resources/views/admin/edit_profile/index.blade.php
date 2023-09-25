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
                @if(Session::has('success'))
                    <div style="border-top: 4px solid;" class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif
                <div class="row">





                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-4 mb-4 d-md-flex justify-content-between align-items-center">
                            <div class="mb-3 mb-md-0">
                                <h1 class="mb-0 h2 fw-bold">Edit Profile</h1>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Profile Details</h3>
                                <p class="mb-0">
                                    You have full control to manage your own account setting.
                                </p>
                            </div>
                            <!-- Card body -->
                            <form action="{{ route('edit.profile.change') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="d-lg-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center mb-4 mb-lg-0">
                                            <img src="{{ asset('assets/'.$admins->avatar.'') }}" id="img-uploaded" class="avatar-xl rounded-circle" alt="">
                                            <div class="ms-3">
                                                <h4 class="mb-0">Your avatar</h4>
                                                <p class="mb-0">
                                                    PNG or JPG no bigger than 800px wide and tall.
                                                </p>
                                            </div>
                                        </div>
                                        <div>
                                            <input type="file" name="image" class="form-control" placeholder="image">
                                        </div>
                                    </div>
                                    <hr class="my-5">
                                    <div>
                                        <h4 class="mb-0">Personal Details</h4>
                                        <p class="mb-4">
                                            Edit your personal information and address.
                                        </p>
                                        <!-- Form -->
                                        <div class="row">
                                            <!-- First name -->
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="fname">Full Name</label>
                                                <input type="text" id="fname" class="form-control" value="{{ $admins->name }}" name="full_name" placeholder="First Name" required="">
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="fname">Email</label>
                                                <input type="text" id="fname" class="form-control" value="{{ $admins->email }}" name="email" placeholder="First Name" required="">
                                            </div>

                                            <!-- Last name -->

                                            <!-- Phone -->


                                            <!-- Address -->

                                            <!-- Country -->

                                            <div class="col-12">
                                                <!-- Button -->
                                                <button class="btn btn-primary" type="submit">
                                                    Update Profile
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>



                        </div>
                        <div class="card mt-10">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Update Password</h3>
                                <p class="mb-0">
                                    You have full control to manage your own account setting.
                                </p>
                            </div>
                            <!-- Card body -->

                            <div class="card-body">




                                    <!-- Form -->
                                    <form action="{{ route('edit.profile.password') }}" method="post" class="row">
                                        @csrf
                                        <!-- First name -->
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="fname">Password</label>
                                            <input type="password" class="form-control" value="" placeholder="Password" name="password" required="">
                                        </div>


                                        <div class="col-12">
                                            <!-- Button -->
                                            <button class="btn btn-primary" type="submit">
                                                Update Password
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

@endsection()

@section('script')

@endsection
