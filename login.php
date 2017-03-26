<!DOCTYPE html>
<html>
 <head>
   <?php require 'Head.inc.php';?>
 </head>
 <body>
    <div id="message" style="display:none;text-align:center;font:50px bold tahoma;border:1px solid black;border-radius:200px;color:white;background-color:darkgray;">Login</div>
   <script type="text/javascript" src="js/jquery.js"></script>
   <script type="text/javascript" src="js/register.js"></script>
   
    <?php
	    require 'connect.inc.php';
		require 'core.inc.php';
		require 'mysql_result.inc.php';
		if(isset($_POST['username']) && isset($_POST['password'])){
			$username=$_POST['username'];
			$password=$_POST['password'];
			if(!empty($username) && !empty($password)){
				$query="SELECT `id` FROM `users` WHERE `username`='".mysqli_real_escape_string($con,$username)."' AND `password`='".mysqli_real_escape_string($con,$password)."'";
				
				if($query_run=mysqli_query($con,$query)){
					$query_num_row=mysqli_num_rows($query_run);
					if($query_num_row==0){
						echo 'Invalid username and password';
					}else if($query_num_row==1){

					$user_id=mysqli_result($query_run,0,'id');
					$_SESSION['user_id']=$user_id;
					header('Location:index.php');		
					}
				}
				
			}else{
				echo '<script type="text/javascript"> bootbox.alert("<p style=\"color:darkred;font:18px bold tahoma;margin-top:30px;\"> Error: <strong>Soory!! All Field Are Required... </strong></p> ");</script>';
			}
		}
  ?>
	<form action="<?php echo $current_file?>" method="POST" role="form" style="border:1px solid black;border-radius:50px;background-color:darkseagreen; margin-top:100px; padding-top:100px;padding-bottom:50px;">
	  <!--username-->
	  <div class="form-group row text-center">
	    <div class="col-md-2"></div>
		<div class="col-md-6 row">
		   <div class="col-md-6" style="text-align:center;margin-top:8px;">
		     <label for="username" style="margin-left:220px;">UserName:</label>
		  </div>
		  <div class="col-md-6">
		    <input type="text" class="form-control" name="username" placeholder="Please Write username">
		  </div>
		</div>
		<div class="col-md-4"></div>
      </div><br>
	  <!---->
	  <!--Password-->
	   <div class="form-group row text-center">
	    <div class="col-md-2"></div>
		<div class="col-md-6 row">
		   <div class="col-md-6" style="text-align:center;margin-top:8px;">
		     <label for="username" style="margin-left:220px;">PassWord:</label>
		  </div>
		  <div class="col-md-6">
		    <input type="password" class="form-control" name="password" placeholder="Please fill the password">
		  </div>
		</div>
		<div class="col-md-4"></div>
      </div><br>
	  <!---->
	  <!--Submit button-->
	   <div class="form-group row text-center">
	    <div class="col-md-4"></div>
		<div class="col-md-4 row">
		   <div class="col-md-6" style="text-align:center;margin-top:8px;">
		     <input type="submit" value="LOGIN" class="btn btn-success">
		  </div>
		  <div class="col-md-6" style="text-align:center;margin-top:8px;">
		     <a href="register.php"><input type="button" value="New register" class="btn btn-primary"></a>
		  </div>
		</div>
		<div class="col-md-4"></div>
      </div><br> 
	  <!---->
	  <script type="text/javascript" src="js/jquery.js"></script>
     <script type="text/javascript" src="js/input.js"></script>
	</form>
 </body>
</html>

