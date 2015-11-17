<?php
			 include("conexao.php");
			 $count_linha = 0;
			 $sql_categorias = "SELECT * FROM categorias_suporte ORDER BY CATEG"; 
			 $result = mysql_query($sql_categorias, $conecta_banco) or print(mysql_error());  
				echo "<table border=0 width=1024>";
				echo "<tr>";
				while ($resultado = mysql_fetch_assoc($result)) {
				$categoria = $resultado['CATEG'];
				$icone = $resultado['ICON'];
				$link = 'buscar_categorias_suporte.php?categoria=' . $resultado['CATEG'];
				$desc_categ = $resultado['DESC_CATEG'];
				$count_linha = $count_linha+1;
				if ($count_linha > 8)
				{
					echo "</tr><tr align='center'>";
					$count_linha = 1;
				}
				echo "<td align='center'>";
				echo '<a href="'.$link.'" title="'.$desc_categ.'"><img src="'.$icone.'" width="30" border="0" style="float: left;"></a>';
				echo '<span style="vertical-align: 10px;"><a href="'.$link.'" title="'.$desc_categ.'"class="lnk_menu" style="float: left;">&nbsp '.$categoria.'</a></span>';
				echo "</td>";
	}
				echo "</tr>";
			echo "</table>";
?>