<?php
	require 'admin/connect.php';
	session_start();

	$id=$_SESSION['id'];

	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$phone_number=$_POST['phone_number'];
	$birth_date=$_POST['birth_date'];
	$address=$_POST['address'];

	$sql="update customers
	set
	name='$name',
	email='$email',
	password='$password',
	phone_number='$phone_number',
	birth_date='$birth_date',
	address='$address'
	where
	id='$id'";
	mysqli_query($connect,$sql);

	mysqli_close($connect);

	$_SESSION['success']='Account inforamtion updated';

	header('location:account.php');