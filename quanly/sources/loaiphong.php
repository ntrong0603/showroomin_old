
<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man_photo":
		get_photos();
		$template = "loaiphong/photos";
		break;
	case "add_photo":
		$template = "loaiphong/photo_add";
		break;
	case "edit_photo":
		$_SESSION['loaiphong']="index.php?com=loaiphong&act=edit_photo&id=".$_GET['id']."&id_sp=".$_GET['id_sp'];
		get_photo();
		$template = "loaiphong/photo_edit";
		break;
	case "save_photo":
		save_photo();
		break;
	case "delete_photo":
		delete_photo();
		break;
		
	default:
		$template = "index";
}

function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}
function get_photos(){
	global $d, $items, $paging;
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_loaiphong where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_loaiphong SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_loaiphong SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$d->setTable('loaiphong');
	$d->setWhere('id_sp',$_GET['id_sp']);
	
	$d->setOrder('stt,id desc');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=loaiphong&act=man_photo";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}
function get_photo(){
	global $d, $item, $list_cat;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Kh??ng nh???n ???????c d??? li???u", "index.php?com=loaiphong&act=man_photo");
	
	$d->setTable('loaiphong');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("D??? li???u kh??ng c?? th???c", "index.php?com=loaiphong&act=man_photo");
	$item = $d->fetch_array();
	$d->reset();
}
function save_photo(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	if(!isset($_POST)) transfer("Kh??ng nh???n  fs fdsf???????c d??? li???u", "index.php?com=loaiphong&act=man_photo");
	
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){ // cap nhat
		
			if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;
				
				$data['thumb'] = create_thumb($data['photo'], 255, 190, _upload_sanpham,$file_name,2);	
				$d->setTable('loaiphong');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
			}
			$data['id'] = $_POST['id'];
			$data2['gia'] = $_POST['gia'];
			$d->query("select * from table_giaphong where id_sp='gp_".$id."' and loaigia=-1");
			$tam=$d->result_array();
			if( count($tam)>0 ){
			$d->query("UPDATE table_giaphong SET gia=".$_POST['gia']." WHERE id_sp='gp_".$id."' and loaigia=-1");
			}else{
			$d->query("insert into table_giaphong (loaigia,ten,batdau,ketthuc,hienthi,gia,id_sp) values('-1','M???c ?????nh',-2147483648,2147483647,1,".$_POST['gia'].",'gp_".$id."')");
			
			}
			
			$data['gia'] = $_POST['gia'];
			$data['id_sp'] = $_POST['id_sp'];
			$data['ten'] = $_POST['ten'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['com'] = 'loaiphong';
			$data['mota'] = $_POST['mota'];
			$data['vitri'] = $_POST['vitri'];

			$d->reset();
			$d->setTable('loaiphong');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("C???p nh???t d??? li???u b??? l???i", "index.php?com=loaiphong&act=man_photo");
			transfer("L??u d??? li???u th??nh c??ng", "index.php?com=loaiphong&act=man_photo&id_sp=$_POST[id_sp]");
	}{ // them moi
			$temp = $_FILES;
			
				if ($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG',_upload_sanpham, $file_name)) {

                 $data['photo'] = $photo;
				  $data['thumb'] = create_thumb($data['photo'], 255, 190, _upload_sanpham,$file_name,2);	

              }     
				
			$data['id_sp'] = $_GET['id_sp'];
			$data['id'] = $_POST['id'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['com'] = 'loaiphong';
			$data['mota'] = $_POST['mota'];
			$data['ten'] = $_POST['ten'];
			$data['vitri'] = $_POST['vitri'];
			  $d->setTable('loaiphong');
			  if(!$d->insert($data)) transfer("L??u d??? li???u b??? l???i", "index.php?com=loaiphong&act=man_photo");
			
			transfer("Th??m th??nh c??ng", "index.php?com=loaiphong&act=man_photo&id_sp=".$_GET['id_sp'].
            		"&id_mau=".$_GET['id_mau']);
			
			
		
	}
}


function delete_photo(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('loaiphong');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("D??? li???u kh??ng c?? th???c", "index.php?com=loaiphong&act=man_photo&id_sp=".id);
		$row = $d->fetch_array();
		delete_file(_upload_sanpham.$row['photo']);
		delete_file(_upload_sanpham.$row['thumb']);	
		if($d->delete())
		
			transfer("X??a th??nh c??ng","index.php?com=loaiphong&act=man_photo&id_sp=$_GET[id_sp]");
		else
			transfer("X??a d??? li???u b??? l???i", "index.php?com=loaiphong&act=man_photo");
	}else transfer("Kh??ng nh???n ???????c d??? li???u", "index.php?com=loaiphong&act=man_photo");
}

?>

	
