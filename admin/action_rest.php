<?php
session_start();

	include("connection.php");
	$name=$_POST['name'];
	$desc=$_POST['desc'];
	$pass=$_POST['pass'];
	$username=$_POST['username'];
	$rating=$_POST['rating'];
	$address=$_POST['address'];
	$image=$_FILES['image']['name'];
	$img_path=$_FILES['image']['tmp_name'];

	$extension=pathinfo($image,PATHINFO_EXTENSION);
	
	move_uploaded_file($img_path,"images_rest/".$image);
	$allowed_image_extension=array("png","jpeg","jpg");

	if(!in_array($extension,$allowed_image_extension))
	{
	header("location:restaurant_insert.php?msg='invalid extension $extension'");
	
	}
	


	$sql=mysqli_query($conn,"insert into restaurant(r_name,password,description,rating,address,image,username)values('$name','$pass','$desc','$rating','$address','$image','$username')");

	if($sql)
	{
		header("Location:restaurant_insert.php?msg='successfull'");
	}
	else
	{
		header("Location:restaurant_insert.php?msg='unsuccesfull'");
	}

?>