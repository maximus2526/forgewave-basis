<?php
/**
 * Customization hub page template.
 *
 * @package fwb
 **/

?>

<form method="post" action="options.php">
	<div class="fwb-page-title fwb-options-page-title">
		<div class="fwb-page-title-content">
			<h1 class="fwb-page-title"><?php esc_html_e( 'Customization Hub', 'fwb' ); ?></h1>
		</div>
		<img class="fwb-page-title-bg" src="<?php echo esc_url( FWB_IMG_URI ); ?>/admin/options-page-title-bg.jpeg" alt="Admin page title">
	</div>
		
	
	<div class="fwb-container fwb-options-page wrap">

		<div class="nav-tab-wrapper">
			<a href="#all_tab" class="nav-tab"><?php echo esc_html__( 'All Settings', 'fwb' ); ?></a>
			<a href="#layout_tab" class="nav-tab"><?php echo esc_html__( 'Layout Settings', 'fwb' ); ?></a>
			<a href="#performance_tab" class="nav-tab"><?php echo esc_html__( 'Performance Settings', 'fwb' ); ?></a>
			<a href="#colors_tab" class="nav-tab"><?php echo esc_html__( 'Color Settings', 'fwb' ); ?></a>
			<!-- Add more tabs as needed -->
		</div>
		<div class="fwb-row">
			<?php // Use the options class to handle settings sections and fields ?>
			<?php settings_fields( 'fwb-options-page' ); ?>
			<?php do_settings_sections( 'fwb-options-page' ); ?>
		</div>
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'fwb' ); ?>" />
		</p>
		<?php wp_nonce_field( 'fwb_options_nonce', 'fwb_options_nonce_field' ); ?>
	</div>
</form>
