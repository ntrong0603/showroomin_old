<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "duan/items";
		break;
	case "add":		
		
		thuoctinh();
		$template = "duan/item_add";
		break;
	case "edit":		
		get_item();
		
		thuoctinh();
		$template = "duan/item_add";
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
		$template = "duan/loais";
		break;
	case "add_item":		
		$template = "duan/loai_add";
		break;
	case "edit_item":		
	
		get_loai();
		$template = "duan/loai_add";
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
		$template = "duan/cats";
		break;
	case "add_cat":		
		$template = "duan/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "duan/cat_add";
		break;
	case "chuyencap_cat":				
		$template = "duan/cat_chuyencap";
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
		$template = "duan/lists";
		break;
	case "add_list":		
		$template = "duan/list_add";
		break;
	case "edit_list":		
		get_list();
		$template = "duan/list_add";
		break;
	case "chuyencap_list":		
		$template = "duan/list_chuyencap";
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
		$template = "duan/danhmucs";
		break;
	case "add_danhmuc":		
		$template = "duan/danhmuc_add";
		break;
	case "edit_danhmuc":		
		get_danhmuc();
		$template = "duan/danhmuc_add";
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
	
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['spbanchay']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['spbanchay'];
	$sql_sp = "SELECT id,spbanchay FROM table_duan where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spbanchay=$cats[0]['spbanchay'];
	if($spbanchay==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan SET spbanchay =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan SET spbanchay =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['spphathanh']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['spphathanh'];
	$sql_sp = "SELECT id,spphathanh FROM table_duan where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spbanchay=$cats[0]['spphathanh'];
	if($spbanchay==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan SET spphathanh =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan SET spphathanh =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_duan where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$noibat=$cats[0]['noibat'];
	if($noibat==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan SET noibat =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hot']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['hot'];
	$sql_sp = "SELECT id,hot FROM table_duan where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hot=$cats[0]['hot'];
	if($hot==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan SET hot =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan SET hot =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['new']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['new'];
	$sql_sp = "SELECT id,new FROM table_duan where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$new=$cats[0]['new'];
	if($new==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan SET new =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan SET new =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_duan where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	#----------------------------------------------------------------------------------------
	if($_REQUEST['trangchu']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['trangchu'];
	$sql_sp = "SELECT id,trangchu FROM table_duan where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$trangchu=$cats[0]['trangchu'];
	if($trangchu==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan SET trangchu =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan SET trangchu =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	#----------------------------------------------------------------------------------------
	if($_REQUEST['trai']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['trai'];
	$sql_sp = "SELECT id,trai FROM table_duan where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$trai=$cats[0]['trai'];
	if($trai==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan SET trai =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan SET trai =0  WHERE  id = ".$id_up."";
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
	$sql = "select * from #_duan";

	$cocuntmuc=demdanhmuc(get_danhmucdacap($d));
	$sql2='';
	$url="index.php?com=duan&act=man";
	for($i=1;$i<=$cocuntmuc;$i++){
		if(isset($_REQUEST['id_danhmucc'.$i]) && $_REQUEST['id_danhmucc'.$i]!='')
		{
			$sql2=" id_danhmuc=".$_REQUEST['id_danhmucc'.$i];
			$parent=$_REQUEST['id_danhmucc'.$i];
			$url.="&id_danhmucc".$i."=".$_GET['id_danhmucc'.$i];
		}
	}
	//--===============================================================--//
	if($sql2!='')
	{
		$sql.=" where ".$sql2;
	}
	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		if((int)$_REQUEST['id_danhmuc']!=''){
	
		$sql.=" and ten LIKE '%$keyword%'";}else
		{
			$sql.=" where ten LIKE '%$keyword%'";
		}
	
	}

	$sql.=get_dsprarent($parent);
	$sql.=" order by id_danhmuc,id_list,id_cat,id_item,stt,id desc";
	


	$d->query($sql);
	$items = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;

	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}
function get_dsprarent($id_parent=''){
	global $d;
	if($id_parent!=''){
		$sql="select * from #_duan_category where id_parent=".$id_parent;
		$d->query($sql);
		$sqluni="";
		$dmuc=$d->result_array();
		for($i=0; $i<count($dmuc); $i++){
			$sqluni.=' union  SELECT * FROM #_duan WHERE id_danhmuc='.$dmuc[$i]['id'];
			$sqluni.=get_dsprarent($dmuc[$i]['id']);
		}
		return $sqluni;
	}
	return false;
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
		transfer("Không nhận được dữ liệu", "index.php?com=duan&act=man");
	
	$sql = "select * from #_duan where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=duan&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d,$item,$thuoctinh,$danhmucthuoctinh;
	
	$file_name=changeTitle($_POST['ten']).time();
	$file_name2=changeTitle($_POST['ten']).time()."-2";
	
if(!isset( $_POST['ten'] )){ transfer("Bạn chưa nhập Tên, vui lòng tạo lại", "index.php?com=duan&act=man");}
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', "../upload/duan/",$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 220, 156, "../upload/duan/",$file_name,2);	

		}	
		if($photo = upload_image("file2", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', "../upload/duan/",$file_name2)){
			$data['photo1'] = $photo;	
			$data['thumb1'] = create_thumb($data['photo1'], 220, 156, "../upload/duan/",$file_name2,2);	

		}
		
		
		$data['thuoctinh']=",";
		for($j=0,$countj=count($thuoctinh);$j<$countj;$j++){ 
			if( isset( $_POST['thuoctinh'.$thuoctinh[$j]['id']] ) ){
				if($_POST['thuoctinh'.$thuoctinh[$j]['id']]==true){
				$data['thuoctinh']=$data['thuoctinh'].$_POST['thuoctinh'.$thuoctinh[$j]['id']].",";
				}
			}
		}

		$cocuntmuc=demdanhmuc(get_danhmucdacap($d));
		
		for($i=1;$i<=$cocuntmuc;$i++){
			if(isset($_REQUEST['id_danhmucc'.$i]) && $_REQUEST['id_danhmucc'.$i]!='')
			{
				$data['id_danhmuc'] = $_POST['id_danhmucc'.$i];
			}
		}
		if($data['id_danhmuc']=='')
		{
			transfer("Bạn chưa chọn danh mục sản phẩm", "index.php?com=duan&act=man");
		}		
		$data['ten'] = $_POST['ten'];
		$data['ten_rd'] = $_POST['ten_rd'];
		$data['ten_sd'] = $_POST['ten_sd'];	
	
			$data['tenkhongdau']=changeTitle($_POST['ten']);
		
		
		
		$data['keywords'] = $_POST['keywords'];
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		
		$data['gia'] = $_POST['gia'];
		$data['giacu'] = $_POST['giacu'];
		$data['diadiem']=$_POST['diadiem'];
		$data['dientich']=$_POST['dientich'];
		$data['dientich2']=$_POST['dientich2'];
		$data['thongtinthem']=$_POST['thongtinthem'];
				$data['id_tinh'] = (int)$_POST['id_tinh'];
		$data['id_huyen'] = (int)$_POST['id_huyen'];
		$data['id_phuong'] = $_POST['id_phuong'];
		
		$data['noidung'] = addslashes($_POST['noidung']);$data['noidung_sd'] = addslashes($_POST['noidung_sd']);$data['noidung_rd'] = addslashes($_POST['noidung_rd']);
		$data['mota'] = addslashes($_POST['mota']);$data['mota_sd'] = addslashes($_POST['mota_sd']);$data['mota_rd'] = addslashes($_POST['mota_rd']);
		$data['phukien'] = addslashes($_POST['phukien']);$data['phukien_sd'] = addslashes($_POST['phukien_sd']);$data['phukien_rd'] = addslashes($_POST['phukien_rd']);
		
		$data['congtrinh'] = addslashes($_POST['congtrinh']);$data['congtrinh_sd'] = addslashes($_POST['congtrinh_sd']);$data['congtrinh_rd'] = addslashes($_POST['congtrinh_rd']);
		
			$data['tongquan'] = addslashes($_POST['tongquan']);
			$data['vitri'] = addslashes($_POST['vitri']);
			$data['tienich'] = addslashes($_POST['tienich']);
			$data['matbang'] = addslashes($_POST['matbang']);
			$data['canhomau'] = addslashes($_POST['canhomau']);
			$data['cachuongview'] = addslashes($_POST['cachuongview']);
			$data['danhgia'] = addslashes($_POST['danhgia']);
			$data['nhadautu'] = addslashes($_POST['nhadautu']);
						
		$data['stt'] = $_POST['stt'];
		
		$data['tag'] = $_POST['tag'];
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['new'] = isset($_POST['new']) ? 1 : 0;
		$data['trangchu'] = isset($_POST['trangchu']) ? 1 : 0;
		$data['trai'] = isset($_POST['trai']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->reset();$d->setTable('duan');
		$d->setWhere('id', $id);
		if($d->update($data))
		{
			
			transfer("Lưu thành công ",$_SESSION['backurl']);
		}	else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=duan&act=man");
	}else{

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', "../upload/duan/",$file_name))
		{
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 220, 156, "../upload/duan/",$file_name,2);	
		}
		$data['tenkhongdau']=changeTitle($_POST['ten']);
		
		$data['mota'] = addslashes($_POST['mota']);$data['mota_sd'] = addslashes($_POST['mota_sd']);$data['mota_rd'] = addslashes($_POST['mota_rd']);
		
		$cocuntmuc=demdanhmuc(get_danhmucdacap($d));
		
		for($i=1;$i<=$cocuntmuc;$i++){
			if(isset($_REQUEST['id_danhmucc'.$i]) && $_REQUEST['id_danhmucc'.$i]!='')
			{
				$data['id_danhmuc'] = $_POST['id_danhmucc'.$i];
			}
		}
		if($data['id_danhmuc']=='')
		{
			transfer("Bạn chưa chọn danh mục sản phẩm", "index.php?com=duan&act=add");
		}	
		$data['dientich']=$_POST['dientich'];
		$data['dientich2']=$_POST['dientich2'];
				$data['id_tinh'] = (int)$_POST['id_tinh'];
		$data['id_huyen'] = (int)$_POST['id_huyen'];
		$data['id_phuong'] = $_POST['id_phuong'];
		$data['diadiem']=$_POST['diadiem'];
			
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];	

		$data['keywords'] = $_POST['keywords'];
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];	
		$data['gia'] = $_POST['gia'];
		
		$data['giacu'] = $_POST['giacu'];
		$data['thongtinthem']=$_POST['thongtinthem'];
		$data['diadiem']=$_POST['diadiem'];	
		$data['tag'] = $_POST['tag'];
		$data['noidung'] = addslashes($_POST['noidung']);$data['noidung_sd'] = addslashes($_POST['noidung_sd']);$data['noidung_rd'] = addslashes($_POST['noidung_rd']);	
	$data['tongquan'] = addslashes($_POST['tongquan']);
			$data['vitri'] = addslashes($_POST['vitri']);
			$data['tienich'] = addslashes($_POST['tienich']);
			$data['matbang'] = addslashes($_POST['matbang']);
			$data['canhomau'] = addslashes($_POST['canhomau']);
			$data['cachuongview'] = addslashes($_POST['cachuongview']);
			$data['danhgia'] = addslashes($_POST['danhgia']);
			$data['nhadautu'] = addslashes($_POST['nhadautu']);
		$data['phukien'] = addslashes($_POST['phukien']);$data['phukien_sd'] = addslashes($_POST['phukien_sd']);$data['phukien_rd'] = addslashes($_POST['phukien_rd']);
		$data['congtrinh'] = addslashes($_POST['congtrinh']);$data['congtrinh_sd'] = addslashes($_POST['congtrinh_sd']);$data['congtrinh_rd'] = addslashes($_POST['congtrinh_rd']);		
		$data['thuoctinh']=",";
		for($j=0,$countj=count($thuoctinh);$j<$countj;$j++){ 
			if( isset( $_POST['thuoctinh'.$thuoctinh[$j]['id']] ) ){
				if($_POST['thuoctinh'.$thuoctinh[$j]['id']]==true){
				$data['thuoctinh']=$data['thuoctinh'].$_POST['thuoctinh'.$thuoctinh[$j]['id']].",";
				}
			}
		}
		
		$sql='select max(stt) as stt from table_duan';
		$d->query($sql);
		$stt=$d->fetch_array();
	
		$data['stt'] = $stt['stt'] +1 ;
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['new'] = isset($_POST['new']) ? 1 : 0;
				$data['trai'] = isset($_POST['trai']) ? 1 : 0;
				$data['trangchu'] = isset($_POST['trangchu']) ? 1 : 0;

		
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		
		$d->reset();
		$d->setTable('duan');
		
		
		if($d->insert($data)){
			$d->reset();
			$d->setTable('duan');
			$d->setOrder('id desc');
			$d->setLimit( 1 );
			$d->select();
			$abd=$d->fetch_array();
			$id = $abd['id'];
			
			
			transfer("Thêm thành công", "index.php?com=duan&act=man&id_list=".$abd['id_list']."&id_cat=".$abd['id_cat']."&id_danhmuc=".$abd['id_danhmuc']."&id_item=".$abd['id_item'] );
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=duan&act=man");
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
		$sql = "select id,thumb, photo from #_duan where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				//delete_file("../upload/duan/".$row['photo']);
				//delete_file("../upload/duan/".$row['thumb']);			
			}
		$sql = "delete from #_duan where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=duan&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=duan&act=man");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select id,thumb, photo from #_duan where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				//delete_file("../upload/duan/".$row['photo']);
				//delete_file("../upload/duan/".$row['thumb']);
			}
			$sql = "delete from #_duan where id='".$id."'";
			$d->query($sql);
		}
			
		} redirect("index.php?com=duan&act=man");} else transfer("Không nhận được dữ liệu", "index.php?com=duan&act=man");
		
}

