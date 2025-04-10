<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php include 'heading.php' ?>
<body>
<div class="popup">
<h1 style="margin: 10px 0;">Signing Up</h1>
<form method="post" action="sign_up_process.php">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td>Phone number</td>
			<td><input type="text" name="phone_number"></td>
		</tr>
		<tr>
			<td>Birth date</td>
			<td><input type="date" name="birth_date"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="address"></td>
		</tr>
		<tr>
			<td colspan="2"><button>Sign Up</button></td>
		</tr>
	</table>
	<?php include 'menu_rule.php' ?>
</form>
</div>
</body>
</html>