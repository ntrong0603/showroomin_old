<?php
	session_start();
@define ( '_lib' , '../../../lib/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";
		
		
$d = new database($config['database']);
echo giabanmasp($_POST['id']);

?>