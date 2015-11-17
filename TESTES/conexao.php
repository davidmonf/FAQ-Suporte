<?php 
			$host="localhost";
			$username="root";
			$password="netuno1989";
			$db_name="faq";
			$tbl_name="topicos";
			$conecta_banco = mysql_connect("$host", "$username", "$password")or die("Não posso conectar"); 
			mysql_select_db("$db_name")or print(mysql_error());
?>