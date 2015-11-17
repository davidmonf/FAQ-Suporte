<script>
function limpa_campo(a){
	a.value="";
}
</script>
<table>
<form method="GET" action="buscar.php">
<tr>
<td width="500"><input type="text" value="Entre aqui com sua busca" onClick="limpa_campo(this)" size="90" name="consulta"></td>
<td><input type="submit" value="Buscar"></td>
</tr>
</form>
</table>