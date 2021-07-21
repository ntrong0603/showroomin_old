<?php
	session_start();
	$session=session_id();
	@define ( '_template' , './../templates/');
	@define ( '_source' , './../sources/');
	@define ( '_lib' , './../quanly/lib/');

	if(!isset($_SESSION['lang']))
	{
		$_SESSION['lang']='_sd';
	}
	
	$lang=$_SESSION['lang'];
		
	include_once _template."lang/lang$lang.php";
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."class.database.php";
	include_once _lib."functions.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."file_requick.php";
	
?>
<?php
	if( isset( $_GET['dienthoai'] ) ){
		
		$d->reset();
		$sql="INSERT INTO  table_lienhekhach (ten,dienthoai,diachi,title,noidung) VALUES ('Khách hàng','".$_GET['dienthoai']."','".$_GET['url']."','Yêu cầu gọi lại','Gọi lại cho tôi')";	
		if($d->query($sql)){ ?>1<?php }else{ ?>0<?php }} ?>