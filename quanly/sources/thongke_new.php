<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){

	case "concept":
		getItemsConcept();
		$template = "thongke_new/thongke_concepts";
		break;
	
	case "sanpham":
		getItemsSanpham();
		$template = "thongke_new/thongke_sanpham";
		break;

	default:
		$template = "index";
}

function getItemsConcept(){
	
	global $d, $items, $paging, $excel;
	
	$d->reset();
	
	
	$sql_getItems='SELECT showroom.id as id, showroom.id_danhmuc as id_danhmuc, showroom.ten as ten, nhasx.id as id_nhasx, nhasx.ten as ten_nhasx,
	(SELECT COUNT(luotxem) FROM table_thongkeconcept WHERE showroom.id=id_place and luotxem!=0 ';
	
	if(isset($_GET['tungay']) && $_GET['tungay']!=''){
		$sql_getItems.=" and from_unixtime(luotxem,'%d-%m-%Y')>='".$_GET['tungay']."' ";
	}
	if(isset($_GET['denngay']) && $_GET['denngay']!=''){
		$sql_getItems.=" and from_unixtime(luotxem,'%d-%m-%Y')<='".$_GET['denngay']."' ";
	}
	$sql_getItems.=') as luotxem,
	(SELECT COUNT(luotdathang) FROM table_thongkeconcept WHERE showroom.id=id_place and luotdathang!=0';
	
	if(isset($_GET['tungay']) && $_GET['tungay']!=''){
		$sql_getItems.=" and from_unixtime(luotdathang,'%d-%m-%Y')>='".$_GET['tungay']."' ";
	}
	if(isset($_GET['denngay']) && $_GET['denngay']!=''){
		$sql_getItems.=" and from_unixtime(luotdathang,'%d-%m-%Y')<='".$_GET['denngay']."' ";
	}
	
	$sql_getItems.=') as luotmua,
	(SELECT COUNT(ngaytao) FROM table_yeuthich WHERE showroom.id=id_yeuthich and ngaytao!=0';
	
	if(isset($_GET['tungay']) && $_GET['tungay']!=''){
		$sql_getItems.=" and from_unixtime(ngaytao,'%d-%m-%Y')>='".$_GET['tungay']."' ";
	}
	if(isset($_GET['denngay']) && $_GET['denngay']!=''){
		$sql_getItems.=" and from_unixtime(ngaytao,'%d-%m-%Y')<='".$_GET['denngay']."' ";
	}
	
	$sql_getItems.=') as luotquantam,
	(SELECT COUNT(ngaytao) FROM table_review WHERE showroom.id=id_place and ngaytao!=0';
	if(isset($_GET['tungay']) && $_GET['tungay']!=''){
		$sql_getItems.=" and from_unixtime(ngaytao,'%d-%m-%Y')>='".$_GET['tungay']."' ";
	}
	if(isset($_GET['denngay']) && $_GET['denngay']!=''){
		$sql_getItems.=" and from_unixtime(ngaytao,'%d-%m-%Y')<='".$_GET['denngay']."' ";
	}
	$sql_getItems.=') as luotdanhgia
	FROM `table_thongkeconcept` as thongke, table_yeuthich as quantam, table_review as danhgia, table_brand as nhasx, table_place as showroom 
	WHERE showroom.brand=nhasx.id ';
	if(isset($_GET['nhasx']) && $_GET['nhasx']!=0 && $_GET['nhasx']!=''){
		$sql_getItems.=' and nhasx.id='.$_GET['nhasx'];
	}
	if(isset($_GET['showroom']) && $_GET['showroom']!=0 && $_GET['showroom']!=''){
		$sql_getItems.=' and showroom.id='.$_GET['showroom'];
	}
	$sql_getItems.=' GROUP BY id order by ';
	
	if(isset($_GET['sapxep']) && $_GET['sapxep']=='luotdat-tang'){
		$sql_getItems.=' luotmua asc, luotxem desc, luotquantam desc, luotdanhgia desc, ';
	}
	if(isset($_GET['sapxep']) && $_GET['sapxep']=='luotdat-giam'){
		$sql_getItems.=' luotmua desc, luotxem desc, luotquantam desc, luotdanhgia desc,';
	}
	
	if(isset($_GET['sapxep']) && $_GET['sapxep']=='luotxem-tang'){
		$sql_getItems.=' luotxem asc, luotmua desc, luotquantam desc, luotdanhgia desc,';
	}
	if(isset($_GET['sapxep']) && $_GET['sapxep']=='luotxem-giam'){
		$sql_getItems.=' luotxem desc, luotmua desc, luotquantam desc, luotdanhgia desc,';
	}
	
	if(isset($_GET['sapxep']) && $_GET['sapxep']=='danhgia-tang'){
		$sql_getItems.=' luotdanhgia asc, luotmua desc, luotxem desc, luotquantam desc,';
	}
	if(isset($_GET['sapxep']) && $_GET['sapxep']=='danhgia-giam'){
		$sql_getItems.=' luotdanhgia desc, luotmua desc, luotxem desc, luotquantam desc,';
	}
	
	if(isset($_GET['sapxep']) && $_GET['sapxep']=='quantam-tang'){
		$sql_getItems.=' luotquantam asc, luotmua desc, luotxem desc,  luotdanhgia desc,';
	}
	if(isset($_GET['sapxep']) && $_GET['sapxep']=='quantam-giam'){
		$sql_getItems.=' luotquantam desc, luotmua desc, luotxem desc, luotdanhgia desc,';
	}
	
	if(!isset($_GET['sapxep'])){
		$sql_getItems.=' luotmua desc, luotxem desc, luotquantam desc, luotdanhgia desc,';
	}
	
	$sql_getItems.=' id desc';
	
	$url="index.php?com=thongke&act=concept";
	
	$d->query($sql_getItems);
	$items=$d->result_array();
	
	
	
	for($i=0;$i<count($items);$i++){
		$items[$i]['stt']=$i+1;
	}
	
	$_SESSION['excel']=$items;
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;

	$maxR=20;
	$maxP=5;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
	

}
function getItemsSanpham(){
	
	global $d, $items, $paging, $excel;	
	
	$d->reset();
	
	$sql_getItems='
	SELECT sanpham.id as id, sanpham.ten, sanpham.id_place as place, sanpham.id_danhmuc as danhmuc, nhasx.id as id_nhasx, nhasx.ten as tennhasx,
	(SELECT COUNT(luotdathang) FROM `table_thongkesanpham` WHERE sanpham.id=id_sanpham and luotdathang!=0 ';
	
	if(isset($_GET['tungay']) && $_GET['tungay']!=''){
		$sql_getItems.=" and from_unixtime(luotdathang,'%d-%m-%Y')>='".$_GET['tungay']."' ";
	}
	if(isset($_GET['denngay']) && $_GET['denngay']!=''){
		$sql_getItems.=" and from_unixtime(luotdathang,'%d-%m-%Y')<='".$_GET['denngay']."' ";
	}
	
	$sql_getItems.=') as luotmua,';
	$sql_getItems.='(SELECT COUNT(luotxem) FROM `table_thongkesanpham` WHERE sanpham.id=id_sanpham and luotxem!=0 ';
	if(isset($_GET['tungay']) && $_GET['tungay']!=''){
		$sql_getItems.=" and from_unixtime(luotxem,'%d-%m-%Y')>='".$_GET['tungay']."' ";
	}
	if(isset($_GET['denngay']) && $_GET['denngay']!=''){
		$sql_getItems.=" and from_unixtime(luotxem,'%d-%m-%Y')<='".$_GET['denngay']."' ";
	}
	$sql_getItems.=') as luotxem
	FROM `table_thongkesanpham` as thongke, table_product as sanpham, table_place as showroom, table_brand as nhasx WHERE showroom.id=sanpham.id_place and nhasx.id = showroom.brand ';
	
	if(isset($_GET['nhasx']) && $_GET['nhasx']!=0 && $_GET['nhasx']!=''){
		$sql_getItems.=' and nhasx.id='.$_GET['nhasx'];
	}
	if(isset($_GET['showroom']) && $_GET['showroom']!=0 && $_GET['showroom']!=''){
		$sql_getItems.=' and showroom.id='.$_GET['showroom'];
	}
	if(isset($_GET['danhmuc']) && $_GET['danhmuc']!=0 && $_GET['danhmuc']!=''){
		$sql_getItems.=' and sanpham.id_danhmuc='.$_GET['danhmuc'];
	}
	
	$sql_getItems.=' GROUP by id order by ';
	
	
	if(isset($_GET['sapxep']) && $_GET['sapxep']=='luotdat-tang'){
		$sql_getItems.=' luotmua asc, luotxem desc, ';
	}
	if(isset($_GET['sapxep']) && $_GET['sapxep']=='luotdat-giam'){
		$sql_getItems.=' luotmua desc, luotxem desc, ';
	}
	if(isset($_GET['sapxep']) && $_GET['sapxep']=='luotxem-tang'){
		$sql_getItems.=' luotxem asc, luotmua desc,';
	}
	if(isset($_GET['sapxep']) && $_GET['sapxep']=='luotxem-giam'){
		$sql_getItems.=' luotxem desc, luotmua desc,  ';
	}
	if(!isset($_GET['sapxep'])){
		$sql_getItems.=' luotmua desc, luotxem desc, ';
	}
	
	$sql_getItems.=' id desc';
	
	$url="index.php?com=thongke&act=sanpham";
	
	$d->query($sql_getItems);
	$items=$d->result_array();
	
	for($i=0;$i<count($items);$i++){
		$items[$i]['stt']=$i+1;
	}
	$_SESSION['excel']=$items;
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;

	$maxR=20;
	$maxP=5;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
	

}
?>