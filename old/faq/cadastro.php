<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin1_bin" />
<link rel="stylesheet" type="text/css" href="lol.css" />
<link rel="icon" type="image/png" href="null" />
<title>CIEE :: Central de Ajuda</title>
</head>
<body>
<table width="600" align="center">
<tr><td><?php include("topo.php")?></td></tr>
<tr><td><?php include("busca.php")?></td></tr>
<tr><td><?php include("categorias.php")?></td></tr>
<tr><td width="800">
<?php
	protegePagina(); // Chama a função que protege a página
	include("conexao.php");
	if (!isset($_GET['id'])){
		include ("form_cadastro_branco.php");
		if (isset($_GET['titulo'])){
			$titulo = $_GET['titulo'];
			$texto = $_GET['texto'];
			$categoria = $_GET['categoria'];
			$sql = "INSERT INTO  $tbl_name (ID , TITULO , TEXTO ,CATEG) VALUES ('NULL', '$titulo', '$texto', '$categoria')";
			$result = mysql_query($sql, $conecta_banco) or print(mysql_error());
			echo ("<script>alert('Dados inseridos com sucesso');window.location = 'main.php'</script>");
		}
	} 
	elseif (!isset($_GET['titulo'])) {
		$busca = $_GET['id'];
		$busca = mysql_real_escape_string($busca);
		$sql = "SELECT * FROM $tbl_name where ID=$busca";
		$result = mysql_query($sql, $conecta_banco) or print(mysql_error()); 
		while ($resultado = mysql_fetch_array($result)){
			$titulo = $resultado['TITULO'];
			$texto = $resultado['TEXTO'];
			$categoria = $resultado['CATEG'];
		}
		include("form_cadastro.php");
	}
	elseif (isset($_GET['titulo'])){
		$titulo = $_GET['titulo'];
		$texto = $_GET['texto'];
		$categoria = $_GET['categoria'];
		$id = $_GET['id'];
		$sql = "UPDATE $db_name.$tbl_name SET TITULO='$titulo',TEXTO='$texto',CATEG='$categoria' WHERE $tbl_name.ID=$id";
		$result = mysql_query($sql, $conecta_banco) or print(mysql_error());
		echo ("<script>alert('Dados atualizados com sucesso');window.location = 'texto.php?id=$id'</script>");
	}
?>
 </td>
 </tr>
 </table>
</body>
</html>