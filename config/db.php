<?php


require 'config/constant.php';



$con=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

 if($con->connect_error){
     die('Error occured!' . $con->connect_error);
 }

?>