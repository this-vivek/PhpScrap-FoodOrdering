<?php
session_start();
include_once("connection.php");
$sql=mysqli_query($conn,"select count(r_name) from restaurant");
$result=mysqli_fetch_array($sql);
$size=$result[0];

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
	   <?php 
	   while($result=mysqli_fetch_assoc($sql))
	   {
		   ?>
  <option value="<?php echo $result['r_name']?>"><?php echo $result['r_name']?></option>
  <?php
	   }
  ?>
</select>
   <button type="submit">sign up</button>
      
    

   
  </form>
</center>
	
</div>

<div id="footer">
<?php
?>
</div>
</body>
</html>