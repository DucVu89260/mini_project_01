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
<h1>Updating products</h1>
<a href="index.php"><h3>Products</h3></a>
<?php include '../menu_admin.php' ?>
<?php
	if(empty($_GET['id'])){
		$_SESSION['error']='Must transfer value for ID';
		header('location:index.php');
	}
	$id=$_GET['id'];
?>
<?php
	require '../connect.php';
	$sql="select * from products where id='$id'";
	$result=mysqli_query($connect,$sql);
	$each=mysqli_fetch_array($result);

	$sql_manu="select * from manufacturers";
	$result_manu=mysqli_query($connect,$sql_manu);
?>

<form method="post" action="update_process.php" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $id ?>">
	<table>
		<tr>
			<td>Product's name</td>
			<td><input type="text" name="name" value="<?php echo $each['name'] ?>"></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><input type="text" name="description" value="<?php echo $each['description'] ?>"></td>

		</tr>
		<tr>
			<td>Keep old image</td>
			<td>
				<img src="photos/<?php echo $each['photo'] ?>" height="80">
				<input type="hidden" name="photo_old" value="<?php echo $each['photo'] ?>">
			</td>
		</tr>
		<tr>
			<td>Or add new</td>
			<td><input type="file" name="photo_new"></td>
		</tr>
		<tr>
			<td>Price</td>
			<td>
				<input type="text" name="price" value="<?php echo $each['price'] ?>">
				<span style="font-style: italic;">(1000 VND)</span>
			</td>
		</tr>
		<tr>
			<td>Manufacturer</td>
			<td>
				<select name="manufacturer_id">
					<?php foreach ($result_manu as $each_manu): ?>
						<option value="<?php echo $each_manu['id'] ?>"
						<?php if($each['manufacturer_id'] == $each_manu['id']){ ?>
							selected
						<?php } ?>
						>
							<?php echo $each_manu['name'] ?>
						</option>	
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><button>Update product</button></td>
		</tr>
	</table>
</form>
</body>
</html>