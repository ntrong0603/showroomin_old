<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "yahoo/items";
		break;
	case "add":
		$template = "yahoo/item_add";
		break;
	case "edit":
		get_item();
		$template = "yahoo/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
		
	default:
		$template = "index";
		#===================================================	
	case "man_danhmuc":
		get_danhmucs();
		$template = "yahoo/danhmucs";
		break;
	case "add_danhmuc":		
		$template = "yahoo/danhmuc_add";
		break;
	case "edit_danhmuc":		
		get_danhmuc();
		$template = "yahoo/danhmuc_add";
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
	if($_REQUEST['hienthi']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['hienthi'];
	
	$sql_sp = "SELECT id,hienthi FROM table_yahoo where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_yahoo SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_yahoo SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	$sql = "select * from #_yahoo order by stt,ten";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=yahoo&act=man";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=yahoo&act=man");
	
	$sql = "select * from #_yahoo where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=yahoo&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=yahoo&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){ // cap nhat
		$id =  themdau($_POST['id']);
		$data['ten'] = $_POST['ten'];
		$data['ten_sd'] = $_POST['ten_sd'];
		$data['chucvu'] = $_POST['chucvu'];
		$data['yahoo'] = $_POST['yahoo'];
		$data['skype'] = $_POST['skype'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['email'] = $_POST['email'];
		$data['id_danhmuc'] = $_POST['id_danhmuc'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('yahoo');
		$d->setWhere('id', $id);
		if($d->update($data))
			header("Location:index.php?com=yahoo&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=yahoo&act=man");
	}else{ // them moi
		$data['ten'] = $_POST['ten'];
		$data['ten_sd'] = $_POST['ten_sd'];
		$data['chucvu'] = $_POST['chucvu'];
		$data['yahoo'] = $_POST['yahoo'];
		$data['skype'] = $_POST['skype'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['email'] = $_POST['email'];
		$data['id_danhmuc'] = $_POST['id_danhmuc'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('yahoo');
		if($d->insert($data))
			header("Location:index.php?com=yahoo&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=yahoo&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		
		// xoa item
		$sql = "delete from #_yahoo where id='".$id."'";
		if($d->query($sql))
			header("Location:index.php?com=yahoo&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=yahoo&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=yahoo&act=man");
}
#--------------------------------------------------------------------------------------------- photo
/*---------------------------------*/
function get_danhmucs(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_yahoo_danhmuc where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_yahoo_danhmuc SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_yahoo_danhmuc SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_yahoo_danhmuc where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['noibat'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_yahoo_danhmuc SET noibat =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_yahoo_danhmuc SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_yahoo_danhmuc";
	if($_REQUEST['id_danhmuc']!='')
	{
	$sql.=" where id_danhmuc=".$_REQUEST['id_danhmuc']."";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=yahoo&act=man_danhmuc";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_danhmuc(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=yahoo&act=man_danhmuc");
	
	$sql = "select * from #_yahoo_danhmuc where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=yahoo&act=man_danhmuc");
	$item = $d->fetch_array();	
}

function save_danhmuc(){
	global $d,$item;
	$file_name=fns_Rand_digit(0,9,6);
	$file_name2=fns_Rand_digit(0,9,6);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=yahoo&act=man_danhmuc");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 400, 500, _upload_sanpham,$file_name,2);									
			$d->reset();$d->setTable('yahoo_danhmuc');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);	
				delete_file(_upload_sanpham.$row['thumb']);	
							
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
			$d->setTable('yahoo');
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
		
		$d->reset();$d->setTable('yahoo_danhmuc');
		$d->setWhere('id', $id);
		if($d->update($data))
			transfer("Lưu thành công","index.php?com=yahoo&act=man_danhmuc");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=yahoo&act=man_danhmuc");
	}else{			
		  if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 500, _upload_sanpham,$file_name,2);			
				
			}
			if($photo2 = upload_image("file2", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham,$file_name2)){
			$data['photo2'] = $photo2;		
			$data['thumb2'] = create_thumb($data['photo2'], 270, 195, _upload_sanpham,$file_name2,2);			
				
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
		$data['tenkhongdau']=$newname;
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->reset();$d->setTable('yahoo_danhmuc');
		if($d->insert($data)){
			$d->reset();
			$d->reset();$d->setTable('yahoo_danhmuc');
			$d->setOrder('id desc');
			$d->setLimit( 1 );
			$d->select();
			$abd=$d->fetch_array();
			
		transfer("Thêm thành công", "index.php?com=yahoo&act=man_danhmuc");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=yahoo&act=man_danhmuc");
	}
}

function delete_danhmuc(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
			//Xóa danh mục cấp 1
			$sql = "delete from #_yahoo_danhmuc where id='".$id."'";
			$d->query($sql);
			
			//Xóa sản phẩm thuộc loại đó			
			$sql = "select id,thumb,photo from #_yahoo where id_danhmuc='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
				$data['id_danhmuc'] = 0;
				$d->reset();$d->setTable('yahoo');
				$d->setWhere('id_danhmuc', $id);
				$d->update($data);
			}
		
		
		if($d->query($sql))
			redirect("index.php?com=yahoo&act=man_danhmuc");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=yahoo&act=man_danhmuc");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_yahoo_danhmuc where id='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_yahoo_list where id_danhmuc='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_yahoo_cat where id_danhmuc='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_yahoo_item where id_danhmuc='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_yahoo where id_danhmuc='".$id."'";
				$d->query($sql);
			
		} redirect("index.php?com=yahoo&act=man_danhmuc");} else transfer("Không nhận được dữ liệu", "index.php?com=yahoo&act=man_danhmuc"	    );
}
?>

	
