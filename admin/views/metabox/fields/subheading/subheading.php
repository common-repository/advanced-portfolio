<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 * Field: Sub Heading
 *
 * @since 1.0
 *
 */
class SP_AdvP_Framework_Option_subheading extends SP_AdvP_Framework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

    echo $this->element_before();
    echo $this->field['content'];
    echo $this->element_after();

  }

}