

<?php

function cleandata($value){
    
    return trim($value);
}

function sanitize($raw_value){
    
    return filter_var($raw_value, FILTER_SANITIZE_STRING);
}

function valemail($raw_email)
{
    return filter_var($raw_email, FILTER_VALIDATE_EMAIL);
}

function valint($raw_int)
{
    return filter_var($raw_int, FILTER_VALIDATE_INT);
}

function redirect($page){
    
    header("Location: {$page}");

}

function keepmsg($message){
    
    if(empty($message))
    {
        $message = ""; 
    }
    else
    {
         $_SESSION['msg'] = $message ;
    }
}


function showmsg(){
    
    if(isset($_SESSION['msg']))
    {
        echo $_SESSION['msg'];
        
        unset($_SESSION['msg']);
    }
    
    
}

function hashpassword($clean_password)
{
    return md5($clean_password);
}



?>




