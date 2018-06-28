<?php
include("check_session.php");
include("connection.php");

$man=$_SESSION['m_id'];

// if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
// {
// $n_id=$_GET['m_id'];


// this is delete query
// mysqli_query($connection,"delete from manager where m_id='$m_id'")or die("query is incorrect...");
//}
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
	<h1>Edit Nursery Details </h1></div><br>

<div style="overflow-x:scroll;">
<table class="table table-bordered table-hover table-striped" style="font-size:18px">
	<tr>
				<th>ID</th>
			    <th>Nursery Name</th>
			    <th>Description</th>
                <th>Rating</th>
                <th>Category</th>
                <th>Location</th>
                <th>Action</th>
	<!--<th><a href="add_user.php">Add New</a></th></tr>	-->
<?php 
$result=mysqli_query($connection,"select n_id,n_name,description,rating,categorie,location from nursery natural join manager where m_id='$man'")or die ("query 2 incorrect.......");

while(list($n_id,$n_name,$description,$rating,$categorie,$location)=
mysqli_fetch_array($result))
{
echo "<tr><td>$n_id</td><td>$n_name</td><td>$description</td><td>$rating</td><td>$categorie</td><td>$location</td>";

echo"<td>
<a href='edit_product.php?n_id=$n_id'>Edit</a>

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