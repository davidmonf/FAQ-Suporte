<html>
<head>
	<title>CIEE :: Central de Ajuda</title>
  <link rel="stylesheet" type="text/css" href="lol.css?v=1.1" />
  <link rel="icon" type="image/png" href="null" />
  <meta http-equiv="Content-Type" content="text/xhtml; charset=latin1_bin" />
    <script src="css_browser_selector.js" type="text/javascript"></script>
</head>
<body>
<body>
	<table border=0 align="center"class="conteudo">
	<?php include("topo_completo.php")?>
<tr><td width="1024" align=center>
<?php
	include("conexao.php");
	if (!isset($_GET['consulta'])) {
	header("Location: main.php");
	exit;
	}
	$busca = $_GET['consulta'];
	$busca = mysql_real_escape_string($busca);
	$sql = "SELECT * FROM $tbl_name WHERE APROVADO = '1' AND (LOWER(TITULO) LIKE LOWER('%$busca%') OR LOWER(TAG) LIKE LOWER('%$busca%')) ORDER BY ID DESC";
	$result = mysql_query($sql, $conecta_banco) or print(mysql_error());
	if (mysql_num_rows($result) > 0)
	{
	echo "<h3 align=center>Você buscou por \"$busca\" e foram encontrados os seguintes resultados:</h3>";
	//echo "<div class='ajudas'>";
	echo "<table align='center'>";
	while ($resultado = mysql_fetch_assoc($result)) {
	$titulo = $resultado['TITULO'];
	$link = 'texto.php?id=' . $resultado['ID'];
	$categoria = $resultado['CATEG'];
	echo '<tr>';
	echo '<td align="center"><a href="'.$link.'" title="'.$titulo.'" class="lnk_menu">'.$titulo.' - '.$categoria.'</a><br />&nbsp</td>';
	echo '</tr>';
	}
	echo "</table>";
	//echo "</div>";
	echo '<a href="sugestao.php" title="Sugerir um tópico" class="lnk_menu">Sugerir um tópico</a>';
	}
	else
	{
	echo "<h3>Você buscou por \"$busca\" e não foram encontrados resultados!</h3>";
	echo 'Tente procurar nas categorias acima, abra um chamado utilizando o link abaixo ou <a href="sugestao.php" title="Sugira um tópico" class="lnk_menu">sugira um tópico</a>';
	}
	mysql_close($conecta_banco); 
	?>
 </td>
 </tr>
  <tr><td><?php include("baixo.php") ?></td></tr>
 </table>
</body>
</html>