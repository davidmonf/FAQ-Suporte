<html>
<head>
	<title>CIEE :: Central de Ajuda</title>
  <link rel="stylesheet" type="text/css" href="lol.css?v=1.1" />
  <link rel="icon" type="image/png" href="null" />
  <meta http-equiv="Content-Type" content="text/xhtml; charset=latin1_bin" />
  <script src="css_browser_selector.js" type="text/javascript"></script>
</head>
<body>
	<table align="center"class="conteudo" border=0>
	<?php include("topo_completo_sup.php")?>
<tr><td class=espacos><a href = "javascript:history.back()">  Voltar  </a></tr></td>
<tr><td align=center>
<?php
	protegePagina(); // Chama a função que protege a página
	include("conexao.php");
	$busca = $_GET['usuario'];
	$busca = mysql_real_escape_string($busca);
	$sql = "SELECT * FROM topicos_suporte WHERE CRIADOR='$busca' ORDER BY TITULO ASC";
	$result = mysql_query($sql, $conecta_banco) or print(mysql_error());
	//echo "<div class='ajudas'>";
	echo "<h3 align='center'>Tópicos criados por $busca</h3>";
	echo "<table align='center' border=0>";
	while ($resultado = mysql_fetch_assoc($result)) {
		$aprovado = $resultado['APROVADO'];
		$titulo = $resultado['TITULO'];
		$link = 'texto_suporte.php?id=' . $resultado['ID'];
		if ($aprovado==1)
		{
		echo '<tr>';
		echo '<td align="center"><h3><a href="'.$link.'" title="'.$titulo.'" class="lnk_menu">'.$titulo.'</a></h3></td>';
		echo '</tr>';
		}
	}
	echo "</table>";
	//echo "</div>";
	echo '<a href="sugestao.php" title="Sugerir um tópico" class=espacos>Sugerir um tópico</a>';
	mysql_close($conecta_banco);
?>
</td>
</tr>
 <tr><td><?php include("baixo.php") ?></td></tr>
</table>
</body>
</html>