<div class="block type-three" id="<?php echo $postIndex; ?>">
    <div class="inner_block" style="background: url(<?php echo $thumb_url ?>)center center/cover no-repeat"></div>
    <div class="inner_block">
        <?php if (get_field('alt_title')) { ?>
            <h5><?php echo get_field('alt_title') ?></h5>
        <?php } else { ?>
            <h5><?php the_title(); ?></h5>
        <?php } ?>
        <p><?php echo limit_words(get_the_excerpt(), '5'); ?></p>

        <a class="link"
           href="<?php the_permalink(); ?>">READ MORE</a>
    </div>
</div>