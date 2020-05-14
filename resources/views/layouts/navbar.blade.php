<a class="closedbar inner hidden-sm hidden-xs" href="#">
</a>
<nav id="pageslide-left" class="pageslide inner">
    <div class="navbar-content">
        <!-- start: SIDEBAR -->
        <div class="main-navigation left-wrapper transition-left">
            <div class="navigation-toggler hidden-sm hidden-xs">
                <a href="#main-navbar" class="sb-toggle-left">
                </a>
            </div>
            <div class="user-profile border-top padding-horizontal-10 block">
                <div class="inline-block">
                    <img src="{{url('/images/avatar-1.jpg') }}" alt="">
                </div>
                <div class="inline-block">
                    <h5 class="no-margin"> Welcome </h5>
                    <h4 class="no-margin"> Peter Clark </h4>

                </div>
            </div>
            <!-- start: MAIN NAVIGATION MENU -->
            <ul class="main-navigation-menu">
                <li class="active open">
                    <a href="{{route('home')}}"><i class="fa fa-home"></i> <span class="title"> Dashboard </span></a>
                </li>
                <li>
                    <a href="{{ url('/users') }}"><i class="fa fa-desktop"></i> <span class="title"> Users </span><i
                            class="icon-arrow"></i> </a>
                </li>
                <li>
                    <a href="{{ url('/clients') }}"><i class="fa fa-cogs"></i> <span class="title"> Clients </span><i
                            class="icon-arrow"></i> </a>
                </li>
                <li>
                    <a href="javascript:void(0)"><i class="fa fa-th-large"></i> <span class="title"> Cases </span><i
                            class="icon-arrow"></i> </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{url('/addCase')}}">
                                <span class="title">Add Case</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/caseDetails') }}">
                                <span class="title">Search Case</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="{{url('/mohdareen')}}"><i class="fa fa-pencil-square-o"></i> <span
                            class="title"> Mohdareen </span><i class="icon-arrow"></i> </a>

                </li>

            </ul>
            <!-- end: MAIN NAVIGATION MENU -->
        </div>
        <!-- end: SIDEBAR -->
    </div>
    <div class="slide-tools">
        <div class="col-xs-6 text-left no-padding">
            <a class="btn btn-sm status" href="#">
                Status <i class="fa fa-dot-circle-o text-green"></i> <span>Online</span>
            </a>
        </div>
        <div class="col-xs-6 text-right no-padding">
            <a class="btn btn-sm log-out text-right" href="login_login.html">
                <i class="fa fa-power-off"></i> Log Out
            </a>
        </div>
    </div>
</nav>

