<div class="block type-two" id="<?php echo $postIndex; ?>">
        <?php if (get_field('alt_title')) { ?>
            <h5><?php echo get_field('alt_title') ?></h5>
        <?php } else { ?>
            <h5><?php the_title(); ?></h5>
        <?php } ?>
        <p><?php echo limit_words(get_the_excerpt(), '6'); ?></p>

        <a class="link"
           href="<?php the_permalink(); ?>">READ MORE</a>

</div>