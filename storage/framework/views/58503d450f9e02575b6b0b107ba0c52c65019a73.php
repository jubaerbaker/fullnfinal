<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TSRelationship</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('public/plugins/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('public/dist/css/adminlte.min.css')); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset('public/plugins/iCheck/flat/blue.css')); ?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo e(asset('public/plugins/morris/morris.css')); ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo e(asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.css')); ?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo e(asset('public/plugins/datepicker/datepicker3.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('public/plugins/daterangepicker/daterangepicker-bs3.css')); ?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo e(asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="<?php echo e(route('users.notifications')); ?>" class="nav-link">
              <span class="badge badge-info">
                  <?php echo e(auth()->user()->unreadNotifications->count()); ?>

                  Unread notifications
              </span>
                </a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo e(url('/home')); ?>" class="brand-link">
            TSRelation
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo e(Auth::user()->name); ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <!-- <li class="nav-item has-treeview menu-open">
                      <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                          Dashboard
                          <i class="right fa fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="./index.html" class="nav-link active">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Dashboard v1</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index2.html" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Dashboard v2</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Dashboard v3</p>
                          </a>
                        </li>
                      </ul>
                    </li> -->
                    <?php if(auth()->user()->isAdmin()): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('users.index')); ?>" class="nav-link active">
                                <i class="nav-icon fa fa-th"></i>
                                Users
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->user()->isAdmin() || auth()->user()->isTeacher()): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('courseApprovalList.index')); ?>" class="nav-link">
                                <i class="nav-icon fa fa-edit"></i>
                                Course Approval List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('courses.index')); ?>" class="nav-link">
                                <i class="nav-icon fa fa-edit"></i>
                                Course
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('posts.allPost')); ?>" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            All Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('myApprovalcourse')); ?>" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            My Course
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(url('/poll/create')); ?>" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            Create Poll
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(url('/pollanswer/create')); ?>" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            View Polls
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(url('/poll')); ?>" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            View Poll Answers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('post.index')); ?>" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('categories.index')); ?>" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('courseApproval.index')); ?>" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            Course Approval
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('trashed_posts.index')); ?>" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            Trashed Posts
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; <?php echo e(date('Y')); ?> <a href="javascript:void(0)"></a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.0-alpha
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo e(asset('public/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo e(asset('public/plugins/morris/morris.min.js')); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo e(asset('public/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo e(asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(asset('public/plugins/knob/jquery.knob.js')); ?>"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo e(asset('public/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<!-- datepicker -->
<script src="<?php echo e(asset('public/plugins/datepicker/bootstrap-datepicker.js')); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo e(asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo e(asset('public/plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('public/plugins/fastclick/fastclick.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('public/dist/js/adminlte.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset('public/dist/js/pages/dashboard.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('public/dist/js/demo.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"></script>
</body>
</html>