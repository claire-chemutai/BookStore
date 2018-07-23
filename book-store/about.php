<?php
@ob_start(); 
session_start();
if (isset($_SESSION['name_of_user'])) {
        
            $account="Log Out";
            $href="logout.php";
        }
    if (!isset($_SESSION['name_of_user'])){
            $account="Log In";
            $href="signin.php";
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
    
    <div id="templatemo_content">
        
        <div id="templatemo_content_left">
            <div class="templatemo_content_left_section">
                <h1>Categories</h1>
                <ul>
                    <li><a href="books.php?id=1&cat=Comic">Comic</a></li>
                    <li><a href="books.php?id=2&cat=Christian">Christian</a></li>
                    <li><a href="books.php?id=3&cat=Crime">Crime</a></li>
                    <li><a href="books.php?id=4&cat=Fantasy">Fantasy</a></li>
                    <li><a href="books.php?id=5&cat=Fiction">Fiction</a></li>
                    <li><a href="books.php?id=6&cat=Romance">Romance</a></li>
                    <!-- <li><a href="spiritual.php">Spiritual</a></li> -->
                    
                </ul>
            </div>
            <div class="templatemo_content_left_section">
                <div class="templatemo_content_left_section">
                <h1>Best Rated</h1>
                <ul>
                    <li><a href="#">Homegoing</a></li>
                    <li><a href="#">Lost Illusion</a></li>
                    <li><a href="#">Man a Machine</a></li>
                    <li><a href="#">The sahdow line a confession</a></li>
                    <li><a href="#">Death after life</a></li>
                </ul>
            </div>
            </div>
            
            
        </div> <!-- end of content left -->
        
        <div id="templatemo_content_right">
        	
            <h1>Book Store</h1>
            <div class="image_panel"><img src="images/templatemo_image_02.jpg" alt="CSS Template" width="100" height="150" /></div>
          <h2>Find all the books you love here</h2>
            <ul>
	            <li>By Bookstore</li>
            	<li>APRIL 2018</li>
                <li>Welcome all readers</li>
            </ul>
            
            <h2>Book store is a free online bookstore where you 
            can get access to reading materials. Here you can read, 
            save favourite files and store them in the electonic shelf available online</h2>
             <div class="cleaner_with_height">&nbsp;</div>
            
            
        </div> <!-- end of content right -->
    
    	<div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content -->
    
    <div id="templatemo_footer">
    
          <a href="home.php">Home</a> | <a href="about.php">About</a> | <a href="uploadBooks.php">Upload books</a> |  <a href="contact.php">Contact Us</a><br />
        Copyright © 2018 <a href="#"><strong>Open Book Store</strong></a> 
         </div> 
    <!-- end of footer -->

</div> <!-- end of container -->

</body>
</html>