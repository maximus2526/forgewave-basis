<?php
/**
 * Template file used to display the front page.
 *
 * @package fwb
 */

namespace fwb;

get_header();

?>
<div class="fwb-container">
    <div class="fwb-row">
        <?php get_sidebar(); ?>
        <div class="fwb-content fwb-col-auto">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
