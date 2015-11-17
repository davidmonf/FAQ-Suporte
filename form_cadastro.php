<table>
<form method="POST" action="cadastro.php">
<tr><td>ID:</td><td><input type="text" name="id" readonly="readonly" style="background-color: #E6E6E6; color:#848484 " value='<?php echo ($_GET['id']) ?>' />
<tr><td>T&iacute;tulo:</td><td><input type="text" name="titulo" style="width:420px" value='<?php echo($titulo) ?>' /></td></tr>
<tr><td>Texto:</td><td><textarea name="texto" style="height: 500px; width: 500px" rows="4" cols="50"><?php echo($texto) ?></textarea></td></tr>
<tr><td>Categoria:</td><td><select name="categ">
<?php 
include("conexao.php");
$sql = "SELECT CATEG FROM categorias ORDER BY CATEG ASC";
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
</select></td></tr>
<tr><td>Tags (separadas por espa&ccedilo):</td><td><input name="tag" style="width: 500px" rows="1" cols="50" value='<?php echo($tag) ?>'/></td></tr>
<tr><td>Criador:</td><td><input type="text" name="criador_readonly" readonly="readonly" style="width: 500px; background-color: #E6E6E6; color:#848484 " value='<?php if (isset($criador)) {echo ($criador);} ?>' autocomplete="off" /></td></tr>
<input type="hidden" name="aprovado" value='<?php echo($aprovado) ?>''' />
<tr><td colspan="2" align="right"><input type="submit" value="Enviar Dados" /></td></tr>
</form>
</table>