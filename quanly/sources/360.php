<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "360/items";
		break;
	case "add":	
		get_item_kc();	
		$template = "360/item_add";
		break;
	case "edit":		
		get_item();
		$template = "360/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	
	case "man_danhmuc":
		get_danhmucs();
		$template = "360/danhmucs";
		break;
	case "add_danhmuc":		
		$template = "360/danhmuc_add";
		break;
	case "edit_danhmuc":		
		get_danhmuc();
		$template = "360/danhmuc_add";
		break;
	case "save_danhmuc":
		save_danhmuc();
		break;
	case "delete_danhmuc":
		delete_danhmuc();
		break;
	default:
		$template = "index";
}

#====================================
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
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_360hinh where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_360hinh SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_360hinh SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_360hinh";	
	if((int)$_REQUEST['id_sp']!='')
	{
	$sql.=" where id_sp=".(int)$_REQUEST['id_sp']."";
	}
	
	$sql.=" order by stt desc,id_sp,id desc";
	
	
	$d->query($sql);
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=360&act=man&id_sp=".$_GET['id_sp'];
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	$id_sp = isset($_GET['id_sp']) ? themdau($_GET['id_sp']) : "";
	
	$sql = "select * from #_360 where id ='".$id_sp."'";
	$d->query($sql);
	$kichthuot = $d->fetch_array();
	
	
	
	if(!$id)
		transfer("Kh??ng nh???n ???????c d??? li???u", "index.php?com=360&act=man");
	$sql = "select * from #_360hinh where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("D??? li???u kh??ng c?? th???c", "index.php?com=360&act=man");
	$item = $d->fetch_array();	
	$item['rong'] = $kichthuot['rong'];
	$item['cao'] = $kichthuot['cao'];
	
	
}
function get_item_kc(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	$id_sp = isset($_GET['id_sp']) ? themdau($_GET['id_sp']) : "";
	
	$sql = "select * from #_360 where id ='".$id_sp."'";
	$d->query($sql);
	$kichthuot = $d->fetch_array();
	$item['rong'] = $kichthuot['rong'];
	$item['cao'] = $kichthuot['cao'];
	
	
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	
	if(empty($_POST)) transfer("Kh??ng nh???n ???????c d??? li???u", "index.php?com=360&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 500, 300, _upload_hinhanh,$file_name,2);									
			$d->setTable('360');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo']);	
				delete_file(_upload_hinhanh.$row['thumb']);	
							
			}
		}
		$file_name=fns_Rand_digit(0,9,6);
			if($photo = upload_image("file2", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_hinhanh,$file_name)){
			$data['photo2'] = $photo;	
		
		}
		
		$data['id_sp'] = (int)$_POST['id_sp'];
		$sql = "select * from #_360 where id='".(int)$_POST['id_sp']."'";
		$d->query($sql);
		$tenkhongdau = $d->fetch_array();
		$data['com'] = $tenkhongdau['tenkhongdau'];	
		
		$data['ten'] = $_POST['ten'];	
		$data['stt'] = $_POST['stt'];	
		$data['ten_sd'] = $_POST['ten_sd'];
		$data['link'] = $_POST['link'];	
		
		
		$d->setTable('360hinh');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=360&act=man&curPage=".$_REQUEST['curPage']."&id_sp=".$_REQUEST['id_sp']."&id_list=".$_REQUEST['id_list']."&id_cat=".$_REQUEST['id_cat']."&id_item=".$_REQUEST['id_item']."");
		else
			transfer("C???p nh???t d??? li???u b??? l???i", "index.php?com=360&act=man");
	}else{

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_hinhanh,$file_name))
		{
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 500, 300, _upload_hinhanh,$file_name,2);	
		}
		$file_name=fns_Rand_digit(0,9,6);
			if($photo = upload_image("file2", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_hinhanh,$file_name)){
			$data['photo2'] = $photo;	
		
		}
		$data['id_sp'] = (int)$_POST['id_sp'];
		$sql = "select * from #_360 where id='".(int)$_POST['id_sp']."'";
		$d->query($sql);
		$tenkhongdau = $d->fetch_array();
		$data['com'] = $tenkhongdau['tenkhongdau'];	
		$data['stt'] = $_POST['stt'];	
		$data['ten'] = $_POST['ten'];	
		$data['ten_sd'] = $_POST['ten_sd'];
		$data['link'] = $_POST['link'];	
		$d->setTable('360hinh');
		if($d->insert($data))
			redirect("index.php?com=360&act=man");
		else
			transfer("L??u d??? li???u b??? l???i", "index.php?com=360&act=man");
	}
}

