<?php	if(!defined('_source')) die("Error");

	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$urldanhmuc ="";
	$urldanhmuc.= (isset($_REQUEST['id_list'])) ? "&id_list=".addslashes($_REQUEST['id_list']) : "";
	$urldanhmuc.= (isset($_REQUEST['id_cat'])) ? "&id_cat=".addslashes($_REQUEST['id_cat']) : "";
	$urldanhmuc.= (isset($_REQUEST['id_item'])) ? "&id_item=".addslashes($_REQUEST['id_item']) : "";

	if(isset($_REQUEST['id']))$id=$_REQUEST['id'];

switch($act){
	case "man":
		get_items();
		$template = "donhang/items";
		break;

	case "chitiet":
		get_chitiet();
		$template = "donhang/chitiet";
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
	
	$items = result_array($sql);
	//echo "<pre>"; print_r($items); exit();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=dathang&act=man";
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_chitiet(){
	global $d,$items,$chitietdathang;
	$id = $_GET['id'];
	//$sql = "select * from table_dathang ";
	$sql = "select table_dathang.*, table_dh_status.name 
			from table_dathang
			left join table_dh_status on table_dh_status.id = table_dathang.tinhtrangdonhang
			where table_dathang.id='$id'
			order by table_dathang.id desc";
			
	$items = result_array($sql);
	//echo "<pre>"; print_r($items); exit();
	$sql = "select * from table_chitietdathang where id_dathang='$id'";
	
	$chitietdathang = result_array($sql);
	if(isset($_GET['xem']) && $_GET['xem']==0)
	{
		$sql99 = "update table_chitietdathang set xem=1 where id_dathang='".$id."'";
		db_query($sql99);
	}

	if( isset($_POST['submit']) ){
		$data['tinhtrangdonhang'] = $_POST['tinhtrangdonhang'];
		
		if( db_update_by_array('table_dathang',$data, "$id = ".$_GET['id']) ){
			redirect(getCurrentPageURL());
		}
	}
}

function delete_item(){

	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		$sql = "delete from table_chitietdathang where id_dathang='".$id."'";
		if(db_query($sql)){
			
			$sql = "delete from table_dathang where id='".$id."'";
			if(db_query($sql))
			redirect("index.php?com=dathang&act=man");
			else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=dathang&act=man");
		}

		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=dathang&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=dathang&act=man");
}

/*--------------cap 0------------------*/


?>