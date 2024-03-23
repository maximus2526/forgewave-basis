<?php
/**
 * Template file for HTML blocks.
 *
 * @package fwb
 */

namespace fwb;

get_header();

global $post;

?>

<div class="fwb-elementor-block">
    <?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            the_content();
            comments_template();
        }
    }
    ?>
</div>

<?php
get_footer();
?>
