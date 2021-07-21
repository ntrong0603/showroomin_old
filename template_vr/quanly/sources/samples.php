<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "samples/items";
		break;
	case "add":		
		
		
		$template = "samples/item_add";
		break;
	case "edit":		
		get_item();
		
		
		$template = "samples/item_add";
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
		$template = "samples/loais";
		break;
	case "add_item":		
		$template = "samples/loai_add";
		break;
	case "edit_item":		
		get_loai();
		$template = "samples/loai_add";
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
		$template = "samples/cats";
		break;
	case "add_cat":		
		$template = "samples/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "samples/cat_add";
		break;
	case "chuyencap_cat":				
		$template = "samples/cat_chuyencap";
		break;
	case "save_chuyencap_cat":				
		chuyencap_cat();
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
		$template = "samples/lists";
		break;
	case "add_list":		
		$template = "samples/list_add";
		break;
	case "edit_list":		
		get_list();
		$template = "samples/list_add";
		break;
	case "chuyencap_list":		
		$template = "samples/list_chuyencap";
		break;
	case "save_chuyencap_list":		
		chuyencap_list();
		break;
	case "save_list":
		save_list();
		break;
	case "delete_list":
		delete_list();
		break;
	default:
		$template = "index";
		
		#===================================================	
	case "man_danhmuc":
		get_danhmucs();
		$template = "samples/danhmucs";
		break;
	case "add_danhmuc":		
		$template = "samples/danhmuc_add";
		break;
	case "edit_danhmuc":		
		get_danhmuc();
		$template = "samples/danhmuc_add";
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
	if($_REQUEST['hot']!='')
	{
	$id_up = $_REQUEST['hot'];
	$sql_sp = "SELECT id,hot FROM table_samples where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$time=time();
	$hienthi=$cats[0]['hot'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples SET hot ='$time' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples SET hot =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['spbanchay']!='')
	{
	$id_up = $_REQUEST['spbanchay'];
	$sql_sp = "SELECT id,spbanchay FROM table_samples where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spbanchay=$cats[0]['spbanchay'];
	if($spbanchay==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples SET spbanchay =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples SET spbanchay =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['spphathanh']!='')
	{
	$id_up = $_REQUEST['spphathanh'];
	$sql_sp = "SELECT id,spphathanh FROM table_samples where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spbanchay=$cats[0]['spphathanh'];
	if($spbanchay==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples SET spphathanh =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples SET spphathanh =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_samples where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$noibat=$cats[0]['noibat'];
	if($noibat==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples SET noibat =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['spmoi']!='')
	{
	$id_up = $_REQUEST['spmoi'];
	$sql_sp = "SELECT id,spmoi FROM table_samples where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spmoi=$cats[0]['spmoi'];
	if($spmoi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples SET spmoi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples SET spmoi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_samples where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_samples";	
	if((int)$_REQUEST['id_danhmuc']!='')
	{
	$sql.=" where id_danhmuc=".(int)$_REQUEST['id_danhmuc']."";
	}
	if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" and id_list=".(int)$_REQUEST['id_list']."";
	}
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" and id_cat=".(int)$_REQUEST['id_cat']."";
	}
	if((int)$_REQUEST['id_item']!='')
	{
	$sql.=" and id_item=".(int)$_REQUEST['id_item']."";
	}
	$sql.=" order by id_danhmuc,id_list,id_cat,id_item,stt,id desc";
	
	
	$d->query($sql);
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=samples&act=man&id_danhmuc=".$_GET['id_danhmuc']."&id_list=".$_GET['id_list']."&id_cat=".$_GET['id_cat']."&id_item=".$_GET['id_item'];
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=samples&act=man");
	
	$sql = "select * from #_samples where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=samples&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=samples&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 400, 400, _upload_sanpham,$file_name,2);									
			$d->setTable('samples');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);	
				delete_file(_upload_sanpham.$row['thumb']);	
							
			}
		}
		
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		
		
		$data['id_list'] = (int)$_POST['id_list'];	
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['id_item'] = (int)$_POST['id_item'];		
		$data['ten'] = $_POST['ten'];	
		$data['tag'] = $_POST['tag'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['keyword'] = $_POST['keyword'];
		$data['description'] = $_POST['description'];
		$data['maso'] = $_POST['maso'];			
		$data['gia'] = $_POST['gia'];
		$data['giacu'] = $_POST['giacu'];
		$data['nhasanxuat'] = $_POST['id_tacgia'];
		$data['dotuoi'] = $_POST['dotuoi'];
		$data['chatlieu'] = $_POST['chatlieu'];
		$data['trongluong'] = $_POST['trongluong'];
		$data['kichthuoc'] = $_POST['kichthuoc'];
		$data['nhaxuatban'] = $_POST['id_nhaphathanh'];
		$data['ngayxuatban'] = $_POST['ngayxuatban'];
		$data['noidung'] = $_POST['noidung'];
		$data['mota'] = $_POST['mota'];
						
		$data['stt'] = $_POST['stt'];
		$data['sttspmoi'] = $_POST['sttspmoi'];
		$data['sttspbanchay'] = $_POST['sttspbanchay'];
		$data['sttnoibat'] = $_POST['sttnoibat'];
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['spmoi'] = isset($_POST['spmoi']) ? 1 : 0;
		$data['spbanchay'] = isset($_POST['spbanchay']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('samples');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=samples&act=man&curPage=".$_REQUEST['curPage']."&id_danhmuc=".$_REQUEST['id_danhmuc']."&id_list=".$_REQUEST['id_list']."&id_cat=".$_REQUEST['id_cat']."&id_item=".$_REQUEST['id_item']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=samples&act=man");
	}else{

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name))
		{
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 400, _upload_sanpham,$file_name,2);	
		}
		$data['mota'] = $_POST['mota'];
		$data['dotuoi'] = $_POST['dotuoi'];
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['id_list'] = (int)$_POST['id_list'];
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['id_item'] = (int)$_POST['id_item'];		
		$data['ten'] = $_POST['ten'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['keyword'] = $_POST['keyword'];
		$data['description'] = $_POST['description'];
		$data['maso'] = $_POST['maso'];			
		$data['gia'] = $_POST['gia'];	
		$data['tag'] = $_POST['tag'];
		$data['giacu'] = $_POST['giacu'];
		$data['noidung'] = $_POST['noidung'];		
		$data['nhasanxuat'] = $_POST['id_tacgia'];
		$data['chatlieu'] = $_POST['chatlieu'];
		$data['trongluong'] = $_POST['trongluong'];
		$data['kichthuoc'] = $_POST['kichthuoc'];
		$data['nhaxuatban'] = $_POST['id_nhaphathanh'];
		$data['ngayxuatban'] = $_POST['ngayxuatban'];
		$data['noidung'] = $_POST['noidung'];
		$data['stt'] = $_POST['stt'];
		$data['sttspmoi'] = $_POST['sttspmoi'];
		$data['sttspbanchay'] = $_POST['sttspbanchay'];
		$data['sttnoibat'] = $_POST['sttnoibat'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['spmoi'] = isset($_POST['spmoi']) ? 1 : 0;
		$data['spbanchay'] = isset($_POST['spbanchay']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		
		
		$d->setTable('samples');
		if($d->insert($data))
			redirect("index.php?com=samples&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=samples&act=man");
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
		$sql = "select id,thumb, photo from #_samples where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);			
			}
		$sql = "delete from #_samples where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=samples&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=samples&act=man");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select id,thumb, photo from #_samples where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
			$sql = "delete from #_samples where id='".$id."'";
			$d->query($sql);
		}
			
		} redirect("index.php?com=samples&act=man");} else transfer("Không nhận được dữ liệu", "index.php?com=samples&act=man");
		
}

