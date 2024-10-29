<?php
/**
 * This file render the shortcode to the frontend
 * 
 * @package Advanced-portfolio
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Advanced Portfolio - Shortcode Render class
 * 
 * @since 1.0
 */
if (! class_exists('AdvP_Shortcode_Render')) {
    class AdvP_Shortcode_Render 
    {

        /**
         * AdvP_Shortcode_Render single instance of the class
         *
         * @since 1.0
         */
        protected static $_instance = null;


        /**
         * AdvP_Shortcode_Render Instance
         *
         * @since 1.0
         * 
         * @static
         * @return self Main instance
         */
        public static function instance() 
        {
            if (is_null(self::$_instance)) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        /**
         * AdvP_Shortcode_Render constructor.
         */
        public function __construct() 
        {
            add_shortcode('advanced_portfolio', array($this, 'shortcode_render'));
        }

        /**
         * @param $attributes
         *
         * @return string
         * @since 1.0
         */
        public function shortcode_render( $attributes ) 
        {
            extract(
                shortcode_atts( 
                    array(
                        'id' => '',
                    ), $attributes, 'advanced_portfolio'
                )
            );

            $post_id = $attributes['id'];

            $shortcode_data               = get_post_meta($post_id, 'sp_advp_shortcode_options', true);
            $number_of_total_portfolios    = (isset($shortcode_data['number_of_total_portfolios']) ? $shortcode_data['number_of_total_portfolios']: '');
            $number_of_portfolios    = (isset($shortcode_data['number_of_portfolios']) ? $shortcode_data['number_of_portfolios']: '');
            $number_of_portfolios_desktop    = (isset($shortcode_data['number_of_portfolios_desktop']) ? $shortcode_data['number_of_portfolios_desktop']: '');
            $number_of_portfolios_small_desktop    = (isset($shortcode_data['number_of_portfolios_small_desktop']) ? $shortcode_data['number_of_portfolios_small_desktop']: '');
            $number_of_portfolios_tablet    = (isset($shortcode_data['number_of_portfolios_tablet']) ? $shortcode_data['number_of_portfolios_tablet']: '');
            $number_of_portfolios_mobile    = (isset($shortcode_data['number_of_portfolios_mobile']) ? $shortcode_data['number_of_portfolios_mobile']: '');
            $portfolio_order_by    = (isset($shortcode_data['portfolio_order_by']) ? $shortcode_data['portfolio_order_by']: '');
            $portfolio_order    = (isset($shortcode_data['portfolio_order']) ? $shortcode_data['portfolio_order']: '');
            $portfolio_overlay    = (isset($shortcode_data['portfolio_overlay']) ? $shortcode_data['portfolio_overlay']: '');
            $portfolio_title    = (isset($shortcode_data['portfolio_title']) && $shortcode_data['portfolio_title'] == true ? 'true' : 'false');
            $portfolio_title_color    = (isset($shortcode_data['portfolio_title_color']) ? $shortcode_data['portfolio_title_color']: '');
            $portfolio_cat    = (isset($shortcode_data['portfolio_cat']) && $shortcode_data['portfolio_cat'] == true ? 'true' : 'false');
            $portfolio_cat_color    = (isset($shortcode_data['portfolio_cat_color']) ? $shortcode_data['portfolio_cat_color']: '');
            $filter_color    = (isset($shortcode_data['filter_color']) ? $shortcode_data['filter_color']: '');
            $filter_bg_color    = (isset($shortcode_data['filter_bg_color']) ? $shortcode_data['filter_bg_color']: '');
            $filter_active_color    = (isset($shortcode_data['filter_active_color']) ? $shortcode_data['filter_active_color']: '');
            $filter_active_bg_color    = (isset($shortcode_data['filter_active_bg_color']) ? $shortcode_data['filter_active_bg_color']: '');

            $button_color    = (isset($shortcode_data['button_color']) ? $shortcode_data['button_color']: '');
            $button_border_color    = (isset($shortcode_data['button_border_color']) ? $shortcode_data['button_border_color']: '');
            $button_bg    = (isset($shortcode_data['button_bg']) ? $shortcode_data['button_bg']: '');
            $button_hover_color    = (isset($shortcode_data['button_hover_color']) ? $shortcode_data['button_hover_color']: '');
            $button_hover_border_color    = (isset($shortcode_data['button_hover_border_color']) ? $shortcode_data['button_hover_border_color']: '');
            $button_hover_bg    = (isset($shortcode_data['button_hover_bg']) ? $shortcode_data['button_hover_bg']: '');

            $args = array(
                'post_type'      => 'advanced_portfolio',
                'orderby'        => $portfolio_order_by,
                'order'          => $portfolio_order,
                'posts_per_page' => $number_of_total_portfolios,
            );
        
            $que = new WP_Query($args);
        
            $outline = '';

            $outline .= '<style>';
            $outline .= '#sp-advanced-portfolio-' . $post_id . ' .sp-advp-image-overlay{
                background: '.$portfolio_overlay.';
            }
            #sp-advanced-portfolio-' . $post_id . ' .sp-advp-image-overlay .sp-advp-title{
                color: '.$portfolio_title_color.';
            }
            #sp-advanced-portfolio-' . $post_id . ' .sp-advp-image-overlay .sp-advp-category ul li a,
            #sp-advanced-portfolio-' . $post_id . ' .sp-advp-image-overlay .sp-advp-category ul{
                color: '.$portfolio_cat_color.';
            }
            #sp-advanced-portfolio-' . $post_id . ' .sp-advanced-portfolio-filter ul li a{
                background: '.$filter_bg_color.';
                color: '.$filter_color.';
            }
            #sp-advanced-portfolio-' . $post_id . ' .sp-advanced-portfolio-filter ul li a.active{
                background: '.$filter_active_bg_color.';
                color: '.$filter_active_color.';
            }
            #sp-advanced-portfolio-' . $post_id . ' .sp-advp-action-icons a{
                background: '.$button_bg.';
                color: '.$button_color.';
                border-color: '.$button_border_color.';
            }
            #sp-advanced-portfolio-' . $post_id . ' .sp-advp-action-icons a:hover, 
            #sp-advanced-portfolio-' . $post_id . ' .sp-advp-action-icons a:active, 
            #sp-advanced-portfolio-' . $post_id . ' .sp-advp-action-icons a:focus{
                background: '.$button_hover_bg.';
                color: '.$button_hover_color.';
                border-color: '.$button_hover_border_color.';
            }
            ';
            $outline .= '</style>';
        
            $outline .= '
            <script type="text/javascript">
            jQuery(function ($) {
        
                "use strict";
        
                // ----------------------------------------------
                //  Isotope Filter
                // ----------------------------------------------
                (function () {
                    var winDow = $(window);
                    var $container=$("#sp-advanced-portfolio-' . $post_id . ' .sp-advanced-portfolio-items");
                    var $filter=$("#sp-advanced-portfolio-' . $post_id . ' .sp-advanced-portfolio-filter");
        
                    try{
                        $container.imagesLoaded( function(){
                            $container.show();
                            $container.isotope({
                                filter: "*",
                                layoutMode: "masonry",
                                animationOptions:{
                                    duration: 750,
                                    easing: "linear"
                                }
                            });
                        });
                    } catch(err) {
                    }
        
                    winDow.bind("resize", function(){
                        var selector = $filter.find("a.active").attr("data-filter");
        
                        try {
                            $container.isotope({
                                filter	: selector,
                                animationOptions: {
                                    duration: 750,
                                    easing	: "linear",
                                    queue	: false,
                                }
                            });
                        } catch(err) {
                        }
                        return false;
                    });
        
                    $filter.find("a").click(function(){
                        var selector = $(this).attr("data-filter");
        
                        try {
                            $container.isotope({
                                filter	: selector,
                                animationOptions: {
                                    duration: 750,
                                    easing	: "linear",
                                    queue	: false,
                                }
                            });
                        } catch(err) {
        
                        }
                        return false;
                    });
        
                    var filterItemA	= $("#sp-advanced-portfolio-' . $post_id . ' .sp-advanced-portfolio-filter a");
        
                    filterItemA.on("click", function(){
                        var $this = $(this);
                        if ( !$this.hasClass("active")) {
                            filterItemA.removeClass("active");
                            $this.addClass("active");
                        }
                    });
                }());
            });
            
            </script>';
        
            $outline .= '<div id="sp-advanced-portfolio-wrapper-' . $post_id . '" class="sp-portfolio-wrapper">';
            $outline .= '<div id="sp-advanced-portfolio-' . $post_id . '" class="sp-portfolio-section">';
        
            if (! is_tax()) {
        
                $terms = get_terms(
                    array(
                    'taxonomy'   => 'portfolio_cat',
                    'hide_empty' => true,
                    )
                );
                $count = count($terms);
        
                if ($count > 0) {
                    $outline .= '<div class="sp-advanced-portfolio-filter"><ul>';
                    $outline .= '<li><a href="#" class="active"  data-filter="*">' . esc_html__('All', 'advanced-portfolio') . '</a></li>';
                    foreach ($terms as $term) {
                        $outline .= '<li><a href="#" data-filter=".portfolio_cat-' . $term->slug . '">' . $term->name . '</a></li>';
                    }
                    $outline .= '</ul></div>';
                }
            }
            
            if ($que->have_posts()) {
                $outline .= '<div class="sp-advanced-portfolio-items">';
                while ( $que->have_posts() ) : $que->the_post();
        
                    $portfolio_data  = get_post_meta(get_the_ID(), 'sp_advp_meta_options', true);
                    $advp_portfolio_url = (isset($portfolio_data['advp_portfolio_url']) ? $portfolio_data['advp_portfolio_url']: '');
                    
                    $outline .= '<div class="sp-single-adv-portfolio ';
                    $outline .= '' . join(' ', get_post_class('advp-col-xl-'.$number_of_portfolios.' advp-col-lg-'.$number_of_portfolios_desktop.' advp-col-md-'.$number_of_portfolios_small_desktop.' advp-col-sm-'.$number_of_portfolios_tablet.' advp-col-xs-'.$number_of_portfolios_mobile.''));
                    $outline .= '">';
                    if (has_post_thumbnail($que->post->ID)) {
                        $outline .= '<div class="sp-advp-image">';
                        $outline .= get_the_post_thumbnail($que->post->ID, 'adv-portfolio-image');
                        $outline .= '<div class="sp-advp-image-overlay">
                            <div class="sp-advp-action-icons">
                                <a class="sp-advp-action-preview" href="'. get_the_post_thumbnail_url($que->post->ID) .'"><i class="fa fa-search" aria-hidden="true"></i></a>';
                        if ($advp_portfolio_url !== '') {
                            $outline .= '<a href="'.esc_url($advp_portfolio_url).'" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a>';
                        }
                        
                        $outline .= '</div>';

                        if ($portfolio_title == 'true') {
                            $outline .= '<h3 class="sp-advp-title">'.get_the_title().'</h3>';
                        }
                        if ($portfolio_cat == 'true') {
                            $outline .= '<div class="sp-advp-category"><ul><li>';
                                $outline .= get_the_term_list(get_the_ID(), 'portfolio_cat', '', ', ');
                            $outline .= '</li></ul></div>';
                        }
                            $outline .= '</div>';
                        $outline .= '</div>';
                    }
        
                    $outline .= '</div>';
        
                endwhile;
                $outline .= '</div>';
            } else {
                $outline .= '<h3 class="sp-no-portfolio-found">' . esc_html__('No portfolio found', 'advanced-portfolio') . '</h3>';
            }
            $outline .= '</div>';//.sp-portfolio-section
            $outline .= '</div>';//.sp-portfolio-wrapper
        
            wp_reset_query();        

            return $outline;

        }

    }

    new AdvP_Shortcode_Render();
}