<?php
/**
 * Created by PhpStorm.
 * User: georgehawthorne
 * Date: 20/06/2018
 * Time: 10:02
 */

/**
 * Theme setup
 */
function setup()
{
    // Enable features from Soil when plugin is activated
    // https://roots.io/plugins/soil/
    add_theme_support('soil-clean-up');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-relative-urls');

    // Make theme available for translation
    // Community translations can be found at https://github.com/roots/sage-translations
    load_theme_textdomain('sage', get_template_directory() . '/lang');

    // Enable plugins to manage the document title
    // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
    add_theme_support('title-tag');

    // Register wp_nav_menu() menus
    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus([
        'footer-one' => __('Footer One', 'sage'),
        'footer-two' => __('Footer Two', 'sage'),
        'footer-three' => __('Footer Three', 'sage'),
        'menu-subnav' => __('Menu Sub Nav', 'sage'),
        'category' => __('Category', 'sage'),
    ]);

    add_image_size( 'square500', 500, 500 , true );
    add_image_size( 'sixteen-nine', 1650, 928 , true );
    add_image_size( 'four-three', 1238, 928 , true );
    add_image_size( 'medium_crop_portrait', 400, 500, true );


    add_image_size( 'thumb_landscape', 300, 169, true );
    add_image_size( 'medium_crop', 600, 400, true );
    add_image_size( 'large_crop', 900, 700, true );

    add_image_size( 'full_width_large', 3000, 1200, true );
    add_image_size( 'full_width', 2000, 1125, true );
    add_image_size( 'full_width_small', 700, 700, true );


    // Enable post formats
    // http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

    // Enable HTML5 markup support
    // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    // Use main stylesheet for visual editor
    // To add custom styles edit /assets/styles/layouts/_tinymce.scss
    add_editor_style(  get_stylesheet_directory_uri() . '/dist/styles/style.css');

}

add_action( 'after_setup_theme', 'setup' );

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar()
{
    static $display;

    isset($display) || $display = !in_array(true, [
        // The sidebar will NOT be displayed if ANY of the following return true.
        // @link https://codex.wordpress.org/Conditional_Tags
        is_404(),
        is_page(),
        is_single(),
        is_page_template('template-flexible.php'),
    ]);

    return apply_filters('sage/display_sidebar', $display);
}


function limit_words($string, $word_limit) {

    // creates an array of words from $string (this will be our excerpt)
    // explode divides the excerpt up by using a space character

    $words = explode(' ', $string);

    // this next bit chops the $words array and sticks it back together
    // starting at the first word '0' and ending at the $word_limit
    // the $word_limit which is passed in the function will be the number
    // of words we want to use
    // implode glues the chopped up array back together using a space character

    return implode(' ', array_slice($words, 0, $word_limit));

}
add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
function enqueue_load_fa() {
    wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
}

//CREATE A LOCATION RUL FOR PRODYCT CATEGORIES
// step 1 add a location rule type
add_filter('acf/location/rule_types', 'acf_wc_product_type_rule_type');
function acf_wc_product_type_rule_type($choices)
{
    // first add the "Product" Category if it does not exist
    // this will be a place to put all custom rules assocaited with woocommerce
    // the reason for checking to see if it exists or not first
    // is just in case another custom rule is added
    if (!isset($choices['Product'])) {
        $choices['Product'] = array();
    }
    // now add the 'Category' rule to it
    if (!isset($choices['Product']['product_cat'])) {
        // product_cat is the taxonomy name for woocommerce products
        $choices['Product']['product_cat_term'] = 'Product Category Term';
    }
    return $choices;
}

// step 2 skip custom rule operators, not needed


// step 3 add custom rule values
add_filter('acf/location/rule_values/product_cat_term', 'acf_wc_product_type_rule_values');
function acf_wc_product_type_rule_values($choices)
{
    // basically we need to get an list of all product categories
    // and put the into an array for choices
    $args = array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false
    );
    $terms = get_terms($args);
    foreach ($terms as $term) {
        $choices[$term->term_id] = $term->name;
    }
    return $choices;
}

// step 4, rule match
add_filter('acf/location/rule_match/product_cat_term', 'acf_wc_product_type_rule_match', 10, 3);
function acf_wc_product_type_rule_match($match, $rule, $options)
{
    if (!isset($_GET['tag_ID'])) {
        // tag id is not set
        return $match;
    }
    if ($rule['operator'] == '==') {
        $match = ($rule['value'] == $_GET['tag_ID']);
    } else {
        $match = !($rule['value'] == $_GET['tag_ID']);
    }
    return $match;
}

