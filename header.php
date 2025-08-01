<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); ?></title>
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
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'container' => false, // 不要外层 nav
                        'menu_class' => 'navbar-links', // 用你的自定义 class
                        'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                        'depth' => 1, // 不显示 dropdown（可改成 2）
                    ));
                    ?>
                </nav>
            </div>
        </div>

        <div class="mobile-nav hmburger-menu" id="mobile-nav" style="display:block;">
            <div class="res-log">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-b.png" alt="Responsive Logo">
                </a>
            </div>

            <?php
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'container' => false,
                'menu_class' => 'navbar-links',
                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                'depth' => 1,
            ));
            ?>

            <a href="JavaScript:void(0)" id="res-cross"></a>
        </div>
    </header>