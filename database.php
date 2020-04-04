<?php
	
	// Executa Querys
	function DBExecute($SQL_query){
		$connection = DBConnect();
		$result = @mysqli_query($connection, $SQL_query) or die($connection);
		DBClose($connection);
		return $result;
	}

	// Inseri valores na tabela
	function DBInsert($table_name, $data){
		$table_name = DB_PREFIX."_".$table_name;// Adiciona prefixo
		$data = DBEscape($data);

		// Adicionar "aspas" simples entre values
		$array_keys = implode(', ', array_keys($data));
		$array_values = "'".implode("', '", $data)."'";


		$SQL_query = "INSERT INTO {$table_name} ({$array_keys}) VALUES({$array_values})";


		return DBExecute($SQL_query);
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

?>