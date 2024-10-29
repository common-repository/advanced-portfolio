<?php if (! defined('ABSPATH')) {
    die;
} // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings = array(
    'menu_title'      => __('Settings', 'advanced-portfolio'),
    'menu_parent'     => 'edit.php?post_type=advanced_portfolio',
    'menu_type'       => 'submenu', // menu, submenu, options, theme, etc.
    'menu_slug'       => 'advp_settings',
    'ajax_save'       => true,
    'show_reset_all'  => false,
    'framework_title' => __('Advanced Portfolio', 'advanced-portfolio'),
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options = array();

// ----------------------------------------
// a option section for options overview  -
// ----------------------------------------
$options[] = array(
    'name'   => 'advanced_settings',
    'title'  => __('Advanced Settings', 'advanced-portfolio'),
    'icon'   => 'fa fa-cogs',

    // begin: fields
    'fields' => array(

        array(
            'id'         => 'advp_fontawesome_css',
            'type'       => 'switcher',
            'title'      => __('FontAwesome', 'advanced-portfolio'),
            'desc'       => __('Enqueue/Dequeue FontAwesome for front-end.', 'advanced-portfolio'),
            'default'    => true,
        ),
        array(
            'id'         => 'advp_magnific_popup',
            'type'       => 'switcher',
            'title'      => __('Magnific Popup', 'advanced-portfolio'),
            'desc'       => __('Enqueue/Dequeue Magnific Popup for front-end.', 'advanced-portfolio'),
            'default'    => true,
        ),

    ), // end: fields
);

// ------------------------------
// Custom CSS                   -
// ------------------------------
$options[] = array(
    'name'   => 'custom_css_section',
    'title'  => __('Custom CSS', 'advanced-portfolio'),
    'icon'   => 'fa fa-css3',
    'fields' => array(

        array(
            'id'    => 'advp_custom_css',
            'type'  => 'textarea',
            'title' => __('Custom CSS', 'advanced-portfolio'),
            'desc'  => __('Type your css.', 'advanced-portfolio'),
        ),

    )
);

SP_AdvP_Framework::instance($settings, $options);