#====================================

function get_loais(){
	global $d, $items, $paging;
	
	$sql = "select * from #_duan_item";
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
	$url="index.php?com=duan&act=man_item&id_danhmuc=".$_GET['id_danhmuc']."&id_list=".$_GET['id_list']."&id_cat=".$_GET['id_cat'];
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_loai(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=duan&act=man_item");
	
	$sql = "select * from #_duan_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=duan&act=man_item");
	$item = $d->fetch_array();
}

function save_loai(){
	global $d,$item;
	$file_name=changeTitle($_POST['ten']).time();
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=duan&act=man_item");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){	
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', "../upload/duan/",$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 200, "../upload/duan/",$file_name,2);	
				$d->reset();
			$d->reset();$d->setTable('duan_item');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				//delete_file("../upload/duan/".$row['photo']);	
				//delete_file("../upload/duan/".$row['thumb']);				
			}
		}
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		
			$data['tenkhongdau']=changeTitle($_POST['ten']);
		
		$data['id_danhmuc'] = $_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];	
		$data['id_cat'] = $_POST['id_cat'];			
		$data['stt'] = $_POST['stt'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
			$d->reset();$d->setTable('duan_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			transfer("Lưu thành công","index.php?com=duan&act=edit_item&id=".$item['id']."&id_list=".$item['id_list']."&id_cat=".$item['id_cat']."&id_danhmuc=".$item['id_danhmuc']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=duan&act=man_item");
	}else{		
		 if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', "../upload/duan/",$file_name)){
			$data['photo'] = $photo;			
			$data['thumb'] = create_thumb($data['photo'], 400, 200, "../upload/duan/",$file_name,2);
		}
		$data['id_danhmuc'] = $_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat'] = $_POST['id_cat'];
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['tenkhongdau']=changeTitle($_POST['ten']);
		
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->reset();$d->setTable('duan_item');
		if($d->insert($data)){
			$d->reset();
			$d->reset();$d->setTable('duan_item');
			$d->setOrder('id desc');
			$d->setLimit( 1 );
			$d->select();
			$abd=$d->fetch_array();
			
		transfer("Thêm thành công", "index.php?com=duan&act=edit_item&id=".$abd['id']."&id_list=".$abd['id_list']."&id_cat=".$abd['id_cat']."&id_danhmuc=".$abd['id_danhmuc'] );
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=duan&act=man_item");
	}
}

