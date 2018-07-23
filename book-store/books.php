 <?php
 @ob_start();
 session_start();
 include_once("./database/DBconfigurations.php");
include_once("./functions/booksFunctions.php");
include_once("./functions/membership.php");
$membership=new Membership();
$ip_add=gethostbyname("localhost");
$books = new booksFunctions();
$cat=$_GET['cat'];
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
        if(isset($_SESSION['name_of_user']))

      // if($membership->CheckLogin())
         {
          $membership->RedirectToURL("shelf.php");
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
    <form method="post">
        <div id="templatemo_menu">
            <p> <span><?php echo $cat?>
            <a class="buy_now_button btn" href="<?php echo $href?>"><?php echo $account?></a>
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
        <div class=" row cont col-container" style="width:100%; margin-top:10px; " >
        
        <div id="product-grid">

    <?php
                

$books = new booksFunctions();

$bookItem = $books->getBooksByCatId($_GET['id']);

if (! empty($bookItem)) {
   
    if (! empty($bookItem)) {
        foreach ($bookItem as $book) {
            $book_image=$book["book_image"];
            $book_title=$book["book_title"];
            $book_author=$book["book_author"];
            $book_synopsis=$book["book_synopsis"];
            $book_id=$book["book_id"];
            $book_desc=$book["book_desc"];
?>
        
        <div class="product-item col pro;">
            <form method="POST">
            <table>
            <tr>

                <h1><?php echo $book_title?> </br> 
                <span>(by <?php echo $book_author?>)</span></h1>
            <td>
            
          <div class="image_panel"><img src="images/<?php echo $book_image ?>" alt="image" width="100" height="140" /></div>
                </td>
                <td>
                <input type="hidden" name="book" value="<?php echo $book_id ?>">
                <a class="buy_now_button" type= "submit"  name="addShelf" value="Add to Shelf"
                href="ajax.php?action=add&id=<?php echo $book_id ?>">Add to Shelf</a>
                    <div class="detail_button"><a href="synopsis.php?id=<?php echo $book_id?>">Book Synopsis</a></div>
                
                </td>
            <div class="cleaner">&nbsp;</div>
            </tr>

            </table>
            </form>
        </div>
         <?php

        }
        
    }
}
?>
       </div>
        </div>
    </div>     
            
        
    
    	<div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content -->
    
    <div id="templatemo_footer">
    
	       <a href="index.php">Home</a> | <a href="about.php">About</a> | <a href="uploadBooks.php">Upload books</a> |  <a href="contact.php">Contact Us</a><br />
        Copyright © 2018 <a href="#"><strong>Open Book Store</strong></a> 
         </div>  
    <!-- end of footer -->
<!--  Free CSS Template www.templatemo.com -->
</div> <!-- end of container -->
<!-- templatemo 086 book store -->
<!-- 
Book Store Template 
http://www.templatemo.com/preview/templatemo_086_book_store 
-->
</body>
</html>
