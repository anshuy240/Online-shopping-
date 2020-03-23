<?php
session_start();
require 'phpmailer/PHPMailerAutoload.php';
$ip_add = getenv("REMOTE_ADDR");
include "db.php";
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Categories</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}
//iuytredfgbhnjmk,mnb
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Brands</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
					<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}
if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			echo "
				         <div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
								<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading'>$pro_price.00
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div>
						</div>	
			";
		}
	}
}
if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE product_cat = '$id'";
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products WHERE product_brand = '$id'";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading'>$.$pro_price.00
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div>
						</div>	
			";
		}
	}
	//tyuknvbnmxk
	
//iuytrtyuilkjhgfghjk
    if(isset($_POST["activeuser"])){
		$p_idd=$_POST["proId"];
		$x=1;
	$product_query = "UPDATE user_info SET type_check='$x' where user_id='$p_idd'";
	if(mysqli_query($con,$product_query) > 0)
	{
		    $sql="select * from user_info where user_id='$p_idd'";
			$result=mysql_query($con,$sql);
			if(mysqli_num_rows($result)>0)
			{
				           $row=mysqli_fetch_array($result);
				           $email=$row["email"];
				           $name=$row["first_name"];
						   $last=$row["last_name"];
		                   $mail = new PHPMailer();
                           $mail->Host = "smtp.gmail.com";
                           $mail->isSMTP();
                           $mail->SMTPAuth = true;
                           $mail->Username = "rajputji2010@gmail.com";
                           $mail->Password = "Grade123@";
                           $mail->SMTPSecure = "ssl";
                           $mail->Port = "465";
                           $mail-> addAddress($email);
                           $mail-> setFrom('rajputji2010@gmail.com', 'sgr.com');
                           $mail->Subject = "Activation ...";
                           $mail->isHTML(true);	   
                           $mail->Body = "Hi,".$name." ".$last."Your account is activated !!";
                           if($mail->send())
	                       {
					             echo "yes";
			                     exit();
	                       }
			               else
						   { 
				               echo "nikal";
				               exit();
			               }
		 }
	}

}
//iuytrstyuio;lkjhgfgbhn
 if(isset($_POST["confirmorder"]))
 {
     $p_idd=$_POST["proId"];
     $x=1;
	$product_query = "UPDATE orders SET STATUS='$x' where order_id='$p_idd'";
	if(mysqli_query($con,$product_query)>0)
	{
		$query1="select * from orders where order_id='$p_idd'";
		$run_query=mysqli_query($con,$query1);
		if(mysqli_num_rows($run_query)>0)
		{
	  	          $row=mysqli_fetch_array($run_query);
				  $pro_id=$row["product_id"];
				  $query3="select * from products where product_id='$pro_id'";
				  $res=mysqli_query($con,$query3);
				  $result=mysqli_fetch_array($res);
				  if($result[8]>=$row[3])
				  {
                     $y=$result[8]-$row[3];
					//update record in product table
					  $sql="UPDATE products SET available='$y' where product_id='$pro_id'";
					  mysqli_query($con,$sql);
					//end
    					$user_id=$row["user_id"];
		                $query2= "select * from user_info where user_id='$user_id'";
	                    $run_query2=mysqli_query($con,$query2);
		                if(mysqli_num_rows($run_query2)>0)
				        {
			               $row2=mysqli_fetch_array($run_query2);
			               $email=$row2["email"];
						   $name=$row2["first_name"];
		                   $mail = new PHPMailer();
                           $mail->Host = "smtp.gmail.com";
                           $mail->isSMTP();
                           $mail->SMTPAuth = true;
                           $mail->Username = "rajputji2010@gmail.com";
                           $mail->Password = "Grade123@";
                           $mail->SMTPSecure = "ssl";
                           $mail->Port = "465";
                           $mail-> addAddress($email);
                           $mail-> setFrom('rajputji2010@gmail.com', 'SGR.com');
                           $mail->Subject = "Order Confirm...";
                           $mail->isHTML(true);	   
                           $mail->Body = "Hi,".$name." your order is confirm,Thanks you for shopping with SGR.com!! We apppreciate your business and will do everything we can to meet your expectations";
                           if($mail->send())
	                       {
					             echo "activate_success";
			                     exit();
	                       }
			               else{ 
				               echo "nikal";
				               exit();
			                }
		                }
				  
			      }
				  
	    }
	}
	else
	{
		echo "nahi hua bhai";
		exit();
	}
}
//oiuytrety

