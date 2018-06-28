<?php
include("check_session.php");
include("connection.php");
$man=$_SESSION['m_id'];
$n_id=$_REQUEST['n_id'];

$result=mysqli_query($connection,"select n_id,n_name,description,rating,categorie,location,img from nursery natural join manager where m_id='$man'")or die ("query 1 incorrect.......");

list($n_id,$n_name,$description,$rating,$categorie,$location,$img)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{
$n_name=$_POST['n_name'];
$description=$_POST['description'];
$rating=$_POST['rating'];
$categorie=$_POST['categorie'];
$location=$_POST['location'];
$img=$_POST['img'];

mysqli_query($connection,"update nursery set n_name='$n_name',description='$description',rating='$rating',categorie='$categorie',location='$location',img='$img' where n_id='$n_id'")or die("Query 2 is inncorrect..........");

header("location: edit_list.php");
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
	<h1>Edit Nursery Details </h1></div><br>
	<div align="center">
<form action="edit_product.php" name="form" method="post" enctype="multipart/form-data">
<input type="hidden" name="n_id" id="n_id" value="<?php echo $n_id;?>" />

<div class="form-group">
<input class="input-lg" style="font-size:18px; width:200px" name="n_name" type="text"  id="n_name" value="<?php echo $n_name; ?>" autofocus>
<p>Nursery Name</p>
</div>
<div class="form-group">
<textarea class="input-lg" style="font-size:18px; width:200px" name="description" type="text"  id="description" value="<?php echo $description; ?>" autofocus><?php echo $description; ?></textarea>
<p>Description</p>
</div>
<div class="form-group">
<input class="input-lg" style="font-size:18px; width:200px" name="rating" type="text"  id="rating" value="<?php echo $rating; ?>" autofocus>
<p>Rating</p>
</div>
<div class="form-group">
<textarea class="input-lg" style="font-size:18px; width:200px" name="description" type="text"  id="description" value="<?php echo $description; ?>" autofocus><?php echo $categorie; ?></textarea><p>Categorie</p>
</div>
<div class="form-group">
<input class="input-lg" style="font-size:18px; width:200px" name="location" type="text"  id="location" value="<?php echo $location; ?>" autofocus>
<p>Location</p>
</div>
<div class="form-group">
<input class="input-lg" style="font-size:18px; width:200px" name="img" type="text"  id="img" value="<?php echo $img; ?>" autofocus>
<p>Image Upload</p>
</div>
<div class="form-group">
 <button type="submit" class="btn btn-success" name="btn_save" id="btn_save" style="font-size:18px">Submit</button>
 </div>
</form>
</div></div></div>
<?php include("include/js.php");?>
</body>
</html>