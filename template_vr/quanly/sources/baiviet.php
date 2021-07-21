<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
if( isset( $_REQUEST['id'] ) ){$id=$_REQUEST['id'];}

switch($act){
	
	case "man":
		get_items();
		$template = "baiviet/items";
		break;
	case "add":		
		
		
		$template = "baiviet/item_add";
		break;
	case "edit":		
		get_item();
		
		
		$template = "baiviet/item_add";
		break;
	case "save":
	if( $_GET['id']!='' ){get_item();}
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
	global $loaitin,  $d, $items, $paging;	
	
	$sql = "select * from #_baiviet  ";	
	if(isset( $_REQUEST['id_danhmuc'] ) and (int)$_REQUEST['id_danhmuc']!='')
	{
	$sql.=" and id_danhmuc=".(int)$_REQUEST['id_danhmuc']."";
	}
	if(isset( $_REQUEST['id_list'] ) and (int)$_REQUEST['id_list']!='')
	{
	$sql.=" and id_list=".(int)$_REQUEST['id_list']."";
	}
	if(isset( $_REQUEST['id_cat'] ) and (int)$_REQUEST['id_cat']!='')
	{
	$sql.=" and id_cat=".(int)$_REQUEST['id_cat']."";
	}
	if(isset( $_REQUEST['id_item'] ) and (int)$_REQUEST['id_item']!='')
	{
	$sql.=" and id_item=".(int)$_REQUEST['id_item']."";
	}
	$sql.=" order by id_danhmuc,id_list,id_cat,id_item,stt,id desc";
	
	
	$d->query($sql);
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$id_danhmuc='';
	$id_cat='';
	$id_list='';
	$id_item='';
	if( isset( $_GET['id_danhmuc'] ) ){$id_danhmuc=$_GET['id_danhmuc'];}
	if( isset( $_GET['id_list'] ) ){$id_list=$_GET['id_list'];}
	if( isset( $_GET['id_cat'] ) ){$id_cat=$_GET['id_cat'];}
	if( isset( $_GET['id_item'] ) ){$id_item=$_GET['id_item'];}
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=baiviet&act=man&id_danhmuc=".$id_danhmuc."&id_list=".$id_list."&id_cat=".$id_cat."&id_item=".$id_item;
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $loaitin,  $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=baiviet&act=man");
	
	$sql = "select * from #_baiviet where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=baiviet&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $loaitin,  $d,$item;
	$file_name=fns_Rand_digit(0,9,6);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=baiviet&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 400, 400, _upload_tintuc,$file_name,2);									
			$d->setTable('baiviet');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tintuc.$row['photo']);	
				delete_file(_upload_tintuc.$row['thumb']);	
							
			}
		}
		
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['id_list'] = (int)$_POST['id_list'];	
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['id_item'] = (int)$_POST['id_item'];		
		$data['ten'] = $_POST['ten'];
		$data['ten_rd'] = $_POST['ten_rd'];
		$data['ten_sd'] = $_POST['ten_sd'];	
		$data['tag'] = $_POST['tag'];	
		
			$data['loaitin']=$_POST['loaitin'];
	
		if($_POST['tenkhongdau']==$item['tenkhongdau'] and $_POST['tenkhongdau']!=''){
			$data['tenkhongdau']=$_POST['tenkhongdau'];
		}else{
			if ($_POST['tenkhongdau']==''){$tenkhongdau=changeTitle($_POST['ten']);}else
			{$tenkhongdau = changeTitle($_POST['tenkhongdau']);}
			$newname=$tenkhongdau;
		$d->reset();
			$d->setTable('news');
			$d->setWhere('id', $id);
			$data0['tenkhongdau']='';
			$d->update($data0);
for($i=0;$i<100;$i++){
		if( checklink($newname)==true ){
				
	
			$newname=$tenkhongdau."-".$i;
			
			
				}else{
						
	
					break;
				}
		}
		$data['tenkhongdau']=$newname;
		}
		
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['maso'] = $_POST['maso'];			
		$data['gia'] = $_POST['gia'];
		$data['giakm'] = $_POST['giakm'];
		
		
		
		$data['chatlieu'] = $_POST['chatlieu'];
		$data['trongluong'] = $_POST['trongluong'];
		$data['kichthuoc'] = $_POST['kichthuoc'];
		
		$data['noidung'] = addslashes($_POST['noidung']);
		$data['noidung_sd'] = addslashes($_POST['noidung_sd']);
		$data['noidung_rd'] = addslashes($_POST['noidung_rd']);
		$data['mota'] = addslashes($_POST['mota']);
		$data['mota_sd'] = addslashes($_POST['mota_sd']);
		$data['mota_rd'] = addslashes($_POST['mota_rd']);
		
		
						
		$data['stt'] = $_POST['stt'];
		
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['spmoi'] = isset($_POST['spmoi']) ? 1 : 0;
		$data['spbanchay'] = isset($_POST['spbanchay']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('baiviet');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=baiviet&act=man&id_danhmuc=".$_REQUEST['id_danhmuc']."&id_list=".$_REQUEST['id_list']."&id_cat=".$_REQUEST['id_cat']."&id_item=".$_REQUEST['id_item']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=baiviet&act=man");
	}else{
		
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name))
		{
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 400, _upload_tintuc,$file_name,2);	
		}
		$data['mota'] = addslashes($_POST['mota']);$data['mota_sd'] = addslashes($_POST['mota_sd']);$data['mota_rd'] = addslashes($_POST['mota_rd']);
		$data['loaitin']=$_POST['loaitin'];
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['id_list'] = (int)$_POST['id_list'];
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['id_item'] = (int)$_POST['id_item'];		
		$data['ten'] = $_POST['ten'];
		$data['ten_rd'] = $_POST['ten_rd'];
		$data['ten_sd'] = $_POST['ten_sd'];	
		
		$tenkhongdau = changeTitle($_POST['ten']);
			$newname=$tenkhongdau;
		
