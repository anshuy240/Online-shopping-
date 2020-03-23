<?php
session_start();
include "db.php";
$msg=$_POST["msg"];
$id=$_SESSION["mid"];
$sql="INSERT INTO `chating`(`user_id`,`adminmsg`) VALUES('$id','$msg')";
if(mysqli_query($con,$sql)>0)
{
	header("location:message3.php");
}
else
{
	header("location:message3.php");
}
?>