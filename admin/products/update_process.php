<?php
	session_start();
	require '../connect.php';

	$id=$_POST['id'];

	if(empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price'])){
		$_SESSION['error']='Must fill in all information';
		header("location:update_form.php?id=$id");
		exit;
	}

	$name=addslashes($_POST['name']);
	$description=addslashes($_POST['description']);
	$photo_new=$_FILES['photo_new'];
	$photo_old=addslashes($_POST['photo_old']);
	$price=addslashes($_POST['price']);
	$manufacturer_id=$_POST['manufacturer_id'];

	if($photo_new['size'] > 0){
		$folder='photos/';
		$file_extension=explode('.', $photo_new['name'])[1];
		$file_name=time().".".$file_extension;
		$file_path=$folder.$file_name;

		move_uploaded_file($photo_new['tmp_name'], $file_path);
	} else {
		$file_name = $photo_old;
	}
	

	$sql="update products
	set
	name='$name',
	description='$description',
	photo='$file_name',
	price='$price',
	manufacturer_id='$manufacturer_id'
	where id='$id'";
	mysqli_query($connect,$sql);

	$error=mysqli_error($connect);
	if(empty($error)){
		$_SESSION['success']='Product updated';
		header('location:index.php');
		exit;
	} else {
		$_SESSION['success']='Product updated';
		header("location:update_form.php?id=$id");
	}
	
	mysqli_close($connect);

