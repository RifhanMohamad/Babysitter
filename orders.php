 <?php
include("check_session.php");
include("connection.php");
error_reporting(0);

$man=$_SESSION['m_id'];

	if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
	{
		$b_id=$_GET['b_id'];

		/*this is delete query*/
		mysqli_query($connection,"delete from booking where b_id='$b_id'")or die("delete query is incorrect...");
	} 

	if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='approve')
	{
		$b_id=$_GET['b_id'];

		/*this is approve query*/
		mysqli_query($connection,"update booking set approval='approve' where b_id='$b_id'")or die("delete query is incorrect...");
	} 

	if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='reject')
	{
		$b_id=$_GET['b_id'];

		/*this is reject query*/
		mysqli_query($connection,"update booking set approval='reject' where b_id='$b_id'")or die("delete query is incorrect...");
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
   	<div class="container-fluid main-container">
		<?php include("include/side_bar.php");?>
	    <div class="col-md-9 content" style="margin-left:10px">
		    <div class="panel-heading" style="background-color:#c4e17f">
			<h1>Booking  </h1></div><br>
				<div class='table-responsive'>  
					<div style="overflow-x:scroll;">
						<table class="table  table-hover table-striped" style="font-size:14px">
						<tr>
							<th>Booking Id</th>
							<th>Booking Name</th>
							<th>Contact Number</th>
							<th>Email</th>
							<th>Number of Child</th>
							<th>Child Category</th>
							<th>Booking Date</th>
							<th>Approval</th>
							<th></th>
							<th>Action</th>
							<th></th>
						</tr>
						<?php 
							$result=mysqli_query($connection,"SELECT b_id, b_name, phone_num, email, num_of_child, child_cat,booking_date,approval FROM booking JoIN nursery ON booking.nur_name = nursery.n_name WHERE nur_name = (SELECT n_name FROM nursery natural join manager WHERE m_id = $man)") or die ("There is no booking under the name");

							while(list($b_id,$b_name, $phone_num, $email, $num_of_child, $child_cat, $booking_date,$approval) = mysqli_fetch_array($result))
							{	
								echo "<tr><td>$b_id</td><td>$b_name</td><td>$phone_num</td><td>$email</td><td>$num_of_child</td><td>$child_cat</td><td>$booking_date</td><td>$approval</td>

								<td>
								<a class=' btn btn-success' href='orders.php?b_id=$b_id&action=approve'>Approve</a>
								</td>
								<td>
								<a class=' btn btn-danger' href='orders.php?b_id=$b_id&action=reject'> Reject</a>
								</td>
								<td>
								<a class=' btn btn-warning' href='orders.php?b_id=$b_id&action=delete'>Delete</a>
								</td></tr>";
							}
						?>
						</table>
					</div>
				</div>
		</div>
	</div>

<?php include("include/js.php");?>
</body>
</html>