<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man_photo":
		get_photos();
		$template = "hinhqc_danhmuc/photos";
		break;
	case "add_photo":
		get_photos2();		
		$template = "hinhqc_danhmuc/photo_add";
		break;
	case "edit_photo":
		get_photo();
		$template = "hinhqc_danhmuc/photo_edit";
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
	global $d, $items, $paging,$id_cate;
	$id_cate=$_REQUEST['id_cate'];
	$d->setTable('hinhdanhmucqc');
	$d->setOrder('stt,id desc');
	$d->setWhere('id_cate', $id_cate);
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=hinhqc_danhmuc&act=man_photo";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}
function get_photos2(){
	global $d, $items, $paging,$id_cate;
	$id_cate=$_REQUEST['id_cate'];
	$d->setTable('hinhdanhmucqc');
	$d->setOrder('stt,id desc');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=hinhqc_danhmuc&act=man_photo";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}

function get_photo(){
	global $d, $item, $list_cat,$id_cate;
	$id_cate=$_REQUEST['id_cate'];
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=hinhqc_danhmuc&act=man_photo&id_cate=$id_cate");
	$d->setTable('hinhdanhmucqc');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=hinhqc_danhmuc&act=man_photo&id_cate=$id_cate");
	$item = $d->fetch_array();	
}


function save_photo(){
	global $d,$id_cate;
	$id_cate=$_REQUEST['id_cate'];
	$file_name=fns_Rand_digit(0,9,15);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=hinhqc_danhmuc&act=man_photo&id_cate=$id_cate");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_hinh_cungsp,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 200, 200, _upload_hinh_cungsp,$file_name,1);		
			$d->setTable('hinhdanhmucqc');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinh_cungsp.$row['photo']);	
				delete_file(_upload_hinh_cungsp.$row['thumb']);				
			}
		}
		$data['stt'] = $_POST['stt'];
		$data['link'] = $_POST['link'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$d->setTable('hinhdanhmucqc');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=hinhqc_danhmuc&act=man_photo&id_cate=$id_cate&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=hinhqc_danhmuc&act=man_photo&id_cate=$id_cate");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_hinh_cungsp,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 200, 200, _upload_hinh_cungsp,$file_name);		
		}
		$data['stt'] = $_POST['stt'];	
		$data['link'] = $_POST['link'];
		$data['id_cate'] = $id_cate;							
		$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;	
		$d->setTable('hinhdanhmucqc');
		if($d->insert($data))
		{			
			redirect("index.php?com=hinhqc_danhmuc&act=man_photo&id_cate=$id_cate");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=hinhqc_danhmuc&act=man_photo&id_cate=$id_cate");
	}
}


function delete_photo(){
	global $d,$id_cate;
	$id_cate=$_REQUEST['id_cate'];
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('hinhdanhmucqc');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=hinhqc_danhmuc&act=man_photo&id_cate=$id_cate");
		$row = $d->fetch_array();
		delete_file(_upload_hinh_cungsp.$row['photo']);
		delete_file(_upload_hinh_cungsp.$row['thumb']);
		if($d->delete())
			redirect("index.php?com=hinhqc_danhmuc&act=man_photo&id_cate=$id_cate");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=hinhqc_danhmuc&act=man_photo&id_cate=$id_cate");
	}else transfer("Không nhận được dữ liệu", "index.php?com=hinhqc_danhmuc&act=man_photo&id_cate=$id_cate");
}

#====================================



?>

	
