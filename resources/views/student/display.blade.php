@extends('student.student_layouts')
@section('title', 'Course')
@section('content')
    <div class=" course-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Tab content -->
                    <div class="tab-content content" id="course-tabContent">
                        @foreach( $videos as $key=>$video)
                            @if( $key === 1)
                                <div class="tab-pane fade active show" id="videoCource{{ $key+1 }}" role="tabpanel" aria-labelledby="course-development-tab">
                                    <div class="d-lg-flex align-items-center justify-content-between mb-4">
                                        <div>
                                            <h2 class="h3 mb-0">{{ $video->videoCourseTitle }}</h2>
                                        </div>
                                    </div>
                                    <!-- Video -->
                                    <div class="embed-responsive  position-relative w-100 d-block overflow-hidden p-0" style="height: 600px;">
                                        <video id="example-video{{ $key + 1 }}" class="video-js vjs-matrix  vjs-big-play-centered vjs-big-play-button" controls
                                               preload="auto"
                                               width="1088"
                                               height="450" data-setup='{}'
                                               style="border-width: 4px;border-color: #754ffe;"
                                        >
                                            <source src="{{ $video->videoCourceUrl }}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            @else
                                <div class="tab-pane fade" id="videoCource{{ $key+1 }}" role="tabpanel" aria-labelledby="course-development-tab">
                                    <div class="d-lg-flex align-items-center justify-content-between mb-4">
                                        <div>
                                            <h2 class="h3 mb-0">{{ $video->videoCourseTitle }}</h2>
                                        </div>
                                    </div>
                                    <!-- Video -->
                                    <div class="embed-responsive  position-relative w-100 d-block overflow-hidden p-0" style="height: 600px;">
                                        <video id="example-video{{ $key + 1 }}" class="video-js vjs-matrix  vjs-big-play-centered vjs-big-play-button" controls
                                               preload="auto"
                                               width="1088"
                                               height="450" data-setup='{}'
                                               style="border-width: 4px;border-color: #754ffe;"
                                        >
                                            <source src="{{ $video->videoCourceUrl }}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    <!-- Tab pane -->
                        @foreach( $podcasts as  $key=>$podcast)
                            <div class="tab-pane fade" id="podcastCource{{ $key+1 }}" role="tabpanel" aria-labelledby="podcast-cource">
                                <div class="d-lg-flex align-items-center justify-content-between mb-4">
                                    <div>
                                        <h2 class="h3 mb-0">{{ $podcast->podcastName }} </h2>

                                    </div>
                                </div>
                                <!-- Video -->
                                <div class="embed-responsive  position-relative w-100 d-block overflow-y-auto p-0 fifth" style="height: 1000px;">
                                    <div class="player">
                                        <div class="cover">
                                            <img src="{{ asset('assets/icons8-team-7LNatQYMzm4-unsplash.jpg') }}" alt="">
                                        </div>
                                        <div class="info">
                                            <div class="title">بودكاست</div>
                                        </div>
                                        <div class="volume-box">
                                            <span class="volume-down"><i class="material-icons">remove</i></span>
                                            <input type="range" class="volume-range" step="1" value="80" min="0" max="100"
                                                   oninput="music.volume = this.value/100">
                                            <span class="volume-up"><i class="material-icons">add</i></span>
                                        </div>
                                        <div class="btn-box">
                                            <i class="material-icons repeat" >repeat</i>
                                            <img src="{{ asset('assets/logo_byad.svg') }}" class="favorite" height="70px" width="70px">
                                            <i class="material-icons volume" >volume_up</i>
                                        </div>
                                        <div class="music-box">
                                            <input type="range" step="1" class="seekbar" value="0" min="0" max="100" oninput="handleSeekBar()">

                                            <audio class="music-element">
                                                <source src="{{ $podcast->podcastUrl }}" type="audio/mp3">
                                            </audio>
                                            <span class="current-time">0:0</span><span class="duration">0:0</span>
                                            <a class="play" onclick="handlePlay()"> <i class="material-icons">play_arrow</i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    <!-- Tab pane -->
                        @foreach( $quizzes as $key=>$quizze)
                            <div class="tab-pane fade" id="quizz-course-{{ $key + 1}}" role="tabpanel" aria-labelledby="quizz-course-{{ $key + 1}}">
                                <div class="d-lg-flex align-items-center justify-content-between mb-4 h-20">
                                    <div >
                                        <h2 class="h3 mb-0 "> سؤال {{ $key + 1 }} </h2>
                                    </div>
                                </div>
                                @if( \App\Models\admin\Question::where('quiz_id', $quizze->id)->first()->type == 'image')
                                    <div class="question-quizz d-flex h-35 justify-content-center">
                                        <img class="questionImage{{ $key+1 }} " src="{{ \App\Models\admin\Question::where('quiz_id', $quizze->id)->first()->img_question }}" height="250px" width="500px">
                                    </div>
                                @elseif( \App\Models\admin\Question::where('quiz_id', $quizze->id)->first()->type == 'video')
                                    <div class="question-quizz d-flex h-35 justify-content-center ">
                                        <div class="position-relative w-50 h-35 d-block overflow-y-auto p-0 d-flex collapse" id="collapseExample{{ $key + 1 }}">
                                            <video id="video-quest-{{ $key + 1 }}" class="video-js vjs-matrix  vjs-big-play-centered vjs-big-play-button align-content-center justify-content-center " controls
                                                   preload="auto"
                                                   width="300"
                                                   height="300" data-setup='{}'
                                                   style="border-width: 4px;border-color: #754ffe;"
                                            >
                                                <source src="{{ \App\Models\admin\Question::where('quiz_id', $quizze->id)->first()->txt_question }}" type="video/mp4">
                                            </video>

                                        </div>
                                    </div>
                                @else
                                    <div class="question-quizz d-flex h-35 justify-content-center ">

                                        <div class="embed-responsive position-relative  d-block  p-0 fifth" id="responsive-audio">
                                            <div class="player">
                                                <div class="cover">
                                                    <img src=" {{ asset('assets/icons8-team-7LNatQYMzm4-unsplash.jpg') }}" alt="">
                                                </div>
                                                <div class="info">
                                                    <div class="title">بودكاست</div>
                                                </div>
                                                <div class="volume-box">
                                                    <span class="volume-down"><i class="material-icons">remove</i></span>
                                                    <input type="range" class="volume-range" step="1" value="80" min="0" max="100"
                                                           oninput="music.volume = this.value/100">
                                                    <span class="volume-up"><i class="material-icons">add</i></span>
                                                </div>
                                                <div class="btn-box">
                                                    <i class="material-icons repeat" onclick="handleRepeat()">repeat</i>
                                                    <img src="{{ asset('assets/logo_byad.svg') }}" class="favorite" height="70px" width="70px">
                                                    <i class="material-icons volume" onclick="handleVolume()">volume_up</i>
                                                </div>
                                                <div class="music-box">
                                                    <input type="range" step="1" class="seekbar" value="0" min="0" max="100" oninput="handleSeekBar()">

                                                    <audio class="music-element">
                                                        <source src="{{ \App\Models\admin\Question::where('quiz_id', $quizze->id)->first()->audio_question }}" type="audio/mp3">
                                                    </audio>
                                                    <span class="current-time">0:0</span><span class="duration">0:0</span>
                                                    <a class="play" onclick="handlePlay()"> <i class="material-icons">play_arrow</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endif
                            <!-- Video -->
                                <div class=" answers h-10 row row-cols-2 mt-3">
                                    @foreach( \App\Models\admin\Option::where('quizzes_id', $quizze->id)->get() as $key=>$option)
                                        <div class="ans btn col  {{ $key + 1}}" data-category="{{ $quizze->quiz_title }}" data-optionid="{{ $option->id }}" data-ans="{{ $key + 1  }}"  > <span class="ansOne "> جواب {{ $key+1 }}</span> <img class=" border border-primary" src="{{ $option->content }}" width="400" height="90"></div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <div class="tab-pane  fade" id="quizz-result" role="tabpanel" aria-labelledby="podcast-course1-tab" style="height: 600px;">
                            <div class="d-lg-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <h2 class="h3 mb-0"> نتيجتك  </h2>
                                </div>
                            </div>

                            <!-- Video -->
                            <div class="embed-responsive  position-relative w-100 d-block overflow-y-auto p-0 fifth" >
                                <!-- basic table -->
                                <table class="table table-dark resultTb">
                                    <thead>
                                    <tr>
                                        <th scope="col">رقم الإختبار</th>
                                        <th scope="col"> رقم الإجابة صحيحة  </th>
                                        <th scope="col">إجابتك</th>
                                        <th scope="col">نتيجة</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <!-- basic table -->
                            </div>

                        </div>

                    </div>
                    <!-- Tab pane -->
                    <!-- Tab pane -->

                </div>
            </div>
        </div>
    </div>
    <!-- Card -->
    <div class="card course-sidebar " id="courseAccordion">
        <!-- List group -->
        <ul class="list-group list-group-flush course-list">

            <li class="list-group-item">
                <h4 class="mb-0"> {{ $course->cource_title }}</h4>
            </li>
            <!-- List group item -->
            <li class="list-group-item">
                <!-- Toggle -->
                <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-bs-toggle="collapse"
                   href="#courseTwo" role="button" aria-expanded="false" aria-controls="courseTwo">
                    <div class="me-auto">
                        فيديوهات الدرس
                    </div>
                    <!-- Chevron -->
                    <span class="chevron-arrow  ms-4">
              <i class="fe fe-chevron-down fs-4"></i>
            </span>
                </a>
                <!-- Row -->
                <!-- Collapse -->
                <div class="collapse show" id="courseTwo" data-bs-parent="#courseAccordion">
                    <div class="py-4 nav" id="course-tabOne" role="tablist" aria-orientation="vertical"
                         style="display: inherit;">
                        @foreach(  $videos as $key=>$video)
                            <a class="mb-2 d-flex justify-content-between align-items-center text-decoration-none"
                               id="course-video-tab{{ $key+1 }}" data-video="courseVideo" data-bs-toggle="pill" href="#videoCource{{ $key+1 }}" role="tab" aria-controls="course-intro"
                               aria-selected="false">
                                <div class="text-truncate">
                                    <span class=" text-primary icon-sm  rounded-circle me-2 rotation" ></span>
                                    <span class="video-title"> فيديو  {{ $key+1}}</span>
                                </div>
                                <div class="text-truncate">
                                    <span class="video-duration"></span>
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>
            </li>
            <!-- List group item -->
            <li class="list-group-item">
                <!-- Toggle -->
                <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-bs-toggle="collapse"
                   href="#courseThree" role="button" aria-expanded="false" aria-controls="courseThree">
                    <div class="me-auto">
                        <!-- Title -->
                        بودكاست
                    </div>
                    <!-- Chevron -->
                    <span class="chevron-arrow  ms-4">
              <i class="fe fe-chevron-down fs-4"></i>
            </span>
                </a>
                <!-- Row -->
                <!-- Collapse -->
                <div class="collapse" id="courseThree" data-bs-parent="#courseAccordion">
                    <div class="py-4 nav" id="course-tabTwo" role="tablist" aria-orientation="vertical"
                         style="display: inherit;">
                        @foreach( $podcasts as $key=>$podcast )
                            <a class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none"
                               id="podcast{{ $key+1 }}-tab2" data-bs-toggle="pill" href="#podcastCource{{ $key+1 }}" role="tab" aria-controls="podcastCource{{ $key+1 }}"
                               aria-selected="false">
                                <div class="text-truncate">
                                    <span class="icon-shape bg-light text-secondary icon-sm  rounded-circle me-2"><i class="fe  fe-mic  fs-6"></i></span>
                                    <span> {{ $podcast->podcastName }} </span>
                                </div>
                                <div class="text-truncate">
                                    <span></span>
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>
            </li>
            <!-- List group item -->
            <li class="list-group-item">
                <!-- Toggle -->
                <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-bs-toggle="collapse"
                   href="#courseSix" role="button" aria-expanded="false" aria-controls="courseSix">
                    <div class="me-auto">
                        <!-- Title -->
                        اختبارات
                    </div>
                    <!-- Chevron -->
                    <span class="chevron-arrow  ms-4">
              <i class="fe fe-chevron-down fs-4"></i>
            </span>
                </a>
                <!-- Row -->
                <!-- Collapse -->
                <div class="collapse" id="courseSix" data-bs-parent="#courseAccordion">
                    <div class="py-4 nav" id="course-tabFour" role="tablist" aria-orientation="vertical"
                         style="display: inherit;">
                        @foreach(  $quizzes as $key=>$quizze )
                            <a class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none "
                               id="course-project-tab6" data-bs-toggle="pill" href="#quizz-course-{{ $key + 1}}" role="tab" aria-controls="course-project"
                               aria-selected="false">
                                <div class="text-truncate">
                  <span class="icon-shape bg-light text-secondary icon-sm  rounded-circle me-2"><i
                          class="fe fe-check  fs-6"></i></span>
                                    <span> {{ $key +1 }}سؤال </span>
                                </div>
                                <div class="text-truncate">
                                    <span></span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </li>
            <!-- List group item -->
            <!-- List group item -->
            <!-- List group item -->
            <!-- List group item -->
            <li class="list-group-item">
                <!-- Toggle -->
                <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-bs-toggle="collapse"
                   href="#courseEleven" role="button" aria-expanded="false" aria-controls="courseEleven">
                    <div class="me-auto">
                        <!-- Title -->
                        Summary
                    </div>
                    <!-- Chevron -->
                    <span class="chevron-arrow  ms-4">
              <i class="fe fe-chevron-down fs-4"></i>
            </span>
                </a>
                <!-- / .row -->
                <!-- Collapse -->
                <div class="collapse" id="courseEleven" data-bs-parent="#courseAccordion">
                    <div class="py-4">
                        <a class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none "
                           id="quizz-result-tab6" data-bs-toggle="pill" href="#quizz-result" role="tab" aria-controls="course-project"
                           aria-selected="false">
                            <div class="text-truncate idiol">
                                <button type="button"  class="btn btn-primary quizzResult w-100">نتيجة الإختبار</button>
                            </div>
                            <div class="text-truncate ">
                                <span></span>
                            </div>
                        </a>
                        <p> رائع تم إستكمال الدرس . </p>
                        <a class="mb-2 mt-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none "
                           id="quizz-result-tab6"  href="{{ route('student.certification') }}"
                           aria-selected="false">
                            <div class="text-truncate idiol">
                                <button type="button"  class="btn btn-success w-100"> تحميل شهادة اﻹنتهاء </button>
                            </div>
                            <div class="text-truncate">
                                <span></span>
                            </div>
                        </a>
                        <a class="mb-2 mt-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none "
                           id="quizz-result-tab6"  href="{{ route('student.dashboard') }}"
                           aria-selected="false">
                            <div class="text-truncate idiol">
                                <button type="button"  class="btn btn-dark-warning w-100">عودة للبداية </button>
                            </div>
                            <div class="text-truncate">
                                <span></span>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    </div>
    <input type="hidden" name="hidden" value="{{ $quizzes->first()->id }}">
    @include('student.includes.footer')
