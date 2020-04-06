<?php
	
	// Executa Querys
	function DBExecute($SQL_query, $insertId){
		$connection = DBConnect();
		$result = @mysqli_query($connection, $SQL_query) or die(mysqli_error($connection));

		if ($insertId) {
			$result = mysqli_insert_id($connection);
		}
		DBClose($connection);
		return $result;
	}

	// Inseri valores na tabela
	function DBInsert($table_name, $data, $insertId = false){
		$table_name = DB_PREFIX."_".$table_name;// Adiciona prefixo
		$data = DBEscape($data);

		// Adicionar "aspas" simples entre values
		$array_keys = implode(', ', array_keys($data));
		$array_values = "'".implode("', '", $data)."'";


		$SQL_query = "INSERT INTO {$table_name} ({$array_keys}) VALUES({$array_values})";


		return DBExecute($SQL_query, $insertId);
	}

	// Selecionar dados na tabela
	function DBSelect($table, $params = null, $fields = '*'){
		$table_name = DB_PREFIX.'_'.$table;// Adiciona prefixo
		$params = ($params) ? " {$params}" : null;// Adiciona espaço caso haja parâmetros
		$SQL_query = "SELECT {$fields} FROM {$table_name}{$params}";
		$result = DBExecute($SQL_query);

		if (!mysqli_num_rows($result)){
			// Não encontra dados na tabela
			return false;
		}else{
			// Monta e retorna uma array
			while ($res = mysqli_fetch_assoc($result)) {
				$data[] = $res;
			}
			return $data;
		}
	}

	// Update de dados na tabela
	function DBUpdate($table_name, array $data, $where = null, $insertId = false){
		$table_name = DB_PREFIX.'_'.$table_name;// Add prefixo
		$where = ($where) ? " {$where}":null; // Add parâmetro caso haja

		foreach ($data as $key => $value) {// Percorre o array
			$fields[] = "{$key} = '{$value}'";
		}

		$fields = implode(", ", $fields);

		$SQL_query = "UPDATE {$table_name} SET {$fields}{$where}";
		
		return DBExecute($SQL_query, $insertId);
	}

	// Deleta Registros na tabela
	function DBDelete($table_name, $where = null){
		$table_name = DB_PREFIX.'_'.$table_name;
		$where = ($where) ? " {$where}":null;

		$SQL_query = "DELETE FROM {$table_name}{$where}";

		return DBExecute($SQL_query);
	}

?>