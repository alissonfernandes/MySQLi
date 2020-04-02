<?php
	
	// Executa Querys
	function DBExecute($SQL_query){
		$connection = DBConnect();
		$result = @mysqli_query($connection, $SQL_query) or die());
		DBClose($connection);
		return $result;
	}

?>