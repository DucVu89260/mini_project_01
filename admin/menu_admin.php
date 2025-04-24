<?php if(empty($_SESSION['id_admin'])) { ?>
	<ul>
		<li>
			<a href="index.php">Log in</a>
		</li>
		<li>
			<a href="sign_up_admin.php">Sign up</a>
		</li>
	</ul>
<?php } else { ?>
	<ul>
		<li>
			<a href="../account_admin.php">Account update</a>
		</li>
		<li>
			<a href="../sign_out_admin.php">Log out</a>
		</li>
		<li>
			<a href="../orders">Orders manage</a>
		</li>
	</ul>
<?php } ?>



<?php if(!empty($_SESSION['error'])) { ?>
	<span style="color: red; font-style: italic;">
		<?php
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		?>
	</span>
<?php } ?>

<?php if(!empty($_SESSION['success'])) { ?>
	<span style="color: blue; font-style: italic;">
		<?php
			echo $_SESSION['success'];
			unset($_SESSION['success']);
		?>
	</span>
<?php } ?>