if(isset($_POST["notconfirmorder"]))
 {
     $p_idd=$_POST["proId"];
     $x=1;
	$product_query = "UPDATE orders SET confirm='$x'  where order_id='$p_idd'";
	if(mysqli_query($con,$product_query)>0)
	{
		$sql="select user_id from orders where order_id='$p_idd'";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$row=mysqli_fetch_array($result);
			$user_id=$row[0];
			$sql="select * from user_info where user_id='$user_id'";
			$result1=mysqli_query($con,$sql);
			if(mysqli_num_rows($result1)>0)
			{
			           	$row2=mysqli_fetch_array($result1);
			               $email=$row2["email"];
						   $name=$row2["first_name"];
						   $last=$row2["last_name"];
		                   $mail = new PHPMailer();
                           $mail->Host = "smtp.gmail.com";
                           $mail->isSMTP();
                           $mail->SMTPAuth = true;
                           $mail->Username = "rajputji2010@gmail.com";
                           $mail->Password = "Grade123@";
                           $mail->SMTPSecure = "ssl";
                           $mail->Port = "465";
                           $mail-> addAddress($email);
                           $mail-> setFrom('rajputji2010@gmail.com', 'sgr.com');
                           $mail->Subject = "Order not Confirm...";
                           $mail->isHTML(true);	   
                           $mail->Body = "Hi,".$name." ".$last." your order is not confirm...Sorry!!";
                           if($mail->send())
	                       {
					             echo "yes";
			                     exit();
	                       }
			               else
						   { 
				               echo "nikal";
				               exit();
			                }
		                }
				  
			      }
				  
	    }
	}

//dfghjkkjbv
  if(isset($_POST["deleteproduct1"])){
		$p_idd=$_POST["proId"];
	$product_query = "delete from products where product_id='$p_idd'";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0)
	{
		    echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			  ";
	}
	else
	{
		echo "nahi hua bhai";
		exit();
	}
}
//hjyukjl;kjhgfdtyulkjvb
//dfghjlkjkljnlijj
 if(isset($_POST["edituser"])){
		$p_idd=$_POST["proId"];
		$x=1;
	$product_query = "UPDATE user_info SET type_check='$x' where user_id='$p_idd'";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0)
	{
		    echo "activate_success";
			exit();
	}
	else
	{
		echo "nahi hua bhai";
		exit();
	}
}
//iuytresdfghjkjhgshj
	if(isset($_POST["addToCart"])){
	  
	   if(!isset($_SESSION["uid"]))
	   {
		   echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Login First..!</b>
				</div>
			  ";
			  exit();
	   }
		$p_id = $_POST["proId"];
		if(isset($_SESSION["uid"]))
		{
         
		   $user_id = $_SESSION["uid"];
           
		   $sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		   $run_query = mysqli_query($con,$sql);
		   $count = mysqli_num_rows($run_query);
		   if($count > 0)
		   {
			 echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			  ";
		   } 
		   else 
		    {
            //ghjksss
			$x=0;
			$y=0;
			$sql="select * from cart where user_id='$user_id'";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0)
			{
				while($row=mysqli_fetch_array($result))
				{
					$x++;
					$y=$y+$row["qty"];
				}
				if($x==5||$y==5)
				{
						echo "
				                                 	<div class='alert alert-success'>
					                                	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					                                	<b>you can't add more then 5..!</b>
					                               </div>
				                                 ";
						exit();						 
				}
			}
			$sql1 = "SELECT available FROM products WHERE product_id = '$p_id' and available>0";
			$run_query2=mysqli_query($con,$sql1);
			if(mysqli_num_rows($run_query2)>0)
			{
				            	$sql = "INSERT INTO `cart`
			                    (`p_id`, `ip_add`, `user_id`, `qty`) 
		                       	VALUES ('$p_id','$ip_add','$user_id','1')";
		                      	if(mysqli_query($con,$sql))
			                     {
			                              	echo "
				                                 	<div class='alert alert-success'>
					                                	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					                                	<b>Product is Added..!</b>
					                               </div>
				                                 ";
		                       	}
			}
			else
			{
					echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Not In stock..!</b>
					</div>
				";
				   exit();
			}
		 			
		   }
		}
		else
		{
			
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) 
			{
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
					exit();
			}
			$sql = "INSERT INTO `cart`
			 (`p_id`, `ip_add`, `user_id`, `qty`) 
			  VALUES ('$p_id','$ip_add','-1','1')";
			   if (mysqli_query($con,$sql)) 
			{
				 echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product is Added Successfully..!</b>
					</div>
				";
				exit();
			}
			
		}
	}

