<?php
include 'dbconfig.php';
session_start();
if (isset($_POST['signup'])) {
	$result=mysqli_query($con, "SELECT * FROM users WHERE email='".$_POST['emailaddress']."' OR mobile='".$_POST['phone']."'");
	$message="";
	$rowcount=mysqli_num_rows($result);
	if ($rowcount>0) {
		$message="Your Email or Phone Number is Already Existed Please Sign In";
		echo $message;
	}
	else{
		$sql = "INSERT INTO users (full_name, mobile, email, password,category,status) VALUES ('".$_POST['fullname']."', '".$_POST['phone']."', '".$_POST['emailaddress']."','".$_POST['password']."','".$_POST['category']."','A')";
		if (mysqli_query($con, $sql)) {
		  $message="Thank you for Sign Up Please Login ".$_POST['fullname'];
		  echo $message;
		} 
		else {
		  $message="Error: " . $sql . "<br>" . mysqli_error($con);
		  echo $message;
		}
	}
}

if (isset($_POST['signin'])) {
	$result=mysqli_query($con, "SELECT * FROM users WHERE (email='".$_POST['emailPhone']."' AND password='".$_POST['password']."') OR (mobile='".$_POST['emailPhone']."' AND password='".$_POST['password']."')");
	$message="";
	$rowcount=mysqli_num_rows($result);
	if ($rowcount>0) {
		$row=mysqli_fetch_assoc($result);
		$_SESSION['full_name']=$row['full_name'];
		$_SESSION['id']=$row['id'];
		$_SESSION['category']=$row['category'];
		$_SESSION['status']=$row['status'];
		echo $row['category'];
	}
	else{
		$message="Invalid Credentials";
		echo $message;
	}
}

?>