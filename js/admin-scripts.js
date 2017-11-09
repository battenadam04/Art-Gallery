var adminData = angular.module('adminGallery',[]);


var Callback="";
   
   function DelJobAd(ID)
   {
	  var ID=ID;
 
      var inputclicked=angular.element(this);
   
       
      var msg= confirm("Are you sure you want to remove this ad? It will be permanently deleted.");

	  if (msg == true) 
	  {
         
	     $.ajax({
		     type: "POST",
		     url: "php/deleteArt.php",
			 data: {ID:ID},
			 async: false,
			 success: function(data)
			 {
				var result =$.parseJSON(data);
				
				if(result == true)
				{
			      //alert("ad deleted");
                  Callback="true";
			    }
				       
				else
				{
				   Callback= "false";
				}
				       
				       
			 }
				   
		  });// close ajax call
				   
	    }//close if statement for if msg true
			
	  return Callback;	
	}	//close	DelJobAd function	


var DelBtn;
 adminData.controller('adminCtrl', function ($scope, $http) 
 {
	
	$http.get('php/images.php').success(function(data) 
	{

     $scope.admin = data;
 
    
     
      $scope.showDetail = function showDetail($event)
        {
			       $('.gallery, .popup').removeClass('pop');
		    $(".gallery button").show();
		    setTimeout(function(){
		      $('.popup').remove();
		    }, 100);
	      
	       //$scope.Jobs.splice(event, 1);
           var ID=angular.element($event.target).attr('id');
          
          
            DelJobAd(ID);
           
            index = $scope.admin.indexOf($event);
            
            
            if(Callback == false) 
            {
              var msg="artwork removed";
               $http.get('php/images.php').success(function(data) 
	           {

              $scope.admin = data;
               });
              
              
            }
 
            else
            {
	          $http.get('php/images.php').success(function(data) 
	           {

              $scope.admin = data;
               });
              
     
     
            }
        }//close $scope.showDetail function
			
   });

 });