#====================================

function get_loais(){
	global $d, $items, $paging;
	
	$sql = "select * from #_samples_item";
	if((int)$_REQUEST['id_danhmuc']!='')
	{
	$sql.=" where id_danhmuc=".$_REQUEST['id_danhmuc']."";
	}
	if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" and id_list=".$_REQUEST['id_list']."";
	}
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" and id_cat=".$_REQUEST['id_cat']."";
	}
	$sql.=" order by stt";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=samples&act=man_item&id_danhmuc=".$_GET['id_danhmuc']."&id_list=".$_GET['id_list']."&id_cat=".$_GET['id_cat'];
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_loai(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=samples&act=man_item");
	
	$sql = "select * from #_samples_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=samples&act=man_item");
	$item = $d->fetch_array();
}

function save_loai(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=samples&act=man_item");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){	
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;		
			$d->setTable('samples_item');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);	
				delete_file(_upload_sanpham.$row['thumb']);				
			}
		}
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];	
		$data['id_cat'] = $_POST['id_cat'];			
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('samples_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=samples&act=man_item&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=samples&act=man_item");
	}else{		
		 if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;			
		}
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat'] = $_POST['id_cat'];
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('samples_item');
		if($d->insert($data))
			redirect("index.php?com=samples&act=man_item");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=samples&act=man_item");
	}
}

