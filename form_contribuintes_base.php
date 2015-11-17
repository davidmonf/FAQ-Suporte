<script>
function MascaraData(data,e){
	if(mascaraInteiro(data)==false){
		event.returnValue = false;
	}	
	return formataCampo(data, '00/00/0000', event);

function submitenter(myfield,e)
{
var keycode;
if (window.event) keycode = window.event.keyCode;
else if (e) keycode = e.which;
else return true;

if (keycode == 13)
{
myfield.form.submit();
return false;
}
else
return true;
}
}

function formataCampo(campo, Mascara, evento) { 
	var boleanoMascara; 
	
	var Digitato = evento.keyCode;
	exp = /\-|\.|\/|\(|\)| /g
	campoSoNumeros = campo.value.toString().replace( exp, "" ); 
   
	var posicaoCampo = 0;	 
	var NovoValorCampo="";
	var TamanhoMascara = campoSoNumeros.length;; 
	
	if (Digitato != 8) { // backspace 
		for(i=0; i<= TamanhoMascara; i++) { 
			boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
								|| (Mascara.charAt(i) == "/")) 
			boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
								|| (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
			if (boleanoMascara) { 
				NovoValorCampo += Mascara.charAt(i); 
				  TamanhoMascara++;
			}else { 
				NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
				posicaoCampo++; 
			  }	   	 
		  }	 
		campo.value = NovoValorCampo;
		  return true; 
	}else { 
		return true; 
	}
}

//valida data
function ValidaData(data_inicial,data_final){
	exp = /\d{2}\/\d{2}\/\d{4}/
	if(!exp.test(data_inicial.value))
	{
		alert('Data Inicial Invalida!');
		data_inicial.value = '';
		data_inicial.focus();
		return false;
	}
	if (!exp.test(data_final.value) && (data_final.value != ''))
	{
		alert('Data Final Invalida!');
		data_final.value = '';
		data_final.focus();
		return false;
	}
}

function mascaraInteiro(){
	if (event.keyCode < 48 || event.keyCode > 57){
		event.returnValue = false;
		return false;
	}
	return true;
	}
	
	
</script>
<table align=center>
<tr><td colspan=4 align=center><h3>Relat&oacuterio de contribuintes por data</h3></td></tr>
<form method="GET" name="form1" action="relatorio_contribuintes_base.php" onLoad="focus_campo(this)" onSubmit= "return(ValidaData(form1.data_inicial,form1.data_final))">
<tr><td>Data inicial:</td><td><input type="date" name="data_inicial" style="width:75px" autocomplete=off onKeyPress="MascaraData(form1.data_inicial,event)"
 maxlength="10" /></td><td>Data final:</td><td><input type="text" name="data_final" style="width:75px" autocomplete=off  onKeyPress="MascaraData(form1.data_final,event)"
 maxlength="10"  /></tr>
<!-- <tr><td colspan=4 align=center><label for="estendido"><input type="checkbox" name="estendido" id="estendido">Modo estendido</label></td></tr> -->
<tr><td colspan="4" align = center><input type="submit" value="Buscar" /></td></tr>
</form>
</table>