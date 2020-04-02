<?php
	
	# Abre e Fecha conexão com o banco de dados

	// Abri conexão com o banco de dados
	function DBConnect(){
		$connection = @mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die(mysqli_connect_error());

		//Setar configurações de caracteres
		mysqli_set_charset($connection, DB_CHARSET) or die(mysqli_error($connection));

		return $connection;
	}

	// Fecha conexão com o banco de dados
	function DBClose($connection){
		@mysqli_close($connection) or die(mysqli_error($connection));

	}

	// Protege contra SQL Injection
	function DBEscape($data){

		$connection = DBConnect();

		if (!is_array($data)) {
			$data = mysqli_real_escape_string($connection, $data);
		}else{
			$array = $data;

			foreach ($array as $key => $value) {
				$key = mysqli_real_escape_string($connection, $key);
				$value = mysqli_real_escape_string($connection, $value);

				$data[$key] = $value;
			}
		}

		DBClose($connection);
		return $data;
	}
?>