$('document').ready(function() 
{
	$(document).on('change', '.update', function() 
	{
		var ID = $(this).prop('id');
		var data = $(this).val();
		var Colname = $(this).prop('name');
		var inputclicked = $(this);
		$.ajax({
			type: "POST",
			url: "php/account.php",
			data: {data: data,Colname: Colname,ID: ID},
			success: function(data) 
			{
				var result = JSON.parse(data)[0];
				if (result == true) 
				{
					var $tr = $(this).parent(); //this will give the tr
					var tdIndex = $(this).index();
					inputclicked.closest("td").next().html("Updated");
					setTimeout(function() {
						inputclicked.closest("td").next().html("");
					}, 2000);
				} else 
				{
					alert("nope");
				}
			}
		}); //close ajax call
	}); //close document on.change function
	
	$("#changePass").submit(function(event) 
	{
		var formData = new FormData($(this)[0]);
		$.ajax({
			type: "POST",
			url: "php/pass-change.php",
			data: formData,
			async: false,
			beforeSend: function()
            {
             $('#submitPass').html('loading...');
            },
			success: function(data) 
			{
				var result = JSON.parse(data)[0];
				if (result == true) 
				{
					$(".updateBtn:first").val("Password updated");
					$(".updateBtn:first").css("background","#333D51");
					
					setTimeout(function() {
						$(".updateBtn:first").val("update");
						$(".updateBtn:first").css("background","");
					}, 2000);
					$('#changePass')[0].reset();
				} else 
				{
					$(".updateBtn:first").val("update Failed");
					$(".updateBtn:first").css("background", "red");
					$(".updateBtn:first").css("color", "white");
					setTimeout(function() {
						$(".updateBtn:first").val("update");
						$(".updateBtn:first").css("background", "");
						$(".updateBtn:first").css("color", "");
					}, 2000);
				}
			},
			cache: false,
			contentType: false,
			processData: false
		}); //close ajax call
		return false;
	}); //close #changePass submit function
	
	
	$("#changeBio").submit(function(event) 
	{
		var inputclicked = $(this);
		var formData = new FormData($(this)[0]);
		$.ajax({
			type: "POST",
			url: "php/bio-change.php",
			data: formData,
			async: false,
			beforeSend: function()
            {
             $('#submitBio').html('loading...');
            },
			success: function(data) 
			{
				var result = JSON.parse(data)[0];
				if (result == true) 
				{
				
					$(".updateBtn:last").val("updated");
					$(".updateBtn:last").css("background","#333D51");
					setTimeout(function() {
						$(".updateBtn:last").val("update");
						$(".updateBtn:last").css("background","");
					}, 2000);
					$('#changeBio')[0].reset();
				} else 
				{
					$(".updateBtn:last").val("update Failed");
					$(".updateBtn:last").css("background", "red");
					$(".updateBtn:last").css("color", "white");
					setTimeout(function() {
						$(".updateBtn:last").val("update");
						$(".updateBtn:last").css("background", "");
						$(".updateBtn:last").css("color", "");
					}, 2000);
				}
			},
			cache: false,
			contentType: false,
			processData: false
		}); //close ajax call
		return false;
		
		
	});
	
	
	
	
		
	});
