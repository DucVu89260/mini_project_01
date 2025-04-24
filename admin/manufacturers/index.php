<?php session_start(); ?>
<?php include '../login_check_sadmin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../styles.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<h1>Manufacturers</h1>
<li>
	<a href="insert_form.php">Add more manufacturers</a>
</li>
<li>
	<a href="../products">Products management</a>
</li>
<?php include '../menu_admin.php' ?>
<?php include '../menu_rule.php' ?>
<?php
	require '../connect.php';

	$finding='';
	if(isset($_GET['finding'])){
		$finding = $_GET['finding'];
	}

	$page=1;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}

	$sql_total_manu="select count(*) from manufacturers
	where name like '%$finding%'";
	$result=mysqli_query($connect,$sql_total_manu);
	$total_manu=mysqli_fetch_array($result)['count(*)'];
 
	$manu_per_page=6;
	$page_total= ceil($total_manu / $manu_per_page);
	$skip=$manu_per_page  * ($page - 1);

	$sql="select * from manufacturers
	where name like '%$finding%'
	limit $manu_per_page
	offset $skip";
	$result=mysqli_query($connect,$sql);

?>
<caption><form>
	<i class="material-icons">search</i>
	<input type="search" name="finding" value=<?php echo $finding ?>>
</form></caption>
<table width="80%" border="1">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Phone number</th>
		<th>Address</th>
		<th>Edit</th>
		<th>Remove</th>
	</tr>
	<?php foreach ($result as $each): ?>
	<tr>
		<td><?php echo $each['id'] ?></td>
		<td><?php echo $each['name'] ?></td>
		<td><?php echo $each['phone_number'] ?></td>
		<td>
			<img src="photos/<?php echo $each['logo'] ?>" height="80">
		</td>
		<td>
			<a href="update_form.php?id=<?php echo $each['id'] ?>">
			Edit</a>
		</td>
		<td>
			<a href="delete.php?id=<?php echo $each['id'] ?>">
			x</a>
		</td>
	</tr>
	<?php endforeach ?>
</table>
<?php for($i = 1; $i<= $page_total ; $i++) { ?>
	<a href="?page=<?php echo $i ?>&&finding=<?php echo $finding ?>">
		<?php echo $i ?>
	</a>
<?php } ?>
</body>
</html>