<?php 
	require_once "db_connect.php";

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	$username = $request->username;
	$password = $request->password;


	$salt1 = "qm&h*";
	$salt2 = "pg!@";
	$token = hash('ripemd128', "$salt1$password$salt2");

	$resultSenior = $db->query("SELECT email.id, email.email, email.password, senior.name, senior.last_name FROM email INNER JOIN senior on email.id = senior.eid WHERE email.email = '$username' and email.password = '$token'");
	$resultNurse = $db->query("SELECT email.id, email.email, email.password, nurse.name, nurse.last_name, nurse.photos FROM email INNER JOIN nurse on email.id = nurse.eid WHERE email.email = '$username' and email.password = '$token'");	


	if ($resultNurse->num_rows == 0 && $resultSenior->num_rows == 0){
		echo 'Invalid username/password';
	}else{
		session_start();
		if($resultSenior->num_rows > 0){
		while ( $row = $resultSenior->fetch_assoc())  {
			$_SESSION['name'] = $row['name'];
			$_SESSION['lname'] = $row['last_name'];
		 }
			$_SESSION['senior'] = $username;
			$_SESSION['email'] = $username;
			echo 1;
		}else{
			while ( $row = $resultNurse->fetch_assoc())  {
			$_SESSION['name'] = $row['name'];
			$_SESSION['lname'] = $row['last_name'];
			$_SESSION['pic'] = $row['photos'];
		 }
			$_SESSION['nurse'] = $username;
			$_SESSION['email'] = $username;
			echo 2;
		}
	}
	


	$db->close();
 ?>	
