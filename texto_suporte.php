<html>
<head>
<title>CIEE :: Central de Ajuda</title>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> 
  <script type="text/javascript" src="js/prototype.js"></script>
  <script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
  <script type="text/javascript" src="js/lightbox.js"></script>
  <link rel="stylesheet" type="text/css" href="lol.css?v=1.1" media="screen"/>
  <link rel="icon" type="image/png" href="null" />
  <meta http-equiv="Content-Type" content="text/xhtml; charset=latin1_bin" />
  <script src="css_browser_selector.js" type="text/javascript"></script>
</head>
<body>
	<table align="center"class="conteudo">
	<?php include("topo_completo_sup.php")?>
<tr><td class=espacos><a href = "javascript:history.back()">  Voltar  </a></tr></td>
<tr><td align="center" width=1024 class=espacos>
<div style="text-align: left;">
	<?php include ("conexao.php");
		protegePagina(); // Chama a função que protege a página
		$busca = $_GET['id'];
		$busca = mysql_real_escape_string($busca);
		$sql_texto = "SELECT * FROM topicos_suporte where ID=$busca";
		$result = mysql_query($sql_texto, $conecta_banco) or print(mysql_error());
		while ($resultado = mysql_fetch_assoc($result)) 
		{
			$id = $resultado['ID'];
			$titulo = $resultado['TITULO'];
			$problema = $resultado['PROBLEMA'];
			$categoria = $resultado['CATEG'];
			$causa = $resultado['CAUSA'];
			$solucao = $resultado['SOLUCAO'];
			$encerramento = $resultado['ENCERRAMENTO'];
			$chamado = $resultado['CHAMADO'];
			$criador = $resultado['CRIADOR'];
			$count = $resultado['COUNT'];
			$aprovador = $resultado['APROVADOR'];
			$aprovado = $resultado['APROVADO'];
			if ($categoria != "Processos")
			{
				echo ("<h2 align=center>$titulo</h2>");
				echo ("<h3>Problema:</h3>");
				echo ("<p>$problema</p>");
				echo ("<h3>Ambiente:</h3>");
				echo ("<p>$categoria</p>");
				echo ("<h3>Causa:</h3>");
				echo ("<p>$causa</p>");
				echo ("<h3>Solu&ccedil&atildeo:</h3>");
				echo ("<p>$solucao</p>");
				echo ("<h3>Texto para encerramento do chamado:</h3>");
				echo ("<p>$encerramento</p>");
				echo ("<h3>Chamado no Sistema RSU:</h3>");
				echo ("<p>$chamado</p>");
				echo ("<h3>Criador: $criador</h3>");
				echo ("<h5>Aprovador: $aprovador</h5>");
			}
			else
			{
				echo ("<h2>$titulo</h2>");
				echo ("<h3>Ambiente:</h3>");
				echo ("<p>$categoria</p>");
				echo ("<h3>Solu&ccedil&atildeo:</h3>");
				echo ("<p>$solucao</p>");
				echo ("<h3>Criador: $criador</h3>");
				echo ("<h5>Aprovador: $aprovador</h5>");
			}
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
						var motivo = prompt('Digite o motivo da reprovacao', '');
					} while (motivo == null || motivo == '');
					window.location='reprovado.php?id=".$id."&motivo=' + motivo;
				}
				}
				
			function aprovacao()
				{
				var decisao = confirm('Confirma a aprova\u00e7\u00e3o do artigo?');
				if (decisao) 
				{
					window.location='aprovado.php?id=".$id."';
				}
				}
				</script>");
			echo ("<a href='javascript:aprovacao();'><h1>Aprovar</a>&nbsp|&nbsp<a href='javascript:reprovacao();'>Reprovar</h1></a>");
			}
		}
			if ($_SESSION['usuarioID'] != 'MASTER')
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
				$sql_contador = "SELECT * FROM registros_suporte WHERE DATA='$hoje' AND IP='$endereco' AND ID_ARTIGO='$id'";
				$resultado_contador = mysql_query($sql_contador, $conecta_banco) or print(mysql_error());
				if (mysql_num_rows($resultado_contador) <= 0)
				{
					$count = $count+1;
					$sql_text = "UPDATE topicos_suporte SET COUNT='$count' WHERE topicos_suporte.ID=$busca";
					$result = mysql_query($sql_text, $conecta_banco) or print(mysql_error());
					$sql_contamais1 = "INSERT INTO registros_suporte (ID_REG , IP , DATA ,ID_ARTIGO, NOME_ARTIGO) VALUES ('NULL', '$endereco', '$hoje', '$id', '$titulo')";
					$resultado_contamais1 = mysql_query($sql_contamais1, $conecta_banco) or print(mysql_error());
				}
			}
		mysql_close($conecta_banco); 
	?>
</div>
 </td>
 </tr>
 <?php
 if ($_SESSION['usuarioTipo'] == 'MASTER')
 {
	echo ('<tr><td class=espacos><a href="cadastro_suporte.php?id='.$_GET['id'].'">Alterar essa p&aacute;gina</a></td></tr>');
}
?>
 <tr><td><?php include("baixo.php") ?></td></tr>
 </table>
</body>
</html>


