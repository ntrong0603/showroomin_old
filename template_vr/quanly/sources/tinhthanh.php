<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "tinhthanh/items";
		break;
	case "add":		
		
		thuoctinh();
		$template = "tinhthanh/item_add";
		break;
	case "edit":		
		get_item();
		
		thuoctinh();
		$template = "tinhthanh/item_add";
		break;
	case "save":
	if( $_GET['id']!='' ){get_item();}
	thuoctinh();
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	#===================================================	
	case "man_item":
		get_loais();
		$template = "tinhthanh/loais";
		break;
	case "add_item":		
		$template = "tinhthanh/loai_add";
		break;
	case "edit_item":		
	
		get_loai();
		$template = "tinhthanh/loai_add";
		break;
	case "save_item":
	if( $_GET['id']!='' ){get_loai();}
		save_loai();
		break;
	case "delete_item":
		delete_loai();
		break;
	#===================================================	
	case "man_cat":
		get_cats();
		$template = "tinhthanh/cats";
		break;
	case "add_cat":		
		$template = "tinhthanh/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "tinhthanh/cat_add";
		break;
	case "chuyencap_cat":				
		$template = "tinhthanh/cat_chuyencap";
		break;
	case "save_chuyencap_cat":				
		chuyencap_cat();
		break;
	case "save_cat":
	if( $_GET['id']!='' ){get_cat();}
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
	#===================================================	
	case "man_list":
		get_lists();
		$template = "tinhthanh/lists";
		break;
	case "add_list":		
		$template = "tinhthanh/list_add";
		break;
	case "edit_list":		
		get_list();
		$template = "tinhthanh/list_add";
		break;
	case "chuyencap_list":		
		$template = "tinhthanh/list_chuyencap";
		break;
	case "save_chuyencap_list":		
		chuyencap_list();
		break;
	case "save_list":
	if( $_GET['id']!='' ){get_list();}
		save_list();
		break;
	case "delete_list":
		delete_list();
		break;
	default:
		$template = "index";
		
		#===================================================	
	case "man_danhmuc":
		get_danhmucs();
		$template = "tinhthanh/danhmucs";
		break;
	case "add_danhmuc":		
		$template = "tinhthanh/danhmuc_add";
		break;
	case "edit_danhmuc":		
		get_danhmuc();
		$template = "tinhthanh/danhmuc_add";
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

