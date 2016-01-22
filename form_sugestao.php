<table>
<form method="GET" action="envia_email.php" onSubmit="return(valida_email(this))">
<tr><td>Seu E-mail:</td><td><input type="text" name="email" style="width:200px" value='' /><select name="dominio"><option value="@cieesp.org.br">@cieesp.org.br</option><option value="@cieerj.org.br">@cieerj.org.br</option></select></td></tr>
<?php
if (isset($_GET['id'])){
echo '<tr><td>Erro:</td><td><textarea name="sugestao" style="height: 150px; width: 800px"  rows="4" cols="50"></textarea></td></tr>';
echo '<tr><td></td><td><input type="text" name="id" style="visibility: hidden" value='.$_GET['id'].'  /></tr></td>';
}
else
{
echo '<tr><td>Sugestão:</td><td><textarea name="sugestao" style="height: 150px; width: 500px"  rows="4" cols="50"></textarea></td></tr>';
}
?>
<tr><td colspan="2" align="right"><input type="submit" value="Enviar Dados" /></td></tr>
</form>
</table>