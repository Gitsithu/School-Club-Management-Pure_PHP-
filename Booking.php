<!DOCTYPE>
<?php 
include 'header.php';
if(!isset($_SESSION['LoginID']))
	{
		echo "<script>alert('Please Login');window.location.assign('Login.php');</script>";
	}
	else
	{	
		$MemberID=$_SESSION['LoginID'];
		echo $class=$_GET['classes'];

		echo $insert="Insert into Booking (MemberID,ClassType) values ('$MemberID','$class')";
		$run=mysqli_query($connection,$insert);
		if ($run) 
		{
		echo "<script>alert('Booking Successfully');window.location.assign('index.php');</script>";
		}
		else
		{
		echo mysqli_error($connection);
		}
	}
?>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<?php include 'footer.php';?>
</html>