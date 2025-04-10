<?php session_start(); ?>
<?php include '../login_check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1>Add more product</h1>
<?php include '../menu_admin.php' ?>
<?php
	require '../connect.php';
	$sql="select * from manufacturers";
	$result=mysqli_query($connect,$sql);
?>

<form method="post" action="insert_process.php" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Product's name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><input type="text" name="description"></td>

		</tr>
		<tr>
			<td>Image</td>
			<td><input type="file" name="photo"></td>
		</tr>
		<tr>
			<td>Price</td>
			<td>
				<input type="text" name="price">
				<span style="font-style: italic;">(1000 VND)</span>
			</td>
		</tr>
		<tr>
			<td>Manufacturer</td>
			<td>
				<select name="manufacturer_id">
				<?php foreach ($result as $each): ?>
					<option value="<?php echo $each['id'] ?>">
						<?php echo $each['name'] ?>
					</option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><button>Add product</button></td>
		</tr>
	</table>
</form>
</body>
</html>