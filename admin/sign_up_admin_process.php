<?php
	require 'connect.php';
	session_start();

	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$level=$_POST['level'];

	$sql="select count(*) from admins where email='$email'";
	$result=mysqli_query($connect,$sql);
	$num_rows=mysqli_fetch_array($result)['count(*)'];

	if($num_rows == 1){
		$_SESSION['error']='Someone used this email';
		header('location:sign_up.php');
		exit;
	}

	$sql="insert into admins(name,email,password,level)
	values('$name','$email','$password','$level')";
	mysqli_query($connect,$sql);

	mysqli_close($connect);

	header('location:index.php');