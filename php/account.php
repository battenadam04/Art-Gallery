<?php
	 	// db connection
	include "connect.php";
	session_start();
	
	$newdata="";
	$col=$_POST["Colname"];
	$id=$_POST["ID"];
	$errflag = true;
    $data=false;
    $error=Array();
	
    if(empty($_POST["data"])) 
   {
     $errflag=false;
   } 
   
   else 
   {
     $newdata = test_input($_POST["data"]);
     $data=true;
   }

   //function to clean all input data
   function test_input($data1) 
  {
  $data1 = trim($data1);
  $data1 = stripslashes($data1);
  $data1 = htmlspecialchars($data1);
  return $data1;
  }
  
  if($errflag == true)
  {  
	  //update Jobs with =$newdata using $col to find the right column name
    
     $query ="UPDATE Artwork SET ".$col."='".$newdata."' WHERE ID = '".$id."'";

	     if (!mysqli_query($mysqli,$query))
	     {
			echo("Error description: " . mysqli_error($mysqli));
			$error[]=false;
	     }
			  
	     else
	     {
			$error[]=true;
		 }            
  }
 		             
echo json_encode($error);
mysqli_close($mysqli);
?>