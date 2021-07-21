<?php	if(!defined('_source')) die("Error");
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	

switch($act){

	case "man":
		get_items();
		$template = "fanpage/items";
		break;
	case "add":		
		$template = "fanpage/item_add";
		break;
	case "edit":		
		get_item();
		$template = "fanpage/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	
}


function get_items(){
	global $d, $items, $paging,$urlsanpham;
	#-------------------------------------------------------------------------------
	$sql = "select * from #_fanpage";	
	$d->query($sql);
	$items = $d->result_array();
}

function get_item(){
	global $d, $item,$ds_tags;

	$sql = "select * from #_fanpage";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=fanpage&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	
	$sql = "select * from #_fanpage";
	$d->query($sql);
	
	
	if(empty($_POST)) 
		transfer("Không nhận được dữ liệu", "index.php?com=fanpage&act=man");
	if($d->num_rows()!=0 && isset($_POST['ten']))
	{
		$ten=$_POST['ten'];
		$data['fanpage_name'] = $_POST['ten'];			
		$d->setTable('fanpage');
		if($d->update($data))
			redirect("index.php?com=fanpage&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=fanpage&act=man");
			
	}
	else if($d->num_rows()==0 && isset($_POST['ten']))
	{
		$data['fanpage_name'] = $_POST['ten'];
		$d->setTable('fanpage');
		if($d->insert($data))
		{			
			redirect("index.php?com=fanpage&act=man");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=fanpage&act=man");
	}
}

function delete_item(){
	global $d;
		$d->reset();
		$sql = "select * from #_fanpage";
		$d->query($sql);
		if($d->num_rows()>0){
		$sql = "delete from #_fanpage";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=fanpage&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=fanpage&act=man");

}

?>