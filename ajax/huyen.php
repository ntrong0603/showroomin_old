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
	if( isset( $_POST['tinh'] ) ){
		$idtinh=$_POST['tinh'];
		
		$d->reset();
		$sql="select * from table_tinhthanh_list where hienthi=1  and id_danhmuc= ".$idtinh." order by stt desc,ten";
		$d->query($sql);
		$array = $d->result_array();
		
		
	}

?>

      <option value="0"  >Quận/Huyện</option>
    <?php for($i=0,$count=count($array);$i<$count;$i++){
		
    ?>
    <option  value="<?php echo $array[$i]['id'];?>"  ><?php echo $array[$i]['ten'];?></option>
    <?php }?>
    

