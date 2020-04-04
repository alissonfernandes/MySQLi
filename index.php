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
		require 'database.php';

		$cliente = array(
			'nome' => 'Lucas Silva',
			'email' => 'lucasSilvacontato@coderwb.com' ,
			'idade' => 19,
			'status' => 1
		);
	
		$name = 'clientes';

	?>

</body>
</html>