<?php
session_start();
include_once("connection.php");
$uname=$_SESSION['username_res'];
$sql=mysqli_query($conn,"select r_name from restaurant where username='$uname'");
$result=mysqli_fetch_array($sql);
$r_name=$result[0];

$i=0;
?>
<?php include("head.php"); ?>
<div id="container">
<center>
<?php
$sql=mysqli_query($conn,"select r_name from restaurant");


?>
<form  action="action_food.php" method="post">
 

   
	  <label for="name"><b>name of food</b></label>
      <input type="text" placeholder="Enter name" name="f_name" required>
	    <label for="name"><b>price of food</b></label>
      <input type="number" placeholder="Enter price" name="price" required>
	   restaurant<select name="restaurant">

  <option value="<?php echo $r_name;?>"><?php echo $r_name;?></option>
</select>
   <button type="submit">Insert</button>
      
    

   
  </form>
</center>
	
</div>

<div id="footer">
<?php
?>
</div>
</body>
</html>