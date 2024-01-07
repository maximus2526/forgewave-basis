<?php
namespace fwb;

if (!function_exists('fwb_disable_gutenberg')) {
    function fwb_disable_gutenberg() {

        if (fwb_get_opt('fwb_gutenberg_disabled')) {
            remove_theme_support('core-block-patterns'); // WP 5.5
            add_filter('use_block_editor_for_post_type', '__return_false', 100);
            remove_action('wp_enqueue_scripts', 'wp_common_block_scripts_and_styles');
            add_action('admin_init', function () {
                remove_action('admin_notices', ['WP_Privacy_Policy_Content', 'notice']);
                add_action('edit_form_after_title', ['WP_Privacy_Policy_Content', 'notice']);
            });
        }
    }
    add_action('init', 'fwb\fwb_disable_gutenberg');
}
