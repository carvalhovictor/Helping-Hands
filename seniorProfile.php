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
<body ng-controller="seniorCtrl">
<?php
	if(isset($_SESSION['senior'])){
?>
	<div class="container">
		<h3>New Senior</h3>
	<form name="seniorForm">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label>Name</label>
				<input class="form-control" type="text" ng-model="senior.fname" name="fname" placeholder="First Name" ng-required="true"/>
			</div>
			<div class="form-group col-md-6">
				<label>Last Name</label>
				<input class="form-control" type="text" ng-model="senior.lname" name="lname" placeholder="Last Name" ng-required="true"/>	
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label>Date of Birth</label>
				<input class="form-control" type="text" ng-model="senior.dob" name="dob" placeholder="Date of birth" ng-required="true" ui-date/>
			</div>
			<div class="form-group col-md-6">
				<label>Phone Number</label>
				<input class="form-control" type="text" ng-model="senior.phone" name="phone" placeholder="Phone Number" ng-required="true" ng-minlength="13" ui-phone/>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label>Street Address</label>
				<input class="form-control" type="text" ng-model="senior.street" name="street" placeholder="Street Address" ng-required="true"/>
			</div>
			<div class="form-group col-md-3">
				<label>City</label>
				<input class="form-control" type="text" ng-model="senior.city" name="city" placeholder="City" ng-required="true"/>
			</div>
			<div class="form-group col-md-1">
				<label>State</label>
				<select class="form-control" ng-model="senior.state" ng-options="state.abbreviation for state in states">
            		<option value="">{{senior.selected}}</option>
       			</select>
			</div>
			<div class="form-group col-md-2">
				<label>Zip code</label>
				<input class="form-control" type="text" ng-model="senior.zipcode" name="zipcode" placeholder="Zipcode" ng-required="true" ng-minlength="5" ng-maxlength="5"/>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<label>In a few words describe your medical condition:</label>
				<textarea class="form-control" type="text" ng-model="senior.condition" name="condition" placeholder="Description of Condition" ng-required="true"></textarea>
			</div>
		</div>
		<label>Emergency Contact Information: </label>
		<div class="form-row">
			<div class="form-group col-md-5">
				<input class="form-control" type="text" ng-model="senior.emergencyname" name="emergencyname" placeholder="Name" ng-required="true"/>
			</div>
			<div class="form-group col-md-5">
				<input class="form-control" type="text" ng-model="senior.emergencylast" name="emergencylast" placeholder="Lastname" ng-required="true"/>
			</div>
			<div class="form-group col-md-2">
				<input class="form-control" type="text" ng-model="senior.emergencyphone" name="emergencyphone" placeholder="Phone Number" ng-required="true" ng-minlength="13" ui-phone/>
			</div>
		</div>	
	</form>
	<div ng-show="seniorForm.fname.$invalid && seniorForm.fname.$dirty" class="alert alert-danger">
		Please fill out your name!
	</div>
	<div ng-show="seniorForm.lname.$invalid && seniorForm.lname.$dirty" class="alert alert-danger">
		Please fill out your last name!
	</div>
	<div ng-show="seniorForm.dob.$error.required && seniorForm.dob.$dirty" class="alert alert-danger">
		Please fill out your date of birth!
	</div>
	<div ng-show="seniorForm.dob.$error.minlength" class="alert alert-danger">
		Please enter a valid date of birth.
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
	<div ng-show="seniorForm.zipcode.$error.minlength || seniorForm.zipcode.$error.maxlength" class="alert alert-danger">
		The zipcode must be in the format 99999
	</div>
	<div ng-show="seniorForm.phone.$error.required && seniorForm.phone.$dirty" class="alert alert-danger">
		Please fill out your phone number!
	</div>
	<div ng-show="seniorForm.phone.$error.minlength" class="alert alert-danger">
		Please enter a valid phone number.
	</div>
	<div ng-show="seniorForm.email.$error.required && seniorForm.email.$dirty" class="alert alert-danger">
		Please fill out your e-mail!
	</div>
	<div ng-show="seniorForm.email.$error.pattern" class="alert alert-danger">
		Please enter a valid e-mail.
	</div>
	<div ng-show="seniorForm.condition.$invalid && seniorForm.condition.$dirty" class="alert alert-danger">
		Please fill out your(s) condition(s)!
	</div>
	<div ng-show="seniorForm.emergencyname.$invalid && seniorForm.emergency.$dirty" class="alert alert-danger">
		Please fill out your emergency contact name!
	</div>
	<div ng-show="seniorForm.emergencylast.$invalid && seniorForm.emergency.$dirty" class="alert alert-danger">
		Please fill out your emergency contact last name!
	</div>
	<div ng-show="seniorForm.emergencyphone.$invalid && seniorForm.emergency.$dirty" class="alert alert-danger">
		Please fill out your emergency contact phone number!
	</div>
	<div ng-show="seniorForm.emergencyphone.$error.minlength" class="alert alert-danger">
		Please enter a valid phone number.
	</div>
		<button class="btn btn-primary btn-block" ng-disabled="seniorForm.$invalid" ng-click="insertSenior()">Register</button>
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