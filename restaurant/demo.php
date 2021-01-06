<?php
session_start();
include_once("connection.php");
$id=$_SESSION['uid'];
$uname="";
$status=0;
$text1="";
$text2="";
STATIC $num=1;
$display="";
$selectedTime = date("h:i:sa");
if(isset($_SESSION['log_status_res']))
{
	$status=$_SESSION['log_status_res'];
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
$sql=mysqli_query($conn,"select * from restaurant where username='$username' ");
$result=mysqli_fetch_assoc($sql);
$r_id=@$result['r_id'];
$r_name=@$result['r_name'];
STATIC $limit=0;
$i=0;

<?php include("head.php"); ?>
<div id="container">
	<h1 align="center">Orders</h1>
<?php
$rest_name[1]=array();
$f_id[1]=array();
$f_name=array();
$status_fetch[1]=array();
$price[1]=array();
$price_ind=array();
$o_id[1]=array();
$uname=array();
$r_name=array();
$date=array();
$date_del=array();
$date_del_all=array();
$date_status=array();
$uid=array();
$display="block";
$i=0;


$sql=mysqli_query($conn,"select * from order_c where r_id='$r_id' order by date DESC");
while($result=mysqli_fetch_assoc($sql))
{
	$f_id[$i]=$result['f_id'];
	$status_fetch[$i]=$result['status'];
	$price[$i]=$result['t_price'];
	$o_id[$i]=$result['o_id'];
	$date[$i]=$result['date'];
		$date_del[$i]=$result['date_del'];
			$date_del_all[$i]=$result['date_del_all'];
				$date_status[$i]=$result['date_status'];
				if($status_fetch[$i]=="pending" && $date_del[$i]!="")
				{
					if($date_del>$selectedTime)
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
@$f_id_all=explode(',',$f_id[$j]);

for($i=0;$i<@sizeof($f_id_all);$i++)
{
$sql=mysqli_query($conn,"select f_name,price from item where f_id='$f_id_all[$i]'");
$result=mysqli_fetch_assoc($sql);
$f_name[$i]=$result['f_name'];
$price_ind[$i]=$result['price'];

}
/*print(" resturant ");
print_r($r_name);
print(" f_name ");
print_r($f_name);
print(" status ");
print_r($status_fetch);
print(" price ");
print_r($price);
print(" o_id ");
print_r($o_id);
exit;*/
$display2="block";
$hello=@$r_name[$j];

if($hello=="")
{
	$display2="none";
}


if($status_fetch[$j]=="pending")
{
	?>
<div id="cart" style="display:<?php echo $display2;?>;background-color:#fff491" >
<div class="top_cart">
	<p class="cart_head"><b>order no. :</b><?php echo $o_id[$j];?></p>
<p class="cart_head"><b>resturant:</b><?php echo $r_name[$j];?></p>
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
</div>

</div>
<?php  }

if($status_fetch[$j]=="completed")
{
	?>
<div id="cart" style="display:<?php echo $display2;?>;#ffee59;" >
<div class="top_cart">
	<p class="cart_head"><b>order no. :</b><?php echo $o_id[$j];?></p>
<p class="cart_head"><b>resturant:</b><?php echo $r_name[$j];?></p>
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
</div>

</div>
<?php  }
if($status_fetch[$j]=="cancelled")
{
	?>
<div id="cart" style="display:<?php echo $display2;?>;background-color:#ff7247;" >
<div class="top_cart">
	<p class="cart_head"><b>order no. :</b><?php echo $o_id[$j];?></p>
<p class="cart_head"><b>resturant:</b><?php echo $r_name[$j];?></p>
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
</div>

</div>
<?php  }
if($status_fetch[$j]=="acceppted")
{
	?>
<div id="cart" style="display:<?php echo $display2;?>;background-color:#ffb5b5;" >
<div class="top_cart">
	<p class="cart_head"><b>order no. :</b><?php echo $o_id[$j];?></p>
<p class="cart_head"><b>resturant:</b><?php echo $r_name[$j];?></p>
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
</div>

</div>
<?php  }
}?>
</div>

<div id="footer">
<?php
echo "<font color='black'>"; echo $num;?>
</div>
</body>
</html>