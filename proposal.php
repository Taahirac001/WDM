<?php
$submitted = '';
$msgClass = 'errordiv';
if(isset($_POST['submit'])){
    // Get the submitted form data
    $postData = $_POST;
    $name = $_POST['name'];
    $companyName = $_POST['companyname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $need = $_POST['message'];
    $services = join(", ", $_POST['help']);
    $startdate = $_POST['startdate'];
    $deadline = $_POST['deadline'];
    $budget = $_POST['budget'];
    $referral = $_POST['referral'];
    $projectbrief = $_POST['projectbrief'];
    
    
       
    // Upload attachment file
    
    $fileName = $_FILES["file"]["name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("pdf","doc","docx","jpg","png","jpeg");
    
    if(!isset($_FILES['file'])){
        $select_err = "Sorry, something went wrong. Please try again.";
        $extension_err = "";
        $uploadOK =0;
    }
    // Check file size
 // if ($_FILES["file"]["size"] > 500000) {
    //echo "Sorry, your file is too large.";
    //}
    
    // Check extension
    if( in_array($fileType,$extensions_arr) ){
        $uploadOK =1;
    } else {
        $extension_err = "Only PDF, DOC, DOCX, JPG, PNG & JPEG files are allowed.";
        $uploadOK =0;
    } 
                    
      
    // SEND EMAIL
    $to = "cottell.andrew@gmail.com,taahirac001@gmail.com"; // this is your Email address;
    $from = $email; // this is the sender's Email address
    $subject = "Proposal Request - $name from $companyName";
    $subject2 = "We recieved your proposal request!";
    $message = "You recieved a proposal request" . "\n\n" . "Name: $name" . "\n" . "Company Name: $companyName" . "\n" . "Email: $email" . "\n" . "Phone Number: $phone" . "\n" . "Tell us what you need: $need" . "\n" . "How can we help?: $services" . "\n" . "When would you like to start?: $startdate" . "\n" . "Do you have a dealine?: $deadline" . "\n" . "What is your budget?: $budget" . "\n" . "How did you hear about us?: $referral" . "\n" . "Project Brief: $projectbrief";
    $message2 = "Hi $name!" . "\n" . "We recieved your request for a proposal. We are reviewing your submission and going over the details." . "\n" . "Once we are done we will contact you with a strategy plan free of charge. We will also include our rate for doing the job and putting the strategy into effect if you decide to work with us." . "\n\n" . "Thank you," . "\n" . "WDM Team";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    
    //boundary 
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//headers for attachment 
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
    
    //preparing attachment
if(!empty($fileName) > 0){
    if(is_file($fileName)){
        $message .= "--{$mime_boundary}\n";
        $fp =    @fopen($fileName,"rb");
        $data =  @fread($fp,filesize($fileName));

        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: application/octet-stream; name=\"".$target_file."\"\n" . 
        "Content-Description: ".$target_file."\n" .
        "Content-Disposition: attachment;\n" . " filename=\"".$target_file."\"; size=".filesize($fileName).";\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    }
}
$message .= "--{$mime_boundary}--";
    
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    $submitted = "Proposal request Sent. Thank you " . $name . ", we will contact you shortly.";
        
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Proposal</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="css/proposal_style.css" type="text/css" rel="stylesheet"/>
    </head>
    
 
    <body>
        <div class="navigation">
            <!--NAVIGATION-->
        <header class="container-fluid">
            <nav class="navbar navbar-expand-md justify-content-between">
                <div class="brand" style="cursor: pointer;">
                    <a href="/" class="navbar-brand mr-0">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <span style="color:#C12C2C; font-size: 4rem; font-family: cursive;">W</span><span style="font-size: 1.2rem; font-family: cursive;">D</span><span style="font-size: 4rem; font-family: cursive;">M</span>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <p style="font-size: .8rem; margin-top: -1rem; color: #000;">Web Design & Marketing</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
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
        
        
        <!--PROPOSAL FORM-->
      
        <div class="proposal">
            <div class="page-header text-center">
            <h1>Please fill out our short form.</h1>
                <h2><?php echo $submitted; ?></h2>
                        </div>

            <div class="row">
                <div class="col-xs-5 col-sm-12 col-md-5 col-lg-7 proposal-form">
                    <form id="contact-form" method="post" action="proposal.php" role="form" data-toggle="validator" enctype="multipart/form-data">
                        <div class="controls">
                            <div class="heading">
                                <h3 class="rowspace">Tell us about yourself..</h3>
                                <hr>
                            </div>
                            <div class="row form-group">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12"> 
                                    <label for="form_name" class="question">Name*</label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your full name" required="required" data-error="Firstname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12"> 
                                    <label for="form_companyname" class="question">Company Name*</label>
                                    <input id="form_companyname" type="text" name="companyname" class="form-control" placeholder="Please enter your company name" required="required" data-error="Company name is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">   
                                    <label for="form_email" class="question">Email*</label>
                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email*" required="required" data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">    
                                    <label for="form_phone" class="question">Phone*</label>
                                    <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone number" required="required" data-error="Please enter a valid phone number.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class="heading">
                                <h3>Now some info on your project..</h3>
                                <hr>
                            </div>
                            
                            <div class=" form-group">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">    
                                    <label for="form_message" class="question">Tell us what you need*</label>
                                    <textarea id="form_message" name="message" class="form-control" placeholder="Let us know any problems you are experiencing" rows="7" required="required" data-error="Oops! We need to know a little more detail."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
                                    <label class="question">How can we help?</label>
                                    <small class="text-muted form-text helptext" style="margin: -.5rem 0 1rem 0;">Pick as many as you like.</small>
                                    
                                    <div class="row">
                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="terms" name="help[]" value="Ux/UI">Ux/UI
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="terms" name="help[]" value="Interactive Design">Interactive Design
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="terms" name="help[]" value="Responsive Design">Responsive Design
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="terms" name="help[]" value="Web Development">Web Development
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="terms" name="help[]" value="Ecommerce">E-commerce
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="terms" name="help[]" value="SEO">SEO
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="terms" name="help[]" value="PPC">PPC
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="terms" name="help[]" value="Analytics">Analytics
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class=" form-group">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">    
                                    <label for="form_startdate" class="question">Do you have any competitors or inspirations?</label>
                                    <small class="text-muted form-text helptext inspire-helptext">Let us know if there are any competitors you want us to look at or any sites that you like as an inspiration.</small>
                                    <input id="form_startdate" type="text" name="startdate" class="form-control" placeholder="Enter website links of competitors and/or inspirations" >
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class=" form-group">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">    
                                    <label for="form_startdate" class="question">When would you like to start?*</label>
                                    <input id="form_startdate" type="text" name="startdate" class="form-control" placeholder="Enter a date or amount of days" required="required" data-error="Start date is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class=" form-group">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">    
                                    <label for="form_deadline" class="question">Do you have a deadline?*</label>
                                    <input id="form_deadline" type="text" name="deadline" class="form-control" placeholder="Enter date or amount of days" required="required" data-error="Deadline is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class=" form-group">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">    
                                    <label for="form_budget" class="question">What is your budget?*</label>
                                    <select class="form-control" id="budget" name="budget" style="height: 3rem;" > 
                                        <option disabled selected >Choose..</option>
                                        <option>Under $25k</option>
                                        <option>$25 - 40k</option>
                                        <option>$40 - $60k</option>
                                        <option>$60-80k</option>
                                        <option>$80-100k</option>
                                        <option>$100k+</option>
                                        <option>I'm flexible</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class=" form-group">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">    
                                    <label for="form_select" class="question">How did you hear about us?*</label>
                                    <select class="form-control" id="referral" name="referral" style="height: 3rem;" > 
                                        <option disabled selected >Choose..</option>
                                        <option>Craigslist</option>
                                        <option>Search Engine</option>
                                        <option>Referral</option>
                                        <option>Other</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class="heading">
                                <h3>Provide your project brief or RFP</h3>
                                <hr>
                            </div>
                            
                            <div class="form-group">
                                <textarea id="form_message" name="projectbrief" class="form-control" placeholder="Tell us the details of your project" rows="10" ></textarea>
                            </div>                            
					  
                            <div class="heading">
                                <h3 class="or">Or Upload it</h3>
                            </div>
                            
                            
                            <div class="form-group attachment">
                                <div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>
                            </div>
                           
                            
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
                                    <input type="submit" name="submit" class="btn btn-success btn-send" value="Submit Inquiry">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12" style="margin-top: 2rem;">
                                    <p class="text-muted"><strong>*</strong> These fields are required.</p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>      
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
    
</html>