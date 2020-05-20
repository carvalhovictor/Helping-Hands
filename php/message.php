<?php 
	require_once "db_connect.php";	
	session_start();


	if(isset($_SESSION['senior'])){
		$email = $_SESSION['senior'];

		$result = $db->query("SELECT senior.sid FROM senior INNER JOIN email ON senior.eid = email.id WHERE email = '$email'");	


		while ( $row = $result->fetch_assoc())  {
			$sid = $row['sid'];
		 }

		$result = $db->query("SELECT pm.message, pm.nurse_id, nurse.name as fname, nurse.last_name as lname, nurse.photos AS pic FROM pm INNER JOIN nurse ON pm.nurse_id = nurse.nid WHERE pm.senior_id = '$sid'");
	}else{
		$email = $_SESSION['nurse'];

		$result = $db->query("SELECT nurse.nid FROM nurse INNER JOIN email ON nurse.eid = email.id WHERE email = '$email'");	


		while ( $row = $result->fetch_assoc())  {
			$nid = $row['nid'];
		 }


		$result = $db->query("SELECT pm.message, pm.senior_id, senior.name as fname, senior.last_name as lname FROM pm INNER JOIN senior ON pm.senior_id = senior.sid WHERE pm.nurse_id = '$nid'");
	}

	if ($result->num_rows == 0){
		echo "No messages";
	}else{
		while ( $row = $result->fetch_assoc())  {
			$dbdata[]=$row;
	 	}

		echo json_encode($dbdata);
	}



	$db->close();
 ?>