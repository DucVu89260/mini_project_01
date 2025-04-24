<?php

	if(empty($_SESSION['id_admin'])){
		header('location:../index.php');
	}