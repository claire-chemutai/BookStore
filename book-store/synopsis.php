 <?php
 @ob_start();
 session_start();
 include_once("./database/DBconfigurations.php");
include_once("./functions/booksFunctions.php");
include_once("./functions/membership.php");

$books = new booksFunctions();
$ip_add=gethostbyname("localhost");
$membership=new Membership();
if (isset($_SESSION['name_of_user'])) {
        
            $account="Log Out";
            $href="logout.php";
        }
    if (!isset($_SESSION['name_of_user'])){
            $account="Log In";
            $href="signin.php";
        }

if(isset($_POST['addShelf']))
    {
          $books->addToShelf($book_id, $ip_add);
  }
    if(isset($_POST['viewShelf']))
    {

     if($membership->CheckLogin())
        {
          $membership->RedirectToURL("shelf.php");
      }
      else
        $membership->RedirectToURL("signin.php");
  }
 ?>
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Store Template, Free CSS Template, CSS Website Layout</title>
<meta name="keywords" content="" />

<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
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
    <form method="post">
    <div id="templatemo_menu">
        <p>Welcome  <span><?php  if(isset($_SESSION['name_of_user'])){
                      echo $_SESSION['name_of_user'];}?>
            <button class="buy_now_button btn" type= "submit"  name="viewShelf" 
            value="View Shelf">View Shelf</button>

        </span></p>
        </div>
    </form>
    
    <div id="templatemo_content">
        
        <div id="templatemo_content_left">
            <div class="templatemo_content_left_section">
                <h1>Categories</h1>
                <ul>
                    <li><a href="books.php?id=1">Comic</a></li>
                    <li><a href="books.php?id=2">Christian</a></li>
                    <li><a href="books.php?id=3">Crime</a></li>
                    <li><a href="books.php?id=4">Fantasy</a></li>
                    <li><a href="books.php?id=5">Fiction</a></li>
                    <li><a href="books.php?id=6">Romance</a></li>
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

    <?php
$booksFunctions = new booksFunctions();
$bookItem=$booksFunctions->getBooksById($_GET["id"]);

if (! empty($bookItem)) {
   
    if (! empty($bookItem)) {
        foreach ($bookItem as $book) {
            $book_id=$book["book_id"];
            $cat_id=$book["cat_id"];
            $book_image=$book["book_image"];
            $book_title=$book["book_title"];
            $book_author=$book["book_author"];
            $book_pages=$book["book_pages"];
            $book_date=$book["book_date"];
            $book_synopsis=$book["book_synopsis"];
            $book_desc=$book["book_desc"];
            $book_file=$book["book_file"];
        }
    }
}
?>        
        <div id="templatemo_content_right">
        	
            <h1><?php echo $book_title?> <span>(by <?php echo $book_author?> )</span></h1>
            <div class="image_panel"><img src="images/<?php echo $book_image ?>" alt="CSS Template" width="100" height="150" />
            </div>
          <!-- <h2>Read the lessons - Watch the videos - Do the exercises</h2> -->
          <div class="row">
          <div class="col">
            <ul>
	            <li>By <a href="#"><?php echo $book_author?></a></li>
            	<li>Posted on: <?php echo $book_date?></li>
                <li><?php echo $book_pages?> pages</li>
            </ul>
            </div>
            <h5><u>Description</u></h5>
                <li><?php echo $book_desc?></li>
            <form method="post">
                    <button class="buy_now_button" type= "submit"  name="addShelf" value="Add to Shelf">Add to Shelf</button>
                </form>
            <div class="col buy_now_button"><a href="images/<?php echo $book_file ?>" target="_blank" >Read</a></div>
            </div>
            

			   
             <div class="cleaner_with_height">&nbsp;</div>
             <h1><u>Synopsis</u></h1>
            
            <p style="font-size:15px;"><?php echo $book_synopsis?></p>
            
            <!-- <a href="index.php"><img src="images/templatemo_ads.jpg" alt="css template ad" /></a> -->
            
        </div> <!-- end of content right -->
    
    	<div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content -->
    
    <div id="templatemo_footer">
	       <a href="index.php">Home</a> | <a href="about.php">About</a> | <a href="uploadBooks.php">Upload books</a> |  <a href="contact.php">Contact Us</a><br />
        Copyright © 2018 <a href="#"><strong>Open Book Store</strong></a> 
         </div>  <!-- end of footer -->
<!--  Free CSS Template www.templatemo.com -->
</div> <!-- end of container -->
<!-- templatemo 086 book store -->
<!-- 
Book Store Template 
http://www.templatemo.com/preview/templatemo_086_book_store 
-->
</body>
</html>