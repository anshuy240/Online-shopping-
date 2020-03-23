<?php 
    session_start();
    include('db.php');
    $email = $_SESSION['email'];
	$oldpass=$_POST["password"];
    $oldpass = md5($oldpass);
    $query = "SELECT * FROM user_info WHERE email='$email' AND password= '$oldpass'";
    $fire = mysqli_query($con,$query);
    $count = mysqli_num_rows($fire);
        if($count>0)
		{ 
               $newpass=$_POST["newpassword"];
                $renewpass=$_POST["renewpassword"];
                if($newpass != $renewpass)
				{
					
					echo "
			         <div class='alert alert-warning'>
			         	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Password missmatched...!</b>
			           </div>";
					   exit();
				}		
                else
				{				
			         $password=$newpass;
                     $str= md5($newpass);
                     $query = "UPDATE user_info SET password='$str' WHERE email='$email'";
                     if(mysqli_query($con,$query)){
				        echo "change_success";
			            exit();
					 }
					 else{
						echo "<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Not Success...!</b>
			</div>
		";
			exit();
						 
					 }
				}
		}
		else
		{
				echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Enter a vailed Email...!</b>
			</div>
		";
			exit();
		}
?>