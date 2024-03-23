<?php
/**
 * Customization hub page template.
 *
 * @package fwb
 **/

namespace fwb;

?>

<div class="fwb-custom-page">
	<div class="fwb-page-title fwb-custom-page-title">
		<div class="fwb-page-title-content">
			<h1 class="fwb-page-title"><?php esc_html_e( 'Custom JS/CSS', 'fwb' ); ?></h1>
		</div>
		<img class="fwb-page-title-bg" src="<?php echo esc_url( FWB_IMG_URI ); ?>/admin/options-page-title-bg.jpeg" alt="Admin page title">
	</div>
	<div class="fwb-container fwb-custom-page wrap">
		<div class="nav-tab-wrapper">
			<a href="#all_tab" class="nav-tab">All Settings</a>
			<a href="#css_tab" class="nav-tab"><?php echo esc_html__( 'Css', 'fwb' ); ?></a>
			<a href="#js_tab" class="nav-tab"><?php echo esc_html__( 'Js', 'fwb' ); ?></a>
		</div>

		<div class="fwb-tabs">
			<div id="fwb-css-tab" class="fwb-custom-page-tab">
				1
			</div>
			<div id="fwb-js-tab" class="fwb-custom-page-tab">
				2
			</div>

		</div>

		<p class="submit">
			<input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'fwb' ); ?>" />
		</p>
	</div>
</div>
