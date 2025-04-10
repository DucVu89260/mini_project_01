<?php
	session_start();
	$id=$_GET['id'];

	unset($_SESSION['cart'][$id]);

	$_SESSION['success']='Item deleted';
	header('location:cart_view.php');