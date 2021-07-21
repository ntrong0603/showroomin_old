<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? mysql_real_escape_string($_REQUEST['act']) : "";
//$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "donhang/items";
		break;
	case "add":		
		$template = "donhang/chitiet";
		break;
	case "chitiet":		
		get_item();
		$template = "donhang/chitiet";
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

	global $d,$items,$paging;
	$sql = "select table_dathang.*, table_dh_status.name 
			from table_dathang
			left join table_dh_status on table_dh_status.id = table_dathang.tinhtrangdonhang
			order by table_dathang.id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=order&act=man&tinhtrang=".$_GET['tinhtrang'];
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){

	global $d,$item,$chitietdathang;
	$id = $_GET['id'];
	//$sql = "select * from table_dathang ";
	$sql = "select table_dathang.*, table_dh_status.name 
			from table_dathang
			left join table_dh_status on table_dh_status.id = table_dathang.tinhtrangdonhang
			where table_dathang.id='".$id."'
			order by table_dathang.id desc";
	$d->query($sql);	
	$item = $d->fetch_array();
	//echo "<pre>"; print_r($items); exit();
	$sql = "select * from table_dathang_chitiet where id_dathang='".$id."'";
	$d->query($sql);
	$chitietdathang = $d->result_array();
	if(isset($_GET['xem']) && $_GET['xem']==0)
	{
		$sql99 = "update table_dathang set xem=1 where id='".$id."'";
		$d->query($sql99);
	}

	if( isset($_POST['submit']) ){
		$data['tinhtrangdonhang'] = $_POST['tinhtrangdonhang'];
		$d->reset();
		$d->setTable('dathang');
		$d->setWhere('id',$_GET['id']);
		$d->update($data);
		redirect(getCurrentPageURL());
	}

	
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=order&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);			
		
		$data['ghichu'] = $_POST['ghichu'];
		$data['tinhtrangdonhang'] = $_POST['id_tinhtrang'];				
		$d->setTable('dathang');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=order&act=man&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=order&act=man");
	}else{
			
				
		$data['ghichu'] = $_POST['ghichu'];
		$data['tinhtrangdonhang'] = $_POST['id_tinhtrang'];	
		$d->setTable('dathang');
		if($d->insert($data))
			redirect("index.php?com=order&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=order&act=man");
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
	
	
	if(isset($_GET['id']))
	{
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "delete from #_dathang where id='".$id."'";
		$d->query($sql);
		if($d->query($sql))
			redirect("index.php?com=order&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=order&act=man");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++)
		{
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();											
				$sql = "delete from #_dathang where id='".$id."'";
				$d->query($sql);				
		} 
		redirect("index.php?com=order&act=man");
	}
	else transfer("Không nhận được dữ liệu", "index.php?com=order&act=man");
}
?>