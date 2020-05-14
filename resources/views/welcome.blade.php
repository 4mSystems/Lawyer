<!-- start: HEAD -->
@include('layouts.header')
<!-- end: HEAD -->
<!-- start: TOPBAR -->
@include('layouts.topbar')
<!-- end: TOPBAR -->
<!-- start: PAGESLIDE LEFT -->
@include('layouts.navbar')
<!-- end: PAGESLIDE LEFT -->

<!-- start: MAIN CONTAINER -->
@yield('content')
<!-- end: MAIN CONTAINER -->
@include('layouts.footer')
