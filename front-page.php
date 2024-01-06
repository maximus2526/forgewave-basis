<?php
/**
 * Template file used to display the front page.
 *
 * @package fwb
 */

namespace fwb;

get_header();
get_sidebar('sidebar-1');

?>
<main>
<div class="fwb-row">
    <div class="fwb-col-3">
        <?php
        if ( is_active_sidebar( 'main-sidebar' ) ) {
            dynamic_sidebar( 'main-sidebar');
        }
        ?>
    </div>
    <div class="fwb-col-9">
        <?php the_content(); ?>
    </div>
</div>

</main>

<?php get_footer(); ?>
