<?php
include("seguranca.php");
include("conexao.php");
		$busca = $_GET['id'];
		$busca = mysql_real_escape_string($busca);
		$sql = "SELECT * FROM topicos where ID=$busca";
		$result = mysql_query($sql, $conecta_banco) or print(mysql_error()); 
		while ($resultado = mysql_fetch_array($result))
		{
			$titulo = $resultado['TITULO'];
			$criador = $resultado['CRIADOR'];
		}

		$sql_email = "SELECT EMAIL FROM usuarios where nome='$criador'";
		$result_email = mysql_query($sql_email, $conecta_banco) or print(mysql_error()); 
		while ($resultado_email = mysql_fetch_array($result_email))
		{
			$email = $resultado_email['EMAIL'];
		}
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
$mail->AddAddress($email, '');
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
$mail->AddBCC('david_filho@cieesp.org.br', 'David'); // Cópia Oculta
 
// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
 
// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

$mail->Subject = 'Artigo reprovado na Central de Ajuda - Suporte';
$aprovador = $_SESSION['usuarioNome'];
$motivo = $_GET['motivo'];
$mail->Body = '<p>Ol&aacute;!<br /><br />Seu artigo "'.$titulo.'" foi reprovado por '.$aprovador.' pelo seguinte motivo:<br />'.$motivo.'<br /></p><p>Edite-o aqui: <a href = "http://sistemaru.cieesp.org.br:8080/cadastro_suporte.php?id='.$busca.'">http://sistemaru.cieesp.org.br:8080/cadastro_suporte.php?id='.$busca.'</a></p><p>Atenciosamente,</p><p>Administrador da Central de Ajuda - Suporte</p>';
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
			//$sql = "UPDATE topicos_suporte SET APROVADO='1',APROVADOR='$aprovador' WHERE ID=$busca";
			//$update = mysql_query($sql, $conecta_banco) or print(mysql_error());
echo "<script>alert('Artigo reprovado!');window.location = 'texto_suporte.php?id=".$busca."'</script>";
} else {
echo "Nao foi possível enviar o e-mail.<br /><br />";
echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
}
?>