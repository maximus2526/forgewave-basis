<?php
/**
 * Custom class to add a metabox to hide the sidebar on a page.
 */

namespace fwb\Modules\Sidebar\HideSideBar;

class HideSideBar {

    /**
     * Hook into WordPress.
     */
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_metabox' ) );
        add_action( 'save_post', array( $this, 'save_metabox' ) );
    }

    /**
     * Add metabox.
     */
    public function add_metabox() {
        add_meta_box(
            'fwb_hide_sidebar_metabox',
            'Hide Sidebar',
            array( $this, 'render_metabox' ),
            array( 'page', 'post', 'product', 'shop', 'blog' ),
            'side',
            'high'
        );
    }

    /**
     * Render metabox content.
     *
     * @param \WP_Post $post Post object.
     */
    public function render_metabox( $post ) {
        wp_nonce_field( 'fwb_hide_sidebar_metabox', 'fwb_hide_sidebar_metabox_nonce' );

        $hide_sidebar = get_post_meta( $post->ID, '_fwb_hide_sidebar', true );

        echo '<label for="fwb_hide_sidebar">';
        echo '<input type="checkbox" id="fwb_hide_sidebar" name="fwb_hide_sidebar" value="1" ' . checked( $hide_sidebar, 1, false ) . ' />';
        echo 'Hide the sidebar on this page';
        echo '</label>';
    }

    /**
     * Save metabox data.
     *
     * @param int $post_id Post ID.
     */
    public function save_metabox( $post_id ) {
        if ( ! isset( $_POST['fwb_hide_sidebar_metabox_nonce'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['fwb_hide_sidebar_metabox_nonce'], 'fwb_hide_sidebar_metabox' ) ) {
            return;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return;
            }
        }

        $hide_sidebar = isset( $_POST['fwb_hide_sidebar'] ) ? 1 : false;
        update_post_meta( $post_id, '_fwb_hide_sidebar', $hide_sidebar );
    }
}