<?php
include("check_session.php");
include("connection.php");
$m_id=$_REQUEST['m_id'];

$result=mysqli_query($connection,"select m_id, user_name, user_password from manager where m_id='$m_id'")or die ("query 1 incorrect.......");

list($m_id,$user_name,$user_password)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{
$user_name=$_POST['user_name'];
$user_password=$_POST['user_password'];

mysqli_query($connection,"update manager set user_name='$user_name', user_password='$user_password' where m_id='$m_id'")or die("Query 2 is inncorrect..........");

header("location: manage_users.php");
mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>
<?php include("include/header.php"); ?>
   	<div class="container-fluid main-container">
	<?php include("include/side_bar.php");?>
    
	<div class="col-sm-9" style="margin-left:10px">  
<div class="panel-heading" style="background-color:#c4e17f">
	<h1>Edit User Details </h1></div><br>
<form action="edit_user.php" name="form" method="post" enctype="multipart/form-data">
<input type="hidden" name="m_id" id="m_id" value="<?php echo $m_id;?>" />
<label style="font-size:18px;">User-name</label>
<br>
<input class="input-lg" style="font-size:18px; width:200px" name="user_name" type="text"  id="user_name" value="<?php echo $user_name; ?>" autofocus><br><br>
<label style="font-size:18px;">Password</label>
<br>
<input class="input-lg" style="font-size:18px; width:200px" name="user_password" type="text"  id="user_password" value="<?php echo $user_password; ?>">
<br><br>
 <button type="submit" class="btn btn-success" name="btn_save" id="btn_save" style="font-size:18px">Submit</button>
</form>
</div></div>
<?php include("include/js.php");?>
</body>
</html>