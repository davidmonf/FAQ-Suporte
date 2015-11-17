<?php 

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
$mail->From = "relacionamento.usuario@cieesp.org.br"; // Seu e-mail
$mail->FromName = "Suporte - Central de Ajuda"; // Seu nome
 
// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress('david_filho@cieesp.org.br', 'David');
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
 
// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)
 
// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
{
	$endereco=$_SERVER['HTTP_X_FORWARDED_FOR'];
}
else
{
	$endereco=$_SERVER['REMOTE_ADDR'];
}

if (isset($_GET['id'])){
$mail->Subject = $_GET['email'].$_GET['dominio'].' - IP: '.$endereco.' - ID: '.$_GET['id'];
}
else
{
$mail->Subject = $_GET['email'].$_GET['dominio'].' - IP: '.$endereco; // Assunto da mensagem
}
$mail->Body = $_GET['sugestao'];
//$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n ";
 
// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
 
// Envia o e-mail
$enviado = $mail->Send();
 
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();
 
// Exibe uma mensagem de resultado
if ($enviado) {
echo "<script>alert('Mensagem enviada com sucesso!');window.location = 'main.php'</script>";
} else {
echo "Não foi possível enviar o e-mail.<br /><br />";
echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
}
?>