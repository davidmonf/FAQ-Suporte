<?php 
			$host="172.30.0.160";
			$username="sibra";
			$password="sibra";
			$db_name="helpdesk";
			$tbl_name="usuario";
			$conecta_banco = sqlsrv_connect('$host', '$username', '$password');
			sqlsrv_select_db("$db_name")or print(mysql_error());
?>