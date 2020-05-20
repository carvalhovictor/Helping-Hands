<?php 
 	session_start();
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	
	
	$nid = $request->nid;
	$_SESSION["nid"] = $nid;