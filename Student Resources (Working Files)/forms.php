<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // collect value of input field name
    $name       =   $_POST['fullname'];
    $email      =   $_POST['email'];
    
    if (empty($name)) {
        echo "Name is empty";
    } else {
        echo "Your name is " . $email;
    }
}

?>