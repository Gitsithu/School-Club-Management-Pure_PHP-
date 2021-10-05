<?php 

	session_start();
	include 'connect.php';

	if (!isset($_SESSION['LoginID'])) 
		{
		echo "<script>

				alert ('Please Login First');

				window.location.assign('Login.php');

				</script>
		";
	}
	else 
	{
		$MemberID=$_SESSION['LoginID'];
		$query="Delete from Record where MemberID='$MemberID'";
		$run=mysqli_query($connection,$query);

		if ($run) 
		{
			echo "<script>
					alert('Clear Data');window.location.assign('index.php');
				  </script>";
		}
		else
		{
			echo mysqli_error($connection);
		}
	}


 ?>