<?php
require("phpmailer/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP(); 
$mail->Host = "mail2.cieesp.org.br"; 
$mail->From = "suporte@ciee.org.br";
$mail->FromName = "Suporte - Central de Ajuda";
$mail->AddAddress('david_filho@cieesp.org.br', '');
$mail->AddAddress('ricardo_e@cieesp.org.br', '');
$mail->AddAddress('jorge_nishimura@cieesp.org.br', '');
$mail->IsHTML(true); 
$mail->CharSet = 'iso-8859-1';
$mail->Subject = 'Artigo pendente de aprovacao na Base de Conhecimento - Suporte';
if (!isset($id))
{
$mail->Body = '<p>Ol&aacute;!<br /><br />Foi criado um novo artigo na base de conhecimento com o t&iacute;tulo "'.$titulo.'" e necessita de aprova&ccedil;&atilde;o para ser publicado.<br /></p><p>Verifique-o no link: <a href = "http://sistemaru.cieesp.org.br:8080/pendentes.php">http://sistemaru.cieesp.org.br:8080/pendentes.php</a></p><p>Atenciosamente,</p><p>Administrador da Central de Ajuda - Suporte</p>';
$enviado = $mail->Send();
$mail->ClearAllRecipients();
$mail->ClearAttachments();
if (!$enviado) {
echo "Nao foi possível enviar o e-mail.<br /><br />";
echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
}
}
//elseif (isset($id) && $aprovado == '0')
//{
//$mail->Body = '<p>Ol&aacute;!<br /><br />O artigo "'.$titulo.'" foi editado e necessita de aprova&ccedil;&atilde;o para ser publicado.<br /></p><p>Verifique-o no link: <a href = "http://sistemaru.cieesp.org.br:8080/texto_suporte.php?id='.$id.'">http://sistemaru.cieesp.org.br:8080/cadastro_suporte.php?id='.$id.'</a></p><p>Atenciosamente,</p><p>Administrador da Central de Ajuda - Suporte</p>';
//$enviado = $mail->Send();
//$mail->ClearAllRecipients();
//$mail->ClearAttachments();
//if (!$enviado) {
//echo "Nao foi possível enviar o e-mail.<br /><br />";
//echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
//}
//}
?>