function delete_loai(){
	global $d;
	if(isset($_GET['id']))
	{
		$id =  themdau($_GET['id']);		
		$d->reset();		
			//Xóa danh mục cấp 4
			$sql = "delete from #_samples_item where id='".$id."'";
			$d->query($sql);
			//Xóa sản phẩm thuộc loại đó
			$sql = "select id,thumb,photo from #_samples where id_item='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
				$sql = "delete from #_samples where id_item='".$id."'";
				$d->query($sql);
			}
			
		
		
		if($d->query($sql))
			redirect("index.php?com=samples&act=man_item");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=samples&act=man_item");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_samples_item where id='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_samples where id_item='".$id."'";
				$d->query($sql);
			
		} redirect("index.php?com=samples&act=man_item");} else transfer("Không nhận được dữ liệu", "index.php?com=samples&act=man_item");
}
/*---------------------------------*/
function get_cats(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_samples_cat where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples_cat SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples_cat SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_samples_cat";	
	if((int)$_REQUEST['id_danhmuc']!='')
	{
	$sql.=" where id_danhmuc=".(int)$_REQUEST['id_danhmuc']."";
	}
	if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" and id_list=".(int)$_REQUEST['id_list']."";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=samples&act=man_cat&id_danhmuc=".$_GET['id_danhmuc']."&id_list=".$_GET['id_list'];
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=samples&act=man_cat");
	
	$sql = "select * from #_samples_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=samples&act=man_cat");
	$item = $d->fetch_array();	
}

function save_cat(){
	global $d;
	$file_name=$_FILES['file']['name'];
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=samples&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){	
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;	
					
			$d->setTable('samples_cat');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);	
				delete_file(_upload_sanpham.$row['thumb']);				
			}
		}
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('samples_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=samples&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=samples&act=man_cat");
	}else{				
		 if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;		
				
		}
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('samples_cat');
		if($d->insert($data))
			redirect("index.php?com=samples&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=samples&act=man_cat");
	}
}

function chuyencap_cat(){	
	global $d;
	$d->reset();
	$capchuyen = $_REQUEST['capchuyen'];
	$id_cat = $_REQUEST['id_cat'];
	if($id_cat == 0)
	{
		transfer("Bạn chưa chọn danh mục cần chuyển", "index.php?com=samples&act=chuyencap_cat");
	}
	if($capchuyen == 2)
	{
		#####Lấy id_list MAX
		$sql = "SELECT id FROM table_samples_list ORDER BY id desc";
		$d->query($sql);
		$max1 = $d->result_array();
		$max = $max1[0]['id']+1;
		
		#####Lấy id_list của danh mục cần chuyển cấp
		$sql = "SELECT id_list FROM table_samples_cat WHERE id='".$id_cat."'";
		$d->query($sql);
		$id_list1 = $d->result_array();
		$id_list = $id_list1[0]['id_list'];
			
		
		$sql = "INSERT INTO table_samples_list (ten,tenkhongdau,photo,hienthi,ngaytao,ngaysua,stt,id_danhmuc) 
	SELECT ten,tenkhongdau,photo,hienthi,ngaytao,ngaysua,stt,id_danhmuc FROM table_samples_cat WHERE id='".$id_cat."'";
		$result = $d->query($sql);
		if($result == true)
		{
			$sql2 = "UPDATE table_samples SET id_list='".$max."' WHERE id_list ='".$id_list."' and id_cat='".$id_cat."'";
			$result = $d->query($sql2);
			if($result == true)
			{
				$sql3 = "DELETE from table_samples_cat WHERE id='".$id_cat."'";
				$result = $d->query($sql3);
				if($result == true)
				{
					transfer("Bạn đã chuyển từ danh mục cấp 3 lên danh mục cấp 2", "index.php?com=samples&act=man_cat");
				}
			}				
		}
	}
	else if($capchuyen == 4)
	{
		transfer("Chuyển cấp này chưa được làm", "index.php?com=samples&act=chuyencap_cat");
	}
}


