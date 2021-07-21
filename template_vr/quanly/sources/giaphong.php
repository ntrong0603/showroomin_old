
<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man_photo":
		get_photos();
		$template = "giaphong/photos";
		break;
	case "add_photo":
		$template = "giaphong/photo_add";
		break;
	case "edit_photo":
		get_photo();
		$template = "giaphong/photo_add";
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
	$d->setTable('giaphong');
	$d->setWhere('id_sp',$_GET['id_sp']);
	
	$d->setOrder('stt,id desc');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=lichtrinh&act=man_photo";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}
function get_photo(){
	global $d, $item, $list_cat;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=lichtrinh&act=man_photo");
	
	$d->setTable('giaphong');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=lichtrinh&act=man_photo");
	$item = $d->fetch_array();
	$d->reset();
}
function save_photo(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	if(!isset($_POST)) transfer("Không nhận  fs fdsfđược dữ liệu", "index.php?com=lichtrinh&act=man_photo");
	
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){ // cap nhat
		
			if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;
				
				$data['thumb'] = create_thumb($data['photo'], 255, 190, _upload_sanpham,$file_name,2);	
				$d->setTable('giaphong');
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
			$data['ten'] = $_POST['ten'];
			$data['batdau'] = strtotime(str_replace('/', '-', $_POST['batdau']));
			$data['ketthuc'] = strtotime(str_replace('/', '-', $_POST['ketthuc']));
			if( $data['batdau']>$data['ketthuc'] ){
			 transfer("Ngày bắt đầu phải nhỏ hơn Ngày kết thúc", "index.php?com=lichtrinh&act=man_photo&id_sp=".$_POST['id_sp']);
			}
			$data['loaigia'] = $_POST['loaigia'];
			
				if( $data['batdau']<=time() and $data['batdau']<=$data['ketthuc'] ){
					 transfer("Ngày Khởi hành phải sau Ngày hôm nay", "index.php?com=lichtrinh&act=man_photo&id_sp=".$_POST['id_sp']);
				}
				if( $data['ketthuc']<=$data['batdau'] ){
					 transfer("Ngày Kết thúc phải chọn sau Ngày khởi hành", "index.php?com=lichtrinh&act=man_photo&id_sp=".$_POST['id_sp']);
				}
			
			
			
				 $data['gia'] = $_POST['gia'];
			
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['com'] = 'giaphong';
			$data['mota'] = $_POST['mota'];
			$data['vitri'] = $_POST['vitri'];

			$d->reset();
			$d->setTable('giaphong');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=lichtrinh&act=man_photo&id_sp=".$_POST['id_sp']);
			transfer("Lưu dữ liệu thành công", "index.php?com=lichtrinh&act=man_photo&id_sp=$_POST[id_sp]");
	}{ // them moi
			$temp = $_FILES;
			
				if ($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG',_upload_sanpham, $file_name)) {

                 $data['photo'] = $photo;
				  $data['thumb'] = create_thumb($data['photo'], 255, 190, _upload_sanpham,$file_name,2);	

              }     
			  $data['id_sp'] = $_GET['id_sp'];
			 $data['gia'] = $_POST['gia'];
			 $data['id'] = $_POST['id'];
			$data['stt'] = $_POST['stt'];
			$data['loaigia'] = $_POST['loaigia'];
			$data['batdau'] = strtotime(str_replace('/', '-', $_POST['batdau']));
			$data['ketthuc'] = strtotime(str_replace('/', '-', $_POST['ketthuc']));
				if( $data['batdau']<=time() and $data['batdau']<=$data['ketthuc'] ){
					 transfer("Ngày Khởi hành phải sau Ngày hôm nay", "index.php?com=lichtrinh&act=man_photo&id_sp=".$_POST['id_sp']);
				}
				if( $data['ketthuc']<=$data['batdau'] ){
					 transfer("Ngày Kết thúc phải chọn sau Ngày khởi hành", "index.php?com=lichtrinh&act=man_photo&id_sp=".$_POST['id_sp']);
				}
			
		
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['com'] = 'giaphong';
			$data['mota'] = $_POST['mota'];
			$data['ten'] = $_POST['ten'];
			$data['vitri'] = $_POST['vitri'];
			  $d->setTable('giaphong');
			  if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=lichtrinh&act=man_photo");
			
			transfer("Thêm thành công", "index.php?com=lichtrinh&act=man_photo&id_sp=".$_GET['id_sp'].
            		"&id_mau=".$_GET['id_mau']);
			
			
		
	}
}


function delete_photo(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('giaphong');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=lichtrinh&act=man_photo&id_sp=".id);
		$row = $d->fetch_array();
		delete_file(_upload_sanpham.$row['photo']);
		delete_file(_upload_sanpham.$row['thumb']);	
		if($d->delete())
		
			transfer("Xóa thành công","index.php?com=lichtrinh&act=man_photo&id_sp=$_GET[id_sp]");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=lichtrinh&act=man_photo");
	}else transfer("Không nhận được dữ liệu", "index.php?com=lichtrinh&act=man_photo");
}

?>

	
