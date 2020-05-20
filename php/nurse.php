<?php 
	require_once "db_connect.php";
	session_start();
	
	 if(!isset($_SESSION["nid"])){
	 	$email = $_SESSION['nurse'];
		$result = $db->query("SELECT nurse.nid FROM nurse INNER JOIN email ON nurse.eid = email.id  WHERE email.email = '$email'");
		while ( $row = $result->fetch_assoc())  {
			$id = $row['nid'];
		 }
		 $_SESSION["nid"] = $id;
	 }
	
	$nid = $_SESSION["nid"];



	$resultNurse = $db->query("SELECT nurse.name AS fname, nurse.last_name AS lname, nurse.street_address AS street, nurse.city AS city, nurse.state AS selected, nurse.zip AS zipcode, nurse.phone_number AS phone, nurse.price AS price, nurse.license_number AS license, nurse.photos AS pic, description_skills.description AS skills FROM nurse INNER JOIN description_skills ON nurse.nid = description_skills.d_nid WHERE nid = '$nid'");

	if($resultNurse->num_rows == 0)
	{
		$resultNurse = $db->query("SELECT name AS fname, last_name AS lname, street_address AS street, city, state AS selected, zip AS zipcode, phone_number AS phone, price, license_number AS license, photos AS pic FROM nurse WHERE nid = '$nid'");
	}

	while ( $row = $resultNurse->fetch_assoc())  {
		$dbdata=$row;
	}

	echo json_encode($dbdata);
	$db->close();
 ?>
