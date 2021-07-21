<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
if( isset( $_GET['loaitin'] ) ){$loaitin=$_GET['loaitin'];}
if( isset( $_REQUEST['id'] ) ){$id=$_REQUEST['id'];}
switch($act){

	
		#===================================================	
	case "man_danhmuc":
		get_danhmucs();
		$template = "concept/danhmucs";
		break;
	case "add_danhmuc":		
		$template = "concept/danhmuc_add";
		break;
	case "edit_danhmuc":		
		get_danhmuc();
		$template = "concept/danhmuc_add";
		break;
	case "save_danhmuc":
	if( $_GET['id']!='' ){get_danhmuc();}
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

/*---------------------------------*/
function get_danhmucs(){
	global $loaitin,  $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_concept where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_concept SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_concept SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_concept where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['noibat'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_concept SET noibat =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_concept SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_concept where loaitin = '".$loaitin."'";
	if((int)$_REQUEST['id_danhmuc']!='')
	{
	$sql.=" and id_danhmuc=".(int)$_REQUEST['id_danhmuc']."";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=concept&loaitin=".$loaitin."&act=man_danhmuc";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_danhmuc(){
	global $loaitin,  $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=concept&loaitin=".$loaitin."&act=man_danhmuc");
	
	$sql = "select * from #_concept where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=concept&loaitin=".$loaitin."&act=man_danhmuc");
	$item = $d->fetch_array();	
}

function save_danhmuc(){
	global $loaitin,  $d,$item;
	$file_name=fns_Rand_digit(0,9,6);
	$file_name2=fns_Rand_digit(0,9,6);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=concept&loaitin=".$loaitin."&act=man_danhmuc");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 400, 200, _upload_tintuc,$file_name,2);									
			$d->setTable('concept');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tintuc.$row['photo']);	
				delete_file(_upload_tintuc.$row['thumb']);	
							
			}
		}
		
		
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		$data['loaitin'] = $loaitin;
		$data['tenkhongdau']=changeTitle($_POST['ten']);
		
		$data['stt'] = $_POST['stt'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keyword'] = $_POST['keyword'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('concept');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=concept&loaitin=".$loaitin."&act=man_danhmuc&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=concept&loaitin=".$loaitin."&act=man_danhmuc");
	}else{			
		  if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 200, _upload_tintuc,$file_name,2);			
				
			}
			if($photo2 = upload_image("file2", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name2)){
			$data['photo2'] = $photo2;		
			$data['thumb2'] = create_thumb($data['photo2'], 270, 195, _upload_tintuc,$file_name2,2);			
				
			}
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		$data['loaitin'] = $loaitin;
		$data['description'] = $_POST['description'];
		$data['keyword'] = $_POST['keyword'];
		$data['title'] = $_POST['title'];
$data['tenkhongdau']=changeTitle($_POST['ten']);
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('concept');
		if($d->insert($data))
			redirect("index.php?com=concept&loaitin=".$loaitin."&act=man_danhmuc");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=concept&loaitin=".$loaitin."&act=man_danhmuc");
	}
}

function delete_danhmuc(){
	global $loaitin,  $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
			//Xóa danh mục cấp 1
			$sql = "delete from #_concept where id='".$id."'";
			$d->query($sql);
			
		
		
		if($d->query($sql))
			redirect("index.php?com=concept&loaitin=".$loaitin."&act=man_danhmuc");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=concept&loaitin=".$loaitin."&act=man_danhmuc");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_concept where id='".$id."'";
				$d->query($sql);
				
				
			
		} redirect("index.php?com=concept&loaitin=".$loaitin."&act=man_danhmuc");} else transfer("Không nhận được dữ liệu", "index.php?com=concept&loaitin=".$loaitin."&act=man_danhmuc"	    );
}
?>