function delete_cat(){
	global $d;
	if(isset($_GET['id']))
	{
		$id =  themdau($_GET['id']);		
		$d->reset();		
			
			//Xóa danh mục cấp 3
			$sql = "select id,thumb,photo from #_samples_cat where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
				$sql = "delete from #_samples_cat where id='".$id."'";
				$d->query($sql);
			}
			//Xóa danh mục cấp 4			
			$sql = "select id,thumb,photo from #_samples_item where id_cat='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
				$sql = "delete from #_samples_item where id_cat='".$id."'";
				$d->query($sql);
			}
			//Xóa sản phẩm thuộc loại đó			
			$sql = "select id,thumb,photo from #_samples where id_cat='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
				$sql = "delete from #_samples where id_cat='".$id."'";
				$d->query($sql);
			}
		
		
		if($d->query($sql))
			redirect("index.php?com=samples&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=samples&act=man_cat");

	

	}elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_samples_cat where id='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_samples_item where id_cat='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_samples where id_cat='".$id."'";
				$d->query($sql);
			
		} redirect("index.php?com=samples&act=man_cat");} else transfer("Không nhận được dữ liệu", "index.php?com=samples&act=man_cat"	    );
							
}
/*---------------------------------*/
function get_lists(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_samples_list where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples_list SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples_list SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_samples_list";	
	if((int)$_REQUEST['id_danhmuc']!='')
	{
	$sql.=" where id_danhmuc=".$_REQUEST['id_danhmuc']."";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=samples&act=man_list&id_danhmuc=".$_GET['id_danhmuc'];
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_list(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=samples&act=man_list");
	
	$sql = "select * from #_samples_list where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=samples&act=man_list");
	$item = $d->fetch_array();	
}

function save_list(){
	global $d;
	$file_name=$_FILES['file']['name'];
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=samples&act=man_list");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;	
				
			$d->setTable('samples_list');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);	
				delete_file(_upload_sanpham.$row['thumb']);				
			}
		}
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('samples_list');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=samples&act=man_list&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=samples&act=man_list");
	}else{		
		 if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;		
			
		}
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('samples_list');
		if($d->insert($data))
			redirect("index.php?com=samples&act=man_list");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=samples&act=man_list");
	}
}

function delete_list(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			//Xóa danh mục cấp 2			
			$sql = "select id,thumb,photo from #_samples_list where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
				$sql = "delete from #_samples_list where id='".$id."'";
				$d->query($sql);
			}
			//Xóa danh mục cấp 3
			$sql = "select id,thumb,photo from #_samples_cat where id_list='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
				$sql = "delete from #_samples_cat where id='".$id."'";
				$d->query($sql);
			}
			//Xóa danh mục cấp 4			
			$sql = "select id,thumb,photo from #_samples_item where id_list='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
				$sql = "delete from #_samples_item where id_list='".$id."'";
				$d->query($sql);
			}
			//Xóa sản phẩm thuộc loại đó			
			$sql = "select id,thumb,photo from #_samples where id_list='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
				$sql = "delete from #_samples where id_list='".$id."'";
				$d->query($sql);
			}
		
		
		if($d->query($sql))
			redirect("index.php?com=samples&act=man_list");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=samples&act=man_list");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_samples_list where id='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_samples_cat where id_list='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_samples_item where id_list='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_samples where id_list='".$id."'";
				$d->query($sql);
			
		} redirect("index.php?com=samples&act=man_list");} else transfer("Không nhận được dữ liệu", "index.php?com=samples&act=man_list"	    );
}


