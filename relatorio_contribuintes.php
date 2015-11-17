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
	include ("form_contribuintes.php");
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
			$sql_data = "SELECT CRIADOR,COUNT(*) FROM topicos WHERE APROVADO <> '0' AND DATA BETWEEN '$data_inicial_n' AND '$data_final_n' GROUP BY CRIADOR ORDER BY COUNT(*) DESC";
		}
		else
		{
			$sql_data = "SELECT CRIADOR,COUNT(*) FROM topicos WHERE APROVADO <> '0' AND DATA = '$data_inicial_n' GROUP BY CRIADOR ORDER BY COUNT(*) DESC";
		}	
		$result = mysql_query($sql_data, $conecta_banco) or print(mysql_error());
		echo "<table align='center' border='1'>";
		if (isset($data_final))
		{
			echo "<tr><td colspan=3 align=center><h3>Artigos criados do dia $data_inicial at&eacute o dia $data_final</h3></td></tr>";
		}
		else
		{
			echo "<tr><td colspan=3 align=center><h3>Artigos criados no dia $data_inicial</h3></td></tr>";
		}
			echo "<tr><td>Nome do criador</td><td>Artigos criados</td></tr>";
		$total = 0;
		while ($resultado = mysql_fetch_assoc($result)) 
		{
			$titulo = $resultado['CRIADOR'];	
			$count = $resultado['COUNT(*)'];
			echo '<tr><td>'.$titulo.'</td><td>'.$count.'</td></tr>';
			$total = $total + $count;
		}
		echo '<tr><td align="right" colspan=1><b>Total</b></td><td><b>'.$total.'</b></td></tr>';
		echo "</table></td>";
		mysql_close($conecta_banco); 
	}
	else
	{
			 $sql_top_users = "SELECT CRIADOR, COUNT(*) FROM topicos WHERE APROVADO <> '0' AND CRIADOR <> '' GROUP BY CRIADOR ORDER BY COUNT(*) DESC"; 			 
			 $result_users = mysql_query($sql_top_users, $conecta_banco) or print(mysql_error()); 
				echo "<tr><td width=600";
				echo "<table align=center border=0>";
				echo "<tr><td align=center><b>Usu&aacuterios com mais t&oacutepicos criados de todos os tempos (contando a partir do dia 17/08/2015)</b></td></tr>";
				while ($resultado = mysql_fetch_assoc($result_users)) 
				{
					$user = $resultado['CRIADOR'];
					$total = $resultado['COUNT(*)'];
					//$link = 'buscar_topicos_usuario.php?usuario=' . $user;
					echo '<tr><td align=center>'.$user.' = '.$total.'</td></tr>';
				}
			echo "</table></td></tr>";	
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