@endsection()

@section('script')
    <script src="{{ asset('assets/js/video.js/dist/video.js') }}"></script>
    <script src="{{ asset('assets/js/circle-progress.js') }}"></script>
    <script>

        let totalDuration  ;
        let elementsTracker = []
        let circleTracker = []
        let videoTracker = []
        let index = 1 ;
        function handleThatShit(param) {
            document.querySelectorAll('[data-video="courseVideo"]').forEach(element => {
                console.log(param + ' **************** param')

                elementsTracker.push(element)
                console.log('************ id ')
                let id = element.getAttribute('aria-controls')
                console.dir(id+ ' ************ id  ************' + index)
                console.dir(element.children[0].children[0])

                const prog = new CircleProgress(element.children[0].children[0] , {
                    max : 100,
                    value : 0,
                    textFormat: 'percent'
                })
                circleTracker.push(prog)
                console.log('****************************** the prog '+ prog)
                let video = document.querySelector('#'+id+' video')
                console.log(video)
                let newPlayer = document.querySelector('#example-video'+`${index}`+'_html5_api')
                videoTracker.push(newPlayer)
                console.log(newPlayer + ' ************* newPlayer')
                console.dir(video)
                console.log('*************')
                let globalDuration ;
                console.log('************')
                console.log('the event handler metadata '+newPlayer.readyState)
                newPlayer.addEventListener('loadedmetadata',function (e) {
                    e.preventDefault()
                    let numberOfMinute , numberOfSecond ;
                    console.log('meta data for videos loaded **********************')
                    console.dir(e)
                    const durationElm = element.children[1].children[0]
                    globalDuration = e.target.duration
                    numberOfMinute = Math.floor(globalDuration/60)
                    numberOfSecond = Math.ceil(globalDuration % 60)
                    if ( numberOfMinute === 0 ){
                        durationElm.innerText = ` s ${numberOfSecond}`
                    }else {
                        durationElm.innerText = `${numberOfMinute} m ${numberOfSecond} s`
                    }
                    console.log(globalDuration + ' the total duration')
                })
                newPlayer.addEventListener('pause',function (e) {
                    e.preventDefault()
                    let pauseDuration = e.target.currentTime
                    console.log(pauseDuration)
                    prog.max = 100
                    let res = (pauseDuration * 100 )/ globalDuration
                    console.log('the res is ****************** '+res)
                    if(!isNaN(res)){

                        prog.value = Math.ceil(res) ;
                    }else {
                        prog.value = Math.ceil(globalDuration)
                    }

                })
                newPlayer.addEventListener('ended',function (e) {
                    e.preventDefault()
                    prog.max = 100
                    prog.value = 100
                })
                newPlayer.addEventListener('play' , function (e) {
                    e.preventDefault()
                    console.log(e.target.duration)
                    console.log("%c inside the video handler" , "{ background : red}")
                })
                console.log('***************')
                index++

            })
            console.dir(circleTracker)
            console.log('******************** vdieos tracking ************************')
            console.dir(videoTracker)
        }
        console.log('array length ' + elementsTracker.length)
        //event listener
        elementsTracker.forEach(element => {
            element.addEventListener('click' , function (e) {
                e.preventDefault()
                index++
                let previousOneIndex = elementsTracker.findIndex(function (e) {
                    const token = e.isEqualNode(element)
                    console.log(token + ' ********** token')
                    return token
                })
                let controlledArea = document.getElementById(element.getAttribute('aria-controls'))
                let videoId = document.querySelector(controlledArea)
                console.log(previousOneIndex)
                elementsTracker[previousOneIndex].setAttribute('aria-selected' , 'false')
                console.log(elementsTracker[previousOneIndex].getAttribute('aria-selected'))
                console.log('**********************')
                element.setAttribute('aria-selected' , 'true')
                console.log(element.getAttribute('aria-selected'))
            })

        })
        function test() {
            for (let i = 1; i <= 5 ; i++) {
                const element	= document.querySelector(`#example-${i}_html5_api`)
                console.log(' ***************** test *******************')
                console.log(element)
                console.log(' ***************** test *******************')
            }
        }
        let param = "{{ count($videos) }}"
        console.log('all video '+ param+'****************************')
        handleThatShit(Number(param))
        test()
    </script>
    <script>
        $(document).ready(function () {
            //handling podcast
            // player
            console.log('%cplayer', 'background : green')
            var music = Array.prototype.slice.call(document.querySelectorAll('.music-element'))
            var playBtn = Array.prototype.slice.call(document.querySelectorAll('.play'))
            var seekbar = Array.prototype.slice.call(document.querySelectorAll('.seekbar'))
            var currentTime = Array.prototype.slice.call(document.querySelectorAll('.current-time'))
            var duration = Array.prototype.slice.call(document.querySelectorAll('.duration'))
            console.log(music.length + ' the music component')
            console.log(playBtn.length + ' the play component')
            console.log(seekbar.length + ' the seekbar component')
            console.log(currentTime.length + ' the currentTime component')
            console.log(duration.length + ' the duration component')
            console.dir(playBtn)
            for (let i = 0; i < music.length ; i++) {
                console.log('inside the handle play')
                function handlePlay() {
                    if (music[i].paused) {
                        music[i].play();
                        playBtn[i].className = 'pause'
                        playBtn[i].innerHTML = '<i class="material-icons">pause</i>'
                    } else {
                        music[i].pause();
                        playBtn[i].className = 'play'
                        playBtn[i].innerHTML = '<i class="material-icons">play_arrow</i>'
                    }
                    music[i].addEventListener('ended', function () {
                        playBtn[i].className = 'play'
                        playBtn[i].innerHTML = '<i class="material-icons">play_arrow</i>'
                        music[i].currentTime = 0
                    });
                }
                playBtn[i].addEventListener('click' , handlePlay)

                music[i].onloadeddata = function () {
                    seekbar[i].max = music[i].duration
                    var ds = parseInt(music[i].duration % 60)
                    var dm = parseInt((music[i].duration / 60) % 60)
                    duration[i].innerHTML = dm + ':' + ds
                }
                music[i].ontimeupdate = function () { seekbar[i].value = music[i].currentTime }
                handleSeekBar = function () { music[i].currentTime = seekbar[i].value }
                music[i].addEventListener('timeupdate', function () {
                    var cs = parseInt(music[i].currentTime % 60)
                    var cm = parseInt((music[i].currentTime / 60) % 60)
                    currentTime[i].innerHTML = cm + ':' + cs
                }, false)
            }
            // like
            var favIcon = Array.prototype.slice.call(document.querySelectorAll('.favorite'))
            console.log(favIcon.length + ' favIvcon length')
            for (let i = 0; i < favIcon.length ; i++) {
                function handleFavorite() {
                    favIcon[i].classList.toggle('active');
                }
            }
// repeat
            var repIcon = Array.prototype.slice.call(document.querySelectorAll('.repeat'))
            console.log(repIcon.length + ' repIcon length')
            for (let i = 0; i <repIcon.length ; i++) {
                function handleRepeat() {
                    if (music[i].loop == true) {
                        music[i].loop = false
                        repIcon[i].classList.toggle('active')
                    }
                    else {
                        music[i].loop = true
                        repIcon[i].classList.toggle('active')
                    }
                }
                repIcon[i].addEventListener('click' , handleRepeat)
            }
            // volume
            var volIcon = Array.prototype.slice.call( document.querySelectorAll('.volume'))
            var volBox = Array.prototype.slice.call(document.querySelectorAll('.volume-box'))
            var volumeRange = Array.prototype.slice.call(document.querySelectorAll('.volume-range'))
            var volumeDown = Array.prototype.slice.call(document.querySelectorAll('.volume-down'))
            var volumeUp = Array.prototype.slice.call( document.querySelectorAll('.volume-up'))
            console.log(volIcon.length+  ' valIcon lenght')
            console.log(volBox.length+  ' valIcon lenght')
            console.log(volumeRange.length+  ' valIcon lenght')
            console.log(volumeDown.length+  ' valIcon lenght')
            console.log(volumeUp.length+  ' valIcon lenght')
            for (let i = 0; i < volIcon.length ; i++) {
                function handleVolume() {
                    volIcon[i].classList.toggle('active')
                    volBox[i].classList.toggle('active')
                }

                function handleVolumeDown() {
                    volumeRange[i].value = Number(volumeRange[i].value) - 20
                    music[i].volume = volumeRange[i].value / 100
                }
                function handleVolumeUp() {
                    volumeRange[i].value = Number(volumeRange[i].value) + 20
                    music[i].volume = volumeRange[i].value / 100
                }
                volIcon[i].addEventListener('click' , handleVolume)
                volumeDown[i].addEventListener('click', handleVolumeDown);
                volumeUp[i].addEventListener('click', handleVolumeUp);
            }

        })
    </script>
    <script>
        //handling podcast
        // player

        let ansewrs = Array.prototype.slice.call(document.querySelectorAll('.ans'))
        let firstQuizzquestionNumber = 3
        let secondQuizzNumber = 3
        let shalow = []
        let clickedAnsewrsTracker = 1 ;
        let clikcedAnsCollecttor= []
        let ansewrsCollector = []
        const numberOfQuizzez = Number('{{ count($quizzes) }}')
        let data = @json( $quizzes );
        let options = @json( $allOptions );
        let rightOptions = []
        let locations = []
        let totalHolder = []
        function predicate(elm){
            return  elm['isCorrect'] === 1
        }
        options.forEach(elm => {
            let helper = elm.filter(predicate)
            let location = elm.indexOf(helper[0])+1
            rightOptions.push(helper[0]['id'])
            locations.push(location)
        })
        if (locations.length === rightOptions.length){
            for (let i = 0; i < locations.length ; i++) {
                totalHolder.push([rightOptions[i] , locations[i]])
            }
        }

        let quizzIds = []
        console.log('******************* data **********************')
        console.log(numberOfQuizzez)
        console.dir(data)
        console.log('******************* data **********************')
        console.log('******************* options **********************')
        console.dir(options)
        console.log('******************* options **********************')
        console.log('******************* right options **********************')
        console.dir(rightOptions)
        console.log('******************* right options **********************')
        console.log('******************* location options **********************')
        console.dir(locations)
        console.log('******************* location options **********************')

        console.log('******************* all holder **********************')
        console.dir(totalHolder)
        console.log('******************* all holder **********************')




        console.log('******************* data **********************')
        console.dir(quizzIds)
        console.log('******************* data **********************')

        function  handleQuiz(){
            console.log('********************* number of quizz **************')
            ansewrs.forEach(ans => {
                ans.addEventListener('click' , function (evt) {
                    let parent = ans.parentElement ;
                    console.log(parent)
                    let childs = parent.childNodes
                    console.dir(childs)
                    childs.forEach(node => {
                        if (node.nodeName === 'DIV'){
                            if (node.getAttribute('class') === ans.getAttribute('class')){
                                node.children[0].classList += ' border-success'
                            }else {
                                node.style.pointerEvents = 'none';
                                node.classList +=' notchoosen'
                            }
                        }
                    })
                })
            })
        }
        handleQuiz()
        let currentAns = []
        console.log(ansewrs.length + ' ansewres number ')
        function handleQuizzResult() {
            console.log('handle quizzzz *******************')
            let tottalresult = 0;
            let numberOfQuiz = numberOfQuizzez
            let temp = 0 ;
            document.querySelectorAll('.ans').forEach(btn => {
                btn.addEventListener('click' , function (event) {

                    const currentId = Number(btn.getAttribute('data-optionid'))
                    const currentResult = Number(btn.getAttribute('data-ans'))
                    const tableresult = document.querySelector('.resultTb tbody');
                    let container = document.createElement('div')
                    let header = document.createElement('h1')
                    header.classList = 'text-success display-3'
                    let tracker = 0
                    console.log('tracker ******************')
                    function search(elm) {
                        return  elm === currentId
                    }
                    if (rightOptions.find(search) !== undefined){
                        //user choice
                        let tr = document.createElement('tr')
                        let th = document.createElement('th')
                        let tr1 = document.createElement('td')
                        let tr2 = document.createElement('td')
                        let tr3 = document.createElement('td')
                        th.setAttribute('scope' , "row")
                        th.innerText = temp + 1
                        tableresult.appendChild(tr)
                        tr1.innerText = currentResult
                        tr2.innerText = locations[temp]
                        tr3.innerText = 'صحيح'
                        tr.appendChild(th)
                        tr.appendChild(tr1)
                        tr.appendChild(tr2)
                        tr.appendChild(tr3)
                        tottalresult++
                    }else {
                        let tr = document.createElement('tr')
                        let th = document.createElement('th')
                        let tr1 = document.createElement('td')
                        let tr2 = document.createElement('td')
                        let tr3 = document.createElement('td')
                        th.setAttribute('scope' , "row")
                        th.innerText = temp + 1
                        tableresult.appendChild(tr)
                        tr1.innerText = currentResult
                        tr2.innerText = locations[temp]
                        tr3.innerText = 'خطأ'
                        tr.appendChild(th)
                        tr.appendChild(tr1)
                        tr.appendChild(tr2)
                        tr.appendChild(tr3)

                    }
                    temp++


                    if (temp === numberOfQuiz){
                        header.innerText = `  نتيجة هي :  ${ Math.floor((tottalresult/(numberOfQuiz) * 10)) }/10`
                        container.appendChild(header)
                        tableresult.append(container)
                    }

                })
            })


        }
        handleQuizzResult()
    </script>
    <script>
        let toggle = []
        document.querySelectorAll('[data-bs-toggle="pill"]').forEach(a => {
            a.addEventListener('click' , function (e) {
                e.preventDefault()
                console.log('%c anchor clicked','background : red')
                let temp = a.href
                console.log(temp)

            })
        })
    </script>
    <script>
        let sudentName = "{{\Illuminate\Support\Facades\Auth::user()->first_name}}"+' '+"{{\Illuminate\Support\Facades\Auth::user()->last_name}}"
        sessionStorage.setItem('studentName' , sudentName)
        sessionStorage.setItem('courseName' , "{{  $course->cource_title }}")
    </script>