function get_items(){
	global $d, $items, $paging;	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hot']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['hot'];
	$sql_sp = "SELECT id,hot FROM table_tinhthanh where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$time=time();
	$hienthi=$cats[0]['hot'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh SET hot ='$time' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh SET hot =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['spbanchay']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['spbanchay'];
	$sql_sp = "SELECT id,spbanchay FROM table_tinhthanh where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spbanchay=$cats[0]['spbanchay'];
	if($spbanchay==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh SET spbanchay =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh SET spbanchay =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['spphathanh']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['spphathanh'];
	$sql_sp = "SELECT id,spphathanh FROM table_tinhthanh where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spbanchay=$cats[0]['spphathanh'];
	if($spbanchay==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh SET spphathanh =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh SET spphathanh =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_tinhthanh where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$noibat=$cats[0]['noibat'];
	if($noibat==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh SET noibat =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['spmoi']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['spmoi'];
	$sql_sp = "SELECT id,spmoi FROM table_tinhthanh where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spmoi=$cats[0]['spmoi'];
	if($spmoi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh SET spmoi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh SET spmoi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_tinhthanh where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_tinhthanh";	
	if($_REQUEST['id_danhmuc']!='')
	{
	$sql.=" where id_danhmuc=".$_REQUEST['id_danhmuc']."";
	}
	if($_REQUEST['id_list']!='')
	{
	$sql.=" and id_list=".$_REQUEST['id_list']."";
	}
	if($_REQUEST['id_cat']!='')
	{
	$sql.=" and id_cat=".$_REQUEST['id_cat']."";
	}
	if($_REQUEST['id_item']!='')
	{
	$sql.=" and id_item=".$_REQUEST['id_item']."";
	}
	$sql.=" order by id_danhmuc,id_list,id_cat,id_item,stt,id desc";
	
	
	$d->query($sql);
	$items = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=tinhthanh&act=man&id_danhmuc=".$_GET['id_danhmuc']."&id_list=".$_GET['id_list']."&id_cat=".$_GET['id_cat']."&id_item=".$_GET['id_item'];
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}
function thuoctinh(){
		global $d,$danhmucthuoctinh,$thuoctinh;
		$d->reset();
	$d->setTable('thuoctinh_danhmuc');
	$d->select();
	$danhmucthuoctinh=$d->result_array();
	
	$d->reset();
	$d->setTable('thuoctinh');
	$d->select();
	$thuoctinh=$d->result_array();
}
function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=tinhthanh&act=man");
	
	$sql = "select * from #_tinhthanh where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tinhthanh&act=man");
	$item = $d->fetch_array();	
	

}

function save_item(){
	global $d,$item,$thuoctinh,$danhmucthuoctinh;
	$file_name=fns_Rand_digit(0,9,6);
	
if(!isset( $_POST['save'] )){ transfer("Không nhận được dữ liệu", "index.php?com=tinhthanh&act=man");}
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 400, 500, _upload_sanpham,$file_name,2);	
	$d->reset();			
			$d->reset();$d->setTable('tinhthanh');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);	
				delete_file(_upload_sanpham.$row['thumb']);	
							
			}
		}
		
		$data['id_danhmuc'] = $_POST['id_danhmuc'];
		$data['thuoctinh']=",";
		for($j=0,$countj=count($thuoctinh);$j<$countj;$j++){ 
			if( isset( $_POST['thuoctinh'.$thuoctinh[$j]['id']] ) ){
				if($_POST['thuoctinh'.$thuoctinh[$j]['id']]==true){
				$data['thuoctinh']=$data['thuoctinh'].$_POST['thuoctinh'.$thuoctinh[$j]['id']].",";
				}
			}
		}
		
		$data['id_list'] = $_POST['id_list'];	
		$data['id_cat'] = $_POST['id_cat'];	
		$data['id_item'] = $_POST['id_item'];		
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];	
	$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['keyword'] = $_POST['keyword'];
		$data['description'] = $_POST['description'];
		$data['maso'] = $_POST['maso'];			
		$data['gia'] = $_POST['gia'];
		$data['giakm'] = $_POST['giakm'];
		
		
		$data['chatlieu'] = $_POST['chatlieu'];
		$data['trongluong'] = $_POST['trongluong'];
		$data['kichthuoc'] = $_POST['kichthuoc'];
		
		$data['noidung'] = addslashes($_POST['noidung']);$data['noidung_sd'] = addslashes($_POST['noidung_sd']);$data['noidung_rd'] = addslashes($_POST['noidung_rd']);
		$data['mota'] = addslashes($_POST['mota']);$data['mota_sd'] = addslashes($_POST['mota_sd']);$data['mota_rd'] = addslashes($_POST['mota_rd']);
		
		
						
		$data['stt'] = $_POST['stt'];
		
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['spmoi'] = isset($_POST['spmoi']) ? 1 : 0;
		$data['spbanchay'] = isset($_POST['spbanchay']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->reset();$d->setTable('tinhthanh');
		$d->setWhere('id', $id);
		if($d->update($data))
		{
		transfer("Lưu thành công ", "index.php?com=tinhthanh&act=edit&id=".$item['id']."&id_list=".$item['id_list']."&id_cat=".$item['id_cat']."&id_danhmuc=".$item['id_danhmuc']."&id_item=".$item['id_item']);
		}	else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tinhthanh&act=man");
	}else{

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name))
		{
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 500, _upload_sanpham,$file_name,2);	
		}
	$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['mota'] = addslashes($_POST['mota']);$data['mota_sd'] = addslashes($_POST['mota_sd']);$data['mota_rd'] = addslashes($_POST['mota_rd']);
		
		$data['id_danhmuc'] = $_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat'] = $_POST['id_cat'];	
		$data['id_item'] =$_POST['id_item'];		
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];	

		$data['keyword'] = $_POST['keyword'];
		$data['description'] = $_POST['description'];
		$data['maso'] = $_POST['maso'];			
		$data['gia'] = $_POST['gia'];	
		$data['tag'] = $_POST['tag'];
		$data['giakm'] = $_POST['giakm'];
		$data['noidung'] = addslashes($_POST['noidung']);$data['noidung_sd'] = addslashes($_POST['noidung_sd']);$data['noidung_rd'] = addslashes($_POST['noidung_rd']);		
		$data['thuoctinh']=",";
		for($j=0,$countj=count($thuoctinh);$j<$countj;$j++){ 
			if( isset( $_POST['thuoctinh'.$thuoctinh[$j]['id']] ) ){
				if($_POST['thuoctinh'.$thuoctinh[$j]['id']]==true){
				$data['thuoctinh']=$data['thuoctinh'].$_POST['thuoctinh'.$thuoctinh[$j]['id']].",";
				}
			}
		}
		
		$data['chatlieu'] = $_POST['chatlieu'];
		$data['trongluong'] = $_POST['trongluong'];
		$data['kichthuoc'] = $_POST['kichthuoc'];
		$data['stt'] = $_POST['stt'];
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['spmoi'] = isset($_POST['spmoi']) ? 1 : 0;
		$data['spbanchay'] = isset($_POST['spbanchay']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		
		$d->reset();
		$d->setTable('tinhthanh');
		
		
		if($d->insert($data)){
			$d->reset();
			$d->reset();$d->setTable('tinhthanh');
			$d->setOrder('id desc');
			$d->setLimit( 1 );
			$d->select();
			$abd=$d->fetch_array();
			
		transfer("Thêm thành công", "index.php?com=tinhthanh&act=edit&id=".$abd['id']."&id_list=".$abd['id_list']."&id_cat=".$abd['id_cat']."&id_danhmuc=".$abd['id_danhmuc']."&id_item=".$abd['id_item'] );
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=tinhthanh&act=man");
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
		$sql = "select id,thumb, photo from #_tinhthanh where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);			
			}
		$sql = "delete from #_tinhthanh where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=tinhthanh&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=tinhthanh&act=man");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select id,thumb, photo from #_tinhthanh where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
			$sql = "delete from #_tinhthanh where id='".$id."'";
			$d->query($sql);
		}
			
		} redirect("index.php?com=tinhthanh&act=man");} else transfer("Không nhận được dữ liệu", "index.php?com=tinhthanh&act=man");
		
}

