<?php

include('connect.php');

if (isset($_POST['btn_save'])) 
{
       $email=$_REQUEST['email'];
        $password=$_REQUEST['pass'];

 
       $select="
                select * from Member
                where email='$email'
                and Password='$password'
       		   ";
       		   $run=mysql_query($select);
       		   $count=mysql_num_rows($run);

if ($email=="")
{
      echo "<script>alert('Enter your email')</script>";
}
if ($password=="")
{
      echo "<script>alert('Enter your password')</script>";
}
else
{
  
   if ($count==1) 
   {
      $row=mysql_fetch_array($run);
      $_SESSION['Email']=$email;
      $_SESSION['CustomerID']=$row['CustomerID'];

//---------------------------------------------
        $d=$row['DOB'];
        $t=date('Y-m-d');

        $DOB=date_create($d);
        $Today=date_create($t);

        $diff=date_diff($DOB,$Today);

        $age=$diff->format("%y");


$check=date('Y-m-d', strtotime("first day of january " . date('Y')));        

        if ($Today!=$check)
        {
          $update="
                Update customertable
                set age='$age'
                where email='$email' 
                ";
          $run=mysql_query($update);
        } 
//---------------(Increment customer count)-----
        $CustomerID=$row['CustomerID'];
        $count=$row['CustomerCount'];
        $Incrementcount=$count+1;

        $Update="
                Update CusotmerTable
                set CustomerCount='$Incrementcount'
                where CustomerID='$CustomerID'
                 ";
        $run=mysql_query($Update);


//-----------------------------------------------------


      echo "<script>alert('Login');window.location.assign('customerprofile.php')</script>";
  }
      

   }

 }



 ?>




<!DOCTYPE html>
<html>
<head>
	<title>
		login form
	</title>
</head>

<body>
<form action="Login.php" method="post">

	<table>
	
	<tr>
		<td>Email</td>
		<td><input type="email" name="email" placeholder="Write The Email"></td>
	</tr>

	<tr>
		<td>password</td>
		<td><input type="password" name="pass" placeholder="Write The Password"></td>
	</tr>

</table>
	
	<input type="submit" name="btn_save" value="Login"/>
	<input type="reset" value="Cancel"/>
</form>
</body>
</html>