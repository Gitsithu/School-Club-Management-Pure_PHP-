<html>
<head>
    <style type="text/css">
        .dd{color: #fff;}
    </style>
</head>

<?php 

include('header.php');

if(isset($_POST['btn_save']))
{
	$parent=$_POST['pname'];
	$child=$_POST['cname'];
	$dob=$_POST['dob'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$comment=$_POST['cment'];
	$password=$_POST['pass'];
	$class=$_POST['class'];
	//////////////////////////////////////Image
	$Image=$_FILES['profile']['name'];

	if($Image)
	{
		$folder="clubimage/";
		$filename=$folder."_".$Image;
		$copied=copy($_FILES['profile']['tmp_name'], $filename);
		if(!$copied)
		{
			exit('Problem Occurred');
		}
	}
	//////////////////////////////
	
        $To=date('Y-m-d');
        

        $Dob=date_create($dob);
        $Today=date_create($To);

        $diff=date_diff($Dob,$Today);
        $age=$diff->format("%y");


    $insert="INSERT INTO Member(ParentName,ChildName,DOB,Email,Address,Phone,Comment,Password,ClassType,MemberImage,Age)
	 values('$parent','$child','$dob','$email','$address','$phone','$comment','$password','$class','$filename','$age')";
	$query=mysqli_query($connection,$insert);
	if($query)
	{
		echo "<script>window.alert('Member Save Successful!')</script>";
	}
	else
	{
		mysqli_error($connection);
	}


}

?>
	
		   <!-- template form -->
<section class="engine"><a href="https://mobirise.info/z">best free website templates</a></section><section class="cid-rgazmycoXI mbr-parallax-background" id="header15-g">

    

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(7, 59, 76);"></div>

    <div class="container align-right">
<div class="row">
    <div class="mbr-white col-lg-8 col-md-7 content-container">
        <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">
            <br><br><br>Member Register Form
        </h1>
        <p class="mbr-text pb-3 mbr-fonts-style display-5">
            Parents need to be fill in this registration form!
            </p>
    </div>
    <div class="col-lg-4 col-md-5">
    <div class="form-container">
        <div class="media-container-column" data-form-type="formoid">
            <div data-form-alert="" hidden="" class="align-center">
                Thanks for filling out the form!
            </div>
           
            <form action='MemberRegister.php' method='POST' enctype='multipart/form-data'>    
            	<div data-for="name">
                    <div class="form-group">
                        <input type="text" class="form-control px-3" name="pname"  placeholder="ParentName" required="" id="name-header15-3">
                    </div>
                </div>
                <div data-for="name">
                    <div class="form-group">
                        <input type="text" class="form-control px-3" name="cname"  placeholder="ChildName" required="" id="name-header15-3">
                    </div>
                </div>
                
                <div data-for="email">
                    <div class="form-group">
                        <input type="email" class="form-control px-3" name="email"  placeholder="ParentEmail" required="" id="email-header15-3">
                    </div>
                </div>
                <div data-for="password">
                    <div class="form-group">
                        <input type="password" class="form-control px-3" name="pass"  placeholder="Password" required="" id="password-header15-3">
                    </div>
                </div>
                
                <div data-for="phone">
                    <div class="form-group">
                        <input type="tel" class="form-control px-3" name="phone"  placeholder="ParentPhone" id="phone-header15-3">
                    </div>
                </div>
                <div data-for="dob">
                    <div class="form-group">
                        <input type="date" class="form-control px-3" name="dob"  placeholder="Date Of Birth" required="" id="date-header15-3">
                    </div>
                </div>
                 <div data-for="profile">
                    <div class="form-group">
                        <input type="file" class="form-control px-3" name="profile"  placeholder="" required="" id="profile-header15-3">
                    </div>
                </div>
                <div data-for="class">
                    <div class="form-group">
                    	<label class="dd">Choose Class</label>
                       <select name='class'>
				<option>Musical Theatre</option>
				<option>Singing</option>
				<option>Dance</option>
			           </select>
                       </div>
                </div>
               
                <div class="form-group" data-for="message">
                    <textarea type="text" class="form-control px-3" name="address" rows="7" placeholder="Address"  id="message-header15-3"></textarea>
                </div>
                <div class="form-group" data-for="message">
                    <textarea type="text" class="form-control px-3" name="cment" rows="7" placeholder="Comment"  id="message-header15-3"></textarea>
                </div>
                
                 
                 <span class="input-group-btn"><button name="btn_save" type="submit" class="btn btn-form btn-primary display-4"><span class="mbri-save mbr-iconfont mbr-iconfont-btn"></span>Save</button></span>
                 
                
           
                
            </form>
        </div>
    </div>
    </div>
</div>
    </div>
    <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#next">
            <i class="mbri-down mbr-iconfont" style="margin-top: 15px ;"></i>
        </a>
    </div>
</section>

		   


<?php
include('footer.php');
?>
