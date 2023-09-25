<div class="header">
    <!-- navbar -->
    <nav class="navbar-default navbar navbar-expand-lg">
        <a id="nav-toggle" href="#">
            <i class="fe fe-menu"></i>
        </a>

        <!--Navbar nav -->
        <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">

            <!-- List -->
            <li class="dropdown ms-2">
                <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="avatar avatar-md avatar-indicators avatar-online">
                        <img alt="avatar" src="{{ asset('assets/20211001111541.png') }}" class="rounded-circle" />
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                    <div class="dropdown-item">
                        <div class="d-flex">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img alt="avatar" src="{{ asset('assets/'.\Illuminate\Support\Facades\Auth::user()->avatar.'') }}" class="rounded-circle" />
                            </div>
                            <div class="ms-3 lh-1">
                                <h5 class="mb-1">{{ \Illuminate\Support\Facades\Auth::user()->name }}</h5>
                                <p class="mb-0 text-muted">{{ \Illuminate\Support\Facades\Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">

                        <li>
                            <a class="dropdown-item" href="{{ route('edit.profile') }}">
                                <i class="fe fe-user me-2"></i> Profile
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fe fe-settings me-2"></i> Settings
                            </a>
                        </li>
                    </ul>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        <li>
                            <form method="POST" action="{{ route('logout.admin') }}">
                                @csrf

                                <a class="dropdown-item text-danger" href="route('logout.admin')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <i class="mdi mdi-power text-danger"></i> Logout
                                </a>
                            </form>




                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</div>
