<?php
	session_start();

    
    $newBio="";
    $errflag = false;
    $data=false;
    $error=Array();

   
  if (empty($_POST["newBio"])) 
   {
     $errflag=false;
   } 
   
   else 
   {
     $newBio = test_input($_POST["newBio"]);
     $data=true;
   }

   function test_input($data1) 
  {
  $data1 = trim($data1);
  $data1 = stripslashes($data1);
  $data1 = htmlspecialchars($data1);
  return $data1;
  }
  
  
  	// db connection
	include "connect.php";
	
	$Email= $_SESSION["Email"];
	
			
	$sql="SELECT * FROM Admin WHERE Email = '".$Email."'";

   // Run SQL query and save results
	$result = $mysqli->query($sql);
	$newresult=mysqli_num_rows($result);
	
	if (mysqli_connect_errno()) 
   {
	printf("Connect failed: %s\n", mysqli_connect_error());
			$errflag= false;
    exit();
   }

   if($newresult > 0 && !empty($newBio))
   {
	 $errflag= true;
   }
		
   else
   {
	 $errflag= false;
   }
				
    if ($errflag == true)
   {
             // SQL Query
	        $query ="UPDATE Profile SET Description ='".$newBio."' WHERE ID='1'";
	        //$query ="UPDATE Admin SET Password='".$newPass."' WHERE Email = '".$Email."'";

	          if (!mysqli_query($mysqli,$query))
 	           {
 		          die('Error: ' . mysqli_error($mysqli));	
 	           }

 	             $error[]=true;     
    }
  

    else
   {
      $error[]= false;
   }

echo json_encode($error);
mysqli_close($mysqli);
?>