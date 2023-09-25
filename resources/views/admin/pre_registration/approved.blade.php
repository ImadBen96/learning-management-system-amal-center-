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
                                    <img style="height: 45px;margin-right: 6px;" src="{{ asset('assets/images/student_list.svg') }}" />Approved Student
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
                            <div id="main_form">
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
                                        <div class="d-flex align-items-center mb-4 mb-lg-0">
                                            <img id="avatarPreview"  />
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
                                                    <option value="{{  $users->scolarity_level }}" @if( $users->scolarity_level == 1 ) selected @endif> Primary  </option>

                                                    <option value="{{  $users->scolarity_level }}" @if( $users->scolarity_level == 2 ) selected @endif> Middle School </option>
                                                    <option value="{{  $users->scolarity_level }}" @if( $users->scolarity_level == 3 ) selected @endif> High School </option>
                                                </select>
                                                <h6 class="error_message" style="margin-top:5px;font-weight: bold;background: antiquewhite;padding: 6px;width: 50%;">
                                                    <span class="text-danger error-text level_scolaire_error"></span>
                                                </h6>
                                            </div>
                                            <!-- Address -->
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="address2">Number parents</label>
                                                <input type="text" name="phone_parents" id="phone_parents" class="form-control form-control-sm phone_parents" value="{{ $users->parent_phone }}" placeholder="Number parents" required="">
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
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="address2">Children Number</label>
                                                <input type="text" id="childrene" name="childrene" class="form-control form-control-sm childrene" value="{{ $users->nbr_child }}" placeholder="Children Number" required="">
                                                <h6 class="error_message" style="margin-top:5px;font-weight: bold;background: antiquewhite;padding: 6px;width: 50%;">
                                                    <span class="text-danger error-text childrene_error"></span>
                                                </h6>
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="address2">Cin</label>
                                                <input type="text" id="cin" name="cin" class="form-control form-control-sm cin" value="{{ $users->cin }}" placeholder="Cin" required="">
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Select Group</label>
                                                <select class="selectpicker group" id="group" name="group" data-width="100%">
                                                    <option value="">Select Group</option>
                                                    <option value="1" @if($users->groups == 'GUILIZ') selected @endif>GUILIZ</option>
                                                    <option value="2" @if($users->groups == 'TARGA') selected @endif>TARGA</option>
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
                                                    <label class="form-label">Note</label>
                                                    <div style="height: 99px !important;" id="niceEditor">
                                                        {{ $users->editor }}
                                                    </div>
                                                    <textarea style="display:none;" name="editor"></textarea>

                                                </div>
                                            </div>
                                            <h1 style="background: #18113c;color: #FFF;border-radius: 5px;padding: 10px;text-align: center;">Attachments</h1>
                                            <div class="mb-3">
                                                <input type="file"
                                                       class="filepond"
                                                       name="filepond"
                                                       multiple
                                                       data-max-file-size="3MB"
                                                       data-max-files="4">

                                            </div>
                                            <h1 style="background: #18113c;color: #FFF;border-radius: 5px;padding: 10px;text-align: center;">Account Details</h1>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Email</label>
                                                <div style="height: 35px;" class="input-group">
                                                    <input type="text" class="form-control form-control-sm" name="email" id="basic-url" aria-describedby="basic-addon3" placeholder="Name">

                                                    <div style="height: 35px;" class="input-group-prepend">
                                                        <span style="height: 39px;" class="input-group-text" id="basic-addon3">@amaltadrib.com</span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label">Password</label>
                                                <input class="form-control form-control-sm" id="password" type="text" name="password" />

                                            </div>
                                            <div class="mb-3 col-12 col-md-6"></div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <div id="button" class="btn btn-outline-dark" onclick="genPassword()">Generate</div>
                                                <a  id="button" class="btn btn-outline-success" onclick="copyPassword()">Copy</a>
                                            </div>
                                            <div class="col-12">
                                                <!-- Button -->
                                                <button id="submit" class="btn btn-primary" type="submit">
                                                    Add Student
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
    <div class="modal" id="successAprrove" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> the student is approved successfully.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="  window.location.href = '{{ route('admin.pre_registration') }}' ">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="errorAprrove" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> ops there's some issues here . operation aborted .</p>
                </div>
                <div class="modal-footer bg-danger">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection()

