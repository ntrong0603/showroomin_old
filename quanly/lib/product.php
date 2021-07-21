<?php	if(!defined('_source')) die("Error");

	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$urldanhmuc ="";
	$urldanhmuc.= (isset($_REQUEST['id_list'])) ? "&id_list=".addslashes($_REQUEST['id_list']) : "";
	$urldanhmuc.= (isset($_REQUEST['id_cat'])) ? "&id_cat=".addslashes($_REQUEST['id_cat']) : "";
	$urldanhmuc.= (isset($_REQUEST['id_item'])) ? "&id_item=".addslashes($_REQUEST['id_item']) : "";

	$id=$_REQUEST['id'];
	
switch($act){
	case "man":
		get_items();
		$template = "place/items";
		break;
	case "add":		
		$template = "place/item_add";
		break;
	case "edit":		
		get_item();
		$template = "place/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;

	#==================== List 0 ===============================	
	case "man_list0":
		get_lists0();
		$template = "place/cap1/lists";
		break;
	case "add_list0":		
		$template = "place/cap1/list_add";
		break;
	case "edit_list0":		
		get_list0();
		$template = "place/cap1/list_add";
		break;
	case "save_list0":
		save_list0();
		break;
	case "delete_list0":
		delete_list0();
		break;
		
	#===================================================	
	case "man_list":
		get_lists();
		$template = "place/lists";
		break;
	case "add_list":		
		$template = "place/list_add";
		break;
	case "edit_list":		
		get_list();
		$template = "place/list_add";
		break;
	case "save_list":
		save_list();
		break;
	case "delete_list":
		delete_list();
		break;
		
	#===================================================	
	case "man_cat":
		get_groups();
		$template = "place/groups";
		break;
	case "add_cat":		
		$template = "place/group_add";
		break;
	case "edit_cat":		
		get_group();
		$template = "place/group_add";
		break;
	case "save_cat":
		save_group();
		break;
	case "delete_cat":
		delete_group();
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
	$sql_sp = "SELECT id,spdc FROM table_place where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spdc1=$cats[0]['spdc'];
	if($spdc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_place SET spdc ='".$spdc."' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_place SET spdc =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#--------------------------------------------san pham noi bat--------------------------------------------
	if($_REQUEST['noibat']!='')
	{
		$id_up = $_REQUEST['noibat'];
		$sql_sp = "SELECT id,noibat FROM table_place where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$noibat=$cats[0]['noibat'];
		if($noibat==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_place SET noibat =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_place SET noibat =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
	}
	#-------------------------------------------------------------------------------
	#--------------------------------------------san pham thiet ke--------------------------------------------
	if($_REQUEST['thietke']!='')
	{
		$id_tk = $_REQUEST['thietke'];
		$sql_sp = "SELECT id,thietke FROM table_place where id='".$id_tk."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$thietke=$cats[0]['thietke'];
		if($thietke==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_place SET thietke =1 WHERE  id = ".$id_tk."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_place SET thietke =0  WHERE  id = ".$id_tk."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
	}
	#---------------------------------------------hien thi san pham-------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_place where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_place SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_place SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_place";	
	if((int)$_REQUEST['id_list_l']!='')
	{
	$sql.=" where  	id_list_l=".$_REQUEST['id_list_l']."";
	}
	
	if((int)$_REQUEST['id_list_l']!='')
	{
		if((int)$_REQUEST['id_list']!='')
		{
		$sql.=" and	id_list=".$_REQUEST['id_list']."";
		}
	}
	else if((int)$_REQUEST['id_list_l']==0){
		if((int)$_REQUEST['id_list']!='')
			{
			$sql.=" where	id_list=".$_REQUEST['id_list']."";
			}
	}
	
	
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" and	id_cat=".$_REQUEST['id_cat']."";
	}
	if((int)$_REQUEST['id_item']!='')
	{
	$sql.=" and	id_item=".$_REQUEST['id_item']."";
	}
	if((int)$_REQUEST['id_group']!='')
	{
		if((int)$_REQUEST['id_list']==''){
			$sql.=" where id_group=".$_REQUEST['id_group']."";
		}
		else
			$sql.=" and	id_group=".$_REQUEST['id_group']."";
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
		transfer("Không nhận được dữ liệu", "index.php?com=place&act=man");	
	$sql = "select * from #_place where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=place&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=place&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 730, 392, _upload_sanpham,$file_name,1);		
			$d->setTable('place');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);	
				delete_file(_upload_sanpham.$row['thumb']);				
			}
		}					 	
		$data['id_list_l'] = (int)$_POST['id_list_l'];
		$data['id_list'] = (int)$_POST['id_list'];
		$data['id_group'] = (int)$_POST['id_group'];
		
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['id_item'] = (int)$_POST['id_item'];		
		$data['ten_vi'] = $_POST['ten_vi'];	
		$data['ten_en'] = $_POST['ten_en'];	
		$data['masp'] = $_POST['masp'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	
		
		$data['gia'] = (int)$_POST['gia'];					
		
		$data['mota_vi'] = $_POST['mota_vi'];	
		$data['mota_en'] = $_POST['mota_en'];	
		
		$data['thongso'] = $_POST['thongso'];		
		$data['noidung_vi'] = $_POST['noidung_vi'];	
		$data['noidung_en'] = $_POST['noidung_en'];									
		$data['stt'] = $_POST['stt'];
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['thietke'] = isset($_POST['thietke']) ? 1 : 0;
		
		$data['ngaysua'] = time();
		$d->setTable('place');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=place&act=man&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=place&act=man");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 800, 324, _upload_sanpham,$file_name,1);		
		}	
		
		$data['id_group'] = $_POST['id_group'];
		
		$data['id_list_l'] = (int)$_POST['id_list_l'];
		$data['id_list']= $_POST['id_list'];
		
		$data['ten_vi'] = $_POST['ten_vi'];	
		$data['ten_en'] = $_POST['ten_en'];	
		$data['masp'] = $_POST['masp'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	
		
		$data['gia'] = (int)$_POST['gia'];			
		$data['mota_vi'] = $_POST['mota_vi'];	
		$data['mota_en'] = $_POST['mota_en'];	
		$data['thongso'] = $_POST['thongso'];		
		$data['noidung_vi'] = $_POST['noidung_vi'];	
		$data['noidung_en'] = $_POST['noidung_en'];					
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['thietke'] = isset($_POST['thietke']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('place');
		if($d->insert($data))
		{			
			redirect("index.php?com=place&act=man");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=place&act=man");
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
		$sql = "select id,thumb, photo from #_place where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);			
			}
		$sql = "delete from #_place where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=place&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=place&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=place&act=man");
}

/*--------------cap 0------------------*/
function get_lists0(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_place_list0 where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_place_list0 SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_place_list0 SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_place_list0";			
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

function get_list0(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=place&act=man_list0");	
	$sql = "select * from #_place_list0 where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=place&act=man_list0");
	$item = $d->fetch_array();	
}

function save_list0(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=place&act=man_list0");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		if($photo = upload_image("file", 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
				$data['photo'] = $photo;
				$d->setTable('place_list0');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);
				}
			}
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']).'-1';
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('place_list0');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=place&act=man_list0&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=place&act=man_list0");
	}else{				
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']).'-1';
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('place_list0');
		if($d->insert($data))
			redirect("index.php?com=place&act=man_list0");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=place&act=man_list0");
	}
}

