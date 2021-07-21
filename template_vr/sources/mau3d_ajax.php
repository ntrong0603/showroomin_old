<?php 
	@define ( '_lib' , './lib/');

	include_once "../../quanly/lib/config.php";
	include_once "../../quanly/lib/constant.php";
	include_once "../../quanly/lib/class.database.php";
	include_once "../../quanly/lib/functions.php";
	include_once "../../quanly/lib/functions_giohang.php";
	include_once "../../quanly/lib/file_requick.php";

	$data['idsp']= $_POST['idsp'];

	echo "<iframe src='./models3d/index.php?idsp=".$data['idsp']."' width='100%' height='450px'></iframe>";
?>