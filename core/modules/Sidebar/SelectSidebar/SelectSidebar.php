<?php
/**
 * Custom class to add a metabox for selecting a sidebar for a page.
 */

namespace fwb\Modules\Sidebar\SelectSidebar;

class SelectSidebar {

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
            'fwb_selected_sidebar_metabox',
            'Select Sidebar',
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
        wp_nonce_field( 'fwb_selected_sidebar_metabox', 'fwb_selected_sidebar_metabox_nonce' );
        $selected_sidebar = get_post_meta( $post->ID, '_fwb_selected_sidebar', true );
        $registered_sidebars = $GLOBALS['wp_registered_sidebars'];
        echo '<label for="fwb-selected-sidebar">';
        echo '<select id="fwb-selected-sidebar" name="fwb_selected_sidebar">';
        echo '<option value="">Default Sidebar</option>';
        foreach ( $registered_sidebars as $sidebar ) {
            echo '<option value="' . esc_attr( $sidebar['id'] ) . '" ' . selected( $selected_sidebar, $sidebar['id'], false ) . '>' . esc_html( $sidebar['name'] ) . '</option>';
        }
        echo '</select>';
        echo '</label>';
    }

    /**
     * Save metabox data.
     *
     * @param int $post_id Post ID.
     */
    public function save_metabox( $post_id ) {
        if ( ! isset( $_POST['fwb_selected_sidebar_metabox_nonce'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['fwb_selected_sidebar_metabox_nonce'], 'fwb_selected_sidebar_metabox' ) ) {
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

        $selected_sidebar = isset( $_POST['fwb_selected_sidebar'] ) ? sanitize_text_field( $_POST['fwb_selected_sidebar'] ) : '';
        
        update_post_meta( $post_id, '_fwb_selected_sidebar', $selected_sidebar );
    }
}
?>
