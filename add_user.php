<?php
session_start();
include("connection.php");

if(isset($_POST['btn_save']))
{
$m_name=$_POST['m_name'];
$tel_num=$_POST['tel_num'];
$email=$_POST['email'];
$user_name=$_POST['user_name'];
$user_password=$_POST['user_password'];

mysqli_query($connection,"insert into manager(m_name,tel_num,email,user_name, user_password) values ('$m_name','$tel_num','$email','$user_name','$user_password')") 
			or die ("Query 1 is inncorrect........");
header("location: login.php"); 
mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html>
<!-- <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> 
</head> -->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="layout/css/bootstrap.min.css">
<title>Babysitter</title>
</head>
<body>
<!-- <?php //include("include/header.php"); ?>

<div class="container-fluid">
<?php //include("include/side_bar.php"); ?>

  <div class="col-sm-10 " align="center">	
  <div class="panel-heading" style="background-color:#c4e17f">
	<h1>Add User  </h1></div><br> -->

<div class="container page-header well" >
	
<br>
<div align="center">
<form action="add_user.php" method="post" id="register" name="login" enctype="multipart/form-data">
	<div class="form-group">
<input name="m_name" class="input-lg" type="text"  id="m_name" style="font-size:14px; width:auto" placeholder="eg:Johny Klixton" autofocus required>
<p>Full Name</p>
</div>
<div class="form-group">
<input name="tel_num" class="input-lg" type="text"  id="tel_num" style="font-size:14px; width:auto" placeholder="eg:011xxx1205" autofocus required>
<p>Telephone Number</p>
</div>
<div class="form-group">
<input name="email" class="input-lg" type="text"  id="email" style="font-size:14px; width:auto" placeholder="eg:xxxx@xxx.com" autofocus required>
<p>Email</p>
</div>
<div class="form-group">
<input name="user_name" class="input-lg" type="text"  id="user_name" style="font-size:14px; width:auto" placeholder="eg:JohnyK" autofocus required>
<p>Username</p>
</div>
<div class="form-group">

<input name="user_password" class="input-lg" type="text"  id="user_password" style="font-size:14px; width:auto"  placeholder="" required>
<p>Password</p>
</div>
<div class="form-group">
 <button type="submit" class="btn btn-large btn-lg btn-success" name="btn_save" id="btn_save" style="font-size:18px">Register</button>
</div>
<div class="form-group">
	<p>Want to login? <a href="login.php">Click here</a></p>
</div>
</form>
<!-- </div></div>
<?php //include("include/js.php"); ?> -->
</body>
</html>