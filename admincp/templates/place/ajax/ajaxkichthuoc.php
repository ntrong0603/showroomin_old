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
		$sql="update table_place set kichthuoc='".$idstt."' where id='".$idsp."'";
		$stmt=mysql_query($sql);
		echo "";



?>