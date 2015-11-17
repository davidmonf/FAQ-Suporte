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
<table align=center>
<?php protegePagina(); // Chama a função que protege a página ?>
<tr><td align=center><h3>Selecione o relat&oacuterio desejado</h3></td></tr>
<tr><td align=center><a href="relatorio_artigos.php">Relat&oacuterio de acesso dos artigos da <b>Central de Ajuda</b></a></td></tr>
<tr><td align=center><a href="relatorio_contribuintes.php">Relat&oacuterio de contribuintes da <b>Central de Ajuda</b> por data</a></td></tr>
<tr><td align=center><a href="relatorio_artigos_base.php">Relat&oacuterio de acesso dos artigos da <b>Base de Conhecimento</b></a></td></tr>
<tr><td align=center><a href="relatorio_contribuintes_base.php">Relat&oacuterio de contribuintes da <b>Base de Conhecimento</b> por data</a></td></tr>
</table>
 </td>
 </tr>
 <tr><td><?php include("baixo.php") ?></td></tr>
 </table>
</body>
</html>


