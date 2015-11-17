<html>
<head>
	<title>CIEE :: Central de Ajuda</title>
  <link rel="stylesheet" type="text/css" href="lol.css" />
  <link rel="icon" type="image/png" href="null" />
  <meta http-equiv="Content-Type" content="text/xhtml; charset=latin1_bin" />
</head>
<body>
<table width="600" align="center">
<tr><td><?php include("topo.php")?></td></tr>
<tr><td><?php include("busca_suporte.php")?></td></tr>
<tr><td><?php include("categorias_suporte.php")?></td></tr>
<tr><td><a href = "javascript:history.back()">  Voltar  </a></tr></td>
<tr><td width="800">
<?php
	protegePagina(); // Chama a função que protege a página
	include("conexao.php");
	$busca = $_GET['categoria'];
	$busca = mysql_real_escape_string($busca);
	$sql = "SELECT * FROM topicos_suporte WHERE CATEG='$busca' AND APROVADO <> '0' ORDER BY TITULO ASC";
	$result = mysql_query($sql, $conecta_banco) or print(mysql_error());
	echo "<div class='ajudas'>";
	echo "<h3 align='center'>Categoria $busca</h3>";
	echo "<table align='center'>";
	while ($resultado = mysql_fetch_assoc($result)) {
		$titulo = $resultado['TITULO'];
		$link = 'texto_suporte.php?id=' . $resultado['ID'];
		echo '<tr>';
		echo '<td align="center"><h3><a href="'.$link.'" title="'.$titulo.'" class="lnk_menu">'.$titulo.'</a></h3></td>';
		echo '</tr>';
	}
	echo "</table>";
	echo "</div>";
	echo '<a href="sugestao.php" title="Sugerir um tópico" class="lnk_menu">Sugerir um tópico</a>';
	mysql_close($conecta_banco);
?>
</td>
</tr>
 <tr><td><?php include("baixo.php") ?></td></tr>
</table>
</body>
</html>