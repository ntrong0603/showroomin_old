<?php 
	@define ( '_lib' , './lib/');

	include_once "../vr/Vinmus/quanly/lib/config.php";
	include_once "../vr/Vinmus/quanly/lib/constant.php";
	include_once "../vr/Vinmus/quanly/lib/class.database.php";
	include_once "../vr/Vinmus/quanly/lib/functions.php";
	include_once "../vr/Vinmus/quanly/lib/functions_giohang.php";
	include_once "../vr/Vinmus/quanly/lib/file_requick.php";

	$data['idsp']= $_POST['idsp'];

	echo "<iframe src='http://localhost/allunee_v3/models3d/index.php?idsp=".$data['idsp']."' width='100%' height='450px'></iframe>";
?>