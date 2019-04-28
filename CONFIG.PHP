<?php 

spl_autoload_register(function($class_nome){

	$nomeArquivo = "CLASS".DIRECTORY_SEPARATOR.$class_nome.".php";
		if(file_exists($nomeArquivo)){
			require_once($nomeArquivo);
		}
	});
?>