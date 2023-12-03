<?php
/**
 * Used to display the content when a page on a website is not found, resulting in a 404 error.
 *
 * @package fwb
 */

get_header();

?>

<div class="container">
	<?php echo esc_html__( 'Page not found', 'fwb' ); ?>
</div>

<?php get_footer(); ?>
