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
	if( isset( $_GET['id_user'] ) ){
		
		$d->reset();
		$sql="insert into table_yeuthich (id_user,id_yeuthich,tablename,ngaytao) values (".$_GET['id_user'].",".$_GET['id_yeuthich'].",'".$_GET['table']."','".time()."')";
		if($d->query($sql)){ ?>
			<button class='daquantam'>Đã quan tâm</button>

					
				
			<?php }else{ ?>
			<button class='chuaquantam' value='dalogin'>Quan tâm</button>
	<?php
	
	}
	}
?>

    

