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
                                    <img style="height: 45px;margin-right: 6px;" src="{{ asset('assets/images/student_list.svg') }}" />Update Student
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

                        </div>
                    </div>
                </div>
                <div style="border-top: 2px solid #0f7a5b;" class="alert alert-success get_success_message" role="alert">
                    The Date Is Added With Success!
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Profile Details</h3>
                                <p class="mb-0">
                                    You have full control to manage your own account setting.
                                </p>
                            </div>
                            <!-- Card body -->
                            <form id="main_form">
                                @csrf
                                <input class="form-control" name="id" value="{{ $users->id }}" hidden />
                                <div class="card-body">
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


                                    <div class="d-lg-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center mb-4 mb-lg-0">
                                            <input type="file" name="image" class="image">

                                            <div style="position: relative;top: -19px;">
                                                <h4 class="mb-0">Your avatar</h4>
                                                <p class="mb-0">
                                                    PNG or JPG no bigger than 800px wide and tall.
                                                </p>
                                            </div>
                                        </div>


                                    </div>
                                    <h6 class="error_message" style="font-weight: bold;background: antiquewhite;padding: 6px;width: 50%;">
                                        <span class="text-danger error-text image_error"></span>
                                    </h6>
                                    <hr style="margin-top: 0rem!important;" class="my-5">
                                    <div class="d-lg-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center mb-4 mb-lg-0 imgContainer">

                                        </div>


                                    </div>

                                    <hr style="margin-top: 0rem!important;" class="my-5">
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
                                                <input type="text" id="fname" name="first_name" class="form-control form-control-sm first_name" value="{{ $users->first_name }}" placeholder="First Name" >
                                                <h6 class="error_message" style="margin-top:5px; font-weight: bold;background: antiquewhite;padding: 6px;width: 50%;">
                                                    <span class="text-danger error-text first_name_error"></span>
                                                </h6>
                                            </div>
                                            <!-- Last name -->
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="lname">Last Name</label>
                                                <input type="text" id="lname" name="last_name" class="form-control form-control-sm last_name" value="{{ $users->last_name }}" placeholder="Last Name" >
                                                <h6 class="error_message" style="margin-top:5px;font-weight: bold;background: antiquewhite;padding: 6px;width: 50%;">
                                                    <span class="text-danger error-text last_name_error"></span>
                                                </h6>
                                            </div>
                                            <!-- Phone -->
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="phone">Phone Number</label>
                                                <input type="text" id="phone" name="phone" class="form-control form-control-sm phone" value="{{ $users->phone }}" placeholder="Phone" >
                                                <h6 class="error_message" style="margin-top:5px;font-weight: bold;background: antiquewhite;padding: 6px;width: 50%;">
                                                    <span class="text-danger error-text phone_error"></span>
                                                </h6>
                                            </div>

                                            <!-- Birthday -->
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="birth">Birthday</label>
                                                <input class="form-control form-control-sm flatpickr flatpickr-input birth" type="text"  placeholder="Birth of Date" id="birth" value="{{ $users->birth }}" name="birth" readonly="readonly">
                                                <h6 class="error_message" style="margin-top:5px;font-weight: bold;background: antiquewhite;padding: 6px;width: 50%;">
                                                    <span class="text-danger error-text birth_error"></span>
                                                </h6>
                                            </div>

                                            <!-- Address -->
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Level</label>
                                                <select class="selectpicker level_scolaire" id="level_scolaire" name="level_scolaire" data-width="100%">
                                                    <option value="">Select Level</option>
                                                    <option value="1" @if( $users->scolarity_level == 1 ) selected @endif> Primary  </option>

                                                    <option value="2" @if( $users->scolarity_level == 2 ) selected @endif> Middle School </option>
                                                    <option value="3" @if( $users->scolarity_level == 3 ) selected @endif> High School </option>
                                                </select>
                                                <h6 class="error_message" style="margin-top:5px;font-weight: bold;background: antiquewhite;padding: 6px;width: 50%;">
                                                    <span class="text-danger error-text level_scolaire_error"></span>
                                                </h6>
                                            </div>
                                            <!-- Address -->
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="address2">Guardian Number</label>
                                                <input type="text" name="phone_parents" id="phone_parents" class="form-control form-control-sm phone_parents" value="{{ $users->parent_phone }}" placeholder="Guardian Number" required="">
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Family Situation</label>
                                                <select class="selectpicker situation_famille" id="situation_famille" name="situation_famille" data-width="100%">
                                                    <option value="">Select Family Situation</option>
                                                    <option value="1"  @if( $users->family_situation == 'single' ) selected @endif>Celibate</option>
                                                    <option value="2" @if( $users->family_situation == 'married' ) selected @endif>Married</option>
                                                    <option value="3" @if( $users->family_situation == 'divorced' ) selected @endif>Divorce</option>
                                                </select>
                                                <h6 class="error_message" style="margin-top:5px;font-weight: bold;background: antiquewhite;padding: 6px;width: 50%;">
                                                    <span class="text-danger error-text situation_famille_error"></span>
                                                </h6>
                                            </div>
                                            <div class="mb-3 col-12 col-md-6 childrenContainer">
                                                <label class="form-label" for="address2">Number Of Children</label>
                                                <select class="selectpicker childrene" name="childrene" id="childrene" data-width="100%">
                                                    <option value="">Select Children Number</option>
                                                    <option @if( $users->nbr_child == '0' ) selected @endif value="0">0</option>
                                                    <option @if( $users->nbr_child == '1' ) selected @endif value="1">1</option>
                                                    <option @if( $users->nbr_child == '2' ) selected @endif value="2">2</option>
                                                    <option @if( $users->nbr_child == '3' ) selected @endif value="3">3</option>
                                                    <option @if( $users->nbr_child == '4' ) selected @endif value="4">4</option>
                                                    <option @if( $users->nbr_child == '5' ) selected @endif value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="address2">Cin</label>
                                                <input type="text" id="cin" name="cin" class="form-control form-control-sm cin" value="{{ $users->cin }}" placeholder="Cin" required="">
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Select Group</label>
                                                <select class="selectpicker" id="group" name="group" data-width="100%">
                                                    <option value="">Select Group</option>
                                                    <option value="1" @if($users->groups == '1') selected @endif>GUILIZ</option>
                                                    <option value="2" @if($users->groups == '2') selected @endif>TARGA</option>
                                                </select>
                                                <h6 class="error_message" style="margin-top:5px;font-weight: bold;background: antiquewhite;padding: 6px;width: 50%;">
                                                    <span class="text-danger error-text group_error"></span>
                                                </h6>
                                            </div>
                                            <div class="mb-3 col-12 col-md-12">
                                                <label class="form-label" for="address2">Address</label>
                                                <textarea class="form-control form-control address" id="address" name="address" placeholder="Address">{{ $users->address }}</textarea>
                                            </div>
                                            <!-- State -->

                                            <!-- Country -->
                                            <div class="mb-3 col-12 col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">More about the trainee</label>
                                                    <div style="height: 99px !important;" id="niceEditor">
                                                        {{ $users->editor }}
                                                    </div>
                                                    <textarea style="display:none;" name="editor"></textarea>

                                                </div>
                                            </div>
                                            <h1 style="background: #18113c;color: #FFF;border-radius: 5px;padding: 10px;text-align: center;">Account Details</h1>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="address2">Email</label>
                                                <div style="height: 35px;" class="input-group">
                                                    <input type="text" class="form-control form-control-sm" name="email" id="email" aria-describedby="basic-addon3" placeholder="Name" value="{{ $users->email }}" />


                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <!-- Button -->
                                                <button id="submit" class="btn btn-primary" type="submit">
                                                    Update Student
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <form>
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
        const src ="{{ asset('assets/student/'.$users->avatar.'') }}"
        console.log(src)
        const  imageCont = document.querySelector('.imgContainer')
        console.log(imageCont)
        const img = document.createElement('img')
        img.src = src
        imageCont.appendChild(img)
        // for editor text
        function getEditorContents(form){
            var html = document.getElementById("editor").innerHTML;
            form.editor.value = html;
            return true;
        }
        const oldImagePath = src.replace('http://localhost:8000' , '');

        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;
        $("body").on("change", ".image", function(e){
            var files = e.target.files;
            console.log('************')
            console.dir(files[0])
            console.log('************')

            var done = function (url) {
                console.log(url)
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
        let base64data ;
        let quill = new Quill('#niceEditor' ,  {
            theme: 'snow'
        })
        const button = document.querySelector('#submit')
        $("#crop").click(function(e){
            console.log('crop start')
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });
            console.log(canvas.toDataURL())
            img.src = canvas.toDataURL()
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    data['image'] = reader.result.replace();
                    data['imageModification'] = true
                    $modal.modal('hide');
                    // console.log( base64data.split(';base64,') );
                }
            });
        })
        let user = @json($users);

        console.log(' ************************** ')
        let base64Image ;
        //  $('#fname').attr('name' , user['first_name'])
        let  first_name  =  $('#fname').val();
        let  last_name        =    $('#lname').val();
        let  phone            =    $('#phone').val();
        let  birth            =    $('#birth').val();
        let level_scolaire    =    $('#level_scolaire').val();
        let phone_parents     =    $('#phone_parents').val();
        let situation_famille =    $('#situation_famille').val();
        let childrene         =    $('#childrene').val();
        let cin               =    $('#cin').val();
        let address           =    $('#address').val();
        let editor            =    quill.getText()       // $('#editor');
        let group             =    $('#group').val();
        let email             =    $('#email').val();

        console.log(' **************************' )
        let data = {
            'image': base64Image,
            'first_name': first_name,
            'last_name': last_name,
            'phone' : phone,
            'birth' : birth ,
            'level_scolaire' : level_scolaire ,
            'phone_parents': phone_parents ,
            'situation_famille' : situation_famille ,
            'childrene' : childrene ,
            'cin' : cin ,
            'address' : address ,
            'editor' : editor,
            'group'  : group,
            'email'  : email,
            'imageModification' : false,
            'oldImagePath': oldImagePath
        }
        //first_name = $('#fname').val()
        console.log(first_name)
        $('#fname').on('change', function (e) {
            e.preventDefault()
            data['first_name'] = e.target.value
            console.log(first_name + ' ************ firstName')
        })
        $('#lname').on('change', function (e) {
            e.preventDefault()
            data['last_name'] = e.target.value
            console.log(last_name + ' *********** lastName')
        })
        $('#phone').on('change', function (e) {
            e.preventDefault()
            data['phone'] = e.target.value
            console.log(phone + ' ************* phone')
        })
        $('#birth').on('change', function (e) {
            e.preventDefault()
            data['birth'] = e.target.value
            console.log(birth + ' ************ birth')
        })
        $('#level_scolaire').on('change', function (e) {
            e.preventDefault()
            data['level_scolaire'] = e.target.value
            console.log(level_scolaire + ' ************** levelScolaire')
        })
        $('#phone_parents').on('change', function (e) {
            e.preventDefault()
            data['phone_parents'] = e.target.value
            console.log(phone_parents + ' **************** phoneParent')
        })
        $('#situation_famille').on('change', function (e) {
            e.preventDefault()
            data['situation_famille'] = e.target.value
            console.log(situation_famille + ' ************ situation')
        })
        $('#childrene').on('change', function (e) {
            e.preventDefault()
            data['childrene'] = e.target.value
            console.log(childrene + ' ************ childrene')
        })
        $('#cin').on('change', function (e) {
            editor = quill.getText()
            e.preventDefault()
            data['cin'] = e.target.value
            console.log(cin + ' ********** cin')
        })
        $('#address').on('change', function (e) {
            data['editor'] = quill.getText()
            e.preventDefault()
            data['address'] = e.target.value
            console.log(address + ' ********* adress')
        })
        quill.on('text-change', function(delta, oldDelta, source) {
            data['editor'] = quill.getText()
            console.table(oldDelta)
            console.log(source)
            console.table(delta)
            console.log(editor + ' editorrr')


        });
        $('#group').on('change', function (e) {

            e.preventDefault()
            data['group'] = e.target.value

        })
        $('#email').on('change', function (e) {
            data['editor'] = quill.getText()
            console.log('the editor')
            e.preventDefault()
            data['email'] = e.target.value
            console.log(email)
        })

        let filereader = new FileReader()
        const avatarSrc = document.querySelector('.d-flex img').getAttribute('src')
        let newSrc ;
        function getImageSrc() {
            console.log(src)
            if (!data['imageModification']){
                data['image'] =  src.replace('http://localhost:8000/assets/student/' , '')
            }
            sendRequest()
        }
        function sendRequest(){


            console.table(data)

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('admin.pre_registration.update',$users->id) }}",
                data: data ,
                beforeSend:function(){
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
                            window.location.href = '{{ route('admin.student') }}';
                        }, 1000);



                    }

                }
            });
        }
        button.addEventListener('click', function (e) {
            e.preventDefault();
            getImageSrc()

        })
    </script>
    <script>
        $(document).ready(function (){
            $('.situation_famille').on('change',function (){
                var selectedVal = $(".situation_famille option:selected").val()
                var situation   = $('.childrenContainer');
                if(selectedVal == 1){
                    situation.css('display','none');

                }else{
                    situation.css('display','block');
                }

            });



        });



    </script>

@endsection
