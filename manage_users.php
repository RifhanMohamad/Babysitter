<?php
include("check_session.php");
include("connection.php");

$man=$_SESSION['m_id'];

// if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
// {
// $m_id=$_GET['m_id'];
// <a href='manage_users.php?m_id=$m_id&action=delete'>Delete</a>

// this is delete query
// mysqli_query($connection,"delete from manager where m_id='$m_id'")or die("query is incorrect...");
// }
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

<div class="container-fluid">

<?php include("include/side_bar.php"); ?>
<div class="col-sm-9" style="margin-left:10px"> 
<div class="panel-heading" style="background-color:#c4e17f">
	<h1>Manage User </h1></div><br>

<div style="overflow-x:scroll;">
<table class="table table-bordered table-hover table-striped" style="font-size:18px">
	<tr>
			    <th>User Name</th>
                <th>User Password</th>
                <th>Action</th>
	<!--<th><a href="add_user.php">Add New</a></th></tr>	-->
<?php 
$result=mysqli_query($connection,"select m_id, user_name, user_password from manager where m_id='$man'")or die ("query 2 incorrect.......");

while(list($m_id,$user_name,$user_password)=
mysqli_fetch_array($result))
{
echo "<tr><td>$user_name</td><td>$user_password</td>";

echo"<td>
<a href='edit_user.php?m_id=$m_id'>Edit</a>

</td></tr>";
}
mysqli_close($connection);
?>
</table>
</div>	
</div></div>
<?php include("include/js.php"); ?>
</body>
</html>