//Angular module and controller initialization
var app = angular.module("helpingHands", []);
app.controller("helpingHandsCtrl", function ($scope, $http, $filter) {
	//$scope.user = { email : '', password : ''};
	$scope.states = [];
	//$scope.nurses = [];

	$http.get('states.json').then(function(response){
		$scope.states = response.data;
	});


	$scope.submit = function(){
		var config = {
			method : 'POST',
			url : 'php/login.php',
			data : {
				'username' : $scope.user.email,
				'password' : $scope.user.password
			}
		};
		var request = $http(config);
		request.then(function(response){
			if(response.data == 2){
				window.location.href = 'inbox.php';
			}
			if(response.data == 1){
				window.location.href = 'caregivers.php';
			}
			if(response.data !== 1 || response.data !== 2){
				$scope.msg = response.data;
			}
		},function(error){
			$scope.msg = error.data;
		});
	};

	$scope.submitNurse = function(){
		var config = {
			method : 'POST',
			url : 'php/nursePartial.php',
			data : {
				'name' : $scope.nurse.fname,
				'lastname' : $scope.nurse.lname,
				'street' : $scope.nurse.street,
				'city' : $scope.nurse.city,
				'state' : $scope.nurse.state.abbreviation,
				'zipcode' : $scope.nurse.zipcode,
				'email' : $scope.nurse.email,					
				'password' : $scope.nurse.password
			}
		};
		var request = $http(config);
		request.then(function(response){
			if(response.data == 1){
				window.location.href = 'edit-nurse.php';
			}else{
				$scope.msg = response.data;
			}	
		},function(error){
			$scope.msg = error.data;
		});
	}
	
	$scope.submitSenior = function(){
		var config = {
			method : 'POST',
			url : 'php/seniorFull.php',
			data : {
				'name' : $scope.senior.fname,
				'lastname' : $scope.senior.lname,
				'street' : $scope.senior.street,
				'city' : $scope.senior.city,
				'state' : $scope.senior.state.abbreviation,
				'zipcode' : $scope.senior.zipcode,
				'email' : $scope.senior.email,					
				'password' : $scope.senior.password
			}
		};
		var request = $http(config);
		request.then(function(response){
			if(response.data == 1){
				window.location.href = 'edit-senior.php';
			}else{
				$scope.msg = response.data;
			}	
		},function(error){
			$scope.msg = error.data;
		});
	}
});

app.controller("seniorCtrl", function ($scope, $http) {
	$scope.states = [];
	$scope.senior = [];
	$http.get('states.json').then(function(response){
		$scope.states = response.data;
	});

	$http.get('php/senior.php').then(function(response){
		$scope.senior = response.data;
	});

	$scope.insertSenior = function(){
		if($scope.senior.state){
			var config = {
			method : 'POST',
			url : 'php/insertSenior.php',
			data : {
				'name' : $scope.senior.fname,
				'lastname' : $scope.senior.lname,
				'dob' : $scope.senior.dob,
				'street' : $scope.senior.street,
				'city' : $scope.senior.city,
				'state' : $scope.senior.state.abbreviation,
				'zipcode' : $scope.senior.zipcode,
				'phone' : $scope.senior.phone,
				'condition' : $scope.senior.description,
				'emergencyname' : $scope.senior.emergencyname,
				'emergencylast' : $scope.senior.emergencylast,
				'emergencyphone' : $scope.senior.emergencyphone
				}
			};
		}else{
			var config = {
			method : 'POST',
			url : 'php/insertSenior.php',
			data : {
				'name' : $scope.senior.fname,
				'lastname' : $scope.senior.lname,
				'dob' : $scope.senior.dob,
				'street' : $scope.senior.street,
				'city' : $scope.senior.city,
				'state' : '',
				'zipcode' : $scope.senior.zipcode,
				'phone' : $scope.senior.phone,
				'condition' : $scope.senior.description,
				'emergencyname' : $scope.senior.emergencyname,
				'emergencylast' : $scope.senior.emergencylast,
				'emergencyphone' : $scope.senior.emergencyphone
				}
			};	
		}

		var request = $http(config);
		request.then(function(response){
			window.location.href = 'caregivers.php';

		},function(error){
			$scope.msg = error.data;
		});
	}
});

app.controller("nurseCtrl", function ($scope, $http) {
	$scope.states = [];
	$scope.nurse = [];
	$http.get('states.json').then(function(response){
		$scope.states = response.data;
	});

	$http.get('php/nurse.php').then(function(response){
		console.log(response.data);
		$scope.nurse = response.data;
	});

	$scope.insertNurse = function(){
		if($scope.nurse.state){
			var config = {
			method : 'POST',
			url : 'php/insertNurse.php',
			data : {
				'name' : $scope.nurse.fname,
				'lastname' : $scope.nurse.lname,
				'license' : $scope.nurse.license,
				'street' : $scope.nurse.street,
				'city' : $scope.nurse.city,
				'state' : $scope.nurse.state.abbreviation,
				'zipcode' : $scope.nurse.zipcode,
				'phone' : $scope.nurse.phone,
				'skills' : $scope.nurse.skills,
				'price' : $scope.nurse.price,
				}
			};
		}else{
			var config = {
			method : 'POST',
			url : 'php/insertNurse.php',
			data : {
				'name' : $scope.nurse.fname,
				'lastname' : $scope.nurse.lname,
				'license' : $scope.nurse.license,
				'street' : $scope.nurse.street,
				'city' : $scope.nurse.city,
				'state' : '',
				'zipcode' : $scope.nurse.zipcode,
				'phone' : $scope.nurse.phone,
				'skills' : $scope.nurse.skills,
				'price' : $scope.nurse.price,
				}
			};	
		}

		var request = $http(config);
		request.then(function(response){
			if(response.data == 1){
				window.location.href = 'inbox.php';
			}
		},function(error){
			$scope.msg = error.data;
		});
	}
});

