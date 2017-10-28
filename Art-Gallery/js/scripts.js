var dataApp = angular.module('Gallery',[]);


 dataApp.controller('GalCtrl', function ($scope, $http) 
 {
	
	$http.get('php/images.php').success(function(data) 
	{

     $scope.Gal = data;
			
   });

 });//close the jobsctrl controller function
