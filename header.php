<?php
/**
 * Template file responsible for rendering the header section.
 *
 * @package fwb
 */

namespace fwb;

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>


<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php wp_title(); ?>
	</title>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php
	// Header options

	$header_top_indent    = fwb_get_opt( 'header_top_indent' );
	$header_bottom_indent = fwb_get_opt( 'header_bottom_indent' );
	$header_content_width = fwb_get_opt( 'header_content_width' );



	$header_classes = '';

	if ( fwb_get_opt( 'sticky_header' ) ) {
		$header_classes .= ' fwb-sticky-header';
	}

	if ( 'header_content_boxed' === fwb_get_opt( 'header_content_width' ) ) {
		$header_classes .= ' fwb-header-boxed';
	}

	$get_header_content = fwb_get_opt( 'header_selection' );

	$get_mobile_header_content = fwb_get_opt( 'mobile_header_selection' );

	?>
	<header class="fwb-header<?php echo esc_attr( $header_classes ); ?>">
		<?php
		// Inline styles.
		fwb_add_custom_css_variable( 'fwb-header-top-indent', $header_top_indent . 'px' );
		fwb_add_custom_css_variable( 'fwb-header-bottom-indent', $header_bottom_indent . 'px' );
		do_action( 'fwb_custom_css' );

		if ( 'elementor-blocks' !== get_post_type() ) {
			echo fwb_get_elementor_block_by_id( $get_mobile_header_content, 'fwb-mobile-view' ); // phpcs:ignore.
			echo fwb_get_elementor_block_by_id( $get_header_content, 'fwb-desktop-view' );       // phpcs:ignore.
		}
		?>
		
	</header>
