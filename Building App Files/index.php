<?php include('includes/header.php');



?>



<?php

//Include functions files and also write a statement to redirect user when logged in 
include('admin/includes/functions.php');
 
 

?>

 
<?php

//require or include your database connection file
require('admin/includes/pdocon.php');
    
//instatiating our database objects
    $db = new Pdocon;

    //Collect and process Data on login submission
if(isset($_POST['submit_login']))
{
    $raw_email = cleandata($_POST['username']);
    $raw_pass  = cleandata($_POST['password']);
    
    $c_email = valemail($raw_email);
    $c_pass  = sanitize($raw_pass);
    
    $hashed_pass = hashpassword($c_pass);
    
    
    echo $c_email;
    echo $hashed_pass;
    
    $db->query('SELECT * FROM admin WHERE email=:email AND pass=:pass');
   
            $db->bindvalue(":email",$c_email,PDO::PARAM_STR);
            $db->bindvalue(":pass",$hashed_pass,PDO::PARAM_STR);
    
            $row = $db->fetchSingle();
            
                
            if($row)
            {
                
                $d_image = $row['image'];
                
                $d_name  = $row['fullname'];
                
                
                
                $s_image = "<img src='uploaded_image/$d_image' class='profile_image'/>"; 
                
                
                $_SESSION['user_data']= array(
                
                    'fullname'  => $row['fullname'],
                    'id'        => $row['id'],
                    'email'     => $row['email'],
                    'image'     => $s_image
                    
                );
                
                $_SESSION['user_is_logged_in'] = true;
                
                redirect('admin/my_admin.php');
                
                 keepmsg('<div class="alert alert-success text-center">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>WELCOME! </strong>'. $d_name .' You are Logged in as ADMIN  </div>');
                
                
            }
    
         else
            {
                echo '<div class="alert alert-danger text-center">
  <strong>Sorry!</strong>User doesnot exist. Register or try again </div>';
            }
    
}



     
         
           

    
    //making the query using our functions
   

    //To specify the WHERE statement, You need to call the bind method
    

    //Fetching the resultset for a single result and keep in a row variable
    
         

    //Collect the image, id, email, fullname and keep an session
   

            
            //create a session variable and set it to true 
         
            
            
            //Redirect a succuessfull login to customer.php
        
            
            //Use the set_message function to set a welcome msg in a closable div and echo a div danger when login fails in else statement
   

?>
  
  <div class="row">
      <div class="col-md-4 col-md-offset-4">
          <p class=""><a class="pull-right" href="admin/register_admin.php"> Register</a></p><br>
      </div>
      <div class="col-md-4 col-md-offset-4">
        <form class="form-horizontal" role="form" method="post" action="index.php">
          <div class="form-group">
            <label class="control-label col-sm-2" for="email"></label>
            <div class="col-sm-10">
              <input type="email" name="username" class="form-control" id="email" placeholder="Enter Email" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd"></label>
            <div class="col-sm-10"> 
              <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter Password" required>
            </div>
          </div>

          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10 text-center">
              <button type="submit" class="btn btn-primary text-center" name="submit_login">Login</button>
            </div>
          </div>
        </form>
          
  </div>
</div>
  
  
<?php include('includes/footer.php'); ?>