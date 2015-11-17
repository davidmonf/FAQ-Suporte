<table>
<form method="POST" action="alterar_senha.php" onSubmit="return valida_senha(this)">
<tr><td>Nova senha:</td><td><input type="password" name="novasenha" style="width:150px" value='' /></td></tr>
<tr><td>Repetir nova senha:</td><td><input type="password" name="novasenha_repeat" style="width:150px" value='' /></td></tr>
<input type="hidden" name="md5alterar" value ="<?php echo($_GET['md5'])?>" />
<tr><td colspan="2" align="right"><input type="submit" value="Enviar" /></td></tr>
</form>
</table>