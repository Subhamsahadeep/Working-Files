<?php

$server         = "localhost";
    
$username       = "root";
    
$password       = "";

$database       = "cus_app";
    
    

try {
     $connection = mysqli_connect($server, $username, $password, $database);
    
     if($connection){
    
    //echo "Database connection was successfull";
    }
     
    
} catch(Exception $errormsg) {
    
    echo $errormsg->getMessage();
}




?>
