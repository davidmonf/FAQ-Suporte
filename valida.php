	<?php
	include("seguranca.php");
	// Verifica se um formul�rio foi enviado
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Salva duas vari�veis com o que foi digitado no formul�rio
	// Detalhe: faz uma verifica��o com isset() pra saber se o campo foi preenchido
	$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
	$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
	$senhamd5 = md5($senha);
	// Utiliza uma fun��o criada no seguranca.php pra validar os dados digitados
	if (validaUsuario($usuario, $senhamd5) == true) {
	// O usu�rio e a senha digitados foram validados, manda pra p�gina interna
	if ($_SESSION['alteracaoPendente'] == '1')
	{
		require("phpmailer/class.phpmailer.php");
		$mail = new PHPMailer();
		$mail->IsSMTP(); // Define que a mensagem ser� SMTP
		$mail->Host = "mail2.cieesp.org.br"; // Endere�o do servidor SMTP
		$mail->From = "suporte@ciee.org.br"; // Seu e-mail
		$mail->FromName = "Suporte - Central de Ajuda"; // Seu nome
		$mail->AddAddress($_SESSION['email']);
		$mail->IsHTML(true); // Define que o e-mail ser� enviado como HTML
		$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)
		$mail->Subject = 'Altera��o de senha da Base de Conhecimento - Suporte';
		$mail->Body = '<p>Ol&aacute;!<br /><br />Reenviamos o link para altera&ccedil;&atilde;o da senha.<br />Para alterar, clique no link abaixo:<br /><a href="http://sistemaru.cieesp.org.br:8080/alterar_senha.php?md5='.$_SESSION['md5Alteracao'].'">http://sistemaru.cieesp.org.br:8080/alterar_senha.php?md5='.$_SESSION['md5Alteracao'].'</a><br /><br /><br /></p><p>Atenciosamente,<br /><br />Administrador da Central de Ajuda - Suporte</p>';		
		$enviado = $mail->Send();
		if ($enviado) 
			{
				echo ("<script>alert('Existe uma solicitacao de alteracao de senha em aberto! O e-mail foi reenviado.');</script>");
			}
			else
			{
				echo "Nao foi poss�vel enviar o e-mail.<br /><br />";
				echo "<b>Informa��es do erro:</b> <br />" . $mail->ErrorInfo;
			}
		expulsaVisitante();
	}
	else
	{
		header("Location: main.php");
	}
	} else {
	echo ("<script>alert('Senha incorreta');</script>");
	// O usu�rio e/ou a senha s�o inv�lidos, manda de volta pro form de login
	// Para alterar o endere�o da p�gina de login, verifique o arquivo seguranca.php
	expulsaVisitante();
	}
	}
	?>