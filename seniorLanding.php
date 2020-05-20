<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en" ng-app="helpingHands">
<head>
	<meta charset="UTF-8">
	<title>Choose a Nurse</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.7/angular.js"></script>
	<script src="js/app.js"></script>
</head>
<body ng-controller="nurseListCtrl">
	<div class="container">
		<div class="card card-body bg-light">
			<input type="text" class="form-control" ng-model="searchTerm" placeholder="Filter people list">
		</div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th><a href ng-click="orderby('name')">Name</a></th>
						<th><a href ng-click="orderby('city')">City</a></th>
						<th>State</th>
						<th><a href ng-click="orderby('city')">Price</a></th>
						<th>Skillset</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="nurse in nurses | filter:searchTerm">
						<td><a href ng-click="showProfile(nurse)">{{nurse.name}} {{nurse.last_name}}</a></td>
						<td>{{nurse.city}}</td>
						<td>{{nurse.state}}</td>
						<td>{{nurse.price}}</td>					
						<td>{{nurse.description}}</td>
						<td>
							<button ng-click="sendMessage(nurse)" class="btn btn-primary btn-block">Message	</button>
						</td>
					</tr>
				</tbody>
			</table>
			<div>{{msg}}</div>
	</div>
	{{nurses}}
	<?php var_dump($_SESSION); ?>
</body>
</html>