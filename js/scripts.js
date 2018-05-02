var dataApp = angular.module('Gallery',[]);


 dataApp.controller('GalCtrl', function ($scope, $http) 
 {
	
	$http.get('php/images.php').success(function(data) 
	{
     $scope.Gal = data;		
   });

 });



 dataApp.controller('BioCtrl', function ($scope, $http) 
 {
	
	$http.get('php/profile.php').success(function(data) 
	{
     $scope.Bio = data;		
   });

 });
