<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
if( isset( $_GET['loaitin'] ) ){
	$loaitin=$_GET['loaitin'];}
if( isset( $_GET['id_place'] ) ){
	$id_place=$_GET['id_place'];}
if( isset( $_REQUEST['id'] ) ){$id=$_REQUEST['id'];}
switch($act){

	case "man":
		thuoctinh();
		get_items();
		
		$template = "news/items";
		break;
	case "add":		
		
		thuoctinh();
		$template = "news/item_add";
		break;
	case "edit":	
		thuoctinh();	
		get_item();
		
		
		$template = "news/item_add";
		break;
	case "save":
	thuoctinh();
	if( $_GET['id']!='' ){get_item();}
		
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	#===================================================	
	case "man_item":
		get_loais();
		$template = "news/loais";
		break;
	case "add_item":		
		$template = "news/loai_add";
		break;
	case "edit_item":		
		get_loai();
		$template = "news/loai_add";
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
		$template = "news/cats";
		break;
	case "add_cat":		
		$template = "news/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "news/cat_add";
		break;
	case "chuyencap_cat":				
		$template = "news/cat_chuyencap";
		break;
	case "save_chuyencap_cat":				
		chuyencap_cat();
		break;
	case "save_cat":
	if( $_GET['id']!='' ){get_item();}
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
	#===================================================	
	case "man_list":
		get_lists();
		$template = "news/lists";
		break;
	case "add_list":		
		$template = "news/list_add";
		break;
	case "edit_list":		
		get_list();
		$template = "news/list_add";
		break;
	case "chuyencap_list":		
		$template = "news/list_chuyencap";
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
		$template = "news/danhmucs";
		break;
	case "add_danhmuc":		
		$template = "news/danhmuc_add";
		break;
	case "edit_danhmuc":		
		get_danhmuc();
		$template = "news/danhmuc_add";
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
function get_items(){
	global $loaitin,  $d, $items, $paging, $id_place;	
	#----------------------------------------------------------------------------------------
	if(isset( $_REQUEST['hot'] ) and $_REQUEST['hot']!='')
	{
	$id_up = $_REQUEST['hot'];
	$sql_sp = "SELECT id,hot FROM table_news where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$time=time();
	$hienthi=$cats[0]['hot'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET hot ='$time' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET hot =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	
	#----------------------------------------------------------------------------------------
	if(isset( $_REQUEST['spbanchay'] ) and $_REQUEST['spbanchay']!='')
	{
		
	$id_up = $_REQUEST['spbanchay'];
	$sql_sp = "SELECT id,spbanchay FROM table_news where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spbanchay=$cats[0]['spbanchay'];
	if($spbanchay==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET spbanchay =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET spbanchay =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	
	#----------------------------------------------------------------------------------------
	if(isset( $_REQUEST['spphathanh'] ) and $_REQUEST['spphathanh']!='')
	{
	$id_up = $_REQUEST['spphathanh'];
	$sql_sp = "SELECT id,spphathanh FROM table_news where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spbanchay=$cats[0]['spphathanh'];
	if($spbanchay==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET spphathanh =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET spphathanh =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if(isset( $_REQUEST['noibat'] ) and $_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_news where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$noibat=$cats[0]['noibat'];
	if($noibat==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET noibat =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if(isset( $_REQUEST['phai'] ) and $_REQUEST['phai']!='')
	{
	$id_up = $_REQUEST['phai'];
	$sql_sp = "SELECT id,phai FROM table_news where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$phai=$cats[0]['phai'];
	if($phai==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET phai =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET phai =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	#----------------------------------------------------------------------------------------
	if(isset( $_REQUEST['trai'] ) and $_REQUEST['trai']!='')
	{
	$id_up = $_REQUEST['trai'];
	$sql_sp = "SELECT id,trai FROM table_news where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$trai=$cats[0]['trai'];
	if($trai==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET trai =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET trai =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if(isset(  $_REQUEST['spmoi']) and $_REQUEST['spmoi']!='')
	{
	$id_up = $_REQUEST['spmoi'];
	$sql_sp = "SELECT id,spmoi FROM table_news where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spmoi=$cats[0]['spmoi'];
	if($spmoi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET spmoi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET spmoi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if(isset( $_REQUEST['hienthi'] ) and $_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_news where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$fgh="";
	$ghj=0;
	$array_new= array("hienthi","trangchu","noibat","trai","phai");
	for($i=0;$i<count ($array_new);$i++){
		
		foreach($_GET as $key=>$v){
		if ($array_new[$i]==$key){
			$fgh=$key;
			$ghj=1;
			break;
		}
		
	}
	}
	$re_new="";
		foreach($_GET as $key=>$v){
		if ($fgh==$key){
			
		}else{
			$re_new.="&".$key."=".$v;
		}
		
		}
	if($ghj==1){
		redirect("index.php?".$re_new);
	}
	
	$sql = "select * from #_news where loaitin = '".$loaitin."' and id_place='".$id_place."'";	
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
	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		
		$sql.=" and ten LIKE '%$keyword%'";
		
		
	}
	$sql.=" order by id_danhmuc,id_list,id_cat,id_item,stt,id desc";
	
	
	$d->query($sql);
	$items = $d->result_array();
	$p = isset($_GET['p']) ? $_GET['p'] : 1;
	$id_danhmuc='';
	$id_cat='';
	$id_list='';
	$id_item='';
	if( isset( $_GET['id_danhmuc'] ) ){$id_danhmuc=$_GET['id_danhmuc'];}
	if( isset( $_GET['id_list'] ) ){$id_list=$_GET['id_list'];}
	if( isset( $_GET['id_cat'] ) ){$id_cat=$_GET['id_cat'];}
	if( isset( $_GET['id_item'] ) ){$id_item=$_GET['id_item'];}
	$p = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=news&loaitin=".$loaitin."&act=man&id_danhmuc=".$id_danhmuc."&id_list=".$id_list."&id_cat=".$id_cat."&id_item=".$id_item;
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $p, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $loaitin,  $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=news&loaitin=".$loaitin."&id_place=".$id_place."&act=man");
	
	$sql = "select * from #_news where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=news&loaitin=".$loaitin."&id_place=".$id_place."&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $loaitin,$id_place,  $d,$item ,$menu,$thuoctinh,$danhmucthuoctinh;
	$file_name=changeTitle($_POST['ten']).time();
	$file_name2=changeTitle($_POST['ten']).time()."-2";
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=news&loaitin=".$loaitin."&id_place=".$id_place."&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], $menu[$loaitin]['width'], $menu[$loaitin]['height'], _upload_tintuc,$file_name,2);									
		
		}
		if($urlfile = upload_image("file2", 'pdf|doc|docx', _upload_tintuc,$file_name2)){
			$data['urlfile'] = $urlfile;									
			$d->setTable('news');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				//delete_file(_upload_tintuc.$row['urlfile']);	
				
							
			}
		}
		$data['thuoctinh']=",";
		for($j=0,$countj=count($thuoctinh);$j<$countj;$j++){ 
			if( isset( $_POST['thuoctinh'.$thuoctinh[$j]['id']] ) ){
				if($_POST['thuoctinh'.$thuoctinh[$j]['id']]==true){
				$data['thuoctinh']=$data['thuoctinh'].$_POST['thuoctinh'.$thuoctinh[$j]['id']].",";
				}
			}
		}
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['id_list'] = (int)$_POST['id_list'];	
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['id_item'] = (int)$_POST['id_item'];	
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];	
		$data['tag'] = $_POST['tag'];	
		$data['loaitin'] = $_POST['loaitin'];	
		$data['id_place'] = $_POST['id_place'];
		
		if($_POST['tenkhongdau']==$item['tenkhongdau'] and $_POST['tenkhongdau']!='')
		{
			$data['tenkhongdau']=$_POST['tenkhongdau'];
		}else
		{
			if ($_POST['tenkhongdau']=='')
			{
				$tenkhongdau=changeTitle($_POST['ten']);
			}
			else
			{
				$tenkhongdau = changeTitle($_POST['tenkhongdau']);
			}
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
		$data['thuoctinh']=",";
		for($j=0,$countj=count($thuoctinh);$j<$countj;$j++){ 
			if( isset( $_POST['thuoctinh'.$thuoctinh[$j]['id']] ) ){
				if($_POST['thuoctinh'.$thuoctinh[$j]['id']]==true){
				$data['thuoctinh']=$data['thuoctinh'].$_POST['thuoctinh'.$thuoctinh[$j]['id']].",";
				}
			}
		}
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		
		
		$data['noidung'] = addslashes($_POST['noidung']);$data['noidung_sd'] = addslashes($_POST['noidung_sd']);$data['noidung_rd'] = addslashes($_POST['noidung_rd']);
		$data['mota'] = addslashes($_POST['mota']);$data['mota_sd'] = addslashes($_POST['mota_sd']);$data['mota_rd'] = addslashes($_POST['mota_rd']);
		
		
						
		$data['stt'] = $_POST['stt'];
		
		$data['trai'] = isset($_POST['trai']) ? 1 : 0;
		$data['phai'] = isset($_POST['phai']) ? 1 : 0;

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('news');
		$d->setWhere('id', $id);
		if($d->update($data))
			transfer("Lưu thành công ",$_SESSION['backurl']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=news&id_place=".$id_place."&loaitin=".$loaitin."&act=man");
	}else{

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name))
		{
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], $menu[$loaitin]['width'], $menu[$loaitin]['height'], _upload_tintuc,$file_name,2);	
		}
		if($urlfile = upload_image("file2", 'pdf|doc|docx', _upload_tintuc,$file_name2))
		{
			$data['urlfile'] = $urlfile;		
				
		}
		$data['mota'] = addslashes($_POST['mota']);$data['mota_sd'] = addslashes($_POST['mota_sd']);$data['mota_rd'] = addslashes($_POST['mota_rd']);
		
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['id_list'] = (int)$_POST['id_list'];
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['id_item'] = (int)$_POST['id_item'];		
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];	
		
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
		$data['loaitin'] = $_POST['loaitin'];	
		$data['id_place'] = $_POST['id_place'];		
		$data['tag'] = $_POST['tag'];
		$data['noidung'] = addslashes($_POST['noidung']);$data['noidung_sd'] = addslashes($_POST['noidung_sd']);$data['noidung_rd'] = addslashes($_POST['noidung_rd']);		
	
		$sql="select max(stt) as stt from table_news where loaitin='$loaitin'";
		$d->query($sql);
		$stt=$d->fetch_array();
	
		$data['stt'] = $stt['stt'] +1 ;
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$data['trai'] = isset($_POST['trai']) ? 1 : 0;
		$data['phai'] = isset($_POST['phai']) ? 1 : 0;
		$data['thuoctinh']=",";
		for($j=0,$countj=count($thuoctinh);$j<$countj;$j++){ 
			if( isset( $_POST['thuoctinh'.$thuoctinh[$j]['id']] ) ){
				if($_POST['thuoctinh'.$thuoctinh[$j]['id']]==true){
				$data['thuoctinh']=$data['thuoctinh'].$_POST['thuoctinh'.$thuoctinh[$j]['id']].",";
				}
			}
		}
		
		
		$d->setTable('news');
		if($d->insert($data))
			redirect("index.php?com=news&loaitin=".$loaitin."&id_place=".$id_place."&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=news&id_place=".$id_place."&loaitin=".$loaitin."&act=man");
	}
}

function delete_item(){
	global $loaitin,  $d,$id_place;
	if($_REQUEST['id_cat']!='')
	{ $id_catt="&id_cat=".$_REQUEST['id_cat'];
	}
	if($_REQUEST['p']!='')
	{ $id_catt.="&p=".$_REQUEST['p'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,thumb, photo from #_news where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				//delete_file(_upload_tintuc.$row['photo']);
				//delete_file(_upload_tintuc.$row['thumb']);			
			}
		$sql = "delete from #_news where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=news&loaitin=".$loaitin."&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=news&id_place=".$id_place."&loaitin=".$loaitin."&act=man");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select id,thumb, photo from #_news where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				//delete_file(_upload_tintuc.$row['photo']);
				//delete_file(_upload_tintuc.$row['thumb']);
			}
			$sql = "delete from #_news where id='".$id."'";
			$d->query($sql);
		}
			
		} redirect("index.php?com=news&id_place=".$id_place."&loaitin=".$loaitin."&act=man");} else transfer("Không nhận được dữ liệu", "index.php?com=news&id_place=".$id_place."&loaitin=".$loaitin."&act=man");
		
}

#====================================

function get_loais(){
	global $loaitin,  $d, $items, $paging;
	
	$sql = "select * from #_news_item where loaitin = '".$loaitin."'";
	if((int)$_REQUEST['id_danhmuc']!='')
	{
	$sql.=" and id_danhmuc=".$_REQUEST['id_danhmuc']."";
	}
	if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" and id_list=".$_REQUEST['id_list']."";
	}
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" and id_cat=".$_REQUEST['id_cat']."";
	}
	$sql.=" order by stt";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$p = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=news&loaitin=".$loaitin."&act=man_item&id_danhmuc=".$_GET['id_danhmuc']."&id_list=".$_GET['id_list']."&id_cat=".$_GET['id_cat'];
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $p, $maxR, $maxP);
	$items=$paging['source'];
}

