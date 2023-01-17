<?php

     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "crunchpress@info.com";
    $email_subject = "New Membership Form Submission";
	$error_message = '';

     

     
    // validation
    if(
        !isset($_POST['name']) ||
		!isset($_POST['email']) ||
		!isset($_POST['website']) ||
		!isset($_POST['comment']))
		
		{
			
			echo "Fields are not filled properly";
			die();
    }
     
    $name = $_POST['name']; // required
	$email = $_POST['email']; // required
	$subject = $_POST['website']; // required
	$comments = $_POST['comment'];
	
     
$email_message = '<html>';
$email_message = '<body>';
$email_message = '<head>';
$email_message = '<title>Your Details Are Below</title>';
$email_message = '</head>';
$email_message .= '<h1>Your Details Are Below</h1>';
$email_message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$email_message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['name']) . "</td></tr>";
$email_message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
$email_message .= "<tr><td><strong>Website:</strong> </td><td>" . strip_tags($_POST['website']) . "</td></tr>";
$email_message .= "<tr><td><strong>Comment:</strong> </td><td>" . strip_tags($_POST['comment']) . "</td></tr>";
$email_message .= "</table>";
$email_message .= "</body></html>";	






$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: ". $email . "\r\n";
$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


@mail($email_to, $email_subject, $email_message, $headers); 
?>

<!DOCTYPE HTML>
<html lang="en" class="no-js demo-1">
<head>
<meta charset="utf-8">
<title>BOOKISH</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--Custom Css-->
<link href="css/custom.css" rel="stylesheet" type="text/css">
<!--Color Css-->
<link href="css/color.css" rel="stylesheet" type="text/css">
<!--Bootstrap Css-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!--Bootstrap Responsive Css-->
<link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,800,900,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<!--Fontawesome Css-->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--BxSlider Css-->
<link href="css/jquery.bxslider.css" rel="stylesheet" type="text/css">
<!-- Book Block CSS -->
<link rel="stylesheet" id="bookblock-css"  href='css/bookblock.css' type='text/css' media='all' />
<link rel="stylesheet" id="demo-css"  href="css/demo_bookblock.css" type='text/css' media='all' />
<!--Favicon Css-->
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<!--HTML5 JS-->
<script src="js/html5.js"></script>
</head>
<body>
<!--Wrapper Start-->
<div id="wrapper"> 
  <!--Headre Start-->
  <header id="header">
    <div class="container"> <strong class="logo"><a href="#"><img src="images/logo.png" alt="img">BOOKISH<span>Responsive</span></a></strong> 
      <!--Navigation Area Start-->
      <div class="navigation-area">
        <nav id="nav">
          <div class="navbar navbar-inverse pull-right span9">
            <div class="navbar-inner">
              <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <div class="nav-collapse collapse">
                <ul class="nav home_nav">
                  <li class="active"> <a href="#main_slider"> Home </a> </li>
                  <li> <a href="index.html#book_detail_slider"> Book Info </a> </li>
                  <li> <a href="#features"> Key Features </a> </li>
                  <li> <a href="#pricing"> Pricing </a> </li>
                  <li> <a href="#view"> Mobile Ready </a> </li>
                  <li> <a href="#author"> About Author </a> </li>
                  <li><a href="#quick_view">Sneak Peak</a></li>
                  <li><a href="#reviews">Book Reviews</a></li>
                </ul>
              </div>
              <!--/.nav-collapse --> 
            </div>
            <!-- /.navbar-inner --> 
          </div>
          <!-- /.navbar --> 
        </nav>
      </div>
      <!--Navigation Area End--> 
    </div>
  </header>
  <!--Headre End-->
  
  <div id="main"> 
  <!-- Start of Thank -->
    <section id="content_Wrapper" class="mbtm">
      <section class="container container-fluid">
        <section class="row-fluid">
          <section class="span12 error-page">
          <div class="holder">
            <h2>Thank You</h2>
            <p>Thank you for your form submission, as soon as we get this we will get back to you shortly.</p>
            </div>
          </section>
        </section>
      </section>
    </section>
	<!-- End of Thank -->
    <!--Footer Start-->
    <footer id="footer"> 
      <!--Newsletter Section Start-->
      <section class="neswletter-section">
        <section class="container">
          <section class="row-fluid">
            <div class="span7">
              <h2> join our Newsletter! </h2>
              <strong class="title"> For a free Chapter, <span> Get our newletter! </span> </strong> </div>
            <div class="span5">
              <form class="newsletter_form" method="post" action="#">
                <input class="input-newsletter" type="text" value="domain@myhosting.com" name="newsletter_form" />
                <input type="submit" class="btn-subscribe" value="Subscribe" />
              </form>
            </div>
          </section>
        </section>
      </section>
      <!--Newsletter Section End--> 
      
      <!--Footer Bottom Section Start-->
      <section class="footer-bottom-section">
        <div class="container">
          <div class="row-fluid">
            <div class="span6">
              <nav>
                <ul class="footer-nav">
                  <li> <a href="index.html"> Home </a> </li>
                  <li> <a href="blog.html"> Blog </a> </li>
                  <li> <a href="blog-single.html"> Blog Detail </a> </li>
                  <li> <a href="blog-without-sidebar.html"> Blog Full width</a> </li>
                  <li> <a href="contact.html"> Contact </a> </li>
                </ul>
              </nav>
            </div>
            <div class="span6"> <strong class="copy">&copy; Bookweb Landing Page 2014. All rights reserved.</strong></div>
          </div>
        </div>
      </section>
      <!--Footer Bottom Section End--> 
    </footer>
    <!--Footer End--> 
  </div>
</div>
<!--Wrapper End--> 
<!--jQuery Start--> 
<!--JQUERY 1.11.1--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<!--Bootstrat JS--> 
<script src="js/bootstrap.js"></script> 
<!--BxSlider JS--> 
<script src="js/jquery.bxslider.min.js"></script> 
<!--Parallax Effect Js--> 
<script src="js/jquery.stellar.min.js"></script> 
<!--Google Map Js--> 
<script src="http://maps.google.com/maps/api/js?sensor=false"></script> 
<!--Custom JS--> 
<script src="js/custom.js"></script> 
<!--jQuery End-->

</body>

</html>
