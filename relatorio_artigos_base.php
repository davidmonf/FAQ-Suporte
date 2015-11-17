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
<body onload="form1.data_inicial.focus()">
<table width="600" align="center" border=0 class="conteudo">
<tr><td><?php include("topo.php")?></td></tr>
<tr><td><?php include("busca.php")?></td></tr>
<tr><td><?php include("categorias.php")?></td></tr>
<tr><td><a href = "javascript:history.back()">  Voltar  </a></tr></td>
<tr><td align="center" width=630>
<div style="text-align: left;">
<?php 
	protegePagina(); // Chama a função que protege a página
	include ("form_relatorio_base.php");
	if (isset($_REQUEST['data_inicial']))
	{
		$data_inicial = ($_REQUEST['data_inicial']);
		function DataBR2DB($datapega)
		{
			$data = explode('/',$datapega);
			$datacerta = $data[2].'-'.$data[1].'-'.$data[0];
			return $datacerta;
		}
		$data_inicial_n = DataBR2DB($data_inicial);	
		include ("conexao.php");
		if (($_REQUEST['data_final'] != ''))
		{
			$data_final = ($_REQUEST['data_final']);
			$data_final_n = DataBR2DB($data_final);
			$sql_data = "SELECT ID_ARTIGO,NOME_ARTIGO,COUNT(*) FROM registros_suporte WHERE DATA BETWEEN '$data_inicial_n' AND '$data_final_n' GROUP BY NOME_ARTIGO ORDER BY COUNT(*) DESC";
		}
		else
		{
			$sql_data = "SELECT ID_ARTIGO,NOME_ARTIGO,COUNT(*) FROM registros_suporte WHERE DATA = '$data_inicial_n' GROUP BY NOME_ARTIGO ORDER BY COUNT(*) DESC";
		}	
		$result = mysql_query($sql_data, $conecta_banco) or print(mysql_error());
		echo "<table align='center' border='1'>";
		if (isset($data_final))
		{
			echo "<tr><td colspan=3 align=center><h3>Acessos do dia $data_inicial at&eacute o dia $data_final</h3></td></tr>";
		}
		else
		{
			echo "<tr><td colspan=3 align=center><h3>Acessos do dia $data_inicial</h3></td></tr>";
		}
			echo "<tr><td>ID</td><td>Nome do artigo</td><td>Acessos</td></tr>";
		$total = 0;
		while ($resultado = mysql_fetch_assoc($result)) 
		{
			$id = $resultado['ID_ARTIGO'];
			$titulo = $resultado['NOME_ARTIGO'];	
			$count = $resultado['COUNT(*)'];
			echo '<tr><td>'.$id.'</td><td>'.$titulo.'</td><td>'.$count.'</td></tr>';
			$total = $total + $count;
		}
		echo '<tr><td align="right" colspan=2><b>Total</b></td><td><b>'.$total.'</b></td></tr>';
		echo "</table></td>";
		mysql_close($conecta_banco); 
	}
	
	?>
</div>
 </td>
 </tr>
 <tr><td><?php include("baixo.php") ?></td></tr>
 </table>
</body>
</html>


