<?php

if (! defined('ABSPATH')) {
    exit;
}  // if direct access

/**
 * Scripts and styles
 */
class SP_AP_Admin_Scripts {

    /**
     * @var null
     * @since 1.0
     */
    protected static $_instance = null;

    /**
     * @return SP_AP_Admin_Scripts
     * @since 1.0
     */
    public static function instance() 
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * Initialize the class
     */
    public function __construct() 
    {

        add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));
    }

    /**
     * Enqueue admin scripts and styles
     */
    public function admin_scripts() 
    {
        wp_enqueue_style('sp-ap-admin', SP_AP_URL . 'admin/assets/css/admin.css', array(), SP_AP_VERSION);
    }

}

new SP_AP_Admin_Scripts();