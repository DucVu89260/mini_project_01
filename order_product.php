<?php session_start(); ?>
<?php
	if(empty($_SESSION['id'])) {
		$_SESSION['error']='Must transfer value for ID';
		header('location:index.php');
		exit;
	} else {
		$id=$_SESSION['id'];
	}
?>
<!DOCTYPE html>
<html>
	<?php include 'heading.php' ?>
<body>
<?php
	require 'admin/connect.php';

	if(empty($_SESSION['id'])) {
		$_SESSION['error']='No item in cart';
		header('location:index.php');
	} else {
		$cart=$_SESSION['cart'];
	}


	$sql="select * from order_product where order_id='$id'";
	$result=mysqli_query($connect,$sql);
?>
<h1>Order/Bill details</h1>
<div id="div_total">
	<?php include 'header.php' ?>
	<div id="div_mid">
		<div class="mid_top">
			<table width="100%" border="1">
				<tr>
					<th>Order Id</th>
					<th>Product Id</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total price</th>
					<th>Product detail</th>
				</tr>
				<?php foreach ($result as $each): ?>
				<tr>
					<td><?php echo $each['order_id '] ?></td>
					<td><?php echo $each['product_id '] ?></td>
					<td><?php echo $each['price'] ?></td>
					<td><?php echo $each['quantity'] ?></td>
					<td><?php echo $each['total_price'] ?></td>
					<td>
						<a href="product.php">>></a>
					</td>
					<td>
						<a href="order_product.php?id=<?php echo $each['id'] ?>">
							<button><i class="material-icons" style="font-size: 18px;">link</i></button>
						</a>
					</td>
				</tr>	
				<?php endforeach ?>
			</table>
			<div class="mid_top_right"></div>
		</div>
		<div class="mid_bot"></div>
	</div>
	<?php include 'footer.php' ?>
</div>
</body>
</html>