//Count User cart item
if (isset($_POST["count_item"])) {
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
/*iuytrertyuiop/*
if(isset($_POST["checkavail"]))
{
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT a.available,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		$sql = "SELECT a.available,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if(mysqli_num_rows($query) > 0)
	{
		$row=mysqli_fetch_array($query);
		if($row[0]<$row[1])
		{
			echo "no";
			exit();
		}
		else{
		echo "yes";
		exit();}
	}
	
}*/
//ydfghjklllllmnb
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				echo '
					<div class="row">
						<div class="col-md-3">'.$n.'</div>
						<div class="col-md-3"><img class="img-responsive" src="product_images/'.$product_image.'" /></div>
						<div class="col-md-3">'.$product_title.'</div>
						<div class="col-md-3">$'.$product_price.'</div>
					</div>';
				
			}
			?>
				<a style="float:right;" href="cart.php" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
			<?php
			exit();
		}
	}
	if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			echo "<form method='post' action='login_form.php'>";
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["product_image"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];

					echo 
						'<div class="row">
								<div class="col-md-2">
									<div class="btn-group">
										<a href="#" remove_id="'.$product_id.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" update_id="'.$product_id.'" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
								<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
								<input type="hidden" name="" value="'.$cart_item_id.'"/>
								<div class="col-md-2"><img class="img-responsive" src="product_images/'.$product_image.'"></div>
								<div class="col-md-2">'.$product_title.'</div>
								<div class="col-md-2"><input type="text" class="form-control qty" value="'.$qty.'" ></div>
								<div class="col-md-2"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></div>
								<div class="col-md-2"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></div>
							</div>';
				}
				
				echo '<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b class="net_total" style="font-size:20px;"> </b>
					</div>';
				if (!isset($_SESSION["uid"])) {
					echo '<input type="submit" style="float:right;" name="login_user_with_product" class="btn btn-info btn-lg" value="Ready to Checkout" >
							</form>';
					
				}else if(isset($_SESSION["uid"])){
				   echo '
				         </form>
				          <form action="userpayment.php" method="post">
				          <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>Payment</button>
				        </form>';
					    exit();
				}
			}
	}
	
	
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}

//kjhgfdtyulkjvbn
if (isset($_POST["activateuser"])) {
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
}

//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	$sql="select * from cart where user_id='$_SESSION[uid]'";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$v=0;
		while($row=mysqli_fetch_array($result))
		{
			$v=$v+$row["qty"];
		}
		$sql="select * from cart where user_id='$_SESSION[uid]' and p_id='$update_id'";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$row=mysqli_fetch_array($result);
			$i=$row["qty"];
		if($v+$qty-$i>5)
		{
			echo"<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>You can't add more then five..!</b>
				</div>";
				exit();
		}
		}
	}
	
	
	
	
	
	$sql="select available from products where product_id='$update_id'";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result);
		if($qty==0)
		{
			echo"<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Not updated..!</b>
				</div>";
				exit();
		}
		if($row[0]<$qty)
		{
		echo"<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Quantity is not available..!</b>
				</div>";
				exit();
		}
	    else if($qty>5)
		{
			$qty=1;
			echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Not updated!</b>
				</div>";
				exit();
		}
	}
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}
}




?>






