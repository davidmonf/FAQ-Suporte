<html>
<head profile="http://www.w3.org/2005/10/profile">
  <title>CIEE :: Central de Ajuda</title>
  <!–[if lte IE 10]>
 <link rel=”stylesheet” type=”text/css” href=”ie10.css” />
 <![endif]–>
  <link rel="stylesheet" type="text/css" href="lol.css" />
  <link rel="icon" type="image/png" href="favicon.png" />
  <meta http-equiv="Content-Type" content="text/xhtml; charset=latin1_bin" />
</head>
<body>
	<table width="600" align="center">
		<tr><td colspan=2><?php include("topo.php")?></td></tr>
		<tr><td colspan=2><?php include("busca.php")?></td></tr>
		<tr><td colspan=2><?php include("categorias.php")?></td></tr>
		<tr>
	     <?php 
			 $sql_top10 = "SELECT * FROM $tbl_name ORDER BY COUNT DESC LIMIT 10"; 			 
			 $result = mysql_query($sql_top10, $conecta_banco) or print(mysql_error());  
				echo "<td>";
				echo "<table>";
				echo "<tr><td><h3>Tópicos Mais visitados</h3></td></tr>";
				while ($resultado = mysql_fetch_assoc($result)) 
				{
					$titulo = $resultado['TITULO'];
					$link = 'texto.php?id=' . $resultado['ID'];
					echo '<tr><td><h2><a href="'.$link.'" title="'.$titulo.'" class="lnk_menu">'.$titulo.'</a></h2></td></tr>';
				}
			echo "</table></td>";
			mysql_close($conecta_banco);
		?>
		<td width=250 style="text-align: justify;">
			<b>Como utilizar a Central de Ajuda?</b>
			<p>Procure a ajuda que necessita na barra de categorias, na caixa de busca acima ou ainda verifique se a ajuda que precisa está ao lado nos tópicos mais visitados.</p>
			<p>É importante verificar se o seu problema já está disponível aqui, pois assim ele será solucionado mais rapidamente.</p>
			<b>Não encontrei o que preciso!</b>
			<p>Caso não tenha encontrado o que precisa na Central de Ajuda, favor abrir um chamado no <a href="http://sistemaru.cieesp.org.br/servicedesk/Login.asp" target="_blank" class="lnk">Sistema RSU</a>, clicando no link do rodapé da página.</p>
			<p>Você pode também <a href='http://suporte.cieesp.org.br/sugestao.php' target="_blank" class="lnk">sugerir um tópico</a> para podermos criar o conteúdo e ajudar ainda mais os colaboradores do CIEE!</p><br>
		</td>
		</tr>
		<tr><td colspan=2><?php include("baixo.php") ?></td></tr>
	</table>
</body>
</html>

