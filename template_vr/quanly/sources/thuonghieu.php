<?php if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man_photo":
		get_photos();
		$template = "photo/item_thuonghieu";
		break;
	case "add_photo":		
		$template = "photo/add_thuonghieu";
		break;
	case "edit_photo":
		get_photo();
		$template = "photo/edit_thuonghieu";
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
	
	$d->setTable('photo');
	$d->setWhere('com','thuonghieu');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=photo_thuonghieu&act=man_photo";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}

function get_photo(){
	global $d, $item, $list_cat;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=photo_thuonghieu&act=man_photo");
	$d->setTable('photo');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo_thuonghieu&act=man_photo");
	$item = $d->fetch_array();	
}

function save_photo(){
	global $d;
	$file_name=fns_Rand_digit(0,9,15);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=photo_thuonghieu&act=man_photo");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file", 'Jpg|jpg|png|gif|JPG|jpeg|swf', _upload_hinhanh,$file_name)){
				$data['photo'] = $photo;
				$d->setTable('photo');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_hinhanh.$row['photo']);
				}
			}
				$data['ten'] = $_POST['ten'];
				$data['mota'] = $_POST['mota'];
			$data['com'] = 'thuonghieu';		
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$d->reset();
			$d->setTable('photo');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=photo_thuonghieu&act=man_photo");
			redirect("index.php?com=photo_thuonghieu&act=man_photo");
			
	}else{ 			for($i=0; $i<5; $i++){
				if($data['photo'] = upload_image("file".$i, 'Jpg|jpg|png|gif|JPG|jpeg|swf', _upload_hinhanh,$file_name.$i))
					{						
						$data['ten'] = $_POST['ten'.$i];
						$data['com'] = 'thuonghieu';
						$data['mota'] = $_POST['mota'.$i];
						$data['stt'] = $_POST['stt'.$i];
						$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;																	
						$d->setTable('photo');
						if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=photo_thuonghieu&act=man_photo");
					}
			}

			redirect("index.php?com=photo_thuonghieu&act=man_photo");
	}
}

function delete_photo(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo_thuonghieu&act=man_photo");
		$row = $d->fetch_array();
		delete_file(_upload_album.$row['photo']);
		if($d->delete())
			redirect("index.php?com=photo_thuonghieu&act=man_photo");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=photo_thuonghieu&act=man_photo");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select * from #_photo where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_album.$row['photo']);
			}
			$sql = "delete from #_photo where id='".$id."'";
			$d->query($sql);
		}
			
		} redirect("index.php?com=photo_thuonghieu&act=man_photo");} else transfer("Không nhận được dữ liệu", "index.php?com=photo_thuonghieu&act=man_photo");
}
?>