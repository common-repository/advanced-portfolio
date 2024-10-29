<?php 
if (! defined('ABSPATH')) { die; } // Cannot access pages directly.
/**
 *
 * ------------------------------------------------------------------------------------------------
 * Text Domains: sp-framework
 * ------------------------------------------------------------------------------------------------
 *
 */

// ------------------------------------------------------------------------------------------------
require_once plugin_dir_path(__FILE__) .'/sp-framework-path.php';
// ------------------------------------------------------------------------------------------------

if (! function_exists('sp_advp_framework_init') && ! class_exists('SP_AdvP_Framework')) {
  function sp_advp_framework_init() {

    //active modules
    defined('SP_AdvP_F_ACTIVE_METABOX') or define('SP_AdvP_F_ACTIVE_METABOX', true);
    defined('SP_AdvP_F_ACTIVE_FRAMEWORK') or define('SP_AdvP_F_ACTIVE_FRAMEWORK', true);

    //helpers
    sp_advp_locate_template('functions/fallback.php');
    sp_advp_locate_template('functions/helpers.php');
    sp_advp_locate_template('functions/actions.php');
    sp_advp_locate_template('functions/enqueue.php');
    sp_advp_locate_template('functions/sanitize.php');
    sp_advp_locate_template('functions/validate.php');

    //classes
    sp_advp_locate_template('classes/abstract.class.php');
    sp_advp_locate_template('classes/options.class.php');
    sp_advp_locate_template('classes/metabox.class.php');
    sp_advp_locate_template('classes/framework.class.php');

    //configs
    sp_advp_locate_template('config/metabox.config.php');
    sp_advp_locate_template('config/framework.config.php');
  }
  add_action('init', 'sp_advp_framework_init', 10);
}