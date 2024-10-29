<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Advanced Portfolio - route class
 * 
 * @since 1.0
 */
class SP_AP_Router {

    /**
     * @var SP_AP_Router single instance of the class
     *
     * @since 1.0
     */
    protected static $_instance = null;


    /**
     * @since 1.0
     * 
     * @static
     * 
     * @return SP_AP_Router
     */
    public static function instance() 
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * Include the required files
     *
     * @since 1.0
     * 
     * @return void
     */
    function includes() 
    {
        include_once SP_AP_PATH . 'includes/free/loader.php';
    }

    /**
     * Function
     *
     * @since 1.0
     * 
     * @return void
     */
    function sp_advp_function() 
    {
        include_once SP_AP_PATH . 'includes/functions.php';
    }

    /**
     * MeatBox
     *
     * @since 1.0
     * 
     * @return void
     */
    function sp_advp_metabox() {
        include_once SP_AP_PATH . '/admin/views/metabox/sp-framework.php';
    }

}