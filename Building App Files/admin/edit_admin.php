<?php include('includes/header.php'); ?>


<?php

//Include functions
include('includes/functions.php'); 
//check to see if user if logged in else redirect to index page

?>
   
   
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
      </div>
      <div class="col-md-4 col-md-offset-4">
           <form class="form-horizontal" role="form" method="post" action="<?php $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
           
           <?php 
               
               /************** Fetching data from database using id ******************/
                
               if(isset($_GET['admin_id']))
               {
                   $admin_id = $_GET['admin_id'];
               }

                //require database class files
               require('includes/pdocon.php');

                //instatiating our database objects
               $db = new Pdocon;

                $db->query("SELECT * FROM admin WHERE id=:id");
               $db->bindvalue(':id',$admin_id, PDO::PARAM_STR);
               $row = $db->fetchSingle();
               
           ?>

               <?php if($row) : ?>               
            <div class="form-group">
            <label class="control-label col-sm-2" for="name"></label>
            <div class="col-sm-10">
              <input type="name" name="name" class="form-control" id="name" value="<?php echo $row['fullname'] ?>" required>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-sm-2" for="email"></label>
            <div class="col-sm-10">
              <input type="email" name="username" class="form-control" id="email" value="<?php echo $row['email'] ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd"></label>
            <div class="col-sm-10"> 
              <input type="password" name="password" class="form-control" id="pwd" placeholder="Confirm Password" value="" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="image"></label>
            <div class="col-sm-10">
              <input type="file" name="image" id="image" placeholder="Choose Image" required>
            </div>
          </div>

          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10 text-center">
              <button type="submit" class="btn btn-primary pull-right" name="submit_update">Update</button>
              <a class="pull-left btn btn-danger" href="my_admin.php">Cancel</a>
            </div>
          </div>
          
          <?php endif ?>
</form>
          
<?php


if(isset($_POST['submit_update']))
{
    $raw_name  = cleandata($_POST['name']);
    //$raw_sex   = cleandata($_POST['sex']);
    $raw_email = cleandata($_POST['username']);
    $raw_pass  = cleandata($_POST['password']);
    
    
    $c_name  = sanitize($raw_name);
    //$c_sex   = sanitize($raw_sex);
    $c_email = valemail($raw_email);
    $c_pass  = sanitize($raw_pass);
    
    
    $hashed_pass = hashpassword($c_pass);
    
    //collect image
    
    $c_img        = $_FILES['image']['name'];
    $c_img_tmp    = $_FILES['image']['tmp_name'];
    
    // move image to permanent location
    
    move_uploaded_file($c_img_tmp, "uploaded_image/$c_img");
    


             $db->query("UPDATE admin SET fullname=:fullname, email=:email, pass=:pass, image=:image");
            
            $db->bindvalue(":email",$c_email,PDO::PARAM_STR);
           // $db->bindvalue(":sex",$c_sex,PDO::PARAM_STR);
            $db->bindvalue(":pass",$hashed_pass,PDO::PARAM_STR);
            $db->bindvalue(":fullname",$c_name,PDO::PARAM_STR);
            $db->bindvalue(":image",$c_img,PDO::PARAM_STR);
            
            $run= $db->execute();
            if($run)
            {
                redirect('my_admin.php');
                keepmsg('<div class="alert alert-success text-center"><strong>UPDATE!</strong> Successfully</div>');
    
                
            }
            else
            {
                 keepmsg('<div class="alert alert-danger text-center">
  <strong>Sorry!</strong>Not Updated Successfully</div>') ;
            }
        
    
}


    
            
         
//Comfirm execute and display error or success message

?>

          
          
          
  </div>
</div>
          
  </div>
</div>
  
<?php include('includes/footer.php'); ?>  