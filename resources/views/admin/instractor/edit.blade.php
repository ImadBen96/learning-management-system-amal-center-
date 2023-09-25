
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
                                    <img style="height: 45px;margin-right: 5px;" src="{{ asset('assets/images/cooking.svg') }}">Edit Chef
                                    <span class="fs-5 text-muted">(3)</span>
                                </h1>
                                <!-- Breadcrumb  -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href=".#">Dashboard</a>
                                        </li>

                                        <li class="breadcrumb-item active" aria-current="page">
                                            Chefs
                                        </li>
                                    </ol>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
                <div style="border-top: 2px solid #0f7a5b;" class="alert alert-success get_success_message" role="alert">
                    The Date Is Updated With Success!
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Chef Details</h3>

                            </div>
                            <!-- Card body -->
                            <form id="main_form">
                                @csrf
                                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel"> Crop Image Before Upload </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="img-container">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="preview"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" id="crop">Crop</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body">
                                    <div class="d-lg-flex align-items-center justify-content-between">
                                        <div style="width: 50%;" class="input-group">
                                            <input type="file" name="image" class="form-control image" id="inputLogo">
                                            <label class="input-group-text" for="inputLogo">Upload</label>
                                        </div>
                                        <div class="d-flex align-items-center mb-4 mb-lg-0">

                                            <div class="ms-3">
                                                <h4 class="mb-0">Your avatar</h4>
                                                <p class="mb-0">
                                                    PNG or JPG no bigger than 800px wide and tall.
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                    <h6 class="error_message" style="margin-top:5px; font-weight: bold;background: antiquewhite;padding: 6px;width: 50%;">
                                        <span class="text-danger error-text image_error"></span>
                                    </h6>
                                    <hr class="my-5 ">
                                    <div class="imagePreview"></div>
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
                                                <label class="form-label" for="fname">First Name</label>
                                                <input type="text" id="fname" name="first_name" class="form-control form-control-sm first_name" value="{{ $chefs->first_name }}" placeholder="First Name" required="">
                                                <h6 class="error_message" style="margin-top:5px; font-weight: bold;background: antiquewhite;padding: 6px;width: 50%;">
                                                    <span class="text-danger error-text first_name_error"></span>
                                                </h6>
                                            </div>


                                            <!-- Last name -->
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="lname">Last Name</label>
                                                <input type="text" id="lname" name="last_name" class="form-control form-control-sm last_name" value="{{ $chefs->last_name }}" placeholder="Last Name" required="">
                                                <h6 class="error_message" style="margin-top:5px; font-weight: bold;background: antiquewhite;padding: 6px;width: 50%;">
                                                    <span class="text-danger error-text last_name_error"></span>
                                                </h6>
                                            </div>

                                            <!-- Phone -->


                                            <!-- Birthday -->
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="birth">Birthday</label>
                                                <input class="form-control form-control-sm flatpickr flatpickr-input birth" type="text" name="birth" value="{{ $chefs->birth }}" placeholder="Birth of Date" id="birth"  readonly="readonly">
                                                <h6 class="error_message" style="margin-top:5px; font-weight: bold;background: antiquewhite;padding: 6px;width: 50%;">
                                                    <span class="text-danger error-text birth_error"></span>
                                                </h6>
                                            </div>

                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Gender</label>
                                                <select class="selectpicker gender" name="gender" data-width="100%">
                                                    <option value="">Select Gender</option>
                                                    <option value="1" @if($chefs->gender == 1 ) selected @endif>Female</option>
                                                    <option value="2" @if($chefs->gender == 2 ) selected @endif>Male</option>
                                                </select>
                                                <h6 class="error_message" style="margin-top:5px; font-weight: bold;background: antiquewhite;padding: 6px;width: 50%;">
                                                    <span class="text-danger error-text gender_error"></span>
                                                </h6>
                                            </div>



                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Select Center</label>
                                                <select class="selectpicker center" name="center" data-width="100%">
                                                    <option value="">Select Center</option>
                                                    <option value="1" @if($chefs->center == 1) selected @endif>Center Gueliz</option>
                                                    <option value="2" @if($chefs->center == 2) selected @endif>Center Targa</option>
                                                </select>
                                                <h6 class="error_message" style="margin-top:5px; font-weight: bold;background: antiquewhite;padding: 6px;width: 50%;">
                                                    <span class="text-danger error-text center_error"></span>
                                                </h6>
                                            </div>

                                            <div class="mb-3 col-12 col-md-12">
                                                <label class="form-label">Address</label>
                                                <textarea class="form-control form-control-sm address" name="address" placeholder="Address">{{ $chefs->address }}</textarea>
                                            </div>



                                            <!-- State -->

                                            <!-- Country -->


                                            <div class="col-12">
                                                <!-- Button -->
                                                <button id="submit" class="btn btn-primary" type="submit">
                                                    Update Chef
                                                </button>
                                            </div>
                                        </div>
                                    </div>
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
        const imageSrc = "{{ asset('assets/cheifs/'. $chefs->avatar .'') }}"
        let avatar = document.createElement('img')
        avatar.src = imageSrc
        const imagePreview = document.querySelector('.imagePreview')
        imagePreview.append(avatar)
        let  first_name = $('.first_name').val();
        let  last_name  = $('.last_name').val();
        let  phone      = $('.phone').val();
        let  birth      = $('.birth').val();
        let gender      = $('.gender').val();
        let address     = $('.address').val();
        let center      = $('.center').val();
        let email       = $('.email').val();
        let base64data ;
        let fileOne ;
        let data =  {
            'image': '',
            'first_name': first_name,
            'last_name': last_name,
            'phone' : phone,
            'birth' : birth ,
            'gender' : gender ,
            'email' : email ,
            'address' : address ,
            'center'  : center,
            'imageEdited' : false
        }
        let formData = new  FormData();
        formData.append('first_name' , first_name)
        formData.append('last_name' , last_name)
        formData.append('phone' , phone)
        formData.append('birth' , birth)
        formData.append('gender' , gender)
        formData.append('email' , email)
        formData.append('address' , address)
        formData.append('center', center)
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;
        data['image'] = imageSrc.replace('http://localhost:8000/assets/' , '')
        $("body").on("change", ".image", function(e){
            var files = e.target.files;

            var done = function (url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if ( !(file.name.includes('.jpg') || file.name.includes('.png') || file.name.includes('.jpeg')) ){
                    $('.image').val("");
                    alert('this file is not supported!!!');

                }else{

                    if (URL) {
                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        reader = new FileReader();
                        reader.onload = function (e) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(file);
                    }

                }


            }
        });
        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
            // console.log(cropper);
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });
        //fetching the image
        // const prevAvatar = document.querySelector('img')
        // const imageUrl = $('img').attr('src')
        // console.log(imageUrl + ' imageUrl ***************')
        // var canvas = document.createElement('canvas')
        // let context = canvas.getContext('2d')
        // prevAvatar.onload = function () {
        //     context.drawImage(prevAvatar, 0, 0)
        // }
        // data.image = canvas.toDataURL()

        const button = document.querySelector('#submit')
        $("#crop").click(function(){
            data['imageEdited'] = true
            let  canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    avatar.src = reader.result;
                    data['image'] = avatar.src
                    $modal.modal('hide');
                    // console.log( base64data.split(';base64,') );
                }
            });
        });

        $('.first_name').on('change', function (e) {
            e.preventDefault()
            data['first_name'] = e.target.value
        })
        $('.last_name').on('change', function (e) {
            e.preventDefault()
            data['last_name'] = e.target.value
        })
        $('.phone').on('change', function (e) {
            e.preventDefault()
            data['phone'] = e.target.value
        })
        $('.birth').on('change', function (e) {
            e.preventDefault()
            data['birth'] = e.target.value
        })
        $('.gender').on('change', function (e) {
            e.preventDefault()
            data['gender'] = e.target.value
        })
        $('.email').on('change', function (e) {
            e.preventDefault()
            data['email'] = e.target.value
        })

        $('.address').on('change', function (e) {
            e.preventDefault()
            data['address'] = e.target.value
        })

        $('.center').on('change', function (e) {
            e.preventDefault()
            data['center'] = e.target.value
        })




        button.addEventListener('click', function (e) {

            e.preventDefault();
            console.log('************* data image ***************')
            console.dir(data)
            console.log("***************************************")
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            if (data.image === null || data.image === undefined){
                console.log('image will be removed from the payload')
                delete data.image
            }
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('admin.chiefs.update',$chefs->id) }}",
                data: data,

                beforeSend:function(){
                    console.table( data );
                    $(document).find('span.error-text').text('');
                    // $(document).find('h6.error_message').hide();

                },
                success: function(data){
                    if(data.status == 0){
                        $('h6.error_message').css('display','block');
                        $.each(data.error, function(prefix, val){
                            console.log( prefix );
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{


                        $('#main_form')[0].reset();
                        $('.get_success_message').css('display','block');
                        window.scrollTo(0, 0);
                        setTimeout(function(){
                            window.location.href = '{{ route('admin.chiefs.index') }}';
                        }, 1000);


                    }

                }

            });

        })
    </script>
@endsection
