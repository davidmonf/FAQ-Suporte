<script>
function limpa_campo(a){
	a.value="";
}
function valida(b)
{
	if ((b.consulta.value=='') || (b.consulta.value==' ') || (b.consulta.value=='Buscar base de conhecimento'))
	{
		alert('Preencha a busca!');
		b.consulta.focus();
		return false;
	}	
}
</script>
<table>
<form onSubmit="return(valida(this))" method="GET" action="buscar_suporte.php">
<tr>
<td width="820"><input type="text" value="Buscar base de conhecimento" onFocus="limpa_campo(this)" size="130" name="consulta" style="background-image:url('imagens/busca-campo.jpg'); background-repeat: no-repeat; padding-left: 30px"></td>
<td><input type="submit" value="Buscar"></td>
</tr>
</form>
</table>