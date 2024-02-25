<?php
/**
 * Customization hub page template.
 *
 * @package fwb
 **/

namespace fwb;

?>

<div class="fwb-dummy-import-page">
	<div class="fwb-page-title fwb-options-page-title">
		<div class="fwb-page-title-content">
			<h1 class="fwb-page-title"><?php esc_html_e( 'Import/Export', 'fwb' ); ?></h1>
			<span class="fwb-description"><?php esc_html_e( 'Import or export forge wave basis themes.', 'fwb' ); ?></span>
		</div>
		<img class="fwb-page-title-bg" src="<?php echo esc_url( FWB_IMG_URI ); ?>/admin/options-page-title-bg.jpeg" alt="Admin page title">
	</div>
	<div class="fwb-container fwb-import-page wrap">
		<div class="nav-tab-wrapper">
			<a href="#fwb-import" class="nav-tab"><?php echo esc_html__( 'Import', 'fwb' ); ?></a>
			<a href="#fwb-export" class="nav-tab"><?php echo esc_html__( 'Export', 'fwb' ); ?></a>
			<a href="#fwb-advanced" class="nav-tab"><?php echo esc_html__( 'Advanced Settings', 'fwb' ); ?></a>
		</div>

		<div class="fwb-tabs">
			<div id="fwb-import-tab" class="fwb-import-page-tab">
				1
			</div>
			<div id="fwb-export-tab" class="fwb-import-page-tab">
				2
			</div>
			<div id="fwb-advanced-tab" class="fwb-import-page-tab">
				3
			</div>

		</div>

		<p class="submit">
			<input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'fwb' ); ?>" />
		</p>
	</div>
</div>