function delete_loai(){
	global $d;
	if(isset($_GET['id']))
	{
		$id =  themdau($_GET['id']);		
		$d->reset();		
			//Xóa danh mục cấp 4
			$sql = "delete from #_duan_item where id='".$id."'";
			$d->query($sql);

		
		
		if($d->query($sql))
			redirect("index.php?com=duan&act=man_item");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=duan&act=man_item");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_duan_item where id='".$id."'";
				$d->query($sql);
				
		} redirect("index.php?com=duan&act=man_item");} else transfer("Không nhận được dữ liệu", "index.php?com=duan&act=man_item");
}
/*---------------------------------*/
function get_cats(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_duan_cat where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan_cat SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan_cat SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_duan_cat";	
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
	$url="index.php?com=duan&act=man_cat&id_danhmuc=".$_GET['id_danhmuc']."&id_list=".$_GET['id_list'];
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=duan&act=man_cat");
	
	$sql = "select * from #_duan_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=duan&act=man_cat");
	$item = $d->fetch_array();	
}

function save_cat(){
	global $d,$item;
	$file_name=changeTitle($_POST['ten']).time();
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=duan&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){	
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', "../upload/duan/",$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 400, 200, "../upload/duan/",$file_name,2);
	$d->reset();			
			$d->reset();$d->setTable('duan_cat');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				//delete_file("../upload/duan/".$row['photo']);	
				//delete_file("../upload/duan/".$row['thumb']);				
			}
		}
		$data['id_danhmuc'] = $_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		
	$data['tenkhongdau']=changeTitle($_POST['ten']);
		
		
		$data['stt'] = $_POST['stt'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
			$d->reset();$d->setTable('duan_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			transfer("Lưu thành công","index.php?com=duan&act=man_cat&id_list=".$item['id_list']."&id_danhmuc=".$item['id_danhmuc']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=duan&act=man_cat");
	}else{				
		 if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', "../upload/duan/",$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 200, "../upload/duan/",$file_name,2);
		}
		$data['id_danhmuc'] = $_POST['id_danhmuc'];
		$data['id_list'] = $_POST['id_list'];
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['tenkhongdau']=changeTitle($_POST['ten']);
		
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->reset();$d->setTable('duan_cat');
		if($d->insert($data)){
			$d->reset();
			$d->reset();$d->setTable('duan_cat');
			$d->setOrder('id desc');
			$d->setLimit( 1 );
			$d->select();
			$abd=$d->fetch_array();
			
		transfer("Thêm thành công", "index.php?com=duan&act=man_cat&id_list=".$abd['id_list']."&id_danhmuc=".$abd['id_danhmuc']);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=duan&act=man_cat");
	}
}