function delete_list0(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_place_list0 where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=place&act=man_list0");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=place&act=man_list0");
	}else transfer("Không nhận được dữ liệu", "index.php?com=place&act=man_list0");
}



/*----------------cap 2-----------------*/
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
	if((int)$_REQUEST['id_list']!='')
		{
			$sql.=" where id_list=".$_REQUEST['id_list']."";
		}	
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
		if($photo = upload_image("file", 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
				$data['photo'] = $photo;
				$d->setTable('place_list');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);
				}
			}
		$data['id_list'] = $_POST['id_list'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
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
		$data['id_list'] = $_POST['id_list'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
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


//----------------------Ground-----------------------

function get_groups(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_place_group where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_place_group SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_place_group SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	$sql = "select * from #_place_group";	
	if((int)$_REQUEST['id_list']!='')
	{
		$sql.=" where id_list=".$_REQUEST['id_list']."";
	}
			
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=place&act=man_cat";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
	
}

function get_group(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=place&act=man_cat");	
	$sql = "select * from #_place_group where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=place&act=man_cat");
	$item = $d->fetch_array();	
}

function save_group(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=place&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$data['id_list_l']= $_POST['id_list_l'];
		$data['id_list']= $_POST['id_list'];
		//$data['id_group']= $_POST['id_group'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('place_group');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=place&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=place&act=man_cat");
	}else{
		$data['id_list_l']= $_POST['id_list_l'];
		$data['id_list']= $_POST['id_list'];
		//$data['id_group']= $_POST['id_group'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('place_group');
		if($d->insert($data))
			redirect("index.php?com=place&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=place&act=man_cat");
	}
}

function delete_group(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_place_group where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=place&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=place&act=man_cat");
	}else transfer("Không nhận được dữ liệu", "index.php?com=place&act=man_cat");
}

?>