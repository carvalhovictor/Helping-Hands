<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" ng-app="helpingHands">
<head>
	<meta charset="UTF-8">
	<title>Inbox</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <style>
        .container {
            width: 400px;
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

        .negrito{
        	font-weight: bold;
        }
    </style>
</head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.7/angular.js"></script>
    <script src="js/app.js"></script>
<body ng-controller="inboxCtrl">
    {{messages}}
	<div class="container" ng-repeat="message in messages track by $index">
		<div>
            <img ng-src="images/{{message.pic}}">
			<div class="form-row negrito"><a href ng-click="showConversation(message)">{{message.fname}} {{message.lname}}</a></div>
			<div class="form-row">{{message.message}}</div>
		</div>
	</div>
    <?php var_dump($_SESSION); ?>
</body>
</html>