@section('script')
    <script>

        // for editor text
        function getEditorContents(form){
            var html = document.getElementById("editor").innerHTML;
            form.editor.value = html;
            return true;
        }

    </script>
    <script>
        FilePond.registerPlugin(
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize);
        const pond = FilePond.create(
            document.querySelector('.filepond')
        );
        var $modal = $('#modal');
        var image = document.getElementById('image');
        let src = "{{ asset('assets/student/'.$users->avatar.'') }}"
        let avatarPrev = document.querySelector('#avatarPreview')
        avatarPrev.src = src
        var cropper;
        $(".image").on("change", function(e){
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
        let base64data ;
        let quill = new Quill('#niceEditor' ,  {
            theme: 'snow'
        })
        const button = document.querySelector('#submit')
        $("#crop").click(function(){
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    base64data = reader.result;
                    avatarPrev.src = base64data
                    $modal.modal('hide');
                    // console.log( base64data.split(';base64,') );
                }
            });
        })
        let user = @json($users);
        //filepond submittion



        console.log(' ************************** ')
        let formdata = new FormData()
        //  $('#fname').attr('name' , user['first_name'])
        let  first_name // $('.first_name');
        let  last_name        =    $('#lname').val();
        let  phone            =    $('#phone').val();
        let  birth            =    $('#birth').val();
        let level_scolaire    =    $('#level_scolaire').val();
        let phone_parents     =    $('#phone_parents').val();
        let situation_famille =    $('#situation_famille').val();
        let childrene         =    $('#childrene').val();
        let cin               =    $('#cin').val();
        let passwordData = '';
        let email =  ''
        let address           =    $('#address').val();
        let editor            =    quill.getText()       // $('#editor');
        let group             =    $('#group').val();
        let user_id = document.querySelector('[name="id"]').getAttribute('value')
        console.log(' **************************' )
        first_name = $('#fname').val()
        console.log(first_name)
        $('.first_name').on('change', function (e) {
            e.preventDefault()
            first_name = e.target.value
            console.log(first_name + ' ************ firstName')
        })
        $('.last_name').on('change', function (e) {
            e.preventDefault()
            last_name = e.target.value
            console.log(last_name + ' *********** lastName')
        })
        $('.phone').on('change', function (e) {
            e.preventDefault()
            phone = e.target.value
            console.log(phone + ' ************* phone')
        })
        $('.birth').on('change', function (e) {
            e.preventDefault()
            birth = e.target.value
            console.log(birth + ' ************ birth')
        })
        $('.level_scolaire').on('change', function (e) {
            e.preventDefault()
            level_scolaire = e.target.value
            console.log(level_scolaire + ' ************** levelScolaire')
        })
        $('.phone_parents').on('change', function (e) {
            e.preventDefault()
            phone_parents = e.target.value
            console.log(phone_parents + ' **************** phoneParent')
        })
        $('.situation_famille').on('change', function (e) {
            e.preventDefault()
            situation_famille = e.target.value
            console.log(situation_famille + ' ************ situation')
        })
        $('.childrene').on('change', function (e) {
            e.preventDefault()
            childrene = e.target.value
            console.log(childrene + ' ************ childrene')
        })
        $('.cin').on('change', function (e) {
            editor = quill.getText()
            e.preventDefault()
            cin = e.target.value
            console.log(cin + ' ********** cin')
        })
        $('.address').on('change', function (e) {
            editor = quill.getText()
            e.preventDefault()
            address = e.target.value
            console.log(address + ' ********* adress')
        })
        quill.on('text-change', function(delta, oldDelta, source) {
            editor = quill.getText()
            console.table(oldDelta)
            console.log(source)
            console.table(delta)
            console.log(editor + ' editorrr')


        });
        $('.group').on('change', function (e) {
            editor = quill.getText()
            console.log('the editor')
            e.preventDefault()
            group = e.target.value
            console.log(group)
        })
        document.getElementById("password").addEventListener('change' ,function (evt) {
            password = evt.target.value
            console.log(password)
            console.log('passwords*******************************')
        })
        document.getElementById('basic-url').addEventListener('change' , function (evt) {
            evt.preventDefault()
            email = evt.target.value+'@amaltadrib.com'
        })
          let attachement = [];
        // attachement
        let counter = 0
        pond.onaddfile = function (error , file) {
            console.log('it been dada ')
            console.dir(file)
            console.dir(file.fileExtension)
            if (file.fileExtension.toLowerCase() === 'pdf' || file.fileExtension.toLocaleLowerCase() === 'jpeg' || file.fileExtension.toLocaleLowerCase() === 'png' || file.fileExtension.toLocaleLowerCase() ==='jpg'){
               let id = file.id

                formdata.append('attachement'+id , file.file)
                formdata.append('fileName'+id , file.filename)
                formdata.append('fileType'+id , file.fileExtension )
               let arr =  Array.prototype.slice.call(document.querySelectorAll('.filepond--action-remove-item'))
                const element = arr.pop()
                element.setAttribute('data-remove' , 'attachement'+id)
                element.setAttribute('data-name' ,'fileName'+id )
                element.setAttribute('data-type' ,'fileType'+id )
                document.querySelectorAll('.filepond--file-action-button').forEach(rm => {
                    rm.addEventListener('click' , function () {
                        formdata.delete(rm.getAttribute('data-remove'))
                        formdata.delete(rm.getAttribute('data-name'))
                        formdata.delete(rm.getAttribute('data-type'))
                        console.log('removed')
                    })
                })
                    }else {
                alert('nopp')
                pond.removeFile(file.file)
            }
        }



        button.addEventListener('click', function (e) {
            e.preventDefault();
            button.setAttribute('disabled' , 'true')
            console.log('***********')
            console.dir(attachement)
            console.log('***********')
            let data = {
                'image': base64data,
                'user_id' : user_id,
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
                'email' : email,
                'password' : passwordData
            }
            data['image'] = src
            console.table(data)
            for (let key in data){
                formdata.append(key , data[key])
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('admin.pre_registration.finalize') }}",
                data:formdata ,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $(document).find('span.error-text').text('');
                    // $(document).find('h6.error_message').hide();

                },
                success: function(data){
                    $('#successAprrove').modal('show')
                    if(data.status === 0){
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
                            window.location.href = '{{ route('admin.pre_registration') }}';
                        }, 1000);

                        {{--//  window.location.href = '{{ route('admin.pre_registration') }}'--}}
                    }

                } ,
                error: function (data) {
                    console.log(data)
                    $('#errorAprrove').modal('show')
                }
            });

        })
        //DropZone js


        //password generator
        var passwordBtn =document.getElementById("password");
        function genPassword() {
            var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            var passwordLength = 12;
            var password = "";
            for (var i = 0; i <= passwordLength; i++) {
                var randomNumber = Math.floor(Math.random() * chars.length);
                password += chars.substring(randomNumber, randomNumber +1);
            }
            document.getElementById("password").value = password;
            passwordData = password

        }
        function copyPassword() {
            var copyText = document.getElementById("password");
            copyText.select();
            copyText.setSelectionRange(0, 999);
            document.execCommand("copy");

        }
        passwordBtn.addEventListener('click' , genPassword)

    </script>

@endsection
