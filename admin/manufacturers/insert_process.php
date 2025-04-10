<?php
	session_start();
	require '../connect.php';

	if(empty($_POST['name']) || empty($_POST['phone_number']) || empty($_POST['address'])) {
		$_SESSION['error']='Must fill in all information';
		header('location:insert_form.php');
	}

	$name=addslashes($_POST['name']);
	$phone_number=addslashes($_POST['phone_number']);
	$address=addslashes($_POST['address']);
	$logo=$_FILES['logo'];

	$folder='photos/';
	$file_extension=explode('.', $logo['name'])[1];
	$file_name=time().".".$file_extension;
	$file_path=$folder.$file_name;

	move_uploaded_file($logo['tmp_name'], $file_path);

	$sql="insert into manufacturers(name,phone_number,address,logo)
	values('$name','$phone_number','$address','$file_name')";

	mysqli_query($connect,$sql);

	$_SESSION['success']='Manufacturer added';
	header('location:index.php');

	mysqli_close($connect);

