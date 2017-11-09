<?php


require('connect.php');


$Email=$_POST["Email"];

$errflag = true;
$data=false;
$errors=Array();

// run mutliple queries to check for User Email in both tables
$query="SELECT * FROM Admin WHERE Email = '".$Email."';";

    // Run SQL query and save results
	$result = $mysqli->query($query);

	// Place sql result in data array
	$data = array();

	while( $row = $result->fetch_array(MYSQLI_ASSOC))
	{
		//array_push($data, $row);
	
    
        	$errors[] ="Success";
               	$msg="";
                $from_add = "cathryngruhn.co.uk"; 
                $to_add = $Email; 
                $subject = "Password reminder";
                $name=$row['Name'];
                $msg1= $_POST="This is a reminder for your password. If you did not ask for this then ignore this email. Your current password is'".$row['Email']."'";
                $message ="$name \r\n $Email \r\n\r\n $msg1 ";
	            $headers = "From: $from_add \r\n";
	            $headers .= "Reply-To: $from_add \r\n";
	            $headers .= "Return-Path: $from_add\r\n";
	            $headers .= "X-Mailer: PHP \r\n";
	
	            if(mail($to_add,$subject,$message,$headers)) 
	            {
		          $msg = "success";
	            } 
	
	            else 
	            {
 	              $errors[] ="sending email failed";
 	            }
    }
    
    
         
echo json_encode($errors);// echo data to be used in AJAX through JSON

mysqli_close($mysqli);
?>