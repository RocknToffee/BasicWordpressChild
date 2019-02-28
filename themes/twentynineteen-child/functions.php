<?php

//load all the custom stuff if the page is not the main shop
include('lib/extras.php');
// ADD FLEXIBLE PAGE TO ARCHIVE PAGE
function imaginate_add_flexible()
{
    include 'page-flexible.php';
}

add_action('woocommerce_before_shop_loop', 'imaginate_add_flexible', 10);

add_filter('woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98);
function wcs_woo_remove_reviews_tab($tabs)
{
    unset($tabs['reviews']);
    return $tabs;
}
