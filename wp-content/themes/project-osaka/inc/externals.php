<?php
  add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.2.1.slim.min.js', NULL, '3', true);
    wp_enqueue_script('popper-script', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', NULL, '3', true);
    wp_enqueue_script('bootstrap-script', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', NULL, '3', true);
    wp_enqueue_script('scroll-script', '//unpkg.com/aos@2.3.1/dist/aos.js', NULL, '3', true);
    wp_enqueue_script('primary-javascript',
      get_theme_file_uri('/js/scripts.js'), array('jquery'), microtime(), true);

    wp_localize_script('primary-javascript', 'primaryData', array(
        'root_url' => get_site_url()
      ));

    wp_enqueue_style('bootstrap-css',
      '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.6.3/css/all.css');
    wp_enqueue_style('aos-css', '//unpkg.com/aos@next/dist/aos.css');
    wp_enqueue_style('primary-styles', get_stylesheet_uri(), NULL, microtime());
  });
?>
