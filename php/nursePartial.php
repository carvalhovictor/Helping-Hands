<?php 
	require_once "db_connect.php";
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	$name = $request->name;
	$lastname = $request->lastname;
	$street = $request->street;
	$city = $request->city;
	$state = $request->state;
	$zipcode = $request->zipcode;
	$email = $request->email;
	$password = $request->password;


	$salt1 = "qm&h*";
	$salt2 = "pg!@";
	$token = hash('ripemd128', "$salt1$password$salt2");

	$resultEmail = $db->query("SELECT email FROM email WHERE email = '$email'");

	if($resultEmail->num_rows > 0){
		echo "This email is already registered";
	}else{
		$key = md5(microtime().rand());
		$key2 = md5(microtime().rand());
		$user_query = "INSERT INTO email (id, email, password) VALUES ('$key', '$email', '$token')";

		$nurse_query = "INSERT INTO nurse (nid, name, last_name, street_address, city, state, zip, phone_number, price, license_number, eid) 
		VALUES ('$key2','$name','$lastname','$street','$city','$state','$zipcode',NULL,NULL,NULL,'$key')";
		$db->query($user_query);
		$db->query($nurse_query);
		session_start();
		$_SESSION['nurse'] = $email;
		echo 1;
	}

	$db->close();
 ?>