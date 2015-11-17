<?php 
include("conexao.php");
// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require("phpmailer/class.phpmailer.php");
 
// Inicia a classe PHPMailer
$mail = new PHPMailer();
 
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "mail2.cieesp.org.br"; // Endereço do servidor SMTP
//$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
//$mail->Username = 'seumail@dominio.net'; // Usuário do servidor SMTP
//$mail->Password = 'senha'; // Senha do servidor SMTP
	 
// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = "suporte@ciee.org.br"; // Seu e-mail
$mail->FromName = "Suporte - Central de Ajuda"; // Seu nome
 
// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress($_GET['email'].'@cieesp.org.br', '');
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
 
// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)
 
// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
//{
//	$endereco=$_SERVER['HTTP_X_FORWARDED_FOR'];
//}
//else
//{
//	$endereco=$_SERVER['REMOTE_ADDR'];
//}

//if (isset($_GET['id'])){
$mail->Subject = 'Alteração de senha da Base de Conhecimento - Suporte';
//}
//else
//{
//$mail->Subject = $_GET['email'].$_GET['dominio'].' - IP: '.$endereco; // Assunto da mensagem
//}
$link = md5($_GET['email'].'@cieesp.org.br'.time());
$mail->Body = '<p>Ol&aacute;!<br /><br />Voc&ecirc; entrou com um pedido de altera&ccedil;&atilde;o de senha.<br />Para alterar, clique no link abaixo:<br /><a href="http://sistemaru.cieesp.org.br:8080/alterar_senha.php?md5='.$link.'">http://sistemaru.cieesp.org.br:8080/alterar_senha.php?md5='.$link.'</a><br /><br /><br />Caso voc&ecirc; n&atilde;o tenha feito o pedido, clique aqui.</p><p>Atenciosamente,<br /><br />Administrador da Central de Ajuda - Suporte</p>';
//$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n ";
 
// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
 
 $busca = $_GET['email'];
		$busca = mysql_real_escape_string($busca);
		$sql_texto = "SELECT * FROM usuarios WHERE EMAIL = '$busca@cieesp.org.br' AND ALTERAR = '1'";
		$resultado_busca = mysql_query($sql_texto, $conecta_banco) or print(mysql_error());
		if (mysql_num_rows($resultado_busca) > 0)
		{
			//echo "<script>alert('achou');</script>";
			while ($resultado = mysql_fetch_assoc($resultado_busca)) 
			{
				$md5 = $resultado['MD5ALTERAR'];
			}
			$mail->Body = '<p>Ol&aacute;!<br /><br />Reenviamos o link para altera&ccedil;&atilde;o da senha.<br />Para alterar, clique no link abaixo:<br /><a href="http://sistemaru.cieesp.org.br:8080/alterar_senha.php?md5='.$md5.'">http://sistemaru.cieesp.org.br:8080/alterar_senha.php?md5='.$md5.'</a><br /><br /><br />Caso voc&ecirc; n&atilde;o tenha feito o pedido, clique aqui.</p><p>Atenciosamente,<br /><br />Administrador da Central de Ajuda - Suporte</p>';		
			$enviado = $mail->Send();
			if ($enviado) 
			{
				echo "<script>alert('Ja existe uma solicitacao de alteracao de senha em aberto! O e-mail foi reenviado.');window.location = 'main.php'</script>";
			}
			else
			{
				echo "Nao foi possível enviar o e-mail.<br /><br />";
				echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
			}
		}
		else
		{
// Envia o e-mail
$enviado = $mail->Send();
 
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();
 
// Exibe uma mensagem de resultado
if ($enviado) {
			$email = $_GET['email'].'@cieesp.org.br';
			echo "<script>alert(".$email.");</script>";
			$sql = "UPDATE usuarios SET ALTERAR='1',MD5ALTERAR='$link' WHERE EMAIL='$email'";
			$result = mysql_query($sql, $conecta_banco) or print(mysql_error());
echo "<script>alert('Solicitacao enviada com sucesso!');window.location = 'main.php'</script>";
} else {
echo "Nao foi possível enviar o e-mail.<br /><br />";
echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
}
}
?>