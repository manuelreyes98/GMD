<?php
	
$servername = "localhost";
	
$database = "id13283997_gmd";
	
$username = "id13283997_root";
	
$password = "shZ2W!klIih{VSaW";
	
	
$conn = mysqli_connect($servername, $username, $password, $database);

	
if (!$conn) {
      
die("Connection failed: ".mysqli_connect_error());	

}

?>