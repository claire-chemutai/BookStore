 <?php
 @ob_start();
 session_start();
require_once("./functions/membersite_config.php");
include_once("./functions/booksFunctions.php");
$books = new booksFunctions();
if (isset($_SESSION['name_of_user'])) {
        
            $account="Log Out";
            $href="logout.php";
        }
    if (!isset($_SESSION['name_of_user'])){
            $account="Log In";
            $href="signin.php";
        }



  if(isset($_POST['Submit']))
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    $subject=$_POST['subject'];
    
    $books->contact($name, $email, $message, $subject);
     
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
        <center><p> <span>Contact Us </span></p></center>
    </div>
    <div id="templatemo_content">
    

<div id="templatemo_content">
      <form   method='post' accept-charset='UTF-8'>
      <fieldset class="fieldset" >
      <legend>Contact Us</legend>
      <div class="container">
      <div class='short_explanation'>* required fields</div>
       
      <div >
          <label for='username' >Name*:</label><br/>
          <input type='text' name='name' placeholder="name" 
           maxlength="50" /><br/>
      </div>
      <div >
          <label for='username' >Email*:</label><br/>
          <input type='text' name='email' placeholder="abc@abc.com"
           maxlength="50" /><br/>
      </div>
      <div >
          <label for='username' >Subject*:</label><br/>
          <textarea cols="60" rows="3" placeholder="subject" name="subject"></textarea><br/>
      </div>
      <div >
          <label for='username' >Message*:</label><br/>
          <textarea cols="60" rows="5" placeholder="message" name="message" ></textarea><br/>
      </div>
      <div>
          <button type='submit' class="buy_now_button" name='Submit' value='Send' >Send</button>
      </div><br> 
      </div>
      </fieldset>
      </form>
      </div >
      

    <div id="templatemo_footer">
    
          <a href="home.php">Home</a> | <a href="about.php">About</a> | <a href="uploadBooks.php">Upload books</a> |  <a href="contact.php">Contact Us</a><br />
        Copyright © 2018 <a href="#"><strong>Open Book Store</strong></a> 
         </div> 
    <!-- end of footer -->

</div> <!-- end of container -->

</body>
</html>
