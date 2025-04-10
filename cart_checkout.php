<?php
	session_start();
	require 'admin/connect.php';

	//customer_id is null
	$name_receiver=addslashes($_POST['name_receiver']);
	$email_receiver=addslashes($_POST['email_receiver']);
	$phone_receiver=addslashes($_POST['phone_receiver']);
	$address_receiver=addslashes($_POST['address_receiver']);
	$customer_id=$_POST['customer_id'];

	$status=0; //As unchecked

	$total_bill=0;
	$cart=$_SESSION['cart'];
	foreach ($cart as $each) {
		$result=$each['price']*$each['quantity'];
		$total_bill += $result;
	}

	if($customer_id == null){
		$sql="insert into orders(customer_id,name_receiver,phone_receiver,email_receiver,address_receiver,status,total_bill)
	values(null,'$name_receiver','$phone_receiver','$email_receiver','$address_receiver','$status','$total_bill')";
	mysqli_query($connect,$sql);
} else {
	$sql="insert into orders(customer_id,name_receiver,phone_receiver,email_receiver,address_receiver,status,total_bill)
	values('$customer_id','$name_receiver','$phone_receiver','$email_receiver','$address_receiver','$status','$total_bill')";
	mysqli_query($connect,$sql);
}

	$sql="select max(id) from orders";
	$result=mysqli_query($connect,$sql);
	$order_id=mysqli_fetch_array($result)['max(id)'];

	$cart=$_SESSION['cart'];
	foreach ($cart as $product_id => $each) {
		$price=$each['price'];
		$quantity=$each['quantity'];
		$total_price= 0;
		$sql="insert into order_product(order_id,product_id,price,quantity,total_price)
		values('$order_id','$product_id','$price','$quantity','$total_price')";
		mysqli_query($connect,$sql);
	}

	mysqli_close($connect);
	unset($_SESSION['cart']);

	$_SESSION['success']='Order confirmed';
	header('location:index.php');

	