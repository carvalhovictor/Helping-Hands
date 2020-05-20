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
    if(isset($_SESSION['senior'])){
?>
    <div class="container">
        <h3>Nurse Profile</h3>
    <form name="nurseForm">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Name</label>
                <input class="form-control" type="text" readonly placeholder="{{nurse.fname}}"/>
            </div>
            <div class="form-group col-md-6">
                <label>Last Name</label>
                <input class="form-control" type="text" readonly placeholder="{{nurse.lname}}"/>   
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Phone Number</label>
                <input class="form-control" type="text" readonly placeholder="{{nurse.phone}}"/>
            </div>
            <div class="form-group col-md-3">
                <label>Price</label>
                <input class="form-control" type="text" readonly placeholder="{{nurse.price}}"/>
            </div>
            <div class="form-group col-md-3">
                <label>City</label>
                <input class="form-control" readonly type="text" placeholder="{{nurse.city}}"/>
            </div>
            <div class="form-group col-md-1">
                <label>State</label>
				<input class="form-control" readonly type="text" placeholder="{{nurse.selected}}"/>
            </div>
            <div class="form-group col-md-2">
                <label>Zip code</label>
                <input class="form-control" type="text" readonly name="zipcode" placeholder="{{nurse.zipcode}}"/>
            </div>
        </div>
    </form>
        <button class="btn btn-primary btn-block" onclick="window.location.href = 'inbox.php';">Return</button>
    </div>
    <?php
        }else{
            header('Location: index.php');
        }
        die();  
     ?>
</body>
</html>