<html>
<head profile="http://www.w3.org/2005/10/profile">
  <title>CIEE :: Central de Ajuda</title>
  <link rel="stylesheet" type="text/css" href="lol.css?v=1.1" />
  <link rel="icon" type="image/png" href="favicon.png" />
  <meta http-equiv="Content-Type" content="text/xhtml; charset=latin1_bin" />
  <style>
</style>
</head>
<body>
	<table width="600" align="center" border=0>
		<tr><td><?php include("topo.php")?></td></tr>
		<tr><td><?php include("busca.php")?></td></tr>
		<tr><td><?php include("categorias.php")?></td></tr>
		<tr><td width="500">
	     <?php 
			 $sql_top10 = "SELECT * FROM $tbl_name ORDER BY COUNT DESC LIMIT 10"; 			 
			 $result = mysql_query($sql_top10, $conecta_banco) or print(mysql_error());  
				echo "<div class='ajudas'>";
				echo "<h3 align='center'>Tópicos Mais visitados</h3>";
				echo "<table align='center'>";
				while ($resultado = mysql_fetch_assoc($result)) 
				{
					$titulo = $resultado['TITULO'];
					$link = 'texto.php?id=' . $resultado['ID'];
					echo "<tr>";
					echo "<td align='center'>";
					echo '<h2><a href="'.$link.'" title="'.$titulo.'" class="lnk_menu">'.$titulo.'</a></h2>';
					echo "</td>";
					echo "</tr>";
				}
			echo "</table></div>";
			mysql_close($conecta_banco);
		?>
		</td>
		</tr>
		<tr><td><?php include("baixo.php") ?></td></tr>
	</table>
</body>
</html>

