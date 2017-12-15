<?php

   //database connection
   $mysqli = new mysqli("localhost", "root", "", "Art-Gallery");
   //$mysqli = new mysqli("db708708779.db.1and1.com","dbo708708779", "Davemirra1!","db708708779");

   // Group Space Connection
   //$mysqli = new mysqli("localhost", "COM601_A2", "zS9tRu4b", "com601_a2");

   if (mysqli_connect_errno()) 
   {
	printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
   }

?>