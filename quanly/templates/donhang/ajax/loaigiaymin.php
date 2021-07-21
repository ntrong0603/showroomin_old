<?php
	session_start();
@define ( '_lib' , '../../../lib/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";
		
		
$d = new database($config['database']);
$masp=$_POST['id'];
$id_sp="combo_".$_POST['dichvuin'];

$d->query("select * from table_combo where id_sp='".$id_sp."' and masp='".$masp."' " );
$ketqua=$d->fetch_array();
echo $ketqua['soluong'];
?>