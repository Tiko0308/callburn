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
			url:'/post/add-post',
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

tikoApp.controller('PostController',
	[ 		'$scope', '$rootScope',  '$http',
function($scope,   $rootScope,  $http){

	$scope.user = false;
	$scope.post = false;
	$scope.deleteUser = function(id)
	{ 	
		$scope.user = true;
		$scope.post = false;
	 	$scope.user_id=id
	}
	$scope.deletePost = function(id)
	{
	 	$scope.user = false;
		$scope.post = true;
	 	$scope.post_id=id
	}
	$scope.deleteFunc=function()
	{
		$http({
			url:'/user/delete-user',
			method:'post',
			params:{id:$scope.user_id}
		}).then(function(response){
			$('#deleteModal').modal('toggle')
			if(response){
		}
	  })
	}

	$scope.MyFunc=function()
	{
		$http({
			url:'/post/delete-post',
			method:'post',
			params:{id:$scope.post_id}
		}).then(function(response){
			$('#deleteModal').modal('toggle');
			if(response){
			}
	  })
	}
}]);
