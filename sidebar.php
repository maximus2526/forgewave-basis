<?php
namespace fwb;

$sidebar_classes = '';

if ( fwb_get_opt( 'enable_sidebar' ) ) {
	return;
}

$sidebar_bg            = fwb_get_opt( 'sidebar_bg_color' );
$sidebar_header_color  = fwb_get_opt( 'sidebar_headers_color' );
$sidebar_text_color    = fwb_get_opt( 'sidebar_text_color' );
$sidebar_anchors_color = fwb_get_opt( 'sidebar_anchors_color' );
$is_mobile_size        = wp_is_mobile();

if ( $sidebar_bg ) {
	fwb_add_custom_css_variable( 'fwb-sidebar-background-color', $sidebar_bg );
}

if ( $sidebar_header_color ) {
	fwb_add_custom_css_variable( 'fwb-sidebar-headers-color', $sidebar_header_color );
}

if ( $sidebar_text_color ) {
	fwb_add_custom_css_variable( 'fwb-sidebar-text-color', $sidebar_text_color );
}

if ( $sidebar_anchors_color ) {
	fwb_add_custom_css_variable( 'fwb-sidebar-anchors-color', $sidebar_anchors_color );
}

if ( '1' === fwb_get_opt( 'sticky_sidebar' ) ) {
	$sidebar_classes .= ' fwb-sticky-sidebar';
}

$page_id = get_the_ID();

$hide_sidebar_single = get_post_meta( $page_id, '_fwb_hide_sidebar', true );
$selected_sidebar    = get_post_meta( $page_id, '_fwb_selected_sidebar', true );

if ( $hide_sidebar_single ) {
	return;
}

?>
<div class="fwb-sidebar fwb-col-3<?php echo esc_attr( $sidebar_classes ); ?>">
	<?php
	if ( is_active_sidebar( $selected_sidebar ) ) {
		dynamic_sidebar( $selected_sidebar ? $selected_sidebar : 'main-sidebar' );
	}
	?>
</div>
