<?php get_header();?>

<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-6">
      <h2><?php echo the_field('title'); ?></h2>
      <h3><?php echo the_field('subtitle'); ?></h3>
      <p><?php echo the_field('purpose'); ?></p>
    </div>
    <div class="col-sm-12 col-md-6">
      <?php echo the_post_thumbnail('single-work-image'); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <p><?php echo the_field('description'); ?></p>
    </div>
  </div>
</div>

<?php get_footer() ?>
