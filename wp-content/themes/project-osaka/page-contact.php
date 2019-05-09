<?php get_header();
  page_hero(array(
    'title' => get_field('page_title'),
    'subtitle' => get_field('page_description'),
    'hero_background_image' => get_field('page_hero_image')['url']
  ));
?>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-lg-6 text-center">
      <h3>Ways to reach me</h3>
      <?php
        $aboutPage = get_page_by_path('about', '', 'page');
        if ($aboutPage) {
          $contactField = get_field('bio_contacts', $aboutPage->ID);
          if (!empty($contactField)) {
            foreach($contactField as $field) { ?>
              <li><p><i class="<?php echo $field['icon_class']; ?>"></i> <?php echo $field['address']; ?></p></li>
            <?php }
          }
        }
      ?>
    </div>
    <div class="col-xs-12 col-lg-6 text-center">
      <h3>Contact form</h3>
      <form method="post" action="contact-submit.php">
        <div class="form-group row">
					<label class="col-sm-2 col-form-label" for="contact-name">name</label>
          <div class="col-sm-10">
		        <input type="text" class="form-control" name="contact-name" id="contact-name" />
            <div class="invalid-feedback">
              Please choose a username.
            </div>
          </div>
  		  </div>

        <div class="form-group row">
					<label class="col-sm-2 col-form-label" for="contact-email">email</label>
          <div class="col-sm-10">
		        <input type="text" class="form-control" name="contact-email" id="contact-email" />
          </div>
				</div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="contact-message">message</label>
            <div class="col-sm-10">
			        <textarea name="contact-message" class="form-control" id="contact-message" rows="5"></textarea>
            </div>
          </div>
          <div class="form-group text-right">
						<input type="submit" class="btn btn-primary"></input>
            <button class="btn btn-secondary">Clear</button>
					</div>
				</ul>
				<input type="hidden" name="submitted" id="submitted" value="false" />
			</form>
    </div>
  </div>
</div>
<?php get_footer(); ?>
