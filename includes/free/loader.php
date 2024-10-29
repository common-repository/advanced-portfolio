<?php
/**
 * The Free Loader Class
 * 
 * @package Advanced-portfolio
 * 
 * @since 1.0
 */
class SP_AP_Free_Loader {

    function __construct() 
    {
        require_once(SP_AP_PATH . "admin/views/scripts.php");
        require_once(SP_AP_PATH . "admin/views/mce-button.php");
        require_once(SP_AP_PATH . "public/views/shortcoderender.php");
        require_once(SP_AP_PATH . "public/views/scripts.php");
    }

}

new SP_AP_Free_Loader();