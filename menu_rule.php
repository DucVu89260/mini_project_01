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