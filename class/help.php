<?php
/**
 * This is to plugin help page.
 * 
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class SP_AdvP_Help {

    /**
     * @var SP_AdvP_Help instance of the class
     *
     * @since 1.0
     */
    private static $_instance;

    /**
     * @return SP_AdvP_Help
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
     * SP_AdvP_Help constructor.
     *
     * @since 1.0
     */
    public function __construct() 
    {
        add_action('admin_menu', array( $this, 'help_page'), 100);
    }

    /**
     * Add SubMenu Page
     */
    function help_page() 
    {
        add_submenu_page('edit.php?post_type=advanced_portfolio', __('Advanced Portfolio Help', 'advanced-portfolio'), __('Help', 'advanced-portfolio'), 'manage_options', 'advp_help', array($this, 'help_page_callback'));
    }

    /**
     * Help Page Callback
     */
    public function help_page_callback() 
    {
        ?>
        <div class="wrap about-wrap sp-advp-help">
            <h1><?php _e('Welcome to Advanced Portfolio!', 'advanced-portfolio'); ?></h1>
            <p class="about-text"><?php _e('Thank you for installing Advanced Portfolio! You\'re now running the most popular Portfolio plugin.', 'advanced-portfolio');
                ?></p>
            <!-- <div class="wp-badge"></div> -->

            <hr>

            <!-- <div class="headline-feature feature-video">
                <iframe width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
            </div>

            <hr> -->

            <div class="feature-section three-col">
                <div class="col">
                    <div class="sp-advp-feature sp-advp-text-center">
                        <i class="sp-font fa fa-life-ring"></i>
                        <h3>Need any Assistance?</h3>
                        <p>Our Expert Support Team is always ready to help you out promptly.</p>
                        <a href="" target="_blank" class="button button-primary">Contact Support</a>
                    </div>
                </div>
                <div class="col">
                    <div class="sp-advp-feature sp-advp-text-center">
                        <i class="sp-font fa fa-file-text" aria-hidden="true"></i>
                        <h3>Looking for Documentation?</h3>
                        <p>We have detailed documentation on every aspect of Advanced Portfolio.</p>
                        <a href="" target="_blank" class="button button-primary">Documentation</a>
                    </div>
                </div>
                <div class="col">
                    <div class="sp-advp-feature sp-advp-text-center">
                        <i class="sp-font fa fa-thumbs-up" aria-hidden="true"></i>
                        <h3>Like This Plugin?</h3>
                        <p>If you like Advanced Portfolio, please leave us a 5 star rating.</p>
                        <a href="" target="_blank"
                           class="button button-primary">Rate the Plugin</a>
                    </div>
                </div>
            </div>

        </div>
        <?php
    }

}