<?php 


$submitted = "";
if(isset($_POST['submit'])){
    $to = "cottell.andrew@gmail.com,taahirac001@gmail.com"; // this is your Email address;
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $job = $_POST['job'];
    $note = $_POST['message'];
    $subject = "Contact Form submission";
    $subject2 = "Copy of your form submission";
    $message = "You recieved an inquiry" . "\n\n" . "Name: $name" . "\n" . "Phone Number: $phone" . "\n" . "$name needs help with: $job" . "\n" . $name . " wrote the following:" . "\n\n" . $note;
    $message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to, $subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    $submitted = "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you'); to redirect to another page.
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Contact</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="css/contact_style.css" type="text/css" rel="stylesheet"/>
    </head>
    
 
    <body>
        <div class="navigation">
            <!--NAVIGATION-->
        <header class="container-fluid">
            <nav class="navbar navbar-expand-md justify-content-between">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="brand" style="cursor: pointer;">
                    <a href="/" class="navbar-brand mr-0">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <span style="color:#C12C2C; font-size: 4rem; font-family: cursive;">W</span><span style="font-size: 1.2rem; font-family: cursive; color: #495159;">D</span><span style="font-size: 4rem; font-family: cursive;">M</span>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <p style="font-size: .8rem; margin-top: -1rem; color: #000;">Web Design & Marketing</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="navbar-collapse collapse dual-nav">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item links">
                            <a class="nav-link pl-0 nav-items" href="about" >About <span class="sr-only">About</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-items" href="services">Services <span class="sr-only">Services</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-items" href="case-studies">Case Studies <span class="sr-only">Case Studies</span></a>
                        </li>
                <!--	<li class="divider-vertical">&#124;</li> -->
                        <div class="contact-btn">
                            <a class="nav-link contact-btn" href="contact"><button type="button" class="btn btn-default navbar-btn">Contact Us<span class="sr-only">Contact Us</span></button></a>
                        </div>
                    </ul>
                </div>
            </nav>
        </header>             
        </div>
      
  <!--NAVIGATION END--> 
      
      
      

	  
<!--jumbotron-->
      
        <div class="jumbotron">
            <div class="row container jumbo-contain">
                <div class=" text col-sm-4 col-md-4 col-lg-4">
                    <p><span class="h1">Drop Us A Note.</span><br>We'd Love To Hear From You. </p>
                    <hr>
                    <p><span class="h1">Don't Want To Wait?</span><br>Get A Proposal <a href="proposal" style="cursor: pointer; font-weight: bold; color: #4B88A2;">NOW</a>.</p>
                </div>    
                <div class="empty col-sm-1 col-md-1 col-lg-1 " ></div>
                <div class="forms col-sm-7 col-md-7 col-lg-7 " >
                    <form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form">
                        <?php echo "<p class = 'text-center'> <font color=red size='3.5pt'>$submitted</font></p>"; ?>
                        <div class="controls">
                            <div class="row form-group">
                                <div class="col-md-12 col-lg-12 col-sm-12">    
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Name*" required="required" data-error="Firstname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col-md-12 col-lg-12 col-sm-12">    
                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Email*" required="required" data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col-md-12 col-lg-12 col-sm-12">    
                                    <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Phone*">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col-md-12 col-lg-12 col-sm-12">    
                                    <select class="form-control" id="job" name="job" style="color: #8e8e8e;" > 
                                        <option disabled selected >How can we help?*</option>
                                        <option>I need to build a new website</option>
                                        <option>I need a redesign for my current website</option>
                                        <option>I need online marketing for my website</option>
                                        <option>My rankings are down and I need online marketing</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 col-lg-12 col-sm-12">    
                                    <textarea id="form_message" name="message" class="form-control" placeholder="Tell us what you need" rows="6" required="required" data-error="Please,leave us a message."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                    <input type="submit" name="submit" class="btn btn-success btn-send" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      
      
	  
	  
	  
      
      
  <!--FOOTER-->
      
     <section class="container-fluid footer">
        <div class="row">
	     <div class="col-sm-1 stayinformed">
			</div>
         <div class="col-sm-5 stayinformed">
            <h1>Stay informed</h1>
            <p>Stay up to date on the latest  technology and web design tactics, and learn about ways you can improve your website.</p>
			 
			 
			<!--LIST ITEMS--> 
            <div class="row listitem">
			  <div class="col-sm-4 col-xs-4 mobileinformed">
				  <ul>
                <li><a href="#">Services</a></li>
                <li><a href="#">UX/UI</a></li>
                <li><a href="#">Interactive Design</a></li>
                <li><a href="#">Responsive Design</a></li>
				  </ul>
              </div>
				
			  <div class="col-sm-4 col-xs-4 mobileinformed">
				  <ul>
                <li><a href="#">Web Development</a></li>
                <li><a href="#">Back-end Coding</a></li>
                <li><a href="#">Front-end Coding</a></li>
                <li><a href="#">Analytics</a></li>
				  </ul>
              </div>
				
			  <div class="col-sm-4 col-xs-4 mobileinformed">
				  <ul>
                <li><a href="#">SEO Tactics</a></li>
                <li><a href="#">PPC Tactics</a></li>
                <li><a href="#">E-commerce</a></li>
                <li><a href="#">Social Media</a></li>
				  </ul>
              </div>	
			</div>
         </div>
            
			
			<div class="col-sm-2"></div>
			
			
			
			

			<!--CONTACT US-->
			
       <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 contact">

          <h1>Contact us</h1>
           <div class="row">
               <div class="contacts col-xs-6 col-sm-6 col-md-12 col-lg-12">
                   <ul class="address">
                <li>Business Name</li>
                <li>Business Address</li>
                <li>City, State, Zip</li>
            </ul>
               </div>
               <div class="contact contacts col-xs-6 col-sm-6 col-md-12 col-lg-12">
                   <ul>
                <li><img id="iconphone" src="fonts/phonewhite.gif" width="24"/>000-000-0000</li>
                <li><img id="iconmail" src="fonts/mailwhite.gif" width="24"/>info@wdm.com</li>
                <li><img id="iconmail" src="fonts/mailwhite.gif" width="24"/>jobs@wdm.com</li>
              </ul>
               </div>
           </div>
            
            
            <div class="">
              
            </div>
		   
		   
		   <!--SOCIAL MEDIA-->
             
            <div class="social">
                <a href="#"><img src="fonts/facebookwhite.gif"/></a>
                <a href="#"><img src="fonts/twitterwhite.gif"></a>
                <a href="#"><img src="fonts/linkedinwhite.gif"/></a>
                <a href="#"><img src="fonts/instagramwhite.gif"/></a>
            </div>
         </div>
       </div>
		 
		 
		 
         
        
        <div class="row">
          <div class="col-sm-12 copyright">
              <p>&copy;2017 WDM, All Rights Reserved.</p>
          </div>
        </div>
    </section> 
        
    
      <!--FOOTER END-->
        
    
      
      
      
      
      
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<script src="js/case_studies.js"></script>
  </body>
    
</html>