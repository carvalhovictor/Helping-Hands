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
		}
		.form-control {
			margin-bottom: 5px;
		}
		button:disabled {
		  cursor: not-allowed;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.7/angular.js"></script>
	<script src="js/app.js"></script>
</head>
<body ng-controller="helpingHandsCtrl">
<?php
	if(isset($_SESSION['senior'])){
	$user = $_SESSION['senior'];
?>
	<div class="jumbotron">
		<h3>Welcome <?php echo $user; ?></h3>
	<form name="seniorForm">
		<input class="form-control" type="text" ng-model="senior.fname" name="fname" placeholder="First Name" ng-required="true"/>
		<input class="form-control" type="text" ng-model="senior.lname" name="lname" placeholder="Last Name" ng-required="true"/>
		<input class="form-control" type="text" ng-model="senior.street" name="street" placeholder="Street Address" ng-required="true"/>
		<input class="form-control" type="text" ng-model="senior.city" name="city" placeholder="City" ng-required="true"/>
        <select class="form-control" ng-model="senior.state" ng-options="state.abbreviation for state in states">
            <option value="">Select a state</option>
        </select>
		<input class="form-control" type="text" ng-model="senior.zipcode" name="zipcode" placeholder="Zipcode" ng-required="true" ng-minlength="5" ng-maxlength="5"/>
		<input class="form-control" type="text" ng-model="senior.email" name="email" placeholder="Email" ng-required="true" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/"/>
		<input class="form-control" type="password" ng-model="senior.password" placeholder="Password" ng-required="true">
	</form>
	<div ng-show="seniorForm.fname.$invalid && seniorForm.fname.$dirty" class="alert alert-danger">
		Please fill out your name!
	</div>
	<div ng-show="seniorForm.lname.$invalid && seniorForm.lname.$dirty" class="alert alert-danger">
		Please fill out your last name!
	</div>
	<div ng-show="seniorForm.street.$invalid && seniorForm.street.$dirty" class="alert alert-danger">
		Please fill out your street address!
	</div>
	<div ng-show="seniorForm.city.$invalid && seniorForm.city.$dirty" class="alert alert-danger">
		Please fill out your city!
	</div>
	<div ng-show="seniorForm.zipcode.$invalid && seniorForm.zipcode.$dirty" class="alert alert-danger">
		Please fill out your zipcode!
	</div>
	<div ng-show="seniorForm.email.$error.required && seniorForm.email.$dirty" class="alert alert-danger">
		Please fill out your e-mail!
	</div>
	<div ng-show="seniorForm.email.$error.pattern" class="alert alert-danger">
		Please enter a valid e-mail.
	</div>
		<button class="btn btn-primary btn-block" ng-disabled="seniorForm.$invalid" ng-click="submitSenior()">Register</button>
		<div style="color: red">
				{{msg}}
		</div>
	</div>
    <?php
        }else{
        	header('Location: index.php');
        }
        die();	
     ?>
            
</body>
</html>