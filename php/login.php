<?php
	
	session_start();

    require('connect.php');
 
    $Email=$_POST["Email"];
    $Password=$_POST["Password"];
	
	//VALIDATE USER LOGIN DETAILS ELSE ERROR
	function validate($mysqli,$Email = '',$Password = '')
	{
		$errors = array();
		
		//CHECK IF USERNAME FIELD IS EMPTY
		if(empty($Email))
		{
			$errors[] = 'Enter your email address';
		}
		else
		{
			$e = mysqli_real_escape_string($mysqli,trim($Email));
		}
				
		//CHECK IF PASSWORD FIELD IS EMPTY
		if(empty($Password))
		{
			$errors[] = 'Enter your password';
		}
		else
		{
			$p = mysqli_real_escape_string($mysqli,trim($Password));
		}


    //STORE ERROR MESSAGE IF USERNAME AND PASSWORD ARE NOT FOUND
	if(empty($errors))
	{

	// SQL Query

			$query ="SELECT * FROM Admin WHERE Email='".$Email."' AND Password='".$Password."'";
		
				// Run SQL query and save results
			$result = $mysqli->query($query);
		
			// Place sql result in data array
			$data = array();
		
			while($row = $result->fetch_array(MYSQLI_ASSOC))
			{
			   array_push($data, $row);
			   return array(true,$row);
			}
		
	}
	
	 else
         {
		    $errors[] = 'email address and password not found.';
		 }
         
return array(false,$errors);

}



	list($check,$data) = validate($mysqli,$Email,$Password);	
 	$status = array();
 	
	if($check)
	{
	 
	   $_SESSION['Email'] =$data['Email'];
       $message = array( 'Success');
	   array_push($status, $message);			
	}
	
		
	else 
	{
		$message = array('username or password wrong');
	    array_push($status, $message);	
	}
		
	
echo json_encode($status);// echo data to be used in AJAX through JSON
mysqli_close($mysqli);
?>