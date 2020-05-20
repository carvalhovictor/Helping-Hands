<?php 
	require_once "db_connect.php";	
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	$msg = $request->msg;
	
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
	};

	$message_query = "INSERT INTO pm (id2, senior_id, nurse_id, message) VALUES (NULL, '$sid', '$nid', '$msg')";

	$db->query($message_query);

	$db->close();
?>