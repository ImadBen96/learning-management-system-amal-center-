<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <!-- Brand logo -->
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('assets/logo_byad.svg') }}" alt="" />
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <div class="navbar-heading">MAIN</div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.dashboard') }}">
                    <img style="height: 23px;margin-right: 6px;" src="{{ asset('assets/images/home.svg') }}" /> Dashboard

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link   collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#pre_reg" aria-expanded="false" aria-controls="settings">
                    <img style="height: 19px;margin-right: 6px;" src="{{ asset('assets/images/student_1.svg') }}" /> Students
                </a>

                <div id="pre_reg" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.student') }}">
                                All Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.pre_registration.create') }}">
                                Add Student
                            </a>
                        </li>

                    </ul>

                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link   collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navProfile" aria-expanded="false" aria-controls="navProfile">
                    <img style="height: 21px;margin-right: 5px;" src="{{ asset('assets/images/chef_3.svg') }}" /> Chefs
                </a>
                <div id="navProfile" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.chiefs.index') }}">
                                All Chiefs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.chiefs.create') }}">
                                Add Chief
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <div class="nav-divider"></div>
            </li>
            <li class="nav-item">
                <div class="navbar-heading">Amal Training</div>
            </li>

            <!-- Nav item -->



            <!-- Nav item -->
            <li class="nav-item ">
                <a
                    class="nav-link   collapsed  "
                    href="#!"
                    data-bs-toggle="collapse"
                    data-bs-target="#navCMS"
                    aria-expanded="false"
                    aria-controls="navCMS"
                >
                    <img style="height: 21px;margin-right: 5px;" src="{{ asset('assets/images/online-course.svg') }}"> Amal Courses
                </a>
                <div id="navCMS" class="collapse  " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link  active"  href="{{ route('admin.course.index') }}">
                                All Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="{{ route('admin.course.create') }}">
                                Add Course
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a
                    class="nav-link   collapsed  "
                    href="#!"
                    data-bs-toggle="collapse"
                    data-bs-target="#navCMS1"
                    aria-expanded="false"
                    aria-controls="navCMS1"
                >
                    <img style="height: 21px;margin-right: 5px;" src="{{ asset('assets/images/podcast.svg') }}"> Amal
                    Videos
                </a>
                <div id="navCMS1" class="collapse  " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link  active"  href="{{ route('admin.video.index') }}">
                                All Videos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="{{ route('admin.video.create') }}">
                                Add Video
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a
                    class="nav-link   collapsed  "
                    href="#!"
                    data-bs-toggle="collapse"
                    data-bs-target="#navCMS1"
                    aria-expanded="false"
                    aria-controls="navCMS1"
                >
                    <img style="height: 21px;margin-right: 5px;" src="{{ asset('assets/images/podcast.svg') }}"> Amal
                    Podcasts
                </a>
                <div id="navCMS1" class="collapse  " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link  active"  href="{{ route('admin.podcast.index') }}">
                                All Podcasts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="{{ route('admin.podcast.create') }}">
                                Add Podcast
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#quiz" aria-expanded="false" aria-controls="quiz">
                    <img style="height: 21px;margin-right: 5px;" src="{{ asset('assets/images/mat.svg') }}" /> Amal Materials
                </a>
                <div id="quiz" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.mat.show') }}">
                                All Materials
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.mat.create') }}">
                                Add Material
                            </a>
                        </li>



                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <div class="nav-divider"></div>
            </li>
            <li class="nav-item">
                <div class="navbar-heading">Amal Follow-up</div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navSiteSetting" aria-expanded="false" aria-controls="navSiteSetting">
                    <img style="height: 21px;margin-right: 5px;" src="{{ asset('assets/images/package.svg') }}" /> Monitoring
                </a>
                <div id="navSiteSetting" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.evaluation.index') }}">
                                All Monitoring
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.services.index') }}">
                                All Services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.monitoring.create') }}">
                                Add  Monitoring
                            </a>
                        </li>



                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navAuthentication" aria-expanded="false" aria-controls="navAuthentication">
                    <img style="height: 22px;margin-right: 6px;" src="{{ asset('assets/images/handshake.svg') }}">  InternShips
                </a>
                <div id="navAuthentication" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.interships') }}">All InternShips</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="{{ route('admin.interships.create') }}">Add InternShip</a>
                        </li>


                    </ul>
                </div>
            </li>




            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navTables" aria-expanded="false" aria-controls="navTables">
                    <img style="height: 22px;margin-right: 6px;" src="{{ asset('assets/images/suitcase.svg') }}" /> Jobs Portal<span class="badge bg-warning ms-2">New</span>
                </a>
                <div id="navTables" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.jobs_portal') }}">
                                All Jobs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.jobs_portal.create') }}">
                                Add Job
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <!-- Nav item -->

            <!-- Nav item -->

            <!-- Nav item -->


        </ul>
        <!-- Card -->

    </div>
</nav>
