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
<h1>Updating manufacturer</h1>
<a href="index.php"><h3>Manufacturers</h3></a>
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

	$sql="select * from manufacturers where id='$id'";
	$result=mysqli_query($connect,$sql);
	$each=mysqli_fetch_array($result);

?>
<form method="post" action="update_process.php" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $each['id'] ?>">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" value="<?php echo $each['name'] ?>"></td>
		</tr>
		<tr>
			<td>Phone number</td>
			<td><input type="text" name="phone_number" value="<?php echo $each['phone_number'] ?>"></td> 
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="address" value="<?php echo $each['address'] ?>"></td>
		</tr>
		<tr>
			<td>Keep old logo</td>
			<td>
				<img src="photos/<?php echo $each['logo'] ?>" height="80">
				<input type="hidden" name="logo_old" value="<?php echo $each['logo'] ?>">
			</td>
		</tr>
		<tr>
			<td>Add change logo</td>
			<td><input type="file" name="logo_new"></td>
		</tr>
		<tr>
			<td><button>Update</button></td>
		</tr>
	</table>
</form>
</body>
</html>