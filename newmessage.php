<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" ng-app="helpingHands">
<head>
	<meta charset="UTF-8">
	<title>Helping Hands</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		.jumbotron {
			width: 400px;
			text-align: center;
			margin-top: 20px;
			margin-left: auto;
			margin-right: auto;
		}
		h3 {
			margin-bottom: 30px;
			text-align: center;
		}
		button:disabled {
		  cursor: not-allowed;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.7/angular.js"></script>
	<script src="js/app.js"></script>
</head>
<body ng-controller="messageCtrl">
<?php
	if(!isset($_SESSION['senior']) && !isset($_SESSION['nurse'])){
		echo '<script type="text/javascript">';
		echo 'window.location.replace("/");';
		echo '</script>';
	}
?>
	<div class="container">
		<div ng-repeat="conversation in conversations track by $index">
			<div class="form-row">{{conversation.message}}</div>
		</div>
		<h3>New message</h3>	
	<form name="messageForm">
		<label>Send message to {{nurse.fname}} {{nurse.lname}}</label>
		<textarea class="form-control" type="text" ng-model="message" name="message" placeholder="Insert message here" ng-required="true"></textarea>
	</form>
	<button class="btn btn-primary btn-block" ng-disabled="messageForm.$invalid" ng-click="sendMessage()">Send Message</button>
</body>
<?php var_dump($_SESSION); ?>
</html>