<?php
@define ( '_lib' , '../../../lib/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";
		$d = new database($config['database']);
			$idsp=$_GET['idsp'];

		$sql="select * from table_xuatkho where id_sp='lp_".$idsp."' order by id desc limit 1";
		$d->query($sql);
		$tam=$d->fetch_array();
		echo $tam['gia'];



?>