function get_loai(){
	global $loaitin,  $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=news&loaitin=".$loaitin."&act=man_item");
	
	$sql = "select * from #_news_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=news&loaitin=".$loaitin."&act=man_item");
	$item = $d->fetch_array();
}

function save_loai(){
	global $loaitin,  $d,$item;
	$file_name=changeTitle($_POST['ten']).time();
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=news&loaitin=".$loaitin."&act=man_item");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){	
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 200, _upload_tintuc,$file_name,2);	
			$d->setTable('news_item');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				//delete_file(_upload_tintuc.$row['photo']);	
				//delete_file(_upload_tintuc.$row['thumb']);				
			}
		}
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
	
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
	
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];	
		$data['id_cat'] = $_POST['id_cat'];			
		$data['loaitin'] =$loaitin;			
		$data['stt'] = $_POST['stt'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('news_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=news&loaitin=".$loaitin."&act=man_item&p=".$_REQUEST['p']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=news&loaitin=".$loaitin."&act=man_item");
	}else{		
		 if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name)){
			$data['photo'] = $photo;			
			$data['thumb'] = create_thumb($data['photo'], 400, 200, _upload_tintuc,$file_name,2);
		}
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat'] = $_POST['id_cat'];
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		$data['loaitin'] = $loaitin;
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
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
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('news_item');
		if($d->insert($data))
			redirect("index.php?com=news&loaitin=".$loaitin."&act=man_item");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=news&loaitin=".$loaitin."&act=man_item");
	}
}

