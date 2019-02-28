<?php
/*
Template Name: Flexible Template
*/

while (have_posts()) : the_post();

    get_header();
    get_template_part('templates/content', 'page-flexible');
    get_footer();

endwhile;

?>

