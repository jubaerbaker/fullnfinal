<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>
    <style>
    .badge-info{

        color: #fff;
    }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <?php if(auth()->guard()->check()): ?>
                    <ul class="nav navbar-nav">
                        &nbsp;
                        <li class="nav-item">
                          <a href="<?php echo e(route('users.notifications')); ?>" class="nav-link">
                              <span class="badge badge-info">
                                  <?php echo e(auth()->user()->unreadNotifications->count()); ?>

                                  Unread notifications
                              </span>
                          </a>
                        </li>
                    </ul>
                    <?php endif; ?>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                    <a class="dropdown-item" href="<?php echo e(route('users.edit-profile')); ?>">
                                        My Profile
                                    </a></li>
                                    <li>
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
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <?php if(auth()->guard()->check()): ?>
              <div class="container">
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success">
                      <?php echo e(session()->get('success')); ?>

                    </div>
                <?php elseif(session()->has('denger')): ?>
                    <div class="alert alert-danger">
                      <?php echo e(session()->get('denger')); ?>

                    </div>
                  <?php endif; ?>
                  

                  <div class="row">
                    <div class="col-md-4">
                      <ul class="list-group">
                         <?php if(auth()->user()->isAdmin()): ?>
                          <li class="list-group-item">
                            <a href="<?php echo e(route('users.index')); ?>">
                              Users
                            </a>
                          </li>
                        <?php endif; ?>
                        <?php if(auth()->user()->isAdmin() || auth()->user()->isTeacher()): ?>
                          <li class="list-group-item">
                            <a href="<?php echo e(route('courseApprovalList.index')); ?>">
                              Course Approval List
                            </a>
                          </li>
                          <li class="list-group-item">
                          <a href="<?php echo e(route('courses.index')); ?>">Course</a>
                        </li>
                        <?php endif; ?>
                        <li class="list-group-item">
                          <a href="<?php echo e(route('posts.allPost')); ?>">All Posts</a>
                        </li>
                        <li class="list-group-item">
                          <a href="<?php echo e(route('myApprovalcourse')); ?>">My Courses</a>
                        </li>
                        <li class="list-group-item">
                          <a href="<?php echo e(route('post.index')); ?>">Posts</a>
                        </li>
                        
                        <li class="list-group-item">
                          <a href="<?php echo e(route('categories.index')); ?>">Categories</a>
                        </li>
                        
                        <li class="list-group-item">
                          <a href="<?php echo e(route('courseApproval.index')); ?>">Course Approval</a>
                        </li>
                      </ul>
                      <ul class="list-group mt-5">
                        <li class="list-group-item">
                          <a href="<?php echo e(route('trashed_posts.index')); ?>">Trashed Posts</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-8">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                  </div>
              </div>
            <?php else: ?>
              <?php echo $__env->yieldContent('content'); ?>
            <?php endif; ?>
        </main>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
