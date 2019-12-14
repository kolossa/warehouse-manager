<?php 

spl_autoload_register(function ($class) {
    $fileName=__DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
	if(is_readable($fileName))
	{
		require $fileName;
	}
});