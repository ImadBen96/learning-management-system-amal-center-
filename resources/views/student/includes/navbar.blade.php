<nav class="navbar navbar-expand-lg navbar-default">
    <div class="container-fluid px-0">
        <a class="navbar-brand" href="{{ route('student.dashboard') }}"
        ><img width="140px" src="{{ asset('assets/logo_dark.svg') }}" alt=""
            /></a>
        <!-- Mobile view nav wrap -->

        <!-- Button -->
        <button
            class="navbar-toggler collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbar-default"
            aria-controls="navbar-default"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="icon-bar top-bar mt-0"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default">


            <ul class="navbar-nav navbar-right-wrap ms-auto d-none d-lg-block">


                <li class="dropdown ms-2 d-inline-block">
                    <a
                        class="rounded-circle"
                        href="#"
                        data-bs-toggle="dropdown"
                        data-bs-display="static"
                        aria-expanded="false"
                    >
                        <div class="avatar avatar-md avatar-indicators avatar-online">
                            <img
                                alt="avatar"
                                src="{{ asset('assets/student/'. Auth::user()->avatar .'') }}"
                                class="rounded-circle"
                            />
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="dropdown-item">
                            <div class="d-flex">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    <img
                                        alt="avatar"
                                        src="{{ asset('assets/student/'. Auth::user()->avatar .'') }}"
                                        class="rounded-circle"
                                    />
                                </div>
                                <div class="ms-3 lh-1">
                                    <h5 class="mb-1">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h5>
                                    <p class="mb-0 text-muted">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-divider"></div>
                        <ul class="list-unstyled">
                            <li>
                                <form method="POST" action="{{ route('logout.student') }}">
                                    @csrf

                                    <a class="dropdown-item text-danger arab" href="route('logout.student')"
                                       onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        <i class="mdi mdi-power text-danger"></i> تسجيل الخروج
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
