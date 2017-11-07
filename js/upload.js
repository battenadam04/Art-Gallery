$(document).ready(function()
{
	

$('#submitArt').click(function(e){
		

	 e.preventDefault();
	 var form = $('form').get(0); 
	
		$.ajax({
		    type: "POST",
		    url: "php/upload.php",
			data:new FormData(form), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,
            success: function(data)
		    {
			    var status = $.parseJSON(data);
				
				
				if(status == "true")
				{
				  $("#submitArt").val("Advert has been added, please refresh page.");
				  setInterval(function(){   $("#submitArt").val("Add"); }, 3000);
			      $('#New-Art-Form')[0].reset();
				}
					
			    else
			    {
			      $(".commErrors").empty();
				 
				  var i=0;
			
				  for(i=0; i < status.length; i++)
				  {
				    $(".commErrors").show();
				    $(".commErrors").append("<h4>"+ status[i] +"</h4>");
			      }
			    }

			}
	
		 });//close ajax call
		 
	});//close #submitAdd2 click function


});	//close document ready function	