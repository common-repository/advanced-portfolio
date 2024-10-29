<?php if (! defined('ABSPATH')) { die; } // Cannot access pages directly.

/**
 * Numeric validate
 *
 * @since 1.0
 *
 */
if (! function_exists('sp_advp_validate_numeric')) {
  function sp_advp_validate_numeric( $value, $field ) {

    if ( ! is_numeric( $value ) ) {
      return __('Please write a numeric data!', 'advanced-portfolio');
    }

  }
  add_filter('sp_advp_validate_numeric', 'sp_advp_validate_numeric', 10, 2);
}

/**
 * Required validate
 *
 * @since 1.0
 *
 */
if(! function_exists('sp_advp_validate_required')) {
  function sp_advp_validate_required( $value ) {
    if (empty($value)) {
      return __('Fatal Error! This field is required!', 'advanced-portfolio');
    }
  }
  add_filter('sp_advp_validate_required', 'sp_advp_validate_required');
}