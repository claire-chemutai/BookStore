<?php
require_once ("./database/databaseControl.php");
require_once("formvalidator.php");


class booksFunctions extends databaseControl
{
    function addToShelf($b_id,$ip_add )
    {
        $query = "INSERT into shelf (book_id, ip_add) VALUES (?, ?)";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $b_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $ip_add 
            )
        );
        
        $this->updateDB($query, $params);
        echo '<script>window.location="index.php"</script>';
    }
    function contact($name,$email,$subject,$message )
    {
       $query = "INSERT into contact (name, email, subject, message) VALUES (?, ?,?, ?)";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $name
            ),
            array(
                "param_type" => "s",
                "param_value" => $email 
            ),
            array(
                "param_type" => "s",
                "param_value" => $subject
            ),
            array(
                "param_type" => "s",
                "param_value" => $message 
            )
        );
        
        $this->updateDB($query, $params);
         echo '<script>window.location="contact.php"</script>';
    
    }

    function getAllBooks()
    {
        $query = "SELECT * FROM books";
        
        $bookResult = $this->getDBResult($query);
        return $bookResult;
    }
    function getBooksById($id)
    {
        $query = "SELECT * FROM books WHERE book_id=?";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $id
            )
        );
        $bookResult = $this->getDBResult($query, $params);
        return $bookResult;
    }
    
    function getBooksByCatId($id)
    {
        $query = "SELECT * FROM books WHERE cat_id=?";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $id
            )
        );
        $bookResult = $this->getDBResult($query, $params);
        return $bookResult;
    }
    function getShelf($ip_add)
    {
        $query = "SELECT * FROM shelf WHERE ip_add=?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $ip_add
            )
        );
        $bookResult = $this->getDBResult($query, $params);
        return $bookResult;
    }
    function getShelfitemByBook()
    {
          // $query = "SELECT books.*,  shelf.book_id AS book_id  from books, shelf where shelf.ip_add = ?";
         $query = "SELECT shelf.book_id, books.book_id, books.book_image, books.book_author, books.book_title, books.book_file 
         from books, shelf where shelf.book_id=books.book_id";
         
       
        
        $bookResult = $this->getDBResult($query);
        return $bookResult;
    // }
        
    //     $params = array(
    //         array(
    //             "param_type" => "i",
    //             "param_value" => $ip_add
    //         )

    //     );
        

        
    //     $cartResult = $this->getDBResult($query,$params);

    //     return $cartResult;
    }



    function loadCategories()

    {

        $query = "SELECT * FROM categories";
        $result = $this->getDBResult($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row['cat_id'];
                $name = $row['category']; 
                echo '<option value="'.$id.'">'.$name.'</option>';
            }
    }
}

    function getProductById($p_id)
    {
        $query = "SELECT * FROM products WHERE product_id=?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $p_id
            )
        );
        
        $productResult = $this->getDBResult($query, $params);
        return $productResult;
    }

     function getCartItemByProduct($p_id, $ip_add)
    {
        $query = "SELECT * FROM cart WHERE p_id = ? AND ip_add = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $p_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $ip_add
            )
        );
        
        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }

    

    function deleteShelfItem($p_id)
    {
        $query = "DELETE FROM shelf WHERE book_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $p_id
            )
        );
        
        $this->updateDB($query, $params);
         echo '<script>window.location="shelf.php"</script>';
    }

    function emptyShelf($ip_add)
    {
        $query = "DELETE FROM shelf WHERE ip_add = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $ip_add
            )
        );
        
        $this->updateDB($query, $params);
        
         echo '<script>window.location="shelf.php"</script>';
    }



    
    
        

}


?>