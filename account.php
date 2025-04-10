<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php include 'heading.php' ?>
<body>
<?php
	require 'admin/connect.php';

	include 'sign_in_check.php';

	if(!empty($_SESSION['id'])){
		$id=$_SESSION['id'];
	}

	$sql="select * from customers where id='$id'";
	$result=mysqli_query($connect,$sql);
	$each=mysqli_fetch_array($result);
?>
<div id="div_total">
	<?php include 'header.php' ?>
	<div id="div_mid">
		<div class="mid_top">
			<div class="mid_top_left">
				<div class="popup">
					<h1 style="margin: 10px 0;">Account settings</h1>
					<form method="post" action="account_update_process.php">
						<table>
						<tr>
							<td>Name</td>
							<td><input type="text" name="name" value="<?php echo $each['name'] ?>"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="email" name="email" value="<?php echo $each['email'] ?>"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="text" name="password" value="<?php echo $each['password'] ?>"></td>
						</tr>
						<tr>
							<td>Phone number</td>
							<td><input type="text" name="phone_number" value="<?php echo $each['phone_number'] ?>"></td>
						</tr>
						<tr>
							<td>Birth date</td>
							<td><input type="date" name="birth_date" value="<?php echo $each['birth_date'] ?>"></td>
						</tr>
						<tr>
							<td>Address</td>
							<td><input type="text" name="address" value="<?php echo $each['address'] ?>"></td>
						</tr>
						<tr>
							<td colspan="2"><button>Update</button></td>
						</tr>
						</table>
						<?php include 'menu_rule.php' ?>
					</form>
				</div>
			</div>
			<div class="mid_top_right"></div>
		</div>
		<div class="mid_bot"></div>
	</div>
	<?php include 'footer.php' ?>
</div>
</html>

			