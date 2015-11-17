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
<table width="600" align="center" border=0 class="conteudo">
<tr><td><?php include("topo.php")?></td></tr>
<tr><td><?php include("busca.php")?></td></tr>
<tr><td><?php include("categorias.php")?></td></tr>
<tr><td><a href = "javascript:history.back()">  Voltar  </a></tr></td>
<tr><td align="center" width=630>
<div style="text-align: left;">
<?php 
	protegePaginaMaster(); // Chama a função que protege a página
		$sql_pendentes = "SELECT ID,TITULO,CRIADOR FROM topicos_suporte WHERE APROVADO = '0' ORDER BY ID ASC";	
		$result = mysql_query($sql_pendentes, $conecta_banco) or print(mysql_error());
		$sql_pendentes_central = "SELECT ID,TITULO,CRIADOR FROM topicos WHERE APROVADO = '0' ORDER BY ID ASC";	
		$result_central = mysql_query($sql_pendentes_central, $conecta_banco) or print(mysql_error());		
		if (mysql_num_rows($result) > 0)
		{
		echo "<table align='center' border='1'>";
		echo "<tr><td colspan=3 align=center><b>Artigos para aprova&ccedil;&atilde;o da Base de Conhecimento</b></td></tr>";
		echo "<tr><td>ID</td><td>Nome do artigo</td><td>Criador</td></tr>";
		while ($resultado = mysql_fetch_assoc($result)) 
		{
			$id = $resultado['ID'];
			$titulo = $resultado['TITULO'];	
			$criador = $resultado['CRIADOR'];
			echo '<tr><td>'.$id.'</td><td><a href=texto_suporte.php?id='.$id.'>'.$titulo.'</a></td><td>'.$criador.'</td></tr>';
		}
		echo "</table></td>";
		}
		if (mysql_num_rows($result_central) > 0)
		{
		echo "<table align='center' border='1'>";
		echo "<tr><td colspan=3 align=center><b>Artigos para aprova&ccedil;&atilde;o da Central de Ajuda</b></td></tr>";
		echo "<tr><td>ID</td><td>Nome do artigo</td><td>Criador</td></tr>";
		while ($resultado_central = mysql_fetch_assoc($result_central)) 
		{
			$id = $resultado_central['ID'];
			$titulo = $resultado_central['TITULO'];	
			$criador = $resultado_central['CRIADOR'];
			echo '<tr><td>'.$id.'</td><td><a href=texto.php?id='.$id.'>'.$titulo.'</a></td><td>'.$criador.'</td></tr>';
		}
		echo "</table></td>";
		}
		else
		{
		
		}
		mysql_close($conecta_banco); 
	
	?>
</div>
 </td>
 </tr>
 <tr><td><?php include("baixo.php") ?></td></tr>
 </table>
</body>
</html>


