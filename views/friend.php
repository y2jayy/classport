#!/usr/local/bin/php
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Friends<?php echo $title; ?></title>
	</head>
	<body>
		<p>Here is a list of your friends.</p>
		<?php echo $subview; ?>
		<?php var_dump($db); ?>
		<form method="post" action="index.php?controller=friend&method=addfriend">
			<input type="text" name="name" />
			<input type="submit" value="Add Friend" />
		</form>
	</body>
</html>
