<?php
session_start();
include("connection.php");
$op=$_GET['op'];
if($op=="delete_user")
{
$uid=$_POST['uid'];
$sql=mysqli_query($conn,"delete from order_c where uid='$uid'");
$sql=mysqli_query($conn,"delete from customer where uid='$uid'");


if($sql)
{

	header('Location:index.php');
}
else
{
	header('Location:index.php?msg="f"');
}
}
else if($op=="update_rest")
{
$r_id=$_GET['r_id'];
$r_name=$_POST['name'];
$uname=$_POST['uname'];
$address=$_POST['address'];
$desc=$_POST['desc'];
$desc="'".$desc."'";
$image=$_FILES['image']['name'];
	$img_path=$_FILES['image']['tmp_name'];

	$extension=pathinfo($image,PATHINFO_EXTENSION);
	
	move_uploaded_file($img_path,"../images_user/".$image);
	$allowed_image_extension=array("png","jpeg","jpg");

	if(!in_array($extension,$allowed_image_extension))
	{
	header("location:restaurants.php?msg='invalid extension $extension'");
	
	}
$sql=mysqli_query($conn,"update restaurant set username='$uname', r_name='$r_name', address='$address', description='$desc', image='$image' where r_id='$r_id'");



if($sql)
{

	echo "<script>alert('restaurants ".$name."updated');
	window.open('restaurants.php?successfull','_self');
	</script>";
}
else
{

echo "<script>alert('unable to update');
	window.open('restaurants.php?successfull','_self');
	</script>";
}
}
else if($op=="logout")
{
	unset($_SESSION['uname']);
	$_SESSION['log_status_admin']=0;
	header("Location:index.php?msg='logout'");
}
else if($op=="login")
{
	$pass=$_POST['password'];

$uname=@$_POST['username1'];



$sql=mysqli_query($conn,"select password from admin where uname='$uname' and password='$pass'");
$result=mysqli_fetch_assoc($sql);
$pass1=$result['password'];

if($pass1==$pass)
{
	
	$_SESSION['log_status_admin']=1;
	
	header('Location:index.php?msg=true');
}
else
{
	$_SESSION['log_status_admin']=0;
	header('Location:login.php?msg=f');
}
}
?>