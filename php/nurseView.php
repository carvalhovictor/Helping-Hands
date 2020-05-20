<?php 
	require_once "db_connect.php";	

	//$nid = $_SESSION["nid"];

	$result = $db->query("SELECT nurse.nid, nurse.name, nurse.last_name, nurse.city, nurse.state, nurse.price, nurse.photos AS pic, description_skills.description FROM nurse INNER JOIN description_skills ON nurse.nid = description_skills.d_nid");

	//Initialize array variable
	  $dbdata = array();

	//Fetch into associative array
	  while ( $row = $result->fetch_assoc())  {
		$dbdata[]=$row;
	  }

	//Print array in JSON format
	echo json_encode($dbdata);
	$db->close();
?>