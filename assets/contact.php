<?php
define("EMAIL", "kaytlyncampbell@gmail.com");

if(isset($_POST['submit'])) {

  //include validation class
  include('validate.class.php');

  //assign post data to variables
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $phone = trim($_POST['phone']);
  $quadrant = trim($_POST['quadrant']);
  $budget = trim($_POST['budget']);
  $message = trim($_POST['message']);

  //start validating our form
    $v = new validate();
    $v->validateStr($name, "name", 1, 75);
    $v->validateEmail($email, "email");
    $v->validatePhone($phone, "phone");
    $v->validateDD($quadrant, "quadrant");
    $v->validateStr($message, "message", 1, 1000);

    if(!$v->hasErrors()) {
          $header = "From: $email\n" . "Reply-To: $email\n";
          $subject = "Estimate Inquiry";
          $email_to = EMAIL;


          $emailMessage = "Name: " . $name . "\n\n";
          $emailMessage .= "Email: " . $email . "\n\n";
          $emailMessage .= "Phone: " . $phone . "\n\n";
          $emailMessage .= "Quadrant: " . $quadrant . "\n\n";
          $emailMessage .= "Budget: " . $budget . "\n\n";
          $emailMessage .= "Message: " . $message;

          mail($email_to, $subject, $emailMessage, $header);

      $successMessage = "<p class=\"success\">Thank You. Your message has been sent.</p>";

      }else {
      //set the number of errors message
      $message_text = $v->errorNumMessage();

      //store the errors list in a variable
      $errors = $v->displayErrors();

      //get the individual error messages
      $nameErr = $v->getError("name");
      $emailErr = $v->getError("email");
      $phoneErr = $v->getError("phone");
      $quadrantErr = $v->getError("quadrant");
      $messageErr = $v->getError("message");
    }

}// end isset
?>


