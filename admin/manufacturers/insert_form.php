<?php session_start(); ?>
<?php include '../login_check_sadmin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1>Inserting manufacturer</h1>
<?php include '../menu_admin.php' ?>
<form method="post" action="insert_process.php" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Phone number</td>
			<td><input type="text" name="phone_number"></td>

		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="address"></td>
		</tr>
		<tr>
			<td>Logo</td>
			<td><input type="file" name="logo"></td>
		</tr>
		<tr>
			<td><button>Add manufacturer</button></td>
		</tr>
	</table>
</form>
</body>
</html>