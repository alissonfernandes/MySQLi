<!DOCTYPE html>
<html>
<head lang="pt_BR">
	<meta charset="utf-8">
	<title>PHP - MySQLi</title>
</head>
<body>
	<?php
		require 'config.php';
		require 'connection.php';

		$con = DBConnect();
		DBClose($con);
	?>

</body>
</html>