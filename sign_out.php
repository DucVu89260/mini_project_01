<?php
	session_start();

	unset($_SESSION['id']);
	unset($_SESSION['name']);
	setcookie('remember','',-1);

	$_SESSION['success']='Loged out';
	header('location:index.php');