function delete_loai(){
	global $loaitin,  $d;
	if(isset($_GET['id']))
	{
		$id =  themdau($_GET['id']);		
		$d->reset();		
			//Xóa danh mục cấp 4
			$sql = "delete from #_news_item where id='".$id."'";
			$d->query($sql);
			//Xóa sản phẩm thuộc loại đó
			$sql = "select id,thumb,photo from #_news where id_item='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					//delete_file(_upload_tintuc.$row['photo']);
					//delete_file(_upload_tintuc.$row['thumb']);	
				}
				$data['id_item'] = 0;
				$d->setTable('news');
				$d->setWhere('id_item', $id);
				$d->update($data);
			}
			
		
		
		if($d->query($sql))
			redirect("index.php?com=news&loaitin=".$loaitin."&act=man_item");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=news&loaitin=".$loaitin."&act=man_item");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_news_item where id='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_news where id_item='".$id."'";
				$d->query($sql);
			
		} redirect("index.php?com=news&loaitin=".$loaitin."&act=man_item");} else transfer("Không nhận được dữ liệu", "index.php?com=news&loaitin=".$loaitin."&act=man_item");
}
/*---------------------------------*/
function get_cats(){
	global $loaitin,  $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_news_cat where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_news_cat SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_news_cat SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_news_cat where loaitin = '".$loaitin."'";	
	if((int)$_REQUEST['id_danhmuc']!='')
	{
	$sql.=" and id_danhmuc=".(int)$_REQUEST['id_danhmuc']."";
	}
	if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" and id_list=".(int)$_REQUEST['id_list']."";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$p = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=news&loaitin=".$loaitin."&act=man_cat&id_danhmuc=".$_GET['id_danhmuc']."&id_list=".$_GET['id_list'];
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $p, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $loaitin,  $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=news&loaitin=".$loaitin."&act=man_cat");
	
	$sql = "select * from #_news_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=news&loaitin=".$loaitin."&act=man_cat");
	$item = $d->fetch_array();	
}

