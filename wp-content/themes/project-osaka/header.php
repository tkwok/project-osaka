<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset')?>" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo site_url(); ?>">
          <?php bloginfo('name'); ?></a>
        <button class="navbar-toggler" type="button"
          data-toggle="collapse"
          aria-controls="navbar"
          data-target="#navbarCollapse"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="mr-auto"></ul>
          <?php
          wp_nav_menu( array(
              'theme_location'    => 'primaryHeaderMenu',
              'depth'             => 2,
              'container'         => 'false',
              'menu_class'        => 'nav navbar-nav',
              'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
              'walker'            => new wp_bootstrap_navwalker()));
          ?>
        </div>
      </nav>
    </header>
