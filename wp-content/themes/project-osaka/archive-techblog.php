<?php get_header();
  page_hero(array(
    'title' => get_field('page_title', 'cpt_techblog'),
    'subtitle' => get_field('page_description', 'cpt_techblog'),
    'hero_background_image' => get_field('page_hero_image', 'cpt_techblog')['url']
  ));
?>

<div class="container">
      <div class="row">
        <div class="col-lg-12 col-xs-12 text-center">
          <h2 class="section-header">Tags</h3>
        </div>
      </div>
        <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <?php
              $tagsArray = get_terms('techblog-tags', '');
              if (!empty($tagsArray)) {
                foreach ($tagsArray as $tag) {
                  // TODO create tag page
                  // $tagLink = get_tag_link( $tag->term_id );
                  $html = "<div class='techblog-tag'><a href='#' title='{$tag->name} Tag' class='{$tag->slug}'>";
                  $html .= "{$tag->name}</a></div>";
                  echo $html;
                };
              } else {
                echo "No tag available";
              }
            ?>
          </div>
        </div>
				<div class="row">
          <?php
            while(have_posts()) {
              the_post(); ?>
                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-left">
                    <div class="row blog-thumb-row">
                      <div class="col-6 text-left blog-thumb" style="background-color: #ccc;">
                        <div class="block-with-text">
                          <h6><?php the_title(); ?></h6>
                        </div>
                        <p><?php the_author(); ?></p>
                        <a style="position: absolute; bottom: 1em" href="<?php the_permalink(); ?>">read more <i class="fas fa-angle-right"></i></a>
                      </div>
                      <?php
                        $thumb_id = get_post_thumbnail_id($post->ID);
                        $thumb_url = wp_get_attachment_image_src( $thumb_id, 'thumb-techblog', false );
                        // $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                        echo '<div class="col-6" style="background-image: url('. $thumb_url[0].'); background-position: center"></div>';
                      ?>
                    </div>
                  </div>
            <?php }
            echo paginate_links();
          ?>
        <div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<?php get_footer(); ?>