function chuyencap_cat(){	
	global $d;
	$d->reset();
	$capchuyen = $_REQUEST['capchuyen'];
	$id_cat = $_REQUEST['id_cat'];
	if($id_cat == 0)
	{
		transfer("Bạn chưa chọn danh mục cần chuyển", "index.php?com=duan&act=chuyencap_cat");
	}
	if($capchuyen == 2)
	{
		#####Lấy id_list MAX
		$sql = "SELECT id FROM table_duan_list ORDER BY id desc";
		$d->query($sql);
		$max1 = $d->result_array();
		$max = $max1[0]['id']+1;
		
		#####Lấy id_list của danh mục cần chuyển cấp
		$sql = "SELECT id_list FROM table_duan_cat WHERE id='".$id_cat."'";
		$d->query($sql);
		$id_list1 = $d->result_array();
		$id_list = $id_list1[0]['id_list'];
			
		
		$sql = "INSERT INTO table_duan_list (ten,tenkhongdau,photo,hienthi,ngaytao,ngaysua,stt,id_danhmuc) 
	SELECT ten,tenkhongdau,photo,hienthi,ngaytao,ngaysua,stt,id_danhmuc FROM table_duan_cat WHERE id='".$id_cat."'";
		$result = $d->query($sql);
		if($result == true)
		{
			$sql2 = "UPDATE table_duan SET id_list='".$max."' WHERE id_list ='".$id_list."' and id_cat='".$id_cat."'";
			$result = $d->query($sql2);
			if($result == true)
			{
				$sql3 = "DELETE from table_duan_cat WHERE id='".$id_cat."'";
				$result = $d->query($sql3);
				if($result == true)
				{
					transfer("Bạn đã chuyển từ danh mục cấp 3 lên danh mục cấp 2", "index.php?com=duan&act=man_cat");
				}
			}				
		}
	}
	else if($capchuyen == 4)
	{
		transfer("Chuyển cấp này chưa được làm", "index.php?com=duan&act=chuyencap_cat");
	}
}


