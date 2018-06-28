<?php
include("check_session.php");
include("connection.php");
error_reporting(0);

$man=$_SESSION['m_id'];

if(isset($_POST['submit']))
{
  //n_name,description,rating,categorie,location,img
$n_name=$_POST['n_name'];
$description=$_POST['description'];
$rating=$_POST['rating'];
$categorie=$_POST['categorie'];
$location=$_POST['location'];

//picture coding
$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];

if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
{
	if($picture_size<=50000000)
	{
		$img=time()."_".$picture_name;
		move_uploaded_file($picture_tmp_name,"../images/products/".$img);
		
mysqli_query($connection,"insert into nursery (m_id, n_name, description, rating, categorie, location, img) values ('$man','$n_name','$description','$rating','$categorie','$location', '$img')") or die ("query incorrect");

 header("location: sumit_form.php?success=1");
}else
{}
}else
{}
mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Babysitter</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</head>
<body>
 
   	 <?php include("include/header.php");?>
   	<div class="container-fluid">
	<?php include("include/side_bar.php");?>
    <div class="col-md-9 content" style="margin-left:10px">
  	<div class="panel panel-default">
	<div class="panel-heading" style="background-color:#c4e17f">
	<h1><span class="glyphicon glyphicon-tag"></span> About Nursery</h1></div><br>
	<div class="panel-body" style="background-color:#E6EEEE;">
		<div class="col-lg-7">
        <div class="well">
          <form action="add_product.php" method="post" name="form" enctype="multipart/form-data">
          <p>Nursery Name</p>
          <input class="input-lg thumbnail form-control" type="text" name="n_name" id="n_name" autofocus style="width:100%"  required>
          <p>Description</p>
          <textarea class="thumbnail form-control" name="description" id="description" style="width:100%; height:100px" placeholder="Describe about your nursery:-background, achievements, services, etc" required></textarea>
          <p>Upload Image</p>
          <div style="background-color:#CCC">
          <input type="file" style="width:100%" name="picture" class="btn thumbnail" id="picture" >
          </div>
          </div>
          <div class="well">
            <h3>Rating</h3>
            <p>Rating</p>
            <div class="input-group">
                  <!--<div class="input-group-addon">RM</div>-->
                  <input type="text" class="form-control" name="rating" id="rating"  placeholder="scale: 1-10">
            </div><br>
        </div>
      </div>  
                <div class="col-lg-5">
                <div class="well">
        <h3>Categorie</h3>  
        <p>Newborn (0-4weeks)</p>
        <p>Infant (4weeks-1year</p>
        <p>Toddler (1-3years)</p>
        <p>Pre-schooler (4-6years)</p>
        <p>School-aged child (6-11years)</p>
        <textarea class="thumbnail form-control" name="categorie" id="categorie" style="width:100%; height:100px" placeholder="" required></textarea>
        <p>Location</p>
          <input class="input-lg thumbnail form-control" type="text" name="location" id="location" autofocus style="width:100%"  required>
      </div>          
    </div>

<div align="center">
    <button type="submit" name="submit" id="submit" class="btn btn-default" style="width:100px; height:60px"> Cancel</button>
    <button type="submit" name="submit" id="submit" class="btn btn-success" style="width:150px; height:60px""> Confirm</button>
    </div>
        </form>
 
	</div>
</div></div></div>
<?php include("include/js.php"); ?>
</body>
</html>