#====================================

function get_loais(){
	global $d, $items, $paging;
	
	$sql = "select * from #_tinhthanh_item";
	if($_REQUEST['id_danhmuc']!='')
	{
	$sql.=" where id_danhmuc=".$_REQUEST['id_danhmuc']."";
	}
	if($_REQUEST['id_list']!='')
	{
	$sql.=" and id_list=".$_REQUEST['id_list']."";
	}
	if($_REQUEST['id_cat']!='')
	{
	$sql.=" and id_cat=".$_REQUEST['id_cat']."";
	}
	$sql.=" order by stt";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=tinhthanh&act=man_item&id_danhmuc=".$_GET['id_danhmuc']."&id_list=".$_GET['id_list']."&id_cat=".$_GET['id_cat'];
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_loai(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=tinhthanh&act=man_item");
	
	$sql = "select * from #_tinhthanh_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tinhthanh&act=man_item");
	$item = $d->fetch_array();
}

function save_loai(){
	global $d,$item;
	$file_name=fns_Rand_digit(0,9,6);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=tinhthanh&act=man_item");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){	
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 200, _upload_sanpham,$file_name,2);	
				$d->reset();
			$d->reset();$d->setTable('tinhthanh_item');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);	
				delete_file(_upload_sanpham.$row['thumb']);				
			}
		}
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['id_danhmuc'] = $_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];	
		$data['id_cat'] = $_POST['id_cat'];			
		$data['stt'] = $_POST['stt'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keyword'] = $_POST['keyword'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
			$d->reset();$d->setTable('tinhthanh_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			transfer("Lưu thành công","index.php?com=tinhthanh&act=edit_item&id=".$item['id']."&id_list=".$item['id_list']."&id_cat=".$item['id_cat']."&id_danhmuc=".$item['id_danhmuc']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tinhthanh&act=man_item");
	}else{		
		 if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;			
			$data['thumb'] = create_thumb($data['photo'], 400, 200, _upload_sanpham,$file_name,2);
		}
		$data['id_danhmuc'] = $_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat'] = $_POST['id_cat'];
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keyword'] = $_POST['keyword'];
	$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->reset();$d->setTable('tinhthanh_item');
		if($d->insert($data)){
			$d->reset();
			$d->reset();$d->setTable('tinhthanh_item');
			$d->setOrder('id desc');
			$d->setLimit( 1 );
			$d->select();
			$abd=$d->fetch_array();
			
		transfer("Thêm thành công", "index.php?com=tinhthanh&act=edit_item&id=".$abd['id']."&id_list=".$abd['id_list']."&id_cat=".$abd['id_cat']."&id_danhmuc=".$abd['id_danhmuc'] );
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=tinhthanh&act=man_item");
	}
}

