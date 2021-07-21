<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? mysql_real_escape_string($_REQUEST['act']) : "";
if( isset( $_GET['loaitin'] ) ){
	$loaitin=$_GET['loaitin'];
	$cfn = $menu[$loaitin];
}
if( isset( $_REQUEST['id'] ) ){$id=$_REQUEST['id'];}

switch($act){

	case "man":
		get_items();
		$template = "nhanxetkh/item";
		break;
	case "add":		
		
		$template = "nhanxetkh/add";
		break;
	case "edit":		
		get_item();
		$template = "nhanxetkh/add";
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
		#==================================================
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
	#----------------------------------------------------------------------------------------
	if(isset( $_REQUEST['hot'] ) and $_REQUEST['hot']!='')
	{
		$id_up = $_REQUEST['hot'];
		$sql_sp = "update table_nhanxetkh set hot=IF(hot>0,0,1) where id='".$id_up."' ";
		$d->query($sql_sp);
	}
	
	#----------------------------------------------------------------------------------------
	if(isset( $_REQUEST['noibat'] ) and $_REQUEST['noibat']!='')
	{
		$id_up = $_REQUEST['noibat'];
		$sql_sp = "update table_nhanxetkh set noibat=IF(noibat>0,0,1) where id='".$id_up."' ";
		$d->query($sql_sp);
	}
	
	#----------------------------------------------------------------------------------------
	if(isset( $_REQUEST['hienthi'] ) and $_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "update table_nhanxetkh set hienthi=IF(hienthi>0,0,1) where id='".$id_up."' ";
		$d->query($sql_sp);
	}
	
	#-------------------------------------------------------------------------------
	$sql = "select * from #_nhanxetkh ";
	$sql.="  order by stt asc, id desc";
	
	
	$d->query($sql);
	$items = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=nhanxetkh&act=man";
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=nhanxetkh&act=man");
	
	$sql = "select * from #_nhanxetkh where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=nhanxetkh&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $loaitin,  $d,$item ,$menu,$cfn;
	$file_name=fns_Rand_digit(0,9,6);
	$file_name2=fns_Rand_digit(0,9,6);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=nhanxetkh&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], $cfn['width'], $cfn['height'], _upload_tintuc,$file_name,2);
			$d->setTable('nhanxetkh');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tintuc.$row['photo']);	
				delete_file(_upload_tintuc.$row['thumb']);	
							
			}
		}
		if($urlfile = upload_image("file2", 'pdf|doc|docx', _upload_tintuc,$file_name2)){
			$data['urlfile'] = $urlfile;									
			$d->setTable('nhanxetkh');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tintuc.$row['urlfile']);	
				
							
			}
		}
			
		$data['tenkhach'] = $_POST['tenkhach'];
		$data['tenkhach_rd'] = $_POST['tenkhach_rd'];
		$data['tenkhach_sd'] = $_POST['tenkhach_sd'];

		$data['tencongty'] = $_POST['tencongty'];
		$data['tencongty_rd'] = $_POST['tencongty_rd'];
		$data['tencongty_sd'] = $_POST['tencongty_sd'];
		
		$data['noidung'] = mysql_real_escape_string($_POST['noidung']);
		$data['noidung_sd'] = mysql_real_escape_string($_POST['noidung_sd']);
		$data['noidung_rd'] = mysql_real_escape_string($_POST['noidung_rd']);
						
		$data['stt'] = $_POST['stt'];

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('nhanxetkh');
		$d->setWhere('id', $id);
		if($d->update($data))
		{
			redirect("index.php?com=nhanxetkh&act=man");
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=nhanxetkh&act=man");
	}else{

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name))
		{
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], $cfn['width'], $cfn['height'], _upload_tintuc,$file_name,2);	
		}
		if($urlfile = upload_image("file2", 'pdf|doc|docx', _upload_tintuc,$file_name2))
		{
			$data['urlfile'] = $urlfile;		
				
		}
		
		$data['tenkhach'] = $_POST['tenkhach'];
		$data['tenkhach_rd'] = $_POST['tenkhach_rd'];
		$data['tenkhach_sd'] = $_POST['tenkhach_sd'];

		$data['tencongty'] = $_POST['tencongty'];
		$data['tencongty_rd'] = $_POST['tencongty_rd'];
		$data['tencongty_sd'] = $_POST['tencongty_sd'];

		$data['noidung'] = mysql_real_escape_string($_POST['noidung']);
		$data['noidung_sd'] = mysql_real_escape_string($_POST['noidung_sd']);
		$data['noidung_rd'] = mysql_real_escape_string($_POST['noidung_rd']);		

		$data['stt'] = $_POST['stt'];
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('nhanxetkh');
		if($d->insert($data))
		{
			redirect("index.php?com=nhanxetkh&act=man");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=nhanxetkh&act=man");
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
		$sql = "select id,thumb, photo from #_nhanxetkh where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_tintuc.$row['photo']);
				delete_file(_upload_tintuc.$row['thumb']);			
			}
		$sql = "delete from #_nhanxetkh where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=nhanxetkh&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=nhanxetkh&act=man");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select id,thumb, photo from #_nhanxetkh where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_tintuc.$row['photo']);
				delete_file(_upload_tintuc.$row['thumb']);
			}
			$sql = "delete from #_nhanxetkh where id='".$id."'";
			$d->query($sql);
		}
			
		} redirect("index.php?com=nhanxetkh&act=man");} else transfer("Không nhận được dữ liệu", "index.php?com=nhanxetkh&act=man");		
}
?>


