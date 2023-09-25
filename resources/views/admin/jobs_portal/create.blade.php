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
                                    <img style="height: 45px;margin-right: 6px;" src="http://localhost:8000/assets/images/suitcase.svg">Add Job Portal
                                    <span class="fs-5 text-muted">(3)</span>
                                </h1>
                                <!-- Breadcrumb  -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href=".#">Dashboard</a>
                                        </li>

                                        <li class="breadcrumb-item active" aria-current="page">
                                            Jobs Portal
                                        </li>
                                    </ol>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Jobs Portals Details</h3>

                            </div>
                            <!-- Card body -->
                            <div class="card-body">

                                <div>

                                    <!-- Form -->
                                    <form id="theForm" action="{{ route('admin.jobs_portal.store') }}" method="POST" class="row">
                                        <!-- First name -->
                                        @csrf
                                        <div class="mb-3 col-12 col-md-12">
                                            <label class="form-label" for="student">Intern's Name </label>

                                            <select id="student" name="student_id" class="form-control form-control-sm" required="">
                                                <option value="">Select Intern's Name</option>
                                                @isset($users)

                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                                    @endforeach
                                                @endisset

                                            </select>
                                            @if ($errors->has('student_id'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('student_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="fname">Title</label>
                                            <input type="text" id="fname" class="form-control form-control-sm" name="title" placeholder="Title" required >
                                            @if ($errors->has('title'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>

                                        <!-- Last name -->
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="salery">Salary</label>
                                            <input type="text" id="salery" class="form-control form-control-sm" name="salery" placeholder="salery" required="">
                                            @if ($errors->has('salery'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('salery') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="job_position">Job Position</label>
                                            <input type="text" id="job_position" class="form-control form-control-sm" name="job_position" placeholder="Job Position" required="">
                                            @if ($errors->has('job_position'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('job_position') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="lname">JOb Location</label>
                                            <input type="text" id="lname" class="form-control form-control-sm" name="location" placeholder="Provided By" required="">
                                            @if ($errors->has('location'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('location') }}</span>
                                            @endif
                                        </div>
                                        <!-- Phone -->
                                        <!-- State -->

                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="lname">Supervisor</label>
                                            <input type="text" id="lname" class="form-control form-control-sm" name="supervisor" placeholder="Supervisor" required="">
                                            @if ($errors->has('supervisor'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('supervisor') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="super_visor_email">Supervisor Email</label>
                                            <input type="email" id="super_visor_email" class="form-control form-control-sm" name="super_visor_email" placeholder="Supervisor email" required="">
                                            @if ($errors->has('super_visor_email'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('super_visor_email') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="super_visor_phone">Supervisor Phone</label>
                                            <input type="text" id="super_visor_phone" class="form-control form-control-sm" name="super_visor_phone" placeholder="Supervisor phone" required="">
                                            @if ($errors->has('super_visor_phone'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('super_visor_phone') }}</span>
                                            @endif
                                        </div>

                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label">Work Schedules</label>
                                            <div style="display: flex;justify-content: space-between">
                                                <strong style="position: relative;top: 7px;">From</strong>
                                                <input style="width: 42%;" class="form-control form-control-sm" name="from" />

                                                <strong style="position: relative;top: 7px;">To</strong>

                                                <input style="width: 37%;" class="form-control form-control-sm" name="to" />
                                            </div>




                                            @if ($errors->has('job_date'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('job_date') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label">Contrat Type</label>
                                            <select class="selectpicker contrat_type" name="contrat_type" data-width="100%">
                                                <option value="" selected disabled>Contrat Type</option>
                                                <option value="1">CDI</option>
                                                <option value="2">CDD</option>
                                                <option value="3">Contrat Anapec</option>
                                                <option value="4">Pas De Contrat</option>
                                            </select>
                                            @if ($errors->has('contrat_type'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('contrat_type') }}</span>
                                            @endif
                                        </div>
                                        <div style="display: none" id="contract_cdi" class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="start_cdi">Start Jobs</label>
                                            <input type="text" id="start_cdi" class="form-control form-control-sm flatpickr flatpickr-input active input" name="start_cdi" value="" placeholder="Start Jobs" required="" readonly="readonly">
                                        </div>

                                        <!-- Country -->

                                            <div style="display: none;" class="mb-3 col-12 col-md-6 contract_cdd">
                                                <label class="form-label" for="start_cdd">Start Jobs</label>
                                                <input type="text" id="start_cdd" class="form-control form-control-sm flatpickr flatpickr-input active input" name="start_cdd" value="" placeholder="Start Jobs" required="" readonly="readonly">
                                            </div>
                                            <div style="display: none;"  class="mb-3 col-12 col-md-6 contract_cdd">
                                                <label class="form-label" for="end_cdd">End Jobs</label>
                                                <input type="text" id="end_cdd" class="form-control form-control-sm flatpickr flatpickr-input active input" name="end_cdd" value="" placeholder="Start Jobs" required="" readonly="readonly">
                                            </div>

                                        <div style="display: none;" class="mb-3 col-12 col-md-6 contract_anapec">
                                            <label class="form-label" for="start_anapec">Start Jobs</label>
                                            <input type="text" id="start_anapec" class="form-control form-control-sm flatpickr flatpickr-input active input" name="start_anapec" value="" placeholder="Start Jobs" required="" readonly="readonly">
                                        </div>
                                        <div style="display: none;"  class="mb-3 col-12 col-md-6 contract_anapec">
                                            <label class="form-label" for="end_anapec">End Jobs</label>
                                            <input type="text" id="end_anapec" class="form-control form-control-sm flatpickr flatpickr-input active input" name="end_anapec" value="" placeholder="Start Jobs" required="" readonly="readonly">
                                        </div>
                                        <!-- pas de contrat -->

                                        <div style="display: none;" class="mb-3 col-12 col-md-6 contract_pas">
                                            <label class="form-label" for="contract_pas">Start Jobs</label>
                                            <input type="text" id="contract_pas" class="form-control form-control-sm flatpickr flatpickr-input active input" name="contract_pas" value="" placeholder="Start Jobs" required="" readonly="readonly">
                                        </div>

                                        <div class="mb-3 col-12 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Jobs Description</label>
                                                <div style="height: 99px !important;" id="editor">

                                                </div>
                                                <textarea class="form-control" name="editor" hidden></textarea>

                                            </div>
                                        </div>




                                        <div class="col-12">
                                            <!-- Button -->
                                            <button class="btn btn-primary" type="submit">
                                                Add Job Portal
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
<script>
    $(document).ready(function (){

        $('.contrat_type').on('change',function (){
            // console.log( this.value );
            var contrat_type = this.value;
            if(contrat_type == 0){
                $('#contract_cdi').css('display','none');
                $('.contract_cdd').css('display','none');
                $('.contract_anapec').css('display','none');
                $('.contract_pas').css('display','none');
            }

             if (contrat_type == 1){
                $('#contract_cdi').css('display','block');
                $('.contract_cdd').css('display','none');
                $('.contract_anapec').css('display','none');
                $('.contract_pas').css('display','none');
                const start_cdd = document.querySelector("#start_cdd")._flatpickr;
                start_cdd.clear();
                const end_cdd = document.querySelector("#end_cdd")._flatpickr;
                end_cdd.clear();

                const start_anapec = document.querySelector("#start_anapec")._flatpickr;
                start_anapec.clear();
                const end_anapec = document.querySelector("#end_anapec")._flatpickr;
                end_anapec.clear();
                const pas_contrat = document.querySelector("#contract_pas")._flatpickr;
                pas_contrat.clear();
            }else if(contrat_type == 2){
                $('#contract_cdi').css('display','none');
                $('.contract_anapec').css('display','none');
                $('.contract_pas').css('display','none');
                $('.contract_cdd').css('display','block');
                const start_cdi = document.querySelector("#start_cdi")._flatpickr;
                start_cdi.clear();

                const start_anapec = document.querySelector("#start_anapec")._flatpickr;
                start_anapec.clear();
                const end_anapec = document.querySelector("#end_anapec")._flatpickr;
                end_anapec.clear();

                const pas_contrat = document.querySelector("#contract_pas")._flatpickr;
                pas_contrat.clear();


            }else if(contrat_type == 3){
                $('#contract_cdi').css('display','none');
                $('.contract_cdd').css('display','none');
                $('.contract_pas').css('display','none');
                $('.contract_anapec').css('display','block');
                const start_cdi = document.querySelector("#start_cdi")._flatpickr;
                start_cdi.clear();

                const start_cdd = document.querySelector("#start_cdd")._flatpickr;
                start_cdd.clear();
                const end_cdd = document.querySelector("#end_cdd")._flatpickr;
                end_cdd.clear();
                const pas_contrat = document.querySelector("#contract_pas")._flatpickr;
                pas_contrat.clear();
            }else if(contrat_type == 4){
                $('#contract_cdi').css('display','none');
                $('.contract_cdd').css('display','none');
                $('.contract_anapec').css('display','none');

                $('.contract_pas').css('display','block');

                const start_cdi = document.querySelector("#start_cdi")._flatpickr;
                start_cdi.clear();

                const start_cdd = document.querySelector("#start_cdd")._flatpickr;
                start_cdd.clear();
                const end_cdd = document.querySelector("#end_cdd")._flatpickr;
                end_cdd.clear();

                const start_anapec = document.querySelector("#start_anapec")._flatpickr;
                start_anapec.clear();
                const end_anapec = document.querySelector("#end_anapec")._flatpickr;
                end_anapec.clear();

            }
        });

        document.getElementById('theForm').onsubmit = function() {

            var editor = $("#editor").text();
            console.log( editor );
            //     var textarea = document.getElementsByName('editor');
            $('[name="editor"]').val(editor)
            return true;
        };


    });

</script>
@endsection
