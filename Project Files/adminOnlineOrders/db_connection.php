<?php 

     $host="localhost";
     $user="root";
     $pwd="";
     $db="Sandamadala_Products";
 
     $conn=mysqli_connect($host,$user,$pwd,$db); //connect to the database
    
     //check the connection
     if(mysqli_connect_errno()){
        die("Connection error");
     }   
?>