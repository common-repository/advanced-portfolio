<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Handles displays portfolio custom post.
 *
 * @package Advanced-portfolio
 * 
 * @since 1.0
 */
class SP_AdvP_Portfolio {

    /**
     * The single instance of the class.
     *
     * @var null
     * 
     * @since 1.0
     */
    private static $_instance = null;

    /**
     * Allows for accessing single instance of class. Class should only be constructed once per call.
     *
     * @since 1.0
     * 
     * @static
     * @return SP_AdvP_Portfolio
     */
    public static function getInstance() 
    {
        if (! self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * Constructor.
     */
    public function __construct() 
    {
        add_action('init', array($this, 'register_post_type'));
    }

    /**
     * Registers the custom post type
     */
    public function register_post_type() 
    {
        if (post_type_exists("advanced_portfolio")) {
            return;
        }

        $args_post_type = array(
            'label'               => __('Advanced Portfolio', 'advanced-portfolio'),
            'description'         => __('Advanced Portfolio post type', 'advanced-portfolio'),
            'public'              => false,
            'exclude_from_search' => false,
            'publicly_queryable'  => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 20,
            'menu_icon'           => SP_AP_URL . 'admin/assets/images/icon.png',
            'capability_type'     => 'post',
            'hierarchical'        => false,
            'has_archive'         => false,
            'can_export'          => true,
            'rewrite'             => false,
            'query_var'           => false,
            'supports'            => array(
                'title',
                'thumbnail'
            ),
            'labels'              => array(
                'name'                  => __('All Portfolios', 'advanced-portfolio'),
                'singular_name'         => __('Portfolio', 'advanced-portfolio'),
                'menu_name'             => __('Adv. Portfolio', 'advanced-portfolio'),
                'add_new'               => __('Add New', 'advanced-portfolio'),
                'add_new_item'          => __('Add New Portfolio', 'advanced-portfolio'),
                'edit'                  => __('Edit', 'advanced-portfolio'),
                'edit_item'             => __('Edit Portfolio', 'advanced-portfolio'),
                'new_item'              => __('New Portfolio', 'advanced-portfolio'),
                'view'                  => __('View', 'advanced-portfolio'),
                'view_item'             => __('View Portfolio', 'advanced-portfolio'),
                'all_items'             => __('All Portfolios', 'advanced-portfolio'),
                'search_items'          => __('Search Portfolio', 'advanced-portfolio'),
                'not_found'             => __('No Portfolio Found', 'advanced-portfolio'),
                'not_found_in_trash'    => __('No Portfolio Found in Trash', 'advanced-portfolio'),
                'parent'                => __('Parent Portfolio', 'advanced-portfolio'),
                'featured_image'        => __('Portfolio Image', 'advanced-portfolio'),
                'set_featured_image'    => __('Set portfolio image', 'advanced-portfolio'),
                'remove_featured_image' => __('Remove portfolio image', 'advanced-portfolio'),
                'use_featured_image'    => __('Use as portfolio image', 'advanced-portfolio'),
            ),
        );

        $args_post_type = apply_filters('sp_advanced_portfolio_post_type', $args_post_type);

        register_post_type('advanced_portfolio', $args_post_type);
    }

}