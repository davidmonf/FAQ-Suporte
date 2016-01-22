<script>
function Mudarestado() {
    var valor = document.getElementById('categ').value;
    if(valor != "Processos")
	{
        document.getElementById('adicional').style.display = 'block';
		document.getElementById('adicional2').style.display = 'block';
		document.getElementById('adicional3').style.display = 'block';
		document.getElementById('adicional4').style.display = 'block';
	}
    else
	{
        document.getElementById('adicional').style.display = 'none';
		document.getElementById('adicional2').style.display = 'none';
		document.getElementById('adicional3').style.display = 'none';
		document.getElementById('adicional4').style.display = 'none';
	}
}
</script>
<table align=center border='0'>
<form method="POST" action="cadastro_suporte.php" enctype="multipart/form-data">
<tr><td><b>T&iacute;tulo:</b><br/><!-- "</td><td> --><input type="text" name="titulo" style="width:420px" value='' autocomplete="off" /></td></tr>
<tr><td><b>Categoria:</b><br/><!-- "</td><td> --><select name="categ" id ="categ"onchange="Mudarestado()">
<?php 
include("conexao.php");
$sql = "SELECT CATEG FROM categorias_suporte ORDER BY CATEG ASC";
$result = mysql_query($sql, $conecta_banco) or print(mysql_error());
while ($resultado = mysql_fetch_assoc($result)) 
{
	$categ = $resultado['CATEG'];
	echo("<option value=\"".$categ."\">".$categ."</option>");
}
?>
</select></td></tr>
<tr id="adicional"><td><b>Problema:</b><!-- "</td><td> --><textarea name="problema" id="problema" style="width: 500px"  rows="4" cols="50"></textarea></td></tr>
<tr id="adicional2"><td><b>Causa:</b><!-- "</td><td> --><textarea name="causa"  rows="4" cols="50" wrap="hard"></textarea></td></tr>
<tr><td><b>Solu&ccedil&atildeo:</b><!-- "</td><td> --><textarea name="solucao"  rows="4" cols="50" wrap="hard"></textarea></td></tr>
<tr id="adicional3"><td><b>Texto para encerramento do chamado:</b><!-- "</td><td> --><textarea name="encerramento" style="width: 500px"  rows="4" cols="50" wrap="hard"></textarea></td></tr>
<tr id="adicional4"><td><b>Chamado no RSU:</b><br/><!-- "</td><td> --><input type="text" name="chamado" style="width:300px" value='' autocomplete="off" /></td></tr>
<tr><td><b>Tags:</b><br/><!-- "</td><td> --><input name="tag" style="width: 500px" autocomplete="off" /></td></tr>
<tr><td><b>Criador:</b><br/><!-- "</td><td> --><input type="text" name="criador" readonly="readonly" style="width: 500px; background-color: #E6E6E6; color:#848484 " value='<?php echo ($_SESSION["usuarioNome"]) ?>' /></td></tr>
<tr><td colspan="2" align="right"><input type="submit" value="Enviar Dados" /></td></tr>
</form>
</table>