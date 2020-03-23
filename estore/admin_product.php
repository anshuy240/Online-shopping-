<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Online selling</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">Online selling</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="admin_index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
			</ul>
			<form class="navbar-form navbar-left" >
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search user" name="searchuser">
		        </div>
		        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" style='float:right;'></span></button>
		     </form>
			<ul class="nav navbar-nav navbar-right">
			<div class="panel-body">
					<button class="btn btn-success"><a href="add_form1.php?addproduct1=1" style="color:#333; list-style:none;">Product Add</a>
				</button>	</div>
			</ul>
		</div>
	</div>
</div>	
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2 col-xs-12">
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="deletee_msg">
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Product</div>
					<div class="panel-body">
						<?php
    include "db.php";
	$product_query = "SELECT * FROM products";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0)
	{
		
		while($row = mysqli_fetch_array($run_query))
		{
			$x="";
			$pro_id    = $row['product_id'];
			$pro_title   = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_desc=$row[5];
				 echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title
								</div>
								<div class='panel-body'>
									 <div class='panel-heading'>$pro_id
								     </div>
								     <div class='panel-heading'>$pro_title
								     </div>
								     <div class='panel-heading'>$pro_price
								     </div>
							     </div>
								 <div class='panel-heading'>
									<button pid='$pro_id' style='float:left;' id='edit_form1' class='btn btn-danger btn-xs'>Edit</button>
									<button pid='$pro_id'  id='desc_form1' class='btn btn-danger btn-xs'>description</button>
									<button pid='$pro_id' style='float:right;' id='delete_form1' class='btn btn-danger btn-xs'>Delete</button>
								</div>
							</div>
						</div>	
			";
		}
	}
	else
	{
		echo "nahi hua bhai";
		exit();
	}
?>
					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="row">
					<div class="col-md-12 col-xs-12" id="delete_msg">
					</div>
				</div>
		</div>
	</div>
</body>
</html>