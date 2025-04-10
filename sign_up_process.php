<?php
	require 'admin/connect.php';
	session_start();

	$name=addslashes($_POST['name']);
	$email=addslashes($_POST['email']);
	$password=addslashes($_POST['password']);
	$phone_number=addslashes($_POST['phone_number']);
	$address=addslashes($_POST['address']);
	$birth_date=$_POST['birth_date'];

	$sql="select count(*) from customers
	where email ='$email'";
	$result=mysqli_query($connect,$sql);
	$num_rows=mysqli_fetch_array($result)['count(*)'];

	if($num_rows == 1){
		$_SESSION['error']='Someone used this email or this phone number';
		header('location:sign_up_form.php');
	} 

	$sql="insert into customers(name,email,password,phone_number,birth_date,address)
	values('$name','$email','$password','$phone_number','$birth_date','$address')";

	mysqli_query($connect,$sql);
	mysqli_close($connect);

	$_SESSION['success']='Signed up successfully';
	header('location:index.php');
	