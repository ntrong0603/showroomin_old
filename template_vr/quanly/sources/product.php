<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "product/items";
		break;
	case "add":		
		
		thuoctinh();
		$template = "product/item_add";
		break;
	case "edit":		
		get_item();
		
		thuoctinh();
		$template = "product/item_add";
		break;
	case "save":
	if( $_GET['id']!='' ){get_item();}
	thuoctinh();
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	//======================================================
	case "man_danhmuc":
		get_danhmucs();
		$template = "product/danhmucs";
		break;
	case "add_danhmuc":		
		$template = "product/danhmuc_add";
		break;
	case "edit_danhmuc":		
		get_danhmuc();
		$template = "product/danhmuc_add";
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
		$sql_sp = "update table_product set hot =  IF(hot=1,0,1) where id='".$id_up."' ";
		$d->query($sql_sp);
		
	}
	#-------------------------------------------------------------------------------
	
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['spbanchay']!='')
	{
		$d->reset();
		$id_up = $_REQUEST['spbanchay'];
		$sql_sp = "update table_product set spbanchay =  IF(spbanchay=1,0,1) where id='".$id_up."' ";
		$d->query($sql_sp);
		
	}
	#-------------------------------------------------------------------------------
	
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['spphathanh']!='')
	{
		$d->reset();
		$id_up = $_REQUEST['spphathanh'];
		$sql_sp = "update table_product set spphathanh =  IF(spphathanh=1,0,1) where id='".$id_up."' ";
		$d->query($sql_sp);
		
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
		$d->reset();
		$id_up = $_REQUEST['noibat'];
		$sql_sp = "update table_product set noibat =  IF(noibat=1,0,1) where id='".$id_up."' ";
		$d->query($sql_sp);
		
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['spmoi']!='')
	{
		$d->reset();
		$id_up = $_REQUEST['spmoi'];
		$sql_sp = "update table_product set spmoi =  IF(spmoi=1,0,1) where id='".$id_up."' ";
		$d->query($sql_sp);
		
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['khuyenmai']!='')
	{
		$d->reset();
		$id_up = $_REQUEST['khuyenmai'];
		$sql_sp = "update table_product set khuyenmai =  IF(khuyenmai=1,0,1) where id='".$id_up."' ";
		$d->query($sql_sp);
		
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
		$d->reset();
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "update table_product set hienthi =  IF(hienthi=1,0,1) where id='".$id_up."' ";
		$d->query($sql_sp);
		
	}
	#-------------------------------------------------------------------------------
	
	$sql = "select * from #_product where 1";
	if($_REQUEST['id_place'] > 0)
	{
		$sql.=" and id_place=".$_REQUEST['id_place']."";
	}
	if($_REQUEST['id_danhmuc'] > 0)
	{
		$sql.=" and id_danhmuc=".$_REQUEST['id_danhmuc']."";
	}
	if($_REQUEST['id_list'] > 0)
	{
		$sql.=" and id_list=".$_REQUEST['id_list']."";
	}
	if($_REQUEST['id_cat'] > 0)
	{
		$sql.=" and id_cat=".$_REQUEST['id_cat']."";
	}
	if($_REQUEST['id_item'] > 0)
	{
		$sql.=" and id_item=".$_REQUEST['id_item']."";
	}
		$sql.=" order by stt asc, id desc";
	
	
	$d->query($sql);
	$items = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=product&act=man&id_place=".$_GET['id_place']."&id_danhmuc=".$_GET['id_danhmuc']."&id_list=".$_GET['id_list']."&id_cat=".$_GET['id_cat']."&id_item=".$_GET['id_item'];
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
		transfer("Không nhận được dữ liệu", "index.php?com=product&act=man");
	
	$sql = "select * from #_product where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man&id_place=".$_GET['id_place']);
	$item = $d->fetch_array();	
	

}

