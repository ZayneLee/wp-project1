<?php

add_action('after_setup_theme', 'myfirstwp_setup');
function myfirstwp_setup()
{
    add_theme_support('post-thumbnails');
}

add_action('wp_enqueue_scripts', 'myfirstwp_first');
function myfirstwp_first()
{
    wp_enqueue_style('theme-style', get_stylesheet_uri());
}

add_filter('excerpt_length', 'myfirstwp_excerpt_length', 999);
function myfirstwp_excerpt_length($length)
{
    return 20;
}
