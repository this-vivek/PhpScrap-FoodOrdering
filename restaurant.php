<?php
session_start();
$uname="";
$status=$_SESSION['log_status'];
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
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheets/homepage.css?v=2">
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

<title>
foodOrdering</title>
</head>
<body>
<div id="top">
<h1 align="center">foodOrdering</h1>
</div>
<div id="nav">
<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">profile</a></li>
  <li><a href="#contact">orders</a></li>
  <li><a href="#about">restaurants</a></li>
  <li><a href="#about">feedback</a></li>
   <li style="display:<?php $text1 ?>"><a href="#about" onclick="document.getElementById('id02').style.display='block'">login</a></li>
  <li style="display:<?php $text1 ?>"><a href="#about" onclick="document.getElementById('id03').style.display='block'">Sign up</a></li>
   <li style="display:<?php $text2 ?>"><a href="logout.php">logout</a></li>
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
  
  <form class="modal-content2 animate" action="action.php?op=signin" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="meal2.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
	  <label for="name"><b>name</b></label>
      <input type="text" placeholder="Enter name" name="name" required>
	    <label for="address"><b>address</b></label>
      <input type="text" placeholder="Enter address" name="uname" required>
	    <label for="contact"><b>contact no</b></label>
      <input type="text" placeholder="Enter contact number" name="contact" required>
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>
      <label for="pass"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pass" required> 
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
<div id="container">
<center>
<img src="" width="50%" height="40%">
<h1>NAME OF THE RESTAURANT<h1>
</center>
<form action="cart.php" method="POST">
<table class="food">
<tr>
<td>
<p>name of food</p>
<input type="checkbox" name="food_name">
</td>
<td>
<p>name of food</p>
<input type="checkbox" name="food_name">
</td>
<td>
<p>name of food</p>
<input type="checkbox" name="food_name">
</td>
<td>
<p>name of food</p>
<input type="checkbox" name="food_name">
</td>
</tr>

<tr>
<td>
<p>name of food</p>
<input type="checkbox" name="food_name">
</td>
<td>
<p>name of food</p>
<input type="checkbox" name="food_name">
</td>
<td>
<p>name of food</p>
<input type="checkbox" name="food_name">
</td>
<td>
<p>name of food</p>
<input type="checkbox" name="food_name">
</td>
</tr>

<tr>
<td>
<p>name of food</p>
<input type="checkbox" name="food_name">
</td>
<td>
<p>name of food</p>
<input type="checkbox" name="food_name">
</td>
<td>
<p>name of food</p>
<input type="checkbox" name="food_name">
</td>
<td>
<p>name of food</p>
<input type="checkbox" name="food_name">
</td>
</tr>

<tr>
<td>
<p>name of food</p>
<input type="checkbox" name="food_name">
</td>
<td>
<p>name of food</p>
<input type="checkbox" name="food_name">
</td>
<td>
<p>name of food</p>
<input type="checkbox" name="food_name">
</td>
<td>
<p>name of food</p>
<input type="checkbox" name="food_name">
</td>
</tr>
	
</div>

<div id="footer">
</div>
</body>
</html>