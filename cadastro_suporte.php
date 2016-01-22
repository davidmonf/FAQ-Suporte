<html>
<head>
<title>CIEE :: Central de Ajuda</title>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> 
  <script type="text/javascript" src="js/prototype.js"></script>
  <script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
  <script type="text/javascript" src="js/lightbox.js"></script>
  <link rel="stylesheet" type="text/css" href="lol.css?v=1.1" media="screen"/>
  <link rel="icon" type="image/png" href="null" />
  <meta http-equiv="Content-Type" content="text/xhtml; charset=latin1_bin" />
  <script src="css_browser_selector.js" type="text/javascript"></script>
  <!-- TinyMCE -->
<script type="text/javascript" src="tinymce_pt/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript"src="tinymce_pt/jscripts/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
    language : "pt",
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
theme_advanced_buttons1:
"code,bold,italic,underline,strikethrough,,bullist,numlist,justifyleft,justifycenter,justifyright,justifyfull,cleanup,link,unlink,image,table,formatselect,fontsizeselect,forecolor,backcolor,fullscreen",

		// Theme options
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		theme_advanced_buttons4 : "",


		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
	 content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
    file_browser_callback : "tinyBrowser",
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
</head>
<body onload="Mudarestado()">
	<table align="center"class="conteudo" style="background-image: url(/imagens/miolo_suporte.jpg); background-repeat: repeat-y; width: 1024px; border-collapse: collapse;">
	<?php include("topo_completo_sup.php")?>
<tr><td class=espacos>
<?php
	protegePagina(); // Chama a função que protege a página
	include("conexao.php");
	if ((!isset($_GET['id'])) && (!isset($_POST['id'])))
	{
		include ("form_cadastro_branco_suporte.php");
		if (isset($_POST['criador']))
		{
			$titulo = $_POST['titulo'];
			$problema = $_POST['problema'];
			$categoria = $_POST['categ'];
			$causa = $_POST['causa'];
			$solucao = $_POST['solucao'];
			$encerramento = $_POST['encerramento'];
			$chamado = $_POST['chamado'];
			$tag = $_POST['tag'];
			$criador = $_POST['criador'];
			$hoje = date("Y\-m\-d");
			$sql = "INSERT INTO  topicos_suporte (ID , TITULO , PROBLEMA , CATEG, CAUSA, SOLUCAO, ENCERRAMENTO, CHAMADO, TAG, DATA, CRIADOR) VALUES ('NULL', '$titulo', '$problema', '$categoria', '$causa', '$solucao', '$encerramento', '$chamado', '$tag', '$hoje', '$criador')";
			$result = mysql_query($sql, $conecta_banco) or print(mysql_error());
			include ("email_artigo.php");
			echo ("<script>alert('Dados inseridos com sucesso');window.location = 'main_suporte.php'</script>");
		}

	
	}
	elseif (!isset($_POST['titulo'])) 
	{
		$busca = $_GET['id'];
		$busca = mysql_real_escape_string($busca);
		$sql = "SELECT * FROM topicos_suporte where ID=$busca";
		$result = mysql_query($sql, $conecta_banco) or print(mysql_error()); 
		while ($resultado = mysql_fetch_array($result))
		{
			$titulo = $resultado['TITULO'];
			$problema = $resultado['PROBLEMA'];
			$categoria = $resultado['CATEG'];
			$causa = $resultado['CAUSA'];
			$solucao = $resultado['SOLUCAO'];
			$encerramento = $resultado['ENCERRAMENTO'];
			$chamado = $resultado['CHAMADO'];
			$tag = $resultado['TAG'];
			$criador = $resultado['CRIADOR'];
			$aprovado = $resultado['APROVADO'];
			
		}
		include("form_cadastro_suporte.php");
	}
	elseif (isset($_POST['titulo']))
	{
		$id = $_POST['id'];
		$titulo = $_POST['titulo'];
		$problema = $_POST['problema'];
		$categoria = $_POST['categ'];
		$causa = $_POST['causa'];
		$solucao = $_POST['solucao'];
		$encerramento = $_POST['encerramento'];
		$chamado = $_POST['chamado'];
		$tag = $_POST['tag'];
		$aprovado = $_POST['aprovado'];
		$sql = "UPDATE topicos_suporte SET TITULO='$titulo',PROBLEMA='$problema',CATEG='$categoria',CAUSA='$causa',SOLUCAO='$solucao',ENCERRAMENTO='$encerramento',CHAMADO='$chamado',TAG='$tag' WHERE ID=$id";
		$result = mysql_query($sql, $conecta_banco) or print(mysql_error());
		if ($_SESSION['usuarioTipo'] != 'MASTER');
		{
			include ("email_artigo.php");
		}
		echo ("<script>alert('Dados atualizados com sucesso');window.location = 'texto_suporte.php?id=$id'</script>");	
	}
?>
 </td>
 </tr>
 <?php include("baixo.php")?>
 </table>
</body>
</html>