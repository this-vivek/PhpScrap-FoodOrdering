<?php
session_start();
$uid=$_SESSION['uid'];
$num=0;
	date_default_timezone_set("Asia/kolkata");
$date1=date("d-m-y h:i:sa");
$date2=date("d-m-y h:i:sa");
	include("connection.php");
	$r_id=@$_GET['r_id'];
	$f_name1="";
	$f_name2="";
	$f_name3="";
	$f_name4="";
	$f_name5="";
	$f_name6="";
	$f_name7="";
	$f_name8="";
	$f_name9="";
	$f_name10="";
	$f_name11="";
	$f_name12="";
		$f_id1="";
		$f_id2="";
		$f_id3="";
		$f_id4="";
		$f_id5="";
		$f_id6="";
		$f_id7="";
		$f_id8="";
		$f_id9="";
		$f_id10="";
		$f_id11="";
		$f_id12="";
	if(isset($_POST['check1']))
	{
		$f_name1=$_POST['check1'];
		$num++;
	}
		if(isset($_POST['check2']))
	{
		$f_name2=$_POST['check2'];
		$num++;
	}
		if(isset($_POST['check3']))
	{
		$f_name3=$_POST['check3'];
		$num++;
	}
		if(isset($_POST['check4']))
	{
		$f_name4=$_POST['check4'];
		$num++;
	}
		if(isset($_POST['check5']))
	{
		$f_name5=$_POST['check5'];
		$num++;
	}
		if(isset($_POST['check6']))
	{
		$f_name6=$_POST['check6'];
		$num++;
	}
		if(isset($_POST['check7']))
	{
		$f_name7=$_POST['check7'];
		$num++;
	}
		if(isset($_POST['check8']))
	{
		$f_name8=$_POST['check8'];
		$num++;
	}
		if(isset($_POST['check9']))
	{
		$f_name9=$_POST['check9'];
		$num++;
	}
		if(isset($_POST['check10']))
	{
		$f_name10=$_POST['check10'];
		$num++;
	}
		if(isset($_POST['check11']))
	{
		$f_name11=$_POST['check11'];
		$num++;
	}
		if(isset($_POST['check12']))
	{
		$f_name12=$_POST['check12'];
		$num++;
	}
	$sql=mysqli_query($conn,"select rating_c from customer where uid='$uid'");
	$result=mysqli_fetch_array($sql);
	$rate=$result[0];
	$ans=$rate+$num;
	$sql=mysqli_query($conn,"update customer set rating_c='$ans' where uid='$uid'");

	$i=0;
	$sql=mysqli_query($conn,"select count(f_name) from item where r_id='$r_id'");
	$result=mysqli_fetch_array($sql);
	$size=$result[0];
	
	$array[$size]=array();
	$f_id[$size]=array();
	$size2=0;
	$sql=mysqli_query($conn,"select count(f_id) from item where r_id='$r_id' and f_name in('$f_name1','$f_name2','$f_name3','$f_name4','$f_name5','$f_name6','$f_name7','$f_name8','$f_name9','$f_name10','$f_name11','$f_name12')");
	$result=mysqli_fetch_array($sql);
	print_r($result);
	$size2=$result[0];
	$sql=mysqli_query($conn,"select * from item where r_id='$r_id' and f_name in('$f_name1','$f_name2','$f_name3','$f_name4','$f_name5','$f_name6','$f_name7','$f_name8','$f_name9','$f_name10','$f_name11','$f_name12')");
	while($result=mysqli_fetch_assoc($sql))
	{
		$array[$i]=$result['price'];
		$f_id[$i]=strval($result['f_id']);
		$i++; 
		
	}
	

	$price=0;
	$id="";
	 for($i=0;$i<$size2;$i++)
	{
		$price+=$array[$i];
		$id=",".$f_id[$i].$id;
	}
	
	$sql=mysqli_query($conn,"insert into order_c (uid,r_id,f_id,status,t_price,date,date_status) values('$uid','$r_id','$id','pending','$price','$date1','$date2')");
	echo mysqli_error($conn);
	
	if($sql)
	{
		header("location:index.php?cart=successful");
	}
	else
	{
	header("location:index.php?cart=unsuccessful");
	}
	
?>