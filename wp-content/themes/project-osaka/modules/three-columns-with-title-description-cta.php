<?php
  $title = $module['title'];
  $description = $module['description'];
  $columns = $module['columns'];
  $primary_cta = $module['primary_cta'];
?>

<section class="module-three-columns-with-title-description-cta">
  <div class="container container-module">
    <div class="row">
      <div class="col-xs-12 col-lg-12 text-center">
        <h3><?php echo $title; ?></h3>
        </p><?php echo $description; ?></p>
      </div>
    </div>
    <div class="row">
      <?php
        if (!empty($columns)) {
          foreach($columns as $column) { ?>
            <div class="col-xs-12 col-lg-4 text-center">
                <h5><?php echo $column['column_title']; ?></h5>
                <div><?php echo $column['column_image']['url']; ?></div>
                <p><?php echo $column['column_description']; ?></p>
                <a href="<?php echo $column['column_cta_link']['url']; ?>"
                  class="btn <?php echo $column['column_cta_style_class']; ?>">
                    <?php echo $column['column_cta_label']; ?></a>
            </div>
        <?php }} ?>

    </div>
    <?php if (!empty($primary_cta['label'])) { ?>
    <div class="row">
      <div class="col-xs-12 col-lg-12 text-center container-cta">
        <a href="<?php echo $primary_cta['link']['url'] ?>"
          class="btn <?php echo $primary_cta['style_class'] ?>">
          <?php echo $primary_cta['label'] ?></a>
      </div>
    </div>
  <?php } ?>
  </div>
</section>
