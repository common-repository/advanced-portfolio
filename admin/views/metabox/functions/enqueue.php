<?php if (! defined('ABSPATH')) {
    die;
} // Cannot access pages directly.
/**
 * Framework admin enqueue style and scripts
 *
 * @since 1.0
 *
 */
if (! function_exists('sp_advp_admin_enqueue_scripts')) {
    function sp_advp_admin_enqueue_scripts() 
    {
        $current_screen        = get_current_screen();
        $the_current_post_type = $current_screen->post_type;
        if ($the_current_post_type == 'sp_advp_shortcodes' || $the_current_post_type == 'advanced_portfolio') {

            // admin utilities
            wp_enqueue_media();

            // wp core styles
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_style('wp-jquery-ui-dialog');

            // Framework Core Styles
            wp_enqueue_style('sp-advp-framework', SP_AP_URL . 'admin/views/metabox/assets/css/sp-framework.css', array(), SP_AP_VERSION);
            wp_enqueue_style('sp-advp-custom', SP_AP_URL . 'admin/views/metabox/assets/css/sp-custom.css', array(), SP_AP_VERSION);
            wp_enqueue_style('advp-font-awesome', SP_AP_URL . 'public/assets/css/font-awesome.min.css', array(), SP_AP_VERSION);
            wp_enqueue_style('advp-style', SP_AP_URL . 'admin/views/metabox/assets/css/sp-style.css', array(), SP_AP_VERSION);

            if (is_rtl()) {
                wp_enqueue_style('sp-framework-rtl', SP_AP_URL . 'admin/views/metabox/assets/css/sp-framework-rtl.css', array(), SP_AP_VERSION);
            }

            // wp core scripts
            wp_enqueue_script('wp-color-picker');
            wp_enqueue_script('jquery-ui-dialog');

            // framework core scripts
            wp_enqueue_script('sp-advp-plugins', SP_AP_URL . 'admin/views/metabox/assets/js/sp-plugins.js', array(), SP_AP_VERSION, true);
            wp_enqueue_script('sp-advp-framework', SP_AP_URL . 'admin/views/metabox/assets/js/sp-framework.js', array( 'sp-advp-plugins' ), SP_AP_VERSION, true);
        }

    }

    add_action('admin_enqueue_scripts', 'sp_advp_admin_enqueue_scripts');
}