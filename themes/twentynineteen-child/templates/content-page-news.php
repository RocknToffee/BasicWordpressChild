<?php
/**
 * Created by PhpStorm.
 * User: georgehawthorne
 * Date: 04/07/2018
 * Time: 16:55
 */

?>

<?php
$categories = get_terms('category');
?>

<section class="page news">
    <div class="inner_wrapper  grid_layouts ">
        <div class="one subgrid">

            <?php
            // Define custom query parameters
            $custom_query_args = array(
                'post_type' => 'post',
                'order_by' => 'menu_order',
                'order' => 'DSC',
                'post_status' => 'publish'
            );

            // Get current page and append to custom query parameters array
            $custom_query_args['paged'] = get_query_var('paged') ? get_query_var('paged') : 1;

            // Instantiate custom query
            $custom_query = new WP_Query($custom_query_args);

            //dbug($custom_query);

            // Pagination fix
            $temp_query = $wp_query;
            $wp_query = NULL;
            $wp_query = $custom_query;

            // Output custom query loop
            if ($custom_query->posts) {
                foreach ($custom_query->posts as $postIndex => $post) { // variable must be called $post (IMPORTANT)

                    setup_postdata($post);

                    if (has_post_thumbnail()) {
                        $thumb_id = get_post_thumbnail_id();
                        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'medium_large', true);
                        $thumb_url = $thumb_url_array[0];
                    } else {
                        $thumb_url = esc_url(wc_placeholder_img_src());
                    };

                    if ($postIndex == 0 || $postIndex == 5 || $postIndex == 6|| $postIndex == 11) {
                        include 'news-blocks/_type-one.php';
                    }
                    if ($postIndex == 1 || $postIndex == 7) {
                        include 'news-blocks/_type-two.php';
                    }
                    if ($postIndex == 2  || $postIndex == 3  || $postIndex == 4 ||$postIndex == 8  || $postIndex == 9  || $postIndex == 10) {
                        include 'news-blocks/_type-three.php';
                    }

                }
            }
            // Reset postdata
            wp_reset_postdata();

            // Reset main query object
            $wp_query = NULL;
            $wp_query = $temp_query;
            ?>
        </div>
    </div>
    <div class="inner_wrapper grid_layouts navigation">
        <div class="one">
            <span class="button-primary vone"><?php previous_posts_link('Newer Posts');?></span>
            <span class="button-primary vone"><?php next_posts_link('Older Posts', $custom_query->max_num_pages); ?></span>
        </div>
    </div>

</section>