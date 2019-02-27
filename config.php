<?php 

spl_autoload_register(function ($nameClass){
	$dirName = "class";
	$fileName = $dirName . DIRECTORY_SEPARATOR . $nameClass . ".php";

	if (file_exists($fileName)){
		require_once($fileName);
	}
})


?>