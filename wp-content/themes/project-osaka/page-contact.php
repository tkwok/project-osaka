<?php get_header();
  page_hero(array(
    'title' => get_field('page_title'),
    'subtitle' => get_field('page_description'),
    'hero_background_image' => get_field('page_hero_image')['url']
  ));
?>
<?php

  //response generation function
  $response = "";
  //
  // echo $_SERVER['REQUEST_METHOD'] == 'POST';
  //function to generate response
  function my_contact_form_generate_response($type, $message){
    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";

    echo $response;
  }

  //response messages
  $not_human       = "Human verification incorrect.";
  $missing_content = "Please supply all information.";
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";

  //var_dump($_POST['submit']);

  if (isset($_POST['submitted'])) {

  //user posted variables
  $name = $_POST['contact-name'];
  $email = $_POST['contact-email'];
  $message = $_POST['contact-message'];

  //php mailer variables
  $to = "tkwok10@gmail.com"; //get_option('admin_email');
  $subject = "Someone sent a message from ".get_bloginfo('name');
  $headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";

    //if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
      //validate email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          my_contact_form_generate_response("error", $email_invalid);
          $email_valid = false;
        }
        //validate presence of name and message
        if(empty($name) || empty($message)){
          my_contact_form_generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $sent = wp_mail($to, $subject, strip_tags($message), $headers);
          if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
          else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
        }
    }


  //else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);

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
      <form method="post" action="<?php the_permalink(); ?>" name="submit" id='submit'>
        <div class="form-group row">
					<label class="col-sm-2 col-form-label text-right" for="contact-name">name</label>
          <div class="col-sm-10">
		        <input type="text" class="form-control" name="contact-name" id="contact-name"
              pattern="^([- \w\d\u00c0-\u024f]+)$" required />
          </div>
  		  </div>

        <div class="form-group row">
					<label class="col-sm-2 col-form-label text-right" for="contact-email">email</label>
          <div class="col-sm-10">
		        <input type="text" class="form-control" name="contact-email" id="contact-email"
              pattern="^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$" required />
          </div>
				</div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label text-right" for="contact-message">message</label>
          <div class="col-sm-10">
		        <textarea name="contact-message" class="form-control" id="contact-message" rows="5" required></textarea>
          </div>
        </div>

          <div class="form-group text-right">
						<input type="submit" class="btn btn-primary" />
					</div>
				</ul>
        <input type="hidden" name="submitted" value="1">
			</form>
    </div>
  </div>
</div>
<?php get_footer(); ?>


<script>
  function addEvent(node, type, callback) {
    if (node.addEventListener) {
      node.addEventListener(type, function(e) {
        callback(e, e.target);
      }, false);
    } else if (node.attachEvent) {
      node.attachEvent('on' + type, function(e) {
        callback(e, e.srcElement);
      });
    }
  }

  function shouldBeValidated(field) {
    return (
      !(field.getAttribute("readonly") || field.readonly) &&
      !(field.getAttribute("disabled") || field.disabled) &&
      (field.getAttribute("pattern") || field.getAttribute("required"))
    );
  }

  function instantValidation(field) {
    if (shouldBeValidated(field)) {
      var invalid =
        (field.getAttribute("required") && !field.value) ||
        (field.getAttribute("pattern") &&
          field.value &&
          !new RegExp(field.getAttribute("pattern")).test(field.value));
      if (!invalid && field.getAttribute("aria-invalid")) {
        field.removeAttribute("aria-invalid");
      } else if (invalid && !field.getAttribute("aria-invalid")) {
        field.setAttribute("aria-invalid", "true");
      }
    }
  }

  addEvent(document, "change", function(e, target) {
    instantValidation(target);
  });

</script>
