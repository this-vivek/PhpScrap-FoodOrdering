<?php
session_start();
include_once("connection.php");
if(isset($_SESSION['log_status_admin']))
{
	$status=$_SESSION['log_status_admin'];
}
if($status==1)
{
	
}
else
{
	header('location:login.php');
}
$sql=mysqli_query($conn,"select count(r_name) from restaurant");
$result=mysqli_fetch_array($sql);
$size=$result[0];
$i=0;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheets/homepage.css?v=3">
<link rel="stylesheet" type="text/css" href="stylesheets/cart.css?v=3">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<?php include("head.php"); ?>
<div id="container">
<?php
date_default_timezone_set("Asia/kolkata");
$selectedTime = date("h:i:sa");
$rest_name=array();
$f_id=array();
$f_name=array();
$status_fetch=array();
$price=array();
$price_ind=array();
$o_id=array();
$r_name=array();
$r_id=array();
$uid=array();
$uname=array();
$date_del=array();
$date_del_all=array();
$date_status=array();
$date=array();
$display="block";
$i=0;
$sql=mysqli_query($conn,"select count(r_id) from order_c");
$result=mysqli_fetch_array($sql);
$size=$result[0];
if($size!=0)
{
$sql=mysqli_query($conn,"select * from order_c order by date DESC");
while($result=mysqli_fetch_assoc($sql))
{
	$f_id[$i]=$result['f_id'];
	$status_fetch[$i]=$result['status'];
	$price[$i]=$result['t_price'];
	$o_id[$i]=$result['o_id'];
	$r_id[$i]=$result['r_id'];
	$date[$i]=$result['date'];
	$uid[$i]=$result['uid'];
	$date_del[$i]=$result['date_del'];
			$date_del_all[$i]=$result['date_del_all'];
				$date_status[$i]=$result['date_status'];
				if($status_fetch[$i]=="acceppted" && $date_del[$i]!="")
				{
					if($date_del[$i]>$selectedTime)
					{
						$status_fetch[$i]="completed";
						$date_status[$i]=$date_del[$i];
						$sql2=mysqli_query($conn,"update order_c set status='$status_fetch[$i]' where o_id='$o_id[$i]' ");
						echo mysqli_error($conn);

					}
					
				}
	$i++;
}
for($i=0;$i<sizeof($r_id);$i++)
{
	$query="select r_name from restaurant where r_id=$r_id[$i]";
$sql2=mysqli_query($conn,$query);
	$result2=mysqli_fetch_array($sql2);
	$r_name[$i]=$result2[0];
} 
for($i=0;$i<sizeof($r_id);$i++)
{
	$query="select uname from customer where uid=$uid[$i]";
$sql2=mysqli_query($conn,$query);
	$result2=mysqli_fetch_array($sql2);
	$uname[$i]=$result2[0];
} 
for($j=0;$j<sizeof($f_id);$j++)
{

/*print("f_id");
print_r($f_id);
print("status");
print_r($status_fetch);
print("price");
print_r($price);
print(sizeof($price));
print("o_id");
print_r($o_id);
print("o_id");
print_r($r_id);
exit;*/
$f_id_all=explode(',',$f_id[$j]);
for($i=0;$i<sizeof($f_id_all);$i++)
{
$sql=mysqli_query($conn,"select f_name,price from item where f_id='$f_id_all[$i]'");
$result=mysqli_fetch_assoc($sql);
$f_name[$i]=$result['f_name'];
$price_ind[$i]=$result['price'];

}



if($status_fetch[$j]=="completed")
{
	?>
<div id="cart" style="background-color: #ffee59;" >
<div class="top_cart">
	<p class="cart_head"><b>order no. :</b><?php echo $o_id[$j];?></p>
<p class="cart_head"><b>resturant:</b><?php echo $r_name[$j];?></p>
<p class="cart_head"><b>Customer:</b><?php echo $uname[$j];?></p>
<p class="cart_head"><b>date:</b><?php echo $date[$j];?></p>
<p class="cart_head"><b>status:</b>
<?php echo @$status_fetch[$j];?> on <?php echo @$date_status[$j];?></p>

</div>
<?php for($i=0;$i<sizeof($f_name);$i++)
	{ 
		 if($f_name[$i]=="")
	{
	$display="none";
	}
	else
	{
	$display="block";
	} 
?>
<div class="bottom_cart" style="display: <?php echo $display;?>">

<div class="left_position" id="cart_head"><b>item:</b><?php echo $f_name[$i];?></div>
<div class="right_position" id="cart_head"><b>quantity:</b>1<?php ?></div>
<div class="xright_position" id="cart_head"><b>price:</b><?php echo $price_ind[$i];?></div>
</div>


<?php }?>
<div class="bottom_cart">

<div class="left_position" id="cart_head"><b>total</b></div>
<div class="xright_position" id="cart_head"><?php echo $price[$j];?></div>
<form action="action_cart.php" method="POST" >
	<div class="xright_position" id="cart_head">
	<input type="hidden" name="o_id" value="<?php echo $o_id[$j];?>">
	<input type="submit" name="" value="delete">
</form>
</div>
</div>

</div>
<?php  }


if($status_fetch[$j]=="pending")
{
	?>
<div id="cart" style="background-color: #fff491;" >
<div class="top_cart">
	<p class="cart_head"><b>order no. :</b><?php echo $o_id[$j];?></p>
<p class="cart_head"><b>resturant:</b><?php echo $r_name[$j];?></p>
<p class="cart_head"><b>Customer:</b><?php echo $uname[$j];?></p>
<p class="cart_head"><b>date:</b><?php echo $date[$j];?></p>
<p class="cart_head"><b>status:</b>
<?php echo @$status_fetch[$j];?> from <?php echo @$date_status[$j];?></p>

</div>
<?php for($i=0;$i<sizeof($f_name);$i++)
	{ 
		 if($f_name[$i]=="")
	{
	$display="none";
	}
	else
	{
	$display="block";
	} 
?>
<div class="bottom_cart" style="display: <?php echo $display;?>">

<div class="left_position" id="cart_head"><b>item:</b><?php echo $f_name[$i];?></div>
<div class="right_position" id="cart_head"><b>quantity:</b>1<?php ?></div>
<div class="xright_position" id="cart_head"><b>price:</b><?php echo $price_ind[$i];?></div>
</div>


<?php }?>
<div class="bottom_cart">

<div class="left_position" id="cart_head"><b>total</b></div>
<div class="xright_position" id="cart_head"><?php echo $price[$j];?></div>
<form action="action_cart.php" method="POST" >
	<div class="xright_position" id="cart_head">
	<input type="hidden" name="o_id" value="<?php echo $o_id[$j];?>">
	<input type="submit" name="" value="delete">
</form>
</div>
</div>

</div>
<?php  }


if($status_fetch[$j]=="acceppted")
{
	?>
<div id="cart"  style="background-color:#ffb5b5;">
<div class="top_cart">
	<p class="cart_head"><b>order no. :</b><?php echo $o_id[$j];?></p>
<p class="cart_head"><b>resturant:</b><?php echo $r_name[$j];?></p>
<p class="cart_head"><b>Customer:</b><?php echo $uname[$j];?></p>
<p class="cart_head"><b>date:</b><?php echo $date[$j];?></p>
<p class="cart_head"><b>status:</b>
<?php echo @$status_fetch[$j];?> on <?php echo @$date_status[$j];?></p>

</div>
<?php for($i=0;$i<sizeof($f_name);$i++)
	{ 
		 if($f_name[$i]=="")
	{
	$display="none";
	}
	else
	{
	$display="block";
	} 
?>
<div class="bottom_cart" style="display: <?php echo $display;?>">

<div class="left_position" id="cart_head"><b>item:</b><?php echo $f_name[$i];?></div>
<div class="right_position" id="cart_head"><b>quantity:</b>1<?php ?></div>
<div class="xright_position" id="cart_head"><b>price:</b><?php echo $price_ind[$i];?></div>
</div>


<?php }?>
<div class="bottom_cart">

<div class="left_position" id="cart_head"><b>total</b></div>
<div class="xright_position" id="cart_head"><?php echo $price[$j];?></div>
<form action="action_cart.php" method="POST" >
	<div class="xright_position" id="cart_head">
	<input type="hidden" name="o_id" value="<?php echo $o_id[$j];?>">
	<input type="submit" name="" value="delete">
</form>
</div>
</div>

</div>
<?php  }


if($status_fetch[$j]=="cancelled")
{
	?>
<div id="cart" style="background-color:#ff7247" >
<div class="top_cart">
	<p class="cart_head"><b>order no. :</b><?php echo $o_id[$j];?></p>
<p class="cart_head"><b>resturant:</b><?php echo $r_name[$j];?></p>
<p class="cart_head"><b>Customer:</b><?php echo $uname[$j];?></p>
<p class="cart_head"><b>date:</b><?php echo $date[$j];?></p>
<p class="cart_head"><b>status:</b>
<?php echo @$status_fetch[$j];?> on <?php echo @$date_status[$j];?></p>

</div>
<?php for($i=0;$i<sizeof($f_name);$i++)
	{ 
		 if($f_name[$i]=="")
	{
	$display="none";
	}
	else
	{
	$display="block";
	} 
?>
<div class="bottom_cart" style="display: <?php echo $display;?>">

<div class="left_position" id="cart_head"><b>item:</b><?php echo $f_name[$i];?></div>
<div class="right_position" id="cart_head"><b>quantity:</b>1<?php ?></div>
<div class="xright_position" id="cart_head"><b>price:</b><?php echo $price_ind[$i];?></div>
</div>


<?php }
}
{
		echo '<br><br><br><center><span class="styleit" style="font-size:30px;top:30%;">NO ORDER PRESENT</span></center>';
	}?>
<div class="bottom_cart">

<div class="left_position" id="cart_head"><b>total</b></div>
<div class="xright_position" id="cart_head"><?php echo $price[$j];?></div>
<form action="action_cart.php" method="POST" >
	<div class="xright_position" id="cart_head">
	<input type="hidden" name="o_id" value="<?php echo $o_id[$j];?>">
	<input type="submit" name="" value="delete">
</form>
</div>
</div>

</div>
<?php  }
?>

<?php  }{
		echo '<br><br><br><center><span class="styleit" style="font-size:30px;top:30%;">NO ORDER PRESENT</span></center>';
	}
?>
</div>

<div id="footer">
<?php
echo "<font color='black'>";
?>
</div>
</body>
</html>