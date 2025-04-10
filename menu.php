<ul>
	<?php if(!empty($_SESSION['id'])) { ?>
		<li>
			<button class="button_1"><a href="account.php">Account settings</a></button>
		</li>
		<li>
			<button class="button_1"><a href="sign_out.php">Log out</a></button>
		</li>
		<li>
			<button class="button_1"><a href="order_history.php">Order history</a></button>
		</li>
	<?php } else { ?>
		<li>
			<button class="button_1"><a href="sign_in_form.php">Log In</a></button>
		</li>
		<li>
			<button class="button_1"><a href="sign_up_form.php">Sign up</a></button>
		</li>
	<?php } ?>
</ul>
