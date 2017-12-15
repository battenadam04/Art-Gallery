<?php
	
	include "connect.php";
	session_start();

	$ID;
	$Src="";
	$errflag = true;
    $data=false;
    $error=Array();
	

    if (empty($_POST["ID"])) 
   {
     $errflag=false;
   } 
   
   else 
   {
     $ID = test_input($_POST["ID"]);
     $data=true;
   }
   
     if (empty($_POST["Src"])) 
   {
     $errflag=false;
   } 
   
   else 
   {
     $Src = test_input($_POST["Src"]);
     $data=true;
   }

   function test_input($data1) 
  {
  $data1 = trim($data1);
  $data1 = stripslashes($data1);
  $data1 = htmlspecialchars($data1);
  return $data1;
  }
  
  

  
  if($errflag == true)
  {
	  
	  //delete the job advertisement where the column name IDad is equal to the users IDad
     $query ="DELETE FROM Artwork WHERE ID = '".$ID."'";

	          if (!mysqli_query($mysqli,$query))
 	           {
 		          die('Error: ' . mysqli_error($mysqli));	
 	           }
 	           
 	           else
 	           {
	 	           unlink($Src);
 	           }
 	          

 	             $error[]=true;
 	             
   }
 	  else
   {
	  $error[]= "there was an error";
   }             
echo json_encode($error);
mysqli_close($mysqli);


	

?>