<?php
session_start();
include_once("connection.php");
$uname="";
$status=0;
$text1="";
$text2="";
STATIC $num=1;
$display="";
if(isset($_SESSION['log_status']))
{
	$status=$_SESSION['log_status'];
}
if($status==1)
{
	$text1="none";
	$text2="block";
	$uname=$_SESSION['uname'];
}
else
{
	
	$text1="block";
	$text2="none";
}
$sql=mysqli_query($conn,"select * from customer where uname='$uname'");
$result=mysqli_fetch_assoc($sql);
$address=$result['address'];

$rating_c=$result['rating_c'];
$name=$result['name'];
$image=$result['image'];
$togo=$rating_c;
$image_medal="";
$medal="";
if($rating_c<6)
{
	$medal="Bronze";
	$image_medal="bronze.svg";
	$togo=6-$togo;
}
else if($rating_c>6&&$rating_c<15)
{
	$medal="Silver";
	$image_medal="silver.svg";
	$togo=15-$togo;
}
else if($rating_c>15 && $rating_c<20)
{
	$medal="Gold";
	$image_medal="gold.svg";
	$togo=20-$togo;
}
else if($rating_c>20  && $rating_c<25)
{
	$medal="Conqueror";
	$image_medal="conqueror.svg";
	$togo=25-$togo;
}
else
{
	$medal="Legendary";
	$togo="max";
	$image_medal="legendary.svg";
}
STATIC $limit=0;
$i=0;
include("head.php");
?>
	<link rel="stylesheet" type="text/css" href="stylesheets/profile.css?v=3">
	<div class="both">
<div class="both_profile">
	<div class="profile_img">
		<img src="images_user/<?php echo $image;?>"  width="100%" height="100%" style="border-radius: 50%;">
	</div>
	<div class="profile_detail">
		<p class="text_style">welcome <?php echo $name;?></p>
		<p class="text_style2"><img src="location.svg"width="10%" height="10%"><?php echo $address;?></p>
	</div>
	<div class="profile_bottom">
		<center><p class="text_style3"><img src="<?php echo $image_medal;?>" class="img_p"><?php echo $medal;?></p>
		<p class="profile_p"><?php echo $togo;?> points to level up</p></center>
	</div>
	</div>

</div>
	</div>