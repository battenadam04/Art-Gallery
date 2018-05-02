<?php 

session_start();

    
	$Email=$_SESSION['Email'];
    $errflag = true;
    $data=false;
    $sourcePath="";
    $targetPath="";
    $error="";
    $newfile="";
    
      //keep image name and extension the same as that in database table Profile
      
     if(!isset( $_SESSION['Email'])){
	     
	   $error="Theres a problem with the user";  	     
	     
     }  
      
      
      
      if(isset($_FILES['File']) and !$_FILES['File']['error']){
    //$fname = "11" . ".wav";

    move_uploaded_file($_FILES['File']['tmp_name'], "../img/bio.jpg");
    $error=true;
}
  
  
  	  echo json_encode($error);// echo data to be used in AJAX through JSON 

   
/*

  if($errflag == true)
  {
     if(isset($_FILES["File"]["type"]))
     {
       $validextensions = array("jpeg", "jpg", "png");
       $temporary = explode(".", $_FILES["File"]["name"]);
       $file_extension = end($temporary);
       if ((($_FILES["File"]["type"] == "image/png") || ($_FILES["File"]["type"] == "image/jpg") || ($_FILES["File"]["type"] == "image/jpeg"))
&& in_array($file_extension, $validextensions)){
	
     if($_FILES["File"]["error"] > 0)
     {
       $error[]= "Return Code: " . $_FILES["File"]["error"] . "<br/><br/>";
       $errflag=false;
     }

  else
 {
    if (file_exists("../img/" . $_FILES["File"]["name"])) 
    {
      $error[]=$_FILES["File"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
      $errflag=false;
    }


     else
      {
	
        $sourcePath = $_FILES['File']['tmp_name']; // Storing source path of the file in a variable
        $targetPath = "../img/bio.jpg"; // Target path where file is to be stored
        move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
        $data=true;
      }
  }
}


  else
 {
   $error[]= "<span id='invalid'>***Invalid file Size or Type***<span>";
   $errflag=false;
 }

}

 else
 {
   $error[]= "<span id='invalid'>***Invalid file Size or Type***<span>";
   $errflag=false;
 }
}


 $targetPath=substr($targetPath, 3);
	
    // db connection
	include "connect.php";

	
	if ($errflag == true)
   {
      $error[]="true";
	 
	    // SQL Query
	   $query ="UPDATE Profile SET IMG ='".$targetPath."'";

	
	  if (!mysqli_query($mysqli,$query))
 	  {
 		die('Error: ' . mysqli_error($mysqli));	
 	  }
  
    }
  

   else
   {
      $error[]= "Please complete these fields to continue";
   }
   mysqli_close($mysqli);
*/

//echo json_encode($error);// echo data to be used in AJAX through JSON

?>