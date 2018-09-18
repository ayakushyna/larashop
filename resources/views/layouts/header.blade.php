

<!-- header header  -->
<div class="header">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon -->
                <b><img src="/images/logo.png" alt="homepage" class="dark-logo" /></b>
                <!--End Logo icon -->
            </a>
        </div>
        <!-- End Logo -->
        <div class="navbar-collapse justify-content-end align-items-center">
            <!-- toggle and nav items -->
            @auth
            <!-- User profile  -->
            <ul class="navbar-nav my-lg-0">

                <!-- Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/images/users/5.jpg" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                        <ul class="dropdown-user">
                            {{--<li><a href="#"><i class="ti-user"></i> Profile</a></li>--}}
                            {{--<li><a href="#"><i class="ti-wallet"></i> Balance</a></li>--}}
                            {{--<li><a href="#"><i class="ti-email"></i> Inbox</a></li>--}}
                            {{--<li><a href="#"><i class="ti-settings"></i> Setting</a></li>--}}

                            <li>
                                <a href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i>
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            @endauth

        </div>
    </nav>
</div>
<!-- End header header -->