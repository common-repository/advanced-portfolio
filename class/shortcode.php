<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class SP_AdvP_Shortcode {

    private static $_instance;

    /**
     * SP_AdvP_Shortcode constructor.
     */
    public function __construct() 
    {
        add_filter('init', array($this, 'register_post_type'));
    }

    /**
     * Allows for accessing single instance of class. Class should only be constructed once per call.
     * 
     * @return SP_AdvP_Shortcode
     */
    public static function getInstance() 
    {
        if (! self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * Resgister Post Type for Shortcode
     */
    function register_post_type() 
    {
        register_post_type(
            'sp_advp_shortcodes', 
            array(
                'label'           => __('Generate Shortcode', 'advanced-portfolio'),
                'description'     => __('Generate Shortcode for Portfolio', 'advanced-portfolio'),
                'public'          => false,
                'has_archive'       => false,
                'publicaly_queryable'   => false,
                'show_ui'         => true,
                'show_in_menu'    => 'edit.php?post_type=advanced_portfolio',
                'hierarchical'    => false,
                'query_var'       => false,
                'supports'        => array( 'title' ),
                'capability_type' => 'post',
                'labels'          => array(
                    'name'               => __('Portfolio Shortcodes', 'advanced-portfolio'),
                    'singular_name'      => __('Portfolio Shortcode', 'advanced-portfolio'),
                    'menu_name'          => __('Shortcode Generator', 'advanced-portfolio'),
                    'add_new'            => __('Add New', 'advanced-portfolio'),
                    'add_new_item'       => __('Add New Shortcode', 'advanced-portfolio'),
                    'edit'               => __('Edit', 'advanced-portfolio'),
                    'edit_item'          => __('Edit Shortcode', 'advanced-portfolio'),
                    'new_item'           => __('New Shortcode', 'advanced-portfolio'),
                    'view'               => __('View Shortcode', 'advanced-portfolio'),
                    'view_item'          => __('View Shortcode', 'advanced-portfolio'),
                    'search_items'       => __('Search Shortcode', 'advanced-portfolio'),
                    'not_found'          => __('No Portfolio Shortcode Found', 'advanced-portfolio'),
                    'not_found_in_trash' => __('No Portfolio Shortcode Found in Trash', 'advanced-portfolio'),
                    'parent'             => __('Parent Portfolio Shortcode', 'advanced-portfolio'),
                )
            )
        );
    }
}