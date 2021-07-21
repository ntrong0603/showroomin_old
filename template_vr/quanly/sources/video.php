<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "video/items";
		break;
	case "add":
		$template = "video/item_add";
		break;
	case "edit":
		get_item();
		$template = "video/item_add";
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
	
	if(@$_REQUEST['update']!='')
	{
	$id_up = @$_REQUEST['update'];
	
	$tinnoibat=time();
	
	$sql_sp = "SELECT id,tinnoibat FROM table_video where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spdc1=$cats[0]['tinnoibat'];
	//echo "id:". $spdc1;
	if($spdc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_video SET tinnoibat ='".$tinnoibat."' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_video SET tinnoibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	
	if(@$_REQUEST['hienthi']!='')
	{
	$id_up = @$_REQUEST['hienthi'];
	
	
	$sql_sp = "SELECT id,hienthi FROM table_video where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	//echo "id:". $spdc1;
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_video SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_video SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	
	
	
	$sql = "select * from #_video order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=video&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=video&act=man");
	
	$sql = "select * from #_video where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=video&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	$file_video=fns_Rand_digit(0,9,5);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=video&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_video,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 220, 160, _upload_video,$file_name,2);		
			$d->setTable('place');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_video.$row['photo']);	
				delete_file(_upload_video.$row['thumb']);				
			}
		}					 
		
		// du lieu
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['url'] = $_POST['url'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('video');
		$d->setWhere('id', $id);
		if($d->update($data))
				header("Location:index.php?com=video&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=video&act=man");
	}else{
		
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_video,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'],  220, 160, _upload_video,$file_name,2);		
		}	
		
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['url'] = $_POST['url'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('video');
		if($d->insert($data))
			header("Location:index.php?com=video&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=video&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		// xoa hinh anh
		$d->reset();
		$sql = "select id from #_video where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_video.$row['photo']);
				delete_file(_upload_video.$row['thumb']);
			}
			$sql = "delete from #_video where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			header("Location:index.php?com=video&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=video&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=video&act=man");
}
?>

	
