var adminData = angular.module('adminGallery',['ngFileUpload','ngImgCrop']);



 adminData.controller('MyCtrl', ['$scope', 'Upload', '$timeout', function ($scope, Upload, $timeout) {
	 

	   var validate="noFile";
	 
	 
	   //this will tell you when the angular generated button has uploaded a file and use this to ensure blank file is not created on submit
	   $scope.validate=function($this)
	   {
		 validate="newFile";
	    }
	 
          $scope.reset=function($this)
          {

                validate="nofile";
	      }
        $scope.upload = function (dataUrl) {

	    var newform=new FormData();
	    var blob=Upload.dataUrltoBlob(dataUrl);
	     newform.append('File',blob);
	     
	     if(validate == "newFile")
	     {
		    
	         $.ajax({
              url :  "php/bio-upload.php",
              type: 'POST',
              data: newform,
              contentType: false,
              processData: false,
              beforeSend: function()
              {
                $('#divData').html('loading...');
              },
              
              success: function(data) 
              {
	        
	            if(data == "true")
	            {
                 var myEl = angular.element(document.querySelector('#divData'));
		         myEl.html('Image has been uploaded');
		         
		         $("#updatetxt").css("background","#333D51");
		         
		         //angular.element("#ImgCrop").html = "";
		         
		         setTimeout(function()
                   {
                     myEl.html('upload');  $("#updatetxt").css("background","");  
                   },2000);
                   
                     $(".cropArea").empty();
	             $("#newImg").empty();
	             validate="nofile";
               
	        }
	        
	        else
	        { 
		      alert("no image selected");
	        }
	       
        },    
        error: function() {
          alert("not so boa!");
        }
      });
      }
      
      else
      {
	      	$("#updatetxt").html("upload Failed");
					$("#updatetxt").css("background", "red");
					$("#divData").css("color", "white");
					setTimeout(function() {
						$("#updatetxt").html("upload");
						$("#updatetxt").css("background", "");
						$("#updatetxt").css("color", "");
					}, 2000);
      }
	     
    }
}]);
  
  
var Callback="";
var imgCall="";

   
   function DelJobAd(ID,Src)
   {
	  
	  var ID=ID;
	  var Src=Src;
	
      var inputclicked=angular.element(this);
      var msg= confirm("Are you sure you want to remove this ad? It will be permanently deleted.");

	  if (msg == true) 
	  {
         
	     $.ajax({
		     type: "POST",
		     url: "php/deleteArt.php",
			 data: {ID:ID,Src:Src},
			 async: false,
			 success: function(data)
			 {
				var result =$.parseJSON(data);
				
				if(result == true)
				{
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
	
	
	function addImage()
	{		
		var form = $('form').get(1); 
	     
		$.ajax({
		    type: "POST",
		    url: "php/upload.php",
			data:new FormData(form), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            async: false,
            beforeSend: function()
            {
             $('#submitArt').html('loading...');
            },
            success: function(data)
		    {
			    var status = $.parseJSON(data);
				
				if(status == "true")
				{
			      imgCall = "true";
				}
					
			    else
			    {
				  imgCall = "false";
				
				  
			    }

			},
				
			cache: false,
			contentType: false,
			processData: false
		 });//close ajax call
      return imgCall;// return imgCall value and make sure async- false to allow this being returned
	}


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

            var ID=angular.element($event.target).attr('id');
             var Src=angular.element($event.target).attr('name');
             
             var backone="../";
             
             Src= backone + Src;
           

            DelJobAd(ID,Src);
           
            index = $scope.admin.indexOf($event);
            
            // if a deletion has occured then reload the angular scope to update UI without reloading page
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
        
        
        $scope.showImg = function showImg($event)
        {
	         
			
	        addImage();
              
           // if a new image has been uploaded then reload the angular scope to update UI without reloading page   
           if(imgCall == "true") 
            {
	       
               $http.get('php/images.php').success(function(data) 
	           {
                  $scope.admin = data;
               });
               
                $("#submitArt").html("Advert has been added, please check below.");
                $("#submitArt").css("background","#333D51");
				setInterval(function(){  $("#submitArt").html("Add"); $("#submitArt").css("background",""); }, 3000);
			    document.getElementById("ImageArt").value = "";
            }
 
            else
            {
	          $http.get('php/images.php').success(function(data) 
	           {
                  $scope.admin = data;
               });
               
               document.getElementById("ImageArt").value = "";
               
                 $("#submitArt").html("update Failed");
                 $("#submitArt").css("background","red");
                 $("#submitArt").css("color","white");

                  setTimeout(function()
                      {
                        $("#submitArt").html("Update");
                           $("#submitArt").css("background","");
                           $("#submitArt").css("color","");
                          
                      },2000);
            }
            
        }//close $scope.showImg function
			
   });

 });



