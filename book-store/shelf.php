 <?php
 @ob_start();
 session_start();
 include_once("./database/DBconfigurations.php");
include_once("./functions/booksFunctions.php");
include_once("./functions/membership.php");
$ip_add=gethostbyname("localhost");
$membership=new Membership();
$books = new booksFunctions();
$ip_add=gethostbyname("localhost");
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

     if($membership->CheckLogin())
        {
          $membership->RedirectToURL("index.php");
      }
      else
        $membership->RedirectToURL("signin.php");
  }
  if(isset($_POST['emptyShelf']))
    {
        $books->emptyShelf($ip_add);
  }
  if(isset($_POST['delete']))
    {
        $books->deleteShelfItem($_REQUEST['deleteBook']);
  }
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
    <div id="templatemo_menu">
    <p>Welcome  <span><?php  if(isset($_SESSION['name_of_user'])){
                      echo $_SESSION['name_of_user'];}?>
                      <form method="post">

                       <button class="buy_now_button btn" type= "submit"  name="emptyShelf" value="Empty Shelf">Empty Shelf</button>
                       </form>
    
                    
                 
                    
                    </span></p>
    </div>
    
    <div id="templatemo_content">
<table cellspacing="20">
        <tr>
                <th>Image</th>
                <th>Book</th>
                <th>Read</th>
                <th>Remove</th>
        </tr>
            

    <?php
                


$booksFunctions = new booksFunctions();
$bookItem=$booksFunctions->getShelfitemByBook();

if (! empty($bookItem)) {
   
    // if (! empty($bookItem)) {
        foreach ($bookItem as $book) {
            $book_id=$book["book_id"];
             // $cat_id=$book["cat_id"];
            $book_image=$book["book_image"];
            $book_title=$book["book_title"];
            $book_author=$book["book_author"];
             // $book_pages=$book["book_pages"];
             // $book_date=$book["book_date"];
             // $book_synopsis=$book["book_synopsis"];
             // $book_desc=$book["book_desc"];
            $book_file=$book["book_file"];
        
?>        
            <tr>
                <td><img src="images/<?php echo $book_image ?>" alt="CSS Template" 
                width="100" height="150" /></td>
                <td><?php echo $book_title?> </br>
                <span>(by <?php echo $book_author?> )</span></td>
                
                <td>
                    <div class="col buy_now_button"><a href="images/<?php echo $book_file ?>" target="_blank" >Read</a></div>
                </td>
                <td>
                <form method="post">
                <input type="hidden" name="deleteBook" value="<?php $book_id ?>">

                    <a class="buy_now_button"  href="ajax.php?action=remove&id=<?php echo $book_id?>">Remove</a>
                    </form>
                </td>
            </tr>
        <?php 
        }
}
    
?>
        </table>
            
    
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