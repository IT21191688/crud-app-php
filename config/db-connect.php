<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customer-management";

$con = new mysqli($servername, $username, $password, $dbname); //Creating connection 

if($con -> connect_error){ //Checking whether the database is connected successfully
    die("Connection error : " .$con -> connect_error);
}


?>