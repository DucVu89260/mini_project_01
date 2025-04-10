<?php
	require '../connect.php';
	session_start();

	$id=$_GET['id'];

	$sql="delete from manufacturers
	where id='$id'";
	mysqli_query($connect,$sql);

	mysqli_close($connect);

	$_SESSION['success']='Manufacturer deleted';
	header('location:index.php');