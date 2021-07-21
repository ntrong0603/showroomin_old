i<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$urlsanpham ="";
$urlsanpham.= (isset($_REQUEST['id_list'])) ? "&id_list=".addslashes($_REQUEST['id_list']) : "";
$urlsanpham.= (isset($_REQUEST['id_cat'])) ? "&id_cat=".addslashes($_REQUEST['id_cat']) : "";
$urlsanpham.= (isset($_REQUEST['id_item'])) ? "&id_item=".addslashes($_REQUEST['id_item']) : "";

$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "attribute/items";
		break;
	case "add":		
		$template = "attribute/item_add";
		break;
	case "edit":		
		get_item();
		$template = "attribute/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	
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
	global $d, $items, $paging,$urlsanpham;
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_attribute where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_attribute SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_attribute SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#-------------------------------------------------------------------------------
	#-------------------------------------------------------------------------------
	$sql = "select * from #_attribute";	
	if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" where  	id_list=".$_REQUEST['id_list']."";
	}
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" and	id_cat=".$_REQUEST['id_cat']."";
	}
	if((int)$_REQUEST['id_item']!='')
	{
	$sql.=" and	id_item=".$_REQUEST['id_item']."";
	}
	
	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$sql.=" where ten LIKE '%$keyword%'";
	}
	$sql.=" order by id asc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=attribute&act=man".$urlsanpham;
	$maxR=10;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
	
}

function get_item(){
	global $d, $item,$ds_tags;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=attribute&act=man");	
	$sql = "select * from #_attribute where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=attribute&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=attribute&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);			 	
		// $data['ten'] = $_POST['ten'];
		$data['ten'] = mysql_real_escape_string($_POST['ten']);
		$data['mota_vi'] = mysql_real_escape_string($_POST['mota_vi']);
		$data['mota_en'] = mysql_real_escape_string($_POST['mota_en']);
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('attribute');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=attribute&act=man&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=attribute&act=man");
	}else{		
		$data['ten'] = mysql_real_escape_string($_POST['ten']);
		$data['mota_vi'] = mysql_real_escape_string($_POST['mota_vi']);
		$data['mota_en'] = mysql_real_escape_string($_POST['mota_en']);
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$d->setTable('attribute');
		if($d->insert($data))
		{			
			redirect("index.php?com=attribute&act=man");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=attribute&act=man");
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
		$sql = "select * from #_attribute where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			
		$sql = "delete from #_attribute where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=attribute&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=attribute&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=attribute&act=man");
}

?>