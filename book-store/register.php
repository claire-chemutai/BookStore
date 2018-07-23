 <?php
 @ob_start();
require_once("./functions/membersite_config.php");
session_start();
if (isset($_SESSION['name_of_user'])) {
        
            $account="Log Out";
            $href="logout.php";
        }
    if (!isset($_SESSION['name_of_user'])){
            $account="Log In";
            $href="signin.php";
        }

  if(isset($_POST['submitted']))
  {
     if($membership->RegisterUser())
     {
          $membership->RedirectToURL("signin.php");
     }
  }
 ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

        <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />

        <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
</head>
<body>
<!--  Free CSS Templates from www.templatemo.com -->
<div id="templatemo_container">
    <div id="templatemo_menu">
        <ul>
            <li><a href="index.php" class="current">Home</a></li>
            <li><a href="about.php">About</a></li>
            <!-- <li><a href="books.php">Books</a></li> -->
            <li><a href="uploadBooks.php">Upload Book</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="<?php echo $href?>"><?php echo $account?></a></li>
        </ul>
    </div> <!-- end of menu -->
    <div id="templatemo_header">
        <div id="templatemo_special_offers">
            <p>
                <span>Latest</span> books now freely available here
            </p>
            <a href="subpage.html" style="margin-left: 50px;">Read more...</a>
        </div>
        
        
        <div id="templatemo_new_books">
            <ul>
                <li>Man a machine</li>
                <li>Homegoing</li>
                <li>Lost illusions</li>
            </ul>
            <a href="subpage.html" style="margin-left: 50px;">Read more...</a>
        </div>
    </div> <!-- end of header -->
     <div id="templatemo_menu">
        <center><p> <span>Register Here  </span></p></center>
    </div>
    <div id="templatemo_content">
    
  <form id='register'  action='<?php echo $membership->GetSelfScript(); ?>' 
   enctype="multipart/form-data" method='post'  accept-charset='UTF-8'>
   <div class="container">
  

  <input type='hidden' name='submitted' id='submitted' value='1'/>

  <div class='short_explanation'>* required fields</div>
  <input type='hidden'  class='spmhidip' name='<?php echo $membership->GetSpamTrapInputName(); ?>' />
      
         <div><span class='error'><?php echo $membership->GetErrorMessage(); ?></span></div>
      
        <label for='name' >Your Full Name*: </label><br/>
        <input type='text' name='name' id='name' value='<?php echo $membership->SafeDisplay('name') ?>' maxlength="50" /><br/>
        <span id='register_name_errorloc' class='error'></span>
      
        <label for='email' >Email Address*:</label><br/>
        <input type='text' name='email' id='email' value='<?php echo $membership->SafeDisplay('email') ?>' maxlength="50" /><br/>
        <span id='register_email_errorloc' class='error'></span>
      
        <label for='password' >Password*:</label><br/>
        <div class='pwdwidgetdiv' id='thepwddiv' ></div>
        <!-- <noscript> -->
        <input type='password' name='password' id='password' maxlength="50" />
         <!-- </noscript> -->
        <div id='register_password_errorloc' class='error' style='clear:both'></div>
      
    
        <input type='submit' name='submit' class="buy_now_button" value='Register' />
      
      <div class='short_explanation'><a href="signin.php" >Already have an account?Sign in Here</a></div>

   
</div>
    </form>

      </div >
      <script type='text/javascript'>
  // <![CDATA[
      var pwdwidget = new PasswordWidget('thepwddiv','password');
      pwdwidget.MakePWDWidget();
      
      var frmvalidator  = new Validator("register");
      frmvalidator.EnableOnPageErrorDisplay();
      frmvalidator.EnableMsgsTogether();
      frmvalidator.addValidation("name","req","Please provide your name");

      frmvalidator.addValidation("email","req","Please provide your email address");

      frmvalidator.addValidation("email","email","Please provide a valid email address");
      
      frmvalidator.addValidation("password","req","Please provide a password");
     
  </script>

    <div id="templatemo_footer">
    
	      <a href="index.php">Home</a> | <a href="about.php">About</a> | <a href="uploadBooks.php">Upload books</a> |  <a href="contact.php">Contact Us</a><br />
        Copyright © 2018 <a href="#"><strong>Open Book Store</strong></a> 
         </div>  
    <!-- end of footer -->

</div> <!-- end of container -->

</body>
</html>
