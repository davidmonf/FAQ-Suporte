<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin1_bin" />
<link rel="stylesheet" type="text/css" href="lol.css" />
<link rel="icon" type="image/png" href="null" />
<title>CIEE :: Central de Ajuda</title>
<script>
function valida_email(c)
{
	if ((c.email.value=='') || (c.email.value==' ') || (c.email.value.length < 3))
	{
		alert('Preencha o seu e-mail!');
		c.email.focus();
		return false;
	}
	if ((c.sugestao.value=='') || (c.sugestao.value==' ') || (c.sugestao.value.length < 5))
	{
		alert('Preencha a sugestao!');
		c.sugestao.focus();
		return false;
	}
}
</script>
</head>
<body>
<table width="600" align="center">
<tr><td><?php include("topo.php")?></td></tr>
<tr><td><?php include("busca.php")?></td></tr>
<tr><td><?php include("categorias.php")?></td></tr>
<tr><td><a href = "javascript:history.back()">  Voltar  </a></tr></td>
<tr><td width="800">
<?php
		include ("form_sugestao.php");
?>	
 </td>
 </tr>
 </table>
</body>
</html>