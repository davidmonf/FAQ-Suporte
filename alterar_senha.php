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
}

function valida_senha(c)
{
	if ((c.novasenha.value=='') || (c.novasenha.value==' ') || (c.novasenha.value.length < 3) || (c.novasenha_repeat.value=='') || (c.novasenha_repeat.value==' ') || (c.novasenha_repeat.value.length < 3))
	{
		alert('Preencha a senha!');
		c.novasenha.focus();
		return false;
	}
	
	if (c.novasenha.value != c.novasenha_repeat.value)
	{
		alert('As senhas digitadas nao coincidem!');
		c.novasenha.value = '';
		c.novasenha_repeat.value = '';
		c.novasenha.focus();
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
		if (isset($_POST['novasenha']))
		{
			include("conexao.php");
			$novasenha = md5($_POST['novasenha']);
			$md5alterar = $_POST['md5alterar'];
			//echo "<script>alert('".$md5alterar."');</script>";
			$sql = "UPDATE usuarios SET senha='$novasenha',ALTERAR='0',MD5ALTERAR=NULL WHERE MD5ALTERAR='$md5alterar'";
			$result = mysql_query($sql, $conecta_banco) or print(mysql_error());
			echo "<script>alert('Senha alterada com sucesso!');</script>";
			echo ("<script>window.location = 'login.php'</script>");
		}
		else
		{
			if (isset($_GET['md5']))
			{
			include ("form_alterar.php");
			}
			else
			{
			include ("form_esqueci.php");
			}
		}
?>	
 </td>
 </tr>
 </table>
</body>
</html>