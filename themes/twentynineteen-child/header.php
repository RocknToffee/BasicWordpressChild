<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="https://gmpg.org/xfn/11"/>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

    <header id="masthead" class="grid_layouts">
        <nav class="nav-primary block one" aria-label="<?php esc_attr_e( 'Primary', 'twentynineteen' ); ?>">
                <?php
                if (has_nav_menu('menu-1')) :
                    wp_nav_menu(['theme_location' => 'menu-1', 'menu_class' => 'nav']);
                endif;
                ?>
        </nav>
        <style>
            .main-menu-more{
                display: none;
            }
        </style>

    </header><!-- #masthead -->

    <div id="content" class="site-content">
