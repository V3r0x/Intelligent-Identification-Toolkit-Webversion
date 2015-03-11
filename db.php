	<?php
	
	$dbname = "";
	$user = "";
	$password = "";
	$host = "localhost";
	$GLOBALS["con"] = mysqli_connect($host,$user,$password,$dbname) or die("Error establishing MYSQL Connection");