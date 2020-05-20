<?php 
	require_once "db_connect.php";
	session_start();
	$email = $_SESSION['nurse'];
	
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	$name = $request->name; 
	$lastname = $request->lastname;
	$license = $request->license;
	$street = $request->street;
	$city = $request->city;
	$state = $request->state;
	$zipcode = $request->zipcode;
	$phone = $request->phone;
	$price = $request->price;
	$skills = $request->skills;


	$result = $db->query("SELECT id FROM email WHERE email = '$email'");
	

	while ( $row = $result->fetch_assoc())  {
		$id = $row['id'];
	}

	if($state == ""){
		$nurse_query = $db->query("UPDATE nurse SET name = '$name', last_name = '$lastname', street_address = '$street', city = '$city', zip = '$zipcode', phone_number = '$phone', price = '$price', license_number = '$license' WHERE eid = '$id'");
	}else{
		$nurse_query = $db->query("UPDATE nurse SET name = '$name', last_name = '$lastname', street_address = '$street', city = '$city', state = '$state', zip = '$zipcode', phone_number = '$phone', price = '$price', license_number = '$license' WHERE eid = '$id'");	
	}


	$db->query($nurse_query);

	$result2 = $db->query("SELECT nid FROM nurse WHERE eid = '$id'");
	

	while ( $row = $result2->fetch_assoc())  {
		$id_nurse = $row['nid'];
	}

	$description_query = "INSERT INTO description_skills (id, d_nid, description) VALUES (NULL,'$id_nurse', '$skills')";
	
	$db->query($description_query);

	echo 1;
	$db->close();
 ?>
