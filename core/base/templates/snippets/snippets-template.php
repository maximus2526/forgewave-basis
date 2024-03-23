<?php
/**
 * Customization hub page template.
 *
 * @package fwb
 **/

namespace fwb;

?>

<form method="post" action="options.php">
	<div class="fwb-page-title fwb-snippets-page-title">
		<div class="fwb-page-title-content">
			<h1 class="fwb-page-title"><?php esc_html_e( 'Customization Hub', 'fwb' ); ?></h1>
		</div>
		<img class="fwb-page-title-bg" src="<?php echo esc_url( FWB_IMG_URI )?>/admin/options-page-title-bg.jpeg" alt="Admin page title">
	</div>
	
	<div class="fwb-container fwb-options-page wrap">

		<div class="nav-tab-wrapper">
			<a href="#all_tab" class="nav-tab"><?php echo esc_html__( 'All', 'fwb' ) ?></a>
			<a href="#css_tab" class="nav-tab"><?php esc_html_e( 'CSS' ) ?></a>
			<a href="#js_tab" class="nav-tab"><?php esc_html_e( 'JS' ) ?></a>
			<!-- Add more tabs as needed -->
		</div>
		<div class="fwb-row">
			<?php // Use the options class to handle settings sections and fields ?>
			<?php settings_fields( 'fwb-custom-js-css' ); ?>
			<?php do_settings_sections( 'fwb-custom-js-css' ); ?>
		</div>
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'fwb' ); ?>" />
		</p>
		<?php wp_nonce_field( 'fwb_options_nonce', 'fwb_options_nonce_field' ); ?>
	</div>
</form>