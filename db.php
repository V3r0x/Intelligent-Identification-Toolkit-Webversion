	<?php
	
	$dbname = "products_db";
	$user = "root";
	$password = "";
	$host = "localhost";
	$GLOBALS["con"] = mysqli_connect($host,$user,$password,$dbname) or die("Error establishing MYSQL Connection");