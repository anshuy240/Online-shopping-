<?php
    include "db.php";
	$product_query = "SELECT * FROM user_info";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0)
	{
		
		while($row = mysqli_fetch_array($run_query))
		{
			if($row[8]==0)
			{ 
		       $x=1;
		       $sql = "UPDATE user_info SET type_check ='$x' where user_id='$row[0]";
			}
		}
		    echo "activate_success";
			exit();
	}
	else
	{
		echo "nahi hua bhai";
		exit();
	}
?>