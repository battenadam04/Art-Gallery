<?php

   //database connection
   $mysqli = new mysqli("localhost", "root", "", "Art-Gallery");
   //$mysqli = new mysqli("adambatten.com.mysql","adambatten_com", "jcpg9hnZ","adambatten_com");

   // Group Space Connection
   //$mysqli = new mysqli("localhost", "COM601_A2", "zS9tRu4b", "com601_a2");

   if (mysqli_connect_errno()) 
   {
	printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
   }

?>