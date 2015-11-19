<?php
include("seguranca.php");
if (isset($_SESSION['usuarioID']) && ($_SESSION['usuarioTipo'] != 'ESTAG')){
	echo ('<div class=linkrestrito_logado><h6  align="right" style="vertical-align: 1cm;">Bem Vindo '.$_SESSION['usuarioNome'].'!!! <a href="relatorio_select.php">Relatorios</a>&nbsp&nbsp<a href="cadastro.php">Cadastrar novo item na Central de Ajuda</a>&nbsp&nbsp<a href="cadastro_suporte.php">Cadastrar novo item na Base de Conhecimento</a>&nbsp&nbsp<a href="sair.php">Sair</a></h6></div>');
}
elseif (isset($_SESSION['usuarioID']) && ($_SESSION['usuarioTipo'] == 'ESTAG'))
{
	echo ('<div class=linkrestrito_logado"><h6  align="right" style="vertical-align: 1cm;">Bem Vindo '.$_SESSION['usuarioNome'].'!!! <a href="relatorio_select.php">Relatorios</a>&nbsp&nbsp<a href="cadastro.php">Cadastrar novo item na Central de Ajuda</a>&nbsp&nbsp<a href="sair.php">Sair</a></h6></div>');
}
else
{
echo ('<div class=linkrestrito><h6 align="right"><a href="login.php">Acesso restrito</a></h6></div>');
}
if (isset($_SESSION['usuarioID']))
{ 
echo('<div class=linktopo_logado><a href="main.php" class="lnk_topo">Central de Ajuda</a> - <a href="main_suporte.php" class="lnk_topo_suporte">Base de Conhecimento</a></h1></div></td>');
}
else
{
echo ('<div class=linktopo><a href="main.php" class="lnk_topo">Central de Ajuda - Suporte CIEE</a></h1></div></td>');
}
if (isset($_SESSION['usuarioID']) && $_SESSION['usuarioTipo']  == 'MASTER')
{
	include ("conexao.php");
	$sql_pendentes = "SELECT TITULO FROM topicos_suporte WHERE APROVADO = '0' ";
	$resultado_pendentes = mysql_query($sql_pendentes, $conecta_banco) or print(mysql_error());
	$sql_pendentes_central = "SELECT TITULO FROM topicos WHERE APROVADO = '0' ";
	$resultado_pendentes_central = mysql_query($sql_pendentes_central, $conecta_banco) or print(mysql_error());
	if ((mysql_num_rows($resultado_pendentes) > 0) || (mysql_num_rows($resultado_pendentes_central) > 0))
	{
	//echo ("<tr bgcolor='#ffff00'><td colspan='3' align='center'>");
	echo ('<div class=pendentes>Existem artigos pendentes para aprova&ccedil;&atilde;o. Clique <a href="pendentes.php">aqui</a> para verificar.</div>');
	//echo ("</tr></td>");
	}
}
?>