<?php 

include_once("./database/DBconfigurations.php");
include_once("./functions/booksFunctions.php");
$ip_add=gethostbyname("localhost");
$books = new booksFunctions();
$action = strip_tags($_GET["action"]);

switch ($action) {
		
		
		case "remove":
			$books->deleteShelfItem($_GET["id"]);
			break;

		case "add":
			$books->addToShelf($_GET["id"],$ip_add );
			break;
	}

 ?>