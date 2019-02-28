<?php

if (class_exists('acf')) {
//IMPORT THE ACF-fields FIELDS
//     include('ACF-fields/flexible.php');
 
}
include('wordpress-mod.php');


function theme_js() {
    wp_enqueue_script( 'theme_js', get_stylesheet_directory_uri() . '/dist/scripts/script.min.js', array( 'jquery' ), '1.0', true );
}

add_action('wp_enqueue_scripts', 'theme_js');



function theme_css() {
    wp_enqueue_style( 'theme_css', get_stylesheet_directory_uri() . '/dist/styles/style.css',false, null);
}

add_action('wp_enqueue_scripts', 'theme_css');


