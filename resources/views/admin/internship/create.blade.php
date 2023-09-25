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
                                    <img style="height: 45px;margin-right: 5px;" src="{{ asset('assets/images/handshake.svg') }}">Add InternShip
                                    <span class="fs-5 text-muted">(3)</span>
                                </h1>
                                <!-- Breadcrumb  -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href=".#">Dashboard</a>
                                        </li>

                                        <li class="breadcrumb-item active" aria-current="page">
                                            chefs
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
                                <h3 class="mb-0">InternShip Details</h3>

                            </div>
                            <!-- Card body -->
                            <div class="card-body">

                                <div>

                                    <!-- Form -->
                                    <form id="theForm" action="{{ route('admin.interships.store') }}" method="post" class="row">
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
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="fname">Title</label>
                                            <input type="text" id="fname" class="form-control form-control-sm" name="title" placeholder="Title" >
                                            @if ($errors->has('title'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                        <!-- Last name -->
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="lname">Interships Provided</label>
                                            <input type="text" id="lname" class="form-control form-control-sm" name="location" placeholder="Interships Provided" >
                                            @if ($errors->has('location'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('location') }}</span>
                                            @endif
                                        </div>
                                        <!-- Phone -->

                                        <!-- Birthday -->
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="birth">Start Internship</label>
                                            <input class="form-control form-control-sm flatpickr flatpickr-input" type="text" placeholder="Start Internship" id="birth" name="start" readonly="readonly">
                                            @if ($errors->has('start'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('start') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="birth">End Internship</label>
                                            <input class="form-control form-control-sm flatpickr flatpickr-input" type="text" placeholder="End Internship" id="birth" name="end" readonly="readonly">
                                            @if ($errors->has('end'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('end') }}</span>
                                            @endif
                                        </div>







                                        <!-- State -->

                                        <!-- Country -->
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="lname">Supervisor</label>
                                            <input type="text" id="lname" class="form-control form-control-sm" placeholder="Supervisor" name="supervisor" >
                                            @if ($errors->has('supervisor'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('supervisor') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="supervisor_email">Supervisor Email</label>
                                            <input type="text" id="supervisor_email" class="form-control form-control-sm" placeholder="supervisor email" name="supervisor_email" >
                                            @if ($errors->has('supervisor_email'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('supervisor_email') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="supervisor_email">Supervisor Phone</label>
                                            <input type="text" id="supervisor_phone" class="form-control form-control-sm" placeholder="supervisor phone" name="supervisor_phone" >
                                            @if ($errors->has('supervisor_phone'))
                                                <span style="font-weight: bold;" class="text-danger">{{ $errors->first('supervisor_phone') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-12 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Objectifs</label>
                                                <div style="height: 99px !important;" id="editor">

                                                </div>
                                                <textarea class="form-control" name="editor" cols="10" hidden></textarea>

                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">GuidLine</label>
                                                <textarea class="form-control form-control-sm" name="guidline" cols="10"></textarea>

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <!-- Button -->
                                            <button class="btn btn-primary" type="submit">
                                                Add InternShip
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
    window.onload = function() {
        var editor = document.getElementById('editor')
   // let holder ;
   //      editor.addEventListener('text-change', function (event){
   //          event.preventDefault();
   //          console.log( event.target.value );
   //          holder = event.target.value;
   //          console.log(holder);
   //
   //      });
        document.getElementById('theForm').onsubmit = function() {
            var editor = $("#editor").html();
        console.log( editor );
      //     var textarea = document.getElementsByName('editor');

            var quill = new Quill('#editor', {
                theme: 'snow'
            });
            var editor_content = quill.root.innerHTML
            console.log('************')
            console.log(editor_content)
            $('[name="editor"]').text(editor_content)
            return true;
        };
    };
</script>
@endsection
