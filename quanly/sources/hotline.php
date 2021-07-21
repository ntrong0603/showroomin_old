<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? mysql_real_escape_string($_REQUEST['act']) : "";

switch($act){
	case "capnhat":
		get_gioithieu();
		$template = "hotline/item_add";
		break;
	case "save":
		save_gioithieu();
		break;
		
	default:
		$template = "index";
}

function get_gioithieu(){
	global $d, $item;

	$sql = "select * from #_hotline limit 0,1";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_gioithieu(){
	global $d;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=hotline&act=capnhat");
		
	$data['ten'] = $_POST['ten'];
	$data['site_title'] = $_POST['site_title'];
	$data['dienthoai'] = $_POST['dienthoai'];
	$data['email'] = $_POST['email'];
	$data['diachi'] = $_POST['diachi'];
	$data['fax'] = $_POST['fax'];
	$data['facebook'] = $_POST['facebook'];
	$data['google'] = $_POST['google'];
	$data['skype'] = $_POST['skype'];
	$data['twitter'] = $_POST['twitter'];
	$data['youtube'] = $_POST['youtube'];
	$data['slogan'] = $_POST['slogan'];
	$data['part1'] = $_POST['part1'];
	$data['part2'] = $_POST['part2'];
	$data['part3'] = $_POST['part3'];
	$data['intagram'] = $_POST['intagram'];
	$data['toado'] = $_POST['toado'];
	$data['website1'] = $_POST['website1'];
	$data['website2'] = $_POST['website2'];
	$data['description'] = mysql_real_escape_string($_POST['description']);
	$d->reset();
	$d->setTable('hotline');
	if($d->update($data))
		transfer("Lưu thành công","index.php?com=hotline&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=hotline&act=capnhat");
}

?>