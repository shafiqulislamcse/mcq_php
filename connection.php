<?php 

	$local ="localhost";
	$user="root";
	$pass="";
	$db="mcq";

	$conn = mysqli_connect($local,$user,$pass,$db);
	if (!$conn) {
		die("connection Failed:". mysqli_connect_error());
	}
 ?>