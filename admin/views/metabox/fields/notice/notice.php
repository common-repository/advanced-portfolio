<?php if (! defined('ABSPATH')) { die; } // Cannot access pages directly.
/**
 * Field: Notice
 *
 * @since 1.0
 *
 */
class SP_AdvP_Framework_Option_notice extends SP_AdvP_Framework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct($field, $value, $unique);
  }

  public function output() {

    echo $this->element_before();
    echo '<div class="sp-notice sp-'. $this->field['class'] .'">'. $this->field['content'] .'</div>';
    echo $this->element_after();

  }

}