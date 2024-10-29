<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class SP_AdvP_Taxonomy {

    /**
     * Instance
     * 
     * @since 1.0
     */
    private static $_instance;

    /**
     * GetInstance
     * 
     * @return SP_AdvP_Taxonomy
     * 
     * @since 1.0
     */
    public static function getInstance() 
    {
        if (! self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * SP_AdvP_Taxonomy constructor.
     * 
     * @since 1.0
     */
    public function __construct() 
    {
        add_filter('init', array($this, 'register_taxonomy'));
    }

    /**
     * Register taxonomy
     * 
     * @return portfolio_cat
     * 
     * @since 1.0
     */
    function register_taxonomy() 
    {

        $labels = array(
            'name'              => esc_html__('Categories', 'advanced-portfolio'),
            'singular_name'     => esc_html__('Category', 'advanced-portfolio'),
            'search_items'      => esc_html__('Search Category', 'advanced-portfolio'),
            'all_items'         => esc_html__('All Categories', 'advanced-portfolio'),
            'parent_item'       => esc_html__('Parent Category', 'advanced-portfolio'),
            'parent_item_colon' => esc_html__('Parent Category:', 'advanced-portfolio'),
            'edit_item'         => esc_html__('Edit Category', 'advanced-portfolio'),
            'update_item'       => esc_html__('Update Category', 'advanced-portfolio'),
            'add_new_item'      => esc_html__('Add New Category', 'advanced-portfolio'),
            'new_item_name'     => esc_html__('New Category Name', 'advanced-portfolio'),
            'menu_name'         => esc_html__('Categories', 'advanced-portfolio')
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => false
        );

        register_taxonomy('portfolio_cat', array('advanced_portfolio'), $args);
    }

}