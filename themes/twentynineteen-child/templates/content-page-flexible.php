<?php
$term = get_queried_object();
$flexFields = get_field('page_flexible', $term);

if ($flexFields > 0) {
    foreach ($flexFields as $key => $field) {
        switch ($field['acf_fc_layout']) {

            case 'hero': ?>
                <?php switch ($field['type']) {

                    case'Video':
                        $image_url = $field['image']['sizes']['full_width_large'];
                        ?>
                        <section class="page flexible-content hero-section video <?php echo $field['hero_height']; ?>"
                                 id="<?php if ($field['layout_title']) {
                                     echo sanitize_title($field['layout_title']);
                                 } ?>">

                            <div class="inner_wrapper grid_layouts full_width hero ">
                                <?php if ($field['hero_video']) {
                                    if (!is_handheld()) {
                                        ?>
                                        <div class="block one media">
                                            <div class="orange-break"></div>
                                            <figure>
                                                <?php
                                                // get Embed HTML
                                                $iframe = $field['hero_video']; ?>
                                                <video
                                                        id="vid<?php echo $key ?>"
                                                        class="video-js"
                                                        autoplay
                                                        loop="loop"
                                                        preload=""
                                                        muted
                                                        volume="0"
                                                        playsinline
                                                        data-setup='{
                                                "techOrder": ["youtube"],
                                                "sources": [{ "type": "video/youtube","src": "<?php echo $iframe ?>"}] }'
                                                >
                                                </video>
                                            </figure>
                                        </div>
                                    <?php } else {
                                        ?>
                                        <div class="block one media image"
                                             style="background:
                                             <?php
                                             $image_url = $field['image']['sizes']['full_width_large'];
                                             $hero_overlay = $field['hero_overlay_colour'];
                                             switch ($hero_overlay) {
                                             case 'white': ?>
                                                     linear-gradient(to right, rgba(255,255,255,0.6) 0%, rgba(255,255,255,0.6) 45%),
                                                     url(<?php echo $image_url ?>)center center/cover no-repeat">
                                            <?php break;
                                            case 'one': ?>
                                                linear-gradient(to right, rgba(250,64,125,0.6) 0%, rgba(250,64,125,0.6) 45%),
                                                url(<?php echo $image_url ?>)center center/cover no-repeat">
                                                <?php break;
                                            case 'two': ?>
                                                linear-gradient(to right, rgba(255,137,0,0.6) 0%, rgba(255,137,0,0.6) 45%),
                                                url(<?php echo $image_url ?>)center center/cover no-repeat">
                                                <?php break;
                                            case 'three': ?>
                                                linear-gradient(to right, rgba(74,215,226,0.6) 0%, rgba(74,215,226,0.6) 45%),
                                                url(<?php echo $image_url ?>)center center/cover no-repeat">
                                                <?php break;
                                            case 'four': ?>
                                                linear-gradient(to right, rgba(167,219,216,0.6) 0%, rgba(167,219,216,0.6) 45%),
                                                url(<?php echo $image_url ?>)center center/cover no-repeat">
                                                <?php break;
                                            case 'five': ?>
                                                linear-gradient(to right, rgba(251,227,91,0.6) 0%, rgba(251,227,91,0.6) 45%),
                                                url(<?php echo $image_url ?>)center center/cover no-repeat">
                                                <?php break;

                                            default: ?>
                                                url(<?php echo $image_url; ?>)center center / cover no-repeat">
                                                <?php break;
                                            } ?>
                                        </div>
                                        <?php

                                    }
                                } ?>
                            </div>
                            <?php if ($field['overlay_hero_text'] || ($field['hero_text'])) { ?>
                                <div class="inner_wrapper grid_layouts sub-hero">

                                    <?php if ($field['overlay_hero_text']) { ?>
                                        <div class="block one hero_text">
                                            <div class="feature_box"></div>
                                            <div class="text-wrap">
                                                <?php echo $field['overlay_hero_text'];
                                                ?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($field['hero_text']) { ?>
                                        <div class="block one column_text">
                                            <div class="text_wrap">
                                                <?php echo $field['hero_text'] ?>
                                            </div>
                                            <?php if ($field['column_image']['sizes']['square500']) { ?>
                                                <div class="image">
                                                    <img src="<?php echo $field['column_image']['sizes']['square500']; ?>">
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>

                                </div>
                            <?php } ?>

                        </section>
                        <?php
                        break;
                    case'Image':
                        ?>
                        <section class="page flexible-content hero-section image <?php echo $field['hero_height']; ?>"
                                 id="<?php if ($field['layout_title']) {
                                     echo sanitize_title($field['layout_title']);
                                 } ?>">
                            <div class="inner_wrapper grid_layouts full_width hero ">
                                <?php if ($field['image']) {
                                    $image_url = $field['image']['sizes']['full_width_large'];
                                    $hero_overlay = $field['hero_overlay_colour'];
                                    ?>
                                    <div class="block one media"
                                         style="background:
                                         <?php
                                         switch ($hero_overlay) {
                                         case 'white': ?>
                                                 linear-gradient(to right, rgba(255,255,255,0.6) 0%, rgba(255,255,255,0.6) 45%),
                                                 url(<?php echo $image_url ?>)center center/cover no-repeat">
                                        <?php break;
                                        case 'one': ?>
                                            linear-gradient(to right, rgba(250,64,125,0.6) 0%, rgba(250,64,125,0.6) 45%),
                                            url(<?php echo $image_url ?>)center center/cover no-repeat">
                                            <?php break;
                                        case 'two': ?>
                                            linear-gradient(to right, rgba(255,137,0,0.6) 0%, rgba(255,137,0,0.6) 45%),
                                            url(<?php echo $image_url ?>)center center/cover no-repeat">
                                            <?php break;
                                        case 'three': ?>
                                            linear-gradient(to right, rgba(74,215,226,0.6) 0%, rgba(74,215,226,0.6) 45%),
                                            url(<?php echo $image_url ?>)center center/cover no-repeat">
                                            <?php break;
                                        case 'four': ?>
                                            linear-gradient(to right, rgba(167,219,216,0.6) 0%, rgba(167,219,216,0.6) 45%),
                                            url(<?php echo $image_url ?>)center center/cover no-repeat">
                                            <?php break;
                                        case 'five': ?>
                                            linear-gradient(to right, rgba(251,227,91,0.6) 0%, rgba(251,227,91,0.6) 45%),
                                            url(<?php echo $image_url ?>)center center/cover no-repeat">
                                            <?php break;

                                        default: ?>
                                            url(<?php echo $image_url; ?>)center center / cover no-repeat">
                                            <?php break;
                                        } ?>
                                    </div>


                                    <div class="orange-break"></div>
                                <?php } ?>
                            </div>
                            <?php if ($field['overlay_hero_text'] || ($field['hero_text'])) { ?>
                                <div class="inner_wrapper grid_layouts sub-hero">
                                    <?php if ($field['overlay_hero_text']) { ?>
                                        <div class="block one hero_text">
                                            <div class="feature_box"></div>
                                            <div class="text-wrap">
                                                <?php echo $field['overlay_hero_text'] ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($field['hero_text']) { ?>
                                        <div class="block one column_text">
                                            <div class="text_wrap">
                                                <?php echo $field['hero_text'] ?>
                                            </div>
                                            <?php if ($field['column_image']['url']) { ?>
                                                <div class="image">
                                                    <img src="<?php echo $field['column_image']['url']; ?>">
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </section>
                        <?php
                        break;
                    case'Carousel': ?>
                        <section
                                class="page flexible-content hero-section carousel <?php echo $field['hero_height']; ?>"
                                id="<?php if ($field['layout_title']) {
                                    echo sanitize_title($field['layout_title']);
                                } ?>">
                            <div class="inner_wrapper full_width hero carousel-inner">
                                <?php if ($field['carousel']) { ?>

                                    <?php foreach ($field['carousel'] as $carousel_slide) {
                                        the_row();
                                        // vars
                                        $image = $carousel_slide['slide']['url']; ?>
                                        <div class="block one"
                                             style="background: url(<?php echo $image; ?>)center center / cover no-repeat">
                                            <div class="orange-break"></div>
                                        </div>


                                    <?php } ?>

                                <?php } ?>
                            </div>
                            <?php if ($field['overlay_hero_text'] || ($field['hero_text'])) { ?>
                                <div class="inner_wrapper grid_layouts sub-hero">
                                    <?php if ($field['overlay_hero_text']) { ?>
                                        <div class="block one hero_text">
                                            <div class="feature_box"></div>
                                            <div class="text-wrap">
                                                <?php echo $field['overlay_hero_text'] ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($field['hero_text']) { ?>
                                        <div class="block one column_text">
                                            <div class="text_wrap">
                                                <?php echo $field['hero_text'] ?>
                                            </div>
                                            <?php if ($field['column_image']['sizes']['square500']) { ?>
                                                <div class="image">
                                                    <img src="<?php echo $field['column_image']['sizes']['square500']; ?>">
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </section>
                        <?php
                        break;

                } ?>


                <?php break;
            case 'text': ?>
                <section class="page flexible-content text-section <?php echo $field['row_margins'] ?><?php
                if ($field['background_option'] == 'normal') {
                    echo $field['colour_group_row'];
                } ?>"
                         id="<?php if ($field['layout_title']) {
                             echo sanitize_title($field['layout_title']);
                         } ?>">
                    <div class="inner_wrapper grid_layouts text ">
                        <?php if ($field['text_options'] == 'three inner') { ?>
                        <div class="subgrid one eighty">
                            <?php }
                            if ($field['repeater']) {
                                foreach ($field['repeater'] as $inner_field) { ?>

                                    <?php switch ($inner_field['content_type']) {
                                        case 'text': ?>
                                            <div class="block <?php echo $field['text_options'] ?>">
                                                <?php echo $inner_field['text']; ?>
                                            </div>
                                            <?php break;
                                        case 'image':
                                            ?>
                                            <div class="block image <?php echo $field['text_options'] ?>"
                                                 style="background: url(<?php echo $inner_field['text-image']['sizes']['medium_large']; ?>)center center / cover no-repeat">
                                            </div>
                                            <?php break;
                                        default:
                                            # code...
                                            break;
                                    } ?>


                                <?php }

                            } ?>
                            <?php if ($field['text_options'] == 'three inner') { ?>
                        </div>
                    <?php } ?>
                        <?php if ($field['background_option'] == 'border') { ?>
                            <div class="left <?php echo $field['colour_group_row'] ?>"></div>
                            <div class="right <?php echo $field['colour_group_row'] ?>"></div>
                        <?php } ?>
                    </div>


                </section>
                <?php break;
            case 'title': ?>
                <section class="page flexible-content"
                         id="<?php if ($field['layout_title']) {
                             echo sanitize_title($field['layout_title']);
                         } ?>">

                    <?php switch ($field['title_type']) {
                        case 'option-one': ?>

                            <div class="inner_wrapper grid_layouts title-row option-one">
                                <?php if ($field['title_text']) { ?>
                                    <div class="block title <?php echo $field['title_margin']; ?>">
                                        <h2><?php echo $field['title_text']; ?></h2>
                                    </div>
                                <?php } ?>
                                <!---->
                                <!--                                --><?php //if ($field['subtitle_text']) { ?>
                                <!--                                    <div class="block subtitle">-->
                                <!--                                        <p>-->
                                <?php //echo $field['subtitle_text']; ?><!--</p>-->
                                <!--                                    </div>-->
                                <!--                                --><?php //} ?>
                            </div>
                            <?php break;
                        case 'option-two': ?>

                            <div class="inner_wrapper grid_layouts title-row option-two">
                                <div class="block title <?php echo $field['title_margin']; ?>">
                                    <div class="feature_box <?php echo $field['colour_group'] ?>"></div>
                                    <h2><?php echo $field['title_text']; ?></h2>
                                </div>
                            </div>
                            <?php break;
                        case 'option-three': ?>

                            <div class="inner_wrapper grid_layouts featured_news_title title-row option-three">
                                <div class="one block title <?php echo $field['title_margin']; ?>">
                                    <div class="feature_box <?php echo $field['colour_group'] ?>">
                                        <?php echo $field['feature_title_text']; ?>
                                    </div>
                                    <div class="text-wrap">
                                        <?php echo $field['option_three'];; ?>
                                    </div>
                                </div>
                            </div>
                            <?php break;
                    } ?>
                </section>
                <?php break;
            case 'featured_content':
                ?>
                <section class="page flexible-content featured-content-section"
                         id="<?php if ($field['layout_title']) {
                             echo sanitize_title($field['layout_title']);
                         } ?>">
                    <?php if ($field['row_title']) { ?>
                        <div class="inner_wrapper grid_layouts title-row option-one">
                            <div class="block one title">
                                <h2><?php echo $field['row_title'] ?></h2>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="inner_wrapper grid_layouts featured-contents">
                        <div class="block one subgrid">
                            <?php
                            if ($field['featured_content']) {
                                foreach ($field['featured_content'] as $post) { // variable must be called $post (IMPORTANT) ?>

                                    <?php
//                                    dbug($post->post_type);
                                    $postType = $post->post_type;
                                    setup_postdata($post);
                                    $innerfields = get_fields($post->ID);
//                                    dbug($innerfields);
                                    if ($innerfields['feature_override']) {
                                        $thumb_url = $innerfields['feature_override']['sizes']['medium_crop_portrait'];
                                    } else
                                        if (has_post_thumbnail()) {
                                            $thumb_id = get_post_thumbnail_id();
                                            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'medium_crop_portrait', true);
                                            $thumb_url = $thumb_url_array[0];

                                        } else {

                                            $thumb_url = esc_url(wc_placeholder_img_src());
                                        }

                                    ?>
                                    <div class="block four"
                                         style="background:
                                         <?php
                                         switch ($innerfields['cat_overlay_colour']) {
                                         case 'white': ?>
                                                 linear-gradient(to right, rgba(255,255,255,0.6) 0%, rgba(255,255,255,0.6) 45%),
                                                 url(<?php echo $thumb_url ?>)center center/cover no-repeat">
                                        <?php break;
                                        case 'one': ?>
                                            linear-gradient(to right, rgba(250,64,125,0.6) 0%, rgba(250,64,125,0.6) 45%),
                                            url(<?php echo $thumb_url ?>)center center/cover no-repeat">
                                            <?php break;
                                        case 'two': ?>
                                            linear-gradient(to right, rgba(255,137,0,0.6) 0%, rgba(255,137,0,0.6) 45%),
                                            url(<?php echo $thumb_url ?>)center center/cover no-repeat">
                                            <?php break;
                                        case 'three': ?>
                                            linear-gradient(to right, rgba(74,215,226,0.6) 0%, rgba(74,215,226,0.6) 45%),
                                            url(<?php echo $thumb_url ?>)center center/cover no-repeat">
                                            <?php break;
                                        case 'four': ?>
                                            linear-gradient(to right, rgba(167,219,216,0.6) 0%, rgba(167,219,216,0.6) 45%),
                                            url(<?php echo $thumb_url ?>)center center/cover no-repeat">
                                            <?php break;
                                        case 'five': ?>
                                            linear-gradient(to right, rgba(251,227,91,0.6) 0%, rgba(251,227,91,0.6) 45%),
                                            url(<?php echo $thumb_url ?>)center center/cover no-repeat">
                                            <?php break;

                                        default: ?>
                                            url(<?php echo $thumb_url ?>)center center/cover no-repeat">
                                            <?php break;
                                        } ?>
                                        <?php
                                        switch ($postType) {
                                            case 'product': ?><?php
                                                if ($innerfields['show_product_links'] != null) {
                                                    ?> <a class="abs" href="<?php the_permalink(); ?>"></a>
                                                <?php }
                                                break;

                                            case 'team_members': ?>
                                                <a class="abs" href="<?php echo home_url() ?>/team-members"></a>
                                                <?php
                                                break;

                                            default: ?>
                                                <a class="abs" href="<?php the_permalink(); ?>"></a>
                                                <?php break;

                                        }
                                        ?>
                                        <div>
                                            <?php if (get_field('alt_title')) { ?>
                                                <h2><?php echo get_field('alt_title') ?></h2>
                                            <?php } else { ?>
                                                <h2><?php the_title();

                                                    ?></h2>
                                            <?php } ?>
                                            <div class="excerpt visuallyhidden">
                                                <?php echo $innerfields['product_excerpt']; ?>
                                            </div>
                                            <?php
                                            switch ($postType) {
                                                case 'product': ?><?php
                                                    if ($innerfields['show_product_links'] != null) { ?>
                                                        <span class="button-primary vthree">
                                                        <a href="<?php the_permalink(); ?>">Discover</a>
                                                    </span>
                                                        <?php
                                                    }
                                                    break;

                                                case 'team_members': ?>
                                                    <span class="button-primary vthree">
                                                        <a href="<?php echo home_url() ?>/team-members">Discover</a>
                                                    </span>
                                                    <?php
                                                    break;

                                                default: ?>
                                                    <span class="button-primary vthree">
                                                    <a href="<?php the_permalink(); ?>">Discover</a>
                                                    </span>
                                                    <?php break;

                                            }
                                            ?>


                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
                            ?>
                        </div>
                    </div>
                </section>
                <?php break;
            case 'featured_testimonials': ?>
                <section class="page flexible-content featured-testimonials-section"
                         id="<?php if ($field['layout_title']) {
                             echo sanitize_title($field['layout_title']);
                         } ?>">
                    <div class="inner_wrapper grid_layouts featured-testimonials">
                        <div class="block one subgrid">
                            <?php
                            if ($field['testimonials']) {
                                foreach ($field['testimonials'] as $post) { // variable must be called $post (IMPORTANT)
                                    setup_postdata($post);
                                    $testimonialFields = get_fields($post->ID);
                                    if ($testimonialFields['testimonial_video']) {
                                        $iframe = $field['testimonial_video'];
                                    } elseif (has_post_thumbnail()) {
                                        $thumb_id = get_post_thumbnail_id();
                                        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'medium_crop', true);
                                        $thumb_url = $thumb_url_array[0];
                                    } else {
                                        $thumb_url = esc_url(wc_placeholder_img_src());
                                    }
                                    ?>
                                    <?php if ($testimonialFields['testimonial_video']) { ?>
                                        <div class="block two video">
                                            <video
                                                    id="vid<?php echo $key ?>"
                                                    class="video-js"
                                                    autoplay="true"
                                                    loop="loop"
                                                    preload=""
                                                    muted="muted"
                                                    volume="0"
                                                    data-setup='{
                                                "techOrder": ["youtube"],
                                                "sources": [{ "type": "video/youtube","src": "<?php echo $iframe ?>"}] }'
                                            >
                                            </video>
                                        </div>
                                    <?php } else { ?>
                                        <div class="block two image"
                                             style="background: url(<?php echo $thumb_url ?>)center center/cover no-repeat">
                                        </div>
                                    <?php } ?>
                                    <div class="block two text">
                                        <div class="inner_block">
                                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/quote.png">
                                            <?php if (the_content()) {
                                                the_content();
                                            } ?>
                                            <?php if (get_field('alt_title')) { ?>
                                                <h2><?php echo get_field('alt_title') ?></h2>
                                            <?php } else { ?>
                                                <h2><?php the_title(); ?></h2>
                                            <?php } ?>
                                        </div>
                                        <?php

                                        if ($field['show_review_links'] == 1) { ?>
                                            <a href="<?php echo home_url() . '/reviews' ?>">read more Reviews</a>
                                        <?php } ?>
                                    </div>

                                    <?php
                                }
                            }
                            wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
                            ?>
                        </div>
                    </div>
                </section>
                <?php break;
            case 'featured_news': ?>
                <section class="page flexible-content featured-news-section"
                         id="<?php if ($field['layout_title']) {
                             echo sanitize_title($field['layout_title']);
                         } ?>"

                         style="background:
                         <?php if ($field['overlay_colour_news']) { ?>
                                 linear-gradient(to right, <?php echo $field['overlay_colour_news']; ?> 0%, <?php echo $field['overlay_colour_news']; ?>45%),

                         <?php } ?>
                                 url(<?php echo $field['image_news']['url'] ?>)top center/cover no-repeat">
                    <div class="inner_wrapper grid_layouts featured_news_title">

                        <div class="one block title">
                            <div class="feature_box">
                                <h2><?php echo $field['news_sub_title_text'] ?></h2>
                            </div>
                            <div class="text-wrap">
                                <?php
                                echo $field['news_title_text'] ?>
                            </div>
                        </div>
                        <?php if ($field['news_intro_title_text']) { ?>
                            <div class="one block">
                                <?php echo $field['news_intro_title_text'] ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="inner_wrapper grid_layouts featured_news">
                        <div class="one subgrid">
                            <?php
                            if ($field['featured_news']) {
                                foreach ($field['featured_news'] as $postIndex => $post) { // variable must be called $post (IMPORTANT)

                                    setup_postdata($post);

                                    if (has_post_thumbnail()) {
                                        $thumb_id = get_post_thumbnail_id();
                                        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'medium_large', true);
                                        $thumb_url = $thumb_url_array[0];
                                    } else {
                                        $thumb_url = esc_url(wc_placeholder_img_src());
                                    };

                                    if ($postIndex == 0) { ?>
                                        <div class="block newsone"
                                             style="background: url(<?php echo $thumb_url ?>)center center/cover no-repeat">
                                            <div class="inner_block">
                                                <?php if (get_field('alt_title')) { ?>
                                                    <h5><?php echo get_field('alt_title') ?></h5>
                                                <?php } else { ?>
                                                    <h5><?php the_title(); ?></h5>
                                                <?php } ?>
                                                <p><?php echo limit_words(get_the_excerpt(), '8'); ?></p>

                                                <a class="link"
                                                   href="<?php the_permalink(); ?>">Read More</a>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                ;
                                    if ($postIndex == 1) { ?>
                                        <div class="block newstwo">
                                            <?php if (get_field('alt_title')) { ?>
                                                <h5><?php echo get_field('alt_title') ?></h5>
                                            <?php } else { ?>
                                                <h5><?php the_title(); ?></h5>
                                            <?php } ?>
                                            <p><?php echo limit_words(get_the_excerpt(), '30'); ?></p>

                                            <a class="link"
                                               href="<?php the_permalink(); ?>">Read More</a>
                                        </div>
                                        <?php
                                    }
                                ;
                                    if ($postIndex == 2) { ?>
                                        <div class="block newsthree">
                                            <div class="inner_block"
                                                 style="background: url(<?php echo $thumb_url ?>)center center/cover no-repeat">
                                            </div>
                                            <div class="inner_block">
                                                <?php if (get_field('alt_title')) { ?>
                                                    <h5><?php echo get_field('alt_title') ?></h5>
                                                <?php } else { ?>
                                                    <h5><?php the_title(); ?></h5>
                                                <?php } ?>
                                                <p><?php echo limit_words(get_the_excerpt(), '8'); ?></p>

                                                <a class="link"
                                                   href="<?php the_permalink(); ?>">Read More</a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                ;
                                    if ($postIndex == 3) { ?>
                                        <div class="block newsfour">
                                            <div class="inner_block"
                                                 style="background: url(<?php echo $thumb_url ?>)center center/cover no-repeat">
                                            </div>
                                            <div class="inner_block">
                                                <?php if (get_field('alt_title')) { ?>
                                                    <h5><?php echo get_field('alt_title') ?></h5>
                                                <?php } else { ?>
                                                    <h5><?php the_title(); ?></h5>
                                                <?php } ?>
                                                <p><?php echo limit_words(get_the_excerpt(), '8'); ?></p>

                                                <a class="link"
                                                   href="<?php the_permalink(); ?>">Read More</a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                ;
                                    if ($postIndex == 4) { ?>
                                        <div class="block newsfive">
                                            <div class="inner_block"
                                                 style="background: url(<?php echo $thumb_url ?>)center center/cover no-repeat">
                                            </div>
                                            <div class="inner_block">
                                                <?php if (get_field('alt_title')) { ?>
                                                    <h5><?php echo get_field('alt_title') ?></h5>
                                                <?php } else { ?>
                                                    <h5><?php the_title(); ?></h5>
                                                <?php } ?>
                                                <p><?php echo limit_words(get_the_excerpt(), '8'); ?></p>

                                                <a class="link"
                                                   href="<?php the_permalink(); ?>">Read More</a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                ;
                                    if ($postIndex == 5) { ?>
                                        <div class="block newssix"
                                             style="background: url(<?php echo $thumb_url ?>)center center/cover no-repeat">
                                            <div class="inner_block">
                                                <?php if (get_field('alt_title')) { ?>
                                                    <h5><?php echo get_field('alt_title') ?></h5>
                                                <?php } else { ?>
                                                    <h5><?php the_title(); ?></h5>
                                                <?php } ?>
                                                <p><?php echo limit_words(get_the_excerpt(), '8'); ?></p>
                                                <a class="link"
                                                   href="<?php the_permalink(); ?>">Read More</a>
                                            </div>
                                        </div>
                                        <?php
                                    };
                                }
                            }
                            wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
                            ?>

                        </div>
                    </div>
                    <div class="inner_wrapper full_width blocker">
                        <div class="block"></div>
                    </div>
                </section>
                <?php break;
            case 'target_results':
                ?>
                <section class="page flexible-content target-results-section"
                         id="<?php if ($field['layout_title']) {
                             echo sanitize_title($field['layout_title']);
                         } ?>">
                    <div class="inner_wrapper grid_layouts target-nav">
                        <div class="one freegrid-five">
                            <?php
                            if ($field['target_group']) {
                                foreach ($field['target_group'] as $key => $item) { ?>
                                    <div class="block inner">
                                        <a href="#<?php echo 'tag-' . $key ?>">
                                            <h2><?php echo $item['title'] ?></h2>
                                        </a>
                                    </div>
                                <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="inner_wrapper  grid_layouts text-section">
                        <div class="block one">
                            <?php echo $field['target_title_text']; ?>
                        </div>
                    </div>
                    <div class="inner_wrapper grid_layouts tags" id="tags">

                        <?php
                        //LOOP THROUGH GROUP IN REPEATER
                        if ($field['target_group']) {
                            foreach ($field['target_group'] as $key => $item) { ?>
                                <?php
                                /*
                                *  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
                                *  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
                                *  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
                                */
                                $post_objects = $item['target_group_tax'];
                                //
                                ?>

                                <div class="block one eighty title" id="<?php echo 'tag-' . $key ?>">
                                    <?php
                                    echo $item['target_text'];
                                    ?>
                                    <?php foreach ($post_objects as $tag) { ?>
                                        <div class="inner_block">
                                            <h3 class="show_hide"><?php echo $tag->name; ?> <span
                                                        class="fas fa-plus active"></span> <span
                                                        class="fas fa-minus"></span></h3>
                                            <div class="products slidingDiv">
                                                <?php

                                                /* QUERY PRODUCTS BASED BASED ON TAG   */
                                                $products_loop = new WP_Query(array(
                                                    'post_type' => 'product',
                                                    'showposts' => -1,
                                                    'order_by' => 'menu_order',
                                                    'tax_query' => array_merge(array(
                                                        'relation' => 'AND',
                                                        array(
                                                            'taxonomy' => 'product_tag',
                                                            'terms' => array($tag->term_id),
                                                            'field' => 'term_id'
                                                        )
                                                    ), WC()->query->get_meta_query())
                                                ));

                                                if ($products_loop->posts) {
                                                    foreach ($products_loop->posts as $post) { ?>


                                                        <?php setup_postdata($post);
                                                        $innerfields = get_fields($post->ID);

                                                        if (has_post_thumbnail()) {
                                                            $thumb_id = get_post_thumbnail_id();
                                                            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'medium_crop', true);
                                                            $thumb_url = $thumb_url_array[0];
                                                        } else {

                                                            $thumb_url = esc_url(wc_placeholder_img_src());
                                                        }

                                                        ?>
                                                        <div class="details">
                                                            <div class="product">

                                                                <div class="inner_details">
                                                                    <div class="title-wrap">
                                                                        <h3><?php the_title(); ?></h3>
                                                                        <h4 class="subtitle"><?php echo $innerfields['sub_title']; ?></h4>
                                                                    </div>

                                                                    <span class="button-primary vthree">
                                                                <a class="show_hidetags">Read More</a>
                                                            </span>
                                                                </div>
                                                                <div class="inner_details slidingDivtags">
                                                                    <!--                                                                    <figure class="inner_block">-->
                                                                    <!--                                                                        <div class="image">-->
                                                                    <!--                                                                            <img src="-->
                                                                    <?php //echo $thumb_url ?><!--">-->
                                                                    <!--                                                                        </div>-->
                                                                    <!--                                                                    </figure>-->
                                                                    <div class="inner_block">
                                                                        <p><?php echo $innerfields['product_excerpt']; ?></p>
                                                                        <span class="button-primary vtwo ">
                                                                    <a href="<?php the_permalink(); ?>">Discover</a>
                                                                </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    <?php }
                                                }

                                                ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>


                            <?php }
                        } ?>
                    </div>

                </section>
                <?php
                break;
            case 'feature_block' :
                ?>
                <section class="page flexible-content feature_block"
                         id="<?php if ($field['layout_title']) {
                             echo sanitize_title($field['layout_title']);
                         } ?>">

                    <div class="inner_wrapper grid_layouts text_intro">
                        <?php
                        $thumb_url = $field['image']['sizes']['full_width'];
                        ?>
                        <div class="block one"
                             style="background: url(<?php echo $thumb_url ?>)center center/cover no-repeat">
                            <div class="overlay <?php echo $field['overlay_colour']; ?>"></div>
                            <div class="text-feature">
                                <?php echo $field['feature_text']; ?>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                break;
            case 'gallery':
                ?>
                <section class="gallery"
                         id="<?php if ($field['layout_title']) {
                             echo sanitize_title($field['layout_title']);
                         } ?>">

                    <div class="inner_wrapper grid_layouts">
                        <div class="subgrid one">
                            <?php foreach ($field['gallerycontent'] as $img) { ?>
                                <div class="block"
                                     style="background: url(<?php echo $img['sizes']['medium_large']; ?>)center center / cover no-repeat">
                                    <a class="gallery-item" href="<?php echo $img['url']; ?>"></a>
                                </div>
                            <?php }
                            ?>
                        </div>
                </section>

                <?php
                break;
            default:
                # code...
                break;
        }
    }
}