function delete_cat(){
	global $d;
	if(isset($_GET['id']))
	{
		$id =  themdau($_GET['id']);		
		$d->reset();		
			
			//Xóa danh mục cấp 3
			$sql = "select id,thumb,photo from #_duan_cat where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					//delete_file("../upload/duan/".$row['photo']);
					//delete_file("../upload/duan/".$row['thumb']);	
				}
				$sql = "delete from #_duan_cat where id='".$id."'";
				$d->query($sql);
			}

		
		
		if($d->query($sql))
			redirect("index.php?com=duan&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=duan&act=man_cat");

	

	}elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_duan_cat where id='".$id."'";
				$d->query($sql);
				
			
			
		} redirect("index.php?com=duan&act=man_cat");} else transfer("Không nhận được dữ liệu", "index.php?com=duan&act=man_cat"	    );
							
}
/*---------------------------------*/
function get_lists(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_duan_list where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan_list SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan_list SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_duan_list where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$noibat=$cats[0]['noibat'];
	if($noibat==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan_list SET noibat =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan_list SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_duan_list";	
	if($_REQUEST['id_danhmuc']!='')
	{
	$sql.=" where id_danhmuc=".$_REQUEST['id_danhmuc']."";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url="index.php?com=duan&act=man_list&id_danhmuc=".$_GET['id_danhmuc'];
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_list(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=duan&act=man_list");
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
	
	$sql = "select * from #_duan_list where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=duan&act=man_list");
	$item = $d->fetch_array();	
}

function save_list(){
	global $d,$item;
	$file_name=changeTitle($_POST['ten']).time();
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=duan&act=man_list");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', "../upload/duan/",$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 400, 200, "../upload/duan/",$file_name,2);
				$d->reset();
			$d->reset();$d->setTable('duan_list');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				//delete_file("../upload/duan/".$row['photo']);	
				//delete_file("../upload/duan/".$row['thumb']);				
			}
		}
		$data['id_danhmuc'] = $_POST['id_danhmuc'];
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
	
		
			$data['tenkhongdau']=changeTitle($_POST['ten']);
		
		$data['noidung'] = addslashes($_POST['noidung']);
		$data['mota'] = addslashes($_POST['mota']);
		
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$data['tag'] = $_POST['tag'];
		$d->reset();$d->setTable('duan_list');
		$d->setWhere('id', $id);
		if($d->update($data))
			transfer("Lưu thành công","index.php?com=duan&act=man_list&id_danhmuc=".$item['id_danhmuc']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=duan&act=man_list");
	}else{		
		 if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', "../upload/duan/",$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 200, "../upload/duan/",$file_name,2);
		}
		$data['id_danhmuc'] = $_POST['id_danhmuc'];
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['tenkhongdau']=changeTitle($_POST['ten']);
		
		$data['noidung'] = addslashes($_POST['noidung']);
		$data['mota'] = addslashes($_POST['mota']);
		
		$data['tag'] = $_POST['tag'];
		$data['tenkhongdau']=$newname;
			
		$sql='select max(stt) as stt from table_duan_list';
		$d->query($sql);
		$stt=$d->fetch_array();
	
		$data['stt'] = $stt['stt'] +1 ;
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
			$d->reset();$d->setTable('duan_list');
		if($d->insert($data)){
			$d->reset();
			$d->reset();$d->setTable('duan_list');
			$d->setOrder('id desc');
			$d->setLimit( 1 );
			$d->select();
			$abd=$d->fetch_array();
			
		transfer("Thêm thành công", "index.php?com=duan&act=man_list&id_danhmuc=".$abd['id_danhmuc']);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=duan&act=man_list");
	}
}

