<?php
  function page_hero($args = NULL) {
    if (!isset($args['title'])) {
      $args['title'] = '';
    }
    if (!isset($args['subtitle'])) {
      $args['subtitle'] = '';
    }
    if (!isset($args['hero_background_image'])) {
      $args['hero_background_image'] = '';
    }
  ?>
      <div class="jumbotron page-hero"
        style="background-image: url(<?php echo $args['hero_background_image']; ?>); background-position: center;">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h2 class="display-4"><?php echo $args['title']; ?></h2>
              <p class="lead"><?php echo $args['subtitle']; ?></p>
            </div>
          </div>
        </div>
      </div>
    <?php
  }

  function notification_bar($args = NULL) {
    if (!isset($args['message'])) {
      $args['message'] = '';
    }
  ?>
    <div class="notification container-full" id="notification-bar"
      style="padding: 20px; width: 100%; left: 0; position: fixed; top: 0; background-color: #aaa">
      <div class="row">
        <div class="col-11">
          <h6><?php echo $args['message']; ?></h6>
        </div>
        <div class="col-1">
          <a id="notification-close">dismiss</a>
        </div>
      </div>

    </div>
    <?php
  }
?>
