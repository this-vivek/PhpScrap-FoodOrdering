<?php
session_start();
include_once("connection.php");
//$uname="";
$status=0;

if(isset($_SESSION['log_status_admin']))
{
	$status=$_SESSION['log_status_admin'];
}
if($status==1)
{
	$status=1;
}
else
{
	header('location:login.php');
}
STATIC $num=1;
$display="";
$sql=mysqli_query($conn,"select count(name) from customer");
$result=mysqli_fetch_array($sql);
$size=$result[0];
STATIC $limit=0;
$i=0;

function tabs($name_f,$uname_f,$address_f,$num_f,$rating_c_f,$uid_f,$image_f,$display_f)
{
$togo=$rating_c_f;
$image_medal="";
$medal="";
if($rating_c_f<6)
{
	$medal="Bronze";
	$image_medal="bronze.svg";
	$togo=6-$togo;
}
else if($rating_c_f>6&&$rating_c_f<15)
{
	$medal="Silver";
	$image_medal="silver.svg";
	$togo=15-$togo;
}
else if($rating_c_f>15 && $rating_c_f<20)
{
	$medal="Gold";
	$image_medal="gold.svg";
	$togo=20-$togo;
}
else if($rating_c_f>20  && $rating_c_f<25)
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

	echo "<td><div class='box' style='display:".$display_f."' >";
	echo "<div class='img_container'>";
     echo "<a href='#'><img src='../images_user/".$image_f."' onclick=document.getElementById('r".$num_f."').style.display='block' class='rest_img'  ></a></div>";

echo '<div class="data_container"><p class="in_container4"><font color="black"><b>'.$name_f.'</font></b></p>';
echo '<p class="in_container3"><img src="photos/location.svg" width="10%" height="10%">Address:'.$address_f.'</p>';
echo '<p class="in_container3">uname:'.$uname_f.'</p>';
echo '<p class="in_container3">Uid:'.$uid_f.'</p>';
echo '<p class="in_container3">level:<img src="photos/'.$image_medal.'" width="5%" height="5%">'.$medal.'</p></div>';

echo "<div id='r".$num_f."'class='modal'>";
  

   echo '<form class="modal-content2 animate" action="action.php?op=delete_user" method="post" enctype="multipart/form-data">';
    echo "<div class='imgcontainer'>";
      echo "<span onclick=document.getElementById('r".$num_f."').style.display='none' class='close' title='Close Modal'>&times;</span>";
     
	 echo  "<img src='../images_user/".$image_f."' alt='Avatar' class='avatar'></div>";
 echo "<input type='hidden' name='uname' value='".$uname_f."'>";
 echo "<input type='hidden' name='uid' value='".$uid_f."'>";
    echo '<div class="in_container">';
     echo "<h2 align='center' class='in_container' id='in_container4'>".$name_f."</h2></u></a>";
	 echo  "<h4 align='center' class='in_container3'>Rating:".$medal."</h4>";
		
		 
	 echo '<button type="submit" >Delete User</button>';
	echo '<br><br></form>';
	

	  
    echo '</div></div></div>';
echo '</div></td>';
}

?>


<?php include("head.php"); ?>
<div id="container">
<center>
<table id="restaurants" border=0>
<?php
$name[$size]=array();
$uname[$size]=array();
$address[$size]=array();
$rating_c[$size]=array();
$uid[$size]=array();
$image[$size]=array();
$sql=mysqli_query($conn,"select * from customer");

$i=0;
while($result=mysqli_fetch_assoc($sql))
{
$name[$i]=@$result['name'];
$uname[$i]=@$result['uname'];
$address[$i]=@$result['address'];
$rating_c[$i]=@$result['rating_c'];
$uid[$i]=@$result['uid'];
$image[$i]=@$result['image'];
$i++;

}

/*$i=0;
$sql2=mysqli_query($conn,"select rating from restaurant");
while($result=mysqli_fetch_row($sql2))
{
$star[$i]=$result[0];
$i++;

}
*/
?>
<tr>
<?php 

for($i=0;$i<2;$i++)
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

tabs(@$name[$i],@$uname[$i],@$address[$i],@$num,@$rating_c[$i],@$uid[$i],@$image[$i],$display);
$num++;
$limit++; ?>

<?php } ?>
</tr>


<tr>
<?php 

for($i=2;$i<4;$i++)
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
tabs(@$name[$i],@$uname[$i],@$address[$i],@$num,@$rating_c[$i],@$uid[$i],@$image[$i],$display);
$num++;
$limit++; ?>

<?php } ?>

</tr>

<tr>
<?php 


for($i=4;$i<6;$i++)
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
tabs(@$name[$i],@$uname[$i],@$address[$i],@$num,@$rating_c[$i],@$uid[$i],@$image[$i],$display);
$num++;
$limit++; ?>

<?php } ?>
</tr>

<tr>
<?php 

for($i=6;$i<8;$i++)
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
tabs(@$name[$i],@$uname[$i],@$address[$i],@$num,@$rating_c[$i],@$uid[$i],@$image[$i],$display);
$num++;
$limit++; ?>

<?php } ?>
</tr>

<tr>
<?php 

for($i=8;$i<10;$i++)
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
tabs(@$name[$i],@$uname[$i],@$address[$i],@$num,@$rating_c[$i],@$uid[$i],@$image[$i],$display);
$num++;
$limit++; ?>
<?php } ?>
</tr>

</table>
</center>
	
</div>


<div id="footer">
<?php
echo "<font color='black'>"; echo $num;?>
</div>
</body>
</html>