function delete_list(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			//Xóa danh mục cấp 2			
			$sql = "select id,thumb,photo from #_duan_list where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0)
			{
				while($row = $d->fetch_array())
				{
					//delete_file("../upload/duan/".$row['photo']);
					//delete_file("../upload/duan/".$row['thumb']);	
				}
				$sql = "delete from #_duan_list where id='".$id."'";
				$d->query($sql);
			}
		
		
		if($d->query($sql))
			redirect("index.php?com=duan&act=man_list");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=duan&act=man_list");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_duan_list where id='".$id."'";
				$d->query($sql);
			
			
		} redirect("index.php?com=duan&act=man_list");} else transfer("Không nhận được dữ liệu", "index.php?com=duan&act=man_list"	    );
}


/*---------------------------------*/
function get_danhmucs(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_duan_category where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan_category SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan_category SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_duan_category where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['noibat'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan_category SET noibat =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_duan_category SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
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

	$items=get_danhmucdacap($d);
	//dem so cap danh muc
	$cocuntmuc=demdanhmuc(get_danhmucdacap($d));
	$url="index.php?com=duan&act=man_danhmuc";
	for($i=1;$i<=$cocuntmuc;$i++){
		if(isset($_REQUEST['id_danhmucc'.$i]) && $_REQUEST['id_danhmucc'.$i]!='')
		{
			$items=get_danhmucdacap($d,$_REQUEST['id_danhmucc'.$i]);
		}
		$url.="&id_danhmucc".$i."=".$_GET['id_danhmucc'.$i];
	}
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;;
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}
//--==================================================================-//
function get_danhmucdacap($d, $id_parent='0'){

	$sql = "select * from table_duan_category where id_parent=".$id_parent;
	$sql.=" order by id desc";
	$d->query($sql);
	
	$arrdanhmuc=$d->result_array();
	for($i=0;$i<count($arrdanhmuc);$i++){
		$arrdanhmuc[$i]['sub']=get_danhmucdacap($d,$arrdanhmuc[$i]['id']);
	}
	return $arrdanhmuc;
}
function demdanhmuc($danhsachmuc){
	$maxsub=1;
	for($i=0;$i<count($danhsachmuc);$i++)
	{
		$countsub=1;
		if(!empty($danhsachmuc[$i]['sub'])){
			$countsub+=demdanhmuc($danhsachmuc[$i]['sub']);
		}
		if($maxsub<$countsub){
			$maxsub=$countsub;
		}
	}
	return $maxsub;
}
function get_dsdanhmuccha($id_danhmuc){
	global $d;
	$sql="select * from table_duan_category where id=".$id_danhmuc;
	$d->query($sql);
	$dmuc=$d->fetch_array();
	$arrdmuccha=array();
	$arrdmuccha[]=$dmuc;
	if($dmuc['id_parent']!=0)
	{
		$arrdmuccha=array_merge($arrdmuccha,get_dsdanhmuccha($dmuc['id_parent']));
	}
	return $arrdmuccha;
}
//--==================================================================-//
function get_danhmuc(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=duan&act=man_danhmuc");
	
	$sql = "select * from #_duan_category where hienthi=1 and id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=duan&act=man_danhmuc");
	$item = $d->fetch_array();	
}

