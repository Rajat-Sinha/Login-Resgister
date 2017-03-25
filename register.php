<!DOCTYPE html>
<html>
 <head>
   <?php require 'Head.inc.php';?>
 </head>
 <body style="background-color:lightcyan;">
   <div id="message" style="display:none;text-align:center;font:50px bold tahoma;border:1px solid black;border-radius:200px;color:white;background-color:darkgray;">Registration Form</div>
   <script type="text/javascript" src="js/jquery.js"></script>
   <script type="text/javascript" src="js/register.js"></script>
    <?php
/*
Registration FORM

*/
@require 'connect.inc.php';
@require 'core.inc.php';
function loggedin(){
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
		return true;
	}else{
		return false;
	}
}
if(!loggedin()){
	if(isset($_POST['username'])&& isset($_POST['password'])&& isset($_POST['password_again'])&& isset($_POST['firstname'])&& isset($_POST['surname'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$password_again=$_POST['password_again'];
		$firstname=$_POST['firstname'];
		$surname=$_POST['surname'];
		if(!empty($username) && !empty($password) && !empty($password_again) && !empty($firstname) && !empty($surname)){
			if(strlen($username)>30 || strlen($firstname)>40 || strlen($surname)>40){
				echo 'Please ahear to maxlength of fields.';
			}else{
				if($password !=$password_again){
					echo 'password does not match';
				}else{
					$query="SELECT `username` FROM `users` WHERE `username`='$username'";
					$query_run=mysql_query($query);
					if(mysql_num_rows($query_run)==1){
						echo '<script type="text/javascript"> bootbox.alert("<p style=\"color:red;font:18px bold tahoma;margin-top:30px;\"> The username '.$username.' already exists</p> ");</script>';
					}else{
					 $query="INSERT INTO `users` VALUES('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password)."','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($surname)."')";
					 if( $query_run=mysql_query($query)){
						 header('Location:sucess.php');
					 }else{
						 echo '<script type="text/javascript"> bootbox.alert("<p style=\"color:red;font:18px bold tahoma;margin-top:30px;\"> Error: <strong>Soory!! We Could Not register this time,try next time.... </strong></p> ");</script>';
					 }
					}
				}
		      } 
			}else{
			echo '<script type="text/javascript"> bootbox.alert("<p style=\"color:red;font:18px bold tahoma;margin-top:30px;\"> Error: <strong>Soory!! All Field Are Required... </strong></p> ");</script>';
		}
	}
?>
<form action="register.php" method="POST" role="form" style="border:1px solid black;border-radius:50px;background-color:darkslategray;color:gray; margin-top:50px;font:16px bold tahoma; padding-top:50px;">
   <!--username-->
	  <div class="form-group row text-center">
	    <div class="col-md-2"></div>
		<div class="col-md-6 row">
		   <div class="col-md-6" style="text-align:center;margin-top:8px;">
		     <label for="username" style="margin-left:210px;">UserName:</label>
		  </div>
		  <div class="col-md-6">
		    <input type="text" class="form-control" name="username" maxlength="30" placeholder="Please Write your username" value="<?php if(isset($username)){echo $username;}?>">
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
		     <label for="password" style="margin-left:220px;">Password:</label>
		  </div>
		  <div class="col-md-6">
		    <input type="password" class="form-control" name="password"  placeholder="Please fill the password" >
		  </div>
		</div>
		<div class="col-md-4"></div>
      </div><br>
	  <!---->
	  <!--Password Again-->
	   <div class="form-group row text-center">
	    <div class="col-md-2"></div>
		<div class="col-md-6 row">
		   <div class="col-md-6" style="text-align:center;margin-top:8px;">
		     <label for="password" style="margin-left:220px;">Retype Password:</label>
		  </div>
		  <div class="col-md-6">
		    <input type="password" class="form-control" name="password_again"  placeholder="Please Re-enter the password" >
		  </div>
		</div>
		<div class="col-md-4"></div>
      </div><br>
	  <!---->
	  <!--Firstname-->
	   <div class="form-group row text-center">
	    <div class="col-md-2"></div>
		<div class="col-md-6 row">
		   <div class="col-md-6" style="text-align:center;margin-top:8px;">
		     <label for="firstname" style="margin-left:220px;">Firstname:</label>
		  </div>
		  <div class="col-md-6">
		    <input type="text" class="form-control" name="firstname"  placeholder="Please Enter Your Firstname" maxlength="40" value="<?php if(isset($firstname)){echo $firstname;} ?>" >
		  </div>
		</div>
		<div class="col-md-4"></div>
      </div><br>
	  <!---->
	  <!--Surname-->
	   <div class="form-group row text-center">
	    <div class="col-md-2"></div>
		<div class="col-md-6 row">
		   <div class="col-md-6" style="text-align:center;margin-top:8px;">
		     <label for="surname" style="margin-left:220px;">SurName:</label>
		  </div>
		  <div class="col-md-6">
		    <input type="text" class="form-control" name="surname"  placeholder="Please Enter Your Surname" maxlength="40" value="<?php if(isset($surname)){ echo $surname;}?>">
		  </div>
		</div>
		<div class="col-md-4"></div>
      </div><br>
	  <!---->
	  <!--Submit-->
	   <div class="form-group row text-center">
	    <div class="col-md-2"></div>
		<div class="col-md-6 row">
		   <input type="submit" value="Register" class="btn btn-danger">
		</div>
		<div class="col-md-4"></div>
      </div><br>
	  <!---->
     <script type="text/javascript" src="js/jquery.js"></script>
     <script type="text/javascript" src="js/input.js"></script>
 
</form>
<?php
}else if(loggedin()){
	echo '<div style="text-align:center;font:30px bold tahoma;border:1px solid black;border-radius:100px;margin-top:140px;padding-top:100px;padding-bottom:50px;color:white;background-color:darkgray;">You Are already logged in.Please Logout To resgister<br><a href="logout.php">Logout</a></div>';
}
?>
 </body>
</html>
