<?php 
	require_once "db_connect.php";
	session_start();
	$email = $_SESSION['senior'];
	
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	$name = $request->name; 
	$lastname = $request->lastname;
	$dob = $request->dob;
	$street = $request->street;
	$city = $request->city;
	$state = $request->state;
	$zipcode = $request->zipcode;
	$phone = $request->phone;
	$condition = $request->condition;
	$emergencyname = $request->emergencyname;
	$emergencylast = $request->emergencylast;
	$emergencyphone = $request->emergencyphone;

	
	$result = $db->query("SELECT id FROM email WHERE email = '$email'");

	while ( $row = $result->fetch_assoc())  {
		$id = $row['id'];
	}

	if($state == ""){
				$senior_query = $db->query("UPDATE senior SET name = '$name', last_name = '$lastname', date_birth = '$dob', street_address = '$street', city = '$city', zip = '$zipcode', phone_number = '$phone' WHERE eid = '$id'");
	}else{
			$senior_query = $db->query("UPDATE senior SET name = '$name', last_name = '$lastname', date_birth = '$dob', street_address = '$street', city = '$city', state = '$state', zip = '$zipcode', phone_number = '$phone' WHERE eid = '$id'");
	}


	$db->query($senior_query);

	$result2 = $db->query("SELECT sid FROM senior WHERE eid = '$id'");
	

	while ( $row = $result2->fetch_assoc())  {
		$id_senior = $row['sid'];
	}

	$description_query = "INSERT INTO description_cond (id, d_sid, description) VALUES (NULL,'$id_senior', '$condition')";
	
	$db->query($description_query);

	$emergency_query = "INSERT INTO emergency_cont (id, e_sid, name, last_name, phone_number) VALUES (NULL,'$id_senior', '$emergencyname', '$emergencylast', '$emergencyphone')";

	$db->query($emergency_query);

	echo 1;
	$db->close();
 ?>
