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
<body ng-controller="nurseCtrl">
<?php
    if(isset($_SESSION['nurse'])){
?>
    <div class="container">
        <h3>Nurse Profile</h3>
    <form name="nurseForm">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Name</label>
                <input class="form-control" type="text" ng-model="nurse.fname" name="fname" placeholder="First Name" ng-required="true"/>
            </div>
            <div class="form-group col-md-6">
                <label>Last Name</label>
                <input class="form-control" type="text" ng-model="nurse.lname" name="lname" placeholder="Last Name" ng-required="true"/>   
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>License Number</label>
                <input class="form-control" type="text" ng-model="nurse.license" name="license" placeholder="License Number" ng-required="true" ng-pattern="/^[0-9]{7}$/"/>
            </div>
            <div class="form-group col-md-6">
                <label>Phone Number</label>
                <input class="form-control" type="text" ng-model="nurse.phone" name="phone" placeholder="Phone Number" ng-required="true" ng-minlength="13" ui-phone/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Street Address</label>
                <input class="form-control" type="text" ng-model="nurse.street" name="street" placeholder="Street Address" ng-required="true"/>
            </div>
            <div class="form-group col-md-3">
                <label>City</label>
                <input class="form-control" type="text" ng-model="nurse.city" name="city" placeholder="City" ng-required="true"/>
            </div>
            <div class="form-group col-md-1">
                <label>State</label>
                <select class="form-control" ng-model="nurse.state" ng-options="state.abbreviation for state in states">
                    <option value="">{{nurse.selected}}</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label>Zip code</label>
                <input class="form-control" type="text" ng-model="nurse.zipcode" name="zipcode" placeholder="Zipcode" ng-required="true" ng-pattern="/^[0-9]{5}$/"/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-10">
                <label>In a few words describe your skills:</label>
                <textarea class="form-control" type="text" ng-model="nurse.skills" name="skills" placeholder="Skillset" ng-required="true"></textarea>
            </div>
            <div class="form-group col-md-2">
                <label>Price per Hour:</label>
                <input class="form-control" type="text" ng-model="nurse.price" name="price" placeholder="Price" ng-required="true" ui-price/>
            </div>
        </div>
    </form>
    <div ng-show="nurseForm.fname.$invalid && nurseForm.fname.$dirty" class="alert alert-danger">
        Please fill out your name!
    </div>
    <div ng-show="nurseForm.lname.$invalid && nurseForm.lname.$dirty" class="alert alert-danger">
        Please fill out your last name!
    </div>
    <div ng-show="nurseForm.license.$error.required && nurseForm.license.$dirty" class="alert alert-danger">
        Please fill out your license number!
    </div>
    <div ng-show="nurseForm.license.$error.pattern" class="alert alert-danger">
        The license number must contain only numbers and 7 characters
    </div>
    <div ng-show="nurseForm.street.$invalid && nurseForm.street.$dirty" class="alert alert-danger">
        Please fill out your street address!
    </div>
    <div ng-show="nurseForm.city.$invalid && nurseForm.city.$dirty" class="alert alert-danger">
        Please fill out your city!
    </div>
    <div ng-show="nurseForm.zipcode.$error.required && nurseForm.zipcode.$dirty" class="alert alert-danger">
        Please fill out your zipcode!
    </div>
    <div ng-show="nurseForm.zipcode.$error.pattern" class="alert alert-danger">
        The zipcode must be in the format 99999
    </div>
    <div ng-show="nurseForm.phone.$error.required && nurseForm.phone.$dirty" class="alert alert-danger">
        Please fill out your phone number!
    </div>
    <div ng-show="nurseForm.phone.$error.minlength" class="alert alert-danger">
        Please enter a valid phone number.
    </div>
    <div ng-show="nurseForm.skills.$invalid && nurseForm.condition.$dirty" class="alert alert-danger">
        Please fill out your(s) condition(s)!
    </div>
    <div ng-show="nurseForm.price.$error.required && nurseForm.price.$dirty" class="alert alert-danger">
        Please fill out your price per hour!
    </div>
        <button class="btn btn-primary btn-block" ng-disabled="nurseForm.$invalid" ng-click="insertNurse()">Register</button>
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