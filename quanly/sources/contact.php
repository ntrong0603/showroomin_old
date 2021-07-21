<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "contact/items";
		break;
	case "add":
		$template = "contact/item_add";
		break;
	case "edit":
		get_item();
		$template = "contact/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;

	default:
		$template = "index";
}



function get_items(){
	global $d, $items, $paging;
	$sql = "select * from #_contact order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=contact&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=contact&act=man");
	
	$sql = "select * from #_contact where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=contact&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=contact&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		$data['ten'] = $_POST['ten'];
		$data['mota'] = $_POST['mota'];
		$data['noidung'] = $_POST['noidung'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('contact');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=contact&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=contact&act=man");
	}else{
		
		$data['ten'] = $_POST['ten'];
		$data['mota'] = $_POST['mota'];
		$data['noidung'] = $_POST['noidung'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('contact');
		if($d->insert($data))
			redirect("index.php?com=contact&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=contact&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "delete from #_contact where id='".$id."'";
		$d->query($sql);
		
		if($d->query($sql))
			redirect("index.php?com=contact&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=contact&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=contact&act=man");
}
?>

	
