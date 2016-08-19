var dependencies = [];
var tikoApp = angular.module('tikoApp', dependencies);
tikoApp.controller('AngularController', 
	[ 		'$scope', '$rootScope',  '$http',
	function($scope,   $rootScope,  $http){

	$scope.errorMessage = false;
	$scope.myFunc = function(){	
		if ($scope.name == undefined || $scope.name == '') {
			$scope.errorMessage = 'post cannot be blank'
			return;
		};
		$scope.errorMessage = false;
		$http({
			url:'/user/add-post',
			method:'post',
			params: {post:$scope.name}
		}).then(function(response){
			if(response){
				$scope.errorMessage="Success!";
				$scope.name ='';
			}
		})
	}
	$scope.login = function(){
		Restangular.all('users/login').post($scope.loginData).then(function(data){
			// if(data.resource.error.no == 0){
			// 	$rootScope.currentUser = data.resource.user_data;
			// 	$state.go('dashboard');
			// } else{
			// 	$scope.loginErrorMessage = data.resource.error.text;
			// }
		});
	}
		
	$scope.makeRegistration = function(){
		Restangular.all('users/registration').post($scope.registrationData).then(function(data){
			$scope.registrationData = [];
			console.log(data);
		})
	}
}]);