@endsection
<style>
    .player {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 330px;
        height: 395px;
        border-radius: 15px;
        background-color: #18113c;
        box-shadow: 0 15px 20px 0 #c58371;
        z-index: 14;
    }
    .player input[type=range] {
        -webkit-appearance: none !important;
        margin: 0px;
        padding: 0px;
        background: #f2eae4;
        height: 5px;
        width: 150px;
        outline: none;
        cursor: pointer;
        overflow: hidden;
        border-radius: 5px;
    }
    .player input[type=range]::-ms-fill-lower {
        background: #f2eae4;
    }
    .player input[type=range]::-ms-fill-upper {
        background: #f2eae4;
    }
    .player input[type=range]::-moz-range-track {
        border: none;
        background: #f2eae4;
    }
    .player input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none !important;
        background: #ff3677;
        height: 5px;
        width: 5px;
        border-radius: 50%;
        box-shadow: -100vw 0 0 100vw #f7d9b9;
    }
    .player input[type=range]::-moz-range-thumb {
        background: #ff3677;
        height: 8px;
        width: 8px;
        border-radius: 100%;
    }
    .player input[type=range]::-ms-thumb {
        -webkit-appearance: none !important;
        background: #ff3677;
        height: 8px;
        width: 8px;
        border-radius: 100%;
    }
    .player .cover {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        position: absolute;
        left: 50%;
        top: 35px;
        transform: translateX(-50%);
        box-shadow: 0 5px 20px 0 #d56c006d;
    }
    .player .cover img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .player .info {
        position: absolute;
        left: 50%;
        top: 212px;
        transform: translateX(-50%);
        text-align: center;
    }
    .favorite{
        transform: translateY(-25px);
    }
    .player .info .title {
        font-size: 20px;
        font-weight: 700;
        color: #444;
        margin-bottom: 2px;
    }
    .player .info .singer {
        font-size: 12px;
        color: #72646f;
    }
    .player .btn-box {
        position: absolute;
        top: 261px;
        width: 100%;
        display: flex;
        justify-content: center;
    }
    .player .btn-box i {
        font-size: 24px;
        color: #72646f;
        margin: 0 30px;
        cursor: pointer;
    }
    .player .btn-box i.active {
        color: #ff3677;
    }
    .player .volume-box {
        display: none;
        position: absolute;
        left: 50%;
        top: 295px;
        transform: translateX(-50%);
        z-index: 20;
        padding: 0 20px;
    }
    .player .volume-box .volume-down {
        position: absolute;
        left: -15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #72646f;
    }
    .player .volume-box .volume-up {
        position: absolute;
        right: -15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #72646f;
    }
    .player .volume-box .volume-up::selection {
        background-color: unset;
    }
    .player .volume-box input[type=range] {
        height: 5px;
        width: 150px;
        margin: 0 0 15px 0;
    }
    .player .volume-box.active {
        display: block;
    }
    .player .music-box {
        position: absolute;
        left: 50%;
        top: 290px;
        transform: translateX(-50%);
    }
    .player .music-box input[type=range] {
        height: 5px;
        width: 230px;
        margin: 0 0 10px 0;
    }
    .player .music-box input[type=range]::-webkit-slider-thumb {
        height: 5px;
        width: 7px;
    }
    .player .music-box .current-time {
        position: absolute;
        left: -35px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 12px;
        color: #72646f;
    }
    .player .music-box .duration {
        position: absolute;
        right: -35px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 12px;
        color: #72646f;
    }
    .player .music-box .play,
    .player .music-box .pause {
        position: absolute;
        display: block;
        left: 50%;
        top: 55px;
        transform: translateX(-50%);
        width: 50px;
        height: 50px;
        border-radius: 50px;
        background-color: #18113c;
        cursor: pointer;
        transition: all 0.4s;
    }
    .player .music-box .play i,
    .player .music-box .pause i {
        font-size: 36px;
        color: #72646f;
        position: absolute;
        left: 50%;
        top: 40%;
        transform: translate(-48%, -50%);
    }
    .player .music-box .pause i {
        font-size: 32px;
        transform: translate(-50%, -50%);
    }
    .player .music-box .play, .player .music-box .pause {
        top: 42px;
    }
    #quizz-result {
        z-index: 1;
    }
    /* modifications */

