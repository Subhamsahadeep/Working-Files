<?php

include('pdocon.php'); 
        
$db = new Pdocon; 


// PHP function to return data to html


    $db->query("SELECT * FROM users");
        
    $result = $db->fetchSingle();
        
    if($result){
        
        echo "Welcome to your Account " . $result['full_name'];
        
    }

?>






<?php
//PHP function to process post data

    if(isset($_POST['email'])){
        
    // collect value of input field name
    $raw_email      =   trim($_POST['email']);
    $raw_password   =   trim($_POST['password']); 
    $raw_fullname   =   trim($_POST['fullname']); 
    $raw_accept     =   trim($_POST['check']); 
      
    //Validating values
    $c_email        = filter_var($raw_email, FILTER_VALIDATE_EMAIL);
    $c_password     = filter_var($raw_password, FILTER_SANITIZE_STRING);
    $c_fullname     = filter_var($raw_fullname, FILTER_SANITIZE_STRING);
    $c_accept       = filter_var($raw_accept, FILTER_SANITIZE_STRING);
        
        $db->query("INSERT INTO users (id, email, password, full_name, Spending_Amt) VALUES (NULL, :email, :password, :fullname, :spending) ");
        
        $db->bindvalue(':email', $c_email, PDO::PARAM_STR);
        $db->bindvalue(':password', $c_password, PDO::PARAM_STR);
        $db->bindvalue(':fullname', $c_fullname, PDO::PARAM_STR);
        $db->bindvalue(':spending', 500, PDO::PARAM_INT);
        
        $run = $db->execute();
        
        $db->confirm_result();
        
        if($run){
            
           echo "You have successfully Inserted your values";
        }else{
            
            echo "You values could not be inserted";
        }
    }
      


?>