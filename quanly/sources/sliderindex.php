<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
//===========================================================
switch($act){
	case "man":
		get_items();
		$template = "sliderindex/items";
		break;
	case "add":
		$template = "sliderindex/item_add";
		break;
	case "edit":		
		get_item();		
		$template = "sliderindex/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	#===================================================	
	case "man_cat":
		get_cats();
		$template = "sliderindex/cats";
		break;
	case "add_cat":
		$template = "sliderindex/cat_add";
		break;
	case "edit_cat":
		get_cat();
		$template = "sliderindex/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
	default:
		$template = "index";

	default:
		$template = "index";
}

//===========================================================
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

//===========================================================
function get_items(){
	global $d, $items, $paging;
	
	#********************************************************************************#
	if(@$_REQUEST['noibat']!='')
	{
		$id_up = @$_REQUEST['noibat'];
		$sql_sp = "SELECT id,noibat FROM table_sliderindex where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$noibat=$cats[0]['noibat'];
	//echo "id:". $spdc1;
	if($noibat==0)
	{
		$sqlUPDATE_ORDER = "UPDATE table_sliderindex SET noibat =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
		$sqlUPDATE_ORDER = "UPDATE table_sliderindex SET noibat =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	#********************************************************************************#
	if(@$_REQUEST['hienthi']!='')
	{
		$id_up = @$_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_sliderindex where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
	//echo "id:". $spdc1;
	if($hienthi==0)
	{
		$sqlUPDATE_ORDER = "UPDATE table_sliderindex SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
		$sqlUPDATE_ORDER = "UPDATE table_sliderindex SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	#********************************************************************************#
	
	$sql = "select * from #_sliderindex ";
	if((int)$_REQUEST['id_item']!='')
	{
	$sql.=" where id_item=".$_REQUEST['id_item']."";
	}
	$sql.=" order by id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=sliderindex&act=man&id_item=".$_GET['id_item'];
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}
//===========================================================
function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=sliderindex&act=man");
	
	$sql = "select * from #_sliderindex where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=sliderindex&act=man");
	$item = $d->fetch_array();
}
//===========================================================
function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,8);
	$file_name2=fns_Rand_digit(0,9,8);
	$file_name3=fns_Rand_digit(0,9,8);
	$file_name4=fns_Rand_digit(0,9,8);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=sliderindex&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);		
		if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF',_upload_tintuc,$file_name)){
			$data['photo'] = $photo;	
			$d->setTable('sliderindex');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tintuc.$row['photo']);
			}
		}
		
		if($cogai = upload_image("file2", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF',_upload_tintuc,$file_name2)){
			$data['cogai'] = $cogai;	
			$d->setTable('sliderindex');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tintuc.$row['cogai']);
			}
		}
		
		if($sanpham = upload_image("file3", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF',_upload_tintuc,$file_name3)){
			$data['sanpham'] = $sanpham;	
			$d->setTable('sliderindex');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tintuc.$row['sanpham']);
			}
		}
		if($sanpham2 = upload_image("file4", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF',_upload_tintuc,$file_name4)){
			$data['sanpham2'] = $sanpham2;	
			$d->setTable('sliderindex');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tintuc.$row['sanpham2']);
			}
		}
	
		$data['ten'] = $_POST['ten'];
		$data['ten_sd'] = $_POST['ten_sd'];
		$data['link'] = $_POST['link'];
		$data['mota'] = $_POST['mota'];
		
		
		$d->setTable('sliderindex');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=sliderindex&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=sliderindex&act=man");
	}else{
		
		if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF',_upload_tintuc,$file_name)){
			$data['photo'] = $photo;
		
		}
		
		$data['ten'] = $_POST['ten'];
		$data['ten_sd'] = $_POST['ten_sd'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['mota'] = $_POST['mota'];
		$data['noidung'] = $_POST['noidung'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('sliderindex');
		if($d->insert($data))
			redirect("index.php?com=sliderindex&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=sliderindex&act=man");
	}
}
//===========================================================
function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_sliderindex where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_tintuc.$row['photo']);
				
			}
			$sql = "delete from #_sliderindex where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=sliderindex&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=sliderindex&act=man");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select * from #_sliderindex where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_tintuc.$row['photo']);
				delete_file(_upload_tintuc.$row['thumb']);
			}
			$sql = "delete from #_sliderindex where id='".$id."'";
			$d->query($sql);
		}
			
		} redirect("index.php?com=sliderindex&act=man");} else transfer("Không nhận được dữ liệu", "index.php?com=sliderindex&act=man");
}

//===========================================================
function get_cats(){
	global $d, $items, $paging;
	
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_sliderindex_item where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_sliderindex_item SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_sliderindex_item SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_sliderindex_item order by stt";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=sliderindex&act=man_cat";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

//===========================================================
function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=sliderindex&act=man_cat");
	
	$sql = "select * from #_sliderindex_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=sliderindex&act=man_cat");
	$item = $d->fetch_array();
}
//===========================================================
function save_cat(){
	global $d;
	$file_name_item=$_FILES['file']['name'];
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=sliderindex&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];	
		$data['noidung'] = $_POST['noidung'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		$data['ngaysua'] =time();	
		$d->setTable('sliderindex_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=sliderindex&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=sliderindex&act=man_cat");
	}else{
		$data['ten'] = $_POST['ten'];
		
		$data['stt'] = $_POST['stt'];
		
		
		$d->setTable('sliderindex_item');
		if($d->insert($data))
			redirect("index.php?com=sliderindex&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=sliderindex&act=man_cat");
	}
}
//===========================================================
function delete_cat(){
	global $d;
	if(isset($_GET['id']))
	{
		$id =  themdau($_GET['id']);		
		$d->reset();		
			//Xóa danh mục cấp 4
			$sql = "delete from #_sliderindex_item where id='".$id."'";
			$d->query($sql);
			//Xóa sản phẩm thuộc loại đó
			$sql = "select id,thumb,photo from #_place where id_item='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_tintuc.$row['photo']);
				}
				$sql = "delete from #_sliderindex where id_item='".$id."'";
				$d->query($sql);
			}
			
		
		
		if($d->query($sql))
			redirect("index.php?com=sliderindex&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=sliderindex&act=man_cat");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();							
				
				$sql = "delete from #_sliderindex_item where id='".$id."'";
				$d->query($sql);
				
				$sql = "select id,thumb,photo from #_sliderindex where id_item='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0)
				{
					while($row = $d->fetch_array())
					{
						delete_file(_upload_tintuc.$row['photo']);
					}
					$sql = "delete from #_sliderindex where id_item='".$id."'";
					$d->query($sql);
				}

		} redirect("index.php?com=sliderindex&act=man_cat");}
		else transfer("Không nhận được dữ liệu", "index.php?com=sliderindex&act=man_cat");
}

?>


