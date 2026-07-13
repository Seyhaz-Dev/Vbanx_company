<?php

function vbanx_theme_setup() {

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'vbanx-theme'),
    ));

}

add_action('after_setup_theme', 'vbanx_theme_setup');
function vbanx_enqueue(){

    wp_enqueue_style(

        'main-style',

        get_template_directory_uri().'/assets/css/style.css',

        array(),

        '1.0'

    );

}

add_action('wp_enqueue_scripts','vbanx_enqueue');