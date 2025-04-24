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
	$customer_id=$_SESSION['id'];

	$sql="select * from orders where customer_id='$customer_id'";
	$result=mysqli_query($connect,$sql);
?>
<div id="div_total">
	<?php include 'header.php' ?>
	<div id="div_mid">
		<div class="mid_top">
			<div class="mid_top_left">
				<h2>Your bill history</h2>
				<table width="100%" border="1">
					<tr>
						<th>Order Id</th>
						<th>Receiver name</th>
						<th>Receover phone</th>
						<th>Receiver address</th>
						<th>Receiver email</th>
						<th>Bill created at</th>
						<th>Total bill</th>
						<th>Detail</th>
					</tr>
					<?php foreach ($result as $each): ?>
					<tr>
						<td><?php echo $each['id'] ?></td>
						<td><?php echo $each['name_receiver'] ?></td>
						<td><?php echo $each['phone_receiver'] ?></td>
						<td><?php echo $each['address_receiver'] ?></td>
						<td><?php echo $each['email_receiver'] ?></td>
						<td><?php echo $each['created_at'] ?></td>
						<td><?php echo $each['total_bill'] ?></td>
						<td>
							<a href="order_product.php?id=<?php echo $each['id'] ?>">
								<button><i class="material-icons" style="font-size: 18px;">link</i></button>
							</a>
						</td>
					</tr>	
					<?php endforeach ?>
				</table>
			</div>
			<div class="mid_top_right"></div>
		</div>
		<div class="mid_bot"></div>
	</div>
	<?php include 'footer.php' ?>
</div>
</body>
</html>