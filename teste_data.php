<?php
echo date("Y\-m\-d ");

if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
				{
					$endereco=$_SERVER['HTTP_X_FORWARDED_FOR'];
				}
				else
				{
					$endereco=$_SERVER['REMOTE_ADDR'];
				}
				echo $endereco;
?>