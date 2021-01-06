<?php
session_start();

	include("connection.php");
	$f_name=$_POST['f_name'];
	$rest=$_POST['restaurant'];
	$price=$_POST['price'];
	
	$sql=mysqli_query($conn,"select r_id from restaurant where r_name='$rest'");
	$r_id=mysqli_fetch_array($sql);

	$sql=mysqli_query($conn,"insert into item(f_name,r_id,price)values('$f_name','$r_id[0]','$price')");

	if($sql)
	{
		
		header("Location:food_insert.php?msg='successfull'");
	}
	else
	{
		header("Location:food_insert.php?msg='unsuccesfull'");
	}

?>