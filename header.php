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
	$get_header_content = fwb_get_opt('header_selection');
	?>
	<header>
		<?php echo fwb_get_elementor_block_by_id($get_header_content); // phpcs:ignore?>
	</header>