</style>
<style>
    .video-js {
        border: 1px solid blueviolet;
        border-radius: 10px;
    }
    .vjs-big-play-centered {
        color: blueviolet;
    }
    .vjs-big-play-button{
        border-color: blueviolet !important;
    }
    svg{
        height: 32px;
        width: 32px;
    }
    .video-js {
        width: 100%;
    }
    .answers{
        margin-top: 20px;
    }
    .answers:nth-child(2n+1){
        margin-left: 0;
    }
    .answers:nth-child(2n){
        margin-right: 0;
    }

    .tab-pane{
        height: 500px;
    }
    .tab-pane::-webkit-scrollbar {
        width: 10px;
    }

    .tab-pane::-webkit-scrollbar-thumb {
        background-color: blueviolet;
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }
    .notchoosen{
        opacity: .5;
    }
    .player .volume-box input[type=range] {
        height: 5px;
        width: 150px;
        margin: 83px 0 76px 0;
    }
    .indicator {
        border-radius: 50%;
        position: relative;
        display: inline-block;
        height: 30px;
        width: 30px;
        top: -44px;
        right: 2px;
        background-color: white;
    }
    .indicator:before{
        display: none;
    }
    .footer{
        position: absolute;
        bottom: 0;
    }

    .ans > span {
        position: relative;
        display: block;
        width: 400px;
        right: 10px;
        color: black;
        border: solid 1px #ffd767;
        background-color: #ffd767;
        margin-top: -12px;
        border-radius: 10px;
    }
    .ans > img {
        border-radius: 10px;
        border: 2px solid #00ccff;
    }
    #responsive-audio {
        height: 500px!important;
    }
    .question-quizz > img {
        border-radius: 10px;
        margin-top: -32px;
    }
    .h3 {
        margin-right: -34px;
        background-color: #ffd767;
        border-radius: 10px;
    }
    .idiol {
        width: 100%;
    }

</style>

