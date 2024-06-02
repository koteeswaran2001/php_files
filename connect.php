<?php
   $host ="localhost";
   $username = "root";
   $password = "";
   $dbname = "register";

   //create database connection
   $conn = new mysqli($host, $username, $password, $dbname);

   //check connection
   if ($conn->connect_error){
         die("conection failed:" . $conn->connect_error);
   }

?>