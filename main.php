<html>
<head profile="http://www.w3.org/2005/10/profile">
  <title>CIEE :: Central de Ajuda</title>
  <link rel="stylesheet" type="text/css" href="lol.css?v=1.1" />  
  <link rel="icon" type="image/png" href="favicon.png" />
  <meta http-equiv="Content-Type" content="text/xhtml; charset=latin1_bin" />
  <script src="css_browser_selector.js" type="text/javascript"></script>
</head>
<body>
	<table align="center"class="conteudo">
	<?php include("topo_completo.php")?>
		<tr>
	     <?php 
			 $sql_top10 = "SELECT * FROM $tbl_name WHERE APROVADO <> '0' ORDER BY COUNT DESC LIMIT 10"; 			 
			 $result = mysql_query($sql_top10, $conecta_banco) or print(mysql_error());  
				echo "<td width=500 style='padding-left:60px;'>";
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
		<td width=500 align=right" style='padding-right:60px;'s>
			<b>Como utilizar a Central de Ajuda?</b>
			<p>Procure a ajuda que necessita na barra de categorias, na caixa de busca acima ou ainda verifique se a ajuda que precisa está ao lado nos tópicos mais visitados.</p>
			<p>É importante verificar se o seu problema já está disponível aqui, pois assim ele será solucionado mais rapidamente.</p>
			<b>Não encontrei o que preciso!</b>
			<p>Caso não tenha encontrado o que precisa na Central de Ajuda, favor abrir um chamado no <a href="http://sistemaru.cieesp.org.br/servicedesk/Login_rsu.asp" target="_blank" class="lnk">Sistema RSU</a>, clicando no link do rodapé da página.</p>
			<p>Você pode também <a href='sugestao.php' class="lnk">sugerir um tópico</a> para podermos criar o conteúdo e ajudar ainda mais os colaboradores do CIEE!</p><br>
		</td>
		</tr>
		<?php include("baixo.php")?>
	</table>
</body>
</html>

