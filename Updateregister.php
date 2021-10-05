<html>
<head>
    <style type="text/css">
        .ii{width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right:  }
            .cc{
                color: #fff;
            }
    </style>
</head>
<?php 
include('header.php');

if(!isset($_SESSION['LoginID']))
    {
        echo "<script>alert('Please Login');window.location.assign('login.php');</script>";
    }
else
{   
    $MemberID=$_SESSION['LoginID'];
    $select="SELECT * 
            FROM member
            WHERE MemberID='$MemberID'
            ";
    $query=mysqli_query($connection,$select);
    $row=mysqli_fetch_array($query);
    
}


if(isset($_POST['btn_update']))
{
	$parent=$_POST['pname'];
	$child=$_POST['cname'];
	
	
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$comment=$_POST['cment'];
	$password=$_POST['pass'];
	$class=$_POST['class'];
	//////////////////////////////////////Image
	

	//////////////////////////////
    $MemberID=$_SESSION['LoginID'];
	$update="Update member set ParentName='$parent',
             ChildName='$child',Address='$address',
             Phone='$phone',Comment='$comment',Password='$password',ClassType='$class' where MemberID='$MemberID'
            ";
	$query=mysqli_query($connection,$update);
	if($query)
	{
		echo "<script>window.alert('Member Update Successful')</script>";
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
            <br><br><br>Member Register Update
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
           
            <form action='Updateregister.php' method='POST' enctype='multipart/form-data'>
                <img src="<?php echo $row['MemberImage'] ?>"class=ii>
            	<div data-for="name">
                    <div class="form-group">
                        <input type="text" class="form-control px-3" name="pname" value="<?php echo $row['ParentName']?>" required="" id="name-header15-3">
                    </div>
                </div>
                <div data-for="name">
                    <div class="form-group">
                        <input type="text" class="form-control px-3" name="cname"  value="<?php echo $row['ChildName']?>" required="" id="name-header15-3">
                    </div>
                </div>
                
                <div data-for="email">
                    <div class="form-group">
                        <input type="email" class="form-control px-3" readonly="" name="email"  value="<?php echo $row['Email']?>" id="email-header15-3">
                    </div>
                </div>
                <div data-for="password">
                    <div class="form-group">
                        <input type="password" class="form-control px-3" name="pass"  value="<?php echo $row['Password']?>" required="" id="password-header15-3">
                    </div>
                </div>
                
                <div data-for="phone">
                    <div class="form-group">
                        <input type="tel" class="form-control px-3" name="phone"  value="<?php echo $row['Phone']?>" id="phone-header15-3">
                    </div>
                </div>
                <div data-for="dob">
                    <div class="form-group">
                        <input type="date" class="form-control px-3" name="dob"  value="<?php echo $row['DOB']?>" required="" id="date-header15-3" readonly="">
                    </div>
                </div>
                <div data-for="class">
                    <div class="form-group">
                    	<label class="cc">Choose Class</label>
                       <select name='class'>
                        <option><?php echo $row['ClassType']?></option>
				<option>Musical Theatre</option>
				<option>Singing</option>
				<option>Dance</option>
			           </select>
                       </div>
                </div>
               
                <div class="form-group" data-for="message">
                    <textarea type="text" class="form-control px-3" name="address" rows="7"   id="message-header15-3"><?php echo $row['Address']?></textarea>
                </div>
                <div class="form-group" data-for="message">
                    <textarea type="text" class="form-control px-3" name="cment" rows="7"   id="message-header15-3"><?php echo $row['Comment']?></textarea>
                </div>
                
                
                 <span class="input-group-btn"><button name="btn_update" type="submit" class="btn btn-form btn-primary display-4"><span class="mbri-update mbr-iconfont mbr-iconfont-btn"></span>Update</button></span>
           
                
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
</html>
