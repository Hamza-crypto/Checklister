<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">

        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="{{ route('consultation') }}" id="messagesDropdown" data-bs-toggle="dropdown">
                    <div class="position-relative">
                        <span class="align-middle">Get Consultation</span>
                    </div>
                </a>
            </li>
            <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="{{ route('welcome') }}" id="messagesDropdown" data-bs-toggle="dropdown">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="help-circle"></i>
                                </div>
                            </a>
                        </li>
            <li class="nav-item dropdown">
                                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                                            <i class="align-middle" data-feather="settings"></i>
                                        </a>

                                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown" aria-expanded="false">

                                            <img
                                                src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=293042&color=ffffff"
                                                class="avatar img-fluid rounded-circle mr-1"
                                                alt="{{ auth()->user()->name }}"
                                            />


                                            <span class="text-dark">{{ auth()->user()->name }}</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">
                                                <i class="align-middle me-1" data-feather="user"></i> Profile
                                            </a>
                                            <div class="dropdown-divider"></div>



                                            <form method="post" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item">Sign out</button>
                                            </form>
                                        </div>
                                    </li>
        </ul>
    </div>
</nav>
