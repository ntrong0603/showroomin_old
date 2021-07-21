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
	if( isset( $_POST['huyen'] ) ){
		$idphuong=$_POST['huyen'];
		$id_huyen_now = $_POST['id_huyen_now'];
		$d->reset();
		$sql="select * from table_news where loaitin='duan' and hienthi = 1 and id_huyen = '".$idphuong."'  order by stt";
		$d->query($sql);
		$duan = $d->result_array();
		
		
	}

?>

    <option value="0">---Chọn dự án---</option>
    <?php for($i=0,$count=count($duan);$i<$count;$i++){
		
    ?>
    <option  value="<?php echo $duan[$i]['id'];?>" ><?php echo $duan[$i]['ten'];?></option>
    <?php }?>
    

