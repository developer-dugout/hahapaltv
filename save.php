<?php
session_start();
include("inc/config.php");
$name=$_POST['name'];
$email=$_SESSION['user'];
	
	$sql = "INSERT INTO `fav`( `email`, `videoid`) 
	VALUES ('$email','$name')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>