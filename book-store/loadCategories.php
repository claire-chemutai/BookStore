<?php

		
 include_once("./database/DBconfigurations.php");


	// Create connection
			$conn = mysqli_connect(MYSQLSERVER, MYSQLUSER, MYSQLPASSWORD, MYSQLDB);
	// Check connection
			if (!$conn) {
				die("Connection failed: ".mysqli_connect_error());
			}


			$sql = "SELECT * FROM categories";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					
						$id = $row['cat_id'];
                  		$name = $row['category']; 
                  		echo '<option value="'.$id.'">'.$name.'</option>';
                  
			}
     				
			 	} else {
  	 			  echo "0 results";
			 }


			$conn->close();


			?>