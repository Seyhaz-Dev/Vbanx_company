<?php

if (!defined('ABSPATH')) {
    exit;
}

function vbanx_theme_setup() {

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support('custom-logo');

    register_nav_menus([
        'primary' => __('Primary Menu', 'vbanx-theme'),
    ]);
}

add_action('after_setup_theme', 'vbanx_theme_setup');

function vbanx_enqueue_assets() {

    wp_enqueue_style(
        'vbanx-style',
        get_stylesheet_uri(),
        [],
        '1.0.0'
    );

}

add_action('wp_enqueue_scripts', 'vbanx_enqueue_assets');
