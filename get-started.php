<?php 
	include('settings/db.php');
	
	if ($_POST){
		
		mysqli_query($conn, "insert into cRegistration (name, email, phone, address, pricing, b_name, b_idea) values ('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['phone'] . "','" . $_POST['address'] . "', '" . $_POST['pricing'] . "', '" . $_POST['business_name'] . "', '" . $_POST['business_idea'] . "')");
	
	$email_to = 'kalpanaa@codebinary.in';
    
    $profile = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $subject = "Received. A new registration from Kalpanaa"; // required
    $message = $_POST['business_name'] . ' ' . $_POST['business_idea']  . ' under ' .  $_POST['pricing'] . ' Pricing. Contact: ' . $_POST['phone'] ; // required
 
    $email_message = "Registration Details:\n\n";
 
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Profile: ".clean_string($profile)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 
	// create email headers
	$headers = 'From: '.$email_from."\r\n".
	'Reply-To: '.$email_from."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	mail($email_to, $subject, $email_message, $headers);  
	
	if ($_POST['pricing'] == 'Basic')
	{
		header("location: https://imjo.in/w7CKz5");
	} elseif ($_POST['pricing'] == 'Standard')
	{
		header("location: https://imjo.in/Ka6x66");
	} elseif ($_POST['pricing'] == 'Premium'){
		header("location: https://imjo.in/8YKGMr");
	} else{
		header("location: get-started.php");
	}
	
	
	}

?>

<!doctype html>
<html lang="en">
    <head>
     
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Kalpanaa: Get Started</title>
		<meta content="Kalpanaa by Initiatives" name="author">
		<meta content="Learn about the world of entrepreneurship, find access to high-quality credit sources, solidify your position and build a better marketplace." name="description">
  
		<link rel="canonical" href="https://kalpanaa.codebinary.in/get-started.php" />
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
		<link rel="shortcut icon" href="img/shortcut_icon.png" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136232244-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-136232244-2');
</script>

    </head>
	<style>
	html {
	scroll-behavior: smooth;
	}
	</style>
    <body onload="createCaptcha()">
        <header>
           	<div class="top_menu row m0">
           		<div class="container">
					<div class="float-left">
						<ul class="list header_social">
							<li><a href="https://www.linkedin.com/company/codebinary/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="https://www.instagram.com/codebinary.initiatives/" target="_blank"><i class="fa fa-instagram"></i></a></li>
							<li><a href="https://github.com/projectcodebinary" target="_blank"><i class="fa fa-github"></i></a></li>
						</ul>
					</div>
					<div class="float-right">
						<!--<select class="lan_pack">
							<option value="1">English</option>
							<option value="1">Bangla</option>
							<option value="1">Indian</option>
							<option value="1">Aus</option>
						</select>
						<a class="ac_btn" href="#">My Account</a>-->
						<a class="dn_btn" href=".">BACK TO HOME</a>
					</div>
           		</div>	
           	</div>	
        </header>
       
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center"></br>
						<h2>Start Your Journey</h2>
						<div class="page_link">
							<a href="#">Learn about the world of entrepreneurship, find access to high-quality credit sources, solidify your position in the global economy and build a better marketplace.</a>
						</div>
					</div>
				</div>
            </div>
        </section>
       
        <section class="donation_f_area p_50">
        	<div class="container">
        		<div class="row donation_f_inner">
        			<div class="col-lg-10 offset-lg-1">
        				<div class="dn_form_area">
        					<form class="donation_form row" action="" method="post" id="form" onsubmit="validateCaptcha()">
								<div class="form-group col-lg-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                </div>
								<div class="form-group col-lg-12">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone Number" required>
                                </div>
								<div class="form-group col-lg-12">
                                    <textarea class="form-control" name="address" id="address" rows="5" placeholder="Your Communication Address" required></textarea>
                                </div>
                               	<div class="form-group col-lg-12">
									<select class="donate_select" name="pricing">
										<option value="Basic" selected>Basic Pricing</option>
										<option value="Standard">Standard Pricing</option>
										<option value="Premium">Premium Pricing</option>
									</select>
                                </div>
								<div class="form-group col-lg-12">
                                    <input type="text" class="form-control" id="bnae" name="business_name" placeholder="Your Business Name" required>
                                </div>
								<div class="form-group col-lg-12">
                                    <textarea class="form-control" name="business_idea" id="bid" rows="5" placeholder="Your Business Idea" required></textarea>
                                </div>
								<div class="form-group col-lg-12">
								<div id="captcha"></div>
								<input type="text" placeholder="Captcha" id="cpatchaTextBox"/>
								</div>
                                <div class="form-group col-md-12">
                                    <button type="submit" value="submit" class="btn submit_btn form-control">Submit & Proceed To Pay</button>
                                </div>
                            </form>
        				</div>
        			</div>
        		</div>

        	</div>
        </section>
       
       <footer class="footer-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">About</h6>
                            <p>Kalpana is a women entrepreneur support programme started with the vision to boost the entrepreneurial spirit in women to give their household business a new dimension by bringing it up in the global front or to help them shape their idea of a new business.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Contact Us</h6>
							<p>
							FF-27,Cross Road Mall,Central Spine,</br>
							Vidhyadhar Nagar, Jaipur</br>
							Rajasthan, India</br></br>
							Email: kalpanaa@codebinary.in
							</p>						
                        </div>
                    </div>							
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Useful Links</h6>
                            <ul class="list">
                                        <li><a href="https://codebinary.in/privacy-policy.html">Privacy Policy</a></li>
										<li><a href="https://codebinary.in/terms-of-service.html">Terms of Service</a></li>
										<li><a href="https://codebinary.in/acceptable-use-policy.html">Acceptable Use Policy</a></li>
                                    </ul>
                        </div>
                    </div>	
					<div class="col-lg-2  col-md-6 col-sm-6">
						<img class="img-fluid" src="img/app.png" style="height:100px;" alt="Coming Soon">
					</div>
                </div>
                <div class="border_line"></div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-md-8 footer-text m-0">
                   A programme jointly offered by <a href="http://codebinary.in/" target="_blank">CodeBinary Initiatives</a> and <a href="https://www.sproutingwingsdigitalmarketing.com/" target="_blank">Sprouting Wings</a></p>
                </div>
            </div>
        </footer>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ca9d130557d5f68515b4697/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope-min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>