/*---------------------------------*/
function get_danhmucs(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_samples_danhmuc where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples_danhmuc SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples_danhmuc SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_samples_danhmuc where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['noibat'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples_danhmuc SET noibat =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_samples_danhmuc SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_samples_danhmuc";
	if((int)$_REQUEST['id_danhmuc']!='')
	{
	$sql.=" where id_danhmuc=".(int)$_REQUEST['id_danhmuc']."";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=samples&act=man_danhmuc";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_danhmuc(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=samples&act=man_danhmuc");
	
	$sql = "select * from #_samples_danhmuc where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=samples&act=man_danhmuc");
	$item = $d->fetch_array();	
}

function save_danhmuc(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	$file_name2=fns_Rand_digit(0,9,6);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=samples&act=man_danhmuc");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 400, 350, _upload_sanpham,$file_name,2);									
			$d->setTable('samples');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);	
				delete_file(_upload_sanpham.$row['thumb']);	
							
			}
		}
		if($photo2 = upload_image("file2", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name2)){
			$data['photo2'] = $photo2;	
			$data['thumb2'] = create_thumb($data['photo2'], 270, 195, _upload_sanpham,$file_name2,2);									
			$d->setTable('samples');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo2']);	
				delete_file(_upload_sanpham.$row['thumb2']);	
							
			}
		}
		
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('samples_danhmuc');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=samples&act=man_danhmuc&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=samples&act=man_danhmuc");
	}else{			
		  if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 350, _upload_sanpham,$file_name,2);			
				
			}
			if($photo2 = upload_image("file2", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name2)){
			$data['photo2'] = $photo2;		
			$data['thumb2'] = create_thumb($data['photo2'], 270, 195, _upload_sanpham,$file_name2,2);			
				
			}
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('samples_danhmuc');
		if($d->insert($data))
			redirect("index.php?com=samples&act=man_danhmuc");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=samples&act=man_danhmuc");
	}
}

function delete_danhmuc(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
			//Xóa danh mục cấp 1
			$sql = "delete from #_samples_danhmuc where id='".$id."'";
			$d->query($sql);
			//Xóa danh mục cấp 2			
			$sql = "select id,thumb,photo from #_samples_list where id_danhmuc='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
				$sql = "delete from #_samples_list where id_danhmuc='".$id."'";
				$d->query($sql);
			}
			//Xóa danh mục cấp 3
			$sql = "select id,thumb,photo from #_samples_cat where id_danhmuc='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
				$sql = "delete from #_samples_cat where id='".$id."'";
				$d->query($sql);
			}
			//Xóa danh mục cấp 4			
			$sql = "select id,thumb,photo from #_samples_item where id_danhmuc='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
				$sql = "delete from #_samples_item where id_danhmuc='".$id."'";
				$d->query($sql);
			}
			//Xóa sản phẩm thuộc loại đó			
			$sql = "select id,thumb,photo from #_samples where id_danhmuc='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
				$sql = "delete from #_samples where id_danhmuc='".$id."'";
				$d->query($sql);
			}
		
		
		if($d->query($sql))
			redirect("index.php?com=samples&act=man_danhmuc");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=samples&act=man_danhmuc");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_samples_danhmuc where id='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_samples_list where id_danhmuc='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_samples_cat where id_danhmuc='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_samples_item where id_danhmuc='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_samples where id_danhmuc='".$id."'";
				$d->query($sql);
			
		} redirect("index.php?com=samples&act=man_danhmuc");} else transfer("Không nhận được dữ liệu", "index.php?com=samples&act=man_danhmuc"	    );
}
?>


