<?php 

$host="localhost";
$user="root";
$pwd="";
$db="sandamadala_products";

$conn=mysqli_connect($host,$user,$pwd,$db); //connect to the database

//check the connection
if(mysqli_connect_errno()){
   die("Connection error");
}   
?>