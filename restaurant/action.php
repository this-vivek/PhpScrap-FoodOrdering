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

else if($op=="logout")
{
	unset($_SESSION['uname']);
	$_SESSION['log_status_res']=0;
	header("Location:index.php?msg='logout'");
}
else if($op=="login")
{
	$pass=$_POST['password'];

$uname=@$_POST['username1'];



$sql=mysqli_query($conn,"select password from restaurant where username='$uname' and password='$pass'");
$result=mysqli_fetch_assoc($sql);
$pass1=$result['password'];

if($pass1==$pass)
{
	$_SESSION['username_res']=$uname;
	$_SESSION['log_status_res']=1;
	
	header('Location:index.php?msg=true');
}
else
{
	$_SESSION['log_status_res']=0;
	header('Location:login.php?msg=f');
}
}
?>