function save_cat(){
	global $loaitin,  $d,$item;
	$file_name=changeTitle($_POST['ten']).time();
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=news&loaitin=".$loaitin."&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){	
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 400, 200, _upload_tintuc,$file_name,2);		
			$d->setTable('news_cat');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				//delete_file(_upload_tintuc.$row['photo']);	
				//delete_file(_upload_tintuc.$row['thumb']);				
			}
		}
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		
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
		
		$data['stt'] = $_POST['stt'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['loaitin'] = $loaitin;
		$data['keywords'] = $_POST['keywords'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('news_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=news&loaitin=".$loaitin."&act=man_cat&p=".$_REQUEST['p']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=news&loaitin=".$loaitin."&act=man_cat");
	}else{				
		 if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 200, _upload_tintuc,$file_name,2);
		}
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
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
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['loaitin'] = $loaitin;
		
		$d->setTable('news_cat');
		if($d->insert($data))
			redirect("index.php?com=news&loaitin=".$loaitin."&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=news&loaitin=".$loaitin."&act=man_cat");
	}
}

function chuyencap_cat(){	
	global $loaitin,  $d;
	$d->reset();
	$capchuyen = $_REQUEST['capchuyen'];
	$id_cat = $_REQUEST['id_cat'];
	if($id_cat == 0)
	{
		transfer("Bạn chưa chọn danh mục cần chuyển", "index.php?com=news&loaitin=".$loaitin."&act=chuyencap_cat");
	}
	if($capchuyen == 2)
	{
		#####Lấy id_list MAX
		$sql = "SELECT id FROM table_news_list ORDER BY id desc";
		$d->query($sql);
		$max1 = $d->result_array();
		$max = $max1[0]['id']+1;
		
		#####Lấy id_list của danh mục cần chuyển cấp
		$sql = "SELECT id_list FROM table_news_cat WHERE id='".$id_cat."'";
		$d->query($sql);
		$id_list1 = $d->result_array();
		$id_list = $id_list1[0]['id_list'];
			
		
		$sql = "INSERT INTO table_news_list (ten,tenkhongdau,photo,hienthi,ngaytao,ngaysua,stt,id_danhmuc) 
	SELECT ten,tenkhongdau,photo,hienthi,ngaytao,ngaysua,stt,id_danhmuc FROM table_news_cat WHERE id='".$id_cat."'";
		$result = $d->query($sql);
		if($result == true)
		{
			$sql2 = "UPDATE table_news SET id_list='".$max."' WHERE id_list ='".$id_list."' and id_cat='".$id_cat."'";
			$result = $d->query($sql2);
			if($result == true)
			{
				$sql3 = "DELETE from table_news_cat WHERE id='".$id_cat."'";
				$result = $d->query($sql3);
				if($result == true)
				{
					transfer("Bạn đã chuyển từ danh mục cấp 3 lên danh mục cấp 2", "index.php?com=news&loaitin=".$loaitin."&act=man_cat");
				}
			}				
		}
	}
	else if($capchuyen == 4)
	{
		transfer("Chuyển cấp này chưa được làm", "index.php?com=news&loaitin=".$loaitin."&act=chuyencap_cat");
	}
}


