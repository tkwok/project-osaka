<?php $social_links_array = get_field('social_links', 'option'); ?>

<footer class="page-footer font-small blue pt-4 pb-4">
  <div class="container text-center text-md-left">
    <div class="row">
      <div class="col-md-6 mt-md-0 mt-3">
        <p>© 2019 <?php bloginfo('name'); ?></p>
        <p><small>made with &hearts; in burlingame</small></p>
        <h6 class="text-uppercase">follow me</h5>
        <?php
          if (is_array($social_links_array)) {
            foreach($social_links_array as $social_link) { ?>
              <a class="footer-social-icon"
                href="<?php echo $social_link['url'];?>">
                <i class="<?php echo $social_link['icon_class']; ?>"></i>
              </a>
        <?php }
          } ?>
      </div>
        <div class="col-md-3 mb-md-0 mb-3"></div>
        <div class="col-md-3 mb-md-0 mb-3">
          <h6 class="text-uppercase"><?php bloginfo('name'); ?></h6>
          <ul class="list-unstyled">
            <?php
              wp_nav_menu(array(
                'theme_location' => 'primaryFooterMenu'
              ));
            ?>
          </ul>
        </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
