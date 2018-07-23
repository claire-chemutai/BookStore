 <?php
 @ob_start();
 session_start();
 include_once("./database/DBconfigurations.php");
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
       <center> <p> <span>Upload Your Book Here  </span></p></center>
    </div>
<script type="text/javascript">


    function validate(myform){
        if (myform.btitle.value == "" || myform.btitle.value == null ){
            alert("Title is mandatory");
            return false;
        }
        if (myform.author.value == "" || myform.author.value == null ){
            alert("Author is mandatory");
            return false;
        }

         var regex = /^[1-9]\d*(((,\d{3}){1})?(\.\d{0,2})?)$/;
         var pagesNum=myform.pages.value;
        
        if (isNaN(pagesNum))
            alert("pages is not a number");
        

        
        if (myform.desc.value == "" || myform.desc.value == null){
            alert("Keyword is mandatory");
            return false;
        }
        

        if (myform.synopsis.value == "" || myform.synopsis.value == null){
            alert("Synopsis is mandatory");
            return false;
        }

        
        else{
            return true;
        }
        
    }

        function myFunction() {
            var img = document.getElementById("myImage");
            x.disabled = true;
}
</script>
    <div  id="templatemo_content">
        
        <form method="post" action="upload.php" name="regform" 
        enctype="multipart/form-data" onsubmit="return validate(regform)">
        <div class="container">
        
        
        
        <div class="row ">
                <input type="hidden" name="date" value="<?php echo date("Y-m-d")?>" size="40">
            </div>
            <div class="row item">
                <label>Book Title </label><br>
                <input type="text" name="btitle" size="40">
            </div>

            <div class="row item">
                <label>Category</label><br>
                <select  name="cat" ><?php include 'loadCategories.php' ;?></select>
            </div>
            
            <div class="row item">
                <label>Author </label><br>
                <input type="text" name="author" size="40">
            </div>

            

            <div class="row item">
                <label>Pages</label><br>
                <input type="number" value="1" maxLength="10" name="pages" size="40">
            </div>
            
            <div class="row item">
                <label>Description</label><br>
                <textarea rows="2" cols="40" name="desc" ></textarea>
            </div>

            <div class="row item">
                <label>Synopsis</label><br>
                <textarea rows="5" cols="40" name="synopsis" ></textarea>
            </div>

            <div class="row item">
                <label>Image</label><br>
                <input type="file" name="imageToUpload" id="imageToUpload">
            
            
                </div>
            <div class="row item">
                <label> Book</label><br>
                <input type="file" name="fileToUpload" id="fileToUpload">
           </div>
            
                <input type="submit" class="buy_now_button " value="Upload Book" name="submit">
                
                 
                 </div>
                </form>
                
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
