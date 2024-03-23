<?php
/**
 * Template file responsible for rendering the footer section.
 *
 * @package fwb
 */

namespace fwb;
?>

<footer>
	<?php
	if ( 'elementor-blocks' !== get_post_type() ) {
		$get_footer_content = fwb_get_opt( 'footer_selection' );
		echo fwb_get_elementor_block_by_id($get_footer_content); // phpcs:ignore
	}
	?>
</footer>
<?php wp_footer(); ?>
</body>
</html>
