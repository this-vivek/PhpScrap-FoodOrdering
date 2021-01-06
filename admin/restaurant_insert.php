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

?>
<?php include("head.php"); ?>
<div id="container">
<center>
<form  action="action_rest.php" method="post" enctype="multipart/form-data">
 

   
	  <label for="name"><b>name of restaurant</b></label>
      <input type="text" placeholder="Enter name" name="name" required>
      <label for="name"><b>username</b></label>
      <input type="text" placeholder="Enter username" name="username" required>
	    <label for="pass"><b>pass</b></label>
      <input type="password" placeholder="Enter pass" name="pass" required>
	    <label for="desc"><b>descriptiton</b></label>
      <input type="text" placeholder="Enter description" name="desc" required>
      <label for="rating"><b>rating</b></label>
      <input type="number" placeholder="Enter rating" name="rating" required>
      <label for="address"><b>address</b></label>
      <input type="text" placeholder="Enter address" name="address" required> 
      <label for="image"><b>image</b></label>
      <input type="file" placeholder="choose file" name="image" required> 

      <button type="submit" >sign up</button>
      
    

   
  </form>
</center>
	
</div>

<div id="footer">
<?php
?>
</div>
</body>
</html>