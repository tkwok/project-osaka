<?php get_header();
  page_hero(array(
    'title' => get_field('page_title', 'cpt_work'),
    'subtitle' => get_field('page_description', 'cpt_work'),
    'hero_background_image' => get_field('page_hero_image', 'cpt_work')['url']
  ));
?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-lg-12 text-center">
        <h2>latest works</h2>
        <p>all projects</p>
      </div>
    </div>
    <div class="row">
      <?php while(have_posts()) {
        the_post(); ?>
        <div class="col-xs-12 col-lg-4">
          <div style="border: 1px solid #000; border-radius: 4.8px; margin-bottom: 2em;">
            <?php echo the_post_thumbnail('archive-work-thumbnail'); ?>
            <!-- <h6 style="position: absolute;top: 8px;left: 30px; color: #fff;">project</h6> -->
            <div style="margin: 1em;">
              <h3><?php the_field('title'); ?></h3>
              <h6><?php the_author(); ?></h6>
              <p><?php the_field('subtitle'); ?></p>
              <a href="<?php the_permalink(); ?>" class="text-md-right text-sm-center">
                <h6>read more <i class="fas fa-angle-right"></i></h6>
              </a>
            </div>
          </div>
        </div>
  <?php } ?>
    </div>
  </div>

<?php get_footer(); ?>
