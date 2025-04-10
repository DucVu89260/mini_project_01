<?php
	session_start();

	if(empty($_COOKIE['remember_admin'])){
		include 'sign_in_admin.php';
	} else if($_SESSION['level'] ==1){
		header('location:manufacturers');
	} else {
		header('location:products');
	}

	