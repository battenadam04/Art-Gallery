$("document").ready(function ()
{

	
	$("#logIn").submit(function(event)
	{
	
	    var formData = new FormData($(this)[0]);

		$.ajax({
			url:"php/login.php",
			type: "POST",
			data: formData,
			async: false,
			success: function(data)
			{
			   var result =JSON.parse(data)[0];
					
               if(result == "Success")
			   {
				window.location.replace("admin-area.php"); 
			   }
					
			   else
			   {
				  $("#logIn")[0].reset();// reset form input fields
				  $("#login-Ex").addClass('fail');
                  $("#login-Ex").val('Login Failed');
			  
			      setTimeout(function()
                  {
                    $("#login-Ex").removeClass("fail");
                    $("#login-Ex").val("Go");
                  },2000);
			    }
			},	
			cache: false,
			contentType: false,
			processData: false	
		});//close the ajax call
			
		return false;
	});//close the #logIn submit function
});//close the document ready function