function delete_loai(){
	global $d;
	if(isset($_GET['id']))
	{
		$id =  themdau($_GET['id']);		
		$d->reset();		
			//Xóa danh mục cấp 4
			$sql = "delete from #_tinhthanh_item where id='".$id."'";
			$d->query($sql);
		
		
		
		if($d->query($sql))
			redirect("index.php?com=tinhthanh&act=man_item");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=tinhthanh&act=man_item");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_tinhthanh_item where id='".$id."'";
				$d->query($sql);
				
			
		} redirect("index.php?com=tinhthanh&act=man_item");} else transfer("Không nhận được dữ liệu", "index.php?com=tinhthanh&act=man_item");
}
/*---------------------------------*/
function get_cats(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_tinhthanh_cat where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh_cat SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh_cat SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_tinhthanh_cat";	
	if($_REQUEST['id_danhmuc']!='')
	{
	$sql.=" where id_danhmuc=".$_REQUEST['id_danhmuc']."";
	}
	if($_REQUEST['id_list']!='')
	{
	$sql.=" and id_list=".$_REQUEST['id_list']."";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=tinhthanh&act=man_cat&id_danhmuc=".$_GET['id_danhmuc']."&id_list=".$_GET['id_list'];
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=tinhthanh&act=man_cat");
	
	$sql = "select * from #_tinhthanh_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tinhthanh&act=man_cat");
	$item = $d->fetch_array();	
}

function save_cat(){
	global $d,$item;
	$file_name=fns_Rand_digit(0,9,6);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=tinhthanh&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){	
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 400, 200, _upload_sanpham,$file_name,2);
	$d->reset();			
			$d->reset();$d->setTable('tinhthanh_cat');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);	
				delete_file(_upload_sanpham.$row['thumb']);				
			}
		}
		$data['id_danhmuc'] = $_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['stt'] = $_POST['stt'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keyword'] = $_POST['keyword'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
			$d->reset();$d->setTable('tinhthanh_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			transfer("Lưu thành công","index.php?com=tinhthanh&act=edit_cat&id=".$item['id']."&id_list=".$item['id_list']."&id_danhmuc=".$item['id_danhmuc']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tinhthanh&act=man_cat");
	}else{				
		 if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 200, _upload_sanpham,$file_name,2);
		}
		$data['id_danhmuc'] = $_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keyword'] = $_POST['keyword'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->reset();$d->setTable('tinhthanh_cat');
		if($d->insert($data)){
			$d->reset();
			$d->reset();$d->setTable('tinhthanh_cat');
			$d->setOrder('id desc');
			$d->setLimit( 1 );
			$d->select();
			$abd=$d->fetch_array();
			
		transfer("Thêm thành công", "index.php?com=tinhthanh&act=edit_cat&id=".$abd['id']."&id_list=".$abd['id_list']."&id_danhmuc=".$abd['id_danhmuc']);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=tinhthanh&act=man_cat");
	}
}

