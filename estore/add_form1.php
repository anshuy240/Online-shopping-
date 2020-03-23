<?php
session_start();
if (isset($_GET["addproduct1"])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Online Selling</title>
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
				<a href="admin_index.php" class="navbar-brand">Online selling</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="admin_index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="admin_product.php?product1=1"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="add_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Add Product</div>
					<div class="panel-body">	
					<form onsubmit="return false" id="product_add">
						<div class="row">
							<div class="col-md-6">
								<label for="category">Product category</label>
								<select name="category" class="form-control">
								     <option  value="category">select</option>
                                     <option value="electronics">Electronics</option>
                                     <option  value="ladies wear">Ladies wear</option>
                                     <option  value="men wear">Men wear</option>
                                     <option  value="kids wear">Kids wear</option>
									 <option  value="Furniture">Furniture</option>
									 <option  value="Home Appliance">Home Appliance</option>
									 <option  value="electronics gadgets">Electronics gadgets</option>
                                </select>
							</div>
							<div class="col-md-6">
								<label for="brand">Brand</label>
								<select name="brand" class="form-control">
								     <option value="category">select</option>
                                     <option  value="HP">HP</option>
                                     <option  value="Samsung">Samsung</option>
                                     <option  value="Apple">Apple</option>
                                     <option value="LG">LG</option>
									 <option  value="Sony">Sony</option>
									  <option  value="Clothe Brand">Clothe Brand</option>
                                </select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="email">Product Title</label>
								<input type="text" id="title" name="title" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="mobile">Price</label>
								<input type="text" id="price" name="price" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="address1">Product Description</label>
								<input type="text" id="desc" name="desc" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="address2">Product Image</label>
								<input type="file"  name="file1" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="address2">Product Keywords</label>
								<input type="text" id="keyword1" name="keyword1"class="form-control">
							</div>
						</div>
						<p><br/></p>
						<div class="row">
							<div class="col-md-12">
								<input style="width:100%;" value="add product" type="submit" name="sign_button" class="btn btn-success btn-lg">
							</div>
						</div>
						
					</div>
					</form>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>
<?php
}
?>





















