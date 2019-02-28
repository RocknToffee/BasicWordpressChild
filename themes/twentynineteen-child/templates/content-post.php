<?php
/**
 * Created by PhpStorm.
 * User: georgehawthorne
 * Date: 28/07/2018
 * Time: 02:20
 */
?>
<section class="page flexible-content hero-section image slim">
    <div class="inner_wrapper grid_layouts full_width hero ">
        <?php $image = get_the_post_thumbnail_url($post->ID, 'sixteen-nine');
        if ($image) {
            $image_url = $image;
        } else {
            $image_url = wc_placeholder_img_src();
        } ?>

        <div class="block one media"
             style="background:url(<?php echo $image_url ?>)center center/cover no-repeat ">
        </div>
    </div>
    <div class="inner_wrapper grid_layouts sub-hero">
        <div class="block one column_text">
            <div class="text_wrap">
                <div class="no-margin">
                    <h1><?php echo the_title() ?></h1>
                </div>
                <div class="info">
                    <time datetime="<?php echo get_post_time('c', true); ?>"><?php echo get_the_date('d / m / y'); ?></time>
                </div>
            </div>
        </div>
    </div>
</section>
