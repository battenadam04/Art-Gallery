var dataApp = angular.module('Gallery',['ui.bootstrap']);


 dataApp.controller('GalCtrl', function ($scope, $http) 
 {
	
	$http.get('php/images.php').success(function(data) 
	{

     $scope.Gal = data;
			
   });

 });
