<?php 
	require 'admin/connect.php';

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
 
	$product_per_page=8;
	$page_total= ceil($total_product / $product_per_page);
	$skip=$product_per_page  * ($page - 1);

	$sql="select * from products
	where name like '%$finding%'
	limit $product_per_page
	offset $skip";
	$result=mysqli_query($connect,$sql);
?>
<div id="div_mid">
	<div class="mid_top">
	<caption>
		<form>
			<i class="material-icons">search</i>
			<input type="search" name="finding" value=<?php echo $finding ?>>
		</form>
	</caption>
	<?php foreach ($result as $each): ?>
		<div class="id">
			<img src="admin/products/photos/<?php echo $each['photo'] ?>" height="120">
			<p><?php echo $each['description'] ?></p>
			<table width="100%">
				<tr>
				<td>
					<span style="font-style:italic; font-weight: bold;">
						<?php echo $each['price'] ?>,000VND
					</span>	
				</td>
				<td>
					<a href="cart_add_item.php?id=<?php echo $each['id'] ?>">
						<button>Add</button>
					</a>
				</td>
				</tr>
			</table>
		</div>
	<?php endforeach ?>
	</div>
	<div class="mid_bot">
		<?php for($i = 1; $i<= $page_total ; $i++) { ?>
			<a href="?page=<?php echo $i ?>&&finding=<?php echo $finding ?>">
				<?php echo $i ?>
			</a>
		<?php } ?>
	</div>
</div>