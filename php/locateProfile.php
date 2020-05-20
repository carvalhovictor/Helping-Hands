<?php 
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	$sid = $request->sid;
	session_start();

	if(isset($_SESSION["senior"])){
		$nid = $request->nid;
		$_SESSION["nid"] = $nid;
	}else{
		$sid = $request->sid;
		$_SESSION["sid"] = $sid;
	}