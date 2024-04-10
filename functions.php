<?php

add_action('after_setup_theme', 'myfirstwp_setup');
function myfirstwp_setup()
{
    add_theme_support('post-thumbnails');
}
