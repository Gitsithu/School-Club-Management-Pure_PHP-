<!DOCTYPE>

<?php

include 'header.php';


if(isset($_GET['FoID']))
{
	$FoID=$_GET['FoID'];
	
}
if(isset($_POST['btn_reply']))
{
	if(!isset($_SESSION['LoginID']))
	{
		echo "<script>alert('Please Login');window.location.assign('login.php');</script>";
	}
	else
	{	
		 $MemberID=$_SESSION['LoginID'];
		 $Rtext=$_POST['reply'];
		 $FoID=$_POST['txtfoid'];
		 $query="Insert into Reply(MemberID,ReplyText,ForumID)values
		 ('$MemberID','$Rtext','$FoID') ";
		 $run=mysqli_query($connection,$query);

		if ($run) 
		{
		echo "<script>alert('Reply Successfully');window.location.assign('ForumDisplay.php');</script>";
		}
		else
		{
		echo mysqli_error($connection);
		}

	}
}
?>
<html>
<head>
	<title></title>
</head>
<body>
	<section class="engine"><a href="https://mobirise.info/p">site templates free download</a></section><section class="section-table cid-rgaTjXdBwz mbr-parallax-background" id="table1-o">

  
  <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(255, 255, 255);">
  </div>
  <div class="container container-table">
      

<form name="" action="Reply.php" method="post">
	<input type="hidden" name="txtfoid" value='<?php echo $FoID?>'>
	<table border="2" width="100%;">
		<tr>
			<td>User Profile</td>
			<td>Reply Text</td>
			<td>Reply date</td>

		</tr>
		<?php
		
	    $select="SELECT * FROM Member m,Reply r where m.MemberID=r.MemberID and r.ForumID='$FoID'";

	$query=mysqli_query($connection,$select);
	$count=mysqli_num_rows($query);
//to show the row of forum table in database to chrome	
	for ($i=0; $i<$count; $i++)
	{
	$data=mysqli_fetch_array($query);
	$Rtext=$data['ReplyText'];
	$Rdate=$data['ReplyPostedDate'];
	$Image=$data['MemberImage'];
	$Email=$data['Email'];
	$FoID=$data['ForumID'];
	echo"<tr>
	     <td><img src='$Image' width='100px' height='100px'><br>$Email</td>
	     <td><a href='Reply.php?FoID=$FoID'><p style='color:blue';>$Rtext</p></a></td>
	     <td>$Rdate</td>
	     </tr>";

    }
	 
		?>
	</table>
	<br>
	<form name="" method="post" action="Reply.php">
		<div class="form-group">
                <div class="form-group" data-for="message">
                    <textarea type="text" class="form-control px-3" name="reply" rows="7" placeholder="Reply here!"  required=""  id="message-header15-3"></textarea>
                </div>

                 <span class="input-group-btn"><button name="btn_reply" type="submit" class="btn btn-form btn-primary display-8"><span class="mbri-edit2 mbr-iconfont mbr-iconfont-btn"></span>Reply</button></span>
           </form>
                 	
                 		
                          
</section>
	<?php include 'footer.php';?>
</body>
</html>