<table border=0>
<tr>
<td align="center"><div><a href="main.php"><img src="imagens/logo_ciee.gif" alt="CIEE" width="175" border="0" style="float: middle; vertical-align: top;"></a></div></td>
</tr>
<?php
include("seguranca.php");
if (isset($_SESSION['usuarioID']) && ($_SESSION['usuarioTipo'] != 'ESTAG')){
	echo ('<div style="position: relative; top: -20px; right: 10px; height: 0px;"><h6 align="right" style="vertical-align: 1cm;">Bem Vindo '.$_SESSION['usuarioNome'].'!!! <a href="relatorio_select.php">Relatorios</a>&nbsp&nbsp<a href="cadastro.php">Cadastrar novo item na Central de Ajuda</a>&nbsp&nbsp<a href="cadastro_suporte.php">Cadastrar novo item na Base de Conhecimento</a>&nbsp&nbsp<a href="sair.php">Sair</a></h6></div>');
}
elseif (isset($_SESSION['usuarioID']) && ($_SESSION['usuarioTipo'] == 'ESTAG'))
{
	echo ('<div style="position: relative; top: -20px; right: 10px; height: 0px;"><h6 align="right" style="vertical-align: 1cm;">Bem Vindo '.$_SESSION['usuarioNome'].'!!! <a href="relatorio_select.php">Relatorios</a>&nbsp&nbsp<a href="cadastro.php">Cadastrar novo item na Central de Ajuda</a>&nbsp&nbsp<a href="sair.php">Sair</a></h6></div>');
}
else
{
echo ('<div style="position: relative; top: 55px; right: 10px; height: 0px;"><h6 align="right"><a href="login.php">Acesso restrito</a></h6></div>');
}
?>
</tr>
<tr>
<td>
<table cellspacing="0" cellpadding="0" bordercolor="#000000" border="0" align="center" width="630">
<tr>
<td width="25" valign="top" bgcolor="#00008b" align="left" style="height: 10px">
			<img id="Image2" border="0" src="imagens/repBorderLeft1.gif"></img>
</td>
<td bgcolor="#00008b"><h1 align="center" style="color:White;">
<?php 
if (isset($_SESSION['usuarioID']))
{ 
echo('<a href="main.php" class="lnk_topo">Central de Ajuda</a> - <a href="main_suporte.php" class="lnk_topo_suporte">Base de Conhecimento</a></h1></td>');
}
else
{
echo ('<a href="main.php" class="lnk_topo">Central de Ajuda - Suporte CIEE</a></h1></td>');
}
?>
<td width="25" valign="top" bgcolor="#00008b" align="right" style="height: 18px">
			<img id="Image1" border="0" src="imagens/repBorderRight1.gif"></img>
</td>
</tr>
<?php
if (isset($_SESSION['usuarioID']) && $_SESSION['usuarioTipo']  == 'MASTER')
{
	include ("conexao.php");
	$sql_pendentes = "SELECT TITULO FROM topicos_suporte WHERE APROVADO = '0' ";
	$resultado_pendentes = mysql_query($sql_pendentes, $conecta_banco) or print(mysql_error());
	$sql_pendentes_central = "SELECT TITULO FROM topicos WHERE APROVADO = '0' ";
	$resultado_pendentes_central = mysql_query($sql_pendentes_central, $conecta_banco) or print(mysql_error());
	if ((mysql_num_rows($resultado_pendentes) > 0) || (mysql_num_rows($resultado_pendentes_central) > 0))
	{
	echo ("<tr bgcolor='#ffff00'><td colspan='3' align='center'>");
	echo ("Existem artigos pendentes para aprova&ccedil;&atilde;o. Clique <a href='pendentes.php'>aqui</a> para verificar.");
	echo ("</tr></td>");
	}
}
?>
</table>
</tr>
</table>