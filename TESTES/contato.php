
<html>
<head>
  <title>World of Warcraft Fansite - Contato</title>
  <link rel="stylesheet" type="text/css" href="estilo.css" />
    <meta http-equiv="Content-Type" content="text/xhtml; charset=ISO-8859-1" />
  <script>
function valida(f)
{
  if( (f.v_nome.value=='') || (f.v_nome.value==' ') )
    {
     alert('Preencha o campo Nome');
	   f.v_nome.focus();
	   return false;
    }
  else if(f.v_ddd.value!='')
   { 
	   if((isNaN(f.v_ddd.value)) || (f.v_ddd.value.length !=3) || (f.v_ddd.value.indexOf('0')!=0) )
	    {
		   alert('Preencha o campo DDD com 3 digitos, utilize apenas numeros. Ex: 011');
		 f.v_ddd.value='';  
	     f.v_ddd.focus();
	     return false;
      }

      if((f.v_tel.value=='') || (isNaN(f.v_tel.value)) || (f.v_tel.value.length!=8)) 
	    {
			    alert('Por gentileza preencha o campo telefone corretamente, utilizando apenas numeros!!!');
			  f.v_tel.value='';	
		      f.v_tel.focus();
			   return false;
	    }			
			 if((f.v_email.value=='') || (f.v_email.value.indexOf('@')==-1) || (f.v_email.value.indexOf('.')==-1))
        {
        alert('Preencha o campo E-mail!');
	      f.v_email.focus();
	      return false;
       }
			  
	 }
	else if(f.v_tel.value!='')
   {
 	   if((f.v_ddd.value=='') && (f.v_tel.value!=''))
      {
        alert('Preencha o campo DDD com 3 digitos, utilize apenas numeros. Ex: (011)');
		  f.v_tel.value=''; 
 	      f.v_ddd.focus();
        return false;
		  }
	 }
  else if((f.v_email.value=='') || (f.v_email.value.indexOf('@')==-1) || (f.v_email.value.indexOf('.')==-1))
    {
     alert('Preencha o campo E-mail..');
	   f.v_email.focus();
	   return false;
    }
  else 
	 {
     return true;
   }
}
</script>
</head>
<body>
<form name="cadastro" method="post" action="http://www.goya.pro.br/pg_recebe.asp" onSubmit="return(valida(this))">
 <table border="1" cellspacing="0" cellpadding="0" align="center" class="tab_txt">
 <tr><td colspan="2"><?php include("topo.php"); ?></td></tr>
 <tr><td width="158" valign="top"><?php include("menu.php"); ?></td></tr>
     <tr>
		 <td>
          <table width="800" align="center">
                <tr>
                  <td colspan="3"><strong> Fale conosco</strong></td>
                </tr>
                <tr>
                  <td width="5">&nbsp;</td>
                  <td width="42">Nome</td>
                  <td width="291"><input type="text" name="v_nome" class="cx_txt"></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>DDD</td>
                  <td><input type="text" name="v_ddd" maxlength="3" size="5" class="cx_txt">
                  Telefone
                  <input type="text" name="v_tel" maxlength="8" size="12" class="cx_txt"></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>E-mail </td>
                  <td><input type="text" name="v_email"  class="cx_txt"></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>Mensagem</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><textarea name="v_msg"  class="cx_txt"></textarea></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="bt_envia" id="bt_envia" value="Enviar"  class="bt_enviar"></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
        </table>
        <br /><br />
        <br />&nbsp;&nbsp;<br />
        <br /><br />
        <p align="center">&nbsp;</p>

	 </td>
 </tr>
 <tr>
 <td td colspan="2" width="150"><?php include("baixo.php"); ?></td>
 </tr>
 </table>
 </form>
</body>
</html>
