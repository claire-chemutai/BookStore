

<?php
@ob_start();
 //define variables and set to empty values
 $cat = $date =$title = $author = $desc = $fileName =$synopsis=$pages= " ";

 function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 	$cat = test_input($_POST["cat"]);
 	$date = test_input($_POST["date"]);
	$title = test_input($_POST["btitle"]);
	$author = test_input($_POST["author"]);
	$desc = test_input($_POST["desc"]);
	$synopsis = test_input($_POST["synopsis"]);
	$pages = test_input($_POST["pages"]);
	// $fileName = test_input($_POST["fileToUpload"]);

}


 include_once("./database/DBconfigurations.php");
		
	 		$conn = mysqli_connect(MYSQLSERVER, MYSQLUSER, MYSQLPASSWORD, MYSQLDB);
		
				if (!$conn) {
		 			die("Connection failed: ".mysqli_connect_error());
				} 


		$target_dir = "images/";
		$imageName=$_FILES["imageToUpload"]["name"];
		$fileName=$_FILES["fileToUpload"]["name"];
		$target_file = $target_dir.basename($_FILES["imageToUpload"]["name"]);
		$target_folder = $target_dir.basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$fileType = strtolower(pathinfo($target_folder,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
		    if($check !== false) {
		        // echo "File is an image-".$check["mime"].".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		    
		// Check file size
		if ($_FILES["imageToUpload"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}


		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		    
    

          // Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
    		echo "Sorry, your file was not uploaded.";  
    		}

    		else { 
        
		

//query
			$sql = "INSERT INTO books (cat_id, book_image, book_title, book_author, book_pages, book_date, book_synopsis, book_desc,book_file)
	 		VALUES ('$cat','$imageName','$title','$author','$pages', '$date','$synopsis','$desc','$fileName')";
	 		if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
		    } else {
		        echo "Sorry, there was an error uploading your image.";
		    }
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_folder)) {
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
	 	}
 		 //executing query
 		if (mysqli_query($conn, $sql)) {
    		// echo "Database created successfully";
    		include 'uploadBooks.php';
		} else {
    		echo "Error creating database: " . mysqli_error($conn);
		}

	mysqli_close($conn);
	
    


?>