function save_item(){
	global $d,$item,$thuoctinh,$danhmucthuoctinh,$config;
	$file_name=fns_Rand_digit(0,9,6);
	
if(!isset( $_POST['save'] )){ transfer("Không nhận được dữ liệu", "index.php?com=product&act=man&id_place=".$_POST['id_place']);}
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham2,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], $config['hinhsp']['width'], $config['hinhsp']['height'], _upload_sanpham2,$file_name,2);	
	$d->reset();			
			$d->reset();$d->setTable('product');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham2.$row['photo']);	
				delete_file(_upload_sanpham2.$row['thumb']);	
							
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
		$data['ten'] = $_POST['ten'];
		$data['id_place'] = $_POST['id_place'];
	
		if($_POST['tenkhongdau']==$item['tenkhongdau'] and $_POST['tenkhongdau']!=''){
			$data['tenkhongdau']=$_POST['tenkhongdau'];
		}else{
			if ($_POST['tenkhongdau']==''){
				$tenkhongdau=changeTitle($_POST['ten']);
			}
			else
			{
				$tenkhongdau = changeTitle($_POST['tenkhongdau']);
			}
			$newname=$tenkhongdau;
			$d->reset();
			$d->setTable('product');
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
		$data['keyword'] = $_POST['keyword'];
		$data['description'] = $_POST['description'];
		$data['maso'] = $_POST['maso'];	
		$data['nhasanxuat'] = $_POST['nhasanxuat'];			
		$data['gia'] = $_POST['gia'];
		$data['giakm'] = $_POST['giakm'];
		
		
		$data['chatlieu'] = $_POST['chatlieu'];
		$data['trongluong'] = $_POST['trongluong'];
		$data['kichthuoc'] = $_POST['kichthuoc'];
		$data['noidung'] = mysql_real_escape_string($_POST['noidung']);
		$data['mota'] = mysql_real_escape_string($_POST['mota']);
		
		
						
		$data['stt'] = $_POST['stt'];
		
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['spmoi'] = isset($_POST['spmoi']) ? 1 : 0;
		$data['hot'] = isset($_POST['hot']) ? 1 : 0;
		$data['spbanchay'] = isset($_POST['spbanchay']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->reset();$d->setTable('product');
		$d->setWhere('id', $id);
		if($d->update($data))
		{
			if (isset($_POST['qhack'])) {
				qsave_image('product',$id,'../upload/sanpham/','');
			}
			transfer("Lưu thành công ", "index.php?com=product&act=man&id_place=".$_POST['id_place']);
		}	else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man&id_place=".$_POST['id_place']);
	}else{

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham2,$file_name))
		{
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], $config['hinhsp']['width'], $config['hinhsp']['height'], _upload_sanpham2,$file_name,2);	
		}
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
		$data['mota'] = mysql_real_escape_string($_POST['mota']);
		
		$data['id_danhmuc'] = $_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat'] = $_POST['id_cat'];	
		$data['id_item'] =$_POST['id_item'];		
		$data['ten'] = $_POST['ten'];
		$data['id_place'] = $_POST['id_place'];
		$data['keyword'] = $_POST['keyword'];
		$data['description'] = $_POST['description'];
		$data['maso'] = $_POST['maso'];	
		$data['nhasanxuat'] = $_POST['nhasanxuat'];				
		$data['gia'] = $_POST['gia'];	
		$data['tag'] = $_POST['tag'];
		$data['giakm'] = $_POST['giakm'];
		$data['noidung'] = mysql_real_escape_string($_POST['noidung']);	
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
		$data['hot'] = isset($_POST['hot']) ? 1 : 0;
		$data['spbanchay'] = isset($_POST['spbanchay']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		
		$d->reset();
		$d->setTable('product');
		
		
		if($d->insert($data)){
			$d->reset();
			$d->setTable('product');
			$d->setOrder('id desc');
			$d->setLimit( 1 );
			$d->select();
			$abd=$d->fetch_array();
			$id = $abd['id'];
			if (isset($_POST['qhack'])) {
				qsave_image('product',$id,'../upload/sanpham/','');
			}
			
			transfer("Thêm thành công", "index.php?com=product&act=man&id_place=".$_POST['id_place'] );
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man&id_place=".$_POST['id_place']);
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
	$id_place="&id_place=".$_REQUEST['id_place'];
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,thumb, photo from #_product where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham2.$row['photo']);
				delete_file(_upload_sanpham2.$row['thumb']);			
			}
		$sql = "delete from #_product where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=product&act=man".$id_place."".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man".$id_place);
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select id,thumb, photo from #_product where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham2.$row['photo']);
				delete_file(_upload_sanpham2.$row['thumb']);
			}
			$sql = "delete from #_product where id='".$id."'";
			$d->query($sql);
		}
			
		} redirect("index.php?com=product&act=man".$id_place);} else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man".$id_place);
		
}

