<?php
  require_once('wp_bootstrap_navwalker.php');

  /* vustom header page title function */
  remove_action('wp_head', '_wp_render_title_tag', 1);
  add_action( 'wp_head', function() {

    echo did_action( 'wp_head' ) || doing_action( 'wp_head' ) ? '<title>' . wp_get_document_title() . '</title>' . "\n": '<title></title>';
    // if ( did_action( 'wp_head' ) || doing_action( 'wp_head' ) ) {
    //     echo '<title>' . wp_get_document_title() . '</title>' . "\n";
    // } else echo '<title></title>';
  }, 1);

  add_action('after_setup_theme', function() {
    register_nav_menu('primaryHeaderMenu', 'Primary Header Menu');
    register_nav_menu('primaryFooterMenu', 'Primary Footer Menu');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    add_image_size('module-image-photo', 476, 317.297, false);
    add_image_size('module-hero-with-cta-photo', 0, 300.594, false);

    add_image_size('module-works-thumbnail', 400, 200, true);
    add_image_size('module-techblog-thumbnail', 300, 200, true);
    add_image_size('page-cases-logo', 500, 0, false);

  });

  add_action('admin_menu', function() {
    remove_menu_page('edit.php');
  });

  add_filter('pre_get_document_title', function( $title ) {
    return $title;
  }, 999, 1 );
?>
