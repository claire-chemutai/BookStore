 <?php
  session_start();
 include_once("./database/DBconfigurations.php");
include_once("./functions/booksFunctions.php");
include_once("./functions/membership.php");

require_once("./functions/membersite_config.php");
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
     if($membership->Login())
      {
           $membership->RedirectToURL("index.php");
      }
  }
    if(isset($_POST['addShelf']))
    {

     if($membership->CheckLogin())
        {
          $membership->RedirectToURL("index.php");
      }
      else
        $membership->RedirectToURL("signin.php");
  }
 ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Books</title>
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
            <a href="index.php" style="margin-left: 50px;">Read more...</a>
        </div>
    </div> <!-- end of header -->
     <div id="templatemo_menu">
        <center><p> <span>Account  </span></p></center>
    </div>
    <div id="templatemo_content">
      <form id='login' action='<?php echo $membership->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
      <fieldset class="fieldset" >
      <legend>Login</legend>
      

      <input type='hidden' name='submitted' id='submitted' value='1'/>

      <div class='short_explanation'>* required fields</div>
      <div class="container">

      <div><span class='error'><?php echo $membership->GetErrorMessage(); ?>
      </span></div> 
      <div >
          <label for='username' >Email*:</label><br/>
          <input type='text' name='email' id='email' value='<?php echo $membership->SafeDisplay('email') ?>'
           maxlength="50" /><br/>
          <span id='login_username_errorloc' class='error'></span>
      </div>
      <div >
          <label for='password' >Password*:</label><br/>
          <input type='password' name='password' id='password' maxlength="50" /><br/>
          <span id='login_password_errorloc' class='error'></span>
      </div><br>

      <div >
          <input type='submit' class="buy_now_button" name='Submit' value='Submit' />
      </div><br>
       <div class='short_explanation'><a href="register.php" >Sign Up Here to Regsiter</a></div> 
      <!-- <div class='short_explanation'><a href='reset-pwd-req.php'>Forgot Password?</a></div> -->
      </div>
      </fieldset>
      </form>
      </div >

       <script type='text/javascript'>
  // <![CDATA[
      var pwdwidget = new PasswordWidget('thepwddiv','password');
      pwdwidget.MakePWDWidget();
      
      var frmvalidator  = new Validator("login");
      frmvalidator.EnableOnPageErrorDisplay();
      frmvalidator.EnableMsgsTogether();

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