for($i=0;$i<100;$i++){
		if( checklink($newname)==true ){
			$newname=$tenkhongdau."-".$i;
			
			
				}else{
					break;
				}
		}
		$data['tenkhongdau']=$newname;
	
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['maso'] = $_POST['maso'];			
		
			
		$data['gia'] = $_POST['gia'];	
		$data['tag'] = $_POST['tag'];
		$data['giakm'] = $_POST['giakm'];
		$data['noidung'] = addslashes($_POST['noidung']);
		$data['noidung_sd'] = addslashes($_POST['noidung_sd']);
		$data['noidung_rd'] = addslashes($_POST['noidung_rd']);		
		
		$data['chatlieu'] = $_POST['chatlieu'];
		$data['trongluong'] = $_POST['trongluong'];
		$data['kichthuoc'] = $_POST['kichthuoc'];
		$data['stt'] = $_POST['stt'];
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['spmoi'] = isset($_POST['spmoi']) ? 1 : 0;
		$data['spbanchay'] = isset($_POST['spbanchay']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		
		
		
		$d->setTable('baiviet');
		if($d->insert($data))
			redirect("index.php?com=baiviet&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=baiviet&act=man");
	}
}

function delete_item(){
	global $loaitin,  $d;
	if($_REQUEST['id_cat']!='')
	{ $id_catt="&id_cat=".$_REQUEST['id_cat'];
	}
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,thumb, photo from #_baiviet where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_tintuc.$row['photo']);
				delete_file(_upload_tintuc.$row['thumb']);			
			}
		$sql = "delete from #_baiviet where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=baiviet&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=baiviet&act=man");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select id,thumb, photo from #_baiviet where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_tintuc.$row['photo']);
				delete_file(_upload_tintuc.$row['thumb']);
			}
			$sql = "delete from #_baiviet where id='".$id."'";
			$d->query($sql);
		}
			
		} redirect("index.php?com=baiviet&act=man");} else transfer("Không nhận được dữ liệu", "index.php?com=baiviet&act=man");
		
}

#====================================

?>


