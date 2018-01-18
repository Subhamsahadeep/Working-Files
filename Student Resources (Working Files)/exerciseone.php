<!--
1. Create a php file called exerciseone.php in your working-files folder

2. Read the following sentense and create about 6 variables (3 strings / 3 int values)

    A user named Kelvin Hart came to Dubai to perform on 4th April 2016. He is like 5 inches tall and I guess he is 30 years old. His show was restricted. users between the ages of 18 - 49 only could attend. users below the 17 were told to wait for their parents outside and users above 50 were asked to wait in the car.   
    
3. Create an associative array of three values for the sentense in question 2 and echo th results
    
    
4. Write one statement for the sentence in question 2 using your variables in question 2, your statement should include the following if, else and elseif 


     
5. echo out the second value in your associative array from question 3 
     



Nb. If you were able to run it without any error. You have successfully understood php basics
-->





<?php

session_start();

//Anser for Question 2

$performer_name     = "Kelvin Hart";

$hieght             = "5 Inches Tall";

$users              = "Audience";


$user_allowed       = 16;

$user_child         = 17;

$user_old           = 50;


$attendee           = "A person coming to the show";





//Answer for Question 3

$comedy_show = array("performer" => "$performer_name", "performer_hieght" =>"$hieght", "age_allowed" => "$user_allowed");





//Answer for Question 4


function allowed_user($user_allowed,$user_old){
    
    
if($user_allowed >= 18 && $user_allowed <= 49){
    
    echo "You are 18 and above and will be allowed to attend the show <br><br>";
    
}elseif($user_old >= 50 ){
    
    echo "You are 50 and above. You are too old to attend the show, Please wait in the Car <br><br>";
}else{
    
    echo "You are not 18 yet kid!. Play with your friends outside <br><br>";
}
    
    
}



//Answer for Question 5

echo $comedy_show['performer_hieght'];

echo "<br><br>";




 
    
?>

<?php


echo $comedy_show['performer_hieght'];

?>


