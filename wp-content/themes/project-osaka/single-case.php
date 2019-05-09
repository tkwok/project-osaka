<?php
  get_header();
  while(have_posts()) {
    the_post();
    $columns = get_field('activities');

    $start_date = date_create(get_field('start_date'));
    $end_date_source = get_field('end_date');

    $end_date = date_create($end_date_source ? $end_date_source : date("m/d/YY"));
    $diff = date_diff($start_date, $end_date);
    ?>
    <div class="container container-module">
      <div class="row">
        <div class="col-lg-6 order-xs-12">
          <h1><?php echo get_field('company_name'); ?></h1>
          <h5><?php echo get_field('job_title'); ?></h5>
          <h6>duration <?php if ($diff->y) echo $diff->y . ' years';
           if ($diff->m and !$diff->y) echo $diff->m . ' months';
           if ($start_date and !$end_date_source) echo ', currently employed'; ?></h6>
          <p><?php echo get_field('company_bio'); ?></p>
        </div>
        <div class="col-lg-6 col-xs-12 text-right">
          <a href="<?php echo get_field('company_url'); ?>">
            <img style="width: 100%" src="<?php echo get_field('company_logo')['url']; ?>" />
          </a>
        </div>
      </div>

      <div class="row">
        <?php
        if (!empty($columns)) {
          foreach($columns as $column) { ?>
            <div class="col-xs-12 col-lg-<?php echo 12 / sizeof($columns); ?> text-center">
              <h5><?php echo $column['activity_title']; ?></h5>
              <p><?php echo $column['activity_description']; ?></p>
            </div>
        <?php }
         } ?>
      </div>
    </div>
  <?php } get_footer();?>
