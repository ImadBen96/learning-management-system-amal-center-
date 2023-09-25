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
    <!-- Page header-->
          <div style="background: #18113c!important;" class="py-4 py-lg-6">
              <div class="container">
                  <div class="row">
                      <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                          <div class="d-lg-flex align-items-center justify-content-between">
                              <!-- Content -->
                              <div class="mb-4 mb-lg-0">
                                  <h1 class="text-white mb-1">Add New Quizz</h1>
                                  <p class="mb-0 text-white lead">
                                      Just fill the form and create your quizz.
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
                  <div id="courseForm" class="bs-stepper">
                      <div class="row">
                          <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                              <!-- Stepper Button -->
                              <div style="direction: rtl" class="bs-stepper-header shadow-sm" role="tablist">
                                  <div class="step" data-target="#test-l-1">
                                      <div  class="step-trigger" role="tab" id="courseFormtrigger1" aria-controls="test-l-1" disabled>
                                          <span class="bs-stepper-circle">1</span>
                                          <span style="font-size: 20px;"  class="bs-stepper-label arab">اختبار 1</span>
                                      </div>
                                  </div>
                                  <div class="bs-stepper-line"></div>
                                  <div class="step" data-target="#test-l-2">
                                      <div  class="step-trigger" role="tab" id="courseFormtrigger2" aria-controls="test-l-2" disabled>
                                          <span class="bs-stepper-circle">2</span>
                                          <span style="font-size: 20px;" class="bs-stepper-label arab"> اختبار 2</span>
                                      </div>
                                  </div>
                                  <div class="bs-stepper-line"></div>
                                  <div class="step" data-target="#test-l-3">
                                      <div type="button" class="step-trigger" role="tab" id="courseFormtrigger3" aria-controls="test-l-3" disabled>
                                          <span class="bs-stepper-circle">3</span>
                                          <span style="font-size: 20px;" class="bs-stepper-label arab"> اختبار 3 </span>
                                      </div >
                                  </div>
                                  <div class="bs-stepper-line"></div>
                                  <div class="step" data-target="#test-l-4">
                                      <div type="button" class="step-trigger" role="tab" id="courseFormtrigger4" aria-controls="test-l-4" disabled>
                                          <span class="bs-stepper-circle">4</span>
                                          <span style="font-size: 20px;" class="bs-stepper-label arab">  تحميل </span>
                                      </div>
                                  </div>
                              </div>
                              <!-- Stepper content -->
                              <div class="bs-stepper-content mt-5">
                                  <form  id="wizzard" enctype="multipart/form-data">
                                  @csrf
                                  <!-- Content one -->
                                      <div id="test-l-1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger1">
                                          <!-- Card -->
                                          <div class="card mb-3 ">
                                              <div class="card-header border-bottom px-4 py-3">
                                                  <h4 style="text-align: end;" class="arab mb-0">quizz 1 </h4>
                                              </div>
                                              <!-- Card body -->
                                              <div class="card-body">
                                                  <div style="text-align: end;" class="mb-3">
                                                      <label for="quizz_category" class="arab form-label">فئة</label>
                                                      <select id="quizz_category1" style="direction: rtl;" name="quizz_category"  class="form-control form-control-sm arab" data-width="100%" required>
                                                          <option value=""> فئة </option>
                                                          @foreach( \App\Models\admin\Cource::all() as $cource)

                                                              <option value="{{ $cource->cource_title }}"> {{  $cource->cource_title }} </option>
                                                          @endforeach
                                                      </select>
                                                  </div>
                                                  <div style="text-align: end;" class="mb-3">
                                                      <label for="quizzQuiqqInpt" class="arab form-label">أدخال السؤال</label>
                                                      <input type="file" class="filepond" id="quizzQuiqqInpt"  name="filepond" data-max-file-size="3MB">
                                                  </div>
                                                  <div style="text-align: end;" class="mb-3">
                                                      <label for="uploadAnsewrs1" class="arab form-label">ادخال الأجوبة</label>
                                                      <input id="uploadAnsewrs1" type="file" class="filepond" name="filepond" data-max-file-size="3MB" data-max-files="4" multiple>
                                                  </div>
                                                  <div style="text-align: end;" class="mb-3">
                                                      <label for="rightAnswer1" class="arab form-label rightAnswer1" hidden>تحديد اﻷجوبة الصحيحة</label>
                                                  </div>
                                              </div>
                                          </div>
                                          <!-- Button -->
                                          <button id="first_next_btn" class="btn btn-primary" onclick="return handleNextButton()" disabled>
                                              التالي
                                          </button>
                                      </div>
                                      <div id="test-l-2" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger2">
                                          <!-- Card -->
                                          <div class="card mb-3 ">
                                              <div class="card-header border-bottom px-4 py-3">
                                                  <h4 style="text-align: end;" class="arab mb-0">quizz 2 </h4>
                                              </div>
                                              <!-- Card body -->
                                              <div class="card-body">
                                                  <div style="text-align: end;" class="mb-3">
                                                      <label for="quizz_category" class="arab form-label">فئة</label>
                                                      <select id="quizz_category2" style="direction: rtl;" name="quizz_category"  class="form-control form-control-sm arab" data-width="100%" required>
                                                          <option value=""> فئة </option>
                                                          @foreach( \App\Models\admin\Cource::all() as $cource)
                                                             <option value="{{ $cource->cource_title }}"> {{  $cource->cource_title }} </option>
                                                          @endforeach
                                                      </select>
                                                  </div>
                                                  <div style="text-align: end;" class="mb-3">
                                                      <label for="quizzQuiqqInpt" class="arab form-label">أدخال السؤال</label>
                                                      <input type="file" class="filepond" id="secondQuizz"  name="filepond" data-max-file-size="3MB">
                                                  </div>
                                                  <div style="text-align: end;" class="mb-3">
                                                      <label for="uploadAnsewrs1" class="arab form-label">ادخال الأجوبة</label>
                                                      <input id="uploadAnsewrs1" type="file" class="filepond" name="filepond" data-max-file-size="3MB" data-max-files="4" multiple>
                                                  </div>
                                                  <div style="text-align: end;" class="mb-3">
                                                      <label for="rightAnswer2" class="arab form-label rightAnswer2" hidden>تحديد اﻷجوبة الصحيحة</label>
                                                  </div>
                                              </div>
                                          </div>

                                          <!-- Button -->
                                          <div class="d-flex justify-content-between">
                                              <button class="btn btn-secondary" onclick="return goBack()">
                                                  السابق
                                              </button>
                                              <button class="btn btn-primary" id="second_next_btn" onclick="return handleNextButton()"   disabled>
                                                  التالي
                                              </button>
                                          </div>
                                      </div>
                                      <!-- Content three -->
                                      <div id="test-l-3" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger3">
                                          <!-- Card -->
                                          <div class="card mb-3 ">
                                              <div class="card-header border-bottom px-4 py-3">
                                                  <h4 style="text-align: end;" class="arab mb-0">quizz 3</h4>
                                              </div>
                                              <!-- Card body -->
                                              <div class="card-body">
                                                  <div style="text-align: end;" class="mb-3">
                                                      <label for="quizz_category" class="arab form-label">فئة</label>
                                                      <select id="quizz_category3" style="direction: rtl;" name="quizz_category"  class="form-control form-control-sm arab" data-width="100%" required>
                                                          <option value=""> فئة </option>
                                                      @foreach( \App\Models\admin\Cource::all() as $cource)
                                                              <option value="{{ $cource->cource_title }}"> {{  $cource->cource_title }} </option>
                                                          @endforeach
                                                      </select>
                                                  </div>
                                                  <div style="text-align: end;" class="mb-3">
                                                      <label for="quizzQuiqqInpt" class="arab form-label">أدخال السؤال</label>
                                                      <input type="file" class="filepond" id="quizzQuiqqInpt"  name="filepond" data-max-file-size="3MB">
                                                  </div>
                                                  <div style="text-align: end;" class="mb-3">
                                                      <label for="uploadAnsewrs1" class="arab form-label">ادخال الأجوبة</label>
                                                      <input id="uploadAnsewrs1" type="file" class="filepond" name="filepond" data-max-file-size="3MB" data-max-files="4" multiple>
                                                  </div>
                                                  <div style="text-align: end;" class="mb-3">
                                                      <label for="rightAnswer3" class="arab form-label rightAnswer3" hidden>تحديد اﻷجوبة الصحيحة</label>
                                                  </div>
                                              </div>
                                          </div>

                                          <!-- Button -->
                                          <div class="d-flex justify-content-between">
                                              <button class="btn btn-secondary" onclick="return goBack()">
                                                  السابق
                                              </button>
                                              <button class="btn btn-primary" id="third_btn" onclick="return handleNextButton()" disabled>
                                                  التالي
                                              </button>
                                          </div>
                                      </div>
                                      <!-- Content four -->
                                      <div id="test-l-4" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger4">
                                          <!-- Card -->
                                          {{--                                            <div class="card mb-3  border-0">--}}
                                          {{--                                                <div class="card-header border-bottom px-4 py-3">--}}
                                          {{--                                                    <h4 class="mb-0">Requirements</h4>--}}
                                          {{--                                                </div>--}}
                                          {{--                                                <!-- Card body -->--}}
                                          {{--                                                <div class="card-body">--}}
                                          {{--                                                    <input name='tags' value='jquery, bootstrap' autofocus>--}}
                                          {{--                                                </div>--}}
                                          {{--                                            </div>--}}
                                          <div class="card mb-4 card-hover  ">
                                              <div class="row g-0">
                                                  <!-- Image -->
                                                  <a href="blog-single.html" class="col-lg-8 col-md-12 col-12 bg-cover img-left-rounded" style="background-image: url( {{ asset('assets/images/png/neonbrand-zFSo6bnZJTw-unsplash.jpg') }});">
                                                      <img src=" {{ asset('assets/images/png/neonbrand-zFSo6bnZJTw-unsplash.jpg') }} " class="img-fluid d-lg-none invisible" alt=""></a>
                                                  <div class="col-lg-4 col-md-12 col-12">
                                                      <!-- Card Body -->
                                                      <div class="card-body">
                                                          <a href="#" class="badge bg-warning mb-3">Courses</a>
                                                          <h1 class="mb-4"> <a href="blog-single.html" class="text-inherit">
                                                                  Amal Tadrib Quizz Creator
                                                              </a>
                                                          </h1>
                                                          <p>the quizzes will persisted in our cloud servers databases
                                                          </p>
                                                          <!-- Media Content -->
                                                          <div class="row align-items-center g-0 mt-7">
                                                              <div class="col-auto">
                                                                  <img src=" {{ asset('assets/images/souad_quadi.jpeg') }}" alt="" class="rounded-circle avatar-sm me-2">
                                                              </div>
                                                              <div class="col lh-1 ">
                                                                  <h5 class="mb-1">Souad 👧 </h5>
                                                                  <p class="fs-6 mb-0 courseDay"></p>
                                                              </div>
                                                              <div class="col-auto">
                                                                  <p class="fs-6 mb-0 courseDuration"></p>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="d-flex justify-content-between mb-22">
                                              <!-- Button -->
                                              <button class="btn btn-secondary mt-5" onclick="return goBack()">
                                                  السابق
                                              </button>
                                              <button  class="btn btn-danger mt-5" id="submition">
                                                  ارسال
                                              </button>
                                          </div>
                                      </div>
                                  </form>
                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  Sorry . the file type not supported
                                              </div>
                                              <div style="width:100%;height:0;padding-bottom:125%;position:relative;"><iframe src="https://giphy.com/embed/7OWKRDdPRgeJjARykf" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="modal fade" id="exampleModal-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  Sorry . you reached the quota upload
                                              </div>
                                              <div style="width:100%;height:0;padding-bottom:56%;position:relative;"><iframe src="https://giphy.com/embed/3o7WIwkSmw32NgXvTG" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div><p><a href="https://giphy.com/gifs/3o7WIwkSmw32NgXvTG"></a></p>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  Hahaha don't event Think
                                              </div>
                                              <div style="width:100%;height:0;padding-bottom:125%;position:relative;"><iframe src="{{ asset('assets/images/maroc-morocco.gif') }}" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="modal" id="sentCourseModal" tabindex="-1" role="dialog">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title">Modal title</h5>
                                                  <button type="button" class="btn-close closeDataModal" data-bs-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  <div class="waitWrapper">
                                                      <p> The Data is sent to the cloud right now </p>
                                                      <div class="text-dark" >
                                                          <lottie-player src=" {{ asset('assets/lotties/9329-loading.json') }}" background="transparent"  speed="0.5"  style="width: 300px; height: 300px;" loop autoplay ></lottie-player>
                                                      </div>
                                                  </div>
                                                  <div class="successUploadCloud" hidden>
                                                      <h2> All courses related data is saved in our cloud based servers  . Check the Course Display  </h2>
                                                      <lottie-player src=" {{ asset('assets/lotties/267-like-thumb-up-outline.json') }}" background="transparent"  speed="0.5"  style="width: 300px; height: 300px;" loop autoplay ></lottie-player>
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
                                  <!-- Button trigger modal -->
                                  <!-- Modal -->
                                  <div class="modal fade" id="notsupported" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  <img src="{{ asset('assets/images/BestFileFormat.png') }}">
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="modal fade" id="quizzInfo" tabindex="-1" role="dialog" >
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  Quiz questions can be images audio or videos. answers must be images and you can choose the title of the course that holds the quiz by choosing the select category.
                                                  Please be careful about your data selection and don't select that randomly for the cost of cloud servers.
                                                  best regards 🥰
                                              </div>
                                              <div style="width:100%;height:0;padding-bottom:125%;position:relative;"><iframe src="https://giphy.com/embed/7OWKRDdPRgeJjARykf" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-success" data-bs-dismiss="modal">I understand</button>
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
        </div>
    </div>
    <div class="modal" id="sentCourseModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
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
                        <lottie-player src=" {{ asset('assets/lotties/267-like-thumb-up-outline.json') }}" background="transparent"  speed="0.5"  style="width: 300px; height: 300px;" loop autoplay ></lottie-player>
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