app.controller("nurseListCtrl", function($scope, $http, $filter){
	$scope.reverse = false;

	$http.get('php/nurseView.php').then(function(response){
		$scope.nurses = response.data;
	});

	$scope.orderby = function(field){
		$scope.nurses = $filter('orderBy')($scope.nurses, field, $scope.reverse);
		$scope.reverse = !$scope.reverse;
	};	
	$scope.sendMessage = function(nurse){
		var config = {
			method : 'POST',
			url : 'php/startMessage.php',
			data : {
				'nid' : nurse.nid
			}
		};
		var request = $http(config);
		request.then(function(response){
			window.location.href = 'message.php';
		},function(error){
			$scope.msg = error.data;
		});
	};

	$scope.showProfile = function(nurse){
		var config = {
			method : 'POST',
			url : 'php/startMessage.php',
			data : {
				'nid' : nurse.nid
			}
		};
		var request = $http(config);
		request.then(function(response){
			window.location.href = 'profile.php';
		},function(error){
			$scope.msg = error.data;
		});
	};
});

app.controller("inboxCtrl", function($scope, $http, $filter){
	$scope.messages = {};

	$http.get('php/message.php').then(function(response){
		$scope.messages = response.data;
	});
	$scope.showConversation = function(message){
			var config = {
				method : 'POST',
				url : 'php/locateProfile.php',
				data : {
					'nid' : message.nurse_id,
					'sid' : message.senior_id,
				}
			};
			var request = $http(config);
			request.then(function(response){
				window.location.href = 'message.php';
			},function(error){
				$scope.msg = error.data;
			});
	};

});

app.controller("messageCtrl", function($scope, $http){
	$http.get('php/nurseMessage.php').then(function(response){
		$scope.nurse = response.data;

		// getParameterByName('id');
	});
	$http.get('php/conversation.php').then(function(response){
		$scope.conversations = response.data;
	});

	$scope.sendMessage = function(){
			var config = {
			method : 'POST',
			url : 'php/insertMessage.php',
			data : {
				'msg' : $scope.message
			}
		};
		var request = $http(config);
		request.then(function(response){
			window.location.href = 'inbox.php';
		},function(error){
			$scope.msg = error.data;
		});
	};

});
/*
app.factory('seniorService', function($rootScope){
	var savedSenior = "";
	
	var setSenior = function(s){
		savedSenior = s;
		$rootScope.$emit("seniorEvent")
	};

	var getSenior = function(){
		return savedSenior;
	};

	return{
		setSenior: setSenior,
		getSenior: getSenior
	};
	
});
*/

//Ui to mask the date
app.directive("uiDate", function($filter){
	return {
		require: "ngModel",
		link: function (scope, element, attrs, ctrl){
			var _formatDate = function (date){
				date = date.replace(/[^0-9]+/g, "")
				if(date.length > 2){
					date = date.substring(0,2) + "/" + date.substring(2);
				}
				if(date.length > 5){
					date = date.substring(0,5) + "/" + date.substring(5,9);
				}
				return date;
			}
			element.bind("keyup", function(){
				ctrl.$setViewValue(_formatDate(ctrl.$viewValue));
				ctrl.$render();
			});
		}
	};
});

app.directive("uiPrice", function($filter){
	return {
		require: "ngModel",
		link: function (scope, element, attrs, ctrl){
			var _formatMoney = function (price){
				price = price.replace(/[^0-9]+/g, "")
				if(price.length > 2){
					price = price.substring(0,2) + "." + price.substring(2,4);
				}

				return price;
			}
			element.bind("keyup", function(){
				ctrl.$setViewValue(_formatMoney(ctrl.$viewValue));
				ctrl.$render();
			});
		}
	};
});

//Ui to mask the phone
app.directive("uiPhone", function(){
	return {
		require: "ngModel",
		link: function (scope, element, attrs, ctrl) {
			var _formatPhone = function (phone){
				phone = phone.replace(/[^0-9]+/g, "")
				if(phone.length > 3) {
					phone = "(" + phone.substring(0,3) + ")" + phone.substring(3);
				}
				if(phone.length > 8) {
					phone = phone.substring(0,8) + "-" + phone.substring(8,12);
				}
				return phone;
			}

			element.bind("keyup", function(){
				ctrl.$setViewValue(_formatPhone(ctrl.$viewValue));
				ctrl.$render();
			});
			
		}
	};
});

app.filter('groupBy', function(){
		return function(list, group_by) {

		var filtered = [];
		var prev_item = null;
		var group_changed = false;
		// this is a new field which is added to each item where we append "_CHANGED"
		// to indicate a field change in the list
		var new_field = group_by + '_CHANGED';

		// loop through each item in the list
		angular.forEach(list, function(item) {

			group_changed = false;

			// if not the first item
			if (prev_item !== null) {

				// check if the group by field changed
				if (prev_item[group_by] !== item[group_by]) {
					group_changed = true;
				}

			// otherwise we have the first item in the list which is new
			} else {
				group_changed = true;
			}

			// if the group changed, then add a new field to the item
			// to indicate this
			if (group_changed) {
				item[new_field] = true;
			} else {
				item[new_field] = false;
			}

			filtered.push(item);
			prev_item = item;

		});

		return filtered;
		};
	})