<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "slider/items";
		break;
	case "add":	
		get_item_kc();	
		$template = "slider/item_add";
		break;
	case "edit":		
		get_item();
		$template = "slider/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	
	case "man_danhmuc":
		get_danhmucs();
		$template = "slider/danhmucs";
		break;
	case "add_danhmuc":		
		$template = "slider/danhmuc_add";
		break;
	case "edit_danhmuc":		
		get_danhmuc();
		$template = "slider/danhmuc_add";
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
	if($_REQUEST['hienthi']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_hinhslider where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_hinhslider SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_hinhslider SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_hinhslider";	
	if((int)$_REQUEST['id_sp']!='')
	{
	$sql.=" where id_sp=".(int)$_REQUEST['id_sp']."";
	}
	
	$sql.=" order by stt desc,id_sp,id desc";
	
	
	$d->query($sql);
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=slider&act=man&id_sp=".$_GET['id_sp'];
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	$id_sp = isset($_GET['id_sp']) ? themdau($_GET['id_sp']) : "";
	
	$sql = "select * from #_slider where id ='".$id_sp."'";
	$d->query($sql);
	$kichthuot = $d->fetch_array();
	
	
	
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=slider&act=man");
	$sql = "select * from #_hinhslider where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=slider&act=man");
	$item = $d->fetch_array();	
	$item['rong'] = $kichthuot['rong'];
	$item['cao'] = $kichthuot['cao'];
	
	
}
function get_item_kc(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	$id_sp = isset($_GET['id_sp']) ? themdau($_GET['id_sp']) : "";
	
	$sql = "select * from #_slider where id ='".$id_sp."'";
	$d->query($sql);
	$kichthuot = $d->fetch_array();
	$item['rong'] = $kichthuot['rong'];
	$item['cao'] = $kichthuot['cao'];
	
	
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=slider&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 400, 400, _upload_hinhanh,$file_name,2);									
			$d->setTable('slider');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo']);	
				delete_file(_upload_hinhanh.$row['thumb']);	
							
			}
		}
		
		$data['id_sp'] = (int)$_POST['id_sp'];
		$sql = "select * from #_slider where id='".(int)$_POST['id_sp']."'";
		$d->query($sql);
		$tenkhongdau = $d->fetch_array();
		$data['com'] = $tenkhongdau['tenkhongdau'];	
		
		$data['ten'] = $_POST['ten'];	
		$data['stt'] = $_POST['stt'];	
		$data['ten_rd'] = $_POST['ten_rd'];
		$data['ten_sd'] = $_POST['ten_sd'];
		$data['link'] = $_POST['link'];	
		
		
		$d->setTable('hinhslider');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=slider&act=man&curPage=".$_REQUEST['curPage']."&id_sp=".$_REQUEST['id_sp']."&id_list=".$_REQUEST['id_list']."&id_cat=".$_REQUEST['id_cat']."&id_item=".$_REQUEST['id_item']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=slider&act=man");
	}else{

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_hinhanh,$file_name))
		{
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 400, _upload_hinhanh,$file_name,2);	
		}
		$data['id_sp'] = (int)$_POST['id_sp'];
		$sql = "select * from #_slider where id='".(int)$_POST['id_sp']."'";
		$d->query($sql);
		$tenkhongdau = $d->fetch_array();
		$data['com'] = $tenkhongdau['tenkhongdau'];	
		$data['stt'] = $_POST['stt'];	
		$data['ten'] = $_POST['ten'];	
		
		$data['ten_rd'] = $_POST['ten_rd'];
		$data['ten_sd'] = $_POST['ten_sd'];
		$data['link'] = $_POST['link'];	
		$d->setTable('hinhslider');
		if($d->insert($data))
			redirect("index.php?com=slider&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=slider&act=man");
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
		$sql = "select * from table_hinhslider where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_hinhanh.$row['photo']);
				delete_file(_upload_hinhanh.$row['thumb']);			
			}
		$sql = "delete from #_hinhslider where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=slider&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=slider&act=man");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select id,thumb, photo from #_hinhslider where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_hinhanh.$row['photo']);
				delete_file(_upload_hinhanh.$row['thumb']);
			}
			$sql = "delete from #_hinhslider where id='".$id."'";
			$d->query($sql);
		}
			
		} redirect("index.php?com=slider&act=man");} else transfer("Không nhận được dữ liệu", "index.php?com=slider&act=man");
		
}


function get_danhmucs(){
	global $d, $items, $paging;
	$sql = "select * from #_slider";
	
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=slider&act=man_danhmuc";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_danhmuc(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=slider&act=man_danhmuc");
	
	$sql = "select * from #_slider where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=slider&act=man_danhmuc");
	$item = $d->fetch_array();	
}

function save_danhmuc(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=slider&act=man_danhmuc");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$id =  themdau($_POST['id']);
		
		
		$data['ten'] = $_POST['ten'];
		$data['ten_sd'] = $_POST['ten_sd'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['cao'] = $_POST['cao'];
		$data['rong'] = $_POST['rong'];
		
		
		
		$d->setTable('slider');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=slider&act=man_danhmuc&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=slider&act=man_danhmuc");
	}else{			
		  
		$data['ten'] = $_POST['ten'];
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['cao'] = $_POST['cao'];
		$data['rong'] = $_POST['rong'];
		
		$d->setTable('slider');
		if($d->insert($data))
			redirect("index.php?com=slider&act=man_danhmuc");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=slider&act=man_danhmuc");
	}
}

function delete_danhmuc(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
			//Xóa danh mục cấp 1
			$sql = "delete from #_slider where id='".$id."'";
			$d->query($sql);
			
			//Xóa sản phẩm thuộc loại đó			
			$sql = "select id,thumb,photo from #_slider where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
				$data['id_danhmuc'] = 0;
				$d->setTable('slider');
				$d->setWhere('id_danhmuc', $id);
				$d->update($data);
			}
		
		
		if($d->query($sql))
			redirect("index.php?com=slider&act=man_danhmuc");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=slider&act=man_danhmuc");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_slider_danhmuc where id='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_slider_list where id_danhmuc='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_slider_cat where id_danhmuc='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_slider_item where id_danhmuc='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_slider where id_danhmuc='".$id."'";
				$d->query($sql);
			
		} redirect("index.php?com=slider&act=man_danhmuc");} else transfer("Không nhận được dữ liệu", "index.php?com=slider&act=man_danhmuc"	    );
}
?>


