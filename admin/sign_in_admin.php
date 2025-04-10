<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1>Admin logging in</h1>
<ul>
	<li>
		<a href="sign_up_admin.php">Sign up</a>
	</li>
	<li>
		<a href="index.php">Log in</a>
	</li>
</ul>
<?php include 'menu_rule.php' ?>
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
			<input type="checkbox" name="remember_admin">
			<span style="font-style: italic;">Remember me</span>
		</td>
	</tr>
	<tr>
		<td colspan="2"><button>Log in</button></td>
	</tr>
</table>
</form>
</body>
</html>