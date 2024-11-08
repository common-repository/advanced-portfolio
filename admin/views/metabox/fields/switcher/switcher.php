<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 * Field: Switcher
 *
 * @since 1.0
 */
class SP_AdvP_Framework_Option_switcher extends SP_AdvP_Framework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

    echo $this->element_before();
    $label = ( isset( $this->field['label'] ) ) ? '<div class="sp-text-desc">'. $this->field['label'] . '</div>' : '';
    echo '<label><input type="checkbox" name="'. $this->element_name() .'" value="1"'. $this->element_class() . $this->element_attributes() . checked($this->element_value(), 1, false) .'/><em data-on="'. __('on', 'advanced-portfolio') .'" data-off="'. __('off', 'advanced-portfolio') .'"></em><span></span></label>' . $label;
    echo $this->element_after();

  }

}