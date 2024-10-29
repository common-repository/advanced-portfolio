<?php if (! defined('ABSPATH')) {
    die;
}
// Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options = array();

// -----------------------------------------
// Shortcode Generator Options
// -----------------------------------------
$options[] = array(
    'id'        => 'sp_advp_shortcode_options',
    'title'     => __('Shortcode Options', 'advanced-portfolio'),
    'post_type' => 'sp_advp_shortcodes',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

        // begin: a section
        array(
            'name'   => 'sp_advp_shortcode_option_1',
            'title'  => __('General Settings', 'advanced-portfolio'),
            'icon'   => 'fa fa-wrench',

            // begin: fields
            'fields' => array(

                // begin: a field
                array(
                    'id'      => 'number_of_total_portfolios',
                    'type'    => 'number',
                    'title'   => __('Total Portfolios', 'advanced-portfolio'),
                    'desc'    => __('Number of total portfolios to display.', 'advanced-portfolio'),
                    'default' => '50',
                ),
                array(
                    'id'         => 'number_of_portfolios',
                    'type'       => 'number',
                    'title'      => __('Portfolio Column(s)', 'advanced-portfolio'),
                    'desc'       => __('Set number of column(s) for the screen larger than 1280px.', 'advanced-portfolio'),
                    'default'    => '3',
        
                ),
                array(
                    'id'         => 'number_of_portfolios_desktop',
                    'type'       => 'number',
                    'title'      => __('Portfolio Column(s) on Desktop', 'advanced-portfolio'),
                    'desc'       => __('Set number of column on desktop for the screen smaller than 1280px.', 'advanced-portfolio'),
                    'default'    => '3',
            
                ),
                array(
                    'id'         => 'number_of_portfolios_small_desktop',
                    'type'       => 'number',
                    'title'      => __('Portfolio Column(s) on Small Desktop', 'advanced-portfolio'),
                    'desc'       => __('Set number of column on small desktop for the screen smaller than 980px.', 'advanced-portfolio'),
                    'default'    => '2',
             
                ),
                array(
                    'id'         => 'number_of_portfolios_tablet',
                    'type'       => 'number',
                    'title'      => __('Portfolio Column(s) on Tablet', 'advanced-portfolio'),
                    'desc'       => __('Set number of column on tablet for the screen smaller than 736px.', 'advanced-portfolio'),
                    'default'    => '2',
           
                ),
                array(
                    'id'         => 'number_of_portfolios_mobile',
                    'type'       => 'number',
                    'title'      => __('Portfolio Column(s) on Mobile', 'advanced-portfolio'),
                    'desc'       => __('Set number of column on mobile for the screen smaller than 480px.', 'advanced-portfolio'),
                    'default'    => '1',
             
                ),
                array(
                    'id'      => 'portfolio_order_by',
                    'type'    => 'select',
                    'title'   => __('Order by', 'advanced-portfolio'),
                    'desc'    => __('Select an order by option.', 'advanced-portfolio'),
                    'options' => array(
                        'ID'         => __('ID', 'advanced-portfolio'),
                        'date'       => __('Date', 'advanced-portfolio'),
                        'rand'       => __('Random', 'advanced-portfolio'),
                        'title'      => __('Title', 'advanced-portfolio'),
                        'modified'   => __('Modified', 'advanced-portfolio'),
                    ),
                    'default' => 'date',
                    'class'   => 'chosen',
                ),
                array(
                    'id'      => 'portfolio_order',
                    'type'    => 'select',
                    'title'   => __('Order', 'advanced-portfolio'),
                    'desc'    => __('Select an order option.', 'advanced-portfolio'),
                    'options' => array(
                        'ASC'  => __('Ascending', 'advanced-portfolio'),
                        'DESC' => __('Descending', 'advanced-portfolio'),
                    ),
                    'default' => 'DESC',
                    'class'   => 'chosen',
                ),


            ), // end: fields
        ), // end: General section

        // begin: Stylization section
        array(
            'name'   => 'sp_advp_shortcode_option_2',
            'title'  => __('Stylization', 'advanced-portfolio'),
            'icon'   => 'fa fa-paint-brush',
            'fields' => array(

                array(
                    'id'         => 'portfolio_overlay',
                    'type'       => 'color_picker',
                    'title'      => __('Portfolio Overlay', 'advanced-portfolio'),
                    'desc'       => __('Set portfolio overlay color.', 'advanced-portfolio'),
                    'default'    => 'rgba(206, 78, 160, 0.85)',
                ),
                array(
                    'id'      => 'portfolio_title',
                    'type'    => 'switcher',
                    'title'   => __('Portfolio Title', 'advanced-portfolio'),
                    'desc'    => __('Show/Hide portfolio title.', 'advanced-portfolio'),
                    'default' => true,
                ),
                array(
                    'id'         => 'portfolio_title_color',
                    'type'       => 'color_picker',
                    'title'      => __('Portfolio Title Color', 'advanced-portfolio'),
                    'desc'       => __('Set portfolio title color.', 'advanced-portfolio'),
                    'default'    => '#ffffff',
                ),
                array(
                    'id'      => 'portfolio_cat',
                    'type'    => 'switcher',
                    'title'   => __('Category', 'advanced-portfolio'),
                    'desc'    => __('Show/Hide portfolio category.', 'advanced-portfolio'),
                    'default' => true,
                ),
                array(
                    'id'         => 'portfolio_cat_color',
                    'type'       => 'color_picker',
                    'title'      => __('Category Color', 'advanced-portfolio'),
                    'desc'       => __('Set portfolio category color.', 'advanced-portfolio'),
                    'default'    => '#ffffff',
                ),
                

                array(
                    'type'       => 'subheading',
                    'content'    => __('Filter Settings', 'advanced-portfolio'),
                ),
                array(
                    'id'         => 'filter_color',
                    'type'       => 'color_picker',
                    'title'      => __('Filter Color', 'advanced-portfolio'),
                    'desc'       => __('Set color for filter.', 'advanced-portfolio'),
                    'default'    => '#ffffff',
                ),
                array(
                    'id'         => 'filter_bg_color',
                    'type'       => 'color_picker',
                    'title'      => __('Filter Background Color', 'advanced-portfolio'),
                    'desc'       => __('Set background color for filter.', 'advanced-portfolio'),
                    'default'    => '#555555',
                ),
                array(
                    'id'         => 'filter_active_color',
                    'type'       => 'color_picker',
                    'title'      => __('Filter Active Color', 'advanced-portfolio'),
                    'desc'       => __('Set active color for filter.', 'advanced-portfolio'),
                    'default'    => '#ffffff',
                ),
                array(
                    'id'         => 'filter_active_bg_color',
                    'type'       => 'color_picker',
                    'title'      => __('Filter Active Background Color', 'advanced-portfolio'),
                    'desc'       => __('Set active background color for filter.', 'advanced-portfolio'),
                    'default'    => '#ce4ea0',
                ),
                array(
                    'type'       => 'subheading',
                    'content'    => __('Action Button Settings', 'advanced-portfolio'),
                ),
                array(
                    'id'         => 'button_color',
                    'type'       => 'color_picker',
                    'title'      => __('Button Color', 'advanced-portfolio'),
                    'desc'       => __('Set color for action button.', 'advanced-portfolio'),
                    'default'    => '#ffffff',
                ),
                array(
                    'id'         => 'button_border_color',
                    'type'       => 'color_picker',
                    'title'      => __('Button Border Color', 'advanced-portfolio'),
                    'desc'       => __('Set border color for action button.', 'advanced-portfolio'),
                    'default'    => '#ffffff',
                ),
                array(
                    'id'         => 'button_bg',
                    'type'       => 'color_picker',
                    'title'      => __('Button Background', 'advanced-portfolio'),
                    'desc'       => __('Set background color for action button.', 'advanced-portfolio'),
                    'default'    => 'transparent',
                ),
                array(
                    'id'         => 'button_hover_color',
                    'type'       => 'color_picker',
                    'title'      => __('Button Hover Color', 'advanced-portfolio'),
                    'desc'       => __('Set hover color for action button.', 'advanced-portfolio'),
                    'default'    => '#ce4ea0',
                ),
                array(
                    'id'         => 'button_hover_border_color',
                    'type'       => 'color_picker',
                    'title'      => __('Button Hover Border Color', 'advanced-portfolio'),
                    'desc'       => __('Set hover border color for action button.', 'advanced-portfolio'),
                    'default'    => '#ffffff',
                ),
                array(
                    'id'         => 'button_hover_bg',
                    'type'       => 'color_picker',
                    'title'      => __('Button Hover Background', 'advanced-portfolio'),
                    'desc'       => __('Set hover background color for action button.', 'advanced-portfolio'),
                    'default'    => '#ffffff',
                ),


            ), // End Fields
        ),
        // end: a section

    ),
);


// -----------------------------------------
// Portfolio Meta Options
// -----------------------------------------
$options[] = array(
    'id'        => 'sp_advp_meta_options',
    'title'     => __('Portfolio Details', 'advanced-portfolio'),
    'post_type' => 'advanced_portfolio',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

        // begin: a section
        array(
            'name'   => 'sp_advp_meta_option_1',
            'title'  => __('Portfolio Details', 'advanced-portfolio'),

            // begin: fields
            'fields' => array(

                // begin: a field
                array(
                    'id'    => 'advp_portfolio_url',
                    'type'  => 'text',
                    'title' => __('Portfolio URL', 'advanced-portfolio'),
                    'desc'  => __('Type your portfolio url.', 'advanced-portfolio'),
                ),

            ), // end: fields
        ), // end: a section

    ),
);


SP_AdvP_Framework_Metabox::instance($options);