/*---------------------------------*/
function get_danhmucs(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
		$d->reset();
		$id_up = $_REQUEST['noibat'];
		$sql_sp = "update table_product_danhmuc set noibat =  IF(noibat=1,0,1) where id='".$id_up."' ";
		$d->query($sql_sp);
		
	}
	#-------------------------------------------------------------------------------
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
		$d->reset();
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "update table_product_danhmuc set hienthi =  IF(hienthi=1,0,1) where id='".$id_up."' ";
		$d->query($sql_sp);
		
	}
	#-------------------------------------------------------------------------------
	
	$sql = "select * from #_product_danhmuc";
	if($_REQUEST['id_place']!='')
	{
		$sql.=" where id_place=".$_REQUEST['id_place']."";
	}
	$sql.="  order by stt asc, id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=product&act=man_danhmuc";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_danhmuc(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_danhmuc");
	
	$sql = "select * from #_product_danhmuc where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_danhmuc");
	$item = $d->fetch_array();	
}

function save_danhmuc(){
	global $d,$item;
	$file_name=fns_Rand_digit(0,9,6);
	$file_name2=fns_Rand_digit(0,9,6);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_danhmuc");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham2,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 217, 87, _upload_sanpham2,$file_name,2);									
			$d->reset();$d->setTable('product_danhmuc');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham2.$row['photo']);	
				delete_file(_upload_sanpham2.$row['thumb']);	
							
			}
		}
		
		if($photo = upload_image("file_icon", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham2,$file_name)){
			$data['photo_icon'] = $photo;	
			$data['thumb_icon'] = create_thumb($data['photo_icon'], 217, 87, _upload_sanpham2,$file_name,2);									
			$d->reset();$d->setTable('product_danhmuc');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham2.$row['photo_icon']);	
				delete_file(_upload_sanpham2.$row['thumb_icon']);	
							
			}
		}
		
		
		$data['ten'] = $_POST['ten'];
		$data['ten_rd'] = $_POST['ten_rd'];
		$data['ten_sd'] = $_POST['ten_sd'];
		$data['canh'] = $_POST['canh'];
		$data['lookat'] = $_POST['lookat'];
		$data['hlookat'] = $_POST['hlookat'];
		$data['vlookat'] = $_POST['vlookat'];
		$data['id_place'] = $_POST['id_place'];
		if($_POST['tenkhongdau']==$item['tenkhongdau'] and $_POST['tenkhongdau']!=''){
			$data['tenkhongdau']=$_POST['tenkhongdau'];
		}else{
			if ($_POST['tenkhongdau']==''){$tenkhongdau=changeTitle($_POST['ten']);}else
			{$tenkhongdau = changeTitle($_POST['tenkhongdau']);}
			$newname=$tenkhongdau;
			$d->reset();
			$d->setTable('product');
			$d->setWhere('id', $id);
			$data0['tenkhongdau']='';
			$d->update($data0);
			for($i=0;$i<100;$i++){
				if( checklinkdanhmuc($newname)==true ){
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
		$data['keyword'] = $_POST['keyword'];
		$data['stt'] = $_POST['stt'];

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->reset();$d->setTable('product_danhmuc');
		$d->setWhere('id', $id);
		if($d->update($data))
			transfer("Lưu thành công","index.php?com=product&act=man_danhmuc&id_place=".$_POST['id_place']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_danhmuc&id_place=".$_POST['id_place']);
	}else{			
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham2,$file_name)){
				$data['photo'] = $photo;		
				$data['thumb'] = create_thumb($data['photo'], 217, 87, _upload_sanpham2,$file_name,2);			
				
			}
		if($photo = upload_image("file_icon", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham2,$file_name)){
				$data['photo_icon'] = $photo;		
				$data['thumb_icon'] = create_thumb($data['photo_icon'], 217, 87, _upload_sanpham2,$file_name,2);			
				
			}
		if($photo2 = upload_image("file2", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham2,$file_name2)){
			$data['photo2'] = $photo2;		
			$data['thumb2'] = create_thumb($data['photo2'], 270, 195, _upload_sanpham2,$file_name2,2);				
		}
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		$data['description'] = $_POST['description'];
		$data['keyword'] = $_POST['keyword'];

		$data['title'] = $_POST['title'];
		$tenkhongdau = changeTitle($_POST['ten']);
		$newname=$tenkhongdau;
		
		for($i=0;$i<100;$i++){
			if( checklinkdanhmuc($newname)==true ){
				$newname=$tenkhongdau."-".$i;
			}else{
				break;
			}
		}
		$data['canh'] = $_POST['canh'];
		$data['lookat'] = $_POST['lookat'];
		$data['hlookat'] = $_POST['hlookat'];
		$data['vlookat'] = $_POST['vlookat'];
		$data['tenkhongdau']=$newname;
		$data['stt'] = $_POST['stt'];
		$data['id_place'] = $_POST['id_place'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->reset();$d->setTable('product_danhmuc');
		if($d->insert($data)){
			$d->reset();
			$d->reset();$d->setTable('product_danhmuc');
			$d->setOrder('id desc');
			$d->setLimit( 1 );
			$d->select();
			$abd=$d->fetch_array();
			
			transfer("Thêm thành công", "index.php?com=product&act=man_danhmuc&id_place=".$_POST['id_place']);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_danhmuc&id_place=".$_POST['id_place']);
	}
}

function delete_danhmuc(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
			//Xóa danh mục cấp 1
			$sql = "delete from #_product_danhmuc where id='".$id."'";
			$d->query($sql);
			//Xóa danh mục cấp 2			
			$sql = "select id,thumb,photo from #_product_list where id_danhmuc='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham2.$row['photo']);
					delete_file(_upload_sanpham2.$row['thumb']);	
				}
				$data['id_danhmuc'] = 0;
				$d->reset();$d->setTable('product_list');
				$d->setWhere('id_danhmuc', $id);
				$d->update($data);
			}
			//Xóa danh mục cấp 3
			$sql = "select id,thumb,photo from #_product_cat where id_danhmuc='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham2.$row['photo']);
					delete_file(_upload_sanpham2.$row['thumb']);	
				}
				$data['id_danhmuc'] = 0;
				$d->reset();$d->setTable('product_cat');
				$d->setWhere('id_danhmuc', $id);
				$d->update($data);
			}
			//Xóa danh mục cấp 4			
			$sql = "select id,thumb,photo from #_product_item where id_danhmuc='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham2.$row['photo']);
					delete_file(_upload_sanpham2.$row['thumb']);	
				}
				$data['id_danhmuc'] = 0;
				$d->reset();$d->setTable('product_item');
				$d->setWhere('id_danhmuc', $id);
				$d->update($data);
			}
			//Xóa sản phẩm thuộc loại đó			
			$sql = "select id,thumb,photo from #_product where id_danhmuc='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham2.$row['photo']);
					delete_file(_upload_sanpham2.$row['thumb']);	
				}
				$data['id_danhmuc'] = 0;
				$d->reset();$d->setTable('product');
				$d->setWhere('id_danhmuc', $id);
				$d->update($data);
			}
		
		
		if($d->query($sql))
			redirect("index.php?com=product&act=man_danhmuc");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_danhmuc");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_product_danhmuc where id='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_product_list where id_danhmuc='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_product_cat where id_danhmuc='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_product_item where id_danhmuc='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_product where id_danhmuc='".$id."'";
				$d->query($sql);
			
		} redirect("index.php?com=product&act=man_danhmuc");} else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_danhmuc"	    );
}
?>


