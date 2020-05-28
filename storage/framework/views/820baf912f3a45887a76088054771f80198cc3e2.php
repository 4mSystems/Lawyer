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
                    <img src="<?php echo e(url('/images/avatar-1.jpg')); ?>" alt="">
                </div>
                <div class="inline-block">
                     <h4 class="text-justify"> &nbsp;&nbsp;  مصطفى النجار </h4>

                </div>
            </div>
            <!-- start: MAIN NAVIGATION MENU -->
            <ul class="main-navigation-menu">
                <li class="active open">
                    <a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i>&nbsp;&nbsp; <span
                            class="title"> <?php echo e(trans('site_lang.side_home')); ?> </span></a>
                </li>
                <li>
                    <a href="<?php echo e(url('/users')); ?>"><i class="fa fa-desktop"></i>&nbsp;&nbsp; <span
                            class="title"> <?php echo e(trans('site_lang.side_users')); ?> </span></a>
                </li>
                <li>
                    <a href="<?php echo e(url('/clients')); ?>"><i class="fa fa-cogs"></i>&nbsp;&nbsp; <span
                            class="title"> <?php echo e(trans('site_lang.side_clients')); ?> </span> </a>
                </li>
                <li>
                    <a href="javascript:void(0)"><i class="fa fa-th-large"></i>&nbsp;&nbsp; <span
                            class="title"> <?php echo e(trans('site_lang.side_cases')); ?> </span><i
                            class="icon-arrow"></i> </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo e(url('/addCase')); ?>">
                                <span class="title"><?php echo e(trans('site_lang.side_add_case')); ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/caseDetails')); ?>">
                                <span class="title"><?php echo e(trans('site_lang.side_search_case')); ?></span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="<?php echo e(url('/mohdareen')); ?>"><i class="fa fa-pencil-square-o"></i> &nbsp;&nbsp;<span
                            class="title"> <?php echo e(trans('site_lang.side_mohdar')); ?> </span> </a>

                </li>
                <li>
                    <a class="btn btn-sm log-out text-right" href="login_login.html">
                        <i class="fa fa-power-off"></i>&nbsp;&nbsp; <span
                            class="title"> <?php echo e(trans('site_lang.side_exit')); ?> </span>
                    </a>
                </li>

            </ul>
            <!-- end: MAIN NAVIGATION MENU -->
        </div>
        <!-- end: SIDEBAR -->
    </div>

</nav>

<?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>