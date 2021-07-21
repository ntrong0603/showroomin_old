<?php
@define ( '_lib' , '../../../lib/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";
		$d = new database($config['database']);
$idsp=$_GET['idsp'];
$idstt=$_GET['idstt'];
$table='';
if( isset( $_GET['table'] ) ){$table=$_GET['table'];}
		$sql="update table_".$table." set stt='".$idstt."' where id='".$idsp."'";
		$stmt=mysql_query($sql);
		echo "";



?>