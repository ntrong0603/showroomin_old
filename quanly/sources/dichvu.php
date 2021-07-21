<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$urlsanpham ="";
$urlsanpham.= (isset($_REQUEST['id_list'])) ? "&id_list=".addslashes($_REQUEST['id_list']) : "";
$urlsanpham.= (isset($_REQUEST['id_cat'])) ? "&id_cat=".addslashes($_REQUEST['id_cat']) : "";
$urlsanpham.= (isset($_REQUEST['id_item'])) ? "&id_item=".addslashes($_REQUEST['id_item']) : "";

$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "dichvu/items";
		break;
	case "add":		
		$template = "dichvu/item_add";
		break;
	case "edit":		
		get_item();
		$template = "dichvu/item_add";
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
	if($_REQUEST['noibat']!='')
	{
		// print_r('noi bat');die();
		$id_up = $_REQUEST['noibat'];
		$sql_sp = "SELECT id,noibat FROM table_dichvu where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['noibat'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_dichvu SET noibat =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_dichvu SET noibat =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_dichvu where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_dichvu SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_dichvu SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_dichvu";	
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
	$sql.=" order by stt asc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=dichvu&act=man".$urlsanpham;
	$maxR=10;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
	
}

function get_item(){
	global $d, $item,$ds_tags;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man");	
	$sql = "select * from #_dichvu where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=dichvu&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_dichvu,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 210, 170, _upload_dichvu,$file_name,2);		
			$d->setTable('dichvu');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_dichvu.$row['photo']);	
				delete_file(_upload_dichvu.$row['thumb']);				
			}
		}					 	
		$data['ten_vi'] = mysql_real_escape_string($_POST['ten_vi']);
		$data['ten_en'] = mysql_real_escape_string($_POST['ten_en']);
		$data['tenkhongdau'] = ($data['ten_vi']==='')?changeTitle($_POST['ten_en']):changeTitle($_POST['ten_vi']);			
		$data['mota'] =mysql_real_escape_string( $_POST['mota']);	
		$data['noidung_vi'] = mysql_real_escape_string($_POST['noidung_vi']);			
		$data['noidung_en'] = mysql_real_escape_string($_POST['noidung_en']);									
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$d->setTable('dichvu');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=dichvu&act=man&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=dichvu&act=man");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_dichvu,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 210, 170, _upload_dichvu,$file_name,1);		
		}		
			
		$data['ten_vi'] = mysql_real_escape_string($_POST['ten_vi']);
		$data['ten_en'] = mysql_real_escape_string($_POST['ten_en']);
		$data['tenkhongdau'] = ($data['ten_vi']==='')?changeTitle($_POST['ten_en']):changeTitle($_POST['ten_vi']);
		$data['mota'] = mysql_real_escape_string($_POST['mota']);	
		$data['noidung_vi'] = mysql_real_escape_string($_POST['noidung_vi']);			
		$data['noidung_en'] = mysql_real_escape_string($_POST['noidung_en']);													
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$d->setTable('dichvu');
		if($d->insert($data))
		{			
			redirect("index.php?com=dichvu&act=man");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=dichvu&act=man");
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
		$sql = "select id,thumb, photo from #_dichvu where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_dichvu.$row['photo']);
				delete_file(_upload_dichvu.$row['thumb']);			
			}
		$sql = "delete from #_dichvu where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=dichvu&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=dichvu&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man");
}

?>