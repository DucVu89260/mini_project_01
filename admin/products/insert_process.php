<?php
	session_start();
	require '../connect.php';

	if(empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price'])) {
		$_SESSION['error']='Must fill in all information';
		header('location:insert_form.php');
		exit;
	}

	$name=addslashes($_POST['name']);
	$description=addslashes($_POST['description']);
	$photo=$_FILES['photo'];
	$price=addslashes($_POST['price']);
	$manufacturer_id=$_POST['manufacturer_id'];

	$folder='photos/';
	$file_extension=explode('.', $photo['name'])[1];
	$file_name=time().".".$file_extension;
	$file_path=$folder.$file_name;

	move_uploaded_file($photo['tmp_name'], $file_path);
	

	$sql="insert into products(name,description,photo,price,manufacturer_id)
	values('$name','$description','$file_name','$price','$manufacturer_id')";

	mysqli_query($connect,$sql);

	$_SESSION['success']='Product added';
	header('location:index.php');

	mysqli_close($connect);

