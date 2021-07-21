
<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man_photo":
		get_photos();
		$template = "hinhsp/photos";
		break;
	case "add_photo":
		$template = "hinhsp/photo_add";
		break;
	case "edit_photo":
		get_photo();
		$template = "hinhsp/photo_edit";
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
	$sql_sp = "SELECT id,hienthi FROM table_hinhsp where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_hinhsp SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_hinhsp SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$d->setTable('hinhsp');
	$d->setWhere('id_sp',$_GET['id_sp']);
	$d->setWhere('com',$_GET['id_com']);
	
	$d->setOrder('stt,id desc');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=hinhsp&id_com=".$_GET['id_com']."&act=man_photo";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}
function get_photo(){
	global $d, $item, $list_cat;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=hinhsp&id_com=".$_GET['id_com']."&act=man_photo");
	
	$d->setTable('hinhsp');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=hinhsp&id_com=".$_GET['id_com']."&act=man_photo");
	$item = $d->fetch_array();
	$d->reset();
}
function save_photo(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	if(!isset($_POST)) transfer("Không nhận  fs fdsfđược dữ liệu", "index.php?com=hinhsp&id_com=".$_GET['id_com']."&act=man_photo");
	
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){ // cap nhat
		
			if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_sanpham,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], 400, 500, _upload_sanpham,$file_name,2);	
				$d->setTable('hinhsp');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
			}
			$data['id'] = $_POST['id'];
			$data['id_sp'] = $_POST['id_sp'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['com'] = $_GET['id_com'];
			$data['mota'] = $_POST['mota'];
			$data['vitri'] = $_POST['vitri'];

			$d->reset();
			$d->setTable('hinhsp');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=hinhsp&id_com=".$_GET['id_com']."&act=man_photo");
			transfer("Lưu dữ liệu thành công", "index.php?com=hinhsp&id_com=".$_GET['id_com']."&act=man_photo&id_sp=$_POST[id_sp]");
	}{ // them moi
			$temp = $_FILES;
			for( $i = 0; $i < count($temp['picture']['name']); $i++){
				$ten_pic=fns_Rand_digit(0,9,15);
	
				$img['name'] = $temp['picture']['name'][$i];
	
				$img['type'] = $temp['picture']['type'][$i];
	
				$img['tmp_name'] = $temp['picture']['tmp_name'][$i];
	
				$img['error'] = $temp['picture']['error'][$i];
	
				$img['size'] = $temp['picture']['size'][$i];
	
				$_FILES['pic'] = $img;
				if ($photo = upload_image("pic", 'jpg|png|gif|JPG|jpeg|JPEG',_upload_sanpham, $ten_pic)) {

                  $data['photo'] = $photo;
				  $data['thumb'] = create_thumb($data['photo'], 400, 500, _upload_sanpham,$ten_pic,2);	

              }     
			  $data['id_sp'] = $_GET['id_sp'];
			  $data['com'] = $_GET['id_com'];
			  $d->setTable('hinhsp');
			  if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=hinhsp&id_com=".$_GET['id_com']."&act=man_photo");
			}
			transfer("Thêm thành công", "index.php?com=hinhsp&id_com=".$_GET['id_com']."&act=man_photo&id_sp=".$_GET['id_sp'].
            		"&id_mau=".$_GET['id_mau']);
			
			
		
	}
}


function delete_photo(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('hinhsp');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=hinhsp&id_com=".$_GET['id_com']."&act=man_photo&id_sp=".id);
		$row = $d->fetch_array();
		delete_file(_upload_sanpham.$row['photo']);
		delete_file(_upload_sanpham.$row['thumb']);	
		if($d->delete())
		
			transfer("Xóa thành công","index.php?com=hinhsp&id_com=".$_GET['id_com']."&act=man_photo&id_sp=$_GET[id_sp]");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=hinhsp&id_com=".$_GET['id_com']."&act=man_photo");
	}else transfer("Không nhận được dữ liệu", "index.php?com=hinhsp&id_com=".$_GET['id_com']."&act=man_photo");
}

?>

	
