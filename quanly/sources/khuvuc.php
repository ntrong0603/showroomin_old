<?php	if(!defined('_source')) die("Error");

	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

	$id=$_REQUEST['id'];
	
switch($act){
	case "man":
		get_items();
		get_dichvu();
		$template = "khuvuc/items";
		break;
	case "add":		
	get_dichvu();
		$template = "khuvuc/item_add";
		break;
	case "edit":	
	get_dichvu();	
		get_item();
		$template = "khuvuc/item_add";
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

function get_dichvu(){
	global $d,$cacdichvu;
	$d->reset();
	$d->setTable('cacdichvu');
	$d->select();
	$cacdichvu=$d->result_array();
	return $cacdichvu;
	
	
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
		$sql_sp = "SELECT id,hienthi FROM table_khuvuc where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_khuvuc SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_khuvuc SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_khuvuc";	
	
	
	$sql.=" order by stt,id desc";
	// print_r($sql);die();
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=khuvuc&act=man".$urldanhmuc;
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item,$ds_tags;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Kh??ng nh???n ???????c d??? li???u", "index.php?com=khuvuc&act=man");	
	$sql = "select * from #_khuvuc where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("D??? li???u kh??ng c?? th???c", "index.php?com=khuvuc&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	$d->reset();
	$d->setTable('cacdichvu');
	$d->select();
	$cacdichvu=$d->result_array();
	
	for($j=0, $countj=count($cacdichvu);$j<$countj;$j++){
		
		
		$data["".$cacdichvu[$j]['maso']]=$_POST[''.$cacdichvu[$j]['maso']]	;
		}
		
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Kh??ng nh???n ???????c d??? li???u", "index.php?com=khuvuc&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		
      						
		$data['ten'] = $_POST['ten'];
		$data['khuvuc'] = $_POST['khuvuc'];
		$data['stt'] = $_POST['stt'];
	
	
	
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('khuvuc');
		$d->setWhere('id', $id);
		if($d->update($data)){
			
			//UPDATE ATTRIBUTE
			redirect("index.php?com=khuvuc&act=man&curPage=".$_REQUEST['curPage']."");
		}
		else
			transfer("C???p nh???t d??? li???u b??? l???i", "index.php?com=khuvuc&act=man");
	}else{
		
		$data['ten'] = $_POST['ten'];
		$data['khuvuc'] = $_POST['khuvuc'];
		$data['stt'] = $_POST['stt'];
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$d->setTable('khuvuc');
		if($d->insert($data))
		{	
			redirect("index.php?com=khuvuc&act=man");
		}
		else
			transfer("L??u d??? li???u b??? l???i", "index.php?com=khuvuc&act=man");
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
		
		$sql = "delete from #_khuvuc where id='".$id."'";
		$d->query($sql);
		
		if($d->query($sql))
			redirect("index.php?com=khuvuc&act=man".$id_catt."");
		else
			transfer("X??a d??? li???u b??? l???i", "index.php?com=khuvuc&act=man");
	}else transfer("Kh??ng nh???n ???????c d??? li???u", "index.php?com=khuvuc&act=man");

}
?>