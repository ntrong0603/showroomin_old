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
		$d->setTable('place');
		$d->setWhere('id', $chitietsanpham['id']);
		$data['quantam']=$result['quantam']-1;
		$d->update($data);
						
		$d->reset();
		$sql="delete from table_yeuthich where id_user=".$_GET['id_user']." and id_yeuthich=".$_GET['id_yeuthich']."  and tablename='".$_GET['table']."' ";
		if($d->query($sql)){ ?>

					<button class='chuaquantam' value='dalogin'>Quan tâm</button>
				
			<?php }else{ ?>
						<button class='daquantam'>Đã quan tâm</button>

					
	<?php
	
	}
	}

?>

    

