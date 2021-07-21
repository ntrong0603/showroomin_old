<?php	if(!defined('_source')) die("Error");

	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

	$id=$_REQUEST['id'];
	
switch($act){
	case "man":
		get_items();
		$template = "url/items";
		break;
	case "add":		
		$template = "url/item_add";
		break;
	case "edit":		
		get_item();
		$template = "url/item_add";
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
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_url where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_url SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_url SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_url";	
	
	
	$sql.=" order by stt,id desc";
	// print_r($sql);die();
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=url&act=man".$urldanhmuc;
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item,$ds_tags;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=url&act=man");	
	$sql = "select * from #_url where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=url&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=url&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		
      						
		$data['tenkhongdau'] = $_POST['tenkhongdau'];
		$data['stt'] = $_POST['stt'];
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('url');
		$d->setWhere('id', $id);
		if($d->update($data)){
			
			//UPDATE ATTRIBUTE
			redirect("index.php?com=url&act=man&curPage=".$_REQUEST['curPage']."");
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=url&act=man");
	}else{
		
		$data['tenkhongdau'] = $_POST['tenkhongdau'];
		$data['stt'] = $_POST['stt'];
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$d->setTable('url');
		if($d->insert($data))
		{	
			redirect("index.php?com=url&act=man");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=url&act=man");
	}
}

function delete_item(){
	global $d;
	
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		
		$sql = "delete from #_url where id='".$id."'";
		$d->query($sql);
		
		if($d->query($sql))
			redirect("index.php?com=url&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=url&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=url&act=man");

}
?>