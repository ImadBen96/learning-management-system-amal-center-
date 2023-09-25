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
                                    <img style="height: 45px;margin-right: 6px;" src="{{ asset('assets/images/package.svg') }}" />Monitoring
                                    <span class="fs-5 text-muted">(3)</span>
                                </h1>
                                <!-- Breadcrumb  -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href=".#">Dashboard</a>
                                        </li>

                                        <li class="breadcrumb-item active" aria-current="page">
                                            Monitorings
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
                                <h3 class="mb-0">Monitoring Details</h3>
                                <p class="mb-0">
                                    You have full control to manage your own account setting.
                                </p>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                            <!--      <div class="d-lg-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center mb-4 mb-lg-0">
                                        <img src="{{ asset('assets/images/avatar/avatar-3.jpg') }}" id="img-uploaded" class="avatar-xl rounded-circle" alt="">
                                        <div class="ms-3">
                                            <h4 class="mb-0">Your avatar</h4>
                                            <p class="mb-0">
                                                PNG or JPG no bigger than 800px wide and tall.
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-outline-white btn-sm">Update</a>
                                        <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                    </div>
                                </div>

<hr class="my-5"> -->
                                <div>

                                    <!--    <h4 class="mb-0">Personal Details</h4>
                                    <p class="mb-4">
                                        Edit your personal information and address.
                                    </p> Form -->
                                    <form action="{{ route('admin.monitoring.store') }}" method="post" class="row">
                                    @csrf
                                    <!-- First name -->
                                        <div class="mb-3 col-12 col-md-12">
                                            <label class="form-label" for="student">Intern's Name </label>

                                            <select id="student" name="student_id" class="form-control form-control-sm" required>
                                                <option value="">Intern's Name</option>
                                                @isset($users)
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{$user->first_name}} {{$user->last_name}}</option>
                                                    @endforeach
                                                @endisset()


                                            </select>
                                        </div>
                                        <!-- Last name -->

                                        <!-- Phone -->


                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="fname">Service </label>
                                            <select id="service" name="service" class="form-control form-control-sm" required>

                                                  @if( \App\Models\admin\Service::all()->count() > 0)
                                                        @foreach( \App\Models\admin\Service::all() as $service)
                                                            <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                                        @endforeach
                                                    @else
                                                        <option value="1000">No service please set one</option>
                                                      @endif


                                            </select>                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="Supervisor">Supervisor </label>
                                            <input type="text" id="Supervisor" class="form-control form-control-sm" name="Supervisor" value="" placeholder="Supervisor" required />
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="supervisor_email">Supervisor Email </label>
                                            <input type="text" id="supervisor_email" class="form-control form-control-sm" name="supervisor_email" value="" placeholder="supervisor email" required />
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="supervisor_phone">Supervisor Phone </label>
                                            <input type="text" id="supervisor_phone" class="form-control form-control-sm" name="supervisor_phone" value="" placeholder="supervisor phone" required />
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="start">Start Rotation </label>
                                            <input type="text" id="start" class="form-control form-control-sm flatpickr flatpickr-input active input" name="start" value="" placeholder="Start Rotation" required />
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="end">End Rotation </label>
                                            <input type="text" id="end" class="form-control form-control-sm flatpickr flatpickr-input active input" name="end" value="" placeholder="End Rotation" required />
                                        </div>






                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-group">


                                                    <div class="input-group">

                                                        <table id="ProductTable" style="width:100%;">
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="upload-btn">
                                                                        <div class="row">

                                                                        </div>



                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {{--                                                                    <div style="margin-bottom: 20px;text-align: center">--}}
                                                                    {{--                                                                        <input type="button" id="btnAddNew" value="Monitoring" style="font-size: 14px;border-radius:3px;" class="btn btn-outline-dark">--}}
                                                                    {{--                                                                    </div>--}}
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <div id="pwindicator" class="pwindicator">
                                                        <div class="bar"></div>
                                                        <div class="label"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- State -->



                                        <div class="col-12">
                                            <!-- Button -->
                                            <button class="btn btn-primary" type="submit">
                                                Add Monitoring
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
    <script>
        $(document).ready(function () {
            var k=10;

            $("#btnAddNew").click(function () {
                k++;

                var rowNumber = $("#ProductTable tbody tr").length;

                var trNew = "";

                var addLink = "<div class=\"upload-btn" + rowNumber + "\"><h6 style='background: #18113c;color: #FFF;width: 108%;' class='mb-2 display-4  text-center'>Label " +${k}+ "</h6><div class='row'> <div class='mb-3 col-12 col-md-6'><label class='form-label' for='fname'"+${k}+">Label </label> <input type='text' id='fname'"+${k}+" class='form-control form-control-sm' name='label[]' value='' placeholder='Note' required></div><div class='mb-3 col-12 col-md-6'><label class='form-label' for='fname'>Note </label> <input type='text' id='fname' class='form-control form-control-sm' name='note[]' placeholder='Note' required> </div><div class='mb-3 col-12 col-md-6'><label class='form-label' for='birth'>Start of rotation</label><input class='form-control form-control-sm flatpickr flatpickr-input active' type='text' placeholder='Start of rotation' id='birth' name='start[]' readonly='readonly' required /></div><div class='mb-3 col-12 col-md-6'><label class='form-label' for='birth'>End of rotation</label> <input class='form-control form-control-sm flatpickr flatpickr-input' type='text' placeholder='End of rotation' id='birth' name='end[]' readonly='readonly' required /></div> </div></div>";

                var deleteRow = "<a style='position:relative;top: -6px;' href=\"javascript:void()\" class=\"Delete btn btn-danger btn-xs\">X</a>";

                trNew = trNew + "<tr> ";

                trNew += "<td>" + addLink + "</td>";
                trNew += "<td style=\"width:28px;\">" + deleteRow + "</td>";

                trNew = trNew + " </tr>";
                $("#ProductTable tbody").append(trNew);
                document.querySelectorAll('.flatpickr').flatpickr({altInput: true,
                    altFormat: "F j, Y",
                    dateFormat: "Y-m-d",})


            });

            $('#ProductTable').delegate('a.Delete', 'click', function () {
                k--;
                $(this).parent().parent().fadeOut('slow').remove();
                return false;
            });



        });

    </script>
@endsection