function save_danhmuc(){
	global $d,$item;
	$file_name=changeTitle($_POST['ten']).time();
	$file_name2=changeTitle($_POST['ten']).time()."-2";
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=duan&act=man_danhmuc");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', "../upload/duan/",$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 90, 90, "../upload/duan/",$file_name,2);									
			
		}
		
		if($photo2 = upload_image("file2", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', "../upload/duan/",$file_name2)){
			$data['photo2'] = $photo2;	
			$data['thumb2'] = create_thumb($data['photo2'], 340, 200, "../upload/duan/",$file_name2,2);									
		}
		
		$data['ten'] = $_POST['ten'];
		$data['ten_rd'] = $_POST['ten_rd'];
		$data['ten_sd'] = $_POST['ten_sd'];
		
		$data['tenkhongdau']=changeTitle($_POST['ten']);
		
		//dem so cap danh muc
		$data['id_parent']='';
		$cocuntmuc=demdanhmuc(get_danhmucdacap($d));
		for($i=1;$i<=$cocuntmuc;$i++){
			if(isset($_REQUEST['id_danhmucc'.$i]) && $_REQUEST['id_danhmucc'.$i]!='')
			{
				$data['id_parent']=$_REQUEST['id_danhmucc'.$i];
			}
		}

		$data['tag'] = $_POST['tag'];
		$data['stt'] = $_POST['stt'];
		$data['noidung'] = addslashes($_POST['noidung']);
		$data['mota'] = addslashes($_POST['mota']);
		
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->reset();$d->setTable('duan_category');
		$d->setWhere('id', $id);
		if($d->update($data))
			transfer("Lưu thành công","index.php?com=duan&act=man_danhmuc");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=duan&act=man_danhmuc");
	}
	else{			
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', "../upload/duan/",$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 90, 90, "../upload/duan/",$file_name,2);							
		}
		if($photo2 = upload_image("file2", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', "../upload/duan/",$file_name2)){
			$data['photo2'] = $photo2;		
			$data['thumb2'] = create_thumb($data['photo2'], 340, 200, "../upload/duan/",$file_name2,2);						
		}
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		$data['title'] = $_POST['title'];
	
		$data['tenkhongdau']=changeTitle($_POST['ten']);
			
		$sql='select max(stt) as stt from table_duan_category';
		$d->query($sql);
		$stt=$d->fetch_array();
	
		$data['stt'] = $stt['stt'] +1 ;
		//dem so cap danh muc
		$data['id_parent']='';
		$cocuntmuc=demdanhmuc(get_danhmucdacap($d));
		for($i=1;$i<=$cocuntmuc;$i++){
			if(isset($_REQUEST['id_danhmucc'.$i]) && $_REQUEST['id_danhmucc'.$i]!='')
			{
				$data['id_parent']=$_REQUEST['id_danhmucc'.$i];
			}
		}

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['noidung'] = addslashes($_POST['noidung']);
		$data['mota'] = addslashes($_POST['mota']);
		
		$d->reset();$d->setTable('duan_category');
		if($d->insert($data)){
			$d->reset();
			$d->reset();
			$d->setTable('duan_category');
			$d->setOrder('id desc');
			$d->setLimit( 1 );
			$d->select();
			$abd=$d->fetch_array();
			transfer("Thêm thành công", "index.php?com=duan&act=man_danhmuc");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=duan&act=man_danhmuc");
	}
}

function delete_danhmuc(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
			//Xóa danh mục cấp 1
			$sql = "delete from #_duan_category where id='".$id."'";
			$d->query($sql);
			
		
		if($d->query($sql))
			redirect("index.php?com=duan&act=man_danhmuc");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=duan&act=man_danhmuc");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_duan_category where id='".$id."'";
				$d->query($sql);
				
	
			
		} redirect("index.php?com=duan&act=man_danhmuc");} else transfer("Không nhận được dữ liệu", "index.php?com=duan&act=man_danhmuc"	    );
}
?>


