<?php
/**
 * Customization hub page template.
 *
 * @package fwb
 **/

namespace fwb;
?>

<form method="post" action="options.php">
	<div class="wrap">
		<h2><?php esc_html_e( 'Customization Hub', 'fwb' ); ?></h2>
		<?php settings_errors(); ?>
		<?php // Use the options class to handle settings sections and fields ?>
		<?php settings_fields( 'fwb-options-page' ); ?>
		<?php do_settings_sections( 'fwb-options-page' ); ?>
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'fwb' ); ?>" />
		</p>
		<?php wp_nonce_field( 'fwb_options_nonce', 'fwb_options_nonce_field' ); ?>
	</div>
</form>


<?php 

var_dump( Elementor_Blocks::get_instance()->get_all_elementor_block_ids() );