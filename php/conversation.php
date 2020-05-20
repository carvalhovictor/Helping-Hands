<?php 
	require_once "db_connect.php";	
	session_start();


	if(isset($_SESSION['senior'])){
		$email = $_SESSION['senior'];

		$result = $db->query("SELECT senior.sid FROM senior INNER JOIN email ON senior.eid = email.id WHERE email = '$email'");	

		while ( $row = $result->fetch_assoc())  {
			$sid = $row['sid'];
		 }
		 $nid = $_SESSION['nid'];

	}else{
		$email = $_SESSION['nurse'];

		$result = $db->query("SELECT nurse.nid FROM nurse INNER JOIN email ON nurse.eid = email.id WHERE email = '$email'");

		while ( $row = $result->fetch_assoc())  {
			$nid = $row['nid'];
		 }
		 $sid = $_SESSION['sid'];
	}

	$result = $db->query("SELECT message FROM pm WHERE senior_id = '$sid' and nurse_id = '$nid'");

	while ( $row = $result->fetch_assoc())  {
		$dbdata[]=$row;
	 }

	echo json_encode($dbdata);
	$db->close();
 ?>