<?php
  $background = $module['background'];
  $title = $module['title'];
  $description = $module['description'];
  $cta_group = $module['cta_group'];
?>

<section class="module-hero-with-cta">
  <div class="jumbotron jumbotron-hero"
    style="background-repeat: no-repeat; background-size: 100% auto;
    background-image: url('<?php echo $background["url"]; ?>')">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="display-4"><?php echo $title; ?></h1>
          <p class="lead"><?php echo $description ?></p>
          <p class="lead">
            <?php
              if (!empty($cta_group)) {
                forEach($cta_group as $cta_item) { ?>
                  <a class="btn btn-lg <?php echo $cta_item['button_style_class'] ?>"
                    href="<?php echo $cta_item['button_link'] ?>"
                    role="button"><?php echo $cta_item['button_label'] ?>
                  </a>
                <?php }
              } ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
