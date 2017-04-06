<!DOCTYPE HTML>
<!--
    Lens by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title><?php echo e(config('app.name', 'Laravel')); ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="home/assets/css/main.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <noscript><link rel="stylesheet" href="home/assets/css/noscript.css" /></noscript>
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: Microsoft JhengHei,'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        
    </head>
    <body class="is-loading-0 is-loading-1 is-loading-2">

        <!-- Main -->
            <div id="main">
                <!-- Header -->
                    <header id="header">
                        <h1>上藤車業</h1>
                        <ul class="icons">
                            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                            <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
                            <li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
                        </ul>
                    </header>

                <!-- Thumbnail -->
                    <section id="thumbnails">
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <article>
                            <a class="thumbnail" href="articles/<?php echo e($article->id); ?>"><img src="<?php echo e($article->img_uri); ?>" alt="" /></a>
                        </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </section>

                    <section id="sliders">
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <slider>
                            <a class="thumbnail" href="<?php echo e($slider->link); ?>">
                                <img class="slider" src="<?php echo e($slider->img_uri); ?>" alt="<?php echo e($slider->describe); ?>" style="display:none"/>
                            </a>
                        </slider>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </section>
                <!-- Footer -->
                    <footer id="footer">
                        <ul class="copyright">
                            <!--<li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a>.</li>-->
                        </ul>
                    </footer>

            </div>

        <!-- Scripts -->
            <script src="home/assets/js/jquery.min.js"></script>
            <script src="home/assets/js/skel.min.js"></script>
            <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
            <script src="home/assets/js/main.js"></script>

    </body>
</html>