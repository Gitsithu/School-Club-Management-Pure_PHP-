<!DOCTYPE>

<?php
include 'header.php';
if(isset($_POST['btn_search']))
{
	$Ftext=$_POST['search'];
	$select="SELECT * FROM Member m,Forum f where m.MemberID=f.MemberID and f.ForumText like '%$Ftext%'";

	$query=mysqli_query($connection,$select);

	if(isset($_SESSION['LoginID']))
	{
		$MemberID=$_SESSION['LoginID'];
		$go_query="Insert into Record (RecordTitle,MemberID) values('$Ftext','$MemberID')";
        $run=mysqli_query($connection,$go_query);

	}
	
}
else
{
	$select="SELECT * FROM Member m,Forum f where m.MemberID=f.MemberID	";

	$query=mysqli_query($connection,$select);
}
if(isset($_POST['btn_clear']))
{
	echo "<script>
		
		window.location='Clearrecord.php';
		</script>";

}
?>
<html>
<head>
	<title></title>
</head>
<body>
	<section class="engine"><a href="https://mobirise.info/g">how to build a site for free</a></section><section class="section-table cid-rgaTjXdBwz mbr-parallax-background" id="table1-o">

  
  <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(255, 255, 255);">
  </div>
  <div class="container container-table">
      
<form name="" action="ForumDisplay.php" method="post">
	<div>

	<input type="text" name="search" placeholder="Search here">
	
	<button type="submit" name="btn_search" class=""><span class="mbri-search mbr-iconfont mbr-iconfont-btn"></span>Search</button>
	<button type="submit"  class="" name="btn_clear"><span class="mbri-trash mbr-iconfont mbr-iconfont-btn"></span>Clearsearch</button>
	
	</div>
</form>
	<br>
	<table border="2" width="80%;">
		<tr>
			<td>User Profile</td>
			<td>Title</td>
			<td>Upload date</td>

		</tr>
		<?php
		
	   
	     $count=mysqli_num_rows($query);
//to show the row of forum table in database to chrome	
	for ($i=0; $i<$count; $i++)
	{
	$data=mysqli_fetch_array($query);
	$Ftext=$data['ForumText'];
	$Fdate=$data['ForumPostedDate'];
	$Image=$data['MemberImage'];
	$Email=$data['Email'];
	$FoID=$data['ForumID'];
	echo"<tr>
	     <td><img src='$Image' width='100px' height='100px'><br>$Email</td>
	     <td><a href='Reply.php?FoID=$FoID'><u style='color:blue;'><p style='color:blue;'>$Ftext</p></u></a></td>
	     <td>$Fdate</td>
	     </tr>";

    }
	 
		?>
	</table>
</div>
</section>

	<?php include 'footer.php';?>
</body>
</html>