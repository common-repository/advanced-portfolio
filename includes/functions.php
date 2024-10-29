<?php
if (! defined('ABSPATH')) {
    exit;
}// if direct access

/**
 * Functions
 */
class SP_AdvP_Functions {

    /**
     * Initialize the class
     */
    public function __construct() 
    {
        add_filter('post_updated_messages', array($this, 'post_update_message'));
        add_filter('admin_footer_text', array($this, 'admin_footer'), 1, 2);
        // Post thumbnails
        add_theme_support('post-thumbnails');
        add_image_size('adv-portfolio-image', 400, 385, true);
    }

    /**
     * Post update messages for Shortcode Generator
     */
    function post_update_message( $message ) 
    {
        $screen = get_current_screen();
        if ('sp_advp_shortcodes' == $screen->post_type) {
            $message['post'][1]  = $title = esc_html__('Shortcode updated.', 'advanced-portfolio');
            $message['post'][4]  = $title = esc_html__('Shortcode updated.', 'advanced-portfolio');
            $message['post'][6]  = $title = esc_html__('Shortcode published.', 'advanced-portfolio');
            $message['post'][8]  = $title = esc_html__('Shortcode submitted.', 'advanced-portfolio');
            $message['post'][10] = $title = esc_html__('Shortcode draft updated.', 'advanced-portfolio');
        } elseif ('advanced_portfolio' == $screen->post_type) {
            $message['post'][1]  = $title = esc_html__('Portfolio updated.', 'advanced-portfolio');
            $message['post'][4]  = $title = esc_html__('Portfolio updated.', 'advanced-portfolio');
            $message['post'][6]  = $title = esc_html__('Portfolio published.', 'advanced-portfolio');
            $message['post'][8]  = $title = esc_html__('Portfolio submitted.', 'advanced-portfolio');
            $message['post'][10] = $title = esc_html__('Portfolio draft updated.', 'advanced-portfolio');
        }

        return $message;
    }

    /**
     * Review Text
     *
     * @return string
     */
    public function admin_footer( $text ) 
    {
        $screen = get_current_screen();
        if ('advanced_portfolio' == get_post_type() || $screen->taxonomy == 'portfolio_cat' || $screen->id == 'advanced_portfolio_page_advp_settings' || $screen->id == 'advanced_portfolio_page_advp_help' || $screen->post_type == 'sp_advp_shortcodes') {
            $url  = 'https://wordpress.org/support/plugin/advanced-portfolio/reviews/?filter=5#new-post';
            $text = sprintf(__('If you like <strong>Advanced Portfolio</strong> please leave us a <a href="%s" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> rating. Your Review is very important to us as it helps us to grow more. ', 'advanced-portfolio'), $url);
        }

        return $text;
    }

}

new SP_AdvP_Functions();