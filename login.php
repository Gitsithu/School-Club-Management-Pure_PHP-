<?php 

include 'header.php';

	if(isset($_SESSION['error']))
	{
		$count=$_SESSION['error'];
		if ($count==3)
		{
			echo "<script>
					alert('3 Wrong Attempt: Please wait and try again');
					location.assign('LoginTimer.php');
				</script>";
		}
	}

if (isset($_POST['btn_login'])) 
{
	$Email=$_POST['email'];
	$password=$_POST['pass'];

	$select="SELECT * 
			FROM Member
			WHERE Email='$Email' 
			AND Password='$password'
			";
	$query=mysqli_query($connection,$select);
	$count=mysqli_num_rows($query);
	if ($count>0) 
	{
		$data=mysqli_fetch_array($query);
		$MemberID=$data['MemberID'];
		// --------------age count-------------------
		$To=date('Y-m-d');
		$Do=$data['DOB'];

		$Dob=date_create($Do);
		$Today=date_create($To);

		$diff=date_diff($Dob,$Today);
		$age=$diff->format("%y");

		$check=date('y-m-d', strtotime("first day of September".date('Y')));
		if ($Today==$check)
		{
			$update="Update member set age='$age' where MemberID='$MemberID'";
			$run=mysqli_query($update);
		}



		// ------------------------------------------
		echo "<script>
		window.alert('Login Successful');
		window.location='index.php';
		</script>";
		$_SESSION['LoginEmail']=$Email;
		$_SESSION['LoginID']=$MemberID;

	}

	// else if
	// {
	// 	if(isset($_SESSION['error']))
	// 	{
	// 		$_SESSION['error']++;
	// 	}

	// }
	 else 
	{
		if (isset($_SESSION['error'])) 
			{
				$_SESSION['error']++;

			}
			else
			{
				$_SESSION['error']=1;
			}
		echo "<script>
		window.alert('Invalid Username or password');
		window.location='login.php';
		</script>";

	}
}
?>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<section class="engine"><a href="https://mobirise.info/s">bootstrap themes</a></section><section class="cid-rgbobCJlSL mbr-parallax-background" id="header15-t">

    

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(7, 59, 76);"></div>


    <div class="container align-right">
<div class="row">
    <div class="mbr-white col-lg-8 col-md-7 content-container">
        <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1"><br>Login Form</h1>
        <p class="mbr-text pb-3 mbr-fonts-style display-5"></p>
    </div>
    <div class="col-lg-4 col-md-5">
    <div class="form-container">
        <div class="media-container-column" data-form-type="formoid">
            <div data-form-alert="" hidden="" class="align-center">Thanks for filling out the form!</div>
           <form  method="post">
           <input type="hidden" name="email" data-form-email="true" value="YqWzQNFEJBvIRC50Tq0s+9DR06KVzbkialxeyz1tKJdB959wy/UtXAiZQFrzlIlccxOK4BFgD8eqGDChZy+MEKhWI1tPnMFLBky/jKy1zXytQ2L4uF3qgB15QAsUtKPT">
                <div data-for="eamil">
                    <div class="form-group">
                        <input type="eamil" class="form-control px-3" name="email" data-form-field="email" placeholder="Email" required="" id="eamil-header15-h">
                    </div>
                </div>
                <div data-for="password">
                    <div class="form-group">
                        <input type="password" class="form-control px-3" name="pass" data-form-field="password" placeholder="Password" required="" id="password-header15-h">
                    </div>
                </div>
                
               
                <span class="input-group-btn"><button type="submit"  name="btn_login"><span class="mbri-right mbr-iconfont mbr-iconfont-btn"></span>Login</button></span>
                 <span class="input-group-btn"><button type="reset"  ><span class="mbri-close mbr-iconfont mbr-iconfont-btn"></span>Cancel</button></span>
            	
            </form>
        </div>
    </div>
    </div>
</div>
    </div>
    <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#next">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
</section>


	

<?php include 'footer.php';?>
</body>
</html>
