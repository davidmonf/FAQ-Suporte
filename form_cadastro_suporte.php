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
<table>
<form method="POST" action="cadastro_suporte.php">
<tr><td>ID:</td><td><input type="text" name="id" readonly="readonly" style="width: 30px; background-color: #E6E6E6; color:#848484 " value='<?php echo ($_GET['id']) ?>' />
<tr><td>T&iacute;tulo:</td><td><input type="text" name="titulo" style="width:420px" value='<?php echo($titulo) ?>' autocomplete="off" /></td></tr>
<tr><td>Categoria:</td><td><select name="categ" id ="categ"onchange="Mudarestado()">
<?php 
include("conexao.php");
$sql = "SELECT CATEG FROM categorias_suporte ORDER BY CATEG ASC";
$result = mysql_query($sql, $conecta_banco) or print(mysql_error());
while ($resultado = mysql_fetch_assoc($result)) 
{
	$categ = $resultado['CATEG'];
	if ($categ == $categoria)
	{
		echo("<option value=\"".$categ."\" selected>".$categ."</option>");
	}
	else
	{
		echo("<option value=\"".$categ."\">".$categ."</option>");
	}
}
?>
<tr id="adicional"><td>Problema:</td><td><textarea name="problema" style="width: 500px"  rows="4" cols="50"><?php echo($problema) ?></textarea></td></tr>
</select></td></tr>
<tr id="adicional2"><td>Causa:</td><td><textarea name="causa" style="width: 500px"  rows="4" cols="50"><?php echo($causa) ?></textarea></td></tr>
<tr><td>Solu&ccedil&atildeo:</td><td><textarea name="solucao" style="width: 500px"  rows="4" cols="50"><?php echo($solucao) ?></textarea></td></tr>
<tr id="adicional3"><td>Texto para encerramento do chamado:</td><td><textarea name="encerramento" style="width: 500px"  rows="4" cols="50"><?php echo($encerramento) ?></textarea></td></tr>
<tr id="adicional4"><td>Chamado no RSU:</td><td><input type="text" name="chamado" style="width:300px" value='<?php echo($chamado) ?>''' autocomplete="off" /></td></tr>
<tr><td>Tags:</td><td><input name="tag" style="width: 500px" rows="1" cols="50" value='<?php echo($tag) ?>' autocomplete="off" /></td></tr>
<tr><td>Criador:</td><td><input type="text" name="criador_readonly" readonly="readonly" style="width: 500px; background-color: #E6E6E6; color:#848484 " value='<?php echo ($criador) ?>' autocomplete="off" /></td></tr>
<input type="hidden" name="aprovado" value='<?php echo($aprovado) ?>''' />
<tr><td colspan="2" align="right"><input type="submit" value="Enviar Dados" /></td></tr>
</form>
</table>