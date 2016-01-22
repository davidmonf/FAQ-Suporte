<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin1_bin" />
<link rel="stylesheet" type="text/css" href="lol.css?v=1.1" />
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
<script src="css_browser_selector.js" type="text/javascript"></script>
</head>
<body>
<table align="center"class="conteudo" style="background-image: url(/imagens/miolo_suporte.jpg); background-repeat: repeat-y; width: 1024px; border-collapse: collapse;">
<?php include("topo_completo.php")?>
<tr><td class=espacos><a href = "javascript:history.back()">  Voltar  </a></tr></td>
<tr><td align="left" width=1024 class=espacos>
<?php
if (isset($_REQUEST['id']))
{
	echo '<span style="color: #ff0000;">Lembrando que este formul&aacuterio <b>n&atildeo</b> &eacute para abertura de chamado, e sim para reportar algum erro na p&aacutegina do artigo.';
}
else
{
	echo '<span style="color: #ff0000;">Lembrando que este formul&aacuterio <b>n&atildeo</b> &eacute para abertura de chamado, e sim para sugerir um novo artigo.';
}
?>
<br/>Para abrir um chamado, <a href="http://sistemaru.cieesp.org.br/servicedesk/Login_rsu.asp" target="_blank">clicar aqui</a>.
<br/>Pedidos de chamado ou suporte nesta p&aacutegina ser&atildeo <b>desconsiderados</b>.</span><br/><br/>
<?php
		include ("form_sugestao.php");
?>
<br/>
 </td>
 </tr>
 <tr><td><?php include("baixo.php") ?></td></tr>
 </table>
</body>
</html>