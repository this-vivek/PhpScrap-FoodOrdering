<?php 
include("connection.php");
$op=$_GET['op'];
$o_id=$_POST['o_id'];
date_default_timezone_set("Asia/kolkata");
$date_current=date("d-m-y h:i:sa");
if($op=='cancelled')
{

$sql=mysqli_query($conn,"update  order_c set status='cancelled',date_status='$date_current' where o_id='$o_id'");
if($sql)
{
	
	echo "<script>alert('order id:".$o_id." Cancelled');
	window.open('index.php?successfull','_self');
	</script>";
}
else
{
	header("location:index.php?unsuccessfull");
}
}
else if($op=='accepted')
{
$selectedTime = date("h:i:sa");
$endTime = strtotime("+30 minutes", strtotime($selectedTime));
$date1=date('h:i:sa', $endTime);
$date2="";
$date2=date("d-m-y ".$date1);
$message=1;
$sql=mysqli_query($conn,"update  order_c set status='acceppted',date_del_all='$date2',date_del='$date1',date_status='$date_current',message='$message' where o_id='$o_id'");
echo mysqli_error($conn);

if($sql)
{
	
	echo "<script>alert('order id".$o_id."acceppted');
	window.open('index.php?successfull','_self');
	</script>";
}
else
{
	header("location:index.php?unsuccessfull");
}
}

?>