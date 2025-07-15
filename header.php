<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); ?> - <?php wp_title(); ?></title>
    <?php wp_head(); ?>

    <link rel="icon" href="<?php echo asset('assets/img/favicon.png'); ?>">
    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="<?php echo asset('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('assets/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('assets/css/owl.theme.default.min.css'); ?>">
    <!-- fancybox -->
    <link rel="stylesheet" href="<?php echo asset('assets/css/jquery.fancybox.min.css'); ?>">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="<?php echo asset('assets/css/fontawesome.min.css'); ?>">
    <!-- style -->
    <link rel="stylesheet" href="<?php echo asset('assets/css/style.css'); ?>">
    <!-- responsive -->
    <link rel="stylesheet" href="<?php echo asset('assets/css/responsive.css'); ?>">
    <!-- color -->
    <link rel="stylesheet" href="<?php echo asset('assets/css/color.css'); ?>">
</head>

<body>
    <!-- <span class="loader"></span> -->
    <header>
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar">
                    <ul class="navbar-links">

                        <li class="navbar-dropdown">
                            <a href="#">Home</a>
                        </li>
                        <li class="navbar-dropdown">
                            <a href="#">Blog</a>
                        </li>
                        <li class="navbar-dropdown">
                            <a href="#">Contact</a>
                        </li>
                    </ul>

                </nav>
            </div>
        </div>
        <div class="mobile-nav hmburger-menu" id="mobile-nav" style="display:block;">
            <div class="res-log">
                <a href="index.html">
                    <img src="assets/img/logo-b.png" alt="Responsive Logo">
                </a>
            </div>
            <ul>

                <ul class="navbar-links">

                    <li class="navbar-dropdown">
                        <a href="#">Home</a>
                    </li>
                    <li class="navbar-dropdown">
                        <a href="#">Blog</a>
                    </li>
                    <li class="navbar-dropdown">
                        <a href="#">Contact</a>
                    </li>
                </ul>

            </ul>

            <a href="JavaScript:void(0)" id="res-cross"></a>
        </div>
    </header>