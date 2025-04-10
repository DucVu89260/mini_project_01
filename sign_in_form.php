<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php include 'heading.php' ?>
<body>
<div class="popup">
<h1 style="margin: 10px 0;">Signing In</h1>
<form method="post" action="sign_in_process.php">
	<table>
		<tr>
			<td>Email</td>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="checkbox" name="remember">
				<span style="font-style:italic;">Remember me</span>
			</td>
		</tr>
		<tr>
			<td colspan="2"><button>Log In</button></td>
		</tr>
	</table>
	<?php include 'menu_rule.php' ?>
</form>
</div>
</body>
</html>