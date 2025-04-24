<?php
	session_start();
	require '../connect.php';

	// if(empty($_GET['id'])){
	// 	header('location:index.php?error=Must transfer value for ID');
	// 	exit;
	// }
	$id=$_POST['id'];

	if(empty($_POST['name']) || empty($_POST['phone_number']) || empty($_POST['address'])) {
		$_SESSION['error']='Must fill in all information';
		header("location:update_form.php?id=$id");
		exit;
	}

	$name=addslashes($_POST['name']);
	$phone_number=addslashes($_POST['phone_number']);
	$address=addslashes($_POST['address']);
	$photo_old=addslashes($_POST['photo_old']);
	$logo_new=$_FILES['logo_new'];

	if($logo_new['size'] > 0){
		$folder='photos/';
		$file_extension=explode('.', $logo_new['name'])[1];
		$file_name=time().".".$file_extension;
		$file_path=$folder.$file_name;

		move_uploaded_file($logo_new['tmp_name'], $file_path);
	} else {
		$file_name=$logo_old;
	}

	$sql="update manufacturers
	set
	name='$name',
	phone_number='$phone_number',
	address='$address',
	logo='$file_name'
	where id='$id'";
	mysqli_query($connect,$sql);
	
	$error=mysqli_error($connect);
	if(empty($error)){
		$_SESSION['success']='Updated';
		header('location:index.php');
		exit;
	} else {
		$_SESSION['error']='Error selection';
		header("location:update_form.php?id=$id");
	}
	
	mysqli_close($connect);