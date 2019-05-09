<?php
  get_header();

  while(have_posts()) {
    the_post(); ?>

    <div class="container">

      <div class="row">
          <div class="col-sm-12 col-lg-6">
            <h1><?php the_title(); ?></h1>
            <div class="row row-techblog-author">
              <div class="col-3 col-md-4 col-sm-4">
                <div class="circle-base">
                  <div class="month"><?php echo get_the_date('M'); ?></div>
                  <div class="date"><?php echo get_the_date('j'); ?></div>
                  <div class="day"><?php echo get_the_date('D'); ?></div>
                </div>
              </div>
              <div class="col-9 col-md-8 col-sm-8 text-left">
                <h6 style="margin-bottom: 0;"><?php the_author(); ?></h6>
                <p><small>Frontend Developer</small></p>
              <?php }
                $techblogTags = get_the_terms( $post->ID, 'techblog-tags');
                if ($techblogTags) {
                foreach($techblogTags as $tag) {
                  // {$tag->slug}
                  $html = "<span class='techblog-tag'><a href='#' title='{$tag->name} Tag' class='{$tag->slug}'>";
                  $html .= "{$tag->name}</a></span>";
                  echo $html;
                }
              }
              ?>
              </div>
            </div>
          </div>

        <div class="col-sm-12 col-lg-6 container-techblog-feature">
          <?php the_post_thumbnail('full'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 container-techblog-feature-paragraph">
            <?php the_content(); ?>
        </div>
      </div>



</div>
  <?php get_footer();
?>
