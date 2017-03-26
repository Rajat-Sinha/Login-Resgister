<!DOCTYPE html>
<html>
 <head>
   <?php require 'Head.inc.php';?>
 </head>
 <body style="background-color:azure;">
   <?php
		@require 'core.inc.php';
		@require 'connect.inc.php';
		
		function getuserfield($field){
			$query="SELECT `$field` FROM `users` WHERE `id`='".$_SESSION['user_id']."'";
			
			if($query_run=@mysqli_query($con,$query)){
				if($query_result=mysqli_result($query_run,0,$field)){
					return $query_result;
				}
				
			}
		}
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			$firstname=getuserfield('firstname');
			$surname=getuserfield('surname');
			
			echo '<div style="text-align:center;font:30px bold tahoma;border:1px solid black;border-radius:100px;margin-top:140px;padding-top:100px;padding-bottom:50px;color:white;background-color:darkgray;">You are Logged In as '.$firstname.' '.$surname.'<br><a href="logout.php" style=":link{color:red;};:hover{color:blue;}">LogOut</a></div>';
		}else{
			include 'login.php';
		}
 ?>

 </body>
</html>
