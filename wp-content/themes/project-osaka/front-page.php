<?php get_header();

  $modules = get_field('modules');
  if (!empty($modules)) {
    foreach ($modules as $module) {
      $file = get_template_directory() . '/modules/' . str_replace('_', '-', $module['acf_fc_layout']) . '.php';
      if (is_file($file)) require($file);
    }
  }

get_footer(); ?>
