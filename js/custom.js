$(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: ".navbar", offset: 50});   

  // Add smooth scrolling on all links inside the navbar
  $("#myNavbar a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });
  
  
  
  
    $(".Art-Info").click(function(e) {
  
  $('.gallery, .popup').removeClass('pop');
		    $(".gallery button").show();
		    setTimeout(function(){
		      $('.popup').remove();
		    }, 100);
  
   });
   
   
   
    $(".hiddendiv").hide();
    
      
  	  $("#message_cancel").click(function(e)
  	   {
  	      $(".messagepop").css("display","none");
  	      $(".hiddendiv").css("display","none");
  	   });
  	     
  	   $(".hiddendiv").click(function(e)
  	    {
  	    
  	      $(".messagepop").css("display","none");
  	      $(".hiddendiv").css("display","none");
  	      $(".hiddendiv").hide();
  	   });
   
   $("#PassForget").click(function(e)
  	  {
  	     $(".messagepop").fadeToggle().css("display","block");
  	     $(".hiddendiv").css("display","block");
  	     $(".hiddendiv").show();
  	     $("#testInfo").toggle("slow").css("display","none");
  	 });
  	     
  	     
  	  $("#forgot-pass").submit(function(e)
  	  {
  	    e.preventDefault();
  	    $(".msg").empty();
  	    
  	   	var formData = new FormData($(this)[0]);
  	    
  	    $.ajax({
			type: "POST",
			url: "php/forgot-pass.php",
            data: formData,
			async: false,
			success: function(data)
			{
			    var status = data;
		

		        if(status == '["Success"]' )
		        {
				 
				   $(".msg").append("You will receive an email with your current password");
				   
				     setInterval(function()
                       {

                        $(".messagepop").css("display","none");
                  
                        },5000); 
				 
			    }//close if statement
				 
				else
				{
				   $(".msg").append("Sorry we do not have this email address in our database");
				}
			
			},//close success function
			
			cache: false,
			contentType: false,
			processData: false	
			
		}); //close ajax
  	    
  	    return false;
  	  });//close #forgot-pass submit function
  	     

  
  
});
