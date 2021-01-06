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
date_default_timezone_set("Asia/kolkata");
$selectedTime = date("h:i:sa");
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
function tabs($display_f,$array_f,$star_f,$num_f,$address_f,$description_f,$r_id_f)
{

	echo "<td><div class='box' style='display:".$display_f."' >";
     echo "<a href='#'><img src='meal1.jpg' onclick=document.getElementById('r".$num_f."').style.display='block'  width='100%' height='30%'></a>";
echo "<div id='r".$num_f."'class='modal'>";
  
  echo "<div class='modal-content animate' >";
    echo "<div class='imgcontainer'>";
      echo "<span onclick=document.getElementById('r".$num_f."').style.display='none' class='close' title='Close Modal'>&times;</span>";
     
	 echo  '<img src="meal1.jpg" alt="Avatar" class="avatar"></div>';

    echo '<div class="in_container">';
     echo "<a href='food.php?r_id=".$r_id_f."'><h2 align='center' class='in_container'>".$array_f."</h2></u></a>";
	 echo  "<h4 align='center' class='in_container'>".$address_f."</h4>";
		 echo '<center>';
		 star_function($star_f);
		 echo '</center>';
		 
	  echo "<p align='center' class='in_container'>".$description_f."</p>";
	
	

	  
    echo '</div></div></div>';
echo '<p><b>'.$array_f.'</b></p>';
echo '<p>'.$address_f.'</p></div></td>';
}

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
$rest_name[1]=array();
$f_id[1]=array();
$f_name=array();
$status_fetch[1]=array();
$price[1]=array();
$price_ind=array();
$o_id[1]=array();
$r_name=array();
$date=array();
$date_del=array();
$date_del_all=array();
$date_status=array();
$display="block";
$i=0;
$r_id=array();
$sql=mysqli_query($conn,"select count(r_id) from order_c where uid='$id' order by date DESC ");
$result=mysqli_fetch_array($sql);
$size=$result['0'];
if($size!=0)
{
$sql=mysqli_query($conn,"select * from order_c where uid='$id' order by date DESC ");
while($result=mysqli_fetch_assoc($sql))
{
	$f_id[$i]=$result['f_id'];
	$status_fetch[$i]=$result['status'];
	$price[$i]=$result['t_price'];
	$o_id[$i]=$result['o_id'];
	$r_id[$i]=$result['r_id'];
	$date[$i]=$result['date'];
		$date_del[$i]=$result['date_del'];
			$date_del_all[$i]=$result['date_del_all'];
				$date_status[$i]=$result['date_status'];
				if($status_fetch[$i]=="acceppted" && $date_del[$i]!="")
				{
					if($date_del<$selectedTime)
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
@$sql2=mysqli_query($conn,$query);
	@$result2=mysqli_fetch_array($sql2);
	@$r_name[$i]=$result2[0];
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
@$f_name[$i]=$result['f_name'];
@$price_ind[$i]=$result['price'];

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


if(@$status_fetch[$j]=="pending")
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

if(@$status_fetch[$j]=="completed")
{
	?>
<div id="cart" style="display:<?php echo $display2;?>;background-color: #ffee59;" >
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
if(@$status_fetch[$j]=="cancelled")
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
if(@$status_fetch[$j]=="acceppted")
{
	?>
<div id="cart" style="display:<?php echo $display2;?>;background-color:#ffb5b5;" >
<div class="top_cart">
	<p class="cart_head"><b>order no. :</b><?php echo $o_id[$j];?></p>
<p class="cart_head"><b>resturant:</b><?php echo $r_name[$j];?></p>
<p class="cart_head"><b>date:</b><?php echo $date[$j];?></p>
<p class="cart_head"><b>status:</b>
	<?php echo @$status_fetch[$j];?> and will be Delivered within 30 min.</p>

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
}
}
else
	{
		echo '<br><br><br><center><span class="styleit" style="font-size:30px;top:30%;">NO ORDER PRESENT</span></center>';
	}?>
</div>

<div id="footer">
<?php
echo "<font color='black'>"; echo $num;?>
</div>
</body>
</html>