<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Full House Renovations - Contact Us</title>
    <link rel="stylesheet" href="../stylesheets/app.css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <script src="../bower_components/modernizr/modernizr.js"></script>
  </head>
  <body id="contact">
    <div class="contain-to-grid">
     <nav class="top-bar" data-topbar>
       <ul class="title-area">
         <li class="name">
           <h1><a class="logo hide-for-large-up" href="../index.html"><img src="../images/full-house-white.png" width="180" /></a></h1>
         </li>
         <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
       </ul>
       <section class="top-bar-section">
         <!-- Right Nav Section -->
         <ul class="right hide-for-large-up">
           <li class="home"><a href="../index.html">Home</a></li>
           <li class="about"><a href="about.html">About</a></li>
           <li class="testimonials"><a href="testimonials.html">Testimonials</a></li>
         </ul>
         <!-- Left Nav Section -->
         <ul class="left hide-for-large-up">
           <li class="services"><a href="services.html">Services</a></li>
           <li class="gallery"><a href="gallery.html">Gallery</a></li>
           <li class="contact"><a href="contact.php">Contact</a></li>
         </ul>
       </section>
     </nav>
    </div>
    <div class="header show-for-large-up">
      <div class="row">
        <div class="large-12 columns">
          <nav class="main-nav">
            <ul class="left first">
              <li class="home"><a href="../index.html">Home</a></li>
              <li class="about"><a href="about.html">About</a></li>
              <li class="testimonials"><a href="testimonials.html">Testimonials</a></li>
            </ul>
            <a href="../index.html"><img src="../images/Full-house-logos.png" width="300" class="left"></a>
            <ul class="right second">
              <li class="services"><a href="services.html">Services</a></li>
              <li class="gallery"><a href="gallery.html">Gallery</a></li>
              <li class="contact"><a href="contact.php">Contact</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <div class="short-hero">
      <div class="row">
        <div class="large-10 columns large-centered text-center">
          <h1 class="header-bg">Contact</h1>
        </div>
      </div>
    </div>
    <div class="row whitespace">
      <div class="large-6 large-push-6 columns">
        <div class="row">
          <div class="large-12 columns">
            <?php echo $message_text;  echo $errors;  ?>
            <?php echo $successMessage; ?>
            <h3 class="blue-text">Request an Estimate</h3>
            <p>Fill out the form below if you’d like an estimate for your project, or just <a href="mailto:info@fullhouserenovations.com">send us an email</a>.</p>
            <form id="contact_form" method="post" action="./contact.php">
              <label>Name
                <input type="text" name="name" class="textfield" placeholder="John Doe" value="" />
              </label>
              <label>Email
                <input type="text" name="email" class="textfield" placeholder="youremail@domain.com" value="" />
              </label>
              <label>Phone Number
                <input type="text" name="phone" class="textfield" placeholder="7805551234" value="" />
              </label>
              <div class="row">
                <div class="medium-5 columns mb1">
                  <img src="../images/fhr-quadrant.png">
                </div>
                <div class="medium-7 columns">
                  <label>Please select which quadrant of the city you live in
                    <select placeholder="Please Select" name="quadrant">
                      <option value="Please Select" selected disabled hidden>Please Select</option>
                      <option value="Quadrant 1 (North West)">Quadrant 1 (North West)</option>
                      <option value="Quadrant 2 (North East)">Quadrant 2 (North East)</option>
                      <option value="Quadrant 3 (South East)">Quadrant 3 (South East)</option>
                      <option value="Quadrant 4 (South West)">Quadrant 4 (South West)</option>
                    </select>
                  </label>
                  <p class="hint">Note: We only operate within Edmonton city limits. We <strong>do not</strong> work in Spruce Grove, St. Albert, Sherwood Park, Beaumont, etc.</p>
                </div>
              </div>
              <label>Approximate Budget (Optional)
                <select>
                  <option value="Please Select" hidden>Please Select</option>
                  <option value="10,000-20,000">$10,000 - $20,000</option>
                  <option value="20,000-30,000">$20,000 - $30,000</option>
                  <option value="30,000-50,000">$30,000 - $50,000</option>
                  <option value="50,000 plus">$50,000 and up</option>
                </select>
              </label>
              <label>Your Message
              <textarea name="message" class="textarea" cols="45" placeholder="Tell us a little about your project" rows="5"></textarea>
              </label>
              <input type="submit" name="submit" class="button secondary" value="Submit" />
            </form>
          </div>
        </div>
      </div>
      <div class="large-6 large-pull-6  columns">
        <a href="https://www.google.ca/maps/place/Full+House+Renovations+Inc/@53.5695397,-113.5823105,15z/data=!4m5!3m4!1s0x0:0x2b01c3822934c321!8m2!3d53.5695397!4d-113.5823105">
          <img src="../images/fhr-map-large.png">
        </a>
        <br>
        <a href="https://www.google.ca/maps/place/Full+House+Renovations+Inc/@53.5695397,-113.5823105,15z/data=!4m5!3m4!1s0x0:0x2b01c3822934c321!8m2!3d53.5695397!4d-113.5823105">
          Get Directions
        </a>
        <h3 class="blue-text mt1">Full House Renovations Inc.</h3>
        <p>
          15120 117th Avenue<br>
          Edmonton, AB T5M 3Z8
        </p>
        <p>
          Phone: (780) 483-2666<br>
          Fax: (780) 481-1661<br>
          Email: info@fullhouserenovations.com
        </p>
        <p>
          <strong>Office Hours:</strong><br>
          8am - 4pm Monday to Friday
        </p>
      </div>
    </div>

    <footer>
      <div class="row whitespace">
        <div class="large-4 columns">
          <h5>Full House Renovations Inc.</h5>
          <p>
            15120 117th Avenue<br>
            Edmonton, AB T5M3Z8
          </p>
          <p>
            Phone: (780) 483-2666<br>
            Fax: (780) 481-1661<br>
            Email: <a href="mailto:info@fullhouserenovations.com">info@fullhouserenovations.com</a>
          </p>
        </div>
        <div class="large-2 columns pb1">
          <h5>
            Quicklinks
          </h5>
          <ul class="no-bullets">
            <li class="home"><a href="../index.html">Home</a></li>
            <li class="about"><a href="about.html">About</a></li>
            <li class="testimonials"><a href="testimonials.html">Testimonials</a></li>
            <li class="services"><a href="services.html">Services</a></li>
            <li class="gallery"><a href="gallery.html">Gallery</a></li>
            <li class="contact"><a href="contact.php">Contact</a></li>
          </ul>
        </div>
        <div class="large-3 columns pb1">
          <h5>
            Where To Find Us
          </h5>
          <a href="contact.php"><img src="../images/fhr-map-small.png"></a>
        </div>
        <div class="large-3 columns pb1">
          <h5>
            Copyright
          </h5>
          <small>
            &copy; Copyright 2016 Full House Renovations.<br>
            All rights reserved.
          </small>
        </div>
      </div>
    </footer>

  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../bower_components/foundation/js/foundation.min.js"></script>
  <script src="../js/app.js"></script>
  </body>
</html>