function delete_item(){
	global $d;
	if($_REQUEST['id_cat']!='')
	{ $id_catt="&id_cat=".$_REQUEST['id_cat'];
	}
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select * from table_360hinh where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_hinhanh.$row['photo']);
				delete_file(_upload_hinhanh.$row['thumb']);			
			}
		$sql = "delete from #_360hinh where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=360&act=man");
		else
			transfer("X??a d??? li???u b??? l???i", "index.php?com=360&act=man");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select id,thumb, photo from #_360hinh where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_hinhanh.$row['photo']);
				delete_file(_upload_hinhanh.$row['thumb']);
			}
			$sql = "delete from #_360hinh where id='".$id."'";
			$d->query($sql);
		}
			
		} redirect("index.php?com=360&act=man");} else transfer("Kh??ng nh???n ???????c d??? li???u", "index.php?com=360&act=man");
		
}


function get_danhmucs(){
	global $d, $items, $paging;
	$sql = "select * from #_360";
	
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=360&act=man_danhmuc";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_danhmuc(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Kh??ng nh???n ???????c d??? li???u", "index.php?com=360&act=man_danhmuc");
	
	$sql = "select * from #_360 where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("D??? li???u kh??ng c?? th???c", "index.php?com=360&act=man_danhmuc");
	$item = $d->fetch_array();	
}

function save_danhmuc(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	if(empty($_POST)) transfer("Kh??ng nh???n ???????c d??? li???u", "index.php?com=360&act=man_danhmuc");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$id =  themdau($_POST['id']);
		
		
		$data['ten'] = $_POST['ten'];
		$data['ten_sd'] = $_POST['ten_sd'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['cao'] = $_POST['cao'];
		$data['rong'] = $_POST['rong'];
		
		
		
		$d->setTable('360');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=360&act=man_danhmuc&curPage=".$_REQUEST['curPage']."");
		else
			transfer("C???p nh???t d??? li???u b??? l???i", "index.php?com=360&act=man_danhmuc");
	}else{			
		  
		$data['ten'] = $_POST['ten'];
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['cao'] = $_POST['cao'];
		$data['rong'] = $_POST['rong'];
		
		$d->setTable('360');
		if($d->insert($data))
			redirect("index.php?com=360&act=man_danhmuc");
		else
			transfer("L??u d??? li???u b??? l???i", "index.php?com=360&act=man_danhmuc");
	}
}

function delete_danhmuc(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
			//X??a danh m???c c???p 1
			$sql = "delete from #_360 where id='".$id."'";
			$d->query($sql);
			
			//X??a s???n ph???m thu???c lo???i ????			
			$sql = "select id,thumb,photo from #_360 where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
				$data['id_danhmuc'] = 0;
				$d->setTable('360');
				$d->setWhere('id_danhmuc', $id);
				$d->update($data);
			}
		
		
		if($d->query($sql))
			redirect("index.php?com=360&act=man_danhmuc");
		else
			transfer("X??a d??? li???u b??? l???i", "index.php?com=360&act=man_danhmuc");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_360_danhmuc where id='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_360_list where id_danhmuc='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_360_cat where id_danhmuc='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_360_item where id_danhmuc='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_360 where id_danhmuc='".$id."'";
				$d->query($sql);
			
		} redirect("index.php?com=360&act=man_danhmuc");} else transfer("Kh??ng nh???n ???????c d??? li???u", "index.php?com=360&act=man_danhmuc"	    );
}
?>


