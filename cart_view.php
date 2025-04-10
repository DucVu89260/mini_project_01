<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php include 'heading.php' ?>
<body>
<?php include 'header.php' ?>
<?php
	if(empty($_SESSION['cart'])) {
		$_SESSION['error']='No item in cart';
		header('location:index.php');
	} else {
		$cart=$_SESSION['cart'];
	}

	$sum=0;
?>
<h1>View your cart</h1>
<table width="100%" border="1px" style="text-align: left;">
	<tr>
		<th>Product Id</th>
		<th>Name</th>
		<th>Image</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Total price</th>
		<th>Delete</th>
	</tr>
	<?php foreach ($cart as $product_id => $each): ?>
	<tr>
		<td><?php echo $product_id ?></td>
		<td><?php echo $each['name'] ?></td>
		<td>
			<img src="admin/products/photos/<?php echo $each['photo'] ?>" height=70>
		</td>
		<td><?php echo $each['price'] ?></td>
		<td>
			<a href="cart_update_quantity.php?id=<?php echo $product_id ?>&type=decrease">
			-</a>
			<?php echo $each['quantity'] ?>
			<a href="cart_update_quantity.php?id=<?php echo $product_id ?>&type=increase">
			+</a>
		</td>
		<td>
			<?php echo $each['price'] * $each['quantity'] ?>
		</td>
		<td>
			<a href="cart_delete_item.php?id=<?php echo $product_id ?>">x</a>
		</td>
		<?php
			$result= $each['price'] * $each['quantity'];
			$sum += $result;
		?>
	</tr>
	<?php endforeach ?>
</table>

<?php 
	require 'admin/connect.php';

	$customer_id=null;
	if(!empty($_SESSION['id'])){
		$customer_id= $_SESSION['id'];
	}
	
	$sql="select * from customers where id='$customer_id'";
	$result=mysqli_query($connect,$sql);
	$each=mysqli_fetch_array($result);	

	if(empty($_SESSION['id'])){
		$each['name']='';
		$each['email']='';
		$each['phone_number']='';
		$each['address']='';
	}
?>
<h1>Bill Summary</h1>
<form method="post" action="cart_checkout.php" id="receiver">
	<input type="" name="customer_id" value="<?php echo $customer_id ?>">
	<table width="320px">
		<tr>
			<th colspan="2" align="left">Receiver's information</th>
		</tr>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name_receiver" value="<?php echo $each['name'] ?>"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="email_receiver" value="<?php echo $each['email'] ?>"></td>
		</tr>
		<tr>
			<td>Phone number</td>
			<td><input type="text" name="phone_receiver" value="<?php echo $each['phone_number'] ?>"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="address_receiver" value="<?php echo $each['address'] ?>"></td>
		</tr>
		<tr>
			<th colspan="2" align="left">
				Total bill:
				<?php echo $sum ?>
				,000VND
			</th>
		</tr>
	</table>
</form>
<button form="receiver" class="btn">Confirm</button>

<!-- <div class="popup" id="popup">
	<h2>Thank you!</h2>
	<p>Order's information has been checked</p>
	<form action="index.php" onclick="close_popup()">
		<button><h3>You want more</h3></button>
	</form>
</div> -->

<?php include 'footer.php' ?>

<!-- <script type="text/javascript">
	let popup = document.getElementById("popup");

	function open_popup(){
		popup.classList.add("open-popup");
	}

	function close_popup(){
		popup.classList.remove("open-popup");
	};
</script> -->
</body>
</html>