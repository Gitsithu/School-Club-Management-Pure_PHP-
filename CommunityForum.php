<?php 

include 'header.php';

if (!isset($_SESSION['LoginID'])) {
	echo "<script>
			window.alert('Please login first.');
			window.location='Login.php';
		  </script>";
}
else 
{
	$MemberID=$_SESSION['LoginID'];
	$select="SELECT *
			 FROM member
			 WHERE MemberID='$MemberID'
			";

	$query=mysqli_query($connection,$select);
	$data=mysqli_fetch_array($query);
	$MemberName=$data['ParentName'];
	$Image=$data['MemberImage'];
	
}

if (isset($_POST['btn_post'])) {
	$status=$_POST['status'];
	$MemberID=$_SESSION['LoginID'];

	$query="Insert into Forum (MemberID,ForumText)
	    values ('$MemberID','$status')";
	$run=mysqli_query($connection,$query);

	if ($run) 
	{
		echo "<script>
			window.alert('Uploaded');
			window.location='CommunityForum.php';
		  </script>";
	}
}

?>
<html>
<head>
	
</head>
<body>
	<section class="engine"><a href="https://mobirise.info/b">how to create a website for free</a></section><section class="header5 cid-rgbkzBBP5y" id="header5-q">

    

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="mbr-white col-md-10">
                
                      	<form action="CommunityForum.php" method="post">

                 <div class="form-group">
                 	<div class="row">
                 		<img style=" width:50px; height:50px; border-radius:50%;" src="<?php echo $Image; ?>">
                 		<?php echo $MemberName; ?>
                 		</div>
                           </div>
                  <div class="form-group" data-for="message">
                    <textarea type="text" class="form-control px-3" name="status" rows="7" placeholder="Text here!"  id="message-header15-3" required="required"></textarea>
                </div>

                 <span class="input-group-btn"><button name="btn_post" type="submit" class="btn btn-form btn-primary display-4"><span class="mbri-success mbr-iconfont mbr-iconfont-btn"></span>Post</button></span>
            	
            	  

                </form>
        </div>
    </div>
</div>
<br><br>
    <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#next">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
</section>


<?php include 'footer.php';?>
</body>
</html>