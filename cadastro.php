<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin1_bin" />
<link rel="stylesheet" type="text/css" href="lol.css" />
<link rel="icon" type="image/png" href="null" />
<title>CIEE :: Central de Ajuda</title>
<!-- TinyMCE -->
<script type="text/javascript" src="tinymce_pt/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript"
   src="tinymce_pt/jscripts/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script>
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
<body>
<table width="600" align="center">
<tr><td><?php include("topo_editor.php")?></td></tr>
<tr><td><?php include("busca.php")?></td></tr>
<tr><td><?php include("categorias.php")?></td></tr>
<tr><td width="800">
<?php
	protegePagina(); // Chama a função que protege a página
	include("conexao.php");
	if ((!isset($_GET['id'])) && (!isset($_POST['id'])))
	{
		include ("form_cadastro_branco.php");
		if (isset($_POST['titulo']))
		{
			$titulo = $_POST['titulo'];
			$texto = $_POST['texto'];
			$categoria = $_POST['categ'];
			$tag = $_POST['tag'];
			$hoje = date("Y\-m\-d");
			$criador = $_POST['criador'];
			$sql = "INSERT INTO  $tbl_name (ID , TITULO , TEXTO ,CATEG, TAG, DATA, CRIADOR) VALUES ('NULL', '$titulo', '$texto', '$categoria', '$tag', '$hoje', '$criador')";
			$result = mysql_query($sql, $conecta_banco) or print(mysql_error());
			include ("email_artigo_central.php");
			echo ("<script>alert('Dados inseridos com sucesso');window.location = 'main.php'</script>");
		}
	} 
	elseif (!isset($_POST['titulo'])) 
	{
		$busca = $_GET['id'];
		$busca = mysql_real_escape_string($busca);
		$sql = "SELECT * FROM $tbl_name where ID=$busca";
		$result = mysql_query($sql, $conecta_banco) or print(mysql_error()); 
		while ($resultado = mysql_fetch_array($result))
		{
			$titulo = $resultado['TITULO'];
			$texto = $resultado['TEXTO'];
			$categoria = $resultado['CATEG'];
			$tag = $resultado['TAG'];
		}
		include("form_cadastro.php");
	}
	elseif (isset($_POST['titulo']))
	{
		$titulo = $_POST['titulo'];
		$texto = $_POST['texto'];
		$categoria = $_POST['categ'];
		$id = $_POST['id'];
		$tag = $_POST['tag'];
		$sql = "UPDATE $db_name.$tbl_name SET TITULO='$titulo',TEXTO='$texto',CATEG='$categoria',TAG='$tag' WHERE $tbl_name.ID=$id";
		$result = mysql_query($sql, $conecta_banco) or print(mysql_error());
		echo ("<script>alert('Dados atualizados com sucesso');window.location = 'texto.php?id=$id'</script>");
	}
?>
 </td>
 </tr>
 </table>
</body>
</html>