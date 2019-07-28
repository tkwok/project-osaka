<?php get_header();
  page_hero(array(
    'title' => get_field('page_title'),
    'subtitle' => get_field('page_description'),
    'hero_background_image' => get_field('page_hero_image')['url']
  ));

  //array('class' => 'cropped')
?>

<div class="container">
  <div class="row">
    <div class="col-12 text-center">
      <h2 class="section-header">Bio</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-lg-6 text-center">
      <div class="image-cropper">
      <?php the_post_thumbnail('about-image-thumbnail'); ?>
      </div>
    </div>
    <div class="col-xs-12 col-lg-6">
      <h2><?php echo get_field('bio_name');?></h2>
      <h4><?php echo get_field('bio_title');?></h4>
      <p><?php echo get_field('bio_description');?></p>
    </div>
  </div>

  <div class="row">
    <div class="col-12 text-center">
      <h2 class="section-header">Skills</h2>
    </div>
  </div>
  <div class="row">

    <?php
      $skillsArray = get_field('bio_skills');
      if ($skillsArray) {
      foreach($skillsArray as $skill) { ?>
        <div class="col-xs-12 col-lg-<?php echo 12 / sizeof($skillsArray);?> text-center">
          <h5><?php echo $skill["title"]; ?></h5>
          <?php print_r($skill["image"]); ?>
          <p><?php echo $skill["description"]; ?></p>
        </div>
      <?php }}?>

  </div>


  <div class="row">
    <div class="col-12 text-center">
      <h2 class="section-header">Timeline</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-12 text-center">

      <section id="conference-timeline">
        <div class="timeline-start">Today</div>
        <div class="conference-center-line"></div>
        <div class="conference-timeline-content">
          <?php
            $timeline_items_array = get_field('timeline_items', 'option');
            if (is_array($timeline_items_array)) {
              forEach($timeline_items_array as $key=>$timeline_item) {
                $month_text = date("M", strtotime($timeline_item['date']));
                $date_text = date("d", strtotime($timeline_item['date']));
                $year_text = date("y", strtotime($timeline_item['date']));
                ?>
                <div class="timeline-article">
                  <div class="<?php echo ($key % 2 == 0) ? 'content-left-container': 'content-right-container' ?>">
                    <div class="<?php echo ($key % 2 == 0) ? 'content-left': 'content-right' ?>"
                      data-aos="<?php echo ($key % 2 == 0) ? 'fade-right': 'fade-left' ?>"
                      data-aos-offset="200"
                      data-aos-delay="50"
                      data-aos-duration="800"
                      data-aos-easing="ease-in"
                      data-aos-mirror="false"
                      data-aos-once="true"
                      data-aos-anchor-placement="top-bottom">
                      <p><strong><?php echo $timeline_item["title"]; ?></strong><br/>
                        <?php echo $timeline_item["description"]; ?>
                       <span class="article-number"><?php echo $date_text; ?></span>
                     </p>
                     <span class="timeline-author"><a href="#">case study <i class="fas fa-angle-right"></i></a></span>

                    </div>
                  </div>
                  <div class="meta-date">
                    <span class="month"><?php echo $month_text; ?></span>
                    <span class="date"><?php echo $year_text; ?></span>
                  </div>
                </div>
              <?php
              }
            }
          ?>

        </div>
        <div class="timeline-end">Past</div>
      </section>




    </div>
  </div>
</div>





<?php get_footer(); ?>
