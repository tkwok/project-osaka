<?php
  /* remove custom css in WordPress Theme Editor */
  add_action('customize_register', function($wp_customize) {
    $wp_customize->remove_section('custom_css');
  }, 15);
?>
