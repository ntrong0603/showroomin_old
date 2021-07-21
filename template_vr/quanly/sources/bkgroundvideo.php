<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? mysql_real_escape_string($_REQUEST['act']) : "";

switch($act){
	
	case "capnhat":
		get_banner();
		$template = "bkgroundvideo/bkgroundvideo_add";
		break;
	case "save":
		save_banner();
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


function get_banner(){
	global $d, $item;
	$sql = "select * from #_bkground limit 1";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_banner(){
	global $d;
	
	$file_name=$_POST['file'];
	$sql = "select * from #_bkground";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	//echo dump($id);
	if($id){ // cap nhat
		if($ten = upload_image("file", 'mp4|MP4', _upload_video,$file_name)){
			$data['ten'] = $ten;
			$d->setTable('bkground');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_video.$row['ten']);
		}
		$data['mota']=$_POST['mota'];
		//echo dump($id);
		$d->setTable('bkground');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=bkgroundvideo&act=capnhat".$callback);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bkgroundvideo&act=capnhat".$callback);
	}else{ // them moi
		$data['ten'] = upload_image("file".$i, 'mp4|MP4', _upload_video,$file_name);
		if(!$data['ten']) $data['ten']="";
		$data['mota']=$_POST['mota'];
		$d->setTable('bkground');
		if($d->insert($data))
		redirect("index.php?com=bkgroundvideo&act=capnhat".$callback);
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bkgroundvideo&act=capnhat".$callback);
	}	
}
?>