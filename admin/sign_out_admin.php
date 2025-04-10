<?php
	session_start();

	unset($_SESSION['id_admin']);
	unset($_SESSION['name_admin']);
	unset($_SESSION['level']);
	setcookie('remember_admin','',-1);

	$_SESSION['success']='Logged out';
	header('location:index.php');