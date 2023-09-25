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
            <div class="container-fluid p-4 ">
                <div class="row first">
                    @if(Session::has('success'))
                        <div style="border-top: 4px solid;" class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Page Header -->
                        <div class="border-bottom pb-4 mb-4 d-flex justify-content-between align-items-center">
                            <div class="mb-2 mb-lg-0">
                                <h1 class="mb-1 h2 fw-bold">
                                    <img style="height: 45px;margin-right: 6px;" src="{{ asset('assets/images/online-voting.svg') }}" /> Pre-Registration
                                    <span class="fs-5 text-muted">(3)</span>
                                </h1>
                                <!-- Breadcrumb  -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href=".#">Dashboard</a>
                                        </li>

                                        <li class="breadcrumb-item active" aria-current="page">
                                            Pre-registration
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
                        @if(Session::has('error'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="alert alert-danger bg-danger text-white" role="alert">
                                            <strong>{{Session::get('error')}}</strong>.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4"></div>
                            </div>
                    @endif
                    <!-- Tab -->
                        <div class="tab-content">
                            <!-- Tab Pane -->
                            <div class="tab-pane fade show active" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
                                <div class="mb-4">
                                    <form onsubmit="return false">
                                        <input id="search" type="search" class="form-control" name="search_student" placeholder="Search Students" />
                                    </form>
                                </div>
                                <div class="row second">

                                    @isset($pre_registrations)

                                        @foreach($pre_registrations as $pre_registration)
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                                <!-- Card -->
                                                <div class="card mb-4 ">
                                                    <!-- Card Body -->
                                                    <div class="card-body">
                                                          <span class="dropdown dropstart">
                                                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown5"
                                                               data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                                                              <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                            <span class="dropdown-menu" aria-labelledby="courseDropdown5">
                                                              <span class="dropdown-header">Action</span>
                                                                <a class="dropdown-item" href="{{ route('admin.pre_registration.edit',$pre_registration->id) }}"><i
                                                                        class="fe fe-edit dropdown-item-icon"></i>Edit</a>
                                                                <a class="dropdown-item delete_element" href="#" data-href="{{ route('admin.pre_registration.delete',$pre_registration->id) }}" data-bs-toggle="modal" data-bs-target="#exampleModal-2"><i
                                                                        class="fe fe-trash dropdown-item-icon"></i>Remove</a>
                                                                @if( $pre_registration->status !== 'is_active' )
                                                                    <a class="dropdown-item" href="{{ route('admin.pre_registration.approved',$pre_registration->id) }}"><i
                                                                            class="fe fe-link fs-4 text-primary dropdown-item-icon"></i>Approved</a>
                                                                @endif



                                                                                    </span>
                                                        </span>
                                                        <div class="text-center">
                                                            <div class="position-relative d-flex justify-content-center">
                                                                <img src="{{ asset('assets/student/'.$pre_registration->avatar.'') }}" class="rounded-circle avatar-xl mb-3" alt="" />
                                                                <a href="#" class="position-absolute mt-10 ms-n5">
                                                                    <span class="status bg-secondary"></span>
                                                                </a>
                                                            </div>
                                                            <h4 class="mb-0">{{ $pre_registration->first_name }} {{ $pre_registration->last_name }} </h4>
                                                            <p class="mb-0">
                                                                <i class="fe fe-map-pin me-1 fs-6"></i>{{ $pre_registration->address }}
                                                            </p>
                                                        </div>
                                                        <div class="d-flex justify-content-between border-bottom py-2 mt-6">
                                                            <span>Group</span>
                                                            <span class="text-dark">
                                                                @if( $pre_registration->groups == 1 )
                                                                    GUILIZ
                                                                @elseif( $pre_registration->groups == 2 )
                                                                    TARGA
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="d-flex justify-content-between border-bottom py-2">
                                                            <span>Phone</span>
                                                            <span class="text-dark">{{ $pre_registration->phone }}</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between border-bottom py-2">
                                                            <span>Joined :</span>
                                                            <span>{{ $pre_registration->created_at }}</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between pt-2">
                                                            <span>Courses</span>
                                                            <span class="text-dark"> {{ $pre_registration->nbr_of_enrolled_course }} </span>
                                                        </div>
                                                        <div class="d-flex justify-content-between pt-2">
                                                            <span>Status</span>
                                                            <span class="text-dark">
                                                                @if( $pre_registration->status == 'is_pending' )
                                                                    <span class="badge-dot bg-warning me-1 d-inline-block align-middle"></span>
                                                                    Pending
                                                                @elseif( $pre_registration->status == 'is_inactive')
                                                                    <span class="badge-dot bg-danger me-1 d-inline-block align-middle"></span>
                                                                    Inactive
                                                                @elseif( $pre_registration->status == 'is_active' )
                                                                    <span class="badge-dot bg-success me-1 d-inline-block align-middle"></span>
                                                                    Active
                                                                @endif

                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                    @endforeach
                                @endisset


                                <!-- -->

                                </div>
                                <div class="row holder">
                                </div>
                                <nav>
                                    <ul class="pagination justify-content-center pb-3 pt-4">
                                        {{ $pre_registrations->links() }}
                                    </ul>
                                </nav>
                            </div>
                            <!-- Tab Pane -->
                            <div class="tab-pane fade third" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
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
                                                <th scope="col" class="border-0">Name</th>
                                                <th scope="col" class="border-0">Enrolled</th>
                                                <th scope="col" class="border-0">Joined At</th>
                                                <th scope="col" class="border-0">
                                                    Address
                                                </th>
                                                <th scope="col" class="border-0">Status</th>

                                                <th scope="col" class="border-0">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($pre_registrations)

                                                @foreach($pre_registrations as $pre_registration)
                                                    <tr>
                                                        <td class="align-middle">
                                                            <div class="d-flex align-items-center">
                                                                <div class="position-relative">
                                                                    <img src="{{ asset('assets/student/'.$pre_registration->avatar.'') }}" alt="" class="rounded-circle avatar-md me-2" />
                                                                    <a href="#" class="position-absolute mt-5 ms-n4">
                                                                        <span class="status bg-success"></span>
                                                                    </a>
                                                                </div>
                                                                <h5 class="mb-0">Nia Sikhone</h5>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">{{ $pre_registration->nbr_of_enrolled_course }} Courses</td>
                                                        <td class="align-middle">{{ $pre_registration->created_at }}</td>
                                                        <td class="align-middle">{{ $pre_registration->address }}</td>
                                                        <td class="align-middle">
                                                            @if( $pre_registration->status == 'is_pending' )
                                                                <span class="badge-dot bg-warning me-1 d-inline-block align-middle"></span>
                                                                Pending
                                                            @elseif( $pre_registration->status == 'is_inactive')
                                                                <span class="badge-dot bg-danger me-1 d-inline-block align-middle"></span>
                                                                Inactive
                                                            @elseif( $pre_registration->status == 'is_active' )
                                                                <span class="badge-dot bg-success me-1 d-inline-block align-middle"></span>
                                                                Active
                                                            @endif
                                                        </td>

                                                        <td class="text-muted px-4 py-3 align-middle">
                                                        <span class="dropdown dropstart">
                                                    <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown5"
                                                       data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                                                      <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <span class="dropdown-menu" aria-labelledby="courseDropdown5">
                                                      <span class="dropdown-header">Action</span>
                                                        <a class="dropdown-item" href="{{ route('admin.pre_registration.edit',$pre_registration->id) }}"><i
                                                                class="fe fe-edit dropdown-item-icon"></i>Edit</a>
                                                         <a class="dropdown-item delete_element" href="#" data-href="{{ route('admin.pre_registration.delete',$pre_registration->id) }}" data-bs-toggle="modal" data-bs-target="#exampleModal-2"><i
                                                                 class="fe fe-trash dropdown-item-icon"></i>Remove</a>
                                                         @if( $pre_registration->status !== 'is_active' )
                                                            <a class="dropdown-item" href="{{ route('admin.pre_registration.approved',$pre_registration->id) }}"><i
                                                                    class="fe fe-edit dropdown-item-icon"></i>Approved</a>
                                                        @endif
                                                        </span>
                                                        </span>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            @endisset



                                            </tbody>
                                        </table>
                                        <nav>
                                            <ul class="pagination justify-content-center pb-3 pt-4">
                                                {{ $pre_registrations->links() }}
                                            </ul>
                                        </nav>
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
    <script>
        $(document).ready(function(){
            let index = 0 ;
            let insideIndex = 0
            $('#search').on('change',function (){
                var search =  $(this).val();
                let img ;
                let firstName ;
                let lastName ;
                let time ;
                let unrolledCourses ;
                let address;
                let phone;
                let created_at;
                let group;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                $.ajax({
                    type : 'GET' ,
                    url : "#",
                    data : {"query" : search},
                    contentType: "application/json",
                    success: (response) => {
                        index++;
                        console.log(index + ' *********** ' + 'index')
                        console.table(response)
                        if (index === 1){
                            response.forEach(el => {
                                insideIndex++;
                                console.log(insideIndex+' ********** '+'insideIndex')
                                img = el['avatar']
                                console.log(img)
                                firstName = el['first_name']
                                lastName = el['last_name']
                                time = new Date("1996-10-02").getDate()
                                unrolledCourses = el['id']
                                address = el['address']
                                group = el['groups']
                                phone = el['phone']
                                created_at = el['created_at']
                                let cardUser = ` <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                                <div class="card mb-4">
                                                <div class="card-body mx-auto">
                                                        <div class="text-center">
                                                            <div class="position-relative d-flex justify-content-center">
                                                                <img src="http://localhost:8000/assets/student/${img}" class="rounded-circle avatar-xl mb-3" alt="" />
                                                                <a href="#" class="position-absolute mt-10 ms-n5">
                                                                    <span class="status bg-secondary"></span>
                                                                </a>
                                                            </div>
                                                            <h4 class="mb-0">${firstName} ${lastName} </h4>
                                                            <p class="mb-0">
                                                                <i class="fe fe-map-pin me-1 fs-6"></i>${ address }
                                                            </p>
                                                        </div>
                                                        <div class="d-flex justify-content-between border-bottom py-2 mt-6">
                                                            <span>Group</span>
                                                            <span class="text-dark">${group}</span>
                                                        </div>
                                                          <div class="d-flex justify-content-between border-bottom py-2">
                                                            <span>Phone</span>
                                                            <span class="text-dark">${phone}</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between border-bottom py-2">
                                                            <span>Joined :</span>
                                                            <span>${created_at}</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between pt-2">
                                                            <span>Courses</span>
                                                            <span class="text-dark"> ${unrolledCourses} </span>
                                                        </div>
                                                    </div>
</div>
 </div>`
                                if (img !== undefined && firstName !== undefined && lastName !== undefined && unrolledCourses !== undefined){
                                    $('.first').hide()
                                    $('.second').hide()
                                    $('.holder').append(cardUser)
                                }
                            })
                        }
                    },
                    error: function(response){
                        alert('error');
                    }
                })
                if (search === '' ){
                    $('.holder').hide()
                    $('.first').show()
                    $('.second').show()
                }
            });
        });
    </script>
@endsection
