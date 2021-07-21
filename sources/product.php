<?php
if(isset($_POST['id'])){
	$hoten=$_POST['hoten'];
	$sp=$_POST['id'];
	$danhgia=$_POST['danhgia'];
	$tieude=$_POST['tieude'];
	$noidung=$_POST['noidung'];
	$sql = "INSERT INTO  table_danhgia (hoten,danhgia,tieude,noidung,sp) 
				  VALUES ('$hoten','$danhgia','$tieude','$noidung','$sp')";	
			mysql_query($sql) or die(mysql_error());
			$iduser = mysql_insert_id();
	alert('Cám ơn bạn đánh giá sản phẩm của chúng tôi');
	}
		
if( $template=='nha-dat-ban-detail' ){
	$id=$_GET['id'];
	$d->reset();
	$d->setTable($table);
	$d->setWhere('id',$id);
	$d->select();
	$chitietsanpham=$d->fetch_array();
	$title = $chitietsanpham['title'];
	if( $title=='' ){
	$title = $chitietsanpham['ten'];}
	$description = $chitietsanpham['description'];
	$keyword = $chitietsanpham['keywords'];
	$title_bar = $chitietsanpham['ten'.$lang];
	
	$sql = "select * from #_hinhsp where hienthi=1 and id_sp='".$chitietsanpham['id']."'  order by stt  asc";
	$d->query($sql);
	$hinhsp = $d->result_array();
	
$lat=$chitietsanpham['lat'];
$lng=$chitietsanpham['lng'];
$multiplier = 112.12; // use 69.0467669 if you want miles
$distance = 10; // kilometers or miles if 69.0467669

$sql = "SELECT *, (SQRT(POW((lat - $lat), 2) + POW((lng - $lng), 2)) * $multiplier) AS distance FROM table_prod3uct WHERE POW((lat - $lat), 2) + POW((lng - $lng), 2) < POW(($distance / $multiplier), 2) ORDER BY distance ASC";

	$d->query($sql);
	$place = $d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=$com."/".$chitietsanpham['tenkhongdau']."";
	$maxR=10;
	$maxP=12;
	$paging=paging($place, $url, $curPage, $maxR, $maxP);
	$place=$paging['source'];
	
}else{
	$title_ba="Sản Phẩm";
	$d->reset();
	$d->setTable("tinhthanh_danhmuc");
	$d->setWhere('tenkhongdau',$_GET['id']);
	$d->select();
	$tam=$d->fetch_array();
	echo count($tam);
	if( count($tam)>1 ){$ketqua['table']="danhmuc" ;$col='tinh';}
	else{
		$d->reset();
		$d->setTable("tinhthanh_list");
		$d->setWhere('tenkhongdau',$_GET['id']);
		$d->select();
		$tam=$d->fetch_array();
			if( count($tam)>1){$ketqua['table']="list";$col='huyen'; }
			else{
				$d->reset();
				$d->setTable("tinhthanh_cat");
				$d->setWhere('tenkhongdau',$_GET['id']);
				$d->select();
				$tam=$d->fetch_array();
				if( count($tam)>1 ){$ketqua['table']="cat" ;$col='phuong';}else{ $showall=true;}
			}
	}
	$danhmucsanpham=$tam;
	$where='';
	if( isset( $ketqua['table']) ){

	$danhmucseo=$danhmucsanpham;
	$title_ba = $danhmucsanpham['ten'.$lang];
	$title = $danhmucsanpham['title'];
	if( $title=='' ){
	$title = $danhmucsanpham['ten'];}
	$keyword = $danhmucsanpham['keywords'];
	$description = $danhmucsanpham['description'];
	$where=" and id_".$col." = ".$tam['id'];
	
	}
	
	$d->reset();
	$sql = "select * from table_place where hienthi=1 ".$where;
	
	
/*	
	$d->reset();
	$d->setTable('place');
	if( isset( $ketqua['thuoctinh'] ) ){
		$sql = $sql."and #_place.thuoctinh like '%,".$ketqua['thuoctinh'].",%'";
	}
	if( isset( $ketqua['table'] ) ){
		$sql = $sql."and #_place.id_".$ketqua['table']." = '".$danhmucsanpham['id']."'";
		}
	
	*/
	$sql = $sql." order by stt asc, id desc";
	$d->query($sql);
	$place = $d->result_array();
	
	$title_page = 'TOP place';
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=$com."";
	$maxR=18;
	$maxP=12;
	$paging=paging($place, $url, $curPage, $maxR, $maxP);
	$place=$paging['source'];
	
}

?>