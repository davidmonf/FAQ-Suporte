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
$mail->FromName = "Suporte - Central de Ajuda Homologação"; // Seu nome
 
// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress('david_filho@cieesp.org.br', '');
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
 
// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
 
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
$mail->Subject = 'Novo artigo na Central de Ajuda - Suporte Homologação';
//}
//else
//{
//$mail->Subject = $_GET['email'].$_GET['dominio'].' - IP: '.$endereco; // Assunto da mensagem
//}
$mail->Body = '<p>Ol&aacute;!<br /><br />Foi criado um novo artigo na Central de Ajuda:<br /><br /><h3>'.$titulo.'</h3></p><p>Link: <a href = "http://sistemaru.cieesp.org.br:8080/texto.php?id='.$busca.'">http://sistemaru.cieesp.org.br:8080/texto.php?id='.$busca.'</a></p><p>Atenciosamente,</p><p>Administrador da Central de Ajuda - Suporte</p>';
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
			$aprovador = $_SESSION['usuarioNome'];
			$sql = "UPDATE topicos SET APROVADO='1',APROVADOR='$aprovador' WHERE ID=$busca";
			$update = mysql_query($sql, $conecta_banco) or print(mysql_error());
echo "<script>alert('Artigo aprovado!');window.location = 'texto.php?id=".$busca."'</script>";
} else {
echo "Nao foi possível enviar o e-mail.<br /><br />";
echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
}
?>