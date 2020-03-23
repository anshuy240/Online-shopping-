<?php 
 session_start();
if (isset($_GET["change"])) {
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
         <div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="change_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>		
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Online Selling</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">Customer Login Form</div>
					<div class="panel-body">
						<!--User Login Form-->
						 <?php echo "Hi,".$_SESSION["email"]; ?>
						<form id="change_form" onsubmit="return false">
							<label for="email">Old Password</label>
							<input type="password" class="form-control" name="password" id="password" required/>
							<label for="email">New Password</label>
							<input type="password" class="form-control" name="newpassword" id="password" required/>
							<label for="email">Re-type new Password</label>
							<input type="password" class="form-control" name="renewpassword" id="password" required/>
							<p><br/></p>
							<a href="forget_form.php?forget=1" style="color:#333; list-style:none;">Forgotten Password</a>
							<input style="width:100%;" value="Save Changes" type="submit" name="signup_button" class="btn btn-success btn-lg">
							<!--If user dont have an account then he/she will click on create account button-->					
						</form>
				</div>
				<div class="panel-footer"><div id="e_msg"></div></div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>
<?php
}
?>





















