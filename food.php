<?php
session_start();
include_once("connection.php");
$uname="";
$status=0;
$text1="";
$text2="";
$status=0;
$r_name=$_GET['r_name'];
STATIC $num=1;
$display="";
$r_id=$_GET['r_id'];
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

$sql=mysqli_query($conn,"select count(f_name) from item where r_id='$r_id' ");
$result=mysqli_fetch_array($sql);
$size=$result[0];



$sql=mysqli_query($conn,"select image from restaurant where r_id='$r_id' ");
$result=mysqli_fetch_assoc($sql);
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
function food($f_name_f,$display_f,$price_f,$num_f)
{	
echo "<td class='border_style' style='display:".$display_f."'>";
echo "<div class='left_text'>";
echo "<p style='display:".$display_f."' class='style_text' id='style_text' value='".$f_name_f."' >".$f_name_f."</p></div>&nbsp";
echo "<div class='right_text'><input type='checkbox' value='".$f_name_f."' id='check".$num_f."' name='check".$num_f."' onclick='calprice();'  class='checkbox'></div>
<div class='center_text'><input type='hidden' value='".$price_f."' name='food".$num_f."' id='food".$num_f."'class='style_text' ></p></div>";
echo "<p style='display:".$display_f."' class='style_text'> ₹".$price_f."</p>";
echo "</td>";

}
?>
<html>
	<head>

		<link rel="stylesheet" type="text/css" href="stylesheets/food.css?v=3">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="scripts/food.js"></script>



<?php include("head.php"); ?>
<div id="container">
<div class="intro">

<div class="left">
<img src="images_rest/<?php echo $image;?>" class="rest_img2" style="border-radius:2%"  >
</div>
<div class="right">
<h1 class="styleMe"><?php echo $r_name;?></h1>
<div class="inside_right">
</div>
</div>
<div class="mright">
<h4>If more of us valued food and cheer and song above hoarded gold, it would be a merrier world.</h4>
</div>
</div>
<center>
<form action="action_order.php?r_id=<?php echo $r_id;?>" method="POST">
<table class="meals" border=0 >
<?php
$f_name[$size]=array();
$price[$size]=array();
$sql=mysqli_query($conn,"select * from item where r_id='$r_id'");

$i=0;
while($result=mysqli_fetch_assoc($sql))
{
$f_name[$i]=$result['f_name'];
$price[$i]=$result['price'];

$i++;

}
if($size==1)
{
$price[1]=null;
$f_name[1]=null;
}
?>
<tr>
<?php 

for($i=0;$i<3;$i++)
{
	if($limit<$size)
	{
		$display="block";
	}
	else
	{
		$display="none";
	}
?>
<?php 
echo "<div id='td_table' style='display:".@$display."'>";
food(@$f_name[$i],@$display,@$price[$i],@$num);
echo "<div>";
$num++;
$limit++; ?>

<?php } ?>
</tr>
<tr>
<?php 

for($i=3;$i<6;$i++)
{
	if($limit<$size)
	{
		$display="block";
	}
	else
	{
		$display="none";
	}
?>
<?php 


food(@$f_name[$i],@$display,@$price[$i],@$num);
$num++;
$limit++; ?>

<?php } ?>
</tr>
<tr>
<?php 

for($i=6;$i<9;$i++)
{
	if($limit<$size)
	{
		$display="block";
	}
	else
	{
		$display="none";
	}
?>
<?php 
echo "<font color='white'>";

food(@$f_name[$i],@$display,@$price[$i],@$num);
$num++;
$limit++; ?>

<?php } ?>
</tr>
<tr>
<?php 

for($i=9;$i<12;$i++)
{
	if($limit<$size)
	{
		$display="block";
	}
	else
	{
		$display="none";
	}
?>
</font>
<?php 


food(@$f_name[$i],@$display,@$price[$i],@$num);
$num++;
$limit++; ?>

<?php } ?>
</tr>
</table>
</center>
<p id="demo"></p>
<button type="button" class="button" value="submit" onclick="document.getElementById('id08').style.display='block'">submit</button>
<div id="id08" class="modal_new">
  
  <div class="modal-content_new animate">
    <div class="imgcontainer_new ">
      <span onclick="document.getElementById('id08').style.display='none'" class="close" title="Close Modal">&times;</span>
     <h3 class="cart_top">
     	<?php echo $r_name;?>
     </h3>
    </div>


    <div class="container_new" style="background-color:#f1f1f1">
    	<div class="cart_bottom">
    		<div class="cart_bottom_left">
    	<span id="first"></span><br>
    	<span id="second"></span><br>
    	<span id="third"></span><br>
    	<span id="fourth"></span><br>
    	<span id="fifth"></span><br>
    	<span id="six"></span><br>
    	<span id="seven"></span><br>
    	<span id="eight"></span><br>
    	<span id="nine"></span><br>
    	<span id="ten"></span><br>
    	<span id="eleven"></span><br>
    	<span id="twlewe"></span><br>
    	
    </div>
    <div class="cart_bottom_right">
    	  <span id="a"></span><br>
        <span id="b"></span><br>
        <span id="c"></span><br>
        <span id="d"></span><br>
        <span id="e"></span><br>
        <span id="f"></span><br>
        <span id="g"></span><br>
        <span id="h"></span><br>
        <span id="i"></span><br>
        <span id="j"></span><br>
        <span id="k"></span><br>
        <span id="l"></span><br>
       
    </div>
    </div>
    <div class="cart_bottom_footer">
    		<div class="cart_bottom_left">
    			<span id="">Total</span><br>
    		</div>
    	 <div class="cart_bottom_right">
    	 <span id="m"></span><br>
    	</div>
    </div><?php 
    if($status==1)
    {
    echo  '<button type="submit">order</button>';
    }
    else
    {
    	echo "<div class='style_text'>kindly LogIn first<a href='login.php'>click here</a></div>";
    }?>
      <label>
	    
      <div class="orderbtn2">
      
     </div>
    </div>
  </form>
</div>
</div>

<div id="footer">
<?php
echo "<font color='black'>"; echo $num;?>
</div>
</body>
</html>