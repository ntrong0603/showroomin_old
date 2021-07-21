<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man_item":
		get_items();
		$template = "album/items";
		break;
	case "add_item":
		$template = "album/item_add";
		break;
	case "edit_item":
		get_item();
		$template = "album/item_edit";
		break;
	case "save_item":
		save_item();
		break;
	case "delete_item":
		delete_item();
		break;
		
	case "man_photo":
		get_photos();
		$template = "album/photos";
		break;
	case "add_photo":
		$template = "album/photo_add";
		break;
	case "edit_photo":
		get_photo();
		$template = "album/photo_edit";
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
function get_items(){
	global $d, $items, $paging;
	
	$d->setTable('album');
	
	$d->setOrder('stt,id desc');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=album&act=man_item";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}
function get_item(){
	global $d, $item, $list_cat;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=album&act=man_item");
	
	$d->setTable('album');

	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=album&act=man_item");
	$item = $d->fetch_array();
	$d->reset();
}
function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=album&act=man_item");
	
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){ // cap nhat
		
			if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF', _upload_album,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], 400, 400, _upload_hinhanh,$file_name,2);	
				$d->setTable('album');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_album.$row['photo']);
				}
			}
			$data['id'] = $_REQUEST['id'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['description'] = $_POST['description'];
			$data['title'] = $_POST['title'];
			$data['keyword'] = $_POST['keyword'];
			$data['ten'] = $_POST['ten'];
			$data['tenkhongdau'] = changeTitle($_POST['ten']);	
			

			$d->reset();
			$d->setTable('album');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=album&act=man_item");
			header("Location:index.php?com=album&act=man_item");
	}{ // them moi
		
			if($data['photo'] = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF', _upload_hinhanh,$file_name))
				{
					$data['thumb'] = create_thumb($data['photo'], 400, 400, _upload_hinhanh,$file_name,2);	
					$data['stt'] = $_POST['stt'];
					$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
					$data['description'] = $_POST['description'];
					$data['title'] = $_POST['title'];
					$data['keyword'] = $_POST['keyword'];
					$data['ten'] = $_POST['ten'];
					$data['tenkhongdau'] = changeTitle($_POST['ten']);	
					

					
					$d->setTable('album');
					if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=album&act=man_item");
				}
			
			header("Location:index.php?com=album&act=man_item");
		
	}
}


function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('album');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=album&act=man_item");
		$row = $d->fetch_array();
		delete_file(_upload_album.$row['photo']);
		if($d->delete())
		
			header("Location:index.php?com=album&act=man_item");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=album&act=man_item");
	}else transfer("Không nhận được dữ liệu", "index.php?com=album&act=man_item");
}



// ecit photo
function get_photos(){
	global $d, $items, $paging;
	
	$d->setTable('hinhalbum');
	$d->setWhere('id_sp',$_GET['id_sp']);
	$d->setOrder('stt,id desc');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=album&act=man_photo";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}
function get_photo(){
	global $d, $item, $list_cat;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=album&act=man_photo");
	
	$d->setTable('hinhalbum');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=album&act=man_photo");
	$item = $d->fetch_array();
	$d->reset();
}
function save_photo(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=album&act=man_photo");
	
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){ // cap nhat
		
			if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_hinhanh,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], 400, 400, _upload_hinhanh,$file_name,2);	
				$d->setTable('hinhalbum');
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
			$data['com'] = 'hinhalbum';
			$data['mota'] = $_POST['mota'];
			$data['vitri'] = $_POST['vitri'];

			$d->reset();
			$d->setTable('hinhalbum');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=album&act=man_photo");
			header("Location:index.php?com=hinhalbum&act=man_photo&id_sp=$_POST[id_sp]");
	}{ // them moi
		
			for($i=0; $i<5; $i++){
				if($data['photo'] = upload_image("file".$i, 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_hinhanh,$file_name.$i))
					{
						$data['thumb'] = create_thumb($data['photo'], 400, 400, _upload_hinhanh,$file_name,2);	
						$data['stt'] = $_POST['stt'.$i];
						$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;
						$data['mota'] = $_POST['mota'.$i];
						$data['vitri'] = $_POST['vitri'.$i];
						$data['id_sp'] = $_POST['id_sp'];
						
						$d->setTable('hinhalbum');
						if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=album&act=man_photo");
					}
			}
			header("Location:index.php?com=album&act=man_photo&id_sp=$_POST[id_sp]");
		
	}
}


function delete_photo(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('hinhalbum');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=album&act=man_photo");
		$row = $d->fetch_array();
		delete_file(_upload_hinhanh.$row['photo']);
		delete_file(_upload_hinhanh.$row['thumb']);	
		if($d->delete())
		
			header("Location:index.php?com=album&act=man_photo&id_sp=$_GET[id_sp]");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=album&act=man_photo");
	}else transfer("Không nhận được dữ liệu", "index.php?com=album&act=man_photo");
}

?>

	
