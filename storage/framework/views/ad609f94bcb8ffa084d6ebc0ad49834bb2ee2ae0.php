<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Admin Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="Mosaddek" name="author" />
    <link href="<?php echo e(asset('public/admin_assets/')); ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo e(asset('public/admin_assets/')); ?>/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo e(asset('public/admin_assets/')); ?>/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
    <link href="<?php echo e(asset('public/admin_assets/')); ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo e(asset('public/admin_assets/')); ?>/css/style.css" rel="stylesheet" />
    <link href="<?php echo e(asset('public/admin_assets/')); ?>/css/style-responsive.css" rel="stylesheet" />
    <link href="<?php echo e(asset('public/admin_assets/')); ?>/css/style-default.css" rel="stylesheet" id="style_color" />
    <link href="<?php echo e(asset('public/admin_assets/')); ?>/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="<?php echo e(asset('public/admin_assets/')); ?>/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>



    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
<!-- BEGIN HEADER -->
<div id="header" class="navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="container-fluid">
            <!--BEGIN SIDEBAR TOGGLE-->
            <div class="sidebar-toggle-box hidden-phone">
                <div class="icon-reorder"></div>
            </div>
            <!--END SIDEBAR TOGGLE-->
            <!-- BEGIN LOGO -->
            <a class="brand" href="#">
                <img src="<?php echo e(asset('public/admin_assets/')); ?>/img/logo.png" alt="Metro Lab" />
            </a>

            <div class="top-nav ">
                <ul class="nav pull-right top-menu" >
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo e(asset('public/admin_assets/')); ?>/img/avatar1_small.jpg" alt="">
                            <span class="username">
                                <?php echo e(Session::get('name')); ?>

                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="<?php echo e(url('/logout')); ?>"><i class="icon-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
                <!-- END TOP NAVIGATION MENU -->
            </div>
        </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div id="container" class="row-fluid">
    <!-- BEGIN SIDEBAR -->
    <div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">

            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
            <div class="navbar-inverse">
                <form class="navbar-search visible-phone">
                    <input type="text" class="search-query" placeholder="Search" />
                </form>
            </div>
            <!-- END RESPONSIVE QUICK SEARCH FORM -->
            <!-- BEGIN SIDEBAR MENU -->
            

            <ul class="sidebar-menu">
                <li class="sub-menu active">
                    <a class="" href="<?php echo e(url('/master')); ?>">
                        <i class="icon-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-book"></i>
                        <span>Category</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo e(url('/add_category')); ?>">Add Category</a></li>
                        <li><a class="" href="<?php echo e(url('/manage_category')); ?>">Manage Category</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-tasks"></i>
                        <span>Blog</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo e(url('/add_blog')); ?>">Add Blog</a></li>
                        <li><a class="" href="<?php echo e(url('/manage_blog')); ?>">Manage Blog</a></li>

                    </ul>
                </li>

            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div id="main-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN THEME CUSTOMIZER-->
                    <div id="theme-change" class="hidden-phone">
                        <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme Color:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                    </div>
                    <!-- END THEME CUSTOMIZER-->
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        Dashboard
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                            <span class="divider">/</span>
                        </li>
                        <li>
                            <a href="#">Metro Lab</a>
                            <span class="divider">/</span>
                        </li>
                        <li class="active">
                            Dashboard
                        </li>
                        <li class="pull-right search-wrap">
                            <form action="http://thevectorlab.net/metrolab/search_result.html" class="hidden-phone">
                                <div class="input-append search-input-area">
                                    <input class="" id="appendedInputButton" type="text">
                                    <button class="btn" type="button"><i class="icon-search"></i> </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->


            


            <?php echo $__env->yieldContent('daseboard'); ?>;


            <!-- END PAGE CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<div id="footer">
    2013 &copy; Metro Lab Dashboard.
</div>
<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS -->
<!-- Load javascripts at bottom, this will reduce page load time -->
<script src="<?php echo e(asset('public/admin_assets/')); ?>/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo e(asset('public/admin_assets/')); ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo e(asset('public/admin_assets/')); ?>/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo e(asset('public/admin_assets/')); ?>/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo e(asset('public/admin_assets/')); ?>/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo e(asset('public/admin_assets/')); ?>/assets/bootstrap/js/bootstrap.min.js"></script>

<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="<?php echo e(asset('public/admin_assets/')); ?>/js/excanvas.js"></script>
<script src="<?php echo e(asset('public/admin_assets/')); ?>/js/respond.js"></script>
<![endif]-->

<script src="<?php echo e(asset('public/admin_assets/')); ?>/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="<?php echo e(asset('public/admin_assets/')); ?>/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="<?php echo e(asset('public/admin_assets/')); ?>/assets/chart-master/Chart.js"></script>

<!--common script for all pages-->
<script src="<?php echo e(asset('public/admin_assets/')); ?>/js/common-scripts.js"></script>

<!--script for this page only-->

<script src="<?php echo e(asset('public/admin_assets/')); ?>/js/easy-pie-chart.js"></script>
<script src="<?php echo e(asset('public/admin_assets/')); ?>/js/sparkline-chart.js"></script>
<script src="<?php echo e(asset('public/admin_assets/')); ?>/js/home-page-calender.js"></script>
<script src="<?php echo e(asset('public/admin_assets/')); ?>/js/chartjs.js"></script>


<script type="text/javascript">
    function check_delete() {
        $chk=confirm('Are you sure to Delete this!');
        return $chk;
    }
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>