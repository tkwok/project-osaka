<?php
$name_error = '';
$email_error = '';
$comment_error = '';
$name = '';
$comments = '';
$email = '';
$has_error = false;


if(isset($_POST['submitted'])) {

  echo "<h1>I havent submitted yet</h1>";

	if(trim($_POST['contactName']) === '') {
		$name_error = 'Please enter your name';
		$has_error = true;
	} else {
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['email']) === '')  {
		$email_error = 'Please enter your email address.';
		$has_error = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$email_error = 'You entered an invalid email address';
		$has_error = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['comments']) === '') {
		$comment_error = 'Please enter a message';
		$has_error = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}

	if(!isset($has_error)) {
		$email_to = get_field('contact_form_address');
		$subject = '[PHP Snippets] From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$email_to.'>' . "\r\n" . 'Reply-To: ' . $email;

		wp_mail($email_to, $subject, $body, $headers);
		$email_sent = true;
	}

} ?>

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
              <!-- <li><p><i class="<?php echo $field['icon_class']; ?>"></i> <?php echo $field['address']; ?></p></li> -->
            <?php }
          }
        }
      ?>
    </div>
    <div class="col-xs-12 col-lg-6 text-center">
      <h3>Contact form</h3>
      <form action="<?php the_permalink(); ?>" id="contactForm" method="post">
        <div class="form-group row">

						<label class="col-sm-2 col-form-label" for="contactName">name</label>
            <div class="col-sm-10">
			        <input type="text" class="form-control" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />
            </div>
						<!-- <?php if($name_error != '') { ?>
							<span class="error"><?=$name_error;?></span>
						<?php } ?> -->
  		  </div>

        <div class="form-group row">
						<label class="col-sm-2 col-form-label" for="email">email</label>
            <div class="col-sm-10">
			        <input type="text" class="form-control" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
            </div>
						<!-- <?php if($email_error != '') { ?>
							<span class="error"><?=$email_error;?></span>
						<?php } ?> -->
				</div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="commentsText">message</label>
            <div class="col-sm-10">
			        <textarea name="comments" class="form-control" id="commentsText" rows="5" class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
            </div>
						<!-- <?php if($comment_error != '') { ?>
							<span class="error"><?=$comment_error;?></span>
						<?php } ?> -->
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
