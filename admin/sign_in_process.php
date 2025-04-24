<?php
	require 'connect.php';
	session_start();

	$email=$_POST['email'];
	$password=$_POST['password'];

	$remember_admin=false;
	if(!empty($_POST['remember_admin'])){
		$remember_admin = true;
	}

	$sql="select * from admins where email='$email' and password='$password'";
	$result=mysqli_query($connect,$sql);
	$each=mysqli_fetch_array($result);
	$num_rows=mysqli_num_rows($result);

	if($num_rows == 1){
		$_SESSION['id_admin']=$each['id'];
		$_SESSION['name_admin']=$each['name'];
		$_SESSION['level']=$each['level'];
		if($remember_admin){
			setcookie('remember_admin',$each['id'],time() + 24*3600);
		}
	} else {
		$_SESSION['error']='Log in failed';
		header('location:index.php');
		exit;
	}
	
	mysqli_close($connect);
	
	// die($each['level']);

	if($_SESSION['level']==1){
		$_SESSION['success']='Welcome to manufacturers database';
		header('location:manufacturers');
		exit;
	} else {
		$_SESSION['success']='Welcome to products database';
		header('location:products');
		exit;
	}
