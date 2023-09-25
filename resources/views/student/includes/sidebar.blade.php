<nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
    <!-- Menu -->
    <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
    <!-- Button -->
    <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="fe fe-menu"></span>
    </button>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav">
        <div class="navbar-nav flex-column">
            <span style="font-size: 13px;" class="navbar-header">لوحة التحكم</span>
            <ul class="list-unstyled ms-n2 mb-4">
                <!-- Nav item -->
                <li class="nav-item @if(str_contains(url()->current(),'dashboard')) active @endif">
                    <a class="nav-link arab" href="{{ route('student.dashboard') }}"><i class="fe fe-home nav-icon"></i>لوحة التحكم</a>
                </li>
                <!-- Nav item -->
                <li class="nav-item" @if(str_contains(url()->current(),'cource')) active @endif">
                <a class="nav-link arab" href="{{ route('student.course.index') }}"><i class="fe fe-book nav-icon"></i>دوراتي</a>
                </li>
                <li class="nav-item @if(str_contains(url()->current(),'monitorings')) active @endif">
                    <a class="nav-link arab" href="{{ route('student.monitorings') }}"><i class="fe fe-refresh-cw nav-icon"></i>مراقبة </a>
                </li>
                <!-- Nav item -->
                <li class="nav-item @if(str_contains(url()->current(),'interships')) active @endif">
                    <a class="nav-link arab" href="{{ route('student.interships') }}"><i class="fe fe-star nav-icon"></i>التداريب المتاحة</a>
                </li>
                <!-- Nav item -->
                <li class="nav-item @if(str_contains(url()->current(),'jobs')) active @endif">
                    <a class="nav-link arab" href="{{ route('student.jobs') }}"><i
                            class="fe fe-pie-chart nav-icon"></i>فرص العمل
                    </a>
                </li>
                <!-- Nav item -->

            </ul>
            <!-- Navbar header -->
            <span class="navbar-header arab">إعدادت الحساب</span>
            <ul class="list-unstyled ms-n2 mb-0">


                <li class="nav-item">
                    <form method="POST" action="{{ route('logout.student') }}">
                        @csrf

                        <a class="nav-link arab" href="route('logout.student')"
                           onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="mdi mdi-power"></i> تسجيل الخروج
                        </a>
                    </form>

                </li>
            </ul>
        </div>
    </div>
</nav>





