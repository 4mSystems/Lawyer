<a class="closedbar inner hidden-sm hidden-xs" href="#">
</a>
<nav id="pageslide-right" class="pageslide inner">
    <div class="navbar-content">
        <!-- start: SIDEBAR -->
        <div class="main-navigation right-wrapper transition-right">
            <div class="navigation-toggler hidden-sm hidden-xs">
                <a href="#main-navbar" class="sb-toggle-right">
                </a>
            </div>
            <div class="user-profile border-top padding-horizontal-10 block">
                <div class="inline-block" style="margin-top: 20px;">
                    <img src="{{url('/images/avatar-1.jpg') }}" alt="">
                </div>
                <div class="inline-block">
                    <h4 class="text-justify"> &nbsp;&nbsp; {{ Auth::user()->name }} </h4>

                </div>
            </div>
            <!-- start: MAIN NAVIGATION MENU -->
            <ul class="main-navigation-menu">
                <li class="active open">
                    <a href="{{route('home')}}"><i class="fa fa-home"></i>&nbsp;&nbsp; <span
                            class="title"> {{trans('site_lang.side_home')}} </span></a>
                </li>
                <li>
                    <a href="{{ url('/users') }}"><i class="fa fa-desktop"></i>&nbsp;&nbsp; <span
                            class="title"> {{trans('site_lang.side_users')}} </span></a>
                </li>
                <li>
                    <a href="{{ url('/clients') }}"><i class="fa fa-cogs"></i>&nbsp;&nbsp; <span
                            class="title"> {{trans('site_lang.side_clients')}} </span> </a>
                </li>
                <li>
                    <a href="javascript:void(0)"><i class="fa fa-th-large"></i>&nbsp;&nbsp; <span
                            class="title"> {{trans('site_lang.side_cases')}} </span><i
                            class="icon-arrow"></i> </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{url('/addCase')}}">
                                <i class="fa fa-plus"></i>&nbsp; <span
                                    class="title">{{trans('site_lang.side_add_case')}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/caseDetails') }}">
                                <i class="fa fa-eye-slash"></i> &nbsp;<span
                                    class="title">{{trans('site_lang.side_search_case')}}</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="{{url('/mohdareen')}}"><i class="fa fa-pencil-square-o"></i> &nbsp;&nbsp;<span
                            class="title"> {{trans('site_lang.side_mohdar')}} </span> </a>

                </li>
                @php
                    $user_type = auth()->user()->type;
                    if($user_type == 'admin'){
                @endphp
                <li>

                    <a href="{{url('/categories')}}"><i class="fa fa-pencil-square-o"></i> &nbsp;&nbsp;<span
                            class="title"> {{trans('site_lang.side_categories')}} </span> </a>

                </li>
                @php
                    }
                @endphp

                <li>

                    <a href="javascript:void(0)"><i class="fa fa-file-excel-o"></i> &nbsp;<span
                            class="title"> {{trans('site_lang.side_reports')}} </span><i
                            class="icon-arrow"></i> </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{url('/dailyReport')}}">
                                <i class="fa fa-hacker-news"></i>&nbsp;<span
                                    class="title">{{trans('site_lang.side_reports_daily')}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/MonthlyReport') }}">
                                <i class="fa fa-file-movie-o"></i>&nbsp;<span
                                    class="title">{{trans('site_lang.side_reports_monthly')}}</span>
                            </a>
                        </li>

                    </ul>


                </li>
                <li>
                    <a href="{{ route('logout') }}" type='submit' class="btn btn-sm log-out text-right"

                       onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        {{trans('site_lang.side_exit')}}

                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            <!-- end: MAIN NAVIGATION MENU -->
        </div>
        <!-- end: SIDEBAR -->
    </div>

</nav>

