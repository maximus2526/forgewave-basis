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
	$get_footer_content = fwb_get_opt( 'footer_selection' );
    echo get_elementor_block_by_id($get_footer_content); // phpcs:ignore
	?>
</footer>
<?php wp_footer(); ?>
</body>
</html>
