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
    $v->validateStr($phone, "phone", 10, 11);
    $v->validateDD($quadrant, "quadrant");
    $v->validateStr($message, "message", 1, 1000);

    if(!$v->hasErrors()) {
          $header = "From: $email\n" . "Reply-To: $email\n";
          $subject = "Contact Form Submission";
          $email_to = EMAIL;

          $emailMessage = "Name: " . $name . "\n";
          $emailMessage .= "Email: " . $email . "\n\n";
          $emailMessage .= "Phone: " . $phone . "\n\n";
          $emailMessage .= "Quadrant: " . $quadrant . "\n\n";
          $emailMessage .= "Budget: " . $budget . "\n\n";
          $emailMessage .= $message;

          @mail($email_to, $subject ,$emailMessage ,$header );

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
    <script src="bower_components/modernizr/modernizr.js"></script>
  </head>
  <body id="contact">
    <div class="contain-to-grid">
     <nav class="top-bar" data-topbar>
       <ul class="title-area">
         <li class="name">
           <h1><a class="logo hide-for-large-up" href="#"><img src="../images/full-house-white.png" width="130" /></a></h1>
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
           <li class="contact"><a href="contact.html">Contact</a></li>
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
            <a href="#"><img src="../images/Full-house-logos.png" width="300" class="left"></a>
            <ul class="right second">
              <li class="services"><a href="services.html">Services</a></li>
              <li class="gallery"><a href="gallery.html">Gallery</a></li>
              <li class="contact"><a href="contact.html">Contact</a></li>
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
      <div class="large-6 columns">
        <img src="../images/fhr-map-large.png">
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
      <div class="large-6 columns">
        <h3 class="blue-text">Request an Estimate</h3>
        <p>Fill out the form below if you’d like an estimate for your project, or just <a href="mailto:info@fullhouserenovations.com">send us an email</a>.</p>
        <form class="contact-form">
          <div class="row">
            <div class="large-12 columns">
              <label>Name
                <input type="text" placeholder="John Doe" />
              </label>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <label>Phone Number
                <input type="text" placeholder="7804781234" />
              </label>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <label>Email
                <input type="text" placeholder="7804781234" />
              </label>
            </div>
          </div>
          <div class="row">
            <div class="large-7 columns">
              <label>Please select which quadrant of the city you live in
                <select placeholder="Please Select">
                  <option value="Please Select" selected disabled hidden>Please Select</option>
                  <option value="ten">Quadrant 1 (North West)</option>
                  <option value="twenty">Quadrant 2 (North East)</option>
                  <option value="thirty">Quadrant 3 (South East)</option>
                  <option value="fifty">Quadrant 4 (South West)</option>
                </select>
              </label>
              <p class="hint">Note: We only operate within Edmonton city limits. We <strong>do not</strong> work in Spruce Grove, St. Albert, Sherwood Park, Beaumont, etc.</p>
            </div>
            <div class="large-5 columns">
              <img src="../images/fhr-quadrant.png">
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <label>Approximate Budget (Optional)
                <select>
                  <option value="ten">$10,000 - $20,000</option>
                  <option value="twenty">$20,000 - $30,000</option>
                  <option value="thirty">$30,000 - $50,000</option>
                  <option value="fifty">$50,000 and up</option>
                </select>
              </label>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <label>Tell Us a Bit About Your Project
                <textarea></textarea>
              </label>
            </div>
          </div>
          <a href="#" class="button secondary">Submit</a>
        </form>
      </div>
    </div>

    <div class="contact-form">
      <div class="row">
        <?php echo $message_text;  echo $errors;  ?>
        <?php echo $successMessage; ?>
        <form id="contact_form" method="post" action="./contact.php">
          <p><label>Name:<br />
          <input type="text" name="name" class="textfield" value="" />
          </label></p>
          <p><label>Email: <br />
          <input type="text" name="email" class="textfield" value="" />
          </label></p>
          <p><label>Phone: <br />
          <input type="text" name="phone" class="textfield" value="" />
          </label></p>
          <label>Please select which quadrant of the city you live in
            <select placeholder="Please Select" name="quadrant">
              <option value="Please Select" selected disabled hidden>Please Select</option>
              <option value="ten">Quadrant 1 (North West)</option>
              <option value="twenty">Quadrant 2 (North East)</option>
              <option value="thirty">Quadrant 3 (South East)</option>
              <option value="fifty">Quadrant 4 (South West)</option>
            </select>
          </label>
          <p><label>Message: <br />
          <textarea name="message" class="textarea" cols="45" rows="5"></textarea>
          </label></p>
          <p><input type="submit" name="submit" class="button rounded" value="Submit" /></p>
        </form>
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
            <li class="contact"><a href="contact.html">Contact</a></li>
          </ul>
        </div>
        <div class="large-3 columns pb1">
          <h5>
            Where To Find Us
          </h5>
          <a href="contact.html"><img src="../images/fhr-map-small.png"></a>
        </div>
        <div class="large-3 columns pb1">
          <h5>
            Around The Internet
          </h5>
          <ul class="no-bullets">
            <li>Facebook</li>
            <li>Twitter</li>
            <li>Houzz</li>
          </ul>
          <small>
            &copy; Copyright 2015 Full House Renovations.<br>
            All rights reserved.
          </small>
        </div>
      </div>
    </footer>

  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/foundation/js/foundation.min.js"></script>
  <script src="js/app.js"></script>
  </body>
</html>