function chuyencap_cat(){	
	global $d;
	$d->reset();
	$capchuyen = $_REQUEST['capchuyen'];
	$id_cat = $_REQUEST['id_cat'];
	if($id_cat == 0)
	{
		transfer("Bạn chưa chọn danh mục cần chuyển", "index.php?com=tinhthanh&act=chuyencap_cat");
	}
	if($capchuyen == 2)
	{
		#####Lấy id_list MAX
		$sql = "SELECT id FROM table_tinhthanh_list ORDER BY id desc";
		$d->query($sql);
		$max1 = $d->result_array();
		$max = $max1[0]['id']+1;
		
		#####Lấy id_list của danh mục cần chuyển cấp
		$sql = "SELECT id_list FROM table_tinhthanh_cat WHERE id='".$id_cat."'";
		$d->query($sql);
		$id_list1 = $d->result_array();
		$id_list = $id_list1[0]['id_list'];
			
		
		$sql = "INSERT INTO table_tinhthanh_list (ten,tenkhongdau,photo,hienthi,ngaytao,ngaysua,stt,id_danhmuc) 
	SELECT ten,tenkhongdau,photo,hienthi,ngaytao,ngaysua,stt,id_danhmuc FROM table_tinhthanh_cat WHERE id='".$id_cat."'";
		$result = $d->query($sql);
		if($result == true)
		{
			$sql2 = "UPDATE table_tinhthanh SET id_list='".$max."' WHERE id_list ='".$id_list."' and id_cat='".$id_cat."'";
			$result = $d->query($sql2);
			if($result == true)
			{
				$sql3 = "DELETE from table_tinhthanh_cat WHERE id='".$id_cat."'";
				$result = $d->query($sql3);
				if($result == true)
				{
					transfer("Bạn đã chuyển từ danh mục cấp 3 lên danh mục cấp 2", "index.php?com=tinhthanh&act=man_cat");
				}
			}				
		}
	}
	else if($capchuyen == 4)
	{
		transfer("Chuyển cấp này chưa được làm", "index.php?com=tinhthanh&act=chuyencap_cat");
	}
}


function delete_cat(){
	global $d;
	if(isset($_GET['id']))
	{
		$id =  themdau($_GET['id']);		
		$d->reset();		
			
			//Xóa danh mục cấp 3
			$sql = "select id,thumb,photo from #_tinhthanh_cat where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
				$sql = "delete from #_tinhthanh_cat where id='".$id."'";
				$d->query($sql);
			}
		
		
		if($d->query($sql))
			redirect("index.php?com=tinhthanh&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=tinhthanh&act=man_cat");

	

	}elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_tinhthanh_cat where id='".$id."'";
				$d->query($sql);
				
			
		} redirect("index.php?com=tinhthanh&act=man_cat");} else transfer("Không nhận được dữ liệu", "index.php?com=tinhthanh&act=man_cat"	    );
							
}
/*---------------------------------*/
function get_lists(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_tinhthanh_list where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh_list SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh_list SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_tinhthanh_list";	
	if($_REQUEST['id_danhmuc']!='')
	{
	$sql.=" where id_danhmuc=".$_REQUEST['id_danhmuc']."";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=tinhthanh&act=man_list&id_danhmuc=".$_GET['id_danhmuc'];
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_list(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=tinhthanh&act=man_list");
	
	$sql = "select * from #_tinhthanh_list where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tinhthanh&act=man_list");
	$item = $d->fetch_array();	
}

function save_list(){
	global $d;
	$file_name=$_FILES['file']['name'];
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=tinhthanh&act=man_list");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$id =  themdau($_POST['id']);
		
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keyword'] = $_POST['keyword'];
		
		
		$d->setTable('tinhthanh_list');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=tinhthanh&act=man_list&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tinhthanh&act=man_list");
	}else{		
		 
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keyword'] = $_POST['keyword'];
		
		
		$d->setTable('tinhthanh_list');
		if($d->insert($data))
			redirect("index.php?com=tinhthanh&act=man_list");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=tinhthanh&act=man_list");
	}
}

