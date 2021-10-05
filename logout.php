<?php  
session_start();

session_destroy(); //All

//unset($_SESSION['CustomerID']); //Optional

// session_regenerate_id(); //Restart Session ID
echo "<script>alert('Logout Successfully!');window.location.assign('Login.php');</script>";
?>