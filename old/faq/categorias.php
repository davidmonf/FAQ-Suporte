<?php
			 include("conexao.php");
			 $sql_categorias = "SELECT * FROM categorias"; 
			 $result = mysql_query($sql_categorias, $conecta_banco) or print(mysql_error());  
				echo "<table border=0 width=640>";
				//echo "<thead>Categorias</thead>";
				echo "<tr>";
				while ($resultado = mysql_fetch_assoc($result)) {
				$categoria = $resultado['CATEG'];
				$icone = $resultado['ICON'];
				$link = 'buscar_categorias.php?categoria=' . $resultado['CATEG'];
				echo "<td align='center'>";
				echo '<a href="'.$link.'" title="'.$categoria.'"><img src="'.$icone.'" width="45" border="0" style="float: middle;"></a>';
				echo '<span style="vertical-align: 20px;"><a href="'.$link.'" title="'.$categoria.'"class="lnk_menu">'.$categoria.'</a></span>';
				echo "</td>";
	}
				echo "</tr>";
			echo "</table>";
			//mysql_close($conecta_banco);
?>