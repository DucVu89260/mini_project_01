<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1>Admin registry</h1>
<ul>
	<li>
		<a href="sign_up_admin.php">Sign up</a>
	</li>
	<li>
		<a href="index.php">Log in</a>
	</li>
</ul>
<form method="post" action="sign_up_admin_process.php">
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
		<td>Level</td>
		<td>
			<select name="level">
				<option value="0">Admin</option>
				<option value="1">Super admin</option>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2"><button>Sign up</button></td>
	</tr>
</table>
</form>
</body>
</html>