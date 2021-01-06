<?php 
include("connection.php");
$o_id=$_POST['o_id'];
$sql=mysqli_query($conn,"delete from order_c where o_id='$o_id'");
if($sql)
{
	
	
	
	echo "<script>alert('order id deleted');
	window.open('index.php?successfull','_self');
	</script>";
}
else
{
	header("location:index.php?unsuccessfull");
}
?>