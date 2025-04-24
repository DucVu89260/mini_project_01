<?php
	require '../connect.php';
	session_start();

	$id=$_GET['id'];

	$sql="delete from products
	where id='$id'";
	mysqli_query($connect,$sql);

	mysqli_close($connect);

	$_SESSION['success']='Product deleted';
	header('location:index.php');