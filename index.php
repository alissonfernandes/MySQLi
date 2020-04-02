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

	$nome = "Alisson 'Fernandes'...";
	$data = array(
		'nome' => "Alisson Fernandes",
		'idade' => 19
	 	);

	$sql = "insert into clientes (nome) values (''Alisson 'Fernandes')";

	
	var_dump(DBExecute($sql));
	?>

</body>
</html>