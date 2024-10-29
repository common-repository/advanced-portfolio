<?php

if (! defined('ABSPATH')) { 
    exit; 
}  // if direct access

/**
 * Scripts and styles
 */
class SP_AP_Front_Scripts{

    /**
     * @var null
     * @since 1.0
     */
    protected static $_instance = null;

    /**
     * @return SP_AP_Front_Scripts
     * @since 1.0
     */
    public static function instance() 
    {
        if (is_null(self::$_instance) ) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * Initialize the class
     */
    public function __construct() 
    {
        add_action('wp_enqueue_scripts', array($this, 'front_scripts'));
    }

    /**
     * Google Fonts
     */
    public function advp_google_fonts_url() 
    {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';
    
        /*
        * Translators: If there are characters in your language that are not supported
        * by Roboto, translate this to 'off'. Do not translate into your own language.
        */
        if ('off' !== _x('on', 'Roboto font: on or off', 'advanced-portfolio') ) {
            $fonts[] = 'Roboto:400,500';
        }
    
        if ($fonts ) {
            $fonts_url = add_query_arg(
                array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
                ), 
                'https://fonts.googleapis.com/css' 
            );
        }
    
        return esc_url_raw($fonts_url);
    }

    /**
     * Plugin Scripts and Styles
     */
    function front_scripts() 
    {
        // CSS Files
        if (sp_get_option('advp_fontawesome_css') == 'true') {
            wp_enqueue_style('advp-font-awesome', SP_AP_URL . 'public/assets/css/font-awesome.min.css', array(), SP_AP_VERSION);
        }
        if (sp_get_option('advp_magnific_popup') == 'true') {
            wp_enqueue_style('advp-magnific-popup', SP_AP_URL . 'public/assets/css/magnific-popup.css', array(), SP_AP_VERSION);
        }
        wp_enqueue_style('advp-style', SP_AP_URL . 'public/assets/css/style.css', array(), SP_AP_VERSION);
        wp_enqueue_style('advp-responsive', SP_AP_URL . 'public/assets/css/responsive.css', array(), SP_AP_VERSION);

        wp_enqueue_style('advp-custom', SP_AP_URL . 'public/assets/css/custom.css', array(), SP_AP_VERSION);

        include SP_AP_PATH . '/includes/custom-css.php';
        wp_add_inline_style('advp-custom', $custom_css);

        //Fonts
        wp_enqueue_style('advp-google-fonts', $this->advp_google_fonts_url(), array(), SP_AP_VERSION);

        //JS Files
        wp_enqueue_script('advp-isotope-js', SP_AP_URL . 'public/assets/js/isotope.min.js', array( 'jquery' ), SP_AP_VERSION, true);
        if (sp_get_option('advp_magnific_popup') == 'true') {
            wp_enqueue_script('advp-magnific-popup-js', SP_AP_URL . 'public/assets/js/magnific-popup.min.js', array( 'jquery' ), SP_AP_VERSION, true);
        }
        wp_enqueue_script('advp-scripts', SP_AP_URL . 'public/assets/js/scripts.js', array('jquery' ), SP_AP_VERSION, true);
        

    }

}

new SP_AP_Front_Scripts();