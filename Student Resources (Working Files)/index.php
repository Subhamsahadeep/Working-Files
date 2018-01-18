<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 
           
 <br><br><br>
 
  <div id="greetings" class="well well-sm text-center">   </div>
 
 
  <h2>Customers</h2>

  <table class="table table-bordered table table-hover">
    <thead>
      <tr>
        <th>Fullname</th>
        <th>Password</th>
        <th>Email</th>
        <th>Edit User</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        
        
        
        include('pdocon.php'); 
        
        $db = new Pdocon;
        
        $db->query("SELECT * FROM users");
        
        $results = $db->fetchMultiple();
        
        foreach($results as $result) : ?>    

          <tr>
            <td><?php echo $result['full_name'] ?> </td>
            <td><?php echo $result['password'] ?> </td>
            <td><?php echo $result['email'] ?></td>
            <td><a class="btn btn-primary" href="updateuser.php?user_id=<?php echo $result['id'] ?>">Edit</a></td>
          </tr>
         <?php endforeach ; ?>
     
    </tbody>
  </table>
</div>


<div class="container">
  <h2>Registration Form</h2>
  <form method="post" class="form-horizontal" id="insertdata" role="form" action="processajax.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password">
      </div>
    </div> <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Fullname</label>
      <div class="col-sm-10">
        <input type="fullname" class="form-control" id="fullname" name="fullname" placeholder="Enter Fullname">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="check" value="Accept">Accept</label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" value="submit" id="" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>








<?php
    
//  if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    
//    // collect value of input field name
//    $raw_email      =   trim($_POST['email']);
//    $raw_password   =   trim($_POST['password']); 
//    $raw_fullname   =   trim($_POST['fullname']); 
//    $raw_accept     =   trim($_POST['check']); 
//      
//    //Validating values
//    $c_email        = filter_var($raw_email, FILTER_VALIDATE_EMAIL);
//    $c_password     = filter_var($raw_password, FILTER_SANITIZE_STRING);
//    $c_fullname     = filter_var($raw_fullname, FILTER_SANITIZE_STRING);
//    $c_accept       = filter_var($raw_accept, FILTER_SANITIZE_STRING);
//      
//    
//    if(isset($_POST['submit'])){
//        
//        $db->query("INSERT INTO users (id, email, password, full_name, Spending_Amt) VALUES (NULL, :email, :password, :fullname, :spending) ");
//        
//        $db->bindvalue(':email', $c_email, PDO::PARAM_STR);
//        $db->bindvalue(':password', $c_password, PDO::PARAM_STR);
//        $db->bindvalue(':fullname', $c_fullname, PDO::PARAM_STR);
//        $db->bindvalue(':spending', 500, PDO::PARAM_INT);
//        
//        $run = $db->execute();
//        
//        $db->confirm_result();
//        
//        if($run){
//            
//           echo "You have successfully Inserted your values";
//        }else{
//            
//            echo "You values could not be inserted";
//        }
//    }
//      
//}
//    
    
    
?>


</body>
</html>



<?php

//AJAX
//    
////Concept
//
//    It is the use of XMLHttpRequest object - OOP / CLASS
////    
//    Communicates with Server Side Scripts - PHP
////    
//    Returns result in HTLM or text etc...
////    
////    //Daigram
////    
////    
////    
//////When it's used
////    
//    To post or load/get/request data from a server-script like PHP
////    
////    //Sketch with tool
////    
////    
////    
//////How it's used
////
//    Since it is an XMLHttpRequest object, we can say that AJAX is an Object instantiated from the XMLHttpRequest class | We are talking OOP
////        
//    This means ajax was created like this
////        
//    $ajax = new  XMLHttpRequest() - //PHP
//        
//    var ajax = new XMLHttpRequest() - //Javascript
//
////
//        <script>
//            function showHint(str) {
//                if (str.length == 0) { 
//                    document.getElementById("txtHint").innerHTML = "";
//                    return;
//                } else {
//                    var xmlhttp = new XMLHttpRequest();
//                    xmlhttp.onreadystatechange = function() {
//                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
//                        }
//                    };
//                    xmlhttp.open("GET", "gethint.php?q=" + str, true);
//                    xmlhttp.send();
//                }
//            }
//        </script>
////            
////    //Framework
////            
 //   Ajax comes from JQuery - > Javascript -> Java 
//    
//    
//            
//    //JQeary AJAX Methods
//        
 //   Jquery has now simplified everything for  us by creating methods in the AJAX object
//        
  //  That means: Jquery extended to the XMLHttpRequest() class and built on it with Methods. 
//        
//    
//    Example:
//    
 //   class ajax() extends XMLHttpRequest() {
//        
        
        //Properties
        
        
        //Methods //show methods on w3shools
        
        //$.ajax()
  //      We gonna use this to fetch data from the database with the help of PHP 
        
        
        //$.post()
 //       We gonna use the post to send data to database with the help of PHP
        
//        serialize()
//        Collects and Encodes all form data and attach to the $.post method and send to PHP for processing

//    }
    
//
//    
    //$.ajax({})
//
//    //syntax
 //   $.ajax({name:value, name:value, ... })
//            
//        url:        '', - the php file that will process the data (action)
///       type:       '', - the a is how your want the data to be send (method)
//        data:       '', - the values that you want to send with the request to the processing file
//        success:    '', - to return the results to our HTML element id on the front end 
//        
//            
//            
//    //$.post({})
//    $.post(URL,data,function(data,status,xhr),dataType) //Is a one line function
//        
//        //We can create variables that hold our url and data
//        var url     = a variable holding you url
//        var data    = holding your data using method serialize() method
//            
//        $.post(url,data,function(allert){
//            
//            alert('Update Success');
//       });
    
            

?>



<!--How to use $.ajax({})it-->

<script>
$(document).ready(function(){
    
    $.ajax({
        
        url:        'processajax.php',
        type:       'POST',
        success:    function(holdresults){
            
            if(!holdresults.error){
                
                $('#greetings').html(holdresults);
                
            }
        }
        
 
    });
    
});
   
    
</script>




   <!--How to use $.post({})it-->

<script>
$(document).ready(function(){
    
    $('#insertdata').submit(function(dontrefresh){

    dontrefresh.preventDefault();
  
    var url     = $(this).attr("action");
    
    var data    = $(this).serialize();

    $.post(url,data, function(resetform){
        
        $('#insertdata')[0].reset();
        
    });
        

    });
    

});    
    


 //alert('Are you sure you want to delete?'); 
    
</script>




















