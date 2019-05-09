<?php
  $title = $module['title'];
  $description = $module['description'];
  $primary_cta = $module['primary_cta'];
  $background_class = $module['background_class'];
?>

<section class="three-columns">
  <div class="container-full container-module <?php echo $background_class; ?>">
    <div class="row">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-lg-12 text-center">
            <h3><?php echo $title; ?></h3>
            </p><?php echo $description; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-lg-12 text-center container-cta">
            <a href="<?php echo $primary_cta['link']['url'] ?>"
              class="btn <?php echo $primary_cta['style_class'] ?>">
              <?php echo $primary_cta['label'] ?>
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
