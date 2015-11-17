<script>
function limpa_campo(a){
	a.value="";
}
function valida(b)
{
	if ((b.consulta.value=='') || (b.consulta.value==' ') || (b.consulta.value=='Entre aqui com sua busca ou clique em uma das categorias abaixo'))
	{
		alert('Preencha a busca!');
		b.consulta.focus();
		return false;
	}	
}
</script>
<table border="0" width=1024>
<form onSubmit="return(valida(this))" method="GET" action="buscar.php">
<tr>
<td width="935"><input type="text" value="Entre aqui com sua busca ou clique em uma das categorias abaixo" onFocus="limpa_campo(this)" size="150" name="consulta" style="background-image:url('imagens/busca-campo.jpg'); background-repeat: no-repeat; padding-left: 30px"></td>
<td><input type="submit" value="Buscar"></td>
</tr>
</form>
</table>