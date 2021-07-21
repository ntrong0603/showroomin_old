<?php 
	@define ( '_lib' , './lib/');

	include_once "../../quanly/lib/config.php";
	include_once "../../quanly/lib/constant.php";
	include_once "../../quanly/lib/class.database.php";
	include_once "../../quanly/lib/functions.php";
	include_once "../../quanly/lib/functions_giohang.php";
	include_once "../../quanly/lib/file_requick.php";

	$id=$_POST['id'];
	
	$sql="select * from table_product_danhmuc where id='".$id."' order by stt asc, id desc";
	$d->query($sql);
	$result=$d->fetch_array();

	echo "".$result['ten'];

?>