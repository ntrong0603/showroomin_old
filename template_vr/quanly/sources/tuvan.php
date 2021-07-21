<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$urldanhmuc ="";
$urldanhmuc.= (isset($_REQUEST['id_cat'])) ? "&id_cat=".addslashes($_REQUEST['id_cat']) : "";
$urldanhmuc.= (isset($_REQUEST['id_item'])) ? "&id_item=".addslashes($_REQUEST['id_item']) : "";

$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "tuvan/items";
		break;
	case "add":		
		$template = "tuvan/item_add";
		break;
	case "edit":		
		get_item();
		$template = "tuvan/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	#===================================================	
	case "man_item":
		get_loais();
		$template = "tuvan/loais";
		break;
	case "add_item":		
		$template = "tuvan/loai_add";
		break;
	case "edit_item":		
		get_loai();
		$template = "tuvan/loai_add";
		break;
	case "save_item":
		save_loai();
		break;
	case "delete_item":
		delete_loai();
		break;
		
	#===================================================	
	case "man_cat":
		get_cats();
		$template = "tuvan/cats";
		break;
	case "add_cat":		
		$template = "tuvan/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "tuvan/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
	#===================================================	
	case "man_list":
		get_lists();
		$template = "tuvan/lists";
		break;
	case "add_list":		
		$template = "tuvan/list_add";
		break;
	case "edit_list":		
		get_list();
		$template = "tuvan/list_add";
		break;
	case "save_list":
		save_list();
		break;
	case "delete_list":
		delete_list();
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
	global $d, $items, $paging,$urldanhmuc;
	#----------------------------------------------------------------------------------------
	if($_REQUEST['spdc']!='')
	{
	$id_up = $_REQUEST['spdc'];
	$spdc=time();
	$sql_sp = "SELECT id,spdc FROM table_ndcactuvan where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spdc1=$cats[0]['spdc'];
	if($spdc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_ndcactuvan SET spdc ='".$spdc."' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_ndcactuvan SET spdc =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_ndcactuvan where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$time=time();
	$hienthi=$cats[0]['noibat'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_ndcactuvan SET noibat ='$time' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_ndcactuvan SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_ndcactuvan where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_ndcactuvan SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_ndcactuvan SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_ndcactuvan";	
	if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" where  	id_list=".$_REQUEST['id_list']."";
	}
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where   id_cat=".$_REQUEST['id_cat']."";
	}
	if((int)$_REQUEST['id_item']!='')
	{
	$sql.="where    id_item=".$_REQUEST['id_item']."";
	}
	
	if($_REQUEST['keyword']!='')
	{
	$keyword=addslashes($_REQUEST['keyword']);
	$sql.=" where ten LIKE '%$keyword%'";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=place&act=man".$urldanhmuc;
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
	
}

function get_item(){
	global $d, $item,$ds_tags;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=tuvan&act=man");	
	$sql = "select * from #_ndcactuvan where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tuvan&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=tuvan&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_tuvan,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 210, 170, _upload_tuvan,$file_name,1);		
			$d->setTable('ndcactuvan');
			$d->setWhere('id',$id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tuvan.$row['photo']);	
				delete_file(_upload_tuvan.$row['thumb']);				
			}
		}					 	
		
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['ten'] = $_POST['ten'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['mota'] = $_POST['mota'];			
		$data['noidung'] = $_POST['noidung'];									
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('ndcactuvan');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=tuvan&act=man&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tuvan&act=man");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_tuvan,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 210, 170, _upload_tuvan,$file_name,1);		
		}		
		
		
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['ten'] = $_POST['ten'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['mota'] = $_POST['mota'];	
		$data['noidung'] = $_POST['noidung'];			
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('ndcactuvan');
		if($d->insert($data))
		{			
			redirect("index.php?com=tuvan&act=man");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=tuvan&act=man");
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
		$sql = "select id,thumb, photo from #_ndcactuvan where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_danhmuc.$row['photo']);
				delete_file(_upload_danhmuc.$row['thumb']);			
			}
		$sql = "delete from #_ndcactuvan where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=tuvan&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=tuvan&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=tuvan&act=man");
}

#====================================
function get_cats(){
	global $d, $items, $paging;
	
	$sql = "select * from #_place_cat";
		
	if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" where id_list=".$_REQUEST['id_list']."";
	}
	$sql.=" order by stt";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=place&act=man_cat";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=place&act=man_cat");
	
	$sql = "select * from #_place_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=place&act=man_cat");
	$item = $d->fetch_array();
}

function save_cat(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=place&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);		
		$data['id_list'] = $_POST['id_list'];			
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('place_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=place&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=place&act=man_cat");
	}else{		
		$data['id_list'] = $_POST['id_list'];
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('place_cat');
		if($d->insert($data))
			redirect("index.php?com=place&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=place&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_place_cat where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=place&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=place&act=man_cat");
	}else transfer("Không nhận được dữ liệu", "index.php?com=place&act=man_cat");
}
/*---------------------------------*/
function get_loais(){
	global $d, $items, $paging;
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_place_item where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_place_item SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_place_item SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_place_item";
		
	if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" where id_list=".$_REQUEST['id_list']."";
	}
	$sql.=" order by stt";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=place&act=man_item";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_loai(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=place&act=man_item");
	
	$sql = "select * from #_place_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=place&act=man_item");
	$item = $d->fetch_array();
}

function save_loai(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=place&act=man_item");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);		
		$data['id_list'] = $_POST['id_list'];	
		$data['id_cat']= $_POST['id_cat'];			
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('place_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=place&act=man_item&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=place&act=man_item");
	}else{		
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat']= $_POST['id_cat'];	
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('place_item');
		if($d->insert($data))
			redirect("index.php?com=place&act=man_item");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=place&act=man_item");
	}
}

function delete_loai(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_place_item where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=place&act=man_item");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=place&act=man_item");
	}else transfer("Không nhận được dữ liệu", "index.php?com=place&act=man_item");
}
/*---------------------------------*/
function get_lists(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_place_list where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_place_list SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_place_list SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_place_list";			
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=place&act=man_list";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_list(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=place&act=man_list");	
	$sql = "select * from #_place_list where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=place&act=man_list");
	$item = $d->fetch_array();	
}

function save_list(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=place&act=man_list");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){					
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('place_list');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=place&act=man_list&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=place&act=man_list");
	}else{				
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('place_list');
		if($d->insert($data))
			redirect("index.php?com=place&act=man_list");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=place&act=man_list");
	}
}

function delete_list(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_place_list where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=place&act=man_list");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=place&act=man_list");
	}else transfer("Không nhận được dữ liệu", "index.php?com=place&act=man_list");
}
?>