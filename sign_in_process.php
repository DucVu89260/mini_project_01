<?php
	require 'admin/connect.php';
	session_start();

	$email=addslashes($_POST['email']);
	$password=addslashes($_POST['password']);

	$remember=true;
	if(isset($_POST['remember'])){
		$remember=true;
	} else {
		$remember=false;
	}

	$sql="select * from customers
	where email ='$email' and password='$password'";
	$result=mysqli_query($connect,$sql);
	$each=mysqli_fetch_array($result);
	$num_rows=mysqli_num_rows($result);

	if($num_rows != 1){
		$_SESSION['error']='Login failed';
		header('location:sign_in_form.php');
		exit;
	} else {
		$_SESSION['id']=$each['id'];
		//customer_id
		$_SESSION['name']=$each['name'];
		if($remember){
			setcookie('remember',$each['id'],time() + 24*3600);
		}
	}

	mysqli_close($connect);

	$_SESSION['success']='Loged in';
	header('location:index.php');
	