<?php
$flexFields = get_field('flexible', $post->ID);

$spaceUnits = get_field('spacing_units', $post->ID);
$emSpacing = get_field('vertical_spacing', $post->ID);
$viewportSpacing = get_field('vertical_spacing_viewport', $post->ID);


?>


<?php if ($flexFields > 0) { ?>

<section class="flexible-content">
    <?php foreach ($flexFields as $key => $field) {
        // PADDING CONTROL
        // FIRST CHECKS WHICH UNITS ARE BEING USED
        // AFTER THAT CHECKS ARE MADE FOR ROW BY ROW SETTINGS, OPTIONS ARE FULL, HALF & NONE
        if ($spaceUnits == 'EM') {

            //IF NO PAD TOP OR BOTTOM
            if ($field['padding_top'] == 'no-pad' && $field['padding_bottom'] == 'no-pad') {
                $padding = '0';
            } //IF NO PAD TOP AND HALF PAD BOTTOM
            elseif ($field['padding_top'] == 'no-pad' && $field['padding_bottom'] == 'half-pad') {
                $padding = '0 0' . ($emSpacing / 2) . 'em 0';
            } //IF HALF TOP PAD BUT NO PAD BOTTOM
            elseif ($field['padding_top'] == 'half-pad' && $field['padding_bottom'] == 'no-pad') {
                $padding = ($emSpacing / 2) . 'em 0 0 0';
            } //IF HALF TOP PAD AND HALF TOP PAD
            elseif ($field['padding_top'] == 'half-pad' && $field['padding_bottom'] == 'half-pad') {
                $padding = ($emSpacing / 2) . 'em 0';
            } //IF NO TOP PAD BUT DEFAULT BOTTOM PAD
            elseif ($field['padding_top'] == 'no-pad' && $field['padding_bottom'] == 'default') {
                $padding = '0 0 ' . $emSpacing . 'em 0';
            } //IF DEFAULT TOP PAD BUT NO BOTTOM PAD
            elseif ($field['padding_top'] == 'default' && $field['padding_bottom'] == 'no-pad') {
                $padding = $emSpacing . 'em 0 0 0';
            } //IF DEFAULT TOP PAD BUT HALF BOTTOM PAD
            elseif ($field['padding_top'] == 'default' && $field['padding_bottom'] == 'half-pad') {
                $padding = $emSpacing . 'em 0 ' . ($emSpacing / 2) . 'em 0';
            } //IF HALF TOP PAD BUT DEFAULT BOTTOM PAD
            elseif ($field['padding_top'] == 'half-pad' && $field['padding_bottom'] == 'default') {
                $padding = ($emSpacing / 2) . 'em 0 ' . $emSpacing . 'em 0';
            } //IF DEFAULT PAD TOP AND BOTTOM
            else {
                $padding = $emSpacing . 'em 0';
            }
        } elseif ($spaceUnits == 'vh') {
            //IF NO PAD TOP OR BOTTOM
            if ($field['padding_top'] == 'no-pad' && $field['padding_bottom'] == 'no-pad') {
                $padding = '0';
            } //IF NO PAD TOP AND HALF PAD BOTTOM
            elseif ($field['padding_top'] == 'no-pad' && $field['padding_bottom'] == 'half-pad') {
                $padding = '0 0 ' . ($viewportSpacing / 4) . 'vh 0';
            } //IF HALF TOP PAD BUT NO PAD BOTTOM
            elseif ($field['padding_top'] == 'half-pad' && $field['padding_bottom'] == 'no-pad') {
                $padding = ($viewportSpacing / 4) . 'vh 0 0 0';
            } //IF HALF TOP PAD AND HALF TOP PAD
            elseif ($field['padding_top'] == 'half-pad' && $field['padding_bottom'] == 'half-pad') {
                $padding = ($viewportSpacing / 4) . 'vh 0';
            } //IF NO TOP PAD BUT DEFAULT BOTTOM PAD
            elseif ($field['padding_top'] == 'no-pad' && $field['padding_bottom'] == 'default') {
                $padding = '0 0 ' . ($viewportSpacing / 2) . 'vh 0';
            } //IF DEFAULT TOP PAD BUT NO BOTTOM PAD
            elseif ($field['padding_top'] == 'default' && $field['padding_bottom'] == 'no-pad') {
                $padding = ($viewportSpacing / 2) . 'vh 0 0 0';
            } //IF DEFAULT TOP PAD BUT HALF BOTTOM PAD
            elseif ($field['padding_top'] == 'default' && $field['padding_bottom'] == 'half-pad') {
                $padding = ($viewportSpacing / 2) . 'vh 0 ' . ($viewportSpacing / 4) . 'vh 0';
            } //IF HALF TOP PAD BUT DEFAULT BOTTOM PAD
            elseif ($field['padding_top'] == 'half-pad' && $field['padding_bottom'] == 'default') {
                $padding = ($viewportSpacing / 4) . 'vh 0 ' . ($viewportSpacing / 2) . 'vh 0';
            } //IF DEFAULT PAD TOP AND BOTTOM
            else {
                $padding = ($viewportSpacing / 2) . 'vh 0';
            }
        }
        switch ($field['acf_fc_layout']) {

            case 'grid_layout' :


                ?>
                <div class="inner_wrapper grid_layouts

                    <?php switch ($field['row_options']) {

                    case 'full_width':
                        echo 'full_width ';
                        echo $field['grid_gap'];
                        break;
                    case 'subgrid':
                        echo 'grid_margin';

                        break;
                    case 'standard':
                        echo $field['grid_gap'];
                        break;
                } ?>"
                     id="<?php echo sanitize_title($field['admin_label']); ?>"
                     style="padding:<?php echo $padding ?>;">
                    <?php

                    // IF SUBGRID ROW OUTPUT THIS WRAPPER
                    if ($field['row_options'] == 'subgrid') { ?>
                    <div class="one <?php if ($field['columns'] != 'one') { ?>
                        subgrid
                        <?php } ?>
                        <?php echo $field['grid_gap']; ?> ">

                        <?php
                        }
                        if ($field['content_repeater']) { ?>

                            <?php foreach ($field['content_repeater'] as $detail) { ?>

                                <?php $className = $field['columns']; ?>


                                <?php switch ($detail['content_type']) {

                                    case 'Text'; ?>
                                        <div class=" block text <?php echo $className . ' ' . $field['one_column'] . ' ' . $field['two_column'] . ' ' . $field['three_column'] . ' ' . $field['four_column'] . ' ' . $field['animation'] ?>"
                                             style="justify-content: <?php echo $detail['row_align']; ?>;">
                                            <?php
                                            echo ($detail['row_align'] == 'center') ? '<span class="text-wrapper-center">' : '';
                                            if ($detail['text']) {
                                                echo $detail['text'];
                                            }
                                            echo ($detail['row_align'] == 'center') ? '</span>' : '';
                                            ?>
                                        </div>
                                        <?php break;
                                    case 'Image'; ?>
                                        <div class="block image <?php if ($detail['image_type'] == 'background') {
                                            echo 'background-image';
                                        } ?> <?php echo $className . ' ' . $field['one_column'] . ' ' . $field['two_column'] . ' ' . $field['three_column'] . ' ' . $field['four_column'] . ' ' . $field['animation'] ?>">
                                            <?php if ($detail['image']) {

                                            if ($detail['light_box'] == true) { ?>
                                            <a class="gallery-item"
                                                    href="<?php echo $detail['image']['url'] ?>">
                                                <?php }

                                                    if ($detail['image_link'] == 'onsite') { ?>
                                                        <a href="<?php echo $detail['on_site_link'] ?>">
                                                    <?php }elseif ($detail['image_link'] == 'offsite') { ?>
                                                        <a target="_blank" href="<?php echo $detail['off_site_link'] ?>">
                                                    <?php }


                                                    ?>
                                                            <figure>
                                                                <img
                                                                    <?php if ($detail['crop'] == 'square') { ?>
                                                                        src="<?php echo $detail['image']['sizes']['square500']; ?>"
                                                                    <?php } elseif ($detail['crop'] == 'four-three') { ?>
                                                                        src="<?php echo $detail['image']['sizes']['four-three']; ?>"
                                                                    <?php } elseif ($detail['crop'] == 'sixteen-nine') { ?>
                                                                        src="<?php echo $detail['image']['sizes']['sixteen-nine']; ?>"
                                                                    <?php } else { ?>
                                                                        src="<?php echo $detail['image']['sizes']['medium_crop']; ?>"
                                                                    <?php }
                                                                    ?>

                                                                        alt="<?php echo $detail['image']['alt']; ?>"
                                                                        title="<?php echo $detail['image']['title']; ?>">
                                                                <?php if ($detail['image']['caption']) { ?>
                                                                    <figcaption><?php echo $detail['image']['caption']; ?></figcaption>

                                                                <?php } ?>
                                                            </figure>

                                                            <?php

                                                        if ($detail['image_link'] == 'offsite' || $detail['image_link'] == 'onsite') { ?>
                                                    </a>
                                                <?php }

                                                if ($detail['light_box'] == true) { ?>
                                                </a>
                                            <?php }
                                            } ?>

                                        </div>
                                        <?php break;
                                        $key++;
                                        break;

                                } ?>

                            <?php }
                        } ?>


                        <?php if (is_user_logged_in()) { ?>
                            <h6 class="row_finder">
                                Row:<?php echo $key + 1 ?> <?php echo $field['layout_title']; ?></h6>
                            <?php
                        } ?>

                        <?php if ($field['row_options'] == 'subgrid') { ?>
                    </div>

                <?php
                } ?>

                </div>
                <?php break;


            default:
                # code...
                break;
        }

    }
    }
    ?>
</section>

<?php
//dbug($flexFields);
//dbug($spaceUnits);

?>
<!---->
<!--<footer class="entry-footer">-->
<!--    --><?php //twentynineteen_entry_footer(); ?>
<!--</footer>-->