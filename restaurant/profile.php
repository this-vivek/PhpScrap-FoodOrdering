<?php
session_start();
include_once("connection.php");
$uname="";
$status=0;
$text1="";
$text2="";
STATIC $num=1;
$display="";
if(isset($_SESSION['log_status_res']))
{
	$status=$_SESSION['log_status_res'];
}
if($status==1)
{
	$text1="none";
	$text2="block";
	$uname=$_SESSION['username_res'];

}
else
{
	
	$text1="block";
	$text2="none";
}

$sql=mysqli_query($conn,"select * from restaurant where username='$uname'");
echo mysqli_error($conn);
$result=mysqli_fetch_assoc($sql);
$address=$result['address'];

$desc=$result['description'];
$rating_c=$result['rating'];
$name=$result['r_name'];
$image=$result['image'];

STATIC $limit=0;
$i=0;
function star_function($star_n)
{
	if($star_n==0)
	{
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";

	}
	else if($star_n==1)
	{
		echo "<span class='fa fa-star checked'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";

	}
	else if($star_n==2)
	{
		echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";

	}
	else if($star_n==3)
	{
		echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";

	}
	else if($star_n==4)
	{
		echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";
		echo "<span class='fa fa-star'></span>";

	}
	else if($star_n==5)
	{
		echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";	
	echo "<span class='fa fa-star checked'></span>";
	

	}
	else
	{
		exit();
	}
	
}
include("head.php");
?>
	<link rel="stylesheet" type="text/css" href="stylesheets/profile.css?v=3">
	<div class="both">
<div class="both_profile">
	<div class="profile_img">
		<img src="../images_rest/<?php echo $image;?>"  width="100%" height="100%" style="border-radius: 50%;">
	</div>
	<div class="profile_detail">
		<p class="text_style">welcome <?php echo $name;?></p>
		<p class="text_style2"><img src="location.svg"width="10%" height="10%"><?php echo $address;?></p>
		<p class="text_style3"><?php star_function($rating_c);?></p>
	</div>
	<div class="profile_bottom">
		
	<p class="profile_p"><?php echo $desc;?></p>
		
	</div>
	</div>

</div>
	</div>