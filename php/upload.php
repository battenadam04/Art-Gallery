<?php 

session_start();

    
	$Email=$_SESSION['Email'];
    $errflag = true;
    $data=false;
    $sourcePath="";
    $targetPath="";


   if(empty($_FILES["ImageArt"]["type"])) 
   {
     $error[] = "Image is required"; 
     $errflag=false;
   } 
   
   else 
   {
    $data=true;
   }


  if($errflag == true)
  {
     if(isset($_FILES["ImageArt"]["type"]))
     {
       $validextensions = array("jpeg", "jpg", "png");
       $temporary = explode(".", $_FILES["ImageArt"]["name"]);
       $file_extension = end($temporary);
       if ((($_FILES["ImageArt"]["type"] == "image/png") || ($_FILES["ImageArt"]["type"] == "image/jpg") || ($_FILES["ImageArt"]["type"] == "image/jpeg"))
&& in_array($file_extension, $validextensions)){
	
     if($_FILES["ImageArt"]["error"] > 0)
     {
       $error[]= "Return Code: " . $_FILES["ImageArt"]["error"] . "<br/><br/>";
       $errflag=false;
     }

  else
 {
    if (file_exists("../img/" . $_FILES["ImageArt"]["name"])) 
    {
      $error[]=$_FILES["ImageArt"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
      $errflag=false;
    }


     else
      {
	
        $sourcePath = $_FILES['ImageArt']['tmp_name']; // Storing source path of the file in a variable
        $targetPath = "../img/".time()."-".rand(1000, 9999).".".$file_extension; // Target path where file is to be stored
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
	   $query ="INSERT INTO Artwork (ID, Source,Title,Description) VALUES ('','".$targetPath."','Title','Description')";

	
	  if (!mysqli_query($mysqli,$query))
 	  {
 		die('Error: ' . mysqli_error($mysqli));	
 	  }
  
    }
  

   else
   {
      $error[]= "Please complete these fields to continue";
   }

echo json_encode($error);// echo data to be used in AJAX through JSON
mysqli_close($mysqli);
?>