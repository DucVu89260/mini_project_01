<?php session_start(); ?>
<?php include '../login_check_admin.php' ?>
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
<h1>Products management</h1>
<li>
	<a href="insert_form.php">Add more products</a>
</li>
<?php if($_SESSION['level'] == 1){ ?>
	<li>
	<a href="../manufacturers">Manufacturers management</a>
	</li>
<?php } ?>
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

	$sql_total_product="select count(*) from products
	where name like '%$finding%'";
	$result=mysqli_query($connect,$sql_total_product);
	$total_product=mysqli_fetch_array($result)['count(*)'];
 
	$product_per_page=5;
	$page_total= ceil($total_product / $product_per_page);
	$skip=$product_per_page  * ($page - 1);
?>

<table width="80%" border="1">
	<caption style="text-align: left;">
		<form>
			<i class="material-icons">search</i>
			<input type="search" name="finding" value=<?php echo $finding ?>>
		</form>
	</caption>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Description</th>
		<th>Image</th>
		<th>Price (kVND)</th>
		<th>Manufacturer</th>
		<th>Edit</th>
		<th>Remove</th>
	</tr>
	<?php

		$sql="select
		products.*,
		manufacturers.name as manufacturer_name
		from
		products
		left join manufacturers on manufacturers.id = products.manufacturer_id
		where products.name like '%$finding%'
		order by products.price asc
		limit $product_per_page
		offset $skip
		";
		$result=mysqli_query($connect,$sql);
	?>
	<?php foreach ($result as $each): ?>
	<tr>
		<td><?php echo $each['id'] ?></td>
		<td><?php echo $each['name'] ?></td>
		<td><?php echo $each['description'] ?></td>
		<td style="text-align: center;">
			<img src="photos/<?php echo $each['photo'] ?>" height="80">
		</td>
		<td><?php echo $each['price'] ?></td>
		<td><?php echo $each['manufacturer_name'] ?></td>
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
