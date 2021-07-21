<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){
	case "capnhat":
		// print_r('capnhat');die();
		get_gioithieu();
		$template = "choosestyle/item_add";
		break;
	case "save":
		save_gioithieu();
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

function get_gioithieu(){
	global $d, $item;

	$sql = "select * from #_style limit 0,1";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
	// print_r($item);
}

function save_gioithieu(){
	global $d;
	$file_name=fns_Rand_digit(0,9,5);
	if(empty($_POST)) 
		transfer("Không nhận được dữ liệu", "index.php?com=choosestyle&act=capnhat");
	if($photo = upload_image("file", 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name)){
		// print_r('phto');
		$data['photo'] = $photo;
		$d->setTable('style');
		$d->setWhere('id',1);
		$d->select();
		if($d->num_rows()>0){
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['photo']);
		}
	}
	// $data['photo'] = $photo;
	$data['maubg'] = $_POST['maubg'];
	$data['bg'] = isset($_POST['bg']) ? 1 : 0;
	
	$d->reset();
	$d->setTable('style');
	$d->setWhere('id',1);

	if($d->update($data)){
		// print_r($d);die();
		transfer("Dữ liệu được cập nhật", "index.php?com=choosestyle&act=capnhat");
	}
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=choosestyle&act=capnhat");
}

?>