@endsection()
@section('script')
    <script src="{{ asset('libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src=" {{ asset('libs/odometer/odometer.min.js') }}"></script>
    <script src=" {{ asset('libs/jquery-slimscroll/jquery.slimscroll.min.js') }} "></script>
    <script src=" {{ asset('libs/magnific-popup/dist/jquery.magnific-popup.min.js') }} "></script>
    <script src=" {{ asset('libs/bootstrap-select/dist/js/bootstrap-select.min.js') }} "></script>
    <script src=" {{ asset('libs/flatpickr/dist/flatpickr.min.js') }}  "></script>
    <script src=" {{ asset('libs/inputmask/dist/jquery.inputmask.min.js') }} "></script>
    <script src=" {{ asset('libs/apexcharts/dist/apexcharts.min.js') }} "></script>
    <script src=" {{ asset('libs/quill/dist/quill.min.js') }}"></script>
    <script src=" {{ asset('libs/file-upload-with-preview/dist/file-upload-with-preview.min.js') }} "></script>
    <script src=" {{ asset('libs/dragula/dist/dragula.min.js') }}"></script>
    <script src=" {{ asset('libs/bs-stepper/dist/js/bs-stepper.min.js') }}"></script>
    <script src=" {{ asset('libs/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src=" {{ asset('libs/jQuery.print/jQuery.print.js') }}"></script>
    <script src=" {{ asset('libs/prismjs/prism.js') }}"></script>
    <script src=" {{ asset('libs/prismjs/components/prism-scss.min.js') }}"></script>
    <script src=" {{ asset('libs/@yaireo/tagify/dist/tagify.min.js') }}"></script>
    <script src=" {{ asset('libs/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src=" {{ asset('libs/tippy.js/dist/tippy-bundle.umd.min.js') }}"></script>
    <script src=" {{ asset('libs/typed.js/lib/typed.min.js') }}"></script>
    <script src=" {{ asset('libs/jsvectormap/dist/js/jsvectormap.min.js') }} "></script>
    <script src=" {{ asset('libs/jsvectormap/dist/maps/world.js') }} "></script>
    <script src=" {{ asset('libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src=" {{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }} "></script>
    <script src=" {{ asset('libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }} "></script>
    <script src=" {{ asset('libs/datatables.net-responsive/js/dataTables.responsive.min.js') }} "></script>
    <script src=" {{ asset('libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script>
        // handling file pond
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize,
            FilePondPluginImageEdit
        );
        let ponds = []
        let formdata = new FormData()
        // category select handler
        document.querySelector('#quizz_category1').addEventListener('change' , function (evt) {
            evt.preventDefault()
            console.log(' first entry ')
            formdata.append('firstQuizzCat' , evt.target.value)
        })
        document.querySelector('#quizz_category2').addEventListener('change' , function (evt) {
            evt.preventDefault()
            console.log(' first entry ')
            formdata.append('secondQuizzCat' , evt.target.value)
        })
        document.querySelector('#quizz_category3').addEventListener('change' , function (evt) {
            evt.preventDefault()
            console.log(' first entry ')
            formdata.append('thirdQuizzCat' , evt.target.value)
        })
        document.querySelectorAll('input[name="filepond"]').forEach(elm => {
            console.log('it works')
            const tmp = FilePond.create(elm);
            ponds.push(tmp)
        })
        document.querySelectorAll('.filepond--credits').forEach(elm => {
            elm.innerText = 'Powered By Business Center Labs'
        })


        let acceptedExt = ['jpeg' , 'jpg' , 'png' , 'mp3' , 'mp4']
        let filescount = 1 ;
        let filecount1 = 1
        let filecount2 = 1
        let filecountQes = 1
        let filecountQes1 = 1
        let filecountQes2 = 1
        async function handleFileQuestions(){

            ponds[0].on('addfile', (error, file) => {
                console.log(file.fileExtension)
                if (error) {
                    console.log('Oh no');
                    return;
                }
                if (acceptedExt.find(elm => elm === file.fileExtension) === undefined){
                    console.log(' file not supported')
                    $('#notsupported').modal('show')
                    ponds[0].removeFile(file.file)
                }
                console.log('File added', file);
                filecountQes++
                formdata.append('quizzquestion1' , file.file);
                formdata.append('quizzquestionType1' , file.fileExtension);


            })
            ponds[0].on('removefile', (error, file) => {
                if (error) {
                    console.log('Oh no');
                    return;
                }
                console.log('File removed', file);
                formdata.delete('quizzquestion1')
                formdata.delete('quizzquestionType1')
            })
        }
        async function handleFileAnsewrs() {
            ponds[1].on('addfile', (error, file) => {

                if (error) {
                    console.log('Oh no');
                    return;
                }
               if (filescount === 1 ){
                   document.querySelector('.rightAnswer1').removeAttribute('hidden')
                   let choseElem = `<select id="rightAnswer1" style="direction: rtl;" class="form-control form-control-sm arab" name="rightOne" data-width="100%" required  ><option value=""> جواب صحيح </option> </select>`
                   const selectElm = document.querySelector('.rightAnswer1')
                   selectElm.insertAdjacentHTML('afterend' , choseElem)
                   document.querySelector('#rightAnswer1').addEventListener('change' , function (e) {
                       e.preventDefault()
                       console.log('the right answer is ' + e.target.value)
                       formdata.append('firstQuizzRightAnswer' , e.target.value)

                   })
               }
                console.log('File added', ponds[1].getFile().filename);
                filescount++
                let option = document.createElement('option')
                option.value = (filescount-1)
                option.text = 'Ansewr '+(filescount-1)
                option.className += "firstquizzAnsewr"+file.id
                document.querySelector('#rightAnswer1').appendChild(option)
                formdata.append("firstquizzAnsewr"+file.id , file.file)
                if (filecountQes === 2 && filescount === 3 ){
                    document.querySelector('#first_next_btn').removeAttribute('disabled')
                }

            })

            ponds[1].on('removefile', (error, file) => {
                if (error) {
                    console.log('Oh no');
                    return;
                }
                console.log('File removed', file);
                formdata.delete("firstquizzAnsewr"+file.id)
                filescount--
                document.querySelector(`.${"firstquizzAnsewr"+file.id}`).remove()
            })
        }
        function handleNextButton() {
            courseForm.next()
            return false;
        }
        async function handleFileQuestions2(){

            ponds[2].on('addfile', (error, file) => {
                console.log(file.fileExtension)
                if (error) {
                    console.log('Oh no');
                    return;
                }
                console.log('File added', file);
                filecountQes1++
                formdata.append('quizzquestion2' , file.file);
                formdata.append('quizzquestionType2' , file.fileExtension);

            })
            ponds[2].on('removefile', (error, file) => {
                if (error) {
                    console.log('Oh no');
                    return;
                }
                filecountQes1--
                console.log('File removed', file);
                formdata.delete('quizzquestion2')
                formdata.delete('quizzquestionType2')
            })
        }
        async function handleFileAnsewrs2() {
            ponds[3].on('addfile', (error, file) => {

                if (error) {
                    console.log('Oh no');
                    return;
                }
                if (filecount1 === 1 ){
                    document.querySelector('.rightAnswer1').removeAttribute('hidden')
                    let choseElem = `<select id="rightAnswer2" style="direction: rtl;" class="form-control form-control-sm arab" name="rightOne" data-width="100%" required  > <option value="">  جواب صحيح</option></select>`
                    const selectElm = document.querySelector('.rightAnswer2')
                    selectElm.insertAdjacentHTML('afterend' , choseElem)
                    document.querySelector('#rightAnswer2').addEventListener('change' , function (e) {
                        e.preventDefault()
                        console.log('the right answer is ' + e.target.value)
                        formdata.append('secondQuizzRightAnswer' , e.target.value)


                    })
                }
                console.log('File added', file.filename);
                filecount1++
                let option = document.createElement('option')
                option.value = ''+(filecount1-1)
                option.text = 'Ansewr '+(filecount1-1)
                option.className += "secondquizzAnsewr"+file.id
                document.querySelector('#rightAnswer2').appendChild(option)
                formdata.append("secondquizzAnsewr"+file.id , file.file)
                if (filecountQes1 === 2 && filecount1 === 3 ){
                    document.querySelector('#second_next_btn').removeAttribute('disabled')
                }

            })
            ponds[3].on('removefile', (error, file) => {
                if (error) {
                    console.log('Oh no');
                    return;
                }
                console.log('File removed', file);
                formdata.delete("secondquizzAnsewr"+file.id)
                filecount1--
                document.querySelector(`.${"secondquizzAnsewr"+file.id}`).remove()
            })
        }
        async function handleFileQuestions3(){

            ponds[4].on('addfile', (error, file) => {
                console.log(file.fileExtension)
                if (error) {
                    console.log('Oh no');
                    return;
                }
                console.log('File added', file);
                filecountQes2++
                formdata.append('quizzquestion3' , file.file);
                formdata.append('quizzquestionType3' , file.fileExtension);

            })
            ponds[4].on('removefile', (error, file) => {
                if (error) {
                    console.log('Oh no');
                    return;
                }
                filecountQes2--
                console.log('File removed', file);
                formdata.delete('quizzquestion3')
                formdata.delete('quizzquestionType3')
            })
        }
        async function handleFileAnsewrs3() {
            ponds[5].on('addfile', (error, file) => {

                if (error) {
                    console.log('Oh no');
                    return;
                }
                if (filecount2 === 1 ){
                    document.querySelector('.rightAnswer3').removeAttribute('hidden')
                    let choseElem = `<select id="rightAnswer3" style="direction: rtl;" class="form-control form-control-sm arab" name="rightOne" data-width="100%" required  > <option value=""> جواب صحيح </option></select>`
                    const selectElm = document.querySelector('.rightAnswer3')
                    selectElm.insertAdjacentHTML('afterend' , choseElem)
                    document.querySelector('#rightAnswer3').addEventListener('change' , function (e) {
                        e.preventDefault()
                        console.log('the right answer is ' + e.target.value)
                        formdata.append('thirdQuizzRightAnswer' , e.target.value)

                    })
                }
                console.log('File added', file.filename);
                filecount2++
                let option = document.createElement('option')
                option.value = ''+(filecount2-1)
                option.text = 'Ansewr '+(filecount2-1)
                option.className += "thirdquizzAnsewr"+file.id
                document.querySelector('#rightAnswer3').appendChild(option)
                formdata.append("thirdquizzAnsewr"+file.id , file.file)
                if (filecountQes2 === 2 && filecount2 === 3  && formdata.get('thirdQuizzCat') !== undefined){
                    document.querySelector('#third_btn').removeAttribute('disabled')
                }

            })
            ponds[5].on('removefile', (error, file) => {
                if (error) {
                    console.log('Oh no');
                    return;
                }
                console.log('File removed', file);
                formdata.delete("thirdquizzAnsewr"+file.id)
                filecount2--
                document.querySelector(`.${"thirdquizzAnsewr"+file.id}`).remove()
            })
        }
        // document.querySelector('#submition').addEventListener('click' , function (evt) {
        //     evt.preventDefault()
        //     for (let key of formdata.keys()){
        //         console.log(`key ${key} and the entry ${formdata.get(key)}`)
        //     }
        // })
        function successAnimation() {
            $('.successUploadCloud').fadeOut('show').removeAttr('hidden')
            $('.waitWrapper').attr('hidden' , 'true')
        }
        function failureAnimation() {
            $('.successUploadCloud').fadeOut('show').attr('hidden' , 'true')
            $('.waitWrapper').attr('hidden' , 'true')
            $('.failedUploadCloud').fadeOut('show').attr('hidden' , 'true')
        }
        function handleSubmitiion() {
          const sub = document.querySelector('#submition')
            sub.addEventListener('click' , function (evt) {
                evt.preventDefault()
                sub.setAttribute('disabled' , 'true')
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                $.ajax({
                    type : 'POST' ,
                    url : "{{ route('admin.quizz.create') }}",
                    data : formdata ,
                    processData: false ,
                    contentType: false ,
                    success: (response) => {
                        console.table(response)
                        setTimeout(function () {
                            successAnimation()
                        } , 5000)
                    },
                    error: function(response){
                        console.log(response)
                        setTimeout(function () {
                            failureAnimation()
                        } , 5000)
                    }
                })
                $('#sentCourseModal').show()
                $('.closeDataModal').click(function (evt) {
                    evt.preventDefault()
                    $('#sentCourseModal').hide()
                })
            })
        }
        function goBack() {
            courseForm.previous();
            return false;
        }


        handleFileQuestions()
        handleFileAnsewrs()
        handleFileQuestions2()
        handleFileAnsewrs2()
        handleFileQuestions3()
        handleFileAnsewrs3()
        handleSubmitiion()
        //sencond quizz handling
        $('#quizzInfo').modal('show')
    </script>
@endsection()
    <style>
        .btn-primary {
            background-color: #18113c!important;
        }
        .step {
            pointer-events:none;
        }
        .modal-header , .modal-footer{
            background-color: #18113c;
        }
    </style>
