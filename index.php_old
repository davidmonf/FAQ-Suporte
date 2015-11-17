<html>
<head profile="http://www.w3.org/2005/10/profile">
  <title>CIEE :: Central de Ajuda</title>
  <link rel="stylesheet" type="text/css" href="lol.css" />
  <link rel="icon" type="image/png" href="null" />
  <meta http-equiv="Content-Type" content="text/xhtml; charset=latin1_bin" />
  <style>
</style>
</head>
<body>
<table width="600" align="center" border=0>
<tr><td><?php include("topo.php")?></td><?php //include("categorias.php") ?></tr>
<tr><td><?php include("busca.php")?></td></tr>
<tr><td><?php include("categorias.php")?></td></tr>
<tr><td width="500">
	     <?php //include("conexao.php");
			 $sql_top5 = "SELECT * FROM $tbl_name ORDER BY COUNT DESC LIMIT 5"; 			 
			 $result = mysql_query($sql_top5, $conecta_banco) or print(mysql_error());  
				echo "<div class='ajudas'>";
				echo "<table>";
				echo "<tr><td colspan=2 align='center' /**style='border-bottom-color: #0000ff; border-bottom-style: solid; border-bottom-width: 1px;'*/><h3>Ajudas mais visitadas</h3></td></tr>";
				while ($resultado = mysql_fetch_assoc($result)) 
				{
					$titulo = $resultado['TITULO'];
					$link = 'texto.php?id=' . $resultado['ID'];
					echo "<tr>";
					echo "<td>";
					echo '<a href="'.$link.'" title="'.$titulo.'" class="lnk_menu">'.$titulo.'</a><br>&nbsp';
					echo "</td>";
					echo "</tr>";
				}
			echo "</table></div>";
			/*$sql_categorias = "SELECT * FROM categorias"; 
			 $result = mysql_query($sql_categorias, $conecta_banco) or print(mysql_error());  
				echo '<div class="categorias">';
				echo "<table>";
				echo "<tr><td colspan=2 align='center'><h3>Categorias</h3></td></tr>";
				while ($resultado = mysql_fetch_assoc($result)) 
				{
					$categoria = $resultado['CATEG'];
					$icone = $resultado['ICON'];
					$link = 'buscar_categorias.php?categoria=' . $resultado['CATEG'];
					echo "<tr><td>";
					echo '<a href="'.$link.'" title="'.$categoria.'"><img src="'.$icone.'" width="45" border="0" style="float: middle;"></a>';
					echo "</td><td>";
					echo '<a href="'.$link.'" title="'.$categoria.'">'.$categoria.'</a>';
					echo "</td></tr>";
				}
			echo "</table></div>";*/
			mysql_close($conecta_banco);
			?>
 </td>
 </tr>
 <tr><td><?php include("baixo.php") ?></td></tr>
 </table>
</body>
</html>

