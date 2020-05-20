<?php 
	require_once "db_connect.php";
	session_start();

	if(!isset($_SESSION["sid"])){
	 	$email = $_SESSION['senior'];
		$result = $db->query("SELECT senior.sid FROM senior INNER JOIN email ON senior.eid = email.id  WHERE email.email = '$email'");
		while ( $row = $result->fetch_assoc())  {
			$id = $row['sid'];
		 }
		 $_SESSION["sid"] = $id;
	 }

	 $sid = $_SESSION["sid"];

	$resultSenior = $db->query("SELECT senior.name AS fname, senior.last_name AS lname, senior.date_birth AS dob, senior.street_address AS street, senior.city AS city, senior.state AS selected, senior.zip AS zipcode, senior.phone_number AS phone, description_cond.description AS description, emergency_cont.name AS emergencyname, emergency_cont.last_name AS emergencylast, emergency_cont.phone_number AS emergencyphone FROM senior INNER JOIN description_cond ON senior.sid = description_cond.d_sid INNER JOIN emergency_cont ON senior.sid = emergency_cont.e_sid WHERE senior.sid = '$sid'");



	if($resultSenior->num_rows == 0)
	{
		$resultSenior = $db->query("SELECT name AS fname, last_name AS lname, street_address AS street, city, state AS selected, zip AS zipcode FROM senior WHERE sid = '$sid'");
	}

	while ( $row = $resultSenior->fetch_assoc())  {
		$dbdata=$row;
	}

	echo json_encode($dbdata);
	$db->close();
 ?>
