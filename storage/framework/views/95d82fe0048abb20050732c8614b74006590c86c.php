<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                                'csrfToken' => csrf_token(),
                            ]); ?>
    </script>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="/assets/css/style.css" rel="stylesheet" />

     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
html, body {
    font-family: Microsoft JhengHei,'Raleway', sans-serif;
}
.navbar-inverse .navbar-brand {
    color: #fff;
}
.navbar-inverse .navbar-nav > li > a {
    color: #fff;
}
</style>
<body>
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo e(url('/admin')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="<?php echo e(url('/test')); ?>">
                            
                        </a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                        <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?php echo e(url('/logout')); ?>"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo e(route('articles.newIndex')); ?>" 
                            <?php if(Route::current()->getName()==='articles.newIndex'): ?> class="menu-top-active" <?php endif; ?>>最新消息</a></li>
                            <li><a href="<?php echo e(route('products.index')); ?>" 
                            <?php if(Route::current()->getName()==='products.index'): ?> class="menu-top-active" <?php endif; ?>>所有車款</a></li>
                            <li><a href="<?php echo e(route('articles.promotionIndex')); ?>" 
                            <?php if(Route::current()->getName()==='articles.promotionIndex'): ?> class="menu-top-active" <?php endif; ?>>口碑分享管理</a></li>
                            <li><a href="<?php echo e(route('sliders.index')); ?>" 
                            <?php if(Route::current()->getName()==='sliders.index'): ?> class="menu-top-active" <?php endif; ?>>首頁導覽圖管理</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
        <?php echo $__env->make('layouts.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->yieldContent('script'); ?>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2017 <?php echo e(config('app.name', 'Laravel')); ?> 
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <!-- Scripts -->
    <script src="/assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="/assets/js/bootstrap.js"></script>
</body>
</html>
