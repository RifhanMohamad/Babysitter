<?php
session_start();
//session_regenerate_id(true);
include("connection.php");
$check=0;

if(isset($_POST['submit']))
{
$username = $_POST['user_name'];
$password = $_POST['user_password'];

$query=mysqli_query($connection,"select m_id from manager where user_name='$username' and user_password='$password'");

list($m_id)=mysqli_fetch_array($query);

$_SESSION['m_id']=$m_id;
header("location: index.php");

$check=1;

if($check==0)
{
$check=2;
}

mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="layout/css/bootstrap.min.css">
<title>Babysitter</title>
</head>
<body>
<div class="container page-header well" align="center">
<img src="images/logo.png">
<h1 align="center">Welcome &nbsp;Admin </h1>
<br>
<div align="center">
<form action="login.php" method="post" id="login" name="login" enctype="multipart/form-data">
<div class="form-group">
<input type="text" style="font-size:18px; width:200px" class="input-lg" name="user_name" id="user_name" placeholder="Username" required autofocus>
</div>
<div class="form-group">
<input type="password" class="input-lg" name="user_password" style="font-size:18px; width:200px" id="user_password" placeholder="Password" required>
 </div>
 <div class="form-group">
<button class="btn btn-large btn-lg btn-success" type="submit" name="submit" id="submit">Login</button>
</div>
<div class="form-group">
	<p>Not a member? <a href="add_user.php">Register</a></p>
</div>

</form>
</div>
</div>
</body>
</html>