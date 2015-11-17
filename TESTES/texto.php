<html>
<head>
<title>CIEE :: Central de Ajuda</title>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> 
  <script type="text/javascript" src="js/prototype.js"></script>
  <script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
  <script type="text/javascript" src="js/lightbox.js"></script>
  <link rel="stylesheet" type="text/css" href="lol.css" media="screen"/>
  <link rel="icon" type="image/png" href="null" />
  <meta http-equiv="Content-Type" content="text/xhtml; charset=latin1_bin" />
</head>
<body>
<table width="600" align="center" border=0 class="conteudo">
<tr><td><?php include("topo.php")?></td></tr>
<tr><td><?php include("busca.php")?></td></tr>
<tr><td><?php include("categorias.php")?></td></tr>
<tr><td><a href = "javascript:history.back()">  Voltar  </a></tr></td>
<tr><td align="center">
<div style="text-align: left;">
	<?php include ("conexao.php");
		$busca = $_GET['id'];
		$busca = mysql_real_escape_string($busca);
		$sql_texto = "SELECT * FROM $tbl_name where ID=$busca";
		$result = mysql_query($sql_texto, $conecta_banco) or print(mysql_error()); 
		while ($resultado = mysql_fetch_assoc($result)) 
		{
			$titulo = $resultado['TITULO'];
			$texto = $resultado['TEXTO'];
			$count = $resultado['COUNT'];
			echo ("<h2>$titulo</h2>");
			echo ("<p>$texto</p>");
		}
		if (!isset($_SESSION))
		{
		$count = $count+1;
		$sql_text = "UPDATE $db_name.$tbl_name SET COUNT='$count' WHERE $tbl_name.ID=$busca";
		$result = mysql_query($sql_text, $conecta_banco) or print(mysql_error());
		}
		mysql_close($conecta_banco); 
	?>
</div>
 </td>
 </tr>
 <?php
if (isset($_SESSION['usuarioID'])){
	echo ('<tr><td><a href="cadastro.php?id='.$_GET['id'].'">Alterar essa p&aacute;gina</a></td></tr>');
}
	echo ('<tr><td><a href="sugestao.php?id='.$_GET['id'].'">Reportar erro</a></td></tr>');
?>
 <tr><td><?php include("baixo.php") ?></td></tr>
 </table>
</body>
</html>


