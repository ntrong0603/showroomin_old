<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){
	case "man":
		get_support();
		$template = "support/items";
		break;
	case "add":
		$template = "support/item_add";
		break;
	case "edit":
		edit_support();
		$template = "support/item_add";
		break;
	case "save":
		save_support();
		break;
	case "delete":
		delete_support();
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

function get_support(){
	global $d, $items;
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_support where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_support SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_support SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from table_support";
	$d->query($sql);
	$items = $d->result_array();
}
function edit_support(){
	global $d, $item;
	$id=$_REQUEST['id'];
	$sql = "SELECT * FROM table_support WHERE id=$id";
	$d->query($sql);
	$item = $d->fetch_array();
}
function delete_support(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_support where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=support&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=support&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=support&act=man");
}

function save_support(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=support&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){					
		$data['id'] = $_POST['id'];
		$data['ten_vi'] = mysql_real_escape_string($_POST['ten_vi']);
		$data['noidung_vi'] = mysql_real_escape_string($_POST['noidung_vi']);
		$data['stt'] = $_POST['stt'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 1;
		$d->setTable('support');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=support&act=man&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=support&act=man");
	}else{				
		$data['id'] = $_POST['id'];
		$data['ten_vi'] = mysql_real_escape_string($_POST['ten_vi']);
		$data['noidung_vi'] = mysql_real_escape_string($_POST['noidung_vi']);
		$data['stt'] = $_POST['stt'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$d->setTable('support');
		if($d->insert($data))
			redirect("index.php?com=support&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=support&act=man");
	}
}

?>