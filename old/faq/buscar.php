<html>
<head>
	<title>CIEE :: Central de Ajuda</title>
  <link rel="stylesheet" type="text/css" href="lol.css" />
  <link rel="icon" type="image/png" href="null" />
  <meta http-equiv="Content-Type" content="text/xhtml; charset=latin1_bin" />
</head>
<body>
<body>
<table width="600" align="center">
<tr><td><?php include("topo.php")?></td></tr>
<tr><td><?php include("busca.php")?></td></tr>
<tr><td><?php include("categorias.php")?></td></tr>
<tr><td width="800">
<?php
	include("conexao.php");
	if (!isset($_GET['consulta'])) {
	header("Location: main.php");
	exit;
	}
	$busca = $_GET['consulta'];
	$busca = mysql_real_escape_string($busca);
	$sql = "SELECT * FROM $tbl_name WHERE LOWER(TITULO) LIKE LOWER('%$busca%') ORDER BY ID DESC";
	$result = mysql_query($sql, $conecta_banco) or print(mysql_error());
	echo "<ul>";
	while ($resultado = mysql_fetch_assoc($result)) {
	$titulo = $resultado['TITULO'];
	$link = 'texto.php?id=' . $resultado['ID'];
	echo '<li><a href="'.$link.'" title="'.$titulo.'" class="lnk_menu">'.$titulo.'</a><br /></li>';
	}
	echo "</ul>";
	mysql_close($conecta_banco); 
	?>
 </td>
 </tr>
  <tr><td><?php include("baixo.php") ?></td></tr>
 </table>
</body>
</html>