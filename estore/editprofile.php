<?php 
       
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
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					
					<div class="panel-body">
						<!--User Login Form-->
						<form action="edit1.php" method="post">
							<label for="email">Email:</label>
							<input type="email" class="form-control" name="email" id="email" required/>
							<p><br/></p>
							<input type="submit" class="btn btn-success" style="float:right;" Value="forget">						
						</form>
				</div>
				<div class="panel-footer"><div id="e_msg"></div></div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>
