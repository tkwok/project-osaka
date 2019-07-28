<?php
  $title = $module['title'];
  $description = $module['description'];
  $primary_cta = $module['primary_cta'];
  $image = $module['image'];
  $direction = $module['direction'];

  if (!function_exists('getImageContainer')) {
    function getImageContainer($image_url) {
      return '<div class="container-module-image"><img src="' . $image_url . '" width="100%"></div>';
    }
  }

  if (!function_exists('getTextContainer')) {
    function getTextContainer($title, $description, $primary_cta, $direction) {
      return '<div class="container-text" style="padding: 0 2em;"
          data-aos="fade-' . $direction .'"
          data-aos-offset="200"
          data-aos-delay="50"
          data-aos-duration="800"
          data-aos-easing="ease-in"
          data-aos-mirror="false"
          data-aos-once="true"
          data-aos-anchor-placement="top-bottom">
        <h5>' . $title .'</h5>
        <p>'. $description .'</p>
        <a href="' . $primary_cta['cta_link']['url'] .'" class="btn ' . $primary_cta['style_class'] .'">'
          . $primary_cta['label'] .'
        </a>
        </div>';
    }
  }
?>
<section class="two-columns-with-image-text">
  <div class="container container-module">
    <div class="row">
      <div class="col-xs-12 col-lg-6">
        <?php echo $direction == 'left' ? getImageContainer($image['sizes']['modules-two-columns-image']) : getTextContainer($title, $description, $primary_cta, $direction) ?>
      </div>
      <div class="col-xs-12 col-lg-6">
        <?php echo $direction == 'right' ? getImageContainer($image['sizes']['modules-two-columns-image']) : getTextContainer($title, $description, $primary_cta, $direction) ?>
      </div>
    </div>
  </div>
</section>
