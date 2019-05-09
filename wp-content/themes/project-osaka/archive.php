<?php get_header(); ?>

<?php
      while(have_posts()) {
        the_post(); ?>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div>
            <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('n/j/y'); ?> in <?php echo get_the_category_list(', '); ?></p>
          </div>
          <div>
            <?php the_excerpt(); ?>
            <p><a href="<?php the_permalink(); ?>">Continue Reading</a></p>
          </div>
        </div>
      <?php }
      echo paginate_links();
    ?>
<?php get_footer(); ?>
