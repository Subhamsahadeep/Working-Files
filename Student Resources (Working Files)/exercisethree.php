<!--

//Questions:



1. Create a file called exercisethree.php in your working files

2. Read the following sentence carefully

    You got contacted by a senior manager from Virtualines.com and he wants the following to be set up for his company's online backend management system.
    
    He wants to process the following data which comes in via a form on the customerqueries.php (same page as form)
       
        a, username    b. secretword   c. email     d. age   e. fullname   f. address   g. customer complaint
    
    
    i. Create a class with the above as properties
    
    ii. Create a method that executes automatically with a welcome message that has the fullname of the user
    
    iii. Create a method that validates the secretword is not less than 8 characters
    
    iv. Extend your class to another class and call your secretword method
    
    v. Create a method that will display the user queries to the support team inside the childs class
    
    vi. Call all your methods 
    
    
Nb. He wants all the functions to display error and success messages containing the values from the form within their respective statement when possible and for now, he wants you to assume or use static values.
-->












//Solution

<br><br>


<?php 


//Class name
class Customers {
    
   // i. Properties 
            
         public  $secretword             = "nba";
    
         public  $email                  = "kbriend@virtualines.com"; 
    
         public  $age                    = 40;
    
         public  $fullname               = "Kobby Briend";
    
         private $address                = "New York";
    
         public  $customer_complaint     = "My Credit Card got decline twice today"; 
    
    
         static public $minSecretWord    = 8;
         static public $username         = "kobbyb";
    
    
      // ii. function construct 
    
    public function __construct(){
        
        if($this->fullname){
            
            echo "Hi " . $this->fullname . " , My name is Paul, Welcome  to Virtualines Customer Support. Kindly provide your Secret Word for Verification.<br><br>" ;
            
        }else{
            
            return false;
        }
        
    }
    
    //iii. Solution for secret word not less than 8
    static public function validateSecretWord($typedSecretWord){
            
        $countedTypedSecretWord  = strlen($typedSecretWord); 
                    
        if($countedTypedSecretWord >= self::$minSecretWord){
            
            echo "Thank you for Verifying your Account " . self::$username . " ";
            
        }else{
            
            echo "Sorry " . self::$username . ", We could not verify your Identity. Your typed secret word '" . $typedSecretWord . "' is less than 8 characters. <br><br>"; 
        }
        
    }
    

}//End of Customers Class


//iv. Solution for childs class
class CustomerQueryReport extends Customers{
    
    
    //Overiding the public secret word in the parant class
    public  $secretword             = "nbabestplayer";
    
    //Calling Secret word validation method in parent class
    public function callingSecretWordValidation (){
        
        //Declaring a static variable for the typedSecretWord

        $typedSecretWord = $this->secretword; 
        
        parent::validateSecretWord($typedSecretWord);
        
    }
    
    
    //vi. Solution
    public function displayReport(){
        
        if($this->email){
            
            echo "<br><br>";
            
            echo "Dear Support team, <br><br> You have got an incoming query report from " . $this->fullname . " Here are the detials: <br> <br> Email: " . $this->email . " <br><br> Age: " . $this->age . " <br><br> Main Complaint: " . $this->customer_complaint . "<br><br> Address cannot be disclosed at this moment.  ";
            
        }else{
            echo "<br><br>";
                
            echo " Congratulations Support Team, No customer complained today";
        }
        
    }
    
    
    
    
}//End of Child Class



//vi. Solutions

//Instatiating the parent class
$customerQuery = new Customers ;


//Calling the static method inside the parent class Customers

//Declaring a static variable for the typedSecretWord
$typedSecretWord = $customerQuery->secretword;

Customers::validateSecretWord($typedSecretWord);




//Instatiating the child class
$cus_query_report = new CustomerQueryReport;

//Calling the method in the child class that called the secretwordvalidation method in the parent class
$cus_query_report->callingSecretWordValidation();


//Calling displayreport method from the childs class, solution for vi
$cus_query_report->displayReport();


?>