function delete_list(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_tinhthanh_list where id='".$id."'";
				$d->query($sql);
				
			
		
		if($d->query($sql))
			redirect("index.php?com=tinhthanh&act=man_list");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=tinhthanh&act=man_list");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_tinhthanh_list where id='".$id."'";
				$d->query($sql);
				
			
				
			
		} redirect("index.php?com=tinhthanh&act=man_list");} else transfer("Không nhận được dữ liệu", "index.php?com=tinhthanh&act=man_list"	    );
}


/*---------------------------------*/
function get_danhmucs(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_tinhthanh_danhmuc where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh_danhmuc SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh_danhmuc SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_tinhthanh_danhmuc where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['noibat'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh_danhmuc SET noibat =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tinhthanh_danhmuc SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_tinhthanh_danhmuc";
	if($_REQUEST['id_danhmuc']!='')
	{
	$sql.=" where id_danhmuc=".$_REQUEST['id_danhmuc']."";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=tinhthanh&act=man_danhmuc";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_danhmuc(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=tinhthanh&act=man_danhmuc");
	
	$sql = "select * from #_tinhthanh_danhmuc where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tinhthanh&act=man_danhmuc");
	$item = $d->fetch_array();	
}

function save_danhmuc(){
	global $d,$item;
	$file_name=fns_Rand_digit(0,9,6);
	$file_name2=fns_Rand_digit(0,9,6);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=tinhthanh&act=man_danhmuc");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['description'] = $_POST['description'];
		$data['keyword'] = $_POST['keyword'];
		$data['title'] = $_POST['title'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$d->reset();$d->setTable('tinhthanh_danhmuc');
		$d->setWhere('id', $id);
		if($d->update($data))
			transfer("Lưu thành công","index.php?com=tinhthanh&act=man_danhmuc");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tinhthanh&act=man_danhmuc");
	}else{			
		 
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['description'] = $_POST['description'];
		$data['keyword'] = $_POST['keyword'];
		$data['title'] = $_POST['title'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->reset();$d->setTable('tinhthanh_danhmuc');
		if($d->insert($data)){
			$d->reset();
			$d->reset();$d->setTable('tinhthanh_danhmuc');
			$d->setOrder('id desc');
			$d->setLimit( 1 );
			$d->select();
			$abd=$d->fetch_array();
			
		transfer("Thêm thành công", "index.php?com=tinhthanh&act=man_danhmuc");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=tinhthanh&act=man_danhmuc");
	}
}

function delete_danhmuc(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
			$sql = "delete from #_tinhthanh_danhmuc where id='".$id."'";
			$d->query($sql);
			
		
		
		if($d->query($sql))
			redirect("index.php?com=tinhthanh&act=man_danhmuc");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=tinhthanh&act=man_danhmuc");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_tinhthanh_danhmuc where id='".$id."'";
				$d->query($sql);
				

				
				
		} redirect("index.php?com=tinhthanh&act=man_danhmuc");} else transfer("Không nhận được dữ liệu", "index.php?com=tinhthanh&act=man_danhmuc"	    );
}
?>


