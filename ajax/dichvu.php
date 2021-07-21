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
	
	
	
	
	if($_REQUEST['command']=='add' && $_REQUEST['placeid']>0){
	$pid=$_REQUEST['placeid'];
	$com=$_REQUEST['com'];
		addtocart($pid,1,$com);
		
		redirect("dat-hang.html");}
?>
<?php
	if( isset( $_POST['id'] ) ){
		$id=$_POST['id'];
		
		$d->reset();
		$sql="select * from table_combo where id_sp = 'combo_".$id."'  order by stt";
		$d->query($sql);
		$loaigiay = $d->result_array();
		
		
	}

?>
	<option value="0">Loại giấy</option>
    <?php for($i=0;$i<count($loaigiay);$i++){
		
    ?>
    <option  value="<?php echo $loaigiay[$i]['masp'];?>"  ><?php echo $loaigiay[$i]['ten'];?></option>
    <?php }?>
    

