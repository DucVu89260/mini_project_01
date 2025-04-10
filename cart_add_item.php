<?php
	$id=$_GET['id'];

	session_start();
	require 'admin/connect.php';

	$sql="select * from products where id ='$id'";
	$result=mysqli_query($connect,$sql);

	if(empty($_SESSION['cart'][$id])){
		$each=mysqli_fetch_array($result);
		$_SESSION['cart'][$id]['name']=$each['name'];
		$_SESSION['cart'][$id]['price']=$each['price'];
		$_SESSION['cart'][$id]['photo']=$each['photo'];
		$_SESSION['cart'][$id]['quantity']= 1;
	} else {
		$_SESSION['cart'][$id]['quantity'] ++;
	}

	mysqli_close($connect);

	$_SESSION['success']='Item added in cart';
	header('location:index.php');
	echo json_encode($_SESSION['cart']);