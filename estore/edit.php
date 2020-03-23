<?php
        session_start();
        include "db.php";
		$p_idd=$_POST["proId"];
	$product_query = "select * from products where product_id='$p_idd'";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query)>0)
	{
		$row = mysqli_fetch_array($run_query);
		  echo $row[5];
		exit();
	}
	else
	{
		echo  " 
		        <div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>hello</b>
			</div>
		";
		exit();
	}
?>