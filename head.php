<?php

include_once("connection.php");
$id="";
if(isset($_SESSION['uid']))
{
  $id=$_SESSION['uid'];
}
if($id!="")
{
  date_default_timezone_set("Asia/kolkata");
  $selectedTime_2 = date("h:i:sa");



  $id_2=$_SESSION['uid'];
  $rest_name_2[1]=array();
$status_fetch_2[1]=array();
$o_id_2[1]=array();
$r_name_2=array();
$date_status_2=array();
$message_2=array();
$display_2="block";
$i=0;
$completed_2="completed";
$sql=mysqli_query($conn,"select * from order_c where uid='$id_2' and status!='$completed_2' order by date DESC ");
echo mysqli_error($conn);


while($result=mysqli_fetch_assoc($sql))
{
 
  $status_fetch_2[$i]=$result['status'];
  $o_id_2[$i]=$result['o_id'];
  $r_id_2[$i]=$result['r_id'];
  $date_2[$i]=$result['date'];
    $date_del_2[$i]=$result['date_del'];
      $date_del_all_2[$i]=$result['date_del_all'];
        $date_status_2[$i]=$result['date_status'];
        if($status_fetch_2[$i]=="acceppted" && $date_del_2[$i]!="")
        {
          if($date_del_2[$i]<$selectedTime_2)
          {
            $status_fetch_2[$i]="completed";
            $date_status_2[$i]=$date_del_2[$i];
            $sql2=mysqli_query($conn,"update order_c set status='$status_fetch_2[$i]',date_status='$date_status_2[$i]',message=1 where o_id='$o_id_2[$i]' ");
            echo mysqli_error($conn);

          }
          
        }
  $status_fetch_2[$i]=$result['status'];
  $message_2[$i]=$result['message'];
  if($message_2[$i]==1)
  {
    $sql2=mysqli_query($conn,"select * from restaurant where r_id='$r_id_2[$i]'");
    $result=mysqli_fetch_assoc($sql2);
    $r_name_2[$i]=$result['r_name'];
    echo '<script>alert("'.$o_id_2[$i].' has been '.$status_fetch_2[$i].' by '.$r_name_2[$i].'on '.$date_status_2[$i].'");</script>';
    $sql2=mysqli_query($conn,"update order_c set message=0 where o_id='$o_id_2[$i]'");
    echo mysqli_error($conn);


      }
    
  

  $i++;
}
}



?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheets/homepage.css?v=3">
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
</script><title>
foodOrdering</title>
</head>
<?php


  if(@$_POST['Themes']=="#e3e3e3")
{
  echo '<body background="wallpaper/4.jpg" >';
  
}
if(@$_POST['Themes']=="wallaper/1.jpg")
{
    echo '<body background="wallpaper/1.jpg" >';
}
if(@$_POST['Themes']=="wallaper/2.jpg")
{
   echo '<body background="wallpaper/2.jpg" >';
}
if(@$_POST['Themes']=="wallaper/3.jpg")
{
 echo '<body background="wallpaper/3.jpg" >';
}

?>



<div id="top">
  <div align="center">
<span align="center" class="myheading">H</span>
<span align="center" class="myheading2">U</span>
<span align="center" class="myheading">N</span>
<span align="center" class="myheading2">G</span>
<span align="center" class="myheading">E</span>
<span align="center" class="myheading2">R</span>
<span align="center" class="myheading">'</span>
<span align="center" class="myheading">S</span>
<span align="center" class="myheading2">&nbsp;</span>
<span align="center" class="myheading">G</span>
<span align="center" class="myheading2">A</span>
<span align="center" class="myheading">M</span>
<span align="center" class="myheading2">E</span>


</div>
<div class="makeitright" ><form action="index.php" method="post" > <select class="custom-select" id="cars" name="Themes" style="width:70px;" >
  <option value="#e3e3e3">Theme1</option>
  <option value="wallaper/1.jpg">Theme2</option>
  <option value="wallaper/2.jpg">Theme3</option>
  <option value="wallaper/3.jpg">Theme4</option>
</select><input id='submit' type="submit" name="submit" value="Submit" ></form></div>
</div>
<div id="nav" >
<ul>
  <li class="styleit"><a class="active" href="index.php"><font color="#e3e3e3">Home</a></font></li>
  <li class="styleit" style="display:<?php echo $text2 ?>"><a href="profile.php"><font color="#e3e3e3">profile</font></a></li>
  <li class="styleit"><a href="#about">feedback</a></li>
     <li  class="styleit" style="display:<?php echo $text2 ?>"><a href="cart.php" ><font color="#e3e3e3">Orders</font></a></li>
    
   <li class="styleit_new" style="display:<?php echo $text1 ?>;left:85%;""><a href="#about" onclick="document.getElementById('id02').style.display='block'"><font color="#e3e3e3">login</font></a></li>
  <li class="styleit_new" style="display:<?php echo $text1 ?>;left:90%;"><a href="#about" onclick="document.getElementById('id03').style.display='block'"><font color="#e3e3e3">Sign up</font></a></li>
   <li class="styleit_new" style="display:<?php echo $text2 ?>;left:90%;"><a href="action.php?op=logout"><font color="#e3e3e3">logout</font></a></li>
<div id="id02" class="modal">
  
  <form class="modal-content2 animate" action="action.php?op=login" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="meal2.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="pass"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pass" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<div id="id03" class="modal">
  
  <form class="modal-content2 animate" action="action.php?op=signin" method="post" enctype="multipart/form-data">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="meal2.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
	  <label for="name"><b>name</b></label>
      <input type="text" placeholder="Enter name" name="name" required>
	    <label for="address"><b>address</b></label>
      <input type="text" placeholder="Enter address" name="address" required>
	    <label for="contact"><b>contact no</b></label>
      <input type="tel" placeholder="Enter contact number" name="contact" pattern="[0-9]{10}" required>
      <label for="uname"><b>email</b></label>
      <input type="email" placeholder="Enter Username" name="uname" required>
      <label for="pass"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pass" required> 
      <label for="image"><b>image</b></label>
      <input type="file" placeholder="choose file" name="image" required> 
      <button type="submit">sign up</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
</ul>

</div>