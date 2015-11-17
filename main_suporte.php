<html>
<head profile="http://www.w3.org/2005/10/profile">
  <title>CIEE :: Central de Ajuda</title>
  <link rel="stylesheet" type="text/css" href="lol.css" />
  <link rel="icon" type="image/png" href="favicon.png" />
  <meta http-equiv="Content-Type" content="text/xhtml; charset=latin1_bin" />
</head>
<body>
	<table width="1024" align="center">
		<tr><td colspan=2><?php include("topo.php")?></td></tr>
		<tr><td colspan=2><?php include("busca_suporte.php")?></td></tr>
		<tr><td colspan=2><?php include("categorias_suporte.php")?></td></tr>
		<tr>
	     <?php
			protegePagina(); // Chama a função que protege a página
			 $sql_top10 = "SELECT * FROM topicos_suporte WHERE APROVADO <> '0' ORDER BY COUNT DESC LIMIT 10"; 			 
			 $result = mysql_query($sql_top10, $conecta_banco) or print(mysql_error());  
				echo "<td width=500 align=center>";
				echo "<table>";
				echo "<tr><td align=center><h3>Tópicos Mais visitados</h3></td></tr>";
				while ($resultado = mysql_fetch_assoc($result)) 
				{
					$titulo = $resultado['TITULO'];
					$categoria = $resultado['CATEG'];
					$link = 'texto_suporte.php?id=' . $resultado['ID'];
					echo '<tr><td align=center><h2><a href="'.$link.'" title="'.$categoria.'" class="lnk_menu">'.$titulo.'</a></h2></td></tr>';
				}
			echo "</table></td>";			
			 $sql_top_users = "SELECT CRIADOR, COUNT(*) FROM topicos_suporte WHERE APROVADO <> '0' GROUP BY CRIADOR ORDER BY COUNT(*) DESC LIMIT 5"; 			 
			 $result_users = mysql_query($sql_top_users, $conecta_banco) or print(mysql_error()); 
				echo "<td width=500 valign='top' align=center>";
				echo "<table>";
				echo "<tr><td align=center><h3>Usuários com mais tópicos criados</h3></td></tr>";
				while ($resultado = mysql_fetch_assoc($result_users)) 
				{
					$user = $resultado['CRIADOR'];
					$total = $resultado['COUNT(*)'];
					$link = 'buscar_topicos_usuario.php?usuario=' . $user;
					echo '<tr><td align=center><h2><a href="'.$link.'" title="'.$user.'" class="lnk_menu">'.$user.' = '.$total.' </a></h2></td></tr>';
				}
			echo "</table></td>";	
			?>			
		</td>
		</tr>
		<tr><td colspan=2><?php include("baixo.php"); mysql_close($conecta_banco); ?></td></tr>
	</table>
</body>
</html>

