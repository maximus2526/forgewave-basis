<?php

namespace fwb\Modules\Header\DisablePageTitle;
class DisablePageTitle {
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_custom_meta_box' ) );
        add_action( 'save_post', array( $this, 'save_custom_meta_box_data' ) );
    }

    public function add_custom_meta_box() {
        add_meta_box(
            'fwb_custom_meta_box',
            'Page Title',
            array( $this, 'custom_meta_box_callback' ),
            array( 'page' )
        );
    }
    public function custom_meta_box_callback( $post ) {
        echo '<label for="fwb_hide_title_field">';
        echo '<input type="checkbox" id="fwb_hide_title_field" name="fwb_hide_title_field" value="0" ' . checked( get_post_meta( $post->ID, 'fwb_hide_title_field', true ), 1, false ) . '/>';
        echo 'Show Page Title';
        echo '</label>';
    }

    public function save_custom_meta_box_data( $post_id ) {
        if ( isset( $_POST['fwb_hide_title_field'] ) ) {
            update_post_meta( $post_id, 'fwb_hide_title_field', 1 );
        } else {
            delete_post_meta( $post_id, 'fwb_hide_title_field' );
        }
    }
}
