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

/*
Blogs thumbnails
- 180 x 160 (sliced)

Hero bg
- 100% x 250

Landing slider img
- 540 x 317

Works thumb
- 100% x 200 (full)

Techblog image (same as works image)
- 930 x 100% (full)

*/
    add_image_size('archive-techblog-thumbnail', 180, 160, false);
    add_image_size('section-hero-background', 0, 250, false);
    add_image_size('section-slider-image', 540, 317, false);
    add_image_size('archive-work-thumbnail', 0, 200, false);
    add_image_size('single-work-image', 600, 999, false);
    add_image_size('single-techblog-work-image', 930, 0, false);
    add_image_size('about-image-thumbnail', 340, 340, false);

    add_image_size('modules-two-columns-image', 992, 0, false);

    // add_image_size('module-image-photo', 180, 160, false);
    //
    //
    // add_image_size('module-image-photo', 476, 317.297, false);
    // add_image_size('module-hero-with-cta-photo', 0, 300.594, false);
    //
    // add_image_size('module-works-thumbnail', 400, 200, true);
    // add_image_size('module-techblog-thumbnail', 300, 200, true);
    // add_image_size('page-cases-logo', 500, 0, false);

  });

  add_action('admin_menu', function() {
    remove_menu_page('edit.php');
  });

  add_filter('pre_get_document_title', function( $title ) {
    return $title;
  }, 999, 1 );
?>
