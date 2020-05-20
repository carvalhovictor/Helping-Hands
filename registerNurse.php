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
	<div class="jumbotron">
		<h3>Enter your information</h3>
	<form name="nurseForm">
		<input class="form-control" type="text" ng-model="nurse.fname" name="fname" placeholder="First Name" ng-required="true"/>
		<input class="form-control" type="text" ng-model="nurse.lname" name="lname" placeholder="Last Name" ng-required="true"/>
		<input class="form-control" type="text" ng-model="nurse.street" name="street" placeholder="Street Address" ng-required="true"/>
		<input class="form-control" type="text" ng-model="nurse.city" name="city" placeholder="City" ng-required="true"/>
        <select class="form-control" ng-model="nurse.state" ng-options="state.abbreviation for state in states" ng-required="true">
            <option value="">Select a state</option>
        </select>
		<input class="form-control" type="text" ng-model="nurse.zipcode" name="zipcode" placeholder="Zipcode" ng-required="true" ng-pattern="/^[0-9]{5}$/"/>
		<input class="form-control" type="text" ng-model="nurse.email" name="email" placeholder="Email" ng-required="true" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/"/>
		<input class="form-control" type="password" ng-model="nurse.password" placeholder="Password" ng-required="true">
	</form>
	<div ng-show="nurseForm.fname.$invalid && nurseForm.fname.$dirty" class="alert alert-danger">
		Please fill out your name!
	</div>
	<div ng-show="nurseForm.lname.$invalid && nurseForm.lname.$dirty" class="alert alert-danger">
		Please fill out your last name!
	</div>
	<div ng-show="nurseForm.street.$invalid && nurseForm.street.$dirty" class="alert alert-danger">
		Please fill out your street address!
	</div>
	<div ng-show="nurseForm.city.$invalid && nurseForm.city.$dirty" class="alert alert-danger">
		Please fill out your city!
	</div>
	<div ng-show="nurseForm.zipcode.$error.required && nurseForm.zipcode.$dirty" class="alert alert-danger">
		Please fill out your zipcode
	</div>
	<div ng-show="nurseForm.zipcode.$error.pattern" class="alert alert-danger">
		The zipcode must be in the format 99999
	</div>
	<div ng-show="nurseForm.email.$error.required && nurseForm.email.$dirty" class="alert alert-danger">
		Please fill out your e-mail!
	</div>
	<div ng-show="nurseForm.email.$error.pattern" class="alert alert-danger">
		Please enter a valid e-mail.
	</div>
		<button class="btn btn-primary btn-block" ng-disabled="nurseForm.$invalid" ng-click="submitNurse()">Register</button>
		<div style="color: red">
				{{msg}}
		</div>
	</div>            
</body>
</html>