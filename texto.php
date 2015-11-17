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
<body>
<table width="600" align="center" border=0 class="conteudo">
<tr><td><?php include("topo.php")?></td></tr>
<tr><td><?php include("busca.php")?></td></tr>
<tr><td><?php include("categorias.php")?></td></tr>
<tr><td><a href = "javascript:history.back()">  Voltar  </a></tr></td>
<tr><td align="center" width=630>
<div style="text-align: left;">
	<?php include ("conexao.php");
		$busca = $_GET['id'];
		$busca = mysql_real_escape_string($busca);
		$sql_texto = "SELECT * FROM $tbl_name where ID=$busca";
		$result = mysql_query($sql_texto, $conecta_banco) or print(mysql_error());
		while ($resultado = mysql_fetch_assoc($result)) 
		{
			$titulo = $resultado['TITULO'];
			$texto = $resultado['TEXTO'];
			$id = $resultado['ID'];
			$count = $resultado['COUNT'];
			$aprovado = $resultado['APROVADO'];
			$aprovador = $resultado['APROVADOR'];
			$criador = $resultado['CRIADOR'];
			echo ("<h2>$titulo</h2>");
			echo ("<p>$texto</p>");
		}
			if (!isset($_SESSION['usuarioID']))
			{
				if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
				{
					$endereco=$_SERVER['HTTP_X_FORWARDED_FOR'];
				}
				else
				{
					$endereco=$_SERVER['REMOTE_ADDR'];
				}
				$hoje = date("Y\-m\-d");
				$sql_contador = "SELECT * FROM registros WHERE DATA='$hoje' AND IP='$endereco' AND ID_ARTIGO='$id'";
				$resultado_contador = mysql_query($sql_contador, $conecta_banco) or print(mysql_error());
				if (mysql_num_rows($resultado_contador) <= 0)
				{
					$count = $count+1;
					$sql_text = "UPDATE $db_name.topicos SET COUNT='$count' WHERE topicos.ID=$busca";
					$result = mysql_query($sql_text, $conecta_banco) or print(mysql_error());
					$sql_contamais1 = "INSERT INTO registros (ID_REG , IP , DATA ,ID_ARTIGO, NOME_ARTIGO) VALUES ('NULL', '$endereco', '$hoje', '$id', '$titulo')";
					$resultado_contamais1 = mysql_query($sql_contamais1, $conecta_banco) or print(mysql_error());
				}
			}
		mysql_close($conecta_banco); 
	?>
 <?php
			if ($aprovado == '0' && $_SESSION['usuarioTipo']  == 'MASTER' )
			{
			$aprovador = $_SESSION['usuarioNome'];
			echo ("<script> 
			function reprovacao()
				{
				var decisao = confirm('Confirma a reprova\u00e7\u00e3o do artigo? Ser\u00e1 necessario digitar um motivo.');
				if (decisao) 
				{
					do {
						var motivo = prompt('Digite o motivo da reprova\u00e7\u00e3o', '');
					} while (motivo == null || motivo == '');
					window.location='reprovado_central.php?id=".$id."&motivo=' + motivo;
				}
				}
				
			function aprovacao()
				{
				var decisao = confirm('Confirma a aprova\u00e7\u00e3o do artigo?');
				if (decisao) 
				{
					window.location='aprovado_central.php?id=".$id."';
				}
				}
				</script>");
			echo ("<a href='javascript:aprovacao();'><h1>Aprovar</a>&nbsp|&nbsp<a href='javascript:reprovacao();'>Reprovar</h1></a>");
			}
		echo "</div></td></tr>";
if (isset($_SESSION['usuarioID'])){
	echo ('<tr><td><a href="cadastro.php?id='.$_GET['id'].'">Alterar essa p&aacute;gina</a></td></tr>');
}
	echo ('<tr><td><a href="sugestao.php?id='.$_GET['id'].'">Reportar erro na p&aacutegina</a></td></tr>');
?>
 <tr><td><?php include("baixo.php") ?></td></tr>
 </table>
</body>
</html>


