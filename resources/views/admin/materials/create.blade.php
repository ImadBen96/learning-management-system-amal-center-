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

            <div style="background: #18113c!important;" class="py-4 py-lg-6">
                <div class="container">
                    <div class="row">
                        <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                            <div class="d-lg-flex align-items-center justify-content-between">
                                <!-- Content -->
                                <div class="mb-4 mb-lg-0">
                                    <h1 class="text-white mb-1">Add New Material</h1>
                                    <p class="mb-0 text-white lead">
                                        Just fill the form and create your Material.
                                    </p>
                                </div>
                                <div>
                                    <img height="120px" src="{{ asset('assets/images/logo_rtl.svg') }}" />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="pb-12">
                <div class="container">
                    <form  id="wizzard" enctype="multipart/form-data">
                    @csrf
                    <!-- Content one -->
                        <div class="card mb-3 ">
                            <div class="card-header border-bottom px-4 py-3">
                                <h4 style="text-align: end;" class="arab mb-0">معلومات اساسية</h4>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <div style="text-align: end;" class="mb-3">
                                    <label for="matTitle" class="arab form-label">عنوان المرفق</label>
                                    <input style="direction: rtl;" id="matTitle" name="podcastTitle" class="form-control form-control-sm" type="text" required placeholder="عنوان الدورة"  />

                                </div>

                                <div style="text-align: end;" class="mb-3">
                                    <label class="arab form-label">تحميل المرفق</label>
                                    <input type="file"
                                           class="filepondMat"
                                           name="filepondMat"
                                           data-max-file-size="200MB"
                                           data-max-files="1">
                                </div>


                            </div>
                        </div>
                        <div class="holder" style="max-width: px">

                        </div>
                        <!-- Button -->



                    </form>
                    <div class="d-flex justify-content-center">
                        <button id="submission" class="btn btn-danger"  style="width: 10vw">
                            إرسال
                        </button>
                    </div>

                </div>
            </div>
            <!-- Modal -->
            <div class="modal" id="sentCourseModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <button type="button" class="btn-close closeDataModal" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="waitWrapper">
                                <p> The Data is sent to the cloud right now </p>
                                <div class="spinner-border text-dark" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="successUploadCloud" hidden>
                                <h2> All courses related data is saved in our cloud based servers  . Check the Course Display  </h2>
                                <div class="d-flex justify-content-center">
                                    <lottie-player src=" {{ asset('assets/lotties/69021-success-interaction.json') }}" background="transparent"  speed="0.5"  style="width: 300px; height: 300px;" loop autoplay ></lottie-player>
                                </div>
                            </div>
                            <div class="failedUploadCloud" hidden>
                                <h2> Ops Server Error  </h2>
                                <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_LlRvIg.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                            </div>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- The modal  -->
@endsection()

@section('script')

    <script>
        let formData = new FormData()
        const arrays = [null , undefined , '']
        document.querySelector('#matTitle').addEventListener('change' , function (evt) {
            evt.preventDefault()
            if (!arrays.includes(evt.target.value)){
                formData.append('matTitle' , evt.target.value)
            }else {
                formData.delete('matTitle')
            }
        })
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize,
            FilePondPluginFileValidateType,
        );
        const metaToken = $('meta[name="csrf-token"]').attr('content')
        function createPreview(src){
            $('.holder').html(`<mat-amal src=${src}></mat-amal>`)
        }
        function removePreview() {
            $('.holder').empty()
        }
        FilePond.setOptions({
            server: {
                process: {
                    url: '{{ route('admin.mat.store') }}',
                    method: 'POST',
                    headers: {
                        'Access-Control-Allow-Origin':'{{ route('admin.mat.store') }} | *',
                        'X-CSRF-TOKEN': metaToken ,
                        'Methods':'POST'
                    }
                },
                revert: {
                    url: '{{ route('admin.mat.delete') }}',
                    method: 'POST',
                    headers: {
                        'Access-Control-Allow-Origin':'{{ route('admin.mat.delete') }} | *',
                        'X-CSRF-TOKEN': metaToken,
                        '_method': 'DELETE'
                    }
                }
            } });
        const filepond = FilePond.create(
            document.querySelector('.filepondMat') ,
            {
                acceptedFileTypes: ['application/vnd.ms-powerpoint' , 'application/vnd.openxmlformats-officedocument.presentationml.presentation'],
                fileValidateTypeDetectType: (source, type) =>
                    new Promise((resolve, reject) => {
                        // Do custom type detection here and return with promise
                        console.log(type)
                        console.log('type checking')
                        resolve(type);
                    }),
                onaddfile : (error , file)=>{
                    if (error){
                        console.error(error)
                    }else {
                        console.dir(file)
                        console.log(file.filename)

                    }
                } ,
                onremovefile : (error , file)=> {
                    if (error){
                        console.error(error)
                    }else {
                        console.log('the file will be '+file.filename)
                        removePreview()
                        formData.delete('matLink')
                    }
                } ,
                onprocessfile : (error , file) => {
                    if (error){
                        console.log(error)
                    }else {


                        formData.append('matLink' ,file.serverId)
                        console.log('URL' + file.serverId)
                        if (formData.get('matTitle') !== undefined){
                            document.querySelector('#submission').removeAttribute('disabled')
                        }

                    }
                }
            }
        );
        document.querySelector('.filepond--credits').innerText = 'powred by AOBC'
        $('#submission').click(function (e) {
            e.preventDefault()
            console.log(formData);
            document.querySelector('#submission').setAttribute('disabled' , 'true')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            $.ajax({
                type : 'POST' ,
                url : "{{ route('admin.mat.ajax') }}",
                data : formData ,
                processData: false ,
                contentType: false ,
                success: (response) => {
                    console.table(response)
                    document.querySelector('.successUploadCloud').removeAttribute('hidden')
                    formData.delete('matTitle')
                    formData.delete('matLink')
                    $('.waitWrapper').hide()
                    window.location.href =  '{{route('admin.mat.show')}}'

                },
                error: function(response){
                    console.table(response)
                    document.querySelector('.failedUploadCloud').removeAttribute('hidden')
                    document.querySelector('#submission').setAttribute('disabled' , 'true')
                    setTimeout(function () {
                        window.location.reload()
                    } , 5000)
                }
            })
            $('#sentCourseModal').modal('toggle')
        })
    </script>
@endsection
@section('credits')
    <script>

    </script>
@endsection
