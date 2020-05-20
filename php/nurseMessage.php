<?php 
	require_once "db_connect.php";	

	session_start();
	$nid = $_SESSION["nid"];
	$result = $db->query("SELECT name as fname, last_name as lname FROM nurse WHERE nid='$nid'");


	while ( $row = $result->fetch_assoc())  {
		$dbdata=$row;
	}

	echo json_encode($dbdata);
	$db->close();
?>