<?php
$servidor = '172.30.0.3'; 
$usuario = 'res'; 
$senha = 'res379'; 

$ftp = ftp_connect($servidor); 

if (ftp_login($ftp, $usuario, $senha)) { 
	echo "Conectado";
	}
else
	{
	echo "Erro";
	}

//=========================================================	
$unixtime = time();
$systime = intval(((($unixtime / 60) / 60) / 24) + 732);

$local_arquivo = './arquivos/'.$systime.'/'; 
$ftp_pasta = '/jupiter/SISTEMAS/ARQTXT/'; 
$arquivo[1] = 'REL_ATIVAS.ACOMP_'.$systime.'.TXT';
$arquivo[2] = 'REL_CONTRATOS-MARCADOS-LOGINS_'.$systime.'.TXT';
$arquivo[3] = 'REL_CONTRATOS-PRORROGADOS-LOGINS_'.$systime.'.TXT';
$arquivo[4] = 'REL_DET_ENCAM_'.$systime.'.TXT';
$arquivo[5] = 'REL_EMTCE_'.$systime.'.TXT';
$arquivo[6] = 'REL_ENCAM_'.$systime.'.TXT';
$arquivo[7] = 'REL_OES_'.$systime.'.TXT';
$arquivo[8] = 'REL_OESVIRARAMK_'.$systime.'.TXT';

mkdir('./arquivos/'.$systime);

for ($i = 1; $i <= 8; $i++){
$recebe = ftp_get($ftp, $local_arquivo.$arquivo[$i], $ftp_pasta.$arquivo[$i], FTP_ASCII);
}

ftp_close($ftp);
?>