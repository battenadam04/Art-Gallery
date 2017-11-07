var adminData = angular.module('adminGallery',[]);


 adminData.controller('adminCtrl', function ($scope, $http) 
 {
	
	$http.get('php/images.php').success(function(data) 
	{

     $scope.admin = data;
			
   });

 });
