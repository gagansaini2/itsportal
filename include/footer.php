<script>
function validateName() {

  var name = document.getElementById('contact-name').value;

  if(name.length == 0) {

    producePrompt('Name is required', 'name-error' , 'red')
    return false;

  }

  if (!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)) {

    producePrompt('First and last name, please.','name-error', 'red');
    return false;

  }

  producePrompt('Valid', 'name-error', 'green');
  return true;

}

function validatePhone() {

  var phone = document.getElementById('contact-phone').value;

    if(phone.length == 0) {
      producePrompt('Phone number is required.', 'phone-error', 'red');
      return false;
    }

    if(phone.length != 10) {
      producePrompt('Include area code.', 'phone-error', 'red');
      return false;
    }

    if(!phone.match(/^[0-9]{10}$/)) {
      producePrompt('Only digits, please.' ,'phone-error', 'red');
      return false;
    }

    producePrompt('Valid', 'phone-error', 'green');
    return true;

}

function validateEmail () {

  var email = document.getElementById('contact-email').value;

  if(email.length == 0) {

    producePrompt('Email Invalid','email-error', 'red');
    return false;

  }

  if(!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {

    producePrompt('Email Invalid', 'email-error', 'red');
    return false;

  }

  producePrompt('Valid', 'email-error', 'green');
  return true;

}

function validateMessage() {
  var message = document.getElementById('contact-message').value;
  var required = 30;
  var left = required - message.length;

  if (left > 0) {
    producePrompt(left + ' more characters required','message-error','red');
    return false;
  }

  producePrompt('Valid', 'message-error', 'green');
  return true;

}

function validateForm() {
  if (!validateName() || !validatePhone() || !validateEmail() || !validateMessage()) {
    jsShow('submit-error');
    producePrompt('Please fix errors to submit.', 'submit-error', 'red');
    setTimeout(function(){jsHide('submit-error');}, 2000);
  }
  else {

  }
}

function jsShow(id) {
  document.getElementById(id).style.display = 'block';
}

function jsHide(id) {
  document.getElementById(id).style.display = 'none';
}




function producePrompt(message, promptLocation, color) {

  document.getElementById(promptLocation).innerHTML = message;
  document.getElementById(promptLocation).style.color = color;


}
</script>


<section id="contact" class="color2">
<div class="container">
<div class="row">
  <div class="col-sm-6">
    <h2>Drop us a line</h2>
       
    <?php 
$action=$_REQUEST['action']; 
if ($action=="")    /* display the contact form */ 
    { 
    ?> 
    <form  action="" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="action" value="submit"> 
          <div class="form-group">
            <label for="contact-name">Name</label>
            <input type="text" class="form-control" id="contact-name" name="name" placeholder="Enter your name.." onkeyup='validateName()'>
            <span class='error-message' id='name-error'></span>
          </div>

          <div class="form-group">
            <label for="contact-phone">Phone Number</label>
            <input type="tel" class="form-control" id="contact-phone" name="phone" placeholder="Ex: 1231231234" onkeyup='validatePhone()'>
            <span class='error-message' id='phone-error'></span>
          </div>

          <div class="form-group">
            <label for="contact-email">Email address</label>
            <input type="email" class="form-control" id="contact-email" name="email" placeholder="Enter Email" onkeyup='validateEmail()'>
            <span class='error-message' id='email-error'></span>
          </div>   

          <div class="form-group">
            <label for='contactMessage'>Your Message</label>
            <textarea class="form-control" rows="5" id='contact-message'  name='message'  placeholder="Enter a brief message" onkeyup='validateMessage()'></textarea>
            <span class='error-message' id='message-error'></span>
          </div>
		<input type="submit" value="Submit" onclick="validateForm()"/>      
        <span class='error-message' id='submit-error'></span>
      </form> 
      <?php 
    }  
else                /* send the submitted data */ 
    { 
    $name=$_REQUEST['name']; 
	$phone=$_REQUEST['phone'];
    $email=$_REQUEST['email']; 	
    $message=$_REQUEST['message']; 
    if (($name=="")||($phone=="")||($email=="")||($message=="")) 
        { 
        echo "All fields are required, please fill <a href=\"\">the form</a> again."; 
        } 
    else{         
        $from="From: $name<$email>\r\nReturn-path: $email"; 
        $subject="Message sent using your contact form"; 
        mail("ojasvi@itstraining.in", $subject, $phone, $message, $from); 
        echo "Email sent!"; 
        } 
    }   
?>  </div>
  <div class="col-sm-6">
    <h2>Visit our office</h2>
    <div class="row">
      <div class="col-sm-6">
        <h5>Innovative Technology Solutions,</h5>
        <p> B 100 A, South city 1, Near Signature Towers,<br>
          Gurgaon – 122001<br>
        <p><i class="fa fa-phone"></i>124-4243759<br>
          <i class="fa fa-envelope"></i><a href="mailto:ny@jobseek.com">enquiry@itsrecruitment.in</a></p>
        <div class="col-sm-6"> </div>
      </div>
    </div>
  </div>
</div>
</section>

<!-- ============ CONTACT END ============ --> 

<!-- ============ FOOTER START ============ -->

<footer>
  <div id="prefooter">
    <div class="container">
      <div class="row">
        <div class="col-sm-6" id="newsletter">
          <h2>Newsletter</h2>
          <form class="form-inline">
            <div class="form-group">
              <label class="sr-only" for="newsletter-email">Email address</label>
              <input type="email" class="form-control" id="newsletter-email" placeholder="Email address">
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
          </form>
        </div>
        <div class="col-sm-6" id="social-networks">
          <h2>Get in touch</h2>
          <a href="#"><i class="fa fa-2x fa-facebook-square"></i></a> <a href="#"><i class="fa fa-2x fa-twitter-square"></i></a> <a href="#"><i class="fa fa-2x fa-google-plus-square"></i></a> <a href="#"><i class="fa fa-2x fa-youtube-square"></i></a> </div>
      </div>
    </div>
  </div>
  <div id="credits">
    <div class="container text-center">
      <div class="row">
        <div class="col-sm-12"> &copy; 2015 Jobseek - Responsive Job Board HTML Template<br>
          Designed &amp; Developed by <a href="" target="_blank">solutions@itstraining.in</a> </div>
      </div>
    </div>
  </div>
</footer>

<!-- ============ FOOTER END ============ --> 

<!-- ============ LOGIN START ============ -->

<div class="popup" id="login">
  <div class="popup-form">
    <div class="popup-header"> <a class="close"><i class="fa fa-remove fa-lg"></i></a>
      <h2>Login</h2>
    </div>
    <form>
      <ul class="social-login">
        <li><a class="btn btn-facebook"><i class="fa fa-facebook"></i>Sign In with Facebook</a></li>
        <li><a class="btn btn-google"><i class="fa fa-google-plus"></i>Sign In with Google</a></li>
        <li><a class="btn btn-linkedin"><i class="fa fa-linkedin"></i>Sign In with LinkedIn</a></li>
      </ul>
      <hr>
      <div class="form-group">
        <label for="login-username">Username</label>
        <input type="text" class="form-control" id="login-username">
      </div>
      <div class="form-group">
        <label for="login-password">Password</label>
        <input type="password" class="form-control" id="login-password">
      </div>
      <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
  </div>
</div>

<!-- ============ LOGIN END ============ --> 

<!-- ============ REGISTER START ============ -->

<div class="popup" id="register">
  <div class="popup-form">
    <div class="popup-header"> <a class="close"><i class="fa fa-remove fa-lg"></i></a>
      <h2>Register</h2>
    </div>
    <form>
      <ul class="social-login">
        <li><a class="btn btn-facebook"><i class="fa fa-facebook"></i>Register with Facebook</a></li>
        <li><a class="btn btn-google"><i class="fa fa-google-plus"></i>Register with Google</a></li>
        <li><a class="btn btn-linkedin"><i class="fa fa-linkedin"></i>Register with LinkedIn</a></li>
      </ul>
      <hr>
      <div class="form-group">
        <label for="register-name">Name</label>
        <input type="text" class="form-control" id="register-name">
      </div>
      <div class="form-group">
        <label for="register-surname">Surname</label>
        <input type="text" class="form-control" id="register-surname">
      </div>
      <div class="form-group">
        <label for="register-email">Email</label>
        <input type="email" class="form-control" id="register-email">
      </div>
      <hr>
      <div class="form-group">
        <label for="register-username">Username</label>
        <input type="text" class="form-control" id="register-username">
      </div>
      <div class="form-group">
        <label for="register-password1">Password</label>
        <input type="password" class="form-control" id="register-password1">
      </div>
      <div class="form-group">
        <label for="register-password2">Repeat Password</label>
        <input type="password" class="form-control" id="register-password2">
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
</div>



<!-- Modernizr Plugin -->
    <script src="js/modernizr.custom.79639.js"></script>
<script src="js\bower_components\jquery\dist\jquery.min.js"></script>
<script src="angular/bower_components/angular/angular.js"></script>
<script src="angular/app.js"></script>
<script src="js\bower_components\bower_components\angular-file-upload\dist/angular-file-upload.js"></script>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- // <script src="js/jquery-1.11.2.min.js"></script> -->

    <!-- Bootstrap Plugins -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Retina Plugin -->
    <script src="js/retina.min.js"></script>

    <!-- ScrollReveal Plugin -->
    <script src="js/scrollReveal.min.js"></script>

    <!-- Flex Menu Plugin -->
    <script src="js/jquery.flexmenu.js"></script>

    <!-- Slider Plugin -->
    <script src="js/jquery.ba-cond.min.js"></script>
    <script src="js/jquery.slitslider.js"></script>

    <!-- Carousel Plugin -->
    <script src="js/owl.carousel.min.js"></script>

    <!-- Parallax Plugin -->
    <script src="js/parallax.js"></script>

    <!-- Counterup Plugin -->
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>

    <!-- No UI Slider Plugin -->
    <script src="js/jquery.nouislider.all.min.js"></script>

    <!-- Bootstrap Wysiwyg Plugin -->
    <script src="js/bootstrap3-wysihtml5.all.min.js"></script>

    <!-- Flickr Plugin -->
    <script src="js/jflickrfeed.min.js"></script>

    <!-- Fancybox Plugin -->
    <script src="js/fancybox.pack.js"></script>

    <!-- Magic Form Processing -->
    <script src="js/magic.js"></script>

    <!-- jQuery Settings -->
    
<!-- <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
    <script src="js/rating.js"></script>
    <script src="js/select2.js"></script>
    <script src="js/bootstrap-switch.min.js"></script>

    <script src="js/settings.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

    
    <script type="text/javascript" src="js/bower_components/selectize/dist/js/standalone/selectize.min.js"></script>
    
    <script type="text/javascript" src="js/bower_components/angular-selectize2/dist/angular-selectize.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/i18n/defaults-*.min.js"></script> -->

<!-- <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
 -->
<!-- <script src="js\bower_components\twitter-bootstrap-wizard\jquery.bootstrap.wizard.js"></script> -->




