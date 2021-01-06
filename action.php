<?php
session_start();
include("connection.php");
$op=$_GET['op'];


if($op=="login")
{
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$sql=mysqli_query($conn,"select uname,uid from customer where uname='$uname' and pass='$pass'");

$result=mysqli_fetch_assoc($sql);
$uid=$result['uid'];

if($result>0)
{
	
	$_SESSION['uname']=$uname;
	$_SESSION['uid']=$uid;
	$_SESSION['log_status']=1;
	header('Location:index.php');
}
else
{
	$_SESSION['log_status']=0;
	header('Location:login.php?msg="f"');
}
}
else if($op=="signin")
{
	include("connection.php");
	$name=$_POST['name'];
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	$image=$_FILES['image']['name'];
	$img_path=$_FILES['image']['tmp_name'];

	$extension=pathinfo($image,PATHINFO_EXTENSION);
	
	move_uploaded_file($img_path,"images_user/".$image);
	$allowed_image_extension=array("png","jpeg","jpg");

	if(!in_array($extension,$allowed_image_extension))
	{
	header("location:restaurant_insert.php?msg='invalid extension $extension'");
	
	}
	$sql=mysqli_query($conn,"insert into customer(name,contact,uname,pass,address,image)values('$name','$contact','$uname','$pass','$address','$image')");
	
	if($sql)
	{
		header("Location:index.php?msg='successfull'");
	}
	else
	{
		header("Location:index.php?msg='unsuccesfull'");
	}
}
else if($op=="logout")
{
	unset($_SESSION['uname']);
	unset($_SESSION['uid']);
	$_SESSION['log_status']=0;
	header("Location:index.php?msg='logout'");
}
?>