function delete_cat(){
	global $loaitin,  $d;
	if(isset($_GET['id']))
	{
		$id =  themdau($_GET['id']);		
		$d->reset();		
			
			//Xóa danh mục cấp 3
			$sql = "select id,thumb,photo from #_news_cat where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					//delete_file(_upload_tintuc.$row['photo']);
					//delete_file(_upload_tintuc.$row['thumb']);	
				}
				$sql = "delete from #_news_cat where id='".$id."'";
				$d->query($sql);
			}
			//Xóa danh mục cấp 4			
			$sql = "select id,thumb,photo from #_news_item where id_cat='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					//delete_file(_upload_tintuc.$row['photo']);
					//delete_file(_upload_tintuc.$row['thumb']);	
				}
				$data['id_cat'] = 0;
				$d->setTable('news_item');
				$d->setWhere('id_cat', $id);
				$d->update($data);
			}
			//Xóa sản phẩm thuộc loại đó			
			$sql = "select id,thumb,photo from #_news where id_cat='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					//delete_file(_upload_tintuc.$row['photo']);
					//delete_file(_upload_tintuc.$row['thumb']);	
				}
				$sql = "delete from #_news where id_cat='".$id."'";
				$d->query($sql);
			}
		
		
		if($d->query($sql))
			redirect("index.php?com=news&loaitin=".$loaitin."&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=news&loaitin=".$loaitin."&act=man_cat");

	

	}elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_news_cat where id='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_news_item where id_cat='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_news where id_cat='".$id."'";
				$d->query($sql);
			
		} redirect("index.php?com=news&loaitin=".$loaitin."&act=man_cat");} else transfer("Không nhận được dữ liệu", "index.php?com=news&loaitin=".$loaitin."&act=man_cat"	    );
							
}
/*---------------------------------*/
function get_lists(){
	global $loaitin,  $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_news_list where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_news_list SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_news_list SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_news_list where loaitin = '".$loaitin."'";	
	if((int)$_REQUEST['id_danhmuc']!='')
	{
	$sql.=" and id_danhmuc=".$_REQUEST['id_danhmuc']."";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$p = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=news&loaitin=".$loaitin."&act=man_list&id_danhmuc=".$_GET['id_danhmuc'];
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $p, $maxR, $maxP);
	$items=$paging['source'];
}

function get_list(){
	global $loaitin,  $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=news&loaitin=".$loaitin."&act=man_list");
	
	$sql = "select * from #_news_list where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=news&loaitin=".$loaitin."&act=man_list");
	$item = $d->fetch_array();	
}

function save_list(){
	global $loaitin,  $d,$item;
	$file_name=changeTitle($_POST['ten']).time();
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=news&loaitin=".$loaitin."&act=man_list");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 400, 200, _upload_tintuc,$file_name,2);
			$d->setTable('news_list');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				//delete_file(_upload_tintuc.$row['photo']);	
				//delete_file(_upload_tintuc.$row['thumb']);				
			}
		}
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];

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
		$data['loaitin'] = $loaitin;
		$data['keywords'] = $_POST['keywords'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('news_list');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=news&loaitin=".$loaitin."&act=man_list&p=".$_REQUEST['p']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=news&loaitin=".$loaitin."&act=man_list");
	}else{		
		 if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 200, _upload_tintuc,$file_name,2);
		}
		$data['id_danhmuc'] = (int)$_POST['id_danhmuc'];
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
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
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['loaitin'] = $loaitin;
		
		$d->setTable('news_list');
		if($d->insert($data))
			redirect("index.php?com=news&loaitin=".$loaitin."&act=man_list");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=news&loaitin=".$loaitin."&act=man_list");
	}
}

function delete_list(){
	global $loaitin,  $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			//Xóa danh mục cấp 2			
			$sql = "select id,thumb,photo from #_news_list where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					//delete_file(_upload_tintuc.$row['photo']);
					//delete_file(_upload_tintuc.$row['thumb']);	
				}
				$sql = "delete from #_news_list where id='".$id."'";
				$d->query($sql);
			}
			
			//Xóa sản phẩm thuộc loại đó			
			$sql = "select id,thumb,photo from #_news where id_list='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					//delete_file(_upload_tintuc.$row['photo']);
					//delete_file(_upload_tintuc.$row['thumb']);	
				}
				$data['id_list'] = 0;
				$d->setTable('news');
				$d->setWhere('id_list', $id);
				$d->update($data);
			}
		
		
		if($d->query($sql))
			redirect("index.php?com=news&loaitin=".$loaitin."&act=man_list");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=news&loaitin=".$loaitin."&act=man_list");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_news_list where id='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_news_cat where id_list='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_news_item where id_list='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_news where id_list='".$id."'";
				$d->query($sql);
			
		} redirect("index.php?com=news&loaitin=".$loaitin."&act=man_list");} else transfer("Không nhận được dữ liệu", "index.php?com=news&loaitin=".$loaitin."&act=man_list"	    );
}


