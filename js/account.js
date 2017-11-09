$('document').ready(function ()
{ 	
	
	
     $(document).on('change','.update',function()
     {
   
        var ID=$(this).prop('id');
        var data=$(this).val();
        var Colname=$(this).prop('name');
        var inputclicked=$(this);
       
      
         $.ajax({
	         type:"POST",
	         url:"php/account.php",
	         data:{data:data, Colname:Colname, ID:ID},
	         success: function(data)
	         {
		         
		         var result =JSON.parse(data)[0];
				                            
				     if(result == true)
				     {
					     
					     var $tr = $(this).parent();//this will give the tr
					     var tdIndex = $(this).index();
					      inputclicked.closest("td").next().html("Updated");
					    
					    setTimeout(function()
                        {
                           inputclicked.closest("td").next().html("");
                        },2000);
					 }
					                         
					 else
					 {
						alert("nope");
					 }
		      }
	     
	     });//close ajax call
     }); //close document on.change function
  });
 
