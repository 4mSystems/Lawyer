<footer class="inner">
    <div class="footer-inner">
        <div class="pull-left">
            2014 &copy; Rapido by cliptheme.
        </div>
        <div class="pull-right">
            <span class="go-top"><i class="fa fa-chevron-up"></i></span>
        </div>
    </div>
</footer>

</div>

<script src="{{url('/plugins/jQuery/jquery-2.1.1.min.js') }}"></script>
<script src="{{url('/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js') }}"></script>
<script src="{{url('/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{url('/plugins/blockUI/jquery.blockUI.js') }}"></script>
<script src="{{url('/plugins/iCheck/jquery.icheck.min.js') }}"></script>
<script src="{{url('/plugins/moment/min/moment.min.js') }}"></script>
<script src="{{url('/plugins/perfect-scrollbar/src/jquery.mousewheel.js') }}"></script>
<script src="{{url('/plugins/perfect-scrollbar/src/perfect-scrollbar.js') }}"></script>
<script src="{{url('/plugins/bootbox/bootbox.min.js') }}"></script>
<script src="{{url('/plugins/jquery.scrollTo/jquery.scrollTo.min.js') }}"></script>
<script src="{{url('/plugins/ScrollToFixed/jquery-scrolltofixed-min.js') }}"></script>
<script src="{{url('/plugins/jquery.appear/jquery.appear.js') }}"></script>
<script src="{{url('/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
<script src="{{url('/plugins/velocity/jquery.velocity.min.js') }}"></script>
<script src="{{url('/plugins/TouchSwipe/jquery.touchSwipe.min.js') }}"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
<script src="{{url('/plugins/owl-carousel/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{url('/plugins/jquery-mockjax/jquery.mockjax.js') }}"></script>
<script src="{{url('/plugins/toastr/toastr.js') }}"></script>
<script src="{{url('/plugins/bootstrap-modal/js/bootstrap-modal.js') }}"></script>
<script src="{{url('/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}"></script>
<script src="{{url('/plugins/fullcalendar/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{url('/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js') }}"></script>
<script src="{{url('/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{url('/plugins/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{url('/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>
<script src="{{url('/plugins/DataTables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{url('/plugins/DataTables/media/js/DT_bootstrap.js') }}"></script>
<script src="{{url('/plugins/truncate/jquery.truncate.js') }}"></script>
<script src="{{url('/plugins/summernote/dist/summernote.min.js') }}"></script>
<script src="{{url('/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{url('/js/subview.js') }}"></script>
<script src="{{url('/js/subview-examples.js') }}"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="{{url('/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{url('/plugins/nvd3/lib/d3.v3.js') }}"></script>
<script src="{{url('/plugins/nvd3/nv.d3.min.js') }}"></script>
<script src="{{url('/plugins/nvd3/src/models/historicalBar.js') }}"></script>
<script src="{{url('/plugins/nvd3/src/models/historicalBarChart.js') }}"></script>
<script src="{{url('/plugins/nvd3/src/models/stackedArea.js') }}"></script>
<script src="{{url('/plugins/nvd3/src/models/stackedAreaChart.js') }}"></script>
<script src="{{url('/plugins/jquery.sparkline/jquery.sparkline.js') }}"></script>
<script src="{{url('/plugins/easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>
<script src="{{url('/js/index.js') }}"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@yield('scripts')
<!-- start: CORE JAVASCRIPTS  -->
<script src="{{url('/js/main.js') }}"></script>
<!-- end: CORE JAVASCRIPTS  -->
<script>
    jQuery(document).ready(function() {
        Main.init();
        Index.init();
        @yield('scriptDocument')

    });
</script>
</body>
<!-- end: BODY -->

<!-- Mirrored from www.cliptheme.com/demo/rapido/ by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 01 Nov 2014 18:50:59 GMT -->
</html>
