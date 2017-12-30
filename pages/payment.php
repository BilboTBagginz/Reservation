<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment</title>
</head>
<body>
	<h2>Payment</h2>
	<?php
		$info = unserialize($_SESSION['info']);
		$check = $info->get_price();
		echo "Would you kindly transfer ".$check." € to the account XXXXX-XXXXXXXX";
		$_SESSION['info'] = serialize($info);
	?>
	<p>
	<form method='post' action='index.php?page=./db/dbdump'>
			<input type='submit' value='Done'/>
	</form>
</body>
</html>