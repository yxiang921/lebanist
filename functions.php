<?php

function myshop_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
}

function myshop_enqueue_scripts()
{
    wp_enqueue_style('main-style', get_stylesheet_uri());
}

function myshop_enqueue_assets()
{
    // 加载 CSS
    wp_enqueue_style('myshop-style', get_template_directory_uri() . '/assets/css/main.css');

    // 加载 JS（放在底部 true）
    wp_enqueue_script('myshop-js', get_template_directory_uri() . '/assets/js/script.js', [], false, true);
}

function asset($path = '')
{
    return get_template_directory_uri() . '/' . ltrim($path, '/');
}

add_action('after_setup_theme', 'myshop_theme_setup');
add_action('wp_enqueue_scripts', 'myshop_enqueue_scripts');

function mytheme_load_textdomain()
{
    load_theme_textdomain('leban', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'mytheme_load_textdomain');


function mytheme_custom_language_loader()
{
    $uri = trim($_SERVER['REQUEST_URI'], '/');
    $segments = explode('/', $uri);
    $lang = $segments[0] ?? '';

    // 默认语言是英文
    if ($lang === 'zh') {
        switch_to_locale('zh_CN');
    } else {
        switch_to_locale('en_US');
    }
}
add_action('after_setup_theme', 'mytheme_custom_language_loader');

function t($key)
{
    static $lang_data;

    if (!$lang_data) {
        // 获取 language 参数
        $lang = $_GET['lg'] ?? 'en';

        // 设置 session 保存语言（可选）
        if (!session_id())
            session_start();
        if (isset($_GET['lg'])) {
            $_SESSION['language'] = $lang;
        } elseif (isset($_SESSION['language'])) {
            $lang = $_SESSION['language'];
        }

        // 加载对应语言文件
        $path = get_template_directory() . "/languages/{$lang}.php";
        if (file_exists($path)) {
            $lang_data = include $path;
        } else {
            $lang_data = [];
        }
    }

    return $lang_data[$key] ?? $key;
}


function mytheme_register_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
        )
    );
}
add_action( 'init', 'mytheme_register_menus' );