/*---------------------------------*/
function get_danhmucs(){
	global $loaitin,  $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_news_danhmuc where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_news_danhmuc SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_news_danhmuc SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_news_danhmuc where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['noibat'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_news_danhmuc SET noibat =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_news_danhmuc SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_news_danhmuc where loaitin = '".$loaitin."'";
	if((int)$_REQUEST['id_danhmuc']!='')
	{
	$sql.=" and id_danhmuc=".(int)$_REQUEST['id_danhmuc']."";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$p = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=news&loaitin=".$loaitin."&act=man_danhmuc";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $p, $maxR, $maxP);
	$items=$paging['source'];
}

function get_danhmuc(){
	global $loaitin,  $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=news&loaitin=".$loaitin."&act=man_danhmuc");
	$fgh="";
	$ghj=0;
	$array_new= array("hienthi","trangchu","noibat","trai","phai");
	for($i=0;$i<count ($array_new);$i++){
		
		foreach($_GET as $key=>$v){
		if ($array_new[$i]==$key){
			$fgh=$key;
			$ghj=1;
			break;
		}
		
	}
	}
	$re_new="";
		foreach($_GET as $key=>$v){
		if ($fgh==$key){
			
		}else{
			$re_new.="&".$key."=".$v;
		}
		
		}
	if($ghj==1){
		redirect("index.php?".$re_new);
	}
	
	$sql = "select * from #_news_danhmuc where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=news&loaitin=".$loaitin."&act=man_danhmuc");
	$item = $d->fetch_array();	
}

function save_danhmuc(){
	global $loaitin,  $d,$item;
	$file_name=changeTitle($_POST['ten']).time();
	$file_name2=changeTitle($_POST['ten']).time()."-2";
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=news&loaitin=".$loaitin."&act=man_danhmuc");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 400, 500, _upload_tintuc,$file_name,2);									
		
		}
		
		
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		$data['loaitin'] = $loaitin;
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
		
		
		$data['stt'] = $_POST['stt'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('news_danhmuc');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=news&loaitin=".$loaitin."&act=man_danhmuc&p=".$_REQUEST['p']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=news&loaitin=".$loaitin."&act=man_danhmuc");
	}else{			
		  if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 500, _upload_tintuc,$file_name,2);			
				
			}
			if($photo2 = upload_image("file2", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name2)){
			$data['photo2'] = $photo2;		
			$data['thumb2'] = create_thumb($data['photo2'], 270, 195, _upload_tintuc,$file_name2,2);			
				
			}
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		$data['loaitin'] = $loaitin;
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		$data['title'] = $_POST['title'];
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
				$sql="select max(stt) as stt from table_news_danhmuc where loaitin='$loaitin'";
		$d->query($sql);
		$stt=$d->fetch_array();
	
		$data['stt'] = $stt['stt'] +1 ;
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('news_danhmuc');
		if($d->insert($data))
			redirect("index.php?com=news&loaitin=".$loaitin."&act=man_danhmuc");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=news&loaitin=".$loaitin."&act=man_danhmuc");
	}
}

function delete_danhmuc(){
	global $loaitin,  $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
			//Xóa danh mục cấp 1
			$sql = "delete from #_news_danhmuc where id='".$id."'";
			$d->query($sql);
			//Xóa danh mục cấp 2			
			$sql = "select id,thumb,photo from #_news_list where id_danhmuc='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					//delete_file(_upload_tintuc.$row['photo']);
					//delete_file(_upload_tintuc.$row['thumb']);	
				}
				$data['id_danhmuc'] = 0;
				$d->setTable('news_list');
				$d->setWhere('id_danhmuc', $id);
				$d->update($data);
			}
			
			//Xóa sản phẩm thuộc loại đó			
			$sql = "select id,thumb,photo from #_news where id_danhmuc='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					//delete_file(_upload_tintuc.$row['photo']);
					//delete_file(_upload_tintuc.$row['thumb']);	
				}
				$data['id_danhmuc'] = 0;
				$d->setTable('news');
				$d->setWhere('id_danhmuc', $id);
				$d->update($data);
			}
		
		
		if($d->query($sql))
			redirect("index.php?com=news&loaitin=".$loaitin."&act=man_danhmuc");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=news&loaitin=".$loaitin."&act=man_danhmuc");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_news_danhmuc where id='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_news_list where id_danhmuc='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_news_cat where id_danhmuc='".$id."'";
				$d->query($sql);
				
				
				
				$sql = "delete from #_news where id_danhmuc='".$id."'";
				$d->query($sql);
			
		} redirect("index.php?com=news&loaitin=".$loaitin."&act=man_danhmuc");} else transfer("Không nhận được dữ liệu", "index.php?com=news&loaitin=".$loaitin."&act=man_danhmuc"	    );
}
?>


