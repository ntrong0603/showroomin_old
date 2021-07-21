<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "capnhat":
		get_gioithieu();
		$template = "setting/item_add";
		break;
	case "save":
		save_gioithieu();
		break;
		
	default:
		$template = "index";
}

function get_gioithieu(){
	global $d, $item;

	$sql = "select * from #_setting limit 0,1";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_gioithieu(){
	global $d;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=setting&act=capnhat");
		
	$data['title'] = $_POST['title'];
	$data['keywords'] = $_POST['keywords'];
	$data['description'] = $_POST['description'];
    $data['abstract'] = $_POST['abstract'];
	$data['description_gg'] = $_POST['description_gg'];
	$data['hotline'] = $_POST['hotline'];
	
	$data['ten_vi'] = $_POST['ten_vi'];
	$data['ten_en'] = $_POST['ten_en'];
	
	$data['dienthoai'] = $_POST['dienthoai'];
	
	$data['diachi_hanoi'] = $_POST['diachi_hanoi'];
	$data['diachi_hcm'] = $_POST['diachi_hcm'];
	
	$data['toado'] = $_POST['toado'];
	$data['email'] = $_POST['email'];
	$data['passmail'] = $_POST['passmail'];
	$data['slogan'] = $_POST['slogan'];
	
	$data['yahoo'] = $_POST['yahoo'];
	$data['facebook'] = $_POST['facebook'];
	$data['google_plus'] = $_POST['google_plus'];
	
	$d->reset();
	$d->setTable('setting');
	if($d->update($data))
		header("Location:index.php?com=setting&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=setting&act=capnhat");
}

?>