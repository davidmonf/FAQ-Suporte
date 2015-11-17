<?php
			 include("conexao.php");
			 $sql_categorias = "SELECT * FROM categorias ORDER BY CATEG"; 
			 $result = mysql_query($sql_categorias, $conecta_banco) or print(mysql_error());  
				echo "<table border=0 width=640>";
				echo "<tr>";
				while ($resultado = mysql_fetch_assoc($result)) {
				$categoria = $resultado['CATEG'];
				$icone = $resultado['ICON'];
				$link = 'buscar_categorias.php?categoria=' . $resultado['CATEG'];
				$desc_categ = $resultado['DESC_CATEG'];
				echo "<td align='center'>";
				echo '<a href="'.$link.'" title="'.$desc_categ.'"><img src="'.$icone.'" width="30" border="0" style="float: middle;"></a>';
				echo '<span style="vertical-align: 10px;"><a href="'.$link.'" title="'.$desc_categ.'"class="lnk_menu">'.$categoria.'</a></span>';
				echo "</td>";
	}
				echo "</tr>";
			echo "</table>";
?>