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
                        @if(Session::has('success'))
                            <div style="border-top: 4px solid;" class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div style="border-top: 4px solid;" class="alert alert-danger">
                                {{ Session::get('error') }}
                                @php
                                    Session::forget('error');
                                @endphp
                            </div>
                    @endif
                    <!-- Page Header -->
                        <div class="border-bottom pb-4 mb-4 d-flex justify-content-between align-items-center">
                            <div class="mb-2 mb-lg-0">
                                <h1 class="mb-1 h2 fw-bold">
                                    <img style="height: 45px;margin-right: 6px;" src="{{ asset('assets/images/student_list.svg') }}" /> Students
                                    <span class="fs-5 text-muted">(3)</span>
                                </h1>
                                <!-- Breadcrumb  -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href=".#">Dashboard</a>
                                        </li>

                                        <li class="breadcrumb-item active" aria-current="page">
                                            Students
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="nav btn-group" role="tablist">
                                <button class="btn btn-outline-white active" data-bs-toggle="tab" data-bs-target="#tabPaneGrid" role="tab" aria-controls="tabPaneGrid" aria-selected="true">
                                    <span class="fe fe-grid"></span>
                                </button>
                                <button class="btn btn-outline-white" data-bs-toggle="tab" data-bs-target="#tabPaneList" role="tab" aria-controls="tabPaneList" aria-selected="false">
                                    <span class="fe fe-list"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Tab -->
                        <div class="tab-content">
                            <!-- Tab Pane -->
                            <div class="tab-pane fade show active" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
                                <div class="mb-4">
                                    <input type="search" class="form-control search" placeholder="Search Students" />
                                </div>
                                <div class="row chiefsPlace">

                                    @isset($students)
                                        @foreach($students as $student)
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                                <!-- Card -->
                                                <div class="card mb-4">
                                                    <!-- Card Body -->
                                                    <div class="card-body">

                                                       <span class="dropdown dropstart">

                                                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown5"
                                                               data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                                                              <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                            <span class="dropdown-menu" aria-labelledby="courseDropdown5">
                                                              <span class="dropdown-header">Action</span>
                                                                <a class="dropdown-item" href="{{ route('admin.pre_registration.edit',$student->id) }}"><i
                                                                        class="fe fe-edit dropdown-item-icon"></i>Edit</a>
                                                                <a class="dropdown-item delete_element" href="#" data-href="{{ route('admin.chiefs.delete',$student->id) }}" data-bs-toggle="modal" data-bs-target="#exampleModal-2"><i class="fe fe-trash dropdown-item-icon"></i>Remove</a>

                                                                <span class="dropdown-header">Status</span>


                                                                @if($student->status == 'is_active')
                                                                    <a class="dropdown-item" href="{{ route('admin.student.inactive',$student->id) }}"><span style="margin-right: 10px;width: 12px;height: 12px;" class="badge-dot bg-danger mr-2"></span>Make As Inactive</a>
                                                                @elseif($student->status == 'is_inactive')
                                                                    <a class="dropdown-item" href="{{ route('admin.student.active',$student->id) }}"><span style="margin-right: 10px;width: 12px;height: 12px;" class="badge-dot bg-success mr-2"></span>Make As Active</a>
                                                                @elseif($student->status == 'graduate')
                                                                    <a class="dropdown-item" href="{{ route('admin.student.active',$student->id) }}"><span style="margin-right: 10px;width: 12px;height: 12px;" class="badge-dot bg-success mr-2"></span>Make As Active</a>
                                                                    <a class="dropdown-item" href="{{ route('admin.student.inactive',$student->id) }}"><span style="margin-right: 10px;width: 12px;height: 12px;" class="badge-dot bg-danger mr-2"></span>Make As Inactive</a>
                                                                @endif






                                                                                    </span>
                                                        </span>
                                                        <div class="text-center">
                                                            <div class="position-relative d-flex justify-content-center">
                                                                <img src="{{ asset('assets/student/'.$student->avatar.'') }}" class="rounded-circle avatar-xl mb-3" alt="" />
                                                                <a href="#" class="position-absolute mt-10 ms-n5">
                                                                    <span class="status bg-secondary"></span>
                                                                </a>
                                                            </div>
                                                            <h4 class="mb-0">{{ $student->first_name }} {{ $student->last_name }}</h4>
                                                            <p class="mb-0">
                                                                <i class="fe fe-map-pin me-1 fs-6"></i>{{ $student->address }}
                                                            </p>
                                                        </div>
                                                        <div class="d-flex justify-content-between border-bottom py-2 mt-6">
                                                            <span>Group</span>
                                                            <span class="text-dark">
                                                                @if($student->groups == '1')
                                                                    GUILIZ
                                                                @else
                                                                    TARGA
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="d-flex justify-content-between border-bottom py-2">
                                                            <span>Joined</span>
                                                            <span>{{ $student->created_at }}</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between border-bottom py-2 pt-2">
                                                            <span>Courses</span>
                                                            <span class="text-dark"> {{ $student->nbr_of_enrolled_course }} </span>
                                                        </div>
                                                        <div class="d-flex justify-content-between pt-2">
                                                            <span>Status</span>
                                                            <span class="text-dark">
                                                                @if($student->status == 'is_active')
                                                                    <span class="badge-dot bg-success me-1 d-inline-block align-middle"></span>
                                                                    Active
                                                                    </span>
                                                            @elseif($student->status == 'is_inactive')
                                                                <span class="badge-dot bg-danger me-1 d-inline-block align-middle"></span>
                                                                Inactive
                                                                </span>
                                                            @elseif($student->status == 'graduate')
                                                                <span class="badge-dot bg-warning me-1 d-inline-block align-middle"></span>
                                                                Graduate
                                                                </span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endisset






                                </div>
                                <div class="d-flex flex-wrap justify-content-center  chiefsPlace2" >
                                    <lottie-player id="search" class='tato2'src="{{ asset('assets/lotties/49993-search.json') }}" mode="bounce" background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                                </div>
                                <div class="d-flex flex-wrap justify-content-center" >
                                    <lottie-player id='notfound' class='chiefsPlace3' src="{{ asset('assets/lotties/64076-404-not-found-page.json') }}" mode="bounce" background="transparent"  speed="1"  style="width: 500px; height: 500px;"  loop  autoplay></lottie-player>
                                </div>
                                <div class="row resultHolder" >
                                </div>
                                <!-- Tab Pane -->
                                <div class="tab-pane fade" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
                                    <!-- Card -->
                                    <div class="card">
                                        <!-- Card Header -->
                                        <div class="card-header">
                                            <input type="search" class="form-control" placeholder="Search Students" />
                                        </div>
                                        <!-- Table -->
                                        <div class="table-responsive">
                                            <table class="table mb-0 text-nowrap">
                                                <thead class="table-light">
                                                <tr>
                                                    <th scope="col" class="border-0"> Student Name</th>
                                                    <th scope="col" class="border-0"> Group</th>
                                                    <th scope="col" class="border-0">Enrolled</th>
                                                    <th scope="col" class="border-0">Joined</th>

                                                    <th scope="col" class="border-0">Address</th>


                                                </tr>
                                                </thead>
                                                <tbody>
                                                @isset($students)
                                                    @foreach($students as $student)
                                                        <tr>
                                                            <td class="align-middle">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="position-relative">
                                                                        <img src="{{ asset('assets/student/'.$student->avatar.'') }}" alt="" class="rounded-circle avatar-md me-2" />
                                                                        <a href="#" class="position-absolute mt-5 ms-n4">
                                                                            <span class="status bg-success"></span>
                                                                        </a>
                                                                    </div>
                                                                    <h5 class="mb-0">{{ $student->first_name }} {{ $student->last_name }}</h5>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle">
                                                                {{ $student->groups }}
                                                            </td>
                                                            <td class="align-middle">{{ $student->nbr_of_enrolled_course }}</td>
                                                            <td class="align-middle">{{ $student->created_at }}</td>
                                                            <td class="align-middle">{{ $student->address }}</td>


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
                function numberOfchiefs() {
                    let arr = []
                    for (const arrKey in @json(\App\Models\admin\User::all()) ) {
                        arr.push(arrKey)
                    }
                    return arr.length
                }
                const cheifsLength =  numberOfchiefs()
                function search() {
                    document.querySelector('.search').addEventListener('change' , function (evt) {
                        evt.preventDefault()
                        console.log(evt.target.value)
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        });
                        $.ajax({
                            type : 'GET' ,
                            url : "{{ route('admin.student.search') }}",
                            data : {'name' : evt.target.value} ,
                            contentType: 'application/json' ,
                            success: (response) => {
                                console.table('it works ')
                                console.log(response.data.length)
                                console.table(response.data)
                                if(response.data.length === 0 ){
                                    console.log('opps zero')
                                    $('#search').hide()
                                    $('#notfound').show()
                                }else if (response.data.length === cheifsLength){
                                    $('#notfound').hide()
                                    $('.tato2').hide()
                                    $('.chiefsPlace').show()
                                }else {
                                    for (const chief of response.data) {
                                        let cheifcard = `<div class="col-xl-3 col-lg-6 col-md-6 col-12">
        <div class="card mb-4">
        <div class="card-body">
        <div class="text-center">
        <div class="position-relative d-flex justify-content-center">
        <img src="http://localhost:8000/assets/student/${chief.avatar}" class="rounded-circle avatar-xl mb-3" alt="" />
        <a href="#" class="position-absolute mt-10 ms-n5">
        <span class="status bg-secondary"></span>
        </a>
        </div>
        <h4 class="mb-0">${chief.first_name}  ${ chief.last_name }</h4>
        <p class="mb-0">
        <i class="fe fe-map-pin me-1 fs-6"></i> ${ chief.family_situation }
                                </p>
                                </div>
                                <div class="d-flex justify-content-between border-bottom py-2 mt-6">
                                <span>Situation familial</span>
                                <span class="text-dark">
                                ${chief.nbr_child}
                                </span>
                                </div>
                                <div class="d-flex justify-content-between border-bottom py-2">
                                                 <span>${ chief.age }</span>
        </div>
        <div class="d-flex justify-content-between pt-2">
        <span>Score</span>
        <span class="text-dark"> ${ chief.total_score } </span>
        </div>
        </div>
        </div>
        </div>`
                                        $('#notfound').hide()
                                        $('.tato2').hide()
                                        $('.resultHolder').append(cheifcard)
                                    }
                                }
                            },
                            error: function(response){
                                console.log('heostin we have a problem')
                            }
                        })
                    })
                }
                function change() {
                    document.querySelector('.search').addEventListener('input' , function (evt) {
                        evt.preventDefault()
                        if (evt.target.value === '' || evt.target.value == null){
                            console.log('nothing there boby')
                            $('#notfound').hide()
                            $('.tato2').hide()
                            $('.resultHolder').children().hide()
                            $('.chiefsPlace').show()
                        }else {
                            console.log(evt.target.value)
                            $('#notfound').hide()
                            $('.resultHolder').children().hide()
                            $('.chiefsPlace').slideUp()
                            $('.tato2').show()
                        }
                    })
                }
                $('.tato2').hide()
                $('.chiefsPlace3').hide()
                search()
                change()
            </script>
@endsection
