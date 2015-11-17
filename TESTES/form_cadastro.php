<table>
<form method="GET" action="cadastro.php">
<tr><td>ID:</td><td><input type="text" name="id" readonly="readonly" value='<?php echo ($_GET['id']) ?>' />
<tr><td>T&iacute;tulo:</td><td><input type="text" name="titulo" style="width:420px" value='<?php echo($titulo) ?>' /></td></tr>
<tr><td>Texto:</td><td><textarea name="texto" style="height: 500px; width: 500px" rows="4" cols="50"><?php echo($texto) ?></textarea></td></tr>
<tr><td>Categoria:</td><td><input type="text" name="categoria" width="100" value='<?php echo($categoria) ?>' /></td></tr>
<tr><td>Tags:</td><td><textarea name="tag" style="width: 500px" rows="1" cols="50"><?php echo($tag) ?></textarea></td></tr>
<tr><td colspan="2" align="right"><input type="submit" value="Enviar Dados" /></td></tr>
</form>
</table>