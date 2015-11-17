	<?php
	include("seguranca.php");
	// Verifica se um formulário foi enviado
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Salva duas variáveis com o que foi digitado no formulário
	// Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
	$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
	$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
	$senhamd5 = md5($senha);
	// Utiliza uma função criada no seguranca.php pra validar os dados digitados
	if (validaUsuario($usuario, $senhamd5) == true) {
	// O usuário e a senha digitados foram validados, manda pra página interna
	if ($_SESSION['alteracaoPendente'] == '1')
	{
		require("phpmailer/class.phpmailer.php");
		$mail = new PHPMailer();
		$mail->IsSMTP(); // Define que a mensagem será SMTP
		$mail->Host = "mail2.cieesp.org.br"; // Endereço do servidor SMTP
		$mail->From = "suporte@ciee.org.br"; // Seu e-mail
		$mail->FromName = "Suporte - Central de Ajuda"; // Seu nome
		$mail->AddAddress($_SESSION['email']);
		$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
		$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)
		$mail->Subject = 'Alteração de senha da Base de Conhecimento - Suporte';
		$mail->Body = '<p>Ol&aacute;!<br /><br />Reenviamos o link para altera&ccedil;&atilde;o da senha.<br />Para alterar, clique no link abaixo:<br /><a href="http://sistemaru.cieesp.org.br:8080/alterar_senha.php?md5='.$_SESSION['md5Alteracao'].'">http://sistemaru.cieesp.org.br:8080/alterar_senha.php?md5='.$_SESSION['md5Alteracao'].'</a><br /><br /><br /></p><p>Atenciosamente,<br /><br />Administrador da Central de Ajuda - Suporte</p>';		
		$enviado = $mail->Send();
		if ($enviado) 
			{
				echo ("<script>alert('Existe uma solicitacao de alteracao de senha em aberto! O e-mail foi reenviado.');</script>");
			}
			else
			{
				echo "Nao foi possível enviar o e-mail.<br /><br />";
				echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
			}
		expulsaVisitante();
	}
	else
	{
		header("Location: main.php");
	}
	} else {
	echo ("<script>alert('Senha incorreta');</script>");
	// O usuário e/ou a senha são inválidos, manda de volta pro form de login
	// Para alterar o endereço da página de login, verifique o arquivo seguranca.php
	expulsaVisitante();
	}
	}
	?>