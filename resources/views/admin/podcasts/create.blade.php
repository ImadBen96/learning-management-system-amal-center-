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
                                    <h1 class="text-white mb-1">Add New Podcast</h1>
                                    <p class="mb-0 text-white lead">
                                        Just fill the form and create your podcast.
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
                                    <label for="podcastTitle" class="arab form-label">عنوان التسجيل</label>
                                    <input style="direction: rtl;" id="podcastTitle" name="podcastTitle" class="form-control form-control-sm" type="text" required placeholder="عنوان الدورة"  />

                                </div>

                                <div style="text-align: end;" class="mb-3">
                                    <label class="arab form-label">تحميل التسجيل</label>
                                    <input type="file"
                                           class="filepondPodcast"
                                           name="filepondPodcast"
                                           data-max-file-size="500MB"
                                           data-max-files="1">
                                </div>

                            </div>
                            <div class="previewPod"></div>
                        </div>
                        <!-- Button -->
                        <div class="submit d-flex justify-content-center">
                            <button id="submission" class="btn btn-danger arab"  style="width: 10vw" >
                                إرسال
                            </button>
                        </div>


                    </form>
                </div>
            </div>
            <!-- Modal -->

        </div>
    </div>
    <div class="modal" id="sentCourseModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close closeDataModal" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="waitWrapper">
                        <h2> The Data is sent to the cloud right now </h2>
                        <div class="loadingVideos d-flex justify-content-center" >
                            <lottie-player src=" {{ asset('assets/lotties/890-loading-animation.json') }}" background="transparent"  speed="0.5"  style="width: 600px; height: 600px;" loop autoplay ></lottie-player>
                        </div>
                    </div>
                    <div class="successUploadCloud" hidden>
                        <h2> Podcast is persisted in Amal cloud server  </h2>
                        <div class="d-flex justify-content-center" >
                            <lottie-player src=" {{ asset('assets/lotties/69021-success-interaction.json') }}" background="transparent"  speed="0.5"  style="width: 300px; height: 300px;" loop autoplay ></lottie-player>
                        </div>
                    </div>

                    <div class="failedUploadCloud" hidden>
                        <h2> Ops Server Error  </h2>
                        <div class=" d-flex justify-content-center" >
                            <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_LlRvIg.json"
                                           background="transparent"  speed="1"  style="width: 300px; height: 300px;"
                                           loop  autoplay></lottie-player>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <!-- The modal  -->
@endsection()

@section('script')

    <script>
        let formData = new FormData();
        let nullArr = [null , undefined , ''];
        document.querySelector('#podcastTitle').addEventListener('change' , function (e) {
            e.preventDefault();
            formData.append('podcastTitle' , e.target.value);

        });



        $('#submission').click(function (e) {
            e.preventDefault()

            console.log("hii")

            console.log([...formData])
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            $.ajax({
                type : 'POST' ,
                url : "{{ route('admin.podcastss.store') }}",
                data : formData ,
                processData: false ,
                contentType: false ,
                success: (response) => {
                  window.location.href =  '{{route('admin.podcast.index')}}'
                },
                error: function(response){
                    console.log(response)
                    setTimeout(function () {
                        failureAnimation()
                    } , 5000)
                }
            })

        });

        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize,
            FilePondPluginImageEdit
        );

        FilePond.create(
            document.querySelector('.filepondPodcast'),
            {
                acceptedFileTypes: ['podcast/mp3'],
                fileValidateTypeDetectType: (source, type) =>
                    new Promise((resolve, reject) => {
                        // Do custom type detection here and return with promise

                        resolve(type);
                    }),
                onaddfile : (error , file)=>{

                } ,
                onremovefile : (error , file)=> {

                    console.error(error)

                } ,
                onprocessfile : (error , file) => {
                    formData.append("podcastUrl",file.serverId);
                },

            }
        );
        const metaToken = $('meta[name="csrf-token"]').attr('content')
        FilePond.setOptions({
            server: {
                url: '{{ route('admin.podcast.index') }}',
                process: {
                    url: `/store/podcast`,
                    method: 'POST',
                    headers: {
                        'Access-Control-Allow-Origin':'{{ route('admin.podcast.store') }} | *',
                        'X-CSRF-TOKEN': metaToken ,
                        'Methods':'POST'
                    },
                    onaddfile : (error , file)=>{
                        if (error){
                            // console.error(error)
                        }else {
                            // formData.append(file.filename , file)
                            // console.log(formData.get(file.filename.serverId))
                        }
                    } ,
                },
            } });




    </script>
@endsection
@section('credits')
    <script>
        window.onload = function (){
            document.querySelector('.filepondPodcast label').innerText = 'Please Drop the mp3